<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Login extends Rest_Controller
{
    /**
     * __construct method
     */
    function __construct()
    {
        parent::__construct();

        // Load Lib_Rest_Users library
        $this->load->library('v1/users/Lib_Rest_Users');
    }

    /**
     * Create login
     *
     * Create a user login for a given data
     *
     * @uri v1/login
     * @httpmethod POST
     * @return object
     */
    public function index_post()
    {
        // Post login
        return $this->lib_rest_users->postLogin();
    }
}

/* End of file login.php */
/* Location: ./application/controllers/v1/login.php */