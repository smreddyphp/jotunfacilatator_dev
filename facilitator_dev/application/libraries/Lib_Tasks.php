<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_Tasks
{
    public $strFlashMessage;

    /**
     * __construct
     */
    function __construct()
    {
        $this->ci = &get_instance();

        // Load tasks config
        $this->ci->load->config('default/tasks');

        // Set API
        $this->strAPI = $this->ci->config->item('tasks_api');
    }

    /**
     * getTaskFormByID
     *
     * @param integer $p_nTaskID
     * @param integer $p_nTaskFormID
     * @return object
     */
    function getTaskFormByID($p_nTaskID, $p_nTaskFormID)
    {
        // Get task form by ID
        $objResult = $this->ci->rest->get($this->strAPI.$p_nTaskID.'/task_forms/'.$p_nTaskFormID);

        // Flash message
        $this->strFlashMessage = ($objResult->success == false) ? $objResult->errors[0]->message : '';

        return ($objResult->success == true) ? $objResult->result[0] : false;
    }
}

/* End of file Lib_Tasks.php */
/* Location: ./application/libraries/Lib_Tasks.php */