<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_Rest_Email_Templates extends Lib_Api
{
    /**
     * __construct method
     */
    function __construct() 
    {
        // CI
        $this->ci = &get_instance();

        // Load Lib_Email_Templates Library
        $this->ci->load->library('v1/email_templates/Lib_Email_Templates');
    }
}

/* End of file lib_rest_email_templates.php */
/* Location: ./application/libraries/v1/email_templates/lib_rest_email_templates.php */