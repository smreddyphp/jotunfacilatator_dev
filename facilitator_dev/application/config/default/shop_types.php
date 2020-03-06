<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	// CI
    $this->ci = &get_instance();

    // API
    $config['shop_types_api'] = 'shop_types/';
	
	// URIs
    $config['shop_types_index_uri'] = 'shop_types';
    $config['shop_types_add_uri'] = 'shop_types/add';
    $config['shop_types_edit_uri'] = 'shop_types/edit/';
    $config['shop_types_view_uri'] = 'shop_types/view/';

    $config['shop_types_ajax_get_shop_types_by_search_uri'] = 'shop_types/ajax_get_shop_types_by_search/';

    // Views
    $config['shop_types_index_view'] = 'shop_types/index';
    $config['shop_types_table_view'] = 'shop_types/table';
    $config['shop_types_add_view'] = 'shop_types/add';
    $config['shop_types_edit_view'] = 'shop_types/edit';
    $config['shop_types_view_view'] = 'shop_types/view';

    // Titles
    $config['shop_types_header_title'] = 'Shop Types';
    $config['shop_types_index_title'] = 'Shop Types';
    $config['shop_types_add_title'] = 'Add Role';
    $config['shop_types_edit_title'] = 'Edit Role';
    $config['shop_types_view_title'] = 'View Role';

    // Images
     $config['shop_types_images_path'] = 'assets/img/shop_types/';
    
    //  Status
    $config['shop_types_status'] = array('Inactive', 'Active');