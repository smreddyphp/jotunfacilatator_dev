<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    // CI Instance
    $this->ci = &get_instance();

    // URIs
    $config['dashboard_index_uri'] = 'dashboard';


    // Views
    $config['dashboard_index_view'] = 'dashboard/index';
    $config['dashboard_table_view'] = 'dashboard/table';