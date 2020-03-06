<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'/libraries/v1/forms/Forms_Constants.php';

class Lib_Forms
{
    /**
     * __construct method
     */
    function __construct() 
    {
        // CI
        $this->ci = &get_instance();

        // Load forms config
        $this->ci->load->config('v1/forms');

        // Load lang config
        $this->ci->lang->load('v1/forms', $this->ci->lib_api->lang);

        // Load form model
        $this->ci->load->model('v1/form');
    }

    /**
     * addForm method
     *
     * @param string[] $p_arrForm
     * @return integer
     */
    public function addForm($p_arrForm)
    {
        return $this->ci->form->addForm($p_arrForm);
    }

    /**
     * updateForm method
     *
     * @param string[] $p_arrForm
     * @param integer $p_nID
     * @return boolean
     */
    public function updateForm($p_arrForm, $p_nID)
    {
        return $this->ci->form->updateForm($p_arrForm, $p_nID);
    }

    /**
     * isUnique method
     *
     * @param string[] $p_arrForm
     * @param integer $p_nID
     * @return boolean
     */
    public function isUnique($p_nID)
    {
        return false;
    }

     /**
     * checkFormExistByID method
     *
     * @param integer $p_nID
     * @return object
     */
    public function checkFormExistByID($p_nID)
    {
        return $this->ci->form->checkFormExistByID($p_nID);
    }

    /**
     * getFormByID method
     *
     * @param integer $p_nID
     * @return object
     */
    public function getFormByID($p_nID)
    {
        return $this->ci->form->getFormByID($p_nID);
    }

    /**
     * getFormsForPagination method
     *
     * @param integer $p_nLimit
     * @param integer $p_nOffset
     * @param integer $p_strSearch
     * @param integer $p_nStatus
     * @return object
     */
    public function getFormsForPagination($p_nLimit = NULL, $p_nOffset = NULL, $p_strSearch = NULL, $p_nStatus = NULL)
    {
        return $this->ci->form->getFormsForPagination($p_nLimit, $p_nOffset, $p_strSearch, $p_nStatus);
    }

    /**
     * getNoOfForms method
     *
     * @param integer $p_strSearch
     * @param integer $p_nStatus
     * @return integer
     */
    public function getNoOfForms($p_strSearch = NULL, $p_nStatus = NULL)
    {
        return $this->ci->form->getNoOfForms($p_strSearch, $p_nStatus);
    }

    /**
     * deleteForm method
     *
     * @param integer $p_nID
     * @return boolean
     */
    public function deleteForm($p_nID)
    {
        return $this->ci->form->deleteForm($p_nID);
    }
}

/* End of file lib_forms.php */
/* Location: ./application/libraries/v1/forms/lib_forms.php */