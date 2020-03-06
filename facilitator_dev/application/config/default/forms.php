<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	// CI
    $this->ci = &get_instance();

    // API
    $config['forms_api'] = 'forms/';
	
	// URIs
    $config['forms_index_uri'] = 'forms';
    $config['forms_add_uri'] = 'forms/add';
    $config['forms_edit_uri'] = 'forms/edit/';
    $config['forms_view_uri'] = 'forms/view/';

    $config['forms_ajax_get_forms_by_search_uri'] = 'forms/ajax_get_forms_by_search/';

    // Views
    $config['forms_index_view'] = 'forms/index';
    $config['forms_table_view'] = 'forms/table';
    $config['forms_add_view'] = 'forms/add';
    $config['forms_edit_view'] = 'forms/edit';
    $config['forms_view_view'] = 'forms/view';

    // Titles
    $config['forms_header_title'] = 'Forms';
    $config['forms_index_title'] = 'Forms';
    $config['forms_add_title'] = 'Add Form';
    $config['forms_edit_title'] = 'Edit Form';
    $config['forms_view_title'] = 'View Form';
    
    //  Status
    $config['forms_status'] = array('Inactive', 'Active');