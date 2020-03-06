<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	// CI
    $this->ci = &get_instance();

    // API
    $config['users_api'] = 'users/';
	
	// URIs
    $config['users_index_uri'] = 'users';
    $config['users_add_uri'] = 'users/add';
    $config['users_edit_uri'] = 'users/edit/';
    $config['users_view_uri'] = 'users/view/';

    $config['users_ajax_get_users_by_search_uri'] = 'users/ajax_get_users_by_search/';

	// Added By Eswar 19-4-2017
	$config['users_edit_profile_uri'] = 'users/edit_profile/';

    // Views
    $config['users_index_view'] = 'users/index';
    $config['users_table_view'] = 'users/table';
    $config['users_add_view'] = 'users/add';
    $config['users_edit_view'] = 'users/edit';
    $config['users_view_view'] = 'users/view';
    $config['users_live_track_view'] = 'users/live_track';

	// Added By Eswar 19-4-2017
    $config['users_edit_profile_view'] = 'users/edit_profile';

    // Titles
    $config['users_header_title'] = 'Users';
    $config['users_index_title'] = 'Users';
    $config['users_add_title'] = 'Add User';
    $config['users_edit_title'] = 'Edit User';
    $config['users_view_title'] = 'View User';
    
    //  Status
    $config['users_status'] = array('Inactive', 'Active');