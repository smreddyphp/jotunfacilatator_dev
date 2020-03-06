<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Tasks extends REST_Controller 
{
    // Allowed methods and rights
    public $arrAllowedMethods = array(
        'index_get' => array('Task-View', 'Task-List'),
        'task_forms_get' => array('Task-Form-View', 'Task-Form-List'),
    );

	/**
     * __construct method
     */
    function __construct()
    {
        parent::__construct();

        // Load Lib_Rest_Tasks library
        $this->load->library('v1/tasks/Lib_Rest_Tasks');
    }

    /**
     * Get tasks
     *
     * Get list tasks with pagination or get details of a specific task by using task id
     *
     * @uri v1/tasks[:id]?limit=:num&offset=:num
     * @httpmethod GET
     * @param integer $nID
     * @return object
     */
    public function index_get($nID = NULL)
    {
        // Get tasks
        return $this->lib_rest_tasks->getTasks($nID);
    }

    /**
     * Get task forms
     *
     * Get list task forms with pagination or get details of a specific task forms by using task form id
     *
     * @uri v1/tasks/[:task_id]/task_forms/[:task_form_id]
     * @httpmethod GET
     * @param integer $nID
     * @param integer $nTaskFormID
     * @return object
     */
    public function task_forms_get($nID, $nTaskFormID = NULL)
    {
        // Get task forms
        return $this->lib_rest_tasks->getTaskForms($nID, $nTaskFormID);
    }

    /**
     * Update task form
     *
     * Update a task form for a given data
     *
     * @uri v1/tasks/[:task_id]/task_forms/[:task_form_id]
     * @httpmethod PUT
     * @param integer $nID
     * @param integer $nTaskFormID
     * @return object
     */
     
    public function task_forms_put($nID, $nTaskFormID = NULL)
    {
        // Put task form
        return $this->lib_rest_tasks->putTaskForm($nID, $nTaskFormID);
    }
}

/* End of file tasks.php */
/* Location: ./application/controllers/v1/tasks.php */