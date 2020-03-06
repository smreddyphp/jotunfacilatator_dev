<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	$config['admin_email_name'] = 'Support Facilitator';

	// No reply mail id
	$config['noreply_email'] = 'noreply@facilitator.com';

	// Email SMTP Credentials
	$config['email']['useragent'] = 'CodeIgniter';
	$config['email']['mailpath'] = '/usr/bin/sendmail';
	$config['email']['protocol'] = 'smtp';
	$config['email']['smtp_host'] = 'ssl://smtp.gmail.com';
	$config['email']['smtp_port'] = '465';
	$config['email']['smtp_user'] = 'volivehyd@gmail.com';
	$config['email']['smtp_pass'] = 'Mavrin@2007';
	$config['email']['charset'] = 'utf-8';
	$config['email']['mailtype'] = 'html';
	$config['email']['wordwrap'] = TRUE;