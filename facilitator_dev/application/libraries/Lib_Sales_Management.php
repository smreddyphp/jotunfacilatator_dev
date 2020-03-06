<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lib_Sales_Management 
{

/**
 * Constructor
 *
 * @return void
 */
	function __construct() 
	{
		$this->ci = &get_instance();

		// Load sales_management config
		$this->ci->load->config('default/sales_management');

		// Load sales_managementm model
		$this->ci->load->model('sales_managementm');
	}

/**
 * add_city method
 * 
 * @param array $details
 * @return bool
 */
	function add_city($details) {

		if($this->ci->city->add_city($details)) {

			// user log data
			$user_log['table'] = $this->ci->config->item('cities_table');
			$user_log['new_content'] = json_encode($details);
			$user_log['user_id'] = $this->ci->dx_auth->get_user_id();
			$user_log['created'] = $user_log['modified'] = date('Y-m-d H:i:s', time());

			return $this->ci->user_log->add_user_log($user_log);
		}
		
		return false;
	}

/**
 * update_city method
 * 
 * @param array $details, integer $id
 * @return bool
 */
	function update_city($details, $id) {

		$user_log['old_content'] = json_encode($this->get_city_by_id($id)->row());

		if($this->ci->city->update_city($details, $id)) {

			// user log data
			$user_log['table'] = $this->ci->config->item('cities_table');	
			$user_log['new_content'] = json_encode($details);
			$user_log['operation'] = 2;
			$user_log['user_id'] = $this->ci->dx_auth->get_user_id();
			$user_log['created'] = $user_log['modified'] = date('Y-m-d H:i:s', time());

			return $this->ci->user_log->add_user_log($user_log);
		}
		
		return false;
	}

/**
 * check_city_exist_by_id method
 * 
 * @param integer $id
 * @return bool
 */
	function check_city_exist_by_id($id) {
		
		return $this->ci->city->check_city_exist_by_id($id);
	}

/**
 * check_city_exist_by_slug method
 *
 * @param string $slug
 * @return bool
 */
	function check_city_exist_by_slug($slug) {

		return $this->ci->city->check_city_exist_by_slug($slug);
	}

/**
 * check_city_exist_by_country_id method
 * 
 * @param integer $city_id, integer $country_id
 * @return bool
 */
	function check_city_exist_by_country_id($city_id, $country_id) {
		
		return $this->ci->city->check_city_exist_by_country_id($city_id, $country_id);
	}

/**
 * get_city_by_id method
 * 
 * @param integer $id
 * @return object
 */
	function get_city_by_id($id) {
		
		return $this->ci->city->get_city_by_id($id);
	}

/**
 * get_city_by_slug method
 *
 * @param string $slug
 * @return object
 */
	function get_city_by_slug($slug) {

		return $this->ci->city->get_city_by_slug($slug);
	}

/**
 * get_all_cities_by_country_id method
 * 
 * @param integer $country_id, integer $status
 * @return object
 */
	function get_all_cities_by_country_id($country_id, $status = null) {
		
		return $this->ci->city->get_all_cities_by_country_id($country_id, $status);
	}

/**
 * get_all_cities_by_countries method
 * 
 * @param array $countries, integer $status
 * @return object
 */
	function get_all_cities_by_countries($countries, $status = null) {

		$new_countries = array();
		
		if(is_array($countries)) {

			foreach($countries as $country_id) {

				$country = $this->ci->admin_countries->get_country_by_id($country_id)->row();
				
				$cities = $this->ci->city->get_all_cities_by_country_id($country_id, $status)->result();

				$new_cities = array();

				foreach($cities as $key => $city) {

					$new_cities[$city->id] = $city->name; 
				}

				$new_countries[$country->name] = $new_cities;
			}
		}
		
		return $new_countries;
	}

/**
 * get_all_cities_list_by_country_id method
 * 
 * @param integer $country_id, integer $status
 * @return object
 */
	function get_all_cities_list_by_country_id($country_id, $status = null) {

		$cities = $this->get_all_cities_by_country_id($country_id, $status)->result();

		$new_cities = array();

		foreach($cities as $city) {

			$new_cities[$city->id] = $city->name;
		}
		
		return $new_cities;
	}

/**
 * get_all_cities method
 *
 * @param integer $status
 * @return object
 */
	function get_all_cities($status = null) {

		return $this->ci->city->get_all_cities($status);
	}

/**
 * get_all_cities_list method
 *
 * @param integer $country_id, integer $status
 * @return object
 */
	function get_all_cities_list($status = null) {

		$cities = $this->get_all_cities($status)->result();

		$new_cities = array();

		foreach($cities as $city) {

			$new_cities[$city->id] = $city->name;
		}

		return $new_cities;
	}

/**
 * get_all_cities_for_pagination method
 * 
 * @param integer $limit, integer $offset
 * @return object
 */
	function get_all_cities_for_pagination($limit, $offset) {
		
		return $this->ci->city->get_all_cities_for_pagination($limit, $offset);
	}

/**
 * get_no_of_cities method
 * 
 * @return object
 */
	function get_no_of_cities() {
		
		return $this->ci->city->get_no_of_cities();
	}

/**
 * get_all_cities_by_search method
 * 
 * @param integer $limit, integer $offset, string $search
 * @return object
 */
	function get_all_cities_by_search($limit, $offset, $search) {
		
		return $this->ci->city->get_all_cities_by_search($limit, $offset, $search);
	}

/**
 * get_no_of_cities_by_search method
 * 
 * @param string $search
 * @return object
 */
	function get_no_of_cities_by_search($search) {
		
		return $this->ci->city->get_no_of_cities_by_search($search);
	}

/**
 * delete_city_by_id method
 * 
 * @param integer $id
 * @return bool
 */
	function delete_city_by_id($id) {

		$user_log['old_content'] = json_encode($this->get_city_by_id($id)->row());

		if($this->ci->city->delete_city_by_id($id)) {

			// user log data
			$user_log['table'] = $this->ci->config->item('cities_table');	
			$user_log['new_content'] = 'deleted';
			$user_log['operation'] = 3;
			$user_log['user_id'] = $this->ci->dx_auth->get_user_id();
			$user_log['created'] = $user_log['modified'] = date('Y-m-d H:i:s', time());

			return $this->ci->user_log->add_user_log($user_log);
		}
		
		return false;
	}

}

/* End of file Lib_Sales_Management.php */
/* Location: ./application/libraries/Lib_Sales_Management.php */