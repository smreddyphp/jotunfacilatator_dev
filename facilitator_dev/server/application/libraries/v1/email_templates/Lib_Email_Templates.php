<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'/libraries/v1/email_templates/Email_Templates_Constants.php';

class Lib_Email_Templates
{
    /**
     * __construct method
     */
    function __construct() 
    {
        // CI
        $this->ci = &get_instance();

        // Load EmailTemplates config
        $this->ci->load->config('v1/email_templates');

        // Load lang config
        $this->ci->lang->load('v1/email_templates', $this->ci->lib_api->lang);

        // Load email_template model
        $this->ci->load->model('v1/email_template');
    }

    /**
     * addEmailTemplate method
     *
     * @param string[] $p_arrEmailTemplate
     * @return integer
     */
    public function addEmailTemplate($p_arrEmailTemplate)
    {
        return $this->ci->email_template->addEmailTemplate($p_arrEmailTemplate);
    }

    /**
     * updateEmailTemplate method
     *
     * @param string[] $p_arrEmailTemplate
     * @param integer $p_nID
     * @return boolean
     */
    public function updateEmailTemplate($p_arrEmailTemplate, $p_nID)
    {
        return $this->ci->email_template->updateEmailTemplate($p_arrEmailTemplate, $p_nID);
    }

    /**
     * checkEmailTemplateExistByID method
     *
     * @param integer $p_nID
     * @return boolean
     */
    public function checkEmailTemplateExistByID($p_nID)
    {
        return $this->ci->email_template->checkEmailTemplateExistByID($p_nID);
    }

    /**
     * getEmailTemplateByID method
     *
     * @param integer $p_nID
     * @return object
     */
    public function getEmailTemplateByID($p_nID)
    {
        return $this->ci->email_template->getEmailTemplateByID($p_nID);
    }

    /**
     * getEmailTemplateByCode method
     *
     * @param string $p_strCode
     * @return object
     */
    public function getEmailTemplateByCode($p_strCode)
    {
        return $this->ci->email_template->getEmailTemplateByCode($p_strCode);
    }

    /**
     * getEmailTemplatesForPagination method
     *
     * @param integer $p_nLimit
     * @param integer $p_nOffset
     * @param string $p_strSearch
     * @param integer $p_nStatus
     * @return object
     */
    public function getEmailTemplatesForPagination($p_nLimit = NULL, $p_nOffset = NULL, $p_strSearch = NULL, $p_nStatus = NULL)
    {
        return $this->ci->email_template->getEmailTemplatesForPagination($p_nLimit, $p_nOffset, $p_strSearch, $p_nStatus);
    }

    /**
     * getNoOfEmailTemplates method
     *
     * @param integer $p_strSearch
     * @param integer $p_nStatus
     * @return integer
     */
    public function getNoOfEmailTemplates($p_strSearch = NULL, $p_nStatus = NULL)
    {
        return $this->ci->email_template->getNoOfEmailTemplates($p_strSearch, $p_nStatus);
    }

    /**
     * deleteEmailTemplate method
     *
     * @param integer $p_nID
     * @return boolean
     */
    public function deleteEmailTemplate($p_nID)
    {
        return $this->ci->email_template->deleteEmailTemplate($p_nID);
    }

    /**
     * getFileTypesByEmailTemplateID method
     *
     * @param integer $p_nID
     * @return object
     */
    public function getFileTypesByEmailTemplateID($p_nID)
    {
        return $this->ci->email_template->getFileTypesByEmailTemplateID($p_nID);
    }

    /**
     * getEmailTemplateParameters method
     *
     * @return object
     */
    public function getEmailTemplateParameters()
    {
        return $this->ci->email_template->getEmailTemplateParameters();
    }
}

/* End of file lib_email_templates.php */
/* Location: ./application/libraries/v1/email_templates/lib_email_templates.php */
