<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'/libraries/v1/auth_tokens/Auth_Tokens_Constants.php';

class Lib_Auth_Tokens
{
    /**
     * __construct method
     */
    function __construct() 
    {
        $this->ci = &get_instance();

        // Load auth_tokens config
        $this->ci->load->config('v1/auth_tokens');

        // Load lang config
        $this->ci->lang->load('v1/auth_tokens', $this->ci->lib_api->lang);

        // Load auth_token model
        $this->ci->load->model('v1/auth_token');
    }

    /**
     * addAuthToken method
     *
     * @param string[] $p_arrAuthToken
     * @return string[]
     */
    public function addAuthToken($p_arrAuthToken)
    {
        return $this->ci->auth_token->addAuthToken($p_arrAuthToken);
    }

    /**
     * updateAuthToken method
     *
     * @param string[] $p_arrAuthToken
     * @param integer $p_nID
     * @return boolean
     */
    public function updateAuthToken($p_arrAuthToken, $p_nID)
    {
        return $this->ci->auth_token->updateAuthToken($p_arrAuthToken, $p_nID);
    }

    /**
     * updateAuthTokenByToken method
     *
     * @param string[] $p_arrAuthToken
     * @param string $p_strToken
     * @return boolean
     */
    public function updateAuthTokenByToken($p_arrAuthToken, $p_strToken)
    {
        return $this->ci->auth_token->updateAuthTokenByToken($p_arrAuthToken, $p_strToken);
    }

    /**
     * getAuthTokenByToken method
     *
     * @param string $p_strToken
     * @return boolean
     */
    public function getAuthTokenByToken($p_strToken)
    {
        return $this->ci->auth_token->getAuthTokenByToken($p_strToken);
    }

    /**
     * getUserID method
     *
     * @return integer
     */
    public function getUserID()
    {
        return $this->ci->session->userdata('auth-token')['user_id'];
    }
}