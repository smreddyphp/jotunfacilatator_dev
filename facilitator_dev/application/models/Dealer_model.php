<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dealer_model extends CI_Model {
    

    function __construct()
    {
    	parent::__construct();
    	$this->_table = 'users';
    }
    
    function get_dealers()
    {
        $super_user_id = $this->lib_auth->getUserID() ; 
        $superuser_details = $this->db->where('id',$super_user_id)->get('users')->row_array();
        if(@$superuser_details['role_id']==2 && @$superuser_details['user_type']==9)
        {
            $this->db->where('zone',$superuser_details['zone']);
        }

        $this->db->where('role_id','4');
        return $this->db->get("users")->result();
    }
    
    function getDealersForPagination($p_nLimit = NULL, $p_nOffset = NULL, $p_nCreatedBy = NULL, $p_strSearch = NULL, $p_nStatus = NULL, $p_nRoleID = NULL, $p_nExceptUserID = NULL)
    {
        $this->db->select("$this->_table.*");
        ($p_nCreatedBy) ? $this->db->where("$this->_table.created_by", $p_nCreatedBy) : false;
        ($p_nRoleID) ? $this->db->where("$this->_table.role_id", $p_nRoleID) : false;
        ($p_nExceptUserID) ? $this->db->where("$this->_table.id !=", $p_nExceptUserID) : false;
        ($p_nStatus) ? $this->db->where("$this->_table.status", $p_nStatus) : false;
        ($p_strSearch) ? $this->db->where("($this->_table.first_name like '%$p_strSearch%' or $this->_table.last_name like '%$p_strSearch%' or $this->_table.email like '%$p_strSearch%')") : false;
        ($p_nLimit) ? $this->db->limit($p_nLimit) : false;
        ($p_nOffset) ? $this->db->offset($p_nOffset) : false;
        $this->db->order_by("$this->_table.modified", "desc");
        return $this->db->get($this->_table);
    }

    function getNoOfDealers($p_nCreatedBy = NULL, $p_strSearch = NULL, $p_nStatus = NULL, $p_nRoleID = NULL, $p_nExceptUserID = NULL)
    {
        
        $this->db->select("count($this->_table.id) as count");
        ($p_nCreatedBy) ? $this->db->where("$this->_table.created_by", $p_nCreatedBy) : false;
        ($p_nRoleID) ? $this->db->where("$this->_table.role_id", $p_nRoleID) : false;
        ($p_nExceptUserID) ? $this->db->where("$this->_table.id !=", $p_nExceptUserID) : false;
        ($p_nStatus) ? $this->db->where("$this->_table.status", $p_nStatus) : false;
        ($p_strSearch) ? $this->db->where("($this->_table.first_name like '%$p_strSearch%' or $this->_table.last_name like '%$p_strSearch%' or $this->_table.email like '%$p_strSearch%')") : false;
        return $this->db->get($this->_table)->row();
    }



    function getDealerByID($p_nID)
    {
        $this->db->select("$this->_table.*");
        $this->db->where("$this->_table.id", $p_nID);
        $this->db->limit(1);
        $res =  $this->db->get($this->_table)->row();
        return $res;
    }

    public function updateDealer($dealer_id,$data){
		$this->db->where('id',$dealer_id);
		$this->db->update('users',$data);
	    return  $this->db->affected_rows();		
	}

	// To change status
	public function changestatus($id,$status,$table_name)
	{
		if($status == '1'){
			$query = $this->db->query('update `'.$table_name.'` set status="0" where id="'.$id.'"');			
		}else{
			$query = $this->db->query('update `'.$table_name.'` set status="1" where id="'.$id.'"');			
		}
        echo $this->db->affected_rows();		
	}

	// To Delete Data
	public function deletedata($id,$table_name){
		$this->db->query('delete from `'.$table_name.'` where id="'.$id.'"');
		echo $this->db->affected_rows();
	}

    public function getdealers()
    {
        $this->db->select("$this->_table.*");
        return $res =  $this->db->get_where($this->_table,array('role_id'=>4))->result_array();
    }

    public function getfilterdata($status){
        $manager_id = $this->lib_auth->getUserID();
                $role_id = $this->lib_auth->getRoleID();    
        if($status == ""){
                $query = $this->db->query('select * from `users` where role_id = 4');
        }else{
            $query = $this->db->query('select * from `users` where  role_id = 4 and status="'.$status.'"');
        }
        return $result = $query->result();
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
    
    public function update_archieve($data,$where)
    {
        $this->db->where($where);
        $this->db->update("dealer_targets",$data);
        
    }
    
    public function update_product_archieve($data,$where)
    {
        $this->db->where($where);
        $this->db->update("dealer_product_targets",$data);
        
    }

    public function get_super_users($superuser_id=0)
    {
        if($superuser_id)
        {
            return $this->db->where('id',$superuser_id)->get('users')->row_array();
        }

        return $this->db->where('role_id',2)->where('user_type',9)->get('users')->result_array();
    }


}
