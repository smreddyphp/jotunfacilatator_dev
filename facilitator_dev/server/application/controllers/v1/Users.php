<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Users extends REST_Controller 
{
    // Allowed methods and rights
    public $arrAllowedMethods = array(
        'index_get' => array('User-View', 'User-List'),
        'index_post' => 'User-Add',
        'index_put' => 'User-Edit',
        'index_delete' => 'User-Delete',
        'tasks_get' => array('Task-View', 'Task-List'),
        'tasks_post' => 'Task-Add',
        'tasks_put' => 'Task-Edit',
        'tasks_delete' => 'Task-Delete',
        'forms_get' => array('Form-View', 'Form-List')
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
     * Get users
     *
     * Get list users with pagination or get details of a specific user by using user id
     *
     * @uri v1/users/[:id]?limit=:num&offset=:num
     * @httpmethod GET
     * @return object
     */
    public function index_get($nID = NULL)
    {
        // Get users
        return $this->lib_rest_users->getUsers($nID);
    }

    /**
     * Create a user
     *
     * Create a user for a given data
     *
     * @uri v1/users/
     * @httpmethod POST
     * @return object
     */
    public function index_post()
    {
        // Post user
        return $this->lib_rest_users->postUser();
    }

    /**
     * Edit or Update a user
     *
     * Edit or Update a user for a given data by using user id
     *
     * @uri v1/users/[:id]
     * @httpmethod PUT
     * @return object
     */
    public function index_put($nID)
    {
        // Update user
        return $this->lib_rest_users->putUser($nID);
    }

    /**
     * Delete a user
     *
     * Delete a specific user by using user id
     *
     * @uri v1/users/[:user_id]
     * @httpmethod DELETE
     * @param integer $nID
     * @return object
     */
    public function index_delete($nID)
    {
        // Delete user
        return $this->lib_rest_users->deleteUser($nID);
    }

    /**
     * Get tasks by user id
     *
     * Get list tasks with pagination or get details of a specific task by using task id
     *
     * @uri v1/users/[:user_id]/tasks[:id]?limit=:num&offset=:num
     * @httpmethod GET
     * @return object
     */
    public function tasks_get($nID, $nTaskID = NULL)
    {
        // Get tasks
        return $this->lib_rest_users->getTasks($nID, $nTaskID);
    }

    /**
     * Create a task
     *
     * Create a task for a given data
     *
     * @uri v1/tasks
     * @httpmethod POST
     * @return object
     */
    public function tasks_post($nID = NULL)
    {
        // Post task
        return $this->lib_rest_users->postTask($nID);
    }

    /**
     * Edit or Update a task
     *
     * Edit or Update a task for a given data by using task id
     *
     * @uri v1/tasks[:id]
     * @httpmethod PUT
     * @param integer $nID
     * @return object
     */
    public function tasks_put($nID = NULL, $nTaskID = NULL)
    {
        // Update task
        return $this->lib_rest_users->putTask($nID, $nTaskID);
    }

    /**
     * Delete a task
     *
     * Delete a specific task by using task id
     *
     * @uri v1/tasks/[:task_id]
     * @httpmethod DELETE
     * @param integer $nID
     * @return object
     */
    public function tasks_delete($nID = NULL, $nTaskID)
    {
        // Delete task
        return $this->lib_rest_users->deleteTask($nID, $nTaskID);
    }

    /**
     * Get forms
     *
     * Get list forms with pagination or get details of a specific form by using form id
     *
     * @uri v1/users/[:id]/forms/[:id]?limit=:num&offset=:num
     * @httpmethod GET
     * @return object
     */
    public function forms_get($nID = NULL, $nFormID = NULL)
    {
        // Get users
        return $this->lib_rest_users->getForms($nID, $nFormID);
    }
    
    public function online_users_put()
    {
        // Get users
        return $this->lib_rest_users->getonlinedata();
    }
}

/* End of file users.php */
/* Location: ./application/controllers/v1/users.php */