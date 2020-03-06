<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Designations extends REST_Controller 
{
    // Allowed methods and rights
    public $arrAllowedMethods = array(
        'index_get' => array('Designation-View', 'Designation-List'),
        'index_post' => 'Designation-Add',
        'index_put' => 'Designation-Edit',
        'index_delete' => 'Designation-Delete'
    );

	/**
     * __construct method
     */
    function __construct()
    {
        parent::__construct();

        // Load Lib_Rest_Designations library
        $this->load->library('v1/designations/Lib_Rest_Designations');
    }

    /**
     * Get designations
     *
     * Get list designations with pagination or get details of a specific designation by using designation id
     *
     * @uri v1/designations[:id]?limit=:num&offset=:num
     * @httpmethod GET
     * @return object
     */
    public function index_get($nID = NULL)
    {
        // Get designations
        return $this->lib_rest_designations->getDesignations($nID);
    }

    /**
     * Create a designation
     *
     * Create a designation for a given data
     *
     * @uri v1/Designations
     * @httpmethod POST
     * @return object
     */
    public function index_post()
    {
        // Post designation
        return $this->lib_rest_designations->postDesignation();
    }

    /**
     * Edit or Update a designation
     *
     * Edit or Update a designation for a given data by using designation id
     *
     * @uri v1/designations[:id]
     * @httpmethod PUT
     * @param integer $nID
     * @return object
     */
    public function index_put($nID)
    {
        // Update designation
        return $this->lib_rest_designations->putDesignation($nID);
    }

    /**
     * Delete a designation
     *
     * Delete a specific designation by using designation id
     *
     * @uri v1/designations/[:designation_id]
     * @httpmethod DELETE
     * @param integer $nID
     * @return object
     */
    public function index_delete($nID)
    {
        // Delete designation
        return $this->lib_rest_designations->deleteDesignation($nID);
    }
}

/* End of file designations.php */
/* Location: ./application/controllers/v1/designations.php */