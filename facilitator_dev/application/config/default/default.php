<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	// APIs
	$config['emails_api'] = 'emails';

	// Template
	$config['template_view'] = 'templates/template';

	// Header
	$config['header_view'] = 'templates/header';

	// SideBar
	$config['sidebar_view'] = 'templates/sidebar';

	// Footer
	$config['footer_view'] = 'templates/footer';


	// Assets
	$config['assets_path'] = 'assets/';

        // Media
        $config['media_path'] = 'server/'.$config['assets_path'].'media/';

	// Images
	$config['images_path'] = $config['assets_path'].'img/';

	// Pagination View
	$config['pagination_view'] = 'templates/pagination';

	// URIs
	$config['sales_index_uri'] = 'sales';
	$config['roles_index_uri'] = 'roles';
	$config['designations_index_uri'] = 'designations';
	$config['forms_index_uri'] = 'forms';
	$config['shops_index_uri'] = 'shops';
	$config['users_index_uri'] = 'users';
	$config['shop_types_index_uri'] = 'shop_types';
	$config['forms_download_uri'] = 'sales/download_forms';