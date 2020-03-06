<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	// CI
    $this->ci = &get_instance();

    // API
    $config['designations_api'] = 'designations/';
	
	// URIs
    $config['designations_index_uri'] = 'designations';
    $config['designations_add_uri'] = 'designations/add';
    $config['designations_edit_uri'] = 'designations/edit/';
    $config['designations_view_uri'] = 'designations/view/';
    $config['designations_delete_uri'] = 'designations/delete/';

    $config['designations_ajax_get_designations_by_search_uri'] = 'designations/ajax_get_designations_by_search/';

    // Views
    $config['designations_index_view'] = 'designations/index';
    $config['designations_table_view'] = 'designations/table';
    $config['designations_add_view'] = 'designations/add';
    $config['designations_edit_view'] = 'designations/edit';
    $config['designations_view_view'] = 'designations/view';

    // Titles
    $config['designations_header_title'] = 'Designations';
    $config['designations_index_title'] = 'Designations';
    $config['designations_add_title'] = 'Add Designation';
    $config['designations_edit_title'] = 'Edit Designation';
    $config['designations_view_title'] = 'View Designation';
    
    //  Status
    $config['designations_status'] = array('Inactive', 'Active');