<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'/libraries/v1/emails/Emails_Constants.php';

class Lib_Emails
{
    /**
     * __construct method
     */
    function __construct() 
    {
        // CI
        $this->ci = &get_instance();

        // Load emails config
        $this->ci->load->config('v1/emails');

        // Load lang config
        $this->ci->lang->load('v1/emails', $this->ci->lib_api->lang);

        // Load emailm model
        $this->ci->load->model('v1/emailm');
    }

    /**
     * addEmail method
     *
     * @param string[] $p_arrEmail
     * @return integer
     */
    public function addEmail($p_arrEmail)
    {
        return $this->ci->email->addEmail($p_arrEmail);
    }
}

/* End of file lib_email.php */
/* Location: ./application/libraries/v1/emails/lib_email.php */
