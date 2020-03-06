<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_Task_Forms
{
    public $strFlashMessage;

    /**
     * __construct
     */
    function __construct()
    {
        $this->ci = &get_instance();

        // Load task_forms config
        $this->ci->load->config('default/task_forms');

        // Set API
        $this->strAPI = $this->ci->config->item('task_forms_api');
    }

    /**
     * getTaskFormByID
     *
     * @param integer $p_nTaskFormID
     * @return object
     */
    function getTaskFormByID($p_nTaskFormID)
    {
        // Get task form by ID
        $objResult = $this->ci->rest->get($this->strAPI.$p_nTaskFormID);

        // Flash message
        $this->strFlashMessage = ($objResult->success == false) ? $objResult->errors[0]->message : '';

        return ($objResult->success == true) ? $objResult->result[0] : false;
    }
}

/* End of file Lib_Task_Forms.php */
/* Location: ./application/libraries/Lib_Task_Forms.php */