<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_Common
{
    public $strFlashMessage;

    /**
     * __construct
     */
    function __construct()
    {
        $this->ci = &get_instance();
    }

    /**
     * sendMail method
     *
     * @param string[] $p_arrDetails
     * @return boolean
     */
    function sendMail($p_arrDetails)
    {
        
        // API
        $strEmailsAPI = $this->ci->config->item('emails_api');

        // Post
        $objResult = $this->ci->rest->post($strEmailsAPI, json_encode($p_arrDetails), 'json');

        // False
        if($objResult->success == false)
        {
            // Flash message
            $this->strFlashMessage = ($objResult->success == true) ? $objResult->result->message : $objResult->errors[0]->message;

            return false;
        }

        return true;
    }
}

/* End of file Lib_Common.php */
/* Location: ./application/libraries/Lib_Common.php */