<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_management extends CI_Controller 
{

	/**
	 * __construct method
	 *
	 * @return void
	 */
    function __construct() 
    {
        parent::__construct();

        // Load Lib_Sales_Management Library
        $this->load->library('Lib_Sales_Management');
    }

    /**
	 * index method
	 *
	 * @return void
	 */
    function index() 
    {
    	return $this->load->view($this->config->item('template_view'));
    }
}
