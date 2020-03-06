<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dealers extends CI_Controller {

    /**
     * __construct method
     */
    function __construct() {
        parent::__construct();

        //load Model
        $this->load->model('dashboard_model');
        $this->load->model('dealer_model');
        $this->load->model('sales_model');
        $this->load->model('user_model');
        
        // Check login
        $this->lib_auth->checkUriPermissions();

        // Load Lib_Dealers Library
        $this->load->library(array('Lib_Dealers'));
        $this->load->config('default/dealers');
        
        $this->load->library(array('Lib_Users','Lib_Roles'));
    }

    /*
     * 
     *
     * _remap method
     *
     * @param string $strMethod
     * @param string[] $arrParams
     * @return void
     */
     
    /*public function _remap($strMethod, $arrParams = array()) {
        if (method_exists($this, $strMethod))
            return call_user_func_array(array($this, $strMethod), $arrParams);
        return show_404();
    }*/

    /**
     * index method
     *
     * @param integer $nOffset
     * @return void
     */
    public function index() {

        $data['dealers'] =  $this->dealer_model->get_dealers();

        return $this->load->view($this->config->item('template_view'), $data);
    }
    
     public function manager_dealers() {
         $id = $this->lib_auth->getUserID();
        $data['dealers'] =  $this->db->query("select * from users where id in(select dealer_id from user_dealers where user_id=$id)")->result();
        //return $this->load->view($this->config->item('template_view'), $data);
        $this->load->view("dealers/manager_dealers",$data);
    }

    // To get filter data
    public function getfilterdata(){
        $status = $this->input->post('status');
        $data['result'] = $this->dealer_model->getfilterdata($status);     
        return $this->load->view('dealers/resultdata',$data);
    }



    /**
     * add method
     *
     * @return void
     */
    public function add()
    {       
        $arrData['shops'] = $this->dashboard_model->getshopnames();
        $arrData['month'] = date("m");
		//echo "<pre>";print_r($arrData);exit;
		$nRoleID = ($this->lib_auth->getRoleID() != 1) ? 1 : NULL;
		$arrData['arrRoles'] = $this->lib_roles->getRolesList($nRoleID);
		$arrData['getd'] = $this->dashboard_model->getdesignations();

        $super_user_id = $this->lib_auth->getUserID() ; 
        $superuser_details = $this->db->where('id',$super_user_id)->get('users')->row_array();
        if(@$superuser_details['role_id']==2 && @$superuser_details['user_type']==9)
        { 
            $arrData['zone_id'] =  $superuser_details['zone'];

            $zones = [1=>"Riyadh",2=>"Khamis",3=>"Jeddah",4=>"Dammam",5=>"Yanbu"] ;
            $arrData['zone'] = $zones[$arrData['zone_id']];
        }

        return $this->load->view($this->config->item('template_view'),$arrData);
    }
    
    public function design($nOffset=1)
    {
        $arrData['nLimit'] = $nLimit = 10;
        $arrData['nOffset'] = $nOffset;

        // Offset
        $nOffset = $nLimit * ($nOffset - 1);

        // Get users for pagination
        $nCreatedBy = ($this->lib_auth->getRoleID() != 1) ? $this->lib_auth->getUserID() : NULL;
        $arrData['objUsers'] = $this->dealer_model->getDealersForPagination($nLimit, $nOffset, $nCreatedBy)->result();
        $nTotalRowscount = $this->dealer_model->getNoOfDealers($p_nCreatedBy = NULL, $p_strSearch = NULL, $p_nStatus = NULL, $p_nRoleID = NULL, $p_nExceptUserID = NULL);
        // Load Lib_Pagination library
        $this->load->library('Lib_Pagination');
        // Pagination
        //$strBaseUrl = base_url($this->config->item('users_index_uri'));
        $strBaseUrl = base_url().'index.php/dealers/'.$this->uri->segment(2);
        $nTotalRows = $nTotalRowscount->count;
        $arrData['strPagination'] = $this->lib_pagination->pagination($strBaseUrl, $nTotalRows, $nLimit, 3);
       // return $this->load->view($this->config->item('template_view'), $arrData);
        return $this->load->view('dealers/design',$arrData);
    }

    public function add_dealer()
    {
        $targets = $this->input->post('data');
        
        $config['upload_path']          = 'server/assets/media/';
        $config['allowed_types']	 	= '*';
	    $config['max_size'] 			= 1024 * 80;
	    $config['file_name'] 			= "profile_".time();

        $this->load->library('upload', $config);

        if($this->upload->do_upload('file'))
        {
          $image = $this->upload->data();
        }
                
        $string = "Jotun";
        $random_number = mt_rand(100000000, 999999999);
        $code = $string.$random_number;
        
        $arrUser = array(
            'code'=>$code,
            'role_id'=>4,
            'zone' => $this->input->post('zone'),
            'username' => $this->input->post('username'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'status' => $this->input->post('status'),
            'total_sales' => ($this->input->post('total_sales'))?$this->input->post('total_sales'):'',
            'total_collection' => ($this->input->post('total_collection'))?$this->input->post('total_collection'):'',
            'total_product_target' => ($this->input->post('total_product_target'))?$this->input->post('total_product_target'):'',
            'achieved_sales' => ($this->input->post('achieved_sales'))?$this->input->post('achieved_sales'):'',
            'achieved_collection' => ($this->input->post('achieved_collection'))?$this->input->post('achieved_collection'):'',
            'achieved_product' => ($this->input->post('achieved_product'))?$this->input->post('achieved_product'):'',
            'acc_no' => ($this->input->post('shop_acc_number'))?$this->input->post('shop_acc_number'):'',
            'profile_image'=>($image['file_name'])?$image['file_name']:'',
            'created' => date('Y-m-d h:i:s'),
        );		
		$this->db->insert('users',$arrUser);
		$user_id =  $this->db->insert_id(); 
		
		$date_time = date('Y-m-d h:i:s');
		$shops = $this->db->select('id')->get_where("shops",array("acc_no"=>$this->input->post('shop_acc_number')))->result();
        foreach($shops as $shop){
            $shop_array = array(
			'user_id' => $user_id,
			'shop_id' => $shop->id,
			'created' =>$date_time
 			);
 		  $this->db->insert('dealers_shops',$shop_array);
        }
		/*$shop = $this->input->post('shop');
		$shop_count = count($shop);
		for($i=0;$i<$shop_count;$i++){
			$shop_array = array(
			'user_id' => $user_id,
			'shop_id' => $shop[$i],
			'created' => $date_time
 			);			
		  $this->db->insert('dealers_shops',$shop_array);
		}*/
		
    	  
        if(!empty($targets))
        {
             $i=array();
    		 foreach($targets as $month => $data){
                $i['month_description']= $month;
                $i['month']= date('m',strtotime($month));
                $i['dealer_id']= $user_id;
                foreach($data as $field_name=>$value)
                {
                    $i[$field_name]=$value;
                }
                $this->db->insert('dealer_targets',$i); 
            }  
        }
        
        $months = array("january","february","march","april","may","june","july","august","september","october","november","december");
        /*$product_targets = array();
        foreach($months as $month)
        {
            $p_targets = $this->input->post($month);
            if(!empty($p_targets))
            {
                foreach($p_targets as $field_name=>$value)
                {
                    foreach($value as $key=>$t_value)
                    {
                        $product_targets[$key]['month_description'] = $month;
                        $product_targets[$key]['month'] = date("m",strtotime($month));
                        $product_targets[$key]['dealer_id'] = $user_id;
                        $product_targets[$key][$field_name] = $t_value;
                    }
                }
                                    
                foreach($product_targets as $key => $product_tar)
                {
                    $this->db->insert("dealer_product_targets",$product_tar);
                }
             
            }
        }
        */
        //$product_targets = array();
        foreach($months as $mont)
        {
            $p_targets = array();
            $p_targets = $this->input->post($mont);
            if(!empty($p_targets))
            {
                for($i=0;$i<count($p_targets['product_name']);$i++)
                {
                    $data1['month_description'] =  $mont;
                    $data1['month'] = date("m",strtotime($mont));
                    $data1['dealer_id'] = $user_id;
                    $data1['product_name'] = $p_targets['product_name'][$i];
                    $data1['product_targets'] =  $p_targets['product_targets'][$i];
                    $data1['achieved_targets'] = $p_targets['achieved_targets'][$i];
                    $this->db->insert("dealer_product_targets",$data1);
                }
            }
        }
    		$last_insert_id =  $this->db->insert_id(); 
    		if($last_insert_id != "" && $this->lib_auth->getRoleID()==2){
    			$this->session->set_flashdata('message', 'success');
    			redirect('index.php/dealers/manager_dealers');
    		}
    		else
    		{
    		    $this->session->set_flashdata('message', 'success');
    			redirect('index.php/dealers/index');
    		}
    }


    /**
     * edit method
     *
     * @param integer $nID
     * @return void
     */
    public function edit($nID)
    {
        // Check ajax request
        /*if (!$this->input->is_ajax_request()) {
            // Get user by ID
            $arrData['objUser'] = $objUser = $this->dealer_model->getDealerByID($nID);

            // Check status
            if (!$objUser) {
                $this->session->set_flashdata('flash_failure', $this->lib_dealers->strFlashMessage);
                redirect($this->config->item('dealers_index_uri'));
            }
            return $this->load->view($this->config->item('template_view'), $arrData);
            */
          
            if (!$this->input->is_ajax_request()) {
                
            // Get user by ID
            $arrData['objUser'] = $objUser = $this->dealer_model->getDealerByID($nID);
           // $arrData['targets'] = $this->db->query("select * from dealer_targets where dealer_id=$nID order by month asc")->result_array();
            $arrData['targets'] = $this->db->query("SELECT id,dealer_id,month,month_description,FORMAT(total_sales,0)total_sales,FORMAT(total_collection,0)total_collection,FORMAT(total_product_target,0)total_product_target,FORMAT(achieved_sales,0)achieved_sales,FORMAT(achieved_collection,0)achieved_collection,FORMAT(achieved_product,0)achieved_product FROM `dealer_targets` WHERE dealer_id=$nID order by month asc")->result_array();
            $arrData['shopp_acc'] = $this->sales_model->get_shops_acc($arrData['objUser']->zone); //$this->db->query("select * from shops where address ='".$arrData['objUser']->zone."'")->result_array();
            
                  	//Get shops
			/*$arrData['arrShops'] = $this->sales_model->get_deler_shopsList($nID);
			$arrData['shops'] = $this->dashboard_model->getshopnames_by_zone($this->user_model->getUser_ByID($nID)->zone);*/
			
            if (!$objUser) {
                $this->session->set_flashdata('flash_failure', $this->lib_users->strFlashMessage);
                redirect($this->config->item('users_index_uri'));
            }


            $super_user_id = $this->lib_auth->getUserID() ; 
            $superuser_details = $this->db->where('id',$super_user_id)->get('users')->row_array();
            if(@$superuser_details['role_id']==2 && @$superuser_details['user_type']==9)
            { 
                $arrData['zone_id'] =  $superuser_details['zone'];

                $zones = [1=>"Riyadh",2=>"Khamis",3=>"Jeddah",4=>"Dammam",5=>"Yanbu"] ;
                $arrData['zone'] = $zones[$arrData['zone_id']];
            }

            return $this->load->view($this->config->item('template_view'), $arrData);
        }
        return;
    }

    /**
     * delete method
     *
     * @param integer $nID
     * @return void
     */
    public function delete($nID) {
        // Delete user
        $objResult = $this->lib_dealers->deleteUser($nID);
        echo json_encode($objResult);
        return;
    }

    /**
     * ajax_get_dealers_by_search method
     *
     * @return object
     */
   public function ajax_get_dealers_by_search() {
        // Check the ajax request
        if (!$this->input->is_ajax_request()) {
            $arrResult = array(
                'result' => array(
                    'success' => false,
                    'message' => 'This method not allowed.'
                )
            );
            echo json_encode($arrResult);
            return;
        }

        // Input
        $arrData['strSearch'] = $strSearch = $this->input->get('search');

        // Limit
        $arrData['nLimit'] = $nLimit = 10;
    if($this->input->get('page') == ""){ $nOffset = 1; }else{ $nOffset = $this->input->get('page'); }
        $arrData['nOffset'] = $nOffset;
        $nOffset = $nLimit * ($nOffset - 1);

        // Get dealers by search
        $nCreatedBy = ($this->lib_auth->getRoleID() != 1) ? $this->lib_auth->getUserID() : NULL;
        // $arrData += $this->lib_dealers->getDealersForPagination($nLimit, $nOffset, $nCreatedBy, $strSearch);
        $arrData['objUsers'] = $this->dealer_model->getDealersForPagination($nLimit, $nOffset, $nCreatedBy,$strSearch)->result();
        $nTotalRowscount = $this->dealer_model->getNoOfDealers($p_nCreatedBy = NULL, $strSearch = NULL, $p_nStatus = NULL, $p_nRoleID = NULL, $p_nExceptUserID = NULL);

        // Load Lib_Pagination library
        $this->load->library('Lib_Pagination');

        // Pagination
        $strUrlSuffix = !empty($strSearch) ? '?search=' . $strSearch : '';
        $strBaseUrl = base_url($this->config->item('dealers_ajax_get_dealers_by_search_uri')) . $strUrlSuffix;
        $nTotalRows = $nTotalRowscount->count;
        $arrData['strPagination'] = $this->lib_pagination->pagination($strBaseUrl, $nTotalRows, $nLimit, 3, '?' . http_build_query($_GET, '', '&'));
        $arrData['nIsAjax'] = 1;

        // Result
        $arrResult = array(
            'result' => array(
                'success' => true,
                'view' => $this->load->view($this->config->item('dealers_table_view'), $arrData, true),
                'pagination' => $this->load->view($this->config->item('pagination_view'), $arrData, true)
            )
        );

        echo json_encode($arrResult);
        return;
    }


    public function edit_profile($user_id){
        $data['profile_details'] = $this->dashboard_model->getprofile_details($user_id);
        $this->load->view($this->config->item('template_view'),$data);      
    }
    
    public function update_profile($user_id){
          if(!empty($_FILES['admin_image']['name'])){
                $config['upload_path'] = 'server/assets/media/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['admin_image']['name'];
                
                
                $this->load->library('upload',$config);
              //  $this->upload->initialize($config);
                
                if($this->upload->do_upload('admin_image')){
                    $uploadData = $this->upload->data();
                    $image = $uploadData['file_name'];
                }else{
                    $image = '';
                }
                }else{
                    $image = $this->input->post('previous_image');
                }
                
        $data = array(
        'username' => $this->input->post('username'),
        'profile_image' => $image,
        'password' => md5($this->input->post('password')),
        'first_name' => $this->input->post('fname'),
        'last_name' => $this->input->post('lname'),
        'phone' => $this->input->post('mobile')     
        );
        //echo"<pre>";print_r($data);exit;
        $data['success'] = $this->dashboard_model->update_profile($user_id,$data);
        if($data['success'] != ""){
            $this->session->userdata('auth_me')->profile_image = $image;
            $this->session->set_flashdata('message','success');
            redirect('dealers/edit_profile/'.$user_id.'');
        }else{
            $this->session->set_flashdata('message','failed');
            redirect('dealers/edit_profile/'.$user_id.'');
        }
    }


public function update_dealer($user_id){    
   //print_r($_POST);
   // exit;
      
        $targets = $this->input->post('data');
            
        $config['upload_path']          = 'server/assets/media/';
        $config['allowed_types']	 	= '*';
	    $config['max_size'] 			= 1024 * 80;
	    $config['file_name'] 			= "profile_".time();

        $this->load->library('upload', $config);

        if($this->upload->do_upload('file'))
        {
          $image = $this->upload->data();
        }
        
         $data = array(
            'zone' => $this->input->post('zone'),
            'username' => $this->input->post('username'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'status' => $this->input->post('status'),
            'total_sales' => ($this->input->post('total_sales'))?str_replace(",","",$this->input->post('total_sales')):'',
            'total_collection' => ($this->input->post('total_collection'))?str_replace(",","",$this->input->post('total_collection')):'',
            'total_product_target' => ($this->input->post('total_product_target'))?str_replace(",","",$this->input->post('total_product_target')):'',
            'achieved_sales' => ($this->input->post('achieved_sales'))?str_replace(",","",$this->input->post('achieved_sales')):'',
            'achieved_collection' => ($this->input->post('achieved_collection'))?str_replace(",","",$this->input->post('achieved_collection')):'',
            'achieved_product' => ($this->input->post('achieved_product'))?str_replace(",","",$this->input->post('achieved_product')):'',
            'acc_no' => ($this->input->post('shop_acc_number'))?$this->input->post('shop_acc_number'):'',
            'profile_image'=>($image['file_name'])?$image['file_name']:'',
        );
        
		$data['result'] = $this->dealer_model->updateDealer($user_id,$data);
        $this->db->delete('dealers_shops',array('user_id'=>$user_id));
		
		$date_time = date('Y-m-d h:i:s');
	/*	$shop = $this->input->post('shop_id');
		$shop_count = count($shop);
		for($i=0;$i<$shop_count;$i++){
			$shop_array = array(
			'user_id' => $user_id,
			'shop_id' => $shop[$i],
			'created' => $date_time
 			);			
			$this->db->insert('dealers_shops',$shop_array);
		}*/
		$shops = $this->db->select('id')->get_where("shops",array("acc_no"=>$this->input->post('shop_acc_number')))->result();
        foreach($shops as $shop){
            $shop_array = array(
			'user_id' => $user_id,
			'shop_id' => $shop->id,
			'created' =>$date_time
 			);
 		  $this->db->insert('dealers_shops',$shop_array);
        }
		
		$this->sales_model->delete_dealer_targets($user_id);
		$i=array();
		foreach($targets as $month => $data){
            $i['month_description']= $month;
            $i['month']= date('m',strtotime($month));
            $i['dealer_id']= $user_id;
            foreach($data as $field_name=>$value)
            {
                $i[$field_name]=str_replace(",","",$value);
            }
            $this->db->insert('dealer_targets',$i); 
        }
        
        $this->db->delete('dealer_product_targets',array('dealer_id'=>$user_id));
        
        $months = array("january","february","march","april","may","june","july","august","september","october","november","december");
        $product_targets = array();
        foreach($months as $mont)
        {
            $p_targets = array();
            $p_targets = $this->input->post($mont);
            if(!empty($p_targets))
            {
                for($i=0;$i<count($p_targets['product_name']);$i++)
                {
                    $data1['month_description'] =  $mont;
                    $data1['month'] = date("m",strtotime($mont));
                    $data1['dealer_id'] = $user_id;
                    $data1['product_name'] = $p_targets['product_name'][$i];
                    $data1['product_targets'] = str_replace(",","",$p_targets['product_targets'][$i]);
                    $data1['achieved_targets'] = str_replace(",","",$p_targets['achieved_targets'][$i]); 
                    $this->db->insert("dealer_product_targets",$data1);
                }
            }
        }
        
    	 //if($data['result'] != ""){
            $this->session->set_flashdata('message','success');
            redirect('dealers/edit/'.$user_id.'');
        //}
    }
    
public function importcsv()
{
  
    $this->load->library('csvimport');
    $config['upload_path'] = FCPATH.'server/assets/media/';
    $config['allowed_types'] = '*';
    $config['max_size'] = '10000';
    $this->load->library('upload',$config);

    //If upload failed, display error
     if(!$this->upload->do_upload("csv_file")) {
         $data['error'] = $this->upload->display_errors();
       //print_r($data['error']);exit;
          $this->session->set_flashdata('error', 'Csv File Uploaded Failed');
                      //redirect($_SERVER['HTTP_REFERER'],'refresh');
          redirect('dealers/index');
     }
     else
     {
            $file_data = $this->upload->data();
            $file_path =  FCPATH.'server/assets/media/'.$file_data['file_name'];
            //print_r($this->csvimport->get_array($file_path));exit;
          
            if($this->csvimport->get_array($file_path))
            {
                $csv_array = $this->csvimport->get_array($file_path);
                
                    foreach ($csv_array as $row)
                    {
                           $dealer_data = $this->db->query("select * from users where acc_no='".$row['SHOPS']."' and email='".$row['EMAIL']."'")->row();
                           $shop_d = $this->db->query("select * from shops where acc_no='".$row['SHOPS']."'")->row();
                           
                            if(empty($dealer_data))
                            {
                                if($shop_d->zone==$row['ZONE'])
                                {
                                        $string = "Jotun";
                                        $random_number = mt_rand(100000000, 999999999);
                                        $code = $string.$random_number;
                                    
                                            $insert_data = array(
                                            'code'=>$code,
                                            'role_id'=>4,
                                            'zone' => $row['ZONE'],
                                            'username' => $row['USERNAME'],
                                            'first_name' =>$row['FIRSTNAME'],
                                            'last_name' => $row['LASTNAME'],
                                            'phone' => $row['PHONE'],
                                            'email' => $row['EMAIL'],
                                            'password' => md5($row['PASSWORD']),
                                            'status' => $row['STATUS'],
                                            'total_sales' => ($row['TOTALSALES'])?$row['TOTALSALES']:'',
                                            'total_collection' => ($row['TOTALCOLLECTION'])?$row['TOTALCOLLECTION']:'',
                                            'total_product_target' => ($row['TOTALPRODUCTTARGET'])?$row['TOTALPRODUCTTARGET']:'',
                                            'acc_no' => ($row['SHOPS'])?$row['SHOPS']:'',
                                            'created' => date('Y-m-d h:i:s'),
                                            );
                                          $this->db->insert("users",$insert_data);
                                          $user_id = $this->db->insert_id();
                                          
                                          if($row['SHOPS'] != "")
                                          {
                                                
                                                  $shops = $this->db->select('id')->get_where("shops",array("acc_no"=>$row['SHOPS']))->result_array();
                                                  if(!empty($shops))
                                                  {
                                                      foreach($shops as $shop)
                                                      {
                                                          $data['shop_id'] = $shop['id'];
                                                          $data['user_id'] = $user_id;
                                                          $this->db->insert("dealers_shops",$data);
                                                          //print_r($data);
                                                      }
                                                  }
                                            
                                          }
                                          
                                          $months = array("JANUARY","FEBRUARY","MARCH","APRIL","MAY","JUNE","JULY","AUGUST","SEPTEMBER","OCTOBER","NOVEMBER","DECEMBER");
                                          foreach($months as $key=>$month)
                                          {
                                              $month_data = explode(',',$row[$month]);
                                              $target['total_sales'] = ($month_data[0])?$month_data[0]:0;
                                              $target['total_collection'] = ($month_data[1])?$month_data[1]:0;
                                              $target['total_product_target'] = ($month_data[2])?$month_data[2]:0; 
                                              $target['dealer_id'] = $user_id; 
                                              $target['month'] = $key+1;
                                              $target['month_description'] = strtolower($month);
                                              $this->db->insert("dealer_targets",$target);
                                            // print_r($target);
                                          }
                                          
                                          $year_month = array("JANUARY","FEBRUARY","MARCH","APRIL","MAY","JUNE","JULY","AUGUST","SEPTEMBER","OCTOBER","NOVEMBER","DECEMBER");
                                          foreach($year_month as $key=>$months)
                                          {
                                              $product_name = explode(',',$row[$months."_PRODUCT_NAME"]);
                                              $product_targets = explode(',',$row[$months."_PRODUCT_TARGET"]);
                                              
                                             for($i=0;$i<count($product_name);$i++)
                                             {
                                                  $product_target['product_name'] = ($product_name[$i])?$product_name[$i]:'';
                                                  $product_target['product_targets'] = ($product_targets[$i])?$product_targets[$i]:0;
                                                  $product_target['dealer_id'] = $user_id; 
                                                  $product_target['month'] = $key+1;
                                                  $product_target['month_description'] = strtolower($months);
                                                  $this->db->insert("dealer_product_targets",$product_target); 
                                             }
                                              
                                          }
                                }
                            }
                          
                       // exit;
                        
                    }
                      $this->session->set_flashdata('success', 'Csv Data Imported Succesfully');
                      redirect('dealers/index');
           }
           else
           {
                $data['error'] = "Error occured";
                redirect('dealers/index');
           }   
      }
}

public function importcsv_achieved()
{
  
    $this->load->library('csvimport');
    $config['upload_path'] = FCPATH.'server/assets/media/';
    $config['allowed_types'] = '*';
    $config['max_size'] = '10000';
    $this->load->library('upload',$config);

    //If upload failed, display error
     if(!$this->upload->do_upload("csv_file")) {
         $data['error'] = $this->upload->display_errors();
       //print_r($data['error']);exit;
          $this->session->set_flashdata('error', 'Csv File Uploaded Failed');
                      //redirect($_SERVER['HTTP_REFERER'],'refresh');
          redirect('dealers/index');
     }
     else
     {
            $file_data = $this->upload->data();
            $file_path =  FCPATH.'server/assets/media/'.$file_data['file_name'];
            //print_r($this->csvimport->get_array($file_path));exit;
          
            if($this->csvimport->get_array($file_path))
            {
                  $csv_array = $this->csvimport->get_array($file_path);
                
                    foreach ($csv_array as $row)
                    {
                        $id = $this->db->get_where("users",array("acc_no"=>$row['ACCOUNT_NUMBER']))->row()->id;
                        
                        if($id != "")
                        {
                            if($row['MONTH'] != "")
                            {
                                 $data['achieved_sales'] =($row['ACHIEVED_SALES'])?$row['ACHIEVED_SALES']:'';
                                 $data['achieved_collection'] =($row['ACHIEVED_COLLECTION'])?$row['ACHIEVED_COLLECTION']:'';
                                 $data['achieved_product'] = ($row['ACHIEVED_PRODUCT'])?$row['ACHIEVED_PRODUCT']:'';
                        
                                 $id = $this->db->get_where("users",array("acc_no"=>$row['ACCOUNT_NUMBER']))->row()->id;
                                 $where['dealer_id'] = $id;
                                 $where['month'] = $row['MONTH'];
                                 $this->dealer_model->update_archieve($data,$where); 
                            }
                            else
                            {
                                 $data['achieved_sales'] =($row['ACHIEVED_SALES'])?$row['ACHIEVED_SALES']:'';
                                 $data['achieved_collection'] =($row['ACHIEVED_COLLECTION'])?$row['ACHIEVED_COLLECTION']:'';
                                 $data['achieved_product'] = ($row['ACHIEVED_PRODUCT'])?$row['ACHIEVED_PRODUCT']:'';
                        
                                 $id = $this->db->get_where("users",array("acc_no"=>$row['ACCOUNT_NUMBER']))->row()->id;
                                 //$where['id'] = $id;
                                 //$where['month'] = $row['MONTH'];
                                // $this->dealer_model->update_archieve($data,$where);
                                $this->db->set($data)->where('id',$id)->update("users");
                            }
                                 
                            
                            
                              $year_month = array("JANUARY","FEBRUARY","MARCH","APRIL","MAY","JUNE","JULY","AUGUST","SEPTEMBER","OCTOBER","NOVEMBER","DECEMBER");
                              $m=1;
                              foreach($year_month as $key=>$months)
                              {
                                    $achieved_targets = explode(',',$row[$months."_ACHIEVED_TARGETS"]);
                                  
                                    $where['dealer_id'] = $id;
                                    $where['month'] = $m;
                                    $d_data = $this->db->where($where)->order_by('id','asc')->get('dealer_product_targets')->result_array();
                                    $ai=0;
                                     foreach($d_data as $dkey=>$dval)
                                        {
                                            $this->db->set('achieved_targets',$achieved_targets[$ai])->where('id',$dval['id'])->update('dealer_product_targets');   
                                            //echo $this->db->last_query();
                                            $ai++;
                                        }
                               $m++;   
                              }
                              
                        }
                                          
                    }
                    
                    $this->session->set_flashdata('success', 'Csv Data Imported Succesfully');
                    redirect('dealers/index');
           }
           else
           {
              $data['error'] = "Error occured";
              redirect('dealers/index');
             //  $this->load->view('company', $data);
           }   
      }
}

    // To change status
    public function changestatus(){
        $id = $this->input->post('id');
        $status = $this->input->post('status');     
        $table_name = $this->input->post('table_name');     
        $data['action_status'] = $this->dealer_model->changestatus($id,$status,$table_name);
    }

    // To delete data
    public function deletedata(){
        $id = $this->input->post('id');
        $table_name = $this->input->post('table_name');
        $data['result'] = $this->dealer_model->deletedata($id,$table_name);
    }

    // For multiple action
    public function changeaction(){
        $id = $this->input->post('checked_id');
        $action = $this->input->post('action');
        $table_name = $this->input->post('table_name');
        $data['action_status'] = $this->dealer_model->changeaction($id,$action,$table_name);
    }




    //Add Super Users
    public function super_users()
    {
        $data['super_users'] = $this->dealer_model->get_super_users();
        $nRoleID = ($this->lib_auth->getRoleID() != 1) ? 1 : NULL;
        $arrData['arrRoles'] = $this->lib_roles->getRolesList($nRoleID);
        $arrData['getd'] = $this->dashboard_model->getdesignations();
        
        return $this->load->view('super_users/index',$data) ;
    }


    public function add_super_user($superuser_id=0)
    {       
        $data['super_user'] = [] ;
        if($superuser_id)
        {
            $data['super_user'] = $this->dealer_model->get_super_users($superuser_id);
        }

        $nRoleID = ($this->lib_auth->getRoleID() != 1) ? 1 : NULL;
        $arrData['arrRoles'] = $this->lib_roles->getRolesList($nRoleID);
        $arrData['getd'] = $this->dashboard_model->getdesignations();
        
        return $this->load->view('super_users/add',$data) ;
    }


    public function save_super_user()
    {
        $targets = $this->input->post('data');
        
        if($_FILES['file']['error']!=4)
        {
            $config['upload_path']    = 'server/assets/media/';
            $config['allowed_types']  = '*';
            $config['max_size']       = 1024 * 80;
            $config['file_name']      = "profile_".time();

            $this->load->library('upload', $config);

            if($this->upload->do_upload('file'))
            {
              $image = $this->upload->data();
            }
        }
        else
        {
            $image['file_name'] = ' ' ;
        }


                
        $string = "Jotun";
        $random_number = mt_rand(100000000, 999999999);
        $code = $string.$random_number;
        

        $password = '' ;
        if($this->input->post('password')!='')
        {
            $password = md5($this->input->post('password')) ;
        }

        $arrUser = array(
            'code'=> $code,
            'role_id'=> 2,
            'user_type'=> 9,
            'zone' => $this->input->post('zone'),
            'username' => $this->input->post('username'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'password' => $password,
            'status' => $this->input->post('status'),
            'profile_image'=>($image['file_name'])?$image['file_name']:'',
            'created' => date('Y-m-d h:i:s'),
        );

        if($password=='')
        {
            unset($arrUser['password']);
        }

        $id = $this->input->post('superuser_id');
        //echo "<pre>"; print_r($arrUser); exit;
        if($id)
        {
            $this->db->set($arrUser)->where('id',$id)->update('users') ;
        }
        else
        {
            $this->db->insert('users',$arrUser); 
        }

        

        $last_insert_id =  $this->db->insert_id();

        if($last_insert_id != "" && $this->lib_auth->getRoleID()==2){
            $this->session->set_flashdata('message', 'success');
            redirect('index.php/dealers/super_users');
        }
        else
        {
            $this->session->set_flashdata('message', 'success');
            redirect('index.php/dealers/super_users');
        }
    }

}

/* End of file dealers.php */
/* Location: ./application/controllers/dealers.php */

