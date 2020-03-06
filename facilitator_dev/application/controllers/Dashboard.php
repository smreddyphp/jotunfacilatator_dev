<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{

	/**
	 * __construct method
	 *
	 * @return void
	 */
    public function __construct() 
    {
        parent::__construct();
		
		//load Model
		$this->load->model('dashboard_model');
		
        // Check login
        $this->lib_auth->checkUriPermissions();

        // Load Lib_Dashboard Library
        $this->load->library('Lib_Dashboard');
    }

    /**
	 * index method
	 *
	 * @return void
	 */
         public function index(){   
		 $data['shops'] = $this->dashboard_model->getcountshops();		 
		 $data['users'] = $this->dashboard_model->getcountusers();		 
		 $data['emp'] = $this->dashboard_model->getemployees();	 
		 $data['userschart'] = $this->dashboard_model->getuserschartdata();	
		 $data['shopschart'] = $this->dashboard_model->getshopschartdata();	
		 
		 // checking if role is not an admin
		 if($this->lib_auth->getRoleID() != '1'){			 
		 $data['manageruserschart'] = $this->dashboard_model->getmanageruserschartdata();
         $musersc ='[';			 
		 for($i=0; $i<12; $i++){
			$count = $data['manageruserschart'][$i]['manageruserschart_result']['users_count'];					
			if($count > 0){
				$musersc.=$count.",";
			}else{
				$musersc.="0,";
			}
		 }	 				
		 $musersc = rtrim($musersc,",");	
		 //end
		 $musersc.="]";			
		 $data['musersc'] = $musersc; 		 
		 }
		 
		 $usersc ='[';			 
		 for($i=0; $i<12; $i++){
			$count = $data['userschart'][$i]['users_result']['users_count'];					
			if($count > 0){
				$usersc.=$count.",";
			}else{
				$usersc.="0,";
			}
		 }	 				
		 $usersc = rtrim($usersc,",");	
		 //end
		 $usersc.="]";			
		 $data['usersc'] = $usersc; 


		 $shopsc ='[';			 
		 for($i=0; $i<12; $i++){
			$count = $data['shopschart'][$i]['shops_result']['shops_count'];					
			if($count > 0){
				$shopsc.=$count.",";
			}else{
				$shopsc.="0,";
			}
		 }	 				
		 $shopsc = rtrim($shopsc,",");	
		 //end
		 $shopsc.="]";			
		 $data['shopsc'] = $shopsc; 		 
		 $this->load->view($this->config->item('template_view'),$data);		
     }
	
	// To get filter data
	public function getfilterdata(){
		$status = $this->input->post('status');
		$data['result'] = $this->dashboard_model->getfilterdata($status);		
		return $this->load->view('users/resultdata',$data);
	}
	
	
	// For multiple action
	public function changeaction(){
		$id = $this->input->post('checked_id');
		$action = $this->input->post('action');
		$table_name = $this->input->post('table_name');
		$data['action_status'] = $this->dashboard_model->changeaction($id,$action,$table_name);
	}
	
	public function search_salesman_work()
	{
	    $star = $this->input->post('start');
        $en = $this->input->post('end');
        
        if($star != "" && $en != "")
        {
            $start = date("Y-m-d H:i:s",strtotime($star));
            $end = date("Y-m-d H:i:s",strtotime($en));
            $data['sales_works'] = $this->dashboard_model->salesman_works($start,$end);
            $this->load->view('dealers/salesman_works',$data);
        }
        else
        {
            $data['sales_works'] = $this->dashboard_model->salesman_works();
            $this->load->view('dealers/salesman_works',$data);
        }
        
        
	}
	
	// To change status
	public function changestatus(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');		
		$table_name = $this->input->post('table_name');		
		$data['action_status'] = $this->dashboard_model->changestatus($id,$status,$table_name);
	}
	
	// To get managers list using in add user page
	public function get_managers(){		
		$data['mresult'] = $this->dashboard_model->get_managers();
        $this->load->view('users/manager',$data);
	}
	
	// To delete data
	public function deletedata(){
		$id = $this->input->post('id');
		$table_name = $this->input->post('table_name');
		$data['result'] = $this->dashboard_model->deletedata($id,$table_name);
	}

    public function unassign_task(){
        $task_id = $this->input->post('task_id');
        $task_form_id = $this->input->post('task_form_id');
        $data['result']  = $this->dashboard_model->unassign_task($task_id,$task_form_id);
    }
    
    public function products()
    {
        $data['products'] = $this->dashboard_model->get_products();
        $this->load->view('dealers/products',$data);
    }
    
    public function sell_up_products()
    {
        $data['products'] = $this->dashboard_model->get_sell_up_products();
        $this->load->view('dealers/sell_up_products',$data);
    }
    
    public function salesman_work()
    {
        //echo "hai";exit;
        $data['sales_works'] = $this->dashboard_model->salesman_works();
       // print_r($data['sales_works']);exit;
        $this->load->view('dealers/salesman_works',$data);
    }
    
    public function update_product_data($id)
    {
        $this->load->view("dealers/product_edit_model");
    }
		
}
