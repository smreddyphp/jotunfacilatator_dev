<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_Rest_Task_Forms extends Lib_Api
{
    /**
     * __construct method
     */
    function __construct()
    {
        // CI
        $this->ci = &get_instance();

        // Load Lib_Task_Forms Library
        $this->ci->load->library('v1/task_forms/Lib_Task_Forms');
    }

    /**
     * @param integer $p_nID
     * @return string[]
     */
    public function postSignature($p_nID)
    {
        // Check task form exist by ID
        if(!$this->ci->lib_task_forms->checkTaskFormExistByID($p_nID))
            return $this->throws(
                array(Task_Forms_Constants::TASK_FORM_NOT_AVAIL => sprintf($this->ci->lang->line('task_form_not_available'))),
                Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Input
        $arrTaskForm = array(
            'signature' => $this->ci->post('signature')
        );

        // Set data
        $this->ci->form_validation->set_data($arrTaskForm);

        // Set rules
        $this->ci->form_validation->set_rules('signature', 'signature', 'trim|required');

        // Run
        if($this->ci->form_validation->run() == false)
            return $this->throws($this->ci->form_validation->get_errors('Task_Forms_Constants'), Restserver\Libraries\REST_Controller::HTTP_OK);

        // Update task form
        $this->ci->lib_task_forms->updateTaskForm($arrTaskForm, $p_nID);

        return array(
            'response' => array(
                'success' => true,
                'result' => array(
                    'message' => $this->ci->lang->line('task_form_signature_updated_successfully')
                )
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
        );
    }
}

/* End of file lib_rest_tasks.php */
/* Location: ./application/libraries/v1/tasks/lib_rest_tasks.php */