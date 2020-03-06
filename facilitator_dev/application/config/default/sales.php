<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    // CI Instance
    $this->ci = &get_instance();

    // API
    $config['sales_api'] = 'sales/';

    // Images Path
    $config['sales_image_path'] = $this->ci->config->item('images_path').'sales/';
    $config['sales_image_allowed_types'] = 'gif|jpg|png';

    // Table
    $config['sales_table'] = 'sales';

    // URIs
    $config['sales_index_uri'] = 'sales';
    $config['sales_view_uri'] = 'sales/view/';
    $config['sales_shops_view_uri'] = 'sales/shops_view/';
    $config['sales_shop_details_view_uri'] = 'sales/shop_details_view/';

    $config['sales_ajax_get_sales_by_search'] = 'sales/ajax_get_sales_by_search';

    $config['sales_ajax_add_task_uri'] = 'sales/ajax_add_task/';
    $config['sales_ajax_edit_task_uri'] = 'sales/ajax_edit_task/';
    
    	// Added by eswar 12-4-2017
	$config['sales_task_uri'] = 'sales/task/';
	$config['sales_shopsviewverifier_uri'] = 'sales/shopview/';
	$config['sales_shopdata_uri'] = 'sales/shopdata/';
	$config['sales_actionlog_uri'] = 'sales/actionlog';



    // Views
    $config['sales_index_view'] = 'sales/index';
    $config['sales_table_view'] = 'sales/table';
    $config['sales_view_view'] = 'sales/view';
    $config['sales_view_date_search_view'] = 'sales/view';
    $config['sales_shops_view_view'] = 'sales/shops/view';
    $config['sales_shop_details_view_view'] = 'sales/shops/details';
    $config['sales_tasks_scripts_view'] = 'sales/tasks/scripts';

    $config['sales_add_task_view'] = 'sales/tasks/add';
    $config['sales_edit_task_view'] = 'sales/tasks/edit';
    $config['sales_view_task_view'] = 'sales/tasks/view';
    $config['sales_tasks_scritps_view'] = 'sales/tasks/scripts';
    $config['sales_actionlog_view'] = 'sales/actionlog';
    
// Added by eswar 12-4-2017
    $config['sales_task_view'] = 'sales/task';
// By Eswar 14-4-2017
    $config['sales_shopsviewverifier_view'] = 'sales/shopview';
    $config['sales_shopdata_view'] = 'sales/shopdata';

    // Titles
    $config['sales_header_title'] = 'Sales';
    $config['sales_index_title'] = 'Sales';
    $config['sales_add_title'] = 'Add Sales';
    $config['sales_edit_title'] = 'Edit Sales';
    $config['sales_view_title'] = 'View Sales';