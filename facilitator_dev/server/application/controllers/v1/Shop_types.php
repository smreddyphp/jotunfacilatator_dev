<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Shop_types extends REST_Controller 
{
    // Allowed methods and rights
    public $arrAllowedMethods = array(
        'index_get' => array('Shop-Type-View', 'Shop-Type-List'),
        'index_post' => 'Shop-Type-Add',
        'index_put' => 'Shop-Type-Edit',
        'index_delete' => 'Shop-Type-Delete'
    );

	/**
     * __construct method
     */
    function __construct()
    {
        parent::__construct();

        // Load Lib_Rest_Shop_Types library
        $this->load->library('v1/shop_types/Lib_Rest_Shop_Types');
    }

    /**
     * Get shop types
     *
     * Get list shop types with pagination or get details of a specific shop type by using shop type id
     *
     * @uri v1/shop_types[:id]?limit=:num&offset=:num
     * @httpmethod GET
     * @return object
     */
    public function index_get($nID = NULL)
    {
        // Get shop types
        return $this->lib_rest_shop_types->getShopTypes($nID);
    }

    /**
     * Create a shop type
     *
     * Create a shop type for a given data
     *
     * @uri v1/shop_types
     * @httpmethod POST
     * @return object
     */
    public function index_post()
    {
        // Post shop type
        return $this->lib_rest_shop_types->postShopType();
    }

    /**
     * Edit or Update a shop type
     *
     * Edit or Update a shop type for a given data by using shop type id
     *
     * @uri v1/shop_types[:id]
     * @httpmethod PUT
     * @param integer $nID
     * @return object
     */
    public function index_put($nID = NULL)
    {
        // Update shop type
        return $this->lib_rest_shop_types->putShopType($nID);
    }

    /**
     * Delete a shop type
     *
     * Delete a specific shop type by using shop type id
     *
     * @uri v1/shop_types/[:shop_type_id]
     * @httpmethod DELETE
     * @param integer $nID
     * @return object
     */
    public function index_delete($nID = NULL)
    {
        // Delete shop type
        return $this->lib_rest_shop_types->deleteShopType($nID);
    }
}

/* End of file shop_types.php */
/* Location: ./application/controllers/v1/shp_types.php */