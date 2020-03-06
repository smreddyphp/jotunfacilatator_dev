<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Roles extends REST_Controller 
{
    // Allowed methods and rights
    public $arrAllowedMethods = array(
        'index_get' => array('Role-View', 'Role-List'),
        'index_post' => 'Role-Add',
        'index_put' => 'Role-Edit',
        'index_delete' => 'Role-Delete'
    );

	/**
     * __construct method
     */
    function __construct()
    {
        parent::__construct();

        // Load Lib_Rest_Roles library
        $this->load->library('v1/roles/Lib_Rest_Roles');
    }

    /**
     * Get roles
     *
     * Get list roles with pagination or get details of a specific role by using role id
     *
     * @uri v1/roles[:id]?limit=:num&offset=:num
     * @httpmethod GET
     * @return object
     */
    public function index_get($nID = NULL)
    {
        // Get roles
        return $this->lib_rest_roles->getRoles($nID);
    }

    /**
     * Create a role
     *
     * Create a role for a given data
     *
     * @uri v1/Roles
     * @httpmethod POST
     * @return object
     */
    public function index_post()
    {
        // Post role
        return $this->lib_rest_roles->postRole();
    }

    /**
     * Edit or Update a role
     *
     * Edit or Update a role for a given data by using role id
     *
     * @uri v1/roles[:id]
     * @httpmethod PUT
     * @param integer $nID
     * @return object
     */
    public function index_put($nID)
    {
        // Update role
        return $this->lib_rest_roles->putRole($nID);
    }

    /**
     * Delete a role
     *
     * Delete a specific role by using role id
     *
     * @uri v1/roles/[:role_id]
     * @httpmethod DELETE
     * @param integer $nID
     * @return object
     */
    public function index_delete($nID)
    {
        // Delete role
        return $this->lib_rest_roles->deleteRole($nID);
    }
}

/* End of file roles.php */
/* Location: ./application/controllers/v1/roles.php */