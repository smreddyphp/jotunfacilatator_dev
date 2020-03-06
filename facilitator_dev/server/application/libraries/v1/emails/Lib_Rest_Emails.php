<?php defined('BASEPATH') OR exit('No direct script access allowed');

require (APPPATH. '/third_party/mustache/mustache/mustache/src/Mustache/Autoloader.php');

class Lib_Rest_Emails extends Lib_Api
{
    /**
     * __construct method
     */
    function __construct() 
    {
        // CI
        $this->ci = &get_instance();

        // Load Lib_Emails Library
        $this->ci->load->library('v1/emails/Lib_Emails');
    }

    /**
     * @return string[]
     */
    public function postEmail()
    {
        // Input
        $arrEmail = array(
            'template_code' => $this->ci->post('template_code'),
            'gateway_code' => $this->ci->post('gateway_code'),
            'subject_parameters' => $this->ci->post('subject_parameters'),
            'body_parameters' => $this->ci->post('body_parameters'),
            'attachment_url' => $this->ci->post('attachment_url'),
            'to_address' => $this->ci->post('to_address'),
            'from_name' => $this->ci->post('from_name'),
            'from_address' => $this->ci->post('from_address'),
            'reply_address' => $this->ci->post('reply_address'),
            'reply_name' => $this->ci->post('reply_name'),
        );

        // Declare
        $strTemplateCode = !empty($arrEmail['template_code']) ? $arrEmail['template_code'] : '';
        $strGatewayCode = !empty($arrEmail['gateway_code']) ? $arrEmail['gateway_code'] : '';
        $arrSubjectParameters = !empty($arrEmail['subject_parameters']) ? $arrEmail['subject_parameters'] : '';
        $arrBodyParameters = !empty($arrEmail['body_parameters']) ? $arrEmail['body_parameters'] : '';
        $strAttachmentUrl = !empty($arrEmail['attachment_url']) ? $arrEmail['attachment_url'] : '';

        $arrBodyParameters = json_decode($arrBodyParameters, true);
        $arrSubjectParameters = json_decode($arrSubjectParameters, true);

        // Load Lib_Email_Templates Library
        $this->ci->load->library('v1/email_templates/Lib_Email_Templates');

        // Get email template by Code
        $objEmailTemplate = $this->ci->lib_email_templates->getEmailTemplateByCode($strTemplateCode)->row();

        // Check empty
        if(empty($objEmailTemplate))
            return $this->throws(
                array(Email_Templates_Constants::EMAIL_TEMPLATE_NOT_AVAIL => sprintf($this->ci->lang->line('email_template_not_available'))),
                Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Get to address from email
        $arrToAddress = (isset($arrEmail['to_address']) && !empty($arrEmail['to_address'])) ? array($arrEmail['to_address']) : '';

        // Get to address from email template
        if(empty($arrToAddress) && $objEmailTemplate->default_to_email != '')
            $arrToAddress = array_map('trim', explode(',', $objEmailTemplate->default_to_email));

        // Check empty
        if(empty($arrToAddress))
            return $this->throws(
                array(Emails_Constants::EMAIL_TO_ADDRESS_REQUIRED => sprintf($this->ci->lang->line('email_to_address_required'))),
                Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Check attachment allowed
        if($objEmailTemplate->allow_attachments == 0 && $strAttachmentUrl != NULL)
            return $this->throws(
                array(Emails_Constants::EMAIL_ATTACHMENT_NOT_ALLOWED => sprintf($this->ci->lang->line('email_attachment_not_allowed'))),
                Restserver\Libraries\REST_Controller::HTTP_OK);

        // Check valid attachment
        if($strAttachmentUrl != NULL)
        {
            // Get attachment extension
            $strExt = strtoupper(pathinfo($strAttachmentUrl, PATHINFO_EXTENSION));

            // Get allowed file types by email template ID
            $objAllowedExtensions = $this->ci->lib_email_templates->getFileTypesByEmailTemplateID($objEmailTemplate->id)->result();

            $arrFileTypes = array_map(function ($arrFileTypes) {return $arrFileTypes->name;}, $objAllowedExtensions);

            // Check valid
            if(!in_array($strExt, $arrFileTypes))
                return $this->throws(
                    array(Emails_Constants::EMAIL_INVALID_FILE_TYPE => sprintf($this->ci->lang->line('email_invalid_file_type'))),
                    Restserver\Libraries\REST_Controller::HTTP_OK);
        }

        // Load Lib_Email_Gateways Library
        $this->ci->load->library('v1/email_gateways/Lib_Email_Gateways');

        // Get email gateway by email gateway Code
        $objGatewayGateway = $this->ci->lib_email_gateways->getEmailGatewayByCode($strGatewayCode)->row();

        // Check empty
        if(!$objGatewayGateway)
            return $this->throws(
                array(Email_Gateways_Constants::EMAIL_GATEWAY_NOT_AVAIL => sprintf($this->ci->lang->line('email_gateway_not_available'))),
                Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Load Mustache engine
        Mustache_Autoloader::register();

        $objMustache = new Mustache_Engine;

        // Render body template using mustache engine
        $objEmailTemplate->subject = $objMustache->render($objEmailTemplate->subject, $arrSubjectParameters);

        // Render body template using mustache engine
        $objEmailTemplate->body = $objMustache->render($objEmailTemplate->body, $arrBodyParameters);

        // Get email template parameters
        $objEmailTemplateParameters = $this->ci->lib_email_templates->getEmailTemplateParameters()->result();

        // Re render body template with common parameters
        if(!empty($objEmailTemplateParameters))
        {
            $arrEmailTemplateParameters = array();

            foreach($objEmailTemplateParameters as $objEmailTemplateParameter)
                $arrEmailTemplateParameters[$objEmailTemplateParameter->code] = $objEmailTemplateParameter->value;

            $objEmailTemplate->body = $objMustache->render($objEmailTemplate->body, $arrEmailTemplateParameters);
        }

        // Set to_address, from_name, from_address, reply_name and reply_address
        $objEmailTemplate->to_addresses = $arrToAddress; // May contain multiple email address
        $objEmailTemplate->from_name = !empty($arrEmail['from_name']) ? $arrEmail['from_name'] : $objEmailTemplate->default_from_name;
        $objEmailTemplate->from_address = !empty($arrEmail['from_address']) ? $arrEmail['from_address'] : $objEmailTemplate->default_from_email;
        $objEmailTemplate->reply_name = !empty($arrEmail['reply_name']) ? $arrEmail['reply_name'] : $objEmailTemplate->default_reply_name;
        $objEmailTemplate->reply_address = !empty($arrEmail['reply_address']) ? $arrEmail['reply_address'] : $objEmailTemplate->default_reply_email;
        
        $objEmailTemplate->gateway_code = $strGatewayCode;
        $objEmailTemplate->template_code = $strTemplateCode;
        $objEmailTemplate->attachment_url = $strAttachmentUrl;

        // Config
        $objEmailTemplate->config = (array)json_decode($objGatewayGateway->credentials);

        // Gateway code
        switch($strGatewayCode)
        {
            case 'AWS':

                $this->aws($objEmailTemplate);

                break;

            default:

                // SMTP
                if(!$this->SMTP($objEmailTemplate))
                    return $this->throws(
                        array(Emails_Constants::EMAIL_NOT_SENT => sprintf($this->ci->lang->line('email_not_sent'))),
                        Restserver\Libraries\REST_Controller::HTTP_OK);

                return array(
                    'response' => array(
                        'success' => true,
                        'result' => array(
                            'message' => sprintf($this->ci->lang->line('email_sent_successfully'))
                        )
                    ),
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
                );

                break;
        }

        // Add email
        $nEmailID = $this->ci->lib_emails->addEmail($arrEmail);
        if(!$nEmailID)
            return $this->throws(
                array(Emails_Constants::EMAIL_NOT_CREATED => sprintf($this->ci->lang->line('email_not_created'))),
                Restserver\Libraries\REST_Controller::HTTP_CREATED);

        return array(
            'response' => array(
                'success' => true,
                'result' => array(
                    'id' => $nEmailID,
                    'message' => sprintf($this->ci->lang->line('email_sent_successfully'), $nEmailID)
                )
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
        );
    }

    /**
     * @param object $p_objEmail
     * @return boolean
     */
    public function SMTP($p_objEmail)
    {
        // Load email library
        $this->ci->load->library('email');

        foreach($p_objEmail->to_addresses as $strToAddress)
        {
            $p_objEmail->to_address = $strToAddress;
            $this->ci->email->clear();

            $this->ci->email->initialize($p_objEmail->config);
            $this->ci->email->set_newline("\r\n");
            $this->ci->email->from($p_objEmail->from_address, $p_objEmail->from_name);
            $this->ci->email->to($strToAddress);
            $this->ci->email->subject($p_objEmail->subject);
            $this->ci->email->message($p_objEmail->body);
            $this->ci->email->reply_to($p_objEmail->reply_address, $p_objEmail->reply_name);
            $this->ci->email->set_mailtype('html');

            // Attachments
            if(isset($p_objEmail->attachment_url) && $p_objEmail->attachment_url != '')
                $this->ci->email->attach($p_objEmail->attachment_url);

                // Send
                if(!$this->ci->email->send())
                    return false;

                // Add email log
                //$this->addEmailLog($p_objEmail);
        }

        return true;
    }
}

/* End of file lib_emails.php */
/* Location: ./application/libraries/v1/emails/lib_emails.php */