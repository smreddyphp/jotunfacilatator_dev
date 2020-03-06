<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	// Table
    $config['users_table'] = 'users';

    $config['users_forgot_password_email'] = '';
	$config['users_forgot_password_user_subject'] = 'Password Token';
	$config['users_forgot_password_user_email_view'] =  'v1/users/emails/forgot_password_user';