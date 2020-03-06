<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model{
	
	public function getcountshops(){
		$query = $this->db->query('select * from `shops`');		
		return $rows = $query->num_rows();						
	}
	
	public function getcountusers(){
		$query = $this->db->query('select * from `users` where role_id=3');		
		return $rows = $query->num_rows();						
	}
	
	public function getemployees(){
                $manager_id = $this->lib_auth->getUserID();	
		$role_id = $this->lib_auth->getRoleID();
                if($role_id == 1){
		$query = $this->db->query('select * from `users` where role_id!=1 order by id desc limit 0,10');		
                }else{
                $query = $this->db->query('select * from `users` where created_by="'.$manager_id.'"');		
                }
		return $result = $query->result();
	}
	
	public function salesman_works($start="",$end="")
	{
	    $user_id = $this->lib_auth->getUserID();
	    $role = $this->lib_auth->getRoleID();
	    
	    if($start != "" && $end != "")
	    {
	        
	        if($role==2)
	        {
	            $salesmans = $this->db->query("select id,zone,username from users where role_id=3 and manager_id=$user_id")->result_array();
	        }
	        else
	        {
	            $salesmans = $this->db->query("select id,zone,username from users where role_id=3")->result_array();
	        }
	        
    	    $count=0;
    	    $works = array();
    	    foreach($salesmans as $value)
    	    {
    	        $works[$count]['id']=$value['id'];
    	        $works[$count]['zone']=$value['zone'];
    	        $works[$count]['name']=$value['username'];
    	        $works[$count]['dealers']= $this->db->where('user_id',$value['id'])->get("user_dealers")->num_rows();
    	        $works[$count]['shops']= $this->db->query("select * from dealers_shops where user_id in(select dealer_id from user_dealers where user_id='".$value['id']."')")->num_rows();
    	        $works[$count]['shops_visited']= $this->db->query("select distinct(shop_id) from tasks where status=3 and user_id ='".$value['id']."' and created >='".$start."' and created <='".$end."'")->num_rows();
    	        $works[$count]['visits']=$this->db->where(array('user_id'=>$value['id'],'status'=>3,'created >='=>$start,'created <='=>$end))->get("tasks")->num_rows();
    	        $count++;
    	    }
    	    //$result = $this->db->query("select GROUP_CONCAT(id) as form_ids from task_forms where task_id in(select id from tasks where user_id=$user_id AND created >= '".$start."' and created <= '".$end."') and form_id=$form_id and status!=1")->result_array();
    	    return $works;
	    }
	    else
	    {
	        if($role==2)
	        {
	            $salesmans = $this->db->query("select id,zone,username from users where role_id=3 and manager_id=$user_id")->result_array();
	        }
	        else
	        {
	            $salesmans = $this->db->query("select id,zone,username from users where role_id=3")->result_array();
	        }
	       
    	    $count=0;
    	    $works = array();
    	    foreach($salesmans as $value)
    	    {
    	        $works[$count]['id']=$value['id'];
    	        $works[$count]['zone']=$value['zone'];
    	        $works[$count]['name']=$value['username'];
    	        $works[$count]['dealers']= $this->db->where('user_id',$value['id'])->get("user_dealers")->num_rows();
    	        $works[$count]['shops']= $this->db->query("select * from dealers_shops where user_id in(select dealer_id from user_dealers where user_id='".$value['id']."')")->num_rows();
    	        $works[$count]['shops_visited']= $this->db->query("select distinct(shop_id) from tasks where status=3 and user_id ='".$value['id']."'")->num_rows();
    	        $works[$count]['visits']=$this->db->where(array('user_id'=>$value['id'],'status'=>3))->get("tasks")->num_rows();
    	        $count++;
    	    }
    	    return $works;
	    }
	    
	    
	    $result = $this->db->query("select GROUP_CONCAT(id) as form_ids from task_forms where task_id in(select id from tasks where user_id=$user_id AND created >= '".$start."' and created <= '".$end."') and form_id=$form_id and status!=1")->result_array();
	}
	
	public function getfilterdata($status){
		$manager_id = $this->lib_auth->getUserID();
                $role_id = $this->lib_auth->getRoleID();	
		if($status == ""){
			if($role_id == 1){
		        $query = $this->db->query('select * from `users` where role_id !=1');		
			}else{
			$query = $this->db->query('select * from `users` where created_by="'.$manager_id.'" and role_id != 1');		
			}
		}else{
			if($role_id == 1){
			$query = $this->db->query('select * from `users` where status="'.$status.'" and role_id != 1');		
			}else{
			$query = $this->db->query('select * from `users` where status="'.$status.'" and created_by="'.$manager_id.'" and role_id != 1');			
			}
		}
		return $result = $query->result();
	}
	
	public function getuserschartdata(){
    $year = date("Y"); 	
	$users_data=[];	
	for($m=1;$m<13;$m++){
	//query to get customers data 
	$users_qry = $this->db->query("SELECT MONTHNAME(created) as month ,count(id) as users_count FROM users WHERE YEAR(created)='$year'AND MONTH(created)='$m' AND role_id !='1' GROUP BY MONTH(created)");	
	$data['users_result'] = $users_qry->row_array();	
	$users_data[] = $data;	
	}
	return $users_data;
	}
	
	public function getshopschartdata(){
    	$year = date("Y"); 	
    	$shops_data=[];
    	for($m=1;$m<13;$m++){
    	//query to get employess data 
    	$shops_qry = $this->db->query("SELECT MONTHNAME(created) as month ,count(id) as shops_count FROM shops WHERE YEAR(created)='$year'AND MONTH(created)='$m' GROUP BY MONTH(created)");		
    	$data['shops_result'] = $shops_qry->row_array();		
    	$shops_data[] = $data; 
    	}		
    	return $shops_data; 	
	}
	
	public function get_products()
	{
	    return $this->db->get("products")->result_array();
	}
	
	public function get_sell_up_products()
	{
	    return $this->db->get("sell_up_products")->result_array();
	}


        // To get manager realted users data 
	
	public function getmanageruserschartdata(){
	$manager_id = $this->lib_auth->getUserID();	
    $year = date("Y"); 	
	$musers_data=[];	
	for($m=1;$m<13;$m++){
	//query to get customers data 
	$users_qry = $this->db->query("SELECT MONTHNAME(created) as month ,count(id) as users_count FROM users WHERE YEAR(created)='$year'AND MONTH(created)='$m' AND created_by='".$manager_id."'  GROUP BY MONTH(created)");	
	$data['manageruserschart_result'] = $users_qry->row_array();	
	$musers_data[] = $data;	
	}	
	return $musers_data;
	}
	
	
	// To perform Multiple action	
	public function changeaction($id,$action,$table_name){
		if($action == '1' || $action == '0'){
			$query = $this->db->query('update `'.$table_name.'` set status="'.$action.'" where id="'.$id.'"');						
		}else{
			$query = $this->db->query('delete from `'.$table_name.'` where id="'.$id.'"');
		}
        echo $this->db->affected_rows();		        
	}
	
	// To change status
	public function changestatus($id,$status,$table_name){
		if($status == '1'){
			$query = $this->db->query('update `'.$table_name.'` set status="0" where id="'.$id.'"');			
		}else{
			$query = $this->db->query('update `'.$table_name.'` set status="1" where id="'.$id.'"');			
		}
        echo $this->db->affected_rows();		
	}
	
	// To get managers using in add user page
	public function get_managers(){
		$query = $this->db->query("select * from users where role_id='2'");
		return $query->result_array();
	}
	
	// To Delete Data
	public function deletedata($id,$table_name){
        if($table_name == 'users'){
        		$this->db->query('delete from `'.$table_name.'` where id="'.$id.'"');
        		$this->db->query('delete from `tasks` where user_id="'.$id.'"');
        		$this->db->query('delete from `dealer_targets` where dealer_id="'.$id.'"');
        		$this->db->query('delete from `dealer_product_targets` where dealer_id="'.$id.'"');
        		$this->db->query('delete from `dealers_shops` where user_id="'.$id.'"');
        		$this->db->query('delete from `user_dealers` where user_id="'.$id.'"');
        		$this->db->query('delete from `dealer_targets` where dealer_id="'.$id.'"');
        		echo $this->db->affected_rows();
        }else{
                $this->db->query('delete from `'.$table_name.'` where id="'.$id.'"');
                $this->db->query('delete from `tasks` where shop_id="'.$id.'"');
               // $this->db->query('delete from `user_shops` where shop_id="'.$id.'"');
        		echo $this->db->affected_rows();
        }
	}	

        // Get Designations used in adding user
	public function getdesignations(){
                $user_id =  $this->lib_auth->getUserID();	
		$query = $this->db->query("select * from `designations` where status='1' and created_by='".$user_id."'");
		return $query->result();
	}


        // Get Edit Designations used in editing user
	public function geteditdesignations($nID){
		$query = $this->db->query("select designation from `users` where id='".$nID."'");
		return $query->row_array();
	}
	
	
	// Get Edit Managers used in editing user
	public function geteditmanagers($nID){
		$query = $this->db->query("select created_by from `users` where id='".$nID."'");				
		return $query->row_array();		
	}


	// Getting shop names used in adding user_error
	public function getshopnames(){
	    	$query = $this->db->query("select * from `shops` order by name asc");
		return $query->result_array();
	}
	
	// Getting shop names used in adding user_error
	public function getshopnames_by_zone($zone){
	    	$query = $this->db->query("select * from `shops` where address=$zone order by name asc");
		return $query->result_array();
	}
	
	// Getting Dealer names used in adding
	public function get_dealer_names(){
		$query = $this->db->query("select * from `users` where role_id = 4 order by username asc");
		return $query->result_array();
	}
	
		// Getting Dealer names used in adding
	public function get_user_dealer_names($user_id){
		$query = $this->db->query("select * from `users` where role_id = 4 and id in(select dealer_id from user_dealers where user_id=$user_id) order by username asc");
		return $query->result_array();
	}
	
	public function get_dealer_names_by_zone($zone){
		$query = $this->db->query("select * from `users` where role_id = 4 and zone in($zone) order by username asc");
		return $query->result_array();
	}
	
	
	// Get Profile details
	public function getprofile_details($user_id){
		$query = $this->db->query("select * from `users` where id='".$user_id."'");
		return $query->row_array();
	}
	
	// To update profile
	public function update_profile($user_id,$data){
		$this->db->where('id',$user_id);
		$this->db->update('users',$data);
		return $this->db->affected_rows();		
	}


public function updateUser($user_id,$data){
		$query = $this->db->query("delete from `user_dealers` where user_id='".$user_id."'");
		$this->db->where('id',$user_id);
		$this->db->update('users',$data);
		if($data['role_id'] != 1){
		/*$shops = $this->input->post('shop_id');
		$shops_count = count($shops);	
		
		for($i=0;$i<$shops_count;$i++){
			$shops_data = array(
			'user_id' => $user_id,
			'shop_id' => $shops[$i],
			'created' => $date_time
			);
			$query = $this->db->insert('user_shops',$shops_data);
		}*/
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
		}
        return  $this->db->affected_rows();		
	}


public function unassign_task($task_id,$task_form_id){
$query = $this->db->query("select * from `task_forms` where task_id='".$task_id."'");
$rows = $query->num_rows();
if($rows == 2){
$query = $this->db->query("update `tasks` set status='3' where id='".$task_id."'");
}

if($rows == 1){
$query = $this->db->query("delete from `tasks` where id='".$task_id."'");
}
$query = $this->db->query("delete from `task_forms` where id='".$task_form_id."'");
echo $this->db->affected_rows();
}

	
}
?>
