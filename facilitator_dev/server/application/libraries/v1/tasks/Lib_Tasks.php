<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'/libraries/v1/tasks/Tasks_Constants.php';

class Lib_Tasks
{
    /**
     * __construct method
     */
    function __construct() 
    {
        // CI
        $this->ci = &get_instance();

        // Load Tasks config
        $this->ci->load->config('v1/tasks');

        // Load lang config
        $this->ci->lang->load('v1/tasks', $this->ci->lib_api->lang);

        // Load Task model
        $this->ci->load->model('v1/task');
    }

    /**
     * addTask method
     *
     * @param string[] $p_arrTask
     * @return integer
     */
    public function addTask($p_arrTask)
    {
        return $this->ci->task->addTask($p_arrTask);
    }

    /**
     * updateTask method
     *
     * @param string[] $p_arrTask
     * @param integer $p_nID
     * @return boolean
     */
    public function updateTask($p_arrTask, $p_nID)
    {
        return $this->ci->task->updateTask($p_arrTask, $p_nID);
    }

     /**
     * checkTaskExistByID method
     *
     * @param integer $p_nID
     * @return object
     */
    public function checkTaskExistByID($p_nID)
    {
        return $this->ci->task->checkTaskExistByID($p_nID);
    }

    /**
     * getTaskByID method
     *
     * @param integer $p_nID
     * @return object
     */
    public function getTaskByID($p_nID)
    {
        return $this->ci->task->getTaskByID($p_nID);
    }

    /**
     * getTasksForPagination method
     *
     * @param integer $p_nUserID
     * @param integer $p_nLimit
     * @param integer $p_nOffset
     * @param string $p_strSearch
     * @param integer $p_nStatus
     * @return object
     */
    public function getTasksForPagination($p_nUserID = NULL, $p_nLimit = NULL, $p_nOffset = NULL, $p_strSearch = NULL, $p_nStatus = NULL)
    {
        return $this->ci->task->getTasksForPagination($p_nUserID, $p_nLimit, $p_nOffset, $p_strSearch, $p_nStatus);
    }

    /**
     * getNoOfTasks method
     *
     * @param integer $p_nUserID
     * @param string $p_strSearch
     * @param integer $p_nStatus
     * @return integer
     */
    public function getNoOfTasks($p_nUserID = NULL, $p_strSearch = NULL, $p_nStatus = NULL)
    {
        return $this->ci->task->getNoOfTasks($p_nUserID, $p_strSearch, $p_nStatus);
    }

    /**
     * addTaskForms method
     *
     * @param string[] $p_arrTaskForms
     * @return integer
     */
    public function addTaskForms($p_arrTaskForms)
    {
        return $this->ci->task->addTaskForms($p_arrTaskForms);
    }

    /**
     * deleteTaskFormsByTaskID method
     *
     * @param string[] $p_nTaskID
     * @return boolean
     */
    public function deleteTaskFormsByTaskID($p_nTaskID)
    {
        return $this->ci->task->deleteTaskFormsByTaskID($p_nTaskID);
    }

    /**
     * @param object $p_objResults
     * @return string[]
     */
    public function arrangeFormat($p_objResults)
    {
        $arrData = array();

        foreach ($p_objResults as $objResult)
        {
            if(isset($arrData[$objResult->id]))
            {
                // Forms
                if($objResult->form_id)
                    $arrData[$objResult->id]['task_forms'][] = array(
                        'id' => $objResult->task_form_id,
                        'status' => $objResult->task_form_status,
                        'form_id' => $objResult->form_id,
                        'form' => array(
                            'id' => $objResult->form_id,
                            'name' => $objResult->form_name
                        )
                    );
            }
            else
            {
                $arrData[$objResult->id] = array(
                    'id' => $objResult->id,
                    'user_id' => $objResult->user_id,
                    'shop_id' => $objResult->shop_id,
                    'shop' => array(
                        'id' => $objResult->shop_id,
                        'name' => $objResult->shop_name,
                        'address' => $objResult->shop_address,
                        'image' => $objResult->shop_image,
                        'acc_no' => $objResult->shop_acc_no,
                        'last_evaluation' => $objResult->shop_last_evaluation,
                        'latitude' => $objResult->shop_latitude,
                        'longitude' => $objResult->shop_longitude,                        
                    ),
                    'created' => $objResult->created,
                    'modified' => $objResult->modified
                );

                // Status
                switch($objResult->status)
                {
                    case 1:

                        $arrData[$objResult->id]['status'] = 'Newly Assigned';
                        break;

                    case 2:

                        $arrData[$objResult->id]['status'] = 'Pending';
                        break;

                    case 3:

                        $arrData[$objResult->id]['status'] = 'Completed';
                        break;
                }

                // Forms
                if($objResult->task_form_id)
                    $arrData[$objResult->id]['task_forms'][] = array(
                        'id' => $objResult->task_form_id,
                        'status' => $objResult->task_form_status,
                        'form_id' => $objResult->form_id,
                        'form' => array(
                            'id' => $objResult->form_id,
                            'name' => $objResult->form_name
                        )
                    );
            }

            if(!isset($arrData[$objResult->id]['task_forms']))
                $arrData[$objResult->id]['task_forms'] = NULL;
        }

        return array_values($arrData);
    }
}

/* End of file lib_tasks.php */
/* Location: ./application/libraries/v1/tasks/lib_tasks.php */
