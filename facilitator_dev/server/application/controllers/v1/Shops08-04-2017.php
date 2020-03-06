<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Shops extends REST_Controller 
{
    // Allowed methods and rights
    public $arrAllowedMethods = array(
        'index_get' => array('Shop-View', 'Shop-List'),
        'index_post' => 'Shop-Add',
        'index_put' => 'Shop-Edit',
        'index_delete' => 'Shop-Delete'
    );

	/**
     * __construct method
     */
    function __construct()
    {
        parent::__construct();

        // Load Lib_Rest_Shops library
        $this->load->library('v1/shops/Lib_Rest_Shops');
    }

    /**
     * Get shops
     *
     * Get list shops with pagination or get details of a specific shop by using shop id
     *
     * @uri v1/shops[:id]?limit=:num&offset=:num
     * @httpmethod GET
     * @return object
     */
    public function index_get($nID = NULL)
    {
        // Get shops
        return $this->lib_rest_shops->getShops($nID);
    }

    /**
     * Create a shop
     *
     * Create a shop for a given data
     *
     * @uri v1/shop_types
     * @httpmethod POST
     * @return object
     */
    public function index_post()
    {
        // Post shop
        return $this->lib_rest_shops->postShop();
    }

    /**
     * Edit or Update a shop
     *
     * Edit or Update a shop for a given data by using shop id
     *
     * @uri v1/shops[:id]
     * @httpmethod PUT
     * @param integer $nID
     * @return object
     */
    public function index_put($nID = NULL)
    {
        // Update shop
        return $this->lib_rest_shops->putShop($nID);
    }

    /**
     * Delete a shop
     *
     * Delete a specific shop by using shop id
     *
     * @uri v1/shops/[:shop_id]
     * @httpmethod DELETE
     * @param integer $nID
     * @return object
     */
    public function index_delete($nID = NULL)
    {
        // Delete shop
        return $this->lib_rest_shops->deleteShop($nID);
    }
}

/* End of file shops.php */
/* Location: ./application/controllers/v1/shops.php */