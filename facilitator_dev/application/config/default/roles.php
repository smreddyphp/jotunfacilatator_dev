<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	// CI
    $this->ci = &get_instance();

    // API
    $config['roles_api'] = 'roles/';
	
	// URIs
    $config['roles_index_uri'] = 'roles';
    $config['roles_add_uri'] = 'roles/add';
    $config['roles_edit_uri'] = 'roles/edit/';
    $config['roles_view_uri'] = 'roles/view/';

    $config['roles_ajax_get_roles_by_search_uri'] = 'roles/ajax_get_roles_by_search/';

    // Views
    $config['roles_index_view'] = 'roles/index';
    $config['roles_table_view'] = 'roles/table';
    $config['roles_add_view'] = 'roles/add';
    $config['roles_edit_view'] = 'roles/edit';
    $config['roles_view_view'] = 'roles/view';

    // Titles
    $config['roles_header_title'] = 'Roles';
    $config['roles_index_title'] = 'Roles';
    $config['roles_add_title'] = 'Add Role';
    $config['roles_edit_title'] = 'Edit Role';
    $config['roles_view_title'] = 'View Role';
    
    //  Status
    $config['roles_status'] = array('Inactive', 'Active');