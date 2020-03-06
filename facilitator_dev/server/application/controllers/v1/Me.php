<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Me extends Rest_Controller
{
    // Allowed methods and rights
    public $arrAllowedMethods = array(
        'index_get' => 'Me-View'
    );

    /**
     * __construct method
     */
    function __construct()
    {
        parent::__construct();

        //Load Lib_Users Library
        $this->load->library('v1/users/Lib_Rest_Users');
    }

    /**
     * Get user details
     *
     * Get logged in user details
     *
     * @uri v1/me
     * @httpmethod GET
     * @return string[]
     */
    public function index_get()
    {
        return $this->lib_rest_users->getLoggedUser();
    }
}

/* End of file me.php */
/* Location: ./application/controllers/v1/me.php */