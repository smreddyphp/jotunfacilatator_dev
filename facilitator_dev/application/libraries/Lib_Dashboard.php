<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lib_Dashboard 
{

/**
 * Constructor
 *
 * @return void
 */
	function __construct() 
	{
		$this->ci = &get_instance();

		// Load dashboard config
		$this->ci->load->config('default/dashboard');
	}
}

/* End of file Lib_Dashboard.php */
/* Location: ./application/libraries/Lib_Dashboard.php */