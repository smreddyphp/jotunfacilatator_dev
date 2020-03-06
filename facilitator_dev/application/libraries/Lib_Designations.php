<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_Designations
{
    public $strFlashMessage;

    /**
     * __construct
     */
    function __construct()
    {
        $this->ci = &get_instance();

        // Load designations config
        $this->ci->load->config('default/designations');

        // Set API
        $this->strAPI = $this->ci->config->item('designations_api');
    }

    /**
     * addDesignation
     *
     * @param string[] $p_arrDetails
     * @return boolean
     */
    function addDesignation($p_arrDetails)
    {
        // Post
        return $this->ci->rest->post($this->strAPI, json_encode($p_arrDetails), 'json');
    }

    /**
     * updateDesignation
     *
     * @param string[] $p_arrDetails
     * @param integer $p_nID
     * @return boolean
     */
    function updateDesignation($p_arrDetails, $p_nID)
    {
        // Put
        return $this->ci->rest->put($this->strAPI.$p_nID, json_encode($p_arrDetails), 'json');
    }

    /**
     * getDesignationByID
     *
     * @param integer $p_nID
     * @return object
     */
    function getDesignationByID($p_nID)
    {
        // Get category by ID
        $objResult = $this->ci->rest->get($this->strAPI.$p_nID);

        // Flash message
        $this->strFlashMessage = ($objResult->success == false) ? $objResult->errors[0]->message : '';

        return ($objResult->success == true) ? $objResult->result[0] : false;
    }

    /**
     * getDesignations
     *
     * @return object
     */
    function getDesignations($p_nStatus)
    {
        // Params
        $arrParams = ($p_nStatus) ? array('status' => $p_nStatus) : array();

        // Get designations
        $objResult = $this->ci->rest->get($this->strAPI, $arrParams, 'json');
        return ($objResult->success == true) ? $objResult->result : array();
    }

    /**
     * getDesignationsList
     *
     * @param integer $p_nExceptDesignationID
     * @param string $p_nStatus
     * @param string[] $p_arrColumns
     * @return string[]
     */
    function getDesignationsList($p_nExceptDesignationID = NULL, $p_nStatus = NULL, $p_arrColumns = array('id', 'name'))
    {
        // Assign
        list($strIndex, $strValue) = $p_arrColumns;

        // Get designations
        $objData = $this->getDesignations($p_nStatus);

        // Create index, value array
        $arrData = array();
        if(!empty($objData))
            foreach($objData as $objDat)
                if($p_nExceptDesignationID != $objDat->{$strIndex})
                    $arrData[$objDat->{$strIndex}] = $objDat->{$strValue};

        return $arrData;
    }

    /**
     * getDesignationsForPagination
     *
     * @param integer $p_nLimit
     * @param integer $p_nOffset
     * @param string $p_strSearch
     * @return string[]
     */
    function getDesignationsForPagination($p_nLimit, $p_nOffset, $p_strSearch = NULL)
    {
        // Get designations
        $objResult = $this->ci->rest->get($this->strAPI, array('limit' => $p_nLimit, 'offset' => $p_nOffset) + (($p_strSearch) ? array('search' => $p_strSearch) : array()), 'json');
        return ($objResult->success == true) ? array('objDesignations' => $objResult->result, 'nTotalRows' => $objResult->totalCount) : array('objDesignations' => array(), 'nTotalRows' => 0, 'message' => $objResult->errors[0]->message);
    }

    /**
     * deleteDesignation
     *
     * @param integer $p_nID
     * @return object
     */
    function deleteDesignation($p_nID)
    {
        // Delete by ID
        return $this->ci->rest->delete($this->strAPI.$p_nID);
    }
}

/* End of file Lib_Designations.php */
/* Location: ./application/libraries/Lib_Designations.php */