<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'/libraries/v1/dealers/Dealers_Constants.php';

class Lib_Dealers
{
    /**
     * __construct method
     */
    function __construct() 
    {
        // CI
        $this->ci = &get_instance();

        // Load Shops config
        $this->ci->load->config('v1/shops');

        // Load lang config
        //$this->ci->lang->load('v1/shops', $this->ci->lib_api->lang);

        // Load Shop model
        $this->ci->load->model('v1/dealer');
    }
    
    public function getdealers($user_id)
    {
        return $this->ci->dealer->all_dealers($user_id);
    }

    /**
     * addShop method
     *
     * @param string[] $p_arrShop
     * @return integer
     */
   /* public function addShop($p_arrShop)
    {
        return $this->ci->shop->addShop($p_arrShop);
    }

    /**
     * updateShop method
     *
     * @param string[] $p_arrShop
     * @param integer $p_nID
     * @return boolean
     */
    /*public function updateShop($p_arrShop, $p_nID)
    {
        return $this->ci->shop->updateShop($p_arrShop, $p_nID);
    }*/

     /**
     * checkShopExistByID method
     *
     * @param integer $p_nID
     * @return object
     */
    /*public function checkShopExistByID($p_nID)
    {
        return $this->ci->shop->checkShopExistByID($p_nID);
    }*/

    /**
     * getShopByID method
     *
     * @param integer $p_nID
     * @return object
     */
   /* public function getShopByID($p_nID)
    {
        return $this->ci->shop->getShopByID($p_nID);
    }*/

    /**
     * getShopsForPagination method
     *
     * @param integer $p_nLimit
     * @param integer $p_nOffset
     * @param integer $p_strSearch
     * @param integer $p_nStatus
     * @param integer $p_nShopTypeID
     * @return object
     */
    /*public function getShopsForPagination($p_nLimit = NULL, $p_nOffset = NULL, $p_strSearch = NULL, $p_nStatus = NULL, $p_nShopTypeID = NULL)
    {
        return $this->ci->shop->getShopsForPagination($p_nLimit, $p_nOffset, $p_strSearch, $p_nStatus, $p_nShopTypeID);
    }
*/
    /**
     * getNoOfShops method
     *
     * @param integer $p_strSearch
     * @param integer $p_nStatus
     * @param integer $p_nShopTypeID
     * @return integer
     */
   /* public function getNoOfShops($p_strSearch = NULL, $p_nStatus = NULL, $p_nShopTypeID = NULL)
    {
        return $this->ci->shop->getNoOfShops($p_strSearch, $p_nStatus, $p_nShopTypeID);
    }*/

    /**
     * deleteShop method
     *
     * @param integer $p_nID
     * @return boolean
     */
    /*public function deleteShop($p_nID)
    {
        return $this->ci->shop->deleteShop($p_nID);
    }*/

    /**
     * @param object $p_objResults
     * @return string[]
     */
    /*public function arrangeFormat($p_objResults)
    {
        $arrData = array();

        foreach ($p_objResults as $objResult)
        {
            $arrData[] = array(
                'id' => $objResult->id,
                'name' => $objResult->name,
                'email' => $objResult->email,
                'phone' => $objResult->phone,
                'address' => $objResult->address,
                'acc_no' => $objResult->acc_no,
                'last_evaluation' => $objResult->last_evaluation,
                'latitude' => $objResult->latitude,
                'longitude' => $objResult->longitude,
                'image' => $objResult->image,
                'status' => $objResult->status,
                'address_search' => $objResult->address_search,
                'door_number' => $objResult->door_number,
                'street_number' => $objResult->street_number,
                'colony' => $objResult->colony,
                'distric' => $objResult->distric,
                'province' => $objResult->province,
                'postal_code' => $objResult->postal_code,
                'country' => $objResult->country,
                'shop_type' => array(
                    'id' => $objResult->shop_type_id,
                    'name' => $objResult->shop_type_name,
                ),
                'created' => $objResult->created,
                'modified' => $objResult->modified
            );
        }

        return $arrData;
    }*/
}

/* End of file lib_shop.php */
/* Location: ./application/libraries/v1/shops/lib_shop.php */
