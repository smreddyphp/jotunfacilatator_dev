<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Email_gateways extends REST_Controller 
{
    // Allowed methods and rights
    public $arrAllowedMethods = array(
        'index_get' => array('Email-Gateway-View', 'Email-Gateway-List'),
        'index_post' => 'Email-Gateway-Add',
        'index_put' => 'Email-Gateway-Edit',
        'index_delete' => 'Email-Gateway-Delete'
    );

	/**
     * __construct method
     */
    function __construct()
    {
        parent::__construct();

        // Load Lib_Rest_Email_Gateways library
        $this->load->library('v1/email_gateways/Lib_Rest_Email_Gateways');
    }

    /**
     * Get email gateways
     *
     * Get list email gateways with pagination or get details of a specific email gateway by using email gateway id
     *
     * @uri v1/email_gateways[:id]?limit=:num&offset=:num
     * @httpmethod GET
     * @return object
     */
    public function index_get($nID = NULL)
    {
        // Get email gateways
        return $this->lib_rest_email_gateways->getEmailGateways($nID);
    }

    /**
     * Create a email gateway
     *
     * Create a email gateway for a given data
     *
     * @uri v1/EmailGateways
     * @httpmethod POST
     * @return object
     */
    public function index_post()
    {
        // Post email gateway
        return $this->lib_rest_email_gateways->postEmailGateway();
    }

    /**
     * Edit or Update a email gateway
     *
     * Edit or Update a email gateway for a given data by using email gateway id
     *
     * @uri v1/email_gateways[:id]
     * @httpmethod PUT
     * @param integer $nID
     * @return object
     */
    public function index_put($nID)
    {
        // Update email gateway
        return $this->lib_rest_email_gateways->putEmailGateway($nID);
    }

    /**
     * Delete a email gateway
     *
     * Delete a specific email gateway by using email gateway id
     *
     * @uri v1/email_gateways/[:email_gateway_id]
     * @httpmethod DELETE
     * @param integer $nID
     * @return object
     */
    public function index_delete($nID)
    {
        // Delete email gateway
        return $this->lib_rest_email_gateways->deleteEmailGateway($nID);
    }
}

/* End of file email_gateways.php */
/* Location: ./application/controllers/v1/email_gateways.php */