<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'/libraries/v1/designations/Designations_Constants.php';

class Lib_Designations
{
    /**
     * __construct method
     */
    function __construct() 
    {
        // CI
        $this->ci = &get_instance();

        // Load Designations config
        $this->ci->load->config('v1/designations');

        // Load lang config
        $this->ci->lang->load('v1/designations', $this->ci->lib_api->lang);

        // Load Designation model
        $this->ci->load->model('v1/designation');
    }

    /**
     * addDesignation method
     *
     * @param string[] $p_arrDesignation
     * @return integer
     */
    public function addDesignation($p_arrDesignation)
    {
        return $this->ci->designation->addDesignation($p_arrDesignation);
    }

    /**
     * updateDesignation method
     *
     * @param string[] $p_arrDesignation
     * @param integer $p_nID
     * @return boolean
     */
    public function updateDesignation($p_arrDesignation, $p_nID)
    {
        return $this->ci->designation->updateDesignation($p_arrDesignation, $p_nID);
    }

    /**
     * checkDesignationExistByID method
     *
     * @param integer $p_nID
     * @return boolean
     */
    public function checkDesignationExistByID($p_nID)
    {
        return $this->ci->designation->checkDesignationExistByID($p_nID);
    }

    /**
     * getDesignationByID method
     *
     * @param integer $p_nID
     * @return object
     */
    public function getDesignationByID($p_nID)
    {
        return $this->ci->designation->getDesignationByID($p_nID);
    }

    /**
     * getDesignationsForPagination method
     *
     * @param integer $p_nLimit
     * @param integer $p_nOffset
     * @param integer $p_strSearch
     * @param integer $p_nStatus
     * @return object
     */
    public function getDesignationsForPagination($p_nLimit = NULL, $p_nOffset = NULL, $p_strSearch = NULL, $p_nStatus = NULL)
    {
        return $this->ci->designation->getDesignationsForPagination($p_nLimit, $p_nOffset, $p_strSearch, $p_nStatus);
    }

    /**
     * getNoOfDesignations method
     *
     * @param integer $p_strSearch
     * @param integer $p_nStatus
     * @return integer
     */
    public function getNoOfDesignations($p_strSearch = NULL, $p_nStatus = NULL)
    {
        return $this->ci->designation->getNoOfDesignations($p_strSearch, $p_nStatus);
    }

    /**
     * deleteDesignation method
     *
     * @param integer $p_nID
     * @return boolean
     */
    public function deleteDesignation($p_nID)
    {
        return $this->ci->designation->deleteDesignation($p_nID);
    }
}

/* End of file lib_designation.php */
/* Location: ./application/libraries/v1/designations/lib_designation.php */
