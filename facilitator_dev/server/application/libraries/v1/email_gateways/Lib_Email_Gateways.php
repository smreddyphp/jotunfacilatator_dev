<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'/libraries/v1/email_gateways/Email_Gateways_Constants.php';

class Lib_Email_Gateways
{
    /**
     * __construct method
     */
    function __construct() 
    {
        // CI
        $this->ci = &get_instance();

        // Load email_gateways config
        $this->ci->load->config('v1/email_gateways');

        // Load lang config
        $this->ci->lang->load('v1/email_gateways', $this->ci->lib_api->lang);

        // Load email_gateway model
        $this->ci->load->model('v1/email_gateway');
    }

    /**
     * addEmailGateway method
     *
     * @param string[] $p_arrEmailGateway
     * @return integer
     */
    public function addEmailGateway($p_arrEmailGateway)
    {
        return $this->ci->email_gateway->addEmailGateway($p_arrEmailGateway);
    }

    /**
     * updateEmailGateway method
     *
     * @param string[] $p_arrEmailGateway
     * @param integer $p_nID
     * @return boolean
     */
    public function updateEmailGateway($p_arrEmailGateway, $p_nID)
    {
        return $this->ci->email_gateway->updateEmailGateway($p_arrEmailGateway, $p_nID);
    }

    /**
     * checkEmailGatewayExistByID method
     *
     * @param integer $p_nID
     * @return boolean
     */
    public function checkEmailGatewayExistByID($p_nID)
    {
        return $this->ci->email_gateway->checkEmailGatewayExistByID($p_nID);
    }

    /**
     * getEmailGatewayByID method
     *
     * @param integer $p_nID
     * @return object
     */
    public function getEmailGatewayByID($p_nID)
    {
        return $this->ci->email_gateway->getEmailGatewayByID($p_nID);
    }

    /**
     * getEmailGatewayByCode method
     *
     * @param string $p_strCode
     * @return object
     */
    public function getEmailGatewayByCode($p_strCode)
    {
        return $this->ci->email_gateway->getEmailGatewayByCode($p_strCode);
    }

    /**
     * getEmailGatewaysForPagination method
     *
     * @param integer $p_nLimit
     * @param integer $p_nOffset
     * @param integer $p_strSearch
     * @param integer $p_nStatus
     * @return object
     */
    public function getEmailGatewaysForPagination($p_nLimit = NULL, $p_nOffset = NULL, $p_strSearch = NULL, $p_nStatus = NULL)
    {
        return $this->ci->email_gateway->getEmailGatewaysForPagination($p_nLimit, $p_nOffset, $p_strSearch, $p_nStatus);
    }

    /**
     * getNoOfEmailGateways method
     *
     * @param integer $p_strSearch
     * @param integer $p_nStatus
     * @return integer
     */
    public function getNoOfEmailGateways($p_strSearch = NULL, $p_nStatus = NULL)
    {
        return $this->ci->email_gateway->getNoOfEmailGateways($p_strSearch, $p_nStatus);
    }

    /**
     * deleteEmailGateway method
     *
     * @param integer $p_nID
     * @return boolean
     */
    public function deleteEmailGateway($p_nID)
    {
        return $this->ci->email_gateway->deleteEmailGateway($p_nID);
    }
}

/* End of file lib_email_gateways.php */
/* Location: ./application/libraries/v1/email_gateways/lib_email_gateways.php */
