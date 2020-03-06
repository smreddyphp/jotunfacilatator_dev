<?php defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model{
    
    public function online_users($data)
    {
        $this->db->where($data);
        $this->db->where('modified >= DATE_SUB(NOW(),INTERVAL 4 MINUTE)');
        return $this->db->get("users");
    }
    
    //smr
    public function get_all_users()
    {
        return $this->db->query("select * from users where role_id != 4")->result();
    }
    
    //smr
    function getUser_ByID($p_nID)
    {
        $this->db->where("id", $p_nID);
        $res =  $this->db->get('users')->row();
        return $res;
    }
    
    function get_user_dealer_ids($user_id)
    {
        return $this->db->query("select dealer_id from user_dealers where user_id=$user_id")->result_array();
    }
    
    public function get_user_targets_based_on_dealers_sum($user_id)
	{
	    $current_month  = date('m');
	    $result = $this->db->query("SELECT SUM(total_sales) as total_sales,SUM(total_collection) as total_collection,SUM(total_product_target) as total_product_target FROM `dealer_targets` WHERE `dealer_id` IN (select dealer_id from user_dealers where user_id=$user_id) AND `month` IN ($current_month)");
	    return $result->row();
	}
	
	public function get_user_edit_targets_based_on_dealers_sum($user_id,$month)
	{
	    $result = $this->db->query("SELECT SUM(total_sales) as total_sales,SUM(total_collection) as total_collection,SUM(total_product_target) as total_product_target,SUM(achieved_sales) as achieved_sales,SUM(achieved_collection) as achieved_collection,SUM(achieved_product) as achieved_product FROM `dealer_targets` WHERE `dealer_id` IN (select dealer_id from user_dealers where user_id=$user_id) AND `month` IN ($month)");
	    return $result->row();
	}
	
	public function get_user_targets_based_on_dealer_year_targets($user_id)
	{
	    $result = $this->db->query("SELECT SUM(total_sales) as total_sales,SUM(total_collection) as total_collection,SUM(total_product_target) as total_product_target FROM `users` WHERE `id` IN (select dealer_id from user_dealers where user_id=$user_id)");
	    return $result->row();
	}	
	
	public function get_user_edit_targets_based_on_dealer_year_targets($user_id)
	{
	    $result = $this->db->query("SELECT SUM(total_sales) as total_sales,SUM(total_collection) as total_collection,SUM(total_product_target) as total_product_target,SUM(achieved_sales) as achieved_sales,SUM(achieved_collection) as achieved_collection,SUM(achieved_product) as achieved_product FROM `users` WHERE `id` IN (select dealer_id from user_dealers where user_id=$user_id)");
	    return $result->row();
	}
}