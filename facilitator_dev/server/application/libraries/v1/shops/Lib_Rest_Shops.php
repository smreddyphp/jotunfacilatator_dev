<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_Rest_Shops extends Lib_Api
{
    /**
     * __construct method
     */
    function __construct() 
    {
        // CI
        $this->ci = &get_instance();

        // Load Lib_Shops Library
        $this->ci->load->library('v1/shops/Lib_Shops');
    }

   /**
     * @return string[]
     */
    public function postShop()
    {
        // Input
        $arrShop = array(
            'name' => $this->ci->post('name'),
            'address' => $this->ci->post('address'),
            'latitude' => $this->ci->post('latitude'),
            'longitude' => $this->ci->post('longitude'),
            'last_evaluation' => $this->ci->post('last_evaluation'),
            'shop_type_id' => $this->ci->post('shop_type_id'),
            'acc_no' => $this->ci->post('acc_no'),
            'email' => $this->ci->post('email'),
            'phone' => $this->ci->post('phone'),
            'address_search' => $this->ci->post('address_search'),
            'door_number'=>$this->ci->post('door_number'),
            'street_number'=>$this->ci->post('street_number'),            
            'colony'=>$this->ci->post('colony'),
            'distric'=>$this->ci->post('distric'),
            'province'=>$this->ci->post('province'),            
            'postal_code'=>$this->ci->post('postal_code'),
            'country'=>$this->ci->post('country'),
            'created' => date('Y-m-d h:i:s'),
            'dealer_id'=>$this->ci->post('dealer_id'),
            'sales_target'=>$this->ci->post('sales_target'),
            'purchase_target'=>$this->ci->post('purchase_target'),
            'goods_target'=>$this->ci->post('goods_target')

        );

        // Set rules
        $this->ci->form_validation->set_rules('name', 'name', 'required|is_unique[shops.name, 0]');
        $this->ci->form_validation->set_rules('address', 'address', 'required');
        $this->ci->form_validation->set_rules('latitude', 'latitude', 'required|numeric');
        $this->ci->form_validation->set_rules('longitude', 'longitude', 'required|numeric');
        $this->ci->form_validation->set_rules('last_evaluation', 'last_evaluation', 'required');
        $this->ci->form_validation->set_rules('shop_type_id', 'shop_type_id', 'required|numeric');
        $this->ci->form_validation->set_rules('acc_no', 'acc_no', '');
        $this->ci->form_validation->set_rules('email', 'email', 'required|is_unique[shops.email, 0]');
        $this->ci->form_validation->set_rules('phone', 'phone', 'required|numeric');
        $this->ci->form_validation->set_rules('province', 'province', 'required');
        $this->ci->form_validation->set_rules('country', 'country', 'required');

        // Image
        $arrShop += ($this->ci->post('image')) ? array('image' => $this->ci->post('image')) : array();

         // Set data
        $this->ci->form_validation->set_data($arrShop);

        // Run
        if($this->ci->form_validation->run() == false)
            return $this->throws($this->ci->form_validation->get_errors('Shops_Constants'), Restserver\Libraries\REST_Controller::HTTP_OK);

        // Add shop
        $nShopID = $this->ci->lib_shops->addShop($arrShop);
        if(!$nShopID)
            return $this->throws(
                array(Shops_Constants::SHOP_NOT_CREATED => sprintf($this->ci->lang->line('shop_not_created'))),
                Restserver\Libraries\REST_Controller::HTTP_OK);

        return array(
            'response' => array(
                'success' => true,
                'result' => array(
                    'id' => $nShopID,
                    'message' => sprintf($this->ci->lang->line('shop_created_successfully'), $nShopID)
                )
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
        );
    }

    /**
     * @param integer $p_nID
     * @return string[]
     */
    public function putShop($p_nID)
    {
        // Check shop exist by ID
        if(!$this->ci->lib_shops->checkShopExistByID($p_nID))
            return $this->throws(
                array(Shops_Constants::SHOP_NOT_AVAIL => sprintf($this->ci->lang->line('shop_not_available'))),
                Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Put method
        $arrShop = $this->ci->put();

        // Set data
        $this->ci->form_validation->set_data($arrShop);

        // Set rules
        $this->ci->form_validation->set_rules('name', 'name', 'required|is_unique[shops.name, '.$p_nID.']');
        $this->ci->form_validation->set_rules('address', 'address', 'required');
        $this->ci->form_validation->set_rules('latitude', 'latitude', 'required|numeric');
        $this->ci->form_validation->set_rules('longitude', 'longitude', 'required|numeric');
        $this->ci->form_validation->set_rules('last_evaluation', 'last_evaluation', 'required');
        $this->ci->form_validation->set_rules('shop_type_id', 'shop_type_id', 'required|numeric');
        $this->ci->form_validation->set_rules('acc_no', 'acc_no', '');
        $this->ci->form_validation->set_rules('email', 'email', 'required|is_unique[shops.email, '.$p_nID.']');

        // Image
        $arrShop += ($this->ci->put('image')) ? array('image' => $this->ci->put('image')) : array();

        // Validate
        if($this->ci->form_validation->validate() == false)
            return $this->throws($this->ci->form_validation->get_errors('Shops_Constants'), Restserver\Libraries\REST_Controller::HTTP_OK);

        // Update shop by ID
        $bValue = $this->ci->lib_shops->updateShop($arrShop, $p_nID);
        if(!$bValue)
            return $this->throws(
                array(Shops_Constants::SHOP_NOT_UPDATED => sprintf($this->ci->lang->line('shop_not_updated'))),
                Restserver\Libraries\REST_Controller::HTTP_OK);

        return array(
            'response' => array(
                'success' => true,
                'result'  => array(
                    'id' => $p_nID,
                    'message' => sprintf($this->ci->lang->line('shop_updated_successfully'), $p_nID)
                )
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
         );
    }

    /**
     * @param integer $p_nID
     * @return string[]
     */
    public function getShops($p_nID = NULL)
    {
        // Set
        $nLimit = ($this->ci->get('limit')) ? (int)$this->ci->get('limit') : NULL;
        $nOffset = ($this->ci->get('offset')) ? (int)$this->ci->get('offset') : NULL;
        $strSearch = ($this->ci->get('search')) ? $this->ci->get('search') : NULL;
        $nStatus = $this->ci->get('status');
        $nStatus = (isset($nStatus)) ? $nStatus : 'all';
        $nShopTypeID = ($this->ci->get('shop_type_id')) ? (int)$this->ci->get('shop_type_id') : NULL;

        switch(1)
        {
            case ($p_nID != NULL):

                // Get shop by id
                $objShop = $this->ci->lib_shops->getShopByID($p_nID)->row();

                // Check empty
                if (empty($objShop))
                    return $this->throws(
                        array(Shops_Constants::SHOP_NOT_AVAIL => sprintf($this->ci->lang->line('shop_not_available'))),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

                // Format
                $arrShops = $this->ci->lib_shops->arrangeFormat(array($objShop));

                // Result
                $arrResult = array(
                    'success' => true,
                    'result' => $arrShops,
                    'totalCount' => 1
                );

                break;

            // Check limit and offset
            default:

                // Get shops for pagination
                $objShops = $this->ci->lib_shops->getShopsForPagination($nLimit, $nOffset, $strSearch, $nStatus, $nShopTypeID)->result();

                // Check empty
                if(empty($objShops))
                    return $this->throws(
                        array(Shops_Constants::SHOP_LIST_NOT_AVAIL => sprintf($this->ci->lang->line('shop_list_not_available'))),
                        Restserver\Libraries\REST_Controller::HTTP_OK);

                // Format
                $arrShops = $this->ci->lib_shops->arrangeFormat($objShops);

                // Result
                $arrResult = array(
                    'success' => true,
                    'result' => $arrShops,
                    'totalCount' => $this->ci->lib_shops->getNoOfShops($strSearch, $nStatus, $nShopTypeID)->count,
                );

                break;
        }

        return array(
            'response' => $arrResult,
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
        );
    }

    /**
     * @param integer $p_nID
     * @return string[]
     */
    public function deleteShop($p_nID)
    {
        // Check shop exist by ID
        if(!$this->ci->lib_shops->checkShopExistByID($p_nID))
            return $this->throws(
                array(Shops_Constants::SHOP_NOT_AVAIL => sprintf($this->ci->lang->line('shop_not_available'))),
                Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Delete shop by id
        $bValue = $this->ci->lib_shops->deleteShop($p_nID);
        if(!$bValue)
            return $this->throws(
                array(Shops_Constants::SHOP_NOT_DELETED => sprintf($this->ci->lang->line('shop_not_deleted'))),
                Restserver\Libraries\REST_Controller::HTTP_OK);

        return array(
            'response' => [
                'success' => true,
                'result'  => array(
                    'id' => $p_nID,
                    'message' => sprintf($this->ci->lang->line('shop_deleted_successfully'), $p_nID)
                )
            ],
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
        );
    }
}

/* End of file lib_shops.php */
/* Location: ./application/libraries/v1/shops/lib_shops.php */