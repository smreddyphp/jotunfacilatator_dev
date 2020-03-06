<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    // CI Instance
    $this->ci = &get_instance();

    // API
    $config['sales_management_api'] = 'sales_management/';

    // Images Path
    $config['sales_management_image_path'] = $this->ci->config->item('images_path').'sales_management/';
    $config['sales_management_image_allowed_types'] = 'gif|jpg|png';

    // Table
    $config['sales_management_table'] = 'sales_management';

    // URIs
    $config['sales_management_index_uri'] = 'sales_management';
    $config['sales_management_add_uri'] = 'sales_management/add';
    $config['sales_management_view_uri'] = 'sales_management/view/';
    $config['sales_management_edit_uri'] = 'sales_management/edit/';
    $config['sales_management_copy_uri'] = 'sales_management/copy/';

    $config['sales_management_ajax_get_sales_management_by_search_uri'] = 'sales_management/ajax_get_sales_management_by_search';


    // Views
    $config['sales_management_index_view'] = 'sales_management/index';
    $config['sales_management_add_view'] = 'sales_management/add';
    $config['sales_management_view_view'] = 'sales_management/view';
    $config['sales_management_edit_view'] = 'sales_management/edit';
    $config['sales_management_copy_view'] = 'sales_management/copy';
    $config['sales_management_table_view'] = 'sales_management/table';

    //  Status
    $config['sales_management_status'] = array('Close', 'Open');