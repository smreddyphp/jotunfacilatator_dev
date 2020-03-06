<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_Shops
{
    public $strFlashMessage;

    /**
     * __construct
     */
    function __construct()
    {
        $this->ci = &get_instance();

        // Load shops config
        $this->ci->load->config('default/shops');

        // Set API
        $this->strAPI = $this->ci->config->item('shops_api');
    }

    /**
     * addShop
     *
     * @param string[] $p_arrDetails
     * @return boolean
     */
    function addShop($p_arrDetails)
    {
        // Post
        return $this->ci->rest->post($this->strAPI, json_encode($p_arrDetails), 'json');
    }

    /**
     * updateShop
     *
     * @param string[] $p_arrDetails
     * @param integer $p_nID
     * @return boolean
     */
    function updateShop($p_arrDetails, $p_nID)
    {
        // Put
        return $this->ci->rest->put($this->strAPI.$p_nID, json_encode($p_arrDetails), 'json');
    }

    /**
     * getShopByID
     *
     * @param integer $p_nID
     * @return object
     */
    function getShopByID($p_nID)
    {
        // Get category by ID
        $objResult = $this->ci->rest->get($this->strAPI.$p_nID);

        // Flash message
        $this->strFlashMessage = ($objResult->success == false) ? $objResult->errors[0]->message : '';

        return ($objResult->success == true) ? $objResult->result[0] : false;
    }

    /**
     * getShops
     *
     * @return object
     */
    function getShops($p_nStatus)
    {
        // Params
        $arrParams = ($p_nStatus) ? array('status' => $p_nStatus) : array();

        // Get shops
        $objResult = $this->ci->rest->get($this->strAPI, $arrParams, 'json');
        return ($objResult->success == true) ? $objResult->result : array();
    }

    /**
     * getShopsList
     *
     * @param string $p_nStatus
     * @param string[] $p_arrColumns
     * @return string[]
     */
    function getShopsList($p_nStatus = NULL, $p_arrColumns = array('id', 'name'))
    {
        // Assign
        list($strIndex, $strValue) = $p_arrColumns;

        // Get shops
        $objData = $this->getShops($p_nStatus);

        // Create index, value array
        $arrData = array();
        if(!empty($objData))
            foreach($objData as $objDat)
                $arrData[$objDat->{$strIndex}] = $objDat->{$strValue};

        return $arrData;
    }

    /**
     * getShopsForPagination
     *
     * @param integer $p_nLimit
     * @param integer $p_nOffset
     * @param string $p_strSearch
     * @param integer $p_nStatus
     * @param integer $p_nShopTypeID
     * @return string[]
     */
    function getShopsForPagination($p_nLimit, $p_nOffset, $p_strSearch = NULL, $p_nStatus = NULL, $p_nShopTypeID = NULL)
    {
        // Params
        $arrParams = array('limit' => $p_nLimit, 'offset' => $p_nOffset);
        $arrParams += ($p_strSearch) ? array('search' => $p_strSearch) : array();
        $arrParams += ($p_nStatus != NULL) ? array('status' => $p_nStatus) : array();
        $arrParams += ($p_nShopTypeID) ? array('shop_type_id' => $p_nShopTypeID) : array();

        // Get shops
        $objResult = $this->ci->rest->get($this->strAPI, $arrParams, 'json');

        return ($objResult->success == true) ? array('objShops' => $objResult->result, 'nTotalRows' => $objResult->totalCount) : array('objShops' => array(), 'nTotalRows' => 0, 'message' => $objResult->result->errors[0]->message);
    }

    /**
     * deleteShop
     *
     * @param integer $p_nID
     * @return object
     */
    function deleteShop($p_nID)
    {
        // Delete by ID
        return $this->ci->rest->delete($this->strAPI.$p_nID);
    }
}

/* End of file Lib_Shops.php */
/* Location: ./application/libraries/Lib_Shops.php */