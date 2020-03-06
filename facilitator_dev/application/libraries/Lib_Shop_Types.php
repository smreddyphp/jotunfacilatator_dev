<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_Shop_Types
{
    public $strFlashMessage;

    /**
     * __construct
     */
    function __construct()
    {
        $this->ci = &get_instance();

        // Load shop_types config
        $this->ci->load->config('default/shop_types');

        // Set API
        $this->strAPI = $this->ci->config->item('shop_types_api');
    }

    /**
     * addShopType
     *
     * @param string[] $p_arrDetails
     * @return boolean
     */
    function addShopType($p_arrDetails)
    {
        // Post
        return $this->ci->rest->post($this->strAPI, json_encode($p_arrDetails), 'json');
    }

    /**
     * updateShopType
     *
     * @param string[] $p_arrDetails
     * @param integer $p_nID
     * @return boolean
     */
    function updateShopType($p_arrDetails, $p_nID)
    {
        // Put
        return $this->ci->rest->put($this->strAPI.$p_nID, json_encode($p_arrDetails), 'json');
    }

    /**
     * getShopTypeByID
     *
     * @param integer $p_nID
     * @return object
     */
    function getShopTypeByID($p_nID)
    {
        // Get shop types by ID
        $objResult = $this->ci->rest->get($this->strAPI.$p_nID);

        // Flash message
        $this->strFlashMessage = ($objResult->success == false) ? $objResult->errors[0]->message : '';

        return ($objResult->success == true) ? $objResult->result[0] : false;
    }

    /**
     * getShopTypes
     *
     * @return object
     */
    function getShopTypes($p_nStatus)
    {
        // Params
        $arrParams = ($p_nStatus) ? array('status' => $p_nStatus) : array();

        // Get shop_types
        $objResult = $this->ci->rest->get($this->strAPI, $arrParams, 'json');
        return ($objResult->success == true) ? $objResult->result : array();
    }

    /**
     * getShopTypesList
     *
     * @param string $p_nStatus
     * @param string[] $p_arrColumns
     * @return string[]
     */
    function getShopTypesList($p_nStatus = NULL, $p_arrColumns = array('id', 'name'))
    {
        // Assign
        list($strIndex, $strValue) = $p_arrColumns;

        // Get shop_types
        $objData = $this->getShopTypes($p_nStatus);

        // Create index, value array
        $arrData = array();
        if(!empty($objData))
            foreach($objData as $objDat)
                $arrData[$objDat->{$strIndex}] = $objDat->{$strValue};

        return $arrData;
    }

    /**
     * getShopTypesForPagination
     *
     * @param integer $p_nLimit
     * @param integer $p_nOffset
     * @param string $p_strSearch
     * @return string[]
     */
    function getShopTypesForPagination($p_nLimit, $p_nOffset, $p_strSearch = NULL)
    {
        // Get shop_types
        $objResult = $this->ci->rest->get($this->strAPI, array('limit' => $p_nLimit, 'offset' => $p_nOffset) + (($p_strSearch) ? array('search' => $p_strSearch) : array()), 'json');
        return ($objResult->success == true) ? array('objShopTypes' => $objResult->result, 'nTotalRows' => $objResult->totalCount) : array('objShopTypes' => array(), 'nTotalRows' => 0, 'message' => $objResult->errors[0]->message);
    }

    /**
     * deleteShopType
     *
     * @param integer $p_nID
     * @return object
     */
    function deleteShopType($p_nID)
    {
        // Delete by ID
        return $this->ci->rest->delete($this->strAPI.$p_nID);
    }
}

/* End of file Lib_ShopTypes.php */
/* Location: ./application/libraries/Lib_ShopTypes.php */