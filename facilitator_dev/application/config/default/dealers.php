<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	// CI
    $this->ci = &get_instance();

    // API
    $config['dealers_api'] = 'dealers/';
	
	// URIs
    $config['dealers_index_uri'] = 'dealers';
    $config['dealers_add_uri'] = 'dealers/add';
    $config['dealers_edit_uri'] = 'dealers/edit/';
    $config['dealers_view_uri'] = 'dealers/view/';

    $config['dealers_ajax_get_dealers_by_search_uri'] = 'dealers/ajax_get_dealers_by_search/';

	// Added By Eswar 19-4-2017
	$config['dealers_edit_profile_uri'] = 'dealers/edit_profile/';

    // Views
    $config['dealers_index_view'] = 'dealers/index';
    $config['dealers_table_view'] = 'dealers/table';
    $config['dealers_add_view'] = 'dealers/add';
    $config['dealers_edit_view'] = 'dealers/edit';
    $config['dealers_view_view'] = 'dealers/view';
    $config['dealers_live_track_view'] = 'dealers/live_track';

	// Added By Eswar 19-4-2017
    $config['dealers_edit_profile_view'] = 'dealers/edit_profile';

    // Titles
    $config['dealers_header_title'] = 'dealers';
    $config['dealers_index_title'] = 'dealers';
    $config['dealers_add_title'] = 'Add Dealer';
    $config['dealers_edit_title'] = 'Edit Dealer';
    $config['dealers_view_title'] = 'View Dealer';
    
    //  Status
    $config['dealers_status'] = array('Inactive', 'Active');