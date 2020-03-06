<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_Forms
{
    public $strFlashMessage;

    /**
     * __construct
     */
    function __construct()
    {
        $this->ci = &get_instance();

        // Load forms config
        $this->ci->load->config('default/forms');

        // Set API
        $this->strAPI = $this->ci->config->item('forms_api');
    }

    /**
     * addForm
     *
     * @param string[] $p_arrDetails
     * @return boolean
     */
    function addForm($p_arrDetails)
    {
        // Post
        return $this->ci->rest->post($this->strAPI, json_encode($p_arrDetails), 'json');
    }

    /**
     * updateForm
     *
     * @param string[] $p_arrDetails
     * @param integer $p_nID
     * @return boolean
     */
    function updateForm($p_arrDetails, $p_nID)
    {
        // Put
        return $this->ci->rest->put($this->strAPI.$p_nID, json_encode($p_arrDetails), 'json');
    }

    /**
     * getFormByID
     *
     * @param integer $p_nID
     * @return object
     */
    function getFormByID($p_nID)
    {
        // Get category by ID
        $objResult = $this->ci->rest->get($this->strAPI.$p_nID);

        // Flash message
        $this->strFlashMessage = ($objResult->success == false) ? $objResult->errors[0]->message : '';

        return ($objResult->success == true) ? $objResult->result[0] : false;
    }

    /**
     * getForms
     *
     * @return object
     */
    function getForms($p_nStatus)
    {
        // Params
        $arrParams = ($p_nStatus) ? array('status' => $p_nStatus) : array();

        // Get forms
        $objResult = $this->ci->rest->get($this->strAPI, $arrParams, 'json');
        return ($objResult->success == true) ? $objResult->result : array();
    }

    /**
     * getFormsList
     *
     * @param string $p_nStatus
     * @param string[] $p_arrColumns
     * @return string[]
     */
    function getFormsList($p_nStatus = NULL, $p_arrColumns = array('id', 'name'))
    {
        // Assign
        list($strIndex, $strValue) = $p_arrColumns;

        // Get forms
        $objData = $this->getForms($p_nStatus);

        // Create index, value array
        $arrData = array();
        if(!empty($objData))
            foreach($objData as $objDat)
                $arrData[$objDat->{$strIndex}] = $objDat->{$strValue};

        return $arrData;
    }

    /**
     * getFormsForPagination
     *
     * @param integer $p_nLimit
     * @param integer $p_nOffset
     * @param string $p_strSearch
     * @return string[]
     */
    function getFormsForPagination($p_nLimit, $p_nOffset, $p_strSearch = NULL)
    {
        // Get forms
        $objResult = $this->ci->rest->get($this->strAPI, array('limit' => $p_nLimit, 'offset' => $p_nOffset) + (($p_strSearch) ? array('search' => $p_strSearch) : array()), 'json');
        return ($objResult->success == true) ? array('objForms' => $objResult->result, 'nTotalRows' => $objResult->totalCount) : array('objForms' => array(), 'nTotalRows' => 0, 'message' => $objResult->errors[0]->message);
    }

    /**
     * deleteForm
     *
     * @param integer $p_nID
     * @return object
     */
    function deleteForm($p_nID)
    {
        // Delete by ID
        return $this->ci->rest->delete($this->strAPI.$p_nID);
    }
}

/* End of file Lib_Forms.php */
/* Location: ./application/libraries/Lib_Forms.php */