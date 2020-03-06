<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_Rest_Tasks extends Lib_Api
{
    /**
     * __construct method
     */
    function __construct() 
    {
        // CI
        $this->ci = &get_instance();

        // Load Lib_Tasks Library
        $this->ci->load->library('v1/tasks/Lib_Tasks');
    }

    /**
     * @param integer $p_nID
     * @return string[]
     */
    public function getTasks($p_nID = NULL)
    {
        // User ID
        $nUserID = ($this->ci->lib_auth_tokens->getUserID()) ? $this->ci->lib_auth_tokens->getUserID() : $this->ci->lib_auth_tokens->getAuthTokenByToken($this->ci->input->server('HTTP_P_AUTH_TOKEN'))->row()->user_id;

        // Set
        $nLimit = ($this->ci->get('limit')) ? (int)$this->ci->get('limit') : NULL;
        $nOffset = ($this->ci->get('offset')) ? (int)$this->ci->get('offset') : NULL;
        $strSearch = ($this->ci->get('search')) ? (int)$this->ci->get('search') : NULL;
        $nStatus = ($this->ci->get('status')) ? $this->ci->get('status') : 'all';

        // Load Lib_Forms and Lib_Shops Libraries
        $this->ci->load->library(array('v1/forms/Lib_Forms', 'v1/shops/Lib_Shops'));

        switch(1)
        {
            case ($p_nID != NULL):

                // Get task by id
                $objTask = $this->ci->lib_tasks->getTaskByID($p_nID)->result();

                // Check empty
                if (empty($objTask))
                    return $this->throws(
                        array(Tasks_Constants::TASK_NOT_AVAIL => sprintf($this->ci->lang->line('task_not_available'))),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

                // Arrange format
                $arrTask = $this->ci->lib_tasks->arrangeFormat($objTask);

                // Result
                $arrResult = array(
                    'success' => true,
                    'result' => $arrTask,
                    'totalCount' => 1
                );

                break;

            default:

                // Get tasks for pagination
                $objTasks = $this->ci->lib_tasks->getTasksForPagination($nUserID, $nLimit, $nOffset, $strSearch, $nStatus)->result();

                // Check empty
                if(empty($objTasks))
                    return $this->throws(
                        array(Tasks_Constants::TASK_LIST_NOT_AVAIL => sprintf($this->ci->lang->line('task_list_not_available'))),
                        Restserver\Libraries\REST_Controller::HTTP_OK);

                // Arrange format
                $arrTasks = $this->ci->lib_tasks->arrangeFormat($objTasks);

                // Result
                $arrResult = array(
                    'success' => true,
                    'result' => $arrTasks,
                    'totalCount' => $this->ci->lib_tasks->getNoOfTasks($nUserID, $strSearch, $nStatus)->count
                );

                break;
        }

        return array(
            'response' => $arrResult,
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
        );
    }

    /**
     * @param integer $p_nID
     * @param integer $p_nTaskFormID
     * @return string[]
     */
    public function getTaskForms($p_nID, $p_nTaskFormID = NULL)
    {
        // Check task exist by ID
        if(!$this->ci->lib_tasks->checkTaskExistByID($p_nID))
            return $this->throws(
                array(Tasks_Constants::TASK_NOT_AVAIL => sprintf($this->ci->lang->line('task_not_available'))),
                Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Load Lib_Forms, Lib_Shops and Lib_Task_Forms Libraries
        $this->ci->load->library(array('v1/forms/Lib_Forms', 'v1/shops/Lib_Shops', 'v1/task_forms/Lib_Task_Forms'));

        // Get task form by ID
        $objTaskForm = $this->ci->lib_task_forms->getTaskFormByID($p_nTaskFormID)->row();

        // Check empty
        if(empty($objTaskForm) || $objTaskForm->task_id != $p_nID)
            return $this->throws(
                array(Task_Forms_Constants::TASK_FORM_NOT_AVAIL => sprintf($this->ci->lang->line('task_form_not_available'))),
                Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Arrange format
        $arrTaskForm = $this->ci->lib_task_forms->arrangeFormat(array($objTaskForm));

        // Get points by task form ID
        $objPoints = $this->ci->lib_task_forms->getPointsByTaskFormID($p_nTaskFormID)->result();

        // Arrange format
        $arrPoints = $this->ci->lib_task_forms->arrangePointsFormat($objPoints);

        // Set sub forms
        $arrTaskForm[0]['sub_forms'] = (!empty($arrPoints)) ? $arrPoints : NULL;

        // Get images by task form ID
        $objImages = $this->ci->lib_task_forms->getImagesByTaskFormID($p_nTaskFormID)->result();

        // Set images
        $arrTaskForm[0]['images'] = (!empty($objImages)) ? $objImages : NULL;

        return array(
            'response' => array(
                'success' => true,
                'result' => $arrTaskForm,
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
        );
    }

    /**
     * @param integer $p_nID
     * @param integer $p_nTaskFormID
     * @return string[]
     */
    public function putTaskForm($p_nID, $p_nTaskFormID)
    {
        // Load Lib_Forms, Lib_Shop_Types, Lib_Shops and Lib_Tasks Libraries
        $this->ci->load->library(array('v1/forms/Lib_Forms', 'v1/shop_types/Lib_Shop_Types',
            'v1/shops/Lib_Shops', 'v1/tasks/Lib_Tasks', 'v1/task_forms/Lib_Task_Forms'));

        // Check task exist by ID
        if(!$this->ci->lib_tasks->checkTaskExistByID($p_nID))
            return $this->throws(
                array(Tasks_Constants::TASK_NOT_AVAIL => sprintf($this->ci->lang->line('task_not_available'))),
                Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Get task form by ID
        $objTaskForm = $this->ci->lib_task_forms->getTaskFormByID($p_nTaskFormID)->row();

        // Check task form exist by ID
        if(empty($objTaskForm) || $objTaskForm->task_id != $p_nID)
            return $this->throws(
                array(Task_Forms_Constants::TASK_FORM_NOT_AVAIL => sprintf($this->ci->lang->line('task_form_not_available'))),
                Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Input
        $arrShop = ($this->ci->put('shop')) ? $this->ci->put('shop') : array();
        $arrPoints = ($this->ci->put('points')) ? $this->ci->put('points') : array();
        $arrImages = ($this->ci->put('images')) ? $this->ci->put('images') : array();


        // Check shop
        if(!empty($arrShop))
        {
            // Check ID
            if(isset($arrShop['id']) && $arrShop['id'] && $objTaskForm->shop_id == $arrShop['id'])
            {
                // Unset
                $nShopID = $arrShop['id'];
                unset($arrShop['id']);

                // Update shop
                $this->ci->lib_shops->updateShop($arrShop, $nShopID);
            }
        }

        // Check images
        if(!empty($arrImages))
        {
            // Delete images by task form ID
            $this->ci->lib_task_forms->deleteImagesByTaskFormID($p_nTaskFormID);

            // New Images
            $arrNewImages = array();

            // Loop
            foreach($arrImages as $strImage)
                $arrNewImages[] = array(
                    'name' =>  $strImage,
                    'task_form_id' => $p_nTaskFormID
                );

            // Add images
            $this->ci->lib_task_forms->addImages($arrNewImages);
        }

        // Check points
        if(empty($arrPoints))
            return array(
                'response' => array(
                    'success' => true,
                    'result' => array(
                        'id' => $p_nTaskFormID,
                        'message' => sprintf($this->ci->lang->line('task_form_updated_successfully'), $p_nTaskFormID)
                    )
                ),
                'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
            );


$rows = $this->ci->lib_task_forms->get_taskformpoints_taskformid($p_nTaskFormID);
//$data['present'] = $this->ci->lib_task_forms->get_taskformpointsdata_taskformid($p_nTaskFormID);


  // Delete points by task form ID
        $this->ci->lib_task_forms->deletePointsByTaskFormID($p_nTaskFormID);

 date_default_timezone_set('Asia/Riyadh');
$datetime = date('Y-m-d H:i:s');

 // Loop
        foreach($arrPoints as $nKey => $arrPoint){
            if($rows > 1)
			{
				$arrPoints[$nKey]['updated'] = 1;
				$arrPoints[$nKey]['modified'] = $datetime;		
			}
			
            $arrPoints[$nKey]['task_form_id'] = $p_nTaskFormID;
        }
        
     
        
       
        
        // Add points
        if(!$this->ci->lib_task_forms->addPoints($arrPoints))
            return $this->throws(
                array(Task_Forms_Constants::TASK_FORM_NOT_UPDATED => sprintf($this->ci->lang->line('task_form_not_updated'))),
                Restserver\Libraries\REST_Controller::HTTP_OK);

        // Get no of forms by Task ID
        $nFormsCount = $this->ci->lib_task_forms->getNoOfFormsByTaskID($p_nID)->row()->count;

        // Get no of form points by Task ID
        $nFormPointsCount = $this->ci->lib_task_forms->getNoOfFormPointsByTaskID($p_nID)->row()->count;

        // Check all forms submitted for a task
        $arrTask = ($nFormsCount == $nFormPointsCount) ? array('status' => 3) : array('status' => 2);

        // Task Form
        $arrTaskForm['status'] = 2;

        // Signature
        $arrTaskForm += ($this->ci->put('signature')) ? array('signature' => $this->ci->put('signature')) : array();

        // Update task form
        $this->ci->lib_task_forms->updateTaskForm($arrTaskForm, $p_nTaskFormID);

        // Update task
        $this->ci->lib_tasks->updateTask($arrTask, $p_nID);

        return array(
            'response' => array(
                'success' => true,
                'result' => array(
                    'id' => $p_nTaskFormID,
                    'message' => sprintf($this->ci->lang->line('task_form_updated_successfully'), $p_nTaskFormID)
                )
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
        );
    }
}

/* End of file lib_rest_tasks.php */
/* Location: ./application/libraries/v1/tasks/lib_rest_tasks.php */