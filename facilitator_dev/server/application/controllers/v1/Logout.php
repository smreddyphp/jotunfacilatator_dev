<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Logout extends Rest_Controller
{
    // Allowed methods and rights
    public $arrAllowedMethods = array(
        'index_get' => 'Logout-View'
    );

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
     *  Logout
     *
     * Enable logout for a user login or Get redirect url for a logged out session.
     * @uri v1/logout
     * @httpmethod GET
     * @return object
     */
    public function index_get()
    {
        return $this->lib_rest_users->getLogout();
    }
}

/* End of file logout.php */
/* Location: ./application/controllers/v1/logout.php */