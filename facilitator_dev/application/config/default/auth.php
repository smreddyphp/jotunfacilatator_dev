<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    // CI
    $this->ci = &get_instance();

    // API
    $config['login_api'] = 'login/';
    $config['logout_api'] = 'logout/';

    $config['me_api'] = 'me/';

    $config['users_api'] = 'users/';

    // JS
    $config['auth_js'] = array(
        $this->ci->config->item('js_validate_min'),
        $this->ci->config->item('js_ajax_call')
    );

	// URIs
    $config['auth_login_uri'] = 'auth/login';
    $config['auth_register_uri'] = 'auth/register';
    $config['auth_logout_uri'] = 'auth/logout';

    // Template
    $config['login_template_view'] = 'login_template';

    // Views
    $config['auth_login_view'] = 'auth/login';
    $config['auth_register_view'] = 'auth/register';

    // Titles
    $config['auth_header_title'] = 'Auth';
    $config['auth_login_title'] = 'Login';
    $config['auth_register_title'] = 'Register';