<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_Rest_Shop_Types extends Lib_Api
{
    /**
     * __construct method
     */
    function __construct() 
    {
        // CI
        $this->ci = &get_instance();

        // Load Lib_Shop_Types Library
        $this->ci->load->library('v1/shop_types/Lib_Shop_Types');
    }

    /**
     * @return string[]
     */
    public function postShopType()
    {
        // Input
        $arrShopType = array(
            'name' => $this->ci->post('name'),
            'status' => $this->ci->post('status')
        );

        // Set rules
        $this->ci->form_validation->set_rules('name', 'name', 'required|is_unique[shop_types.name, 0');
        $this->ci->form_validation->set_rules('status', 'status', 'required|numeric'); // Set data
        $this->ci->form_validation->set_data($arrShop);

         // Set data
        $this->ci->form_validation->set_data($arrShopType);

        // Run
        if($this->ci->form_validation->run() == false)
            return $this->throws($this->ci->form_validation->get_errors('Shop_Types_Constants'), Restserver\Libraries\REST_Controller::HTTP_OK);

        // Add shop type
        $nShopTypeID = $this->ci->lib_shop_types->addShopType($arrShopType);
        if(!$nShopTypeID)
            return $this->throws(
                array(Shop_Types_Constants::SHOP_TYPE_NOT_CREATED => sprintf($this->ci->lang->line('shop_type_not_created'))),
                Restserver\Libraries\REST_Controller::HTTP_OK);

        return array(
            'response' => array(
                'success' => true,
                'result' => array(
                    'id' => $nShopTypeID,
                    'message' => sprintf($this->ci->lang->line('shop_type_created_successfully'), $nShopTypeID)
                )
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
        );
    }

    /**
     * @return string[]
     */
    public function putShopType($nID)
    {
        // Input
        $arrShopType = array(
            'name' => $this->ci->put('name'),
            'status' => $this->ci->put('status')
        );

        // Set rules
        $this->ci->form_validation->set_rules('name', 'name', 'required|is_unique[shop_types.name, '.$nID.']');
        $this->ci->form_validation->set_rules('status', 'status', 'required|numeric');

        // Check shop type exist by ID
        if(!$this->ci->lib_shop_types->checkShopTypeExistByID($nID))
            return $this->throws(
                array(Shop_Types_Constants::SHOP_TYPE_NOT_AVAIL => sprintf($this->ci->lang->line('shop_type_not_available'))),
                Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Update shop type by ID
        $bValue = $this->ci->lib_shop_types->updateShopType($arrShopType, $nID);
        if(!$bValue)
            return $this->throws(
                array(Shop_Types_Constants::SHOP_TYPE_NOT_UPDATED => sprintf($this->ci->lang->line('shop_type_not_updated'))),
                Restserver\Libraries\REST_Controller::HTTP_OK);

        return array(
            'response' => array(
                'success' => true,
                'result'  => array(
                    'id' => $nID,
                    'message' => sprintf($this->ci->lang->line('shop_type_updated_successfully'), $nID)
                )
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
        );
    }

    /**
     * @return string[]
     */
    public function getShopTypes($nID = NULL)
    {
        // Set
        $nLimit = ($this->ci->get('limit')) ? (int)$this->ci->get('limit') : NULL;
        $nOffset = ($this->ci->get('offset')) ? (int)$this->ci->get('offset') : NULL;
        $strSearch = ($this->ci->get('search')) ? (int)$this->ci->get('search') : NULL;
        $nStatus = ($this->ci->get('status')) ? (int)$this->ci->get('status') : 'all';

        switch(1)
        {
            case ($nID != NULL):

                // Get shop type by id
                $objShopType = $this->ci->lib_shop_types->getShopTypeByID($nID)->row();

                // Check empty
                if (empty($objShopType))
                    return $this->throws(
                        array(Shop_Types_Constants::SHOP_TYPE_NOT_AVAIL => sprintf($this->ci->lang->line('shop_type_not_available'))),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

                // Result
                $arrResult = array(
                    'success' => true,
                    'result' => array($objShopType),
                    'totalCount' => 1
                );

                break;

            // Check limit and offset
            default:

                // Get shop types for pagination
                $objShopTypes = $this->ci->lib_shop_types->getShopTypesForPagination($nLimit, $nOffset, $strSearch, $nStatus)->result();

                // Check empty
                if(empty($objShopTypes))
                    return $this->throws(
                        array(Shop_Types_Constants::SHOP_TYPE_LIST_NOT_AVAIL => sprintf($this->ci->lang->line('shop_type_list_not_available'))),
                        Restserver\Libraries\REST_Controller::HTTP_OK);

                // Result
                $arrResult = array(
                    'success' => true,
                    'result' => $objShopTypes,
                    'totalCount' => $this->ci->lib_shop_types->getNoOfShopTypes($strSearch, $nStatus)->count,
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
    public function deleteShopType($p_nID)
    {
        // Check shop type exist by ID
        if(!$this->ci->lib_shop_types->checkShopTypeExistByID($p_nID))
            return $this->throws(
                array(Shop_Types_Constants::SHOP_TYPE_NOT_AVAIL => sprintf($this->ci->lang->line('shop_type_not_available'))),
                Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Delete shop type by id
        $bValue = $this->ci->lib_shop_types->deleteShopType($p_nID);
        if(!$bValue)
            return $this->throws(
                array(Shop_Types_Constants::SHOP_TYPE_NOT_DELETED => sprintf($this->ci->lang->line('shop_type_not_deleted'))),
                Restserver\Libraries\REST_Controller::HTTP_OK);

        return array(
            'response' => [
                'success' => true,
                'result'  => array(
                    'id' => $p_nID,
                    'message' => sprintf($this->ci->lang->line('shop_type_deleted_successfully'), $p_nID)
                )
            ],
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
        );
    }
}

/* End of file lib_shop_types.php */
/* Location: ./application/libraries/v1/shop_types/lib_shop_types.php */