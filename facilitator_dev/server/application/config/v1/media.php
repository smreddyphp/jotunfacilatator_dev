<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    // CI
    $this->ci = &get_instance();

    // Media Path
    $config['media_file_path'] = $this->ci->config->item('media_path');
    $config['media_file_allowed_types'] = '*';

	// Table
    $config['media_table'] = 'media';