<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'/libraries/v1/task_forms/Task_Forms_Constants.php';

class Lib_Task_Forms
{
    /**
     * __construct method
     */
    function __construct() 
    {
        // CI
        $this->ci = &get_instance();

        // Load task_forms config
        $this->ci->load->config('v1/task_forms');

        // Load lang config
        $this->ci->lang->load('v1/task_forms', $this->ci->lib_api->lang);

        // Load task_form model
        $this->ci->load->model('v1/task_form');
    }

    /**
     * updateTaskForm method
     *
     * @param string[] $p_arrTaskForm
     * @param integer $p_nID
     * @return boolean
     */
    public function updateTaskForm($p_arrTaskForm, $p_nID)
    {
        return $this->ci->task_form->updateTaskForm($p_arrTaskForm, $p_nID);
    }

    /**
     * getTaskFormByID method
     *
     * @param integer $p_nID
     * @return object
     */
    public function getTaskFormByID($p_nID)
    {
        return $this->ci->task_form->getTaskFormByID($p_nID);
    }

    /**
     * checkTaskFormExistByID method
     *
     * @param integer $p_nID
     * @return boolean
     */
    public function checkTaskFormExistByID($p_nID)
    {
        return $this->ci->task_form->checkTaskFormExistByID($p_nID);
    }

    /**
     * addPoints method
     *
     * @param string[] $p_arrPoints
     * @return integer
     */
    public function addPoints($p_arrPoints)
    {
        return $this->ci->task_form->addPoints($p_arrPoints);
    }

    /**
     * getPointsByTaskFormID method
     *
     * @param integer $p_nTaskFormID
     * @return string[]
     */
    public function getPointsByTaskFormID($p_nTaskFormID)
    {
        return $this->ci->task_form->getPointsByTaskFormID($p_nTaskFormID);
    }

    /**
     * deletePointsByTaskFormID method
     *
     * @param string[] $p_nTaskFormID
     * @return boolean
     */
    public function deletePointsByTaskFormID($p_nTaskFormID)
    {
        return $this->ci->task_form->deletePointsByTaskFormID($p_nTaskFormID);
    }



    public function get_taskformpoints_taskformid($p_nTaskFormID){
        return $this->ci->task_form->get_taskformpoints_taskformid($p_nTaskFormID);
    }
    
    
    public function get_taskformpointsdata_taskformid($p_nTaskFormID){
        return $this->ci->task_form->get_taskformpointsdata_taskformid($p_nTaskFormID);
    }
    
    
    /**
     * getTaskFormsByUserID method
     *
     * @param integer $p_nUserID
     * @return object
     */
    public function getTaskFormsByUserID($p_nUserID)
    {
        return $this->ci->task_form->getTaskFormsByUserID($p_nUserID);
    }

    /**
     * getTaskForms method
     *
     * @param integer $p_nTaskFormID
     * @return object
     */
    public function getTaskForms($p_nTaskFormID)
    {
        return $this->ci->task_form->getTaskForms($p_nTaskFormID);
    }

    /**
     * getTaskFormsByFormAndUserID method
     *
     * @param integer $p_nFormID
     * @param integer $p_nUserID
     * @return object
     */
    public function getTaskFormsByFormAndUserID($p_nFormID, $p_nUserID)
    {
        return $this->ci->task_form->getTaskFormsByFormAndUserID($p_nFormID, $p_nUserID);
    }

    /**
     * getNoOfFormsByTaskID method
     *
     * @param integer $p_nTaskID
     * @return object
     */
    public function getNoOfFormsByTaskID($p_nTaskID)
    {
        return $this->ci->task_form->getNoOfFormsByTaskID($p_nTaskID);
    }

    /**
     * getNoOfFormPointsByTaskID method
     *
     * @param integer $p_nTaskID
     * @return object
     */
    public function getNoOfFormPointsByTaskID($p_nTaskID)
    {
        return $this->ci->task_form->getNoOfFormPointsByTaskID($p_nTaskID);
    }

    /**
     * addImages method
     *
     * @param string[] $p_arrImages
     * @return boolean
     */
    public function addImages($p_arrImages)
    {
        return $this->ci->task_form->addImages($p_arrImages);
    }

    /**
     * getImagesByTaskFormID method
     *
     * @param integer $p_nTaskFormID
     * @return string[]
     */
    public function getImagesByTaskFormID($p_nTaskFormID)
    {
        return $this->ci->task_form->getImagesByTaskFormID($p_nTaskFormID);
    }

    /**
     * deleteImagesByTaskFormID method
     *
     * @param string[] $p_nTaskFormID
     * @return boolean
     */
    public function deleteImagesByTaskFormID($p_nTaskFormID)
    {
        return $this->ci->task_form->deleteImagesByTaskFormID($p_nTaskFormID);
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
            $arrData[] = array(
                'id' => $objResult->id,
                'signature' => $objResult->signature,
                'task_id' => $objResult->task_id,
                'form_id' => $objResult->form_id,
                'status' => $objResult->status,
                'shop' => array(
                    'id' => $objResult->shop_id,
                    'name' => $objResult->shop_name,
                    'address' => $objResult->shop_address,
                    'acc_no' => $objResult->shop_acc_no,
                    'last_evaluation' => $objResult->shop_last_evaluation,
                    'modified' => $objResult->shop_modified,
                    'shop_type_id' => $objResult->shop_type_id,
                    'shop_type' => array(
                        'id' => $objResult->shop_type_id,
                        'name' => $objResult->shop_type_name
                    )
                ),
                'form' => array(
                    'id' => $objResult->form_id,
                    'name' => $objResult->form_name,
                    'total' => $objResult->form_tpoints
                )
            );
        }

        return $arrData;
    }

    /**
     * @param object $p_objResults
     * @return string[]
     */
    public function arrangeFormsFormat($p_objResults)
    {
        $arrData = array();

        foreach ($p_objResults as $objResult)
        {
            $arrData[] = array(
                'id' => $objResult->form_id,
                'name' => $objResult->form_name,
            );
        }

        return $arrData;
    }

    /**
     * @param object $p_objResults
     * @return string[]
     */
    public function arrangeShopsFormat($p_objResults)
    {
        $arrData = array();

        foreach ($p_objResults as $objResult)
        {
            $arrData[] = array(
                'id' => $objResult->shop_id,
                'name' => $objResult->shop_name,
                'address' => $objResult->shop_address,
                'email' => $objResult->shop_email,
                'acc_no' => $objResult->shop_acc_no,
                'last_evaluation' => $objResult->shop_last_evaluation,
		'shop_image' => $objResult->shop_image,
                'task_form' => array(
                    'id' => $objResult->id,
                    'task_id' => $objResult->task_id,
                    'form_id' => $objResult->form_id
                )
            );
        }

        return $arrData;
    }

    /**
     * @param object $p_objResults
     * @return string[]
     */
    public function arrangePointsFormat($p_objResults)
    {
        $arrData = array();

        foreach ($p_objResults as $objResult)
        {
           // return print_r($p_objResults);exit;
            if(isset($arrData[$objResult->sub_form_id]))
            {
                $arrData[$objResult->sub_form_id]['points'][] = array(
                    'id' => $objResult->id,
                    'name' => $objResult->name,
                    'value' => $objResult->value,
                    'comment' => $objResult->comment,
                );
            }
            else
            {
                $arrData[$objResult->sub_form_id] = array(
                    'id' => $objResult->sub_form_id,
                    'name' => $objResult->sub_form_name,
                    'points' => array(
                        array(
                            'id' => $objResult->id,
                            'name' => $objResult->name,
                            'value' => $objResult->value,
                            'comment' => $objResult->comment,
                        )
                    )
                );
            }
        }

        return array_values($arrData);
    }
}

/* End of file lib_tasks.php */
/* Location: ./application/libraries/v1/tasks/lib_tasks.php */
