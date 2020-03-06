<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'/libraries/v1/shop_types/Shop_Types_Constants.php';

class Lib_Shop_Types
{
    /**
     * __construct method
     */
    function __construct() 
    {
        // CI
        $this->ci = &get_instance();

        // Load ShopTypes config
        $this->ci->load->config('v1/shop_types');

        // Load lang config
        $this->ci->lang->load('v1/shop_types', $this->ci->lib_api->lang);

        // Load ShopType model
        $this->ci->load->model('v1/shop_type');
    }

    /**
     * addShopType method
     *
     * @param string[] $p_arrShopType
     * @return string[]
     */
    public function addShopType($p_arrShopType)
    {
        return $this->ci->shop_type->addShopType($p_arrShopType);
    }

    /**
     * updateShopType method
     *
     * @param string[] $p_arrShopType
     * @param integer $p_nID
     * @return boolean
     */
    public function updateShopType($p_arrShopType, $p_nID)
    {
        return $this->ci->shop_type->updateShopType($p_arrShopType, $p_nID);
    }

    /**
     * checkShopTypeExistByID method
     *
     * @param integer $p_nID
     * @return object
     */
    public function checkShopTypeExistByID($p_nID)
    {
        return $this->ci->shop_type->checkShopTypeExistByID($p_nID);
    }

    /**
     * getShopTypeByID method
     *
     * @param integer $p_nID
     * @return object
     */
    public function getShopTypeByID($p_nID)
    {
        return $this->ci->shop_type->getShopTypeByID($p_nID);
    }

    /**
     * getShopTypesForPagination method
     *
     * @param integer $p_nLimit
     * @param integer $p_nOffset
     * @param integer $p_strSearch
     * @param integer $p_nStatus
     * @return object
     */
    public function getShopTypesForPagination($p_nLimit = NULL, $p_nOffset = NULL, $p_strSearch = NULL, $p_nStatus = NULL)
    {
        return $this->ci->shop_type->getShopTypesForPagination($p_nLimit, $p_nOffset, $p_strSearch, $p_nStatus);
    }

    /**
     * getNoOfShopTypes method
     *
     * @param integer $p_strSearch
     * @param integer $p_nStatus
     * @return integer
     */
    public function getNoOfShopTypes($p_strSearch = NULL, $p_nStatus = NULL)
    {
        return $this->ci->shop_type->getNoOfShopTypes($p_strSearch, $p_nStatus);
    }

    /**
     * deleteShopType method
     *
     * @param integer $p_nID
     * @return boolean
     */
    public function deleteShopType($p_nID)
    {
        return $this->ci->shop_type->deleteShopType($p_nID);
    }
}

/* End of file lib_shop_types.php */
/* Location: ./application/libraries/v1/shop_types/lib_shop_types.php */
