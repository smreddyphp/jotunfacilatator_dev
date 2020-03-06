<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Emails extends Rest_Controller
{
    // Allowed methods and rights
    public $arrAllowedMethods = array(
        'index_get' => array('Email-View', 'Email-List'),
        'index_post' => 'Email-Add',
    );

    /**
     * __construct method
     */
    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        //Load Lib_Send Library
        $this->load->library('v1/emails/Lib_Rest_Emails');
    }

    /**
     * Create an email
     *
     * Create an email for a given data
     *
     * @uri v1/emails
     * @httpmethod POST
     * @return object
     */
    public function index_post()
    {
        return $this->lib_rest_emails->postEmail();
    }
}

/* End of file emails.php */
/* Location: ./application/controllers/v1/emails.php */