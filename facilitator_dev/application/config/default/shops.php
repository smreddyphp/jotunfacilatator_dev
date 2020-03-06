<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	// CI
    $this->ci = &get_instance();

    // API
    $config['shops_api'] = 'shops/';

    // Images Path
    $config['shops_image_path'] = $this->ci->config->item('media_path');
    $config['shops_image_allowed_types'] = 'gif|jpg|png';
	
	// URIs
    $config['shops_index_uri'] = 'shops';
    $config['shops_add_uri'] = 'shops/add';
    $config['shops_edit_uri'] = 'shops/edit/';
    $config['shops_view_uri'] = 'shops/view/';
    $config['sales_view_uri'] = 'sales/view/';
   
    $config['shops_ajax_get_shops_by_search_uri'] = 'shops/ajax_get_shops_by_search/';

    //Added by Eswar 21-4-2017
    $config['shops_manager_shops_uri'] = 'shops/manager_shops/';
    $config['shops_manager_shops_view'] = 'shops/manager_shops';
    $config['shops_add_shop_uri'] = 'shops/addshop';

    // Views
    $config['shops_index_view'] = 'shops/index';
    $config['shops_table_view'] = 'shops/table';
    $config['shops_add_view'] = 'shops/add';
    $config['shops_edit_view'] = 'shops/edit';
    $config['shops_view_view'] = 'shops/view';
    $config['sales_view_view'] = 'sales/view';
    $config['shops_add_shop_view'] = 'shops/addshop';

    // Titles
    $config['shops_header_title'] = 'Shops';
    $config['shops_index_title'] = 'Shops';
    $config['shops_add_title'] = 'Add Shops';
    $config['shops_edit_title'] = 'Edit Shops';
    $config['shops_view_title'] = 'View Shops';
    
    //  Status
    $config['shops_status'] = array('Inactive', 'Active');