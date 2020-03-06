<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shops extends CI_Controller
{
    public $api;

    /**
     * __construct method
     */
    function __construct()
    {
        parent::__construct();

        // Load Model
        $this->load->model('sales_model');

        $this->load->model('dealer_model');
        $this->load->model('sales_model');
        $this->load->helper('dropdown');

        // Check login
        $this->lib_auth->checkUriPermissions();

        // Load Lib_Shops Library
        $this->load->library(array('Lib_Shops','Lib_Shop_Types'));
    }

    /**
     * _remap method
     *
     * @param string $strMethod
     * @param string[] $arrParams
     * @return void
     */
    public function _remap($strMethod, $arrParams = array())
    {
        if(method_exists($this, $strMethod))
            return call_user_func_array(array($this, $strMethod), $arrParams);

        return show_404();
    }

    /**
     * index method
     * @param integer $nOffset
     * @return void
     */
     
    public function index()
    { 
        // Limit

        // Get shop types list
        $arrData['arrShopTypes'] = $this->lib_shop_types->getShopTypesList();

	    //get shop types
		$arrData['types'] = $this->sales_model->get_shop_types();

        $arrData['objShops'] = $this->sales_model->get_shops();
        
        $super_user_id = $this->lib_auth->getUserID() ; 
        $superuser_details = $this->db->where('id',$super_user_id)->get('users')->row_array();

        if(@$superuser_details['role_id']==2 && @$superuser_details['user_type']==9)
        {
            $arrData['objShops'] = $this->sales_model->super_user_shops();
            return $this->load->view($this->config->item('template_view'), $arrData);
        }

        return $this->load->view($this->config->item('template_view'), $arrData);
    }


    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
       /* // Check ajax request
        if (!$this->input->is_ajax_request())
        {
            //get dealers list
            // $arrData['dealers'] = $this->dealer_model->getdealers();
            // Get shop types list
            $arrData['arrShopTypes'] = $this->lib_shop_types->getShopTypesList();                   

            return $this->load->view($this->config->item('template_view'), $arrData);
        }
*/
                $config['upload_path']          = 'server/assets/media/';
                $config['allowed_types']	 	= '*';
			    $config['max_size'] 			= 1024 * 80;
			    $config['file_name'] 			= "shop_image".time();

                $this->load->library('upload', $config);

                if($this->upload->do_upload('file'))
                {
                  $image = $this->upload->data();
                }
                
         // Shop
        $arrShop = array(
            'name' => $this->input->post('name'),
            'zone' => $this->input->post('address'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),
            'last_evaluation' => $this->input->post('last_evaluation'),
            'shop_type_id' => $this->input->post('shop_type_id'),
            'acc_no' => $this->input->post('acc_no'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'created' => date('Y-m-d H:i:s', time()),
            'address_search' => $this->input->post('address_search'),
            'door_number'=>($this->input->post('door_no'))?$this->input->post('door_no'):"",
            'address'=>($this->input->post('address_search'))?$this->input->post('address_search'):"",
            'street_number'=>($this->input->post('street_number'))?$this->input->post('street_number'):"",            
            'colony'=>($this->input->post('route'))?$this->input->post('route'):"",
            'distric'=>$this->input->post('locality'),
            'province'=>$this->input->post('province'),            
            'postal_code'=>($this->input->post('postal_code'))?$this->input->post('postal_code'):"",
            'country'=>$this->input->post('country'),
            //'dealer_id'=>$this->input->post('dealer_id'),
            //'sales_target'=>($this->input->post('sales_target'))?$this->input->post('sales_target'):"",
            //'purchase_target'=>($this->input->post('purchase_target'))?$this->input->post('purchase_target'):"",
            //'goods_target'=>($this->input->post('goods_target'))?$this->input->post('goods_target'):"",
            'image'=>($image['file_name'])?$image['file_name']:'',

        );
        $this->db->insert("shops",$arrShop);
        $shop_id =  $this->db->insert_id(); 
        $dealer_data = $this->db->query("select * from users where acc_no='".$this->input->post('acc_no')."'")->row();
        if(!empty($dealer_data))
        {
             $shop_array = array(
			'user_id' => $dealer_data->id,
			'shop_id' => $shop_id,
			'created' =>date('Y-m-d h:i:s')
 			);
 		  $this->db->insert('dealers_shops',$shop_array);
        }
        
    }

    /**
     * view method
     *
     * @param integer $nID
     * @return void
     */
    public function view($nID)
    {
        // Get shop by ID
        $arrData['objShop'] = $objShop = $this->lib_shops->getShopByID($nID);

        // Check status
        if (!$objShop)
        {
            $this->session->set_flashdata('flash_failure', $this->lib_shops->strFlashMessage);
            redirect($this->config->item('shops_index_uri'));
        }

        return $this->load->view($this->config->item('template_view'), $arrData);
    }

   /**
     * edit method
     *
     * @param integer $nID
     * @return void
     */
     
     
     
     
   /* public function edit($nID)
    {
        // Check ajax request
        if (!$this->input->is_ajax_request())
        {
            // Get shop by ID
            $arrData['objShop'] = $objShop = $this->lib_shops->getShopByID($nID);
            // Get shop types list
            $arrData['arrShopTypes'] = $this->lib_shop_types->getShopTypesList();

            // Check status
            if (!$objShop)
            {
                $this->session->set_flashdata('flash_failure', $this->lib_shops->strFlashMessage);
                redirect($this->config->item('shops_index_uri'));
            }

            return $this->load->view($this->config->item('template_view'), $arrData);
        }

        // Shop
        $arrShop = array(
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),
            'last_evaluation' => $this->input->post('last_evaluation'),
            'shop_type_id' => $this->input->post('shop_type_id'),
            'acc_no' => $this->input->post('acc_no'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'status'=>  $this->input->post('status'),
            'address_search' => $this->input->post('address_search'),
            'door_number'=>$this->input->post('door_no'),
            'street_number'=>$this->input->post('street_number'),            
            'colony'=>$this->input->post('route'),
            'distric'=>$this->input->post('locality'),
            'province'=>$this->input->post('province'),            
            'postal_code'=>$this->input->post('postal_code'),
            'country'=>$this->input->post('country')
        );

        // Image
        $arrShop += ($this->input->post('image')) ? array('image' => $this->input->post('image')) : array();

        // Update shop
        $objResult = $this->lib_shops->updateShop($arrShop, $nID);

        echo json_encode($objResult);
        return;
    } ************/
    
    
    
    /**
     * delete method
     *
     * @param integer $nID
     * @return void
     */
    public function delete($nID)
    {
        // Delete shop
        $objResult = $this->lib_shops->deleteShop($nID);
        echo json_encode($objResult);
        return;
    }

    /**
     * ajax_get_shops_by_search method
     *
     * @return void
     */
    public function ajax_get_shops_by_search()
    {
            // Check the ajax request
        if (!$this->input->is_ajax_request())
        {
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
        $nShopTypeID = $this->input->get('shop_type_id');
        $nStatus = $this->input->get('status');

        // Limit
        $arrData['nLimit'] = $nLimit = 9;
        $arrData['nOffset'] = $nOffset = !($this->input->get('page', TRUE)) ? $this->input->get('page', TRUE) : 1;

        // Offset
        $nOffset = $nLimit * ($nOffset - 1);

        // Get shops by search
        $arrData += $this->lib_shops->getShopsForPagination($nLimit, $nOffset, NULL, $nStatus, $nShopTypeID);

        // Load Lib_Pagination library
        $this->load->library('Lib_Pagination');

        // Pagination
        $strUrlSuffix = ($nShopTypeID) ? '?shop_type_id='.$nShopTypeID.'&' : '';
        $strUrlSuffix .= ($strUrlSuffix) ? (($nStatus) ? 'status='.$nStatus : '') : (($nStatus) ? '?status='.$nStatus : '');
        $strBaseUrl = base_url($this->config->item('shops_ajax_get_shops_by_search_uri')).$strUrlSuffix;
        $nTotalRows = $arrData['nTotalRows'];
        $arrData['strPagination'] = $this->lib_pagination->pagination($strBaseUrl, $nTotalRows, $nLimit, 5, '?'.http_build_query($_GET, '', '&'));
        $arrData['nIsAjax'] = 1;

        // Result
        $arrResult = array(
            'result' => array(
                'success' => true,
                'view' => $this->load->view($this->config->item('shops_table_view'), $arrData, true),
                'pagination' => $this->load->view($this->config->item('pagination_view'), $arrData, true)
            )
        );

        echo json_encode($arrResult);
        return;
    }

/**
 * file_upload method
 *
 * @return void
 */
    public function file_upload($value, $field) 
    {
        return $this->form_validation->file_upload($value, $field);
    }
    
        function csvuploadfile(){
        
        
         $config['upload_path'] = './public/csv_bulk_upload_files/';
        $config['allowed_types'] = 'csv';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '1000';
 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
 
        // If upload failed, display error
        if (!$this->upload->do_upload('csv')) {
            $data['error'] = $this->upload->display_errors();
            echo json_encode($data);exit;
        } else {
            $file_data = $this->upload->data();
            $file_path =  base_url().'public/csv_bulk_upload_files/'.$file_data['file_name'];
        }
        
        $this->readExcel($file_path);
    }
   function readExcel($file_path) {
        $this->load->database();
        $this->load->library('csvreader');

        $result = $this->csvreader->parse_file($file_path); 

        $csvData = $result;
        $i=0;
        $j=0;
        foreach($csvData as $data)
        {
            $this->db->insert('shops',$data);
            $result=($this->db->affected_rows() != 1) ? false : true;
           if($result)
           {
               $j++;
           }else{
               $i++;
           }
           
        }
      $final['success']=$j;
      $final['unsuccess']=$i;
      echo json_encode($final);
      exit;

    }

        // Added By Eswar 21-4-2017
        public function manager_shops($created_by){
                $data['shops_result'] = $this->sales_model->getusers($created_by);                  
                //echo"<pre>";print_r($data['shops_result']);exit;
                $this->load->view($this->config->item('template_view'), $data); 
        }  

        public function getshops_type(){
    		$type = $this->input->post('type');
    		$data['objShops'] = $this->sales_model->getshops_type($type);		
    		$this->load->view('shops/shops_result',$data);
    	}


        public function getshops_statusfilter(){
                $status  = $this->input->post('status');
         	    $data['objShops'] = $this->sales_model->getshops_statusfilter($status);
                $this->load->view('shops/shops_result',$data);
        }
        
        
        // Added By Eswar 06-09-2017
        public function get_shops_zone(){
            $zone = $this->input->post('zone_id');
            $data['objShops'] = $this->sales_model->get_shops_zones($zone);
            $this->load->view('shops/shops_result',$data);
        }
        
        
        
        // Added By Eswar 06-12-2017
        public function add_shop(){
           
            //get dealers list
            $dealers = $this->dealer_model->getdealers();
            $arrData['dealers'] = dropdowncreate($dealers,'id','username');

            // Get shop types list
            $arrData['arrShopTypes'] = $this->lib_shop_types->getShopTypesList();

    	    //get shop types
    		$arrData['types'] = $this->sales_model->get_shop_types();
            $arrData['objShops'] = $this->sales_model->get_shops();

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
        
        
        
        public function edit_shop($shop_id){
            // Shop
                $config['upload_path']          = 'server/assets/media/';
                $config['allowed_types']	 	= '*';
			    $config['max_size'] 			= 1024 * 80;
			    $config['file_name'] 			= "shop_image".time();

                $this->load->library('upload', $config);

                if($this->upload->do_upload('file'))
                {
                  $image = $this->upload->data();
                }
                
                $imag = $this->sales_model->getshopname($shop_id)['image']; 
                
            $arrShop = array(
                'name' => $this->input->post('name'),
                'zone' => $this->input->post('address'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'last_evaluation' => $this->input->post('last_evaluation'),
                'shop_type_id' => $this->input->post('shop_type_id'),
                'acc_no' => $this->input->post('acc_no'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'status'=>  $this->input->post('status'),
                'address_search' =>($this->input->post('address_search'))?$this->input->post('address_search'):"",
                'address'=>($this->input->post('address_search'))?$this->input->post('address_search'):"",
                'door_number'=>$this->input->post('door_no'),
                'street_number'=>$this->input->post('street_number'),            
                'colony'=>$this->input->post('route'),
                'distric'=>$this->input->post('locality'),
                'province'=>$this->input->post('province'),            
                'postal_code'=>$this->input->post('postal_code'),
                'country'=>$this->input->post('country'),
                'image'=>($image['file_name'])?$image['file_name']:$imag,
                //'sales_target'=>$this->input->post('sales_target'),
                //'purchase_target'=>$this->input->post('purchase_target'),
                //'goods_target'=>$this->input->post('goods_target'),
                //'dealer_id'=>$this->input->post('dealer_id')
            );
            
            $rows = $this->sales_model->edit_shop($shop_id,$arrShop);
            $this->db->delete('dealers_shops',array('shop_id'=>$shop_id));
            $dealer_data = $this->db->query("select * from users where acc_no='".$this->input->post('acc_no')."'")->row();
            if(!empty($dealer_data))
            {
                 $shop_array = array(
    			'user_id' => $dealer_data->id,
    			'shop_id' => $shop_id,
    			'created' =>date('Y-m-d h:i:s')
     			);
     		  $this->db->insert('dealers_shops',$shop_array);
            }
            
           // echo $rows;exit;
            if($rows == 1){
            $this->session->set_flashdata('update','success');
			redirect('index.php/shops/index');
            }else{
                redirect('index.php/shops/index');
            }
        }
        
        
        public function edit($nID)
        {
            //$dealers = $this->dealer_model->getdealers();
           // $arrData['dealers'] = dropdowncreate($dealers,'id','username');

            // Get shop by ID
            $arrData['objShop'] = $this->sales_model->getShopByID($nID);
            // Get shop types list
            $arrData['arrShopTypes'] = $this->lib_shop_types->getShopTypesList();

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
        

}

/* End of file shops.php */
/* Location: ./application/controllers/shops.php */

