<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Forms extends REST_Controller 
{
    // Allowed methods and rights
    public $arrAllowedMethods = array(
        'index_get' => array('Form-View', 'Form-List'),
        'index_post' => 'Form-Add',
        'index_put' => 'Form-Edit',
        'index_delete' => 'Form-Delete'
    );

	/**
     * __construct method
     */
    function __construct()
    {
        parent::__construct();

        // Load Lib_Rest_Forms library
        $this->load->library('v1/forms/Lib_Rest_Forms');
    }

    /**
     * Get forms
     *
     * Get list forms with pagination or get details of a specific form by using form id
     *
     * @uri v1/forms[:id]?limit=:num&offset=:num
     * @httpmethod GET
     * @return object
     */
    public function index_get($nID = NULL)
    {
        // Get forms
        return $this->lib_rest_forms->getForms($nID);
    }

    /**
     * Create a form
     *
     * Create a form for a given data
     *
     * @uri v1/form_types
     * @httpmethod POST
     * @return object
     */
    public function index_post()
    {
        // Post form
        return $this->lib_rest_forms->postForm();
    }

    /**
     * Edit or Update a form
     *
     * Edit or Update a form for a given data by using form id
     *
     * @uri v1/forms[:id]
     * @httpmethod PUT
     * @param integer $nID
     * @return object
     */
    public function index_put($nID = NULL)
    {
        // Update form
        return $this->lib_rest_forms->putForm($nID);
    }

    /**
     * Delete a form
     *
     * Delete a specific form by using form id
     *
     * @uri v1/forms/[:form_id]
     * @httpmethod DELETE
     * @param integer $nID
     * @return object
     */
    public function index_delete($nID = NULL)
    {
        // Delete form
        return $this->lib_rest_forms->deleteForm($nID);
    }
}

/* End of file forms.php */
/* Location: ./application/controllers/v1/forms.php */