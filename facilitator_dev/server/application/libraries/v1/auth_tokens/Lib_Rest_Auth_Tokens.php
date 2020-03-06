<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_Rest_Auth_Tokens extends Lib_Api
{
    /**
     * __construct method
     */
    function __construct() 
    {
        $this->ci = &get_instance();

        // Load Lib_Auth_Tokens library
        $this->ci->load->library('v1/auth_tokens/Lib_Auth_Tokens');
    }

    /**
     * @return string[]
     */
    public function checkAuthTokenExpired()
    {
        // Token
        $strToken = $this->ci->input->server('HTTP_P_AUTH_TOKEN');

        // Check
        if(!isset($strToken) || empty($strToken))
            return $this->throws(array(
                Auth_Tokens_Constants::AUTH_TOKEN_REQUIRED => $this->ci->lang->line('auth_token_unauthorized_access')),
                Restserver\Libraries\REST_Controller::HTTP_UNAUTHORIZED);

        // Get auth token by Token
        $objAuthToken = $this->ci->lib_auth_tokens->getAuthTokenByToken($strToken)->row();

        // Check empty
        if(empty($objAuthToken))
            return $this->throws(array(
                Auth_Tokens_Constants::AUTH_TOKEN_INVALID => $this->ci->lang->line('auth_token_invalid')),
                Restserver\Libraries\REST_Controller::HTTP_UNAUTHORIZED);

        // Check token expired
        if(($objAuthToken->expiry_time != 0 && $objAuthToken->seconds <= $objAuthToken->expiry_time))
        {
            // Auth token
            $arrAuthToken = array(
                'request_time' => $objAuthToken->seconds
            );

            // Update auth token
            if ($this->ci->lib_auth_tokens->updateAuthToken($arrAuthToken, $objAuthToken->id))
                return true;
        }

        return $this->throws(array(
            Auth_Tokens_Constants::AUTH_TOKEN_EXPIRED => $this->ci->lang->line('auth_token_expired')),
            Restserver\Libraries\REST_Controller::HTTP_UNAUTHORIZED);
    }
}

/* End of file lib_rest_auth_tokens.php */
/* Location: ./application/libraries/v1/auth_tokens/lib_rest_auth_tokens.php */