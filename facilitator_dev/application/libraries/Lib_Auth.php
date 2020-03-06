<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_Auth
{
    /**
     * __construct
     */
    function __construct()
    {
        $this->ci = &get_instance();

        // Load auth config
        $this->ci->load->config('default/auth');

        // API
        $this->strAPI = $this->ci->config->item('users_api');
    }

    /**
     * checkUriPermissions method
     *
     * @return boolean
     */
    function checkUriPermissions()
    {
        // First check if user already logged in or not
        if (!$this->ci->session->userdata('auth_token'))
            redirect($this->ci->config->item('auth_login_uri'), 'location');
    }

    /**
     * isLoggedIn method
     *
     * @return boolean
     */
    function isLoggedIn()
    {
        // Check token in session
        if($this->ci->session->userdata('auth_token'))
            return true;

        return false;
    }

    /**
     * getLoginData method
     *
     * @return object
     */
    function getLoginData()
    {
        return $this->ci->session->userdata('auth_me');
    }

    /**
     * getUserID method
     *
     * @return integer
     */
    function getUserID()
    {
        return $this->getLoginData()->id;
    }

    /**
     * getName method
     *
     * @return integer
     */
    function getName()
    {
        return $this->getLoginData()->name;
    }

    /**
     * getRoleID method
     *
     * @return integer
     */
    function getRoleID()
    {
        return $this->getLoginData()->role->id;
    }

    /**
     * checkRole method
     *
     * @return boolean
     */
    function checkRole()
    {
        if(!($this->getRoleID() == 1 || $this->getRoleID() == 2))
            return false;
    }

    /**
     * getRoleName method
     *
     * @return string
     */
    function getRoleName()
    {
        return $this->getLoginData()->role->name;
    }

    /**
     * login method
     *
     * @param string[] $p_arrDetails
     * @return void
     */
    function login($p_arrDetails)
    {
        
        // API
        $strLoginAPI = $this->ci->config->item('login_api');

        // Check origin
        if(isset($_SERVER['HTTP_ORIGIN']))
            $this->ci->rest->http_header('ORIGIN', $_SERVER['HTTP_ORIGIN']);    

        // Post
        $objResult = $this->ci->rest->post($strLoginAPI, json_encode($p_arrDetails), 'json');

        // Check success
        if($objResult->success == false)
            return $objResult;

        // Get me
        $objMe = $this->getMe($objResult->result->token);

        // Check success
        if($objMe->success == false)
            return $objMe;

        // Check role
        $objMe = $objMe->result[0];
        if(!($objMe->role->id == 1 || $objMe->role->id == 2))
            return array(
                'success' => false,
                'result' => array(
                    'errors' => array(
                        array(
                            'message' => 'Access is not available'
                        )
                    )
                )
            );

        // Set token in session
        $this->ci->session->set_userdata('auth_token', $objResult->result->token);

        // Save in session
        $this->ci->session->set_userdata('auth_me', $objMe);

        return $objResult;
    }

    /**
     * logout method
     *
     * @param integer $p_bForce
     * @return void
     */
    function logout($p_bForce = 1)
    {
        switch($p_bForce)
        {
            case 0:

                // API
                $strLogoutAPI = $this->ci->config->item('logout_api');

                // Get
                $objResult = $this->ci->rest->get($strLogoutAPI);

                break;
        }

        // Unset
        $this->ci->session->unset_userdata('auth_token');
        $this->ci->session->unset_userdata('auth_me');

        return true;
    }

    /**
     * getMe method
     *
     * @param string $p_strToken
     * @return void
     */
    function getMe($p_strToken)
    {
        // API
        $strMeAPI = $this->ci->config->item('me_api');

        // Set header
        $this->ci->rest->http_header('P-Auth-Token', $p_strToken);

        // Get me
        return $this->ci->rest->get($strMeAPI);
    }
}

/* End of file Lib_Auth.php */
/* Location: ./application/libraries/Lib_Auth.php */