<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| HTTP protocol
|--------------------------------------------------------------------------
|
| Set to force the use of HTTPS for REST API calls
|
*/
switch(ENVIRONMENT)
{
    case 'development':

        $config['rest_server_url'] = 'http://localhost/facilitator_dev/server/v1/';
        $config['rest_media_url'] = $config['rest_server_url'].'media/';

        break;

    case 'testing':
    case 'production':

        $config['rest_server_url'] = 'http://jotunksa.com/facilitator_dev/server/v1/';
        $config['rest_media_url'] = $config['rest_server_url'].'media/';

        break;
}