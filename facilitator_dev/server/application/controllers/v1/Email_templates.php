<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Email_templates extends REST_Controller 
{
    // Allowed methods and rights
    public $arrAllowedMethods = array(
        'index_get' => array('Email-Template-View', 'Email-Template-List'),
        'index_post' => 'Email-Template-Add',
        'index_put' => 'Email-Template-Edit',
        'index_delete' => 'Email-Template-Delete'
    );

	/**
     * __construct method
     */
    function __construct()
    {
        parent::__construct();

        // Load Lib_Rest_Email_Templates library
        $this->load->library('v1/email_templates/Lib_Rest_Email_Templates');
    }

    /**
     * Get email templates
     *
     * Get list email templates with pagination or get details of a specific email template by using email template id
     *
     * @uri v1/email_templates[:id]?limit=:num&offset=:num
     * @httpmethod GET
     * @return object
     */
    public function index_get($nID = NULL)
    {
        // Get email templates
        return $this->lib_rest_email_templates->getEmailTemplates($nID);
    }

    /**
     * Create a email template
     *
     * Create a email template for a given data
     *
     * @uri v1/EmailTemplates
     * @httpmethod POST
     * @return object
     */
    public function index_post()
    {
        // Post email template
        return $this->lib_rest_email_templates->postEmailTemplate();
    }

    /**
     * Edit or Update a email template
     *
     * Edit or Update a email template for a given data by using email template id
     *
     * @uri v1/email_templates[:id]
     * @httpmethod PUT
     * @param integer $nID
     * @return object
     */
    public function index_put($nID)
    {
        // Update email template
        return $this->lib_rest_email_templates->putEmailTemplate($nID);
    }

    /**
     * Delete a email template
     *
     * Delete a specific email template by using email template id
     *
     * @uri v1/email_templates/[:email_template_id]
     * @httpmethod DELETE
     * @param integer $nID
     * @return object
     */
    public function index_delete($nID)
    {
        // Delete email template
        return $this->lib_rest_email_templates->deleteEmailTemplate($nID);
    }
}

/* End of file email_templates.php */
/* Location: ./application/controllers/v1/email_templates.php */