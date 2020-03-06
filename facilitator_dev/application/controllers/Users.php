<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    /**
     * __construct method
     */
    function __construct() {
        parent::__construct();

        //load Model
        $this->load->model('dashboard_model');
        $this->load->model('user_model');
        $this->load->model('dealer_model');
        $this->load->model('sales_model');
        //$this->load->database();
        
        // Check login
        $this->lib_auth->checkUriPermissions();

        // Load Lib_Users Library
        $this->load->library(array('Lib_Users', 'Lib_Roles'));
    }

    /**
     * _remap method
     *
     * @param string $strMethod
     * @param string[] $arrParams
     * @return void
     */
    public function _remap($strMethod, $arrParams = array()) {
        if (method_exists($this, $strMethod))
            return call_user_func_array(array($this, $strMethod), $arrParams);

        return show_404();
    }

    /**
     * index method
     *
     * @param integer $nOffset
     * @return void
     */
    public function index() {
        
        // // Limit
        // $arrData['nLimit'] = $nLimit = 20;
        // $arrData['nOffset'] = $nOffset;

        // // Offset
        // $nOffset = $nLimit * ($nOffset - 1);

        // // Get users for pagination
        // $nCreatedBy = ($this->lib_auth->getRoleID() != 1) ? $this->lib_auth->getUserID() : NULL;
        // $arrData += $this->lib_users->getUsersForPagination($nLimit, $nOffset, $nCreatedBy);

        // // Load Lib_Pagination library
        // $this->load->library('Lib_Pagination');

        // // Pagination
        // //$strBaseUrl = base_url($this->config->item('users_index_uri'));
        // $strBaseUrl = base_url().'index.php/users/'.$this->uri->segment(2);
        // $nTotalRows = $arrData['nTotalRows'];
        // $arrData['strPagination'] = $this->lib_pagination->pagination($strBaseUrl, $nTotalRows, $nLimit, 3);
        // return $this->load->view($this->config->item('template_view'), $arrData);
        $data['users'] =  $this->user_model->get_all_users();
        $this->load->view('users/user_index',$data);
    }
    
    public function users_index()
    {
        $data['users'] =  $this->user_model->get_all_users();
        $this->load->view('users/user_index',$data);
    }
    
    public function email_exists()
    {
        $email = $this->input->post('email');
    	$this->db->where('email', $email);
    	$query = $this->db->get('users');
    	if( $query->num_rows() > 0 ){ 
    	    echo "This Email Already Exist"; 
    	}
    }
    
    public function edit_email_exists()
    {
        $email = $this->input->post('email');
        $user_id = $this->input->post('user_id');
    	$this->db->where('email', $email);
    	$this->db->where('id !=', $user_id);
    	$query = $this->db->get('users');
    	if( $query->num_rows() > 0 ){ 
    	    echo "This Email Already Exist"; 
    	}
    }
    
    public function reset_password()
    {
        $user_id  =$this->input->post("user_id");
        $data['password']  = md5($this->input->post('password'));
        $this->db->where("id",$user_id)->update("users",$data);
    }

    /**
     * add method
     *
     * @return void
     */
   public function add()
    {		
		//$arrData['shops'] = $this->dashboard_model->getshopnames();
		$arrData['dealers'] = $this->dashboard_model->get_dealer_names();
		//echo "<pre>";print_r($arrData);exit;
		$nRoleID = ($this->lib_auth->getRoleID() != 1) ? 1 : NULL;
		$arrData['arrRoles'] = $this->lib_roles->getRolesList($nRoleID);
		$arrData['getd'] = $this->dashboard_model->getdesignations();
        return $this->load->view($this->config->item('template_view'), $arrData);
    }


	public function add_user(){
	    
            $string = "Jotun";
            $random_number = mt_rand(100000000, 999999999);
            $code = $string.$random_number;

		$manager_id = $this->input->post('manager_id');
		$created = $this->lib_auth->getUserID();
		$u_zones = $this->input->post('zone');
         $zones = implode(',',$u_zones);
	 // User
        $arrUser = array(
            'code' => $code,
            'username' => $this->input->post('username'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'zone' =>$zones,
            'status' => $this->input->post('status'),
            'role_id' => $this->input->post('role_id'),
            'manager_id'=>(@$manager_id)?($manager_id):0,
            /*'product_target_m' => ($this->input->post('product_target_m'))?$this->input->post('product_target_m'):'',
            'collection_target_m' => ($this->input->post('collection_target_m'))?$this->input->post('collection_target_m'):'',
            'sales_target_m' => ($this->input->post('sales_target_m'))?$this->input->post('sales_target_m'):'',
            'achieved_sales_m' => ($this->input->post('achieved_sales_m'))?$this->input->post('achieved_sales_m'):'',
            'achieved_collection_m' => ($this->input->post('achieved_collection_m'))?$this->input->post('achieved_collection_m'):'',
            'achieved_product_m' => ($this->input->post('achieved_product_m'))?$this->input->post('achieved_product_m'):'',
            'product_target_y' => ($this->input->post('product_target_y'))?$this->input->post('product_target_y'):'',
            'collection_target_y' => ($this->input->post('collection_target_y'))?$this->input->post('collection_target_y'):'',
            'sales_target_y' => ($this->input->post('sales_target_y'))?$this->input->post('sales_target_y'):'',
            'achieved_sales_y' => ($this->input->post('achieved_sales_y'))?$this->input->post('achieved_sales_y'):'',
            'achieved_collection_y' => ($this->input->post('achieved_collection_y'))?$this->input->post('achieved_collection_y'):'',
            'achieved_product_y' => ($this->input->post('achieved_product_y'))?$this->input->post('achieved_product_y'):'',*/
            'created_by' =>($manager_id)?$manager_id:$created,   
            'created' => date('Y-m-d h:i:s'),        
            'designation' => $this->input->post('designation')
        );		
       // print_r($arrUser);
        //exit;
		$this->db->insert('users',$arrUser);
		$user_id =  $this->db->insert_id(); 
		
		$date_time = date('Y-m-d h:i:s');
		$dealers = $this->input->post('dealers');
		$dealers_count = count($dealers);
		for($i=0;$i<$dealers_count;$i++){
			$dealers_array = array(
			'user_id' => $user_id,
			'dealer_id' => $dealers[$i],
			'created' => $date_time
 			);			
		   $this->db->insert('user_dealers',$dealers_array);
		}
		$last_insert_id =  $this->db->insert_id(); 
		if($last_insert_id != ""){
			$this->session->set_flashdata('message', 'success');
			redirect('index.php/users/users_index');
		}			
    }



    /**
     * view method
     *
     * @param integer $nID
     * @return void
     */
    public function view($nID) {
        // Get user by ID
        $arrData['objUser'] = $objUser = $this->lib_users->getUserByID($nID);

        // Check status
        if (!$objUser) {
            $this->session->set_flashdata('flash_failure', $this->lib_users->strFlashMessage);
            redirect($this->config->item('users_index_uri'));
        }

        return $this->load->view($this->config->item('template_view'), $arrData);
    }

    public function live_track($id = NULL) {
        if (empty($id)) {
            $data = array(
                "online_state" => 1
            );
            $data['geo'] = $this->user_model->online_users($data)->result_array();

            return $this->load->view($this->config->item('template_view'), $data);
        } else {
            $data = array(
                "created_by"=>$id,
                "online_state" => 1
            );
            $data['geo'] = $this->user_model->online_users($data)->result_array();
            return $this->load->view($this->config->item('template_view'), $data);
        }
    }

    /**
     * edit method
     *
     * @param integer $nID
     * @return void
     */
    public function edit($nID) {
       
        // Check ajax request
        if (!$this->input->is_ajax_request()) {
            // Get user by ID
            $arrData['objUser'] = $objUser = $this->dealer_model->getDealerByID($nID);

                  	//Get shops
			//$arrData['arrShops'] = $this->sales_model->getShopsList($nID);			
			$arrData['arrShops'] = $this->sales_model->getDealersList($nID);
			 //print_r($arrData['arrShops']); exit;
			//$arrData['dealers'] = $this->dashboard_model->get_dealer_names();
			//$arrData['dealers'] = $this->dashboard_model->get_user_dealer_names($nID);
			$arrData['dealers'] = $this->dashboard_model->get_dealer_names_by_zone($this->user_model->getUser_ByID($nID)->zone);

            // Get roles list
            $nRoleID = ($this->lib_auth->getRoleID() != 1) ? 1 : NULL;
            $arrData['arrRoles'] = $this->lib_roles->getRolesList($nRoleID);

            // Get Designation of particular user id
            $arrData['geteditd'] = $this->dashboard_model->geteditdesignations($nID);

            // Get Designation list
            $arrData['getd'] = $this->dashboard_model->getdesignations();

            // Get Manager of particular user id
            $arrData['geteditm'] = $this->dashboard_model->geteditmanagers($nID);
            
            //$arrData['monthly_targets'] = $this->user_model->get_user_targets_based_on_dealers_sum($nID);
            //$arrData['yearly_targets'] = $this->user_model->get_user_targets_based_on_dealer_year_targets($nID);
            
            $months = array("january","february","march","april","may","june","july","august","september","october","november","december");
            foreach($months as $key=>$month){
                $arrData['year'][$month] =$this->user_model->get_user_edit_targets_based_on_dealers_sum($nID,$key+1);
            }
            $arrData['yearly'] =$this->user_model->get_user_edit_targets_based_on_dealer_year_targets($nID);
            
             // Get Managers list
            $arrData['getm'] = $this->dashboard_model->get_managers();

            // Check status
            /*if (!$objUser) {
                $this->session->set_flashdata('flash_failure', $this->lib_users->strFlashMessage);
                redirect($this->config->item('users_index_uri'));
            }*/
                   
            return $this->load->view($this->config->item('template_view'), $arrData);
        }

       $manager_id = $this->input->post('manager_id');
        if ($this->lib_auth->getRoleID() == '1') {
            if ($manager_id == "") {
                $created = $this->lib_auth->getUserID();
            } else {
                $created = $manager_id;
            }
        } else {
            $created = $this->lib_auth->getUserID();
        }

        // User
        $arrUser = array(
            'username' => $this->input->post('username'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'status' => $this->input->post('status'),
            'role_id' => $this->input->post('role_id'),
            'created_by' => $created,
            'designation' => $this->input->post('designation')
        );

        // Update user
        $objResult = $this->lib_users->updateUser($arrUser, $nID);
        echo json_encode($objResult);
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
        $objResult = $this->lib_users->deleteUser($nID);
        echo json_encode($objResult);
        return;
    }

    /**
     * ajax_get_users_by_search method
     *
     * @return object
     */
   public function ajax_get_users_by_search() {
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

        // Get users by search
        $nCreatedBy = ($this->lib_auth->getRoleID() != 1) ? $this->lib_auth->getUserID() : NULL;
        $arrData += $this->lib_users->getUsersForPagination($nLimit, $nOffset, $nCreatedBy, $strSearch);

        // Load Lib_Pagination library
        $this->load->library('Lib_Pagination');

        // Pagination
        $strUrlSuffix = !empty($strSearch) ? '?search=' . $strSearch : '';
        $strBaseUrl = base_url($this->config->item('users_ajax_get_users_by_search_uri')) . $strUrlSuffix;
        $nTotalRows = $arrData['nTotalRows'];
        $arrData['strPagination'] = $this->lib_pagination->pagination($strBaseUrl, $nTotalRows, $nLimit, 3, '?' . http_build_query($_GET, '', '&'));
        $arrData['nIsAjax'] = 1;

        // Result
        $arrResult = array(
            'result' => array(
                'success' => true,
                'view' => $this->load->view($this->config->item('users_table_view'), $arrData, true),
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

		$data['success'] = $this->dashboard_model->update_profile($user_id,$data);
		if($data['success'] != ""){
            $this->session->userdata('auth_me')->profile_image = $image;
			$this->session->set_flashdata('message','success');
			redirect('users/edit_profile/'.$user_id.'');
		}else{
			$this->session->set_flashdata('message','failed');
			redirect('users/edit_profile/'.$user_id.'');
		}
	}


public function update_user($user_id)
{

    $role_id = $this->input->post('role_id');
    if($role_id == 1 || $role_id == 2){
        $created_by = 0;
    }else{
       $created_by =  $this->input->post('manager_id');
    }
        $u_zones = $this->input->post('zone');
         $zones = implode(',',$u_zones);
		$data  = array(
		'username' => $this->input->post('username'),
		'first_name' => $this->input->post('first_name'),
		'last_name' => $this->input->post('last_name'),
		'phone' => $this->input->post('phone'),
		'email' => $this->input->post('email'),
		'status' => $this->input->post('status'),
		'zone' => $zones,
		'role_id' => $this->input->post('role_id'),
		'designation' => $this->input->post('designation'),
		'created_by' => $created_by,
		'manager_id'=>$this->input->post('manager_id'),
		);
		$data['result'] = $this->dashboard_model->updateUser($user_id,$data);	
		if($data['result'] != ""){
			$this->session->set_flashdata('message','success');
			redirect('users/edit/'.$user_id.'');
		}
		else
		{
		    $this->session->set_flashdata('message','Faild');
			redirect('users/edit/'.$user_id.'');
		}
	}

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */

