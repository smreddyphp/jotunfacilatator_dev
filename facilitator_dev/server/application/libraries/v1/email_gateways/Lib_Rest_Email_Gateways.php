<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_Rest_Email_Gateways extends Lib_Api
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
            'to_address' => $this->ci->post('to_address')
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
            return array(
                'response' => array(
                    'success' => false,
                    'errors' => array(
                        array(
                            'code' => Email_Templates_Constants::EMAIL_TEMPLATE_NOT_AVAIL,
                            'message' => sprintf($this->ci->lang->line('email_template_not_available'))
                        )
                    )
                )
            );

        // Get to address from email
        $arrToAddress = (isset($arrEmail['to_address']) && !empty($arrEmail['to_address'])) ? array($arrEmail['to_address']) : '';

        // Get to address from email template
        if(empty($arrToAddress) && $objEmailTemplate->default_to_email != '')
            $arrToAddress = array_map('trim', explode(',', $objEmailTemplate->default_to_email));

        // Check empty
        if(empty($arrToAddress))
            return array(
                'response' => array(
                    'success' => false,
                    'errors' => array(
                        array(
                            'code' => Emails_Constants::EMAIL_TO_ADDRESS_REQUIRED,
                            'message' => sprintf($this->ci->lang->line('email_to_address_required'))
                        )
                    )
                )
            );

        // Check attachment allowed
        if($objEmailTemplate->allow_attachments == 0 && $strAttachmentUrl != NULL)
            return array(
                'response' => array(
                    'success' => false,
                    'errors' => array(
                        array(
                            'code' => Emails_Constants::ATTACHMENT_NOT_ALLOWED,
                            'message' => sprintf($this->ci->lang->line('email_attachment_not_allowed'))
                        )
                    )
                )
            );

        // Check valid attachment
        if($strAttachmentUrl != NULL)
        {
            // Get attachment extension
            $strExt = strtoupper(pathinfo($strAttachmentUrl, PATHINFO_EXTENSION));

            // Get allowed attachment file types
            $objAllowedExtensions = $this->ci->send_email->getAllowedAttachmentTypes($objEmailTemplate->id)->result();

            $arrFileTypes = array_map(function ($arrFileTypes) {return $arrFileTypes->name;}, $objAllowedExtensions);

            // Check valid
            if(!in_array($strExt, $arrFileTypes))
                return array(
                    'response' => array(
                        'success' => false,
                        'errors' => array(
                            array(
                                'code' => Emails_Constants::EMAIL_INVALID_ATTACHMENT,
                                'message' => sprintf($this->ci->lang->line('email_invalid_attachment'))
                            )
                        )
                    )
                );
        }

        // Get email credentials by Gateway Code
        $objGatewayCredentials = $this->ci->send_email->getEmailCredentials($strGatewayCode)->credentials;

        // Check empty
        if(!$objGatewayCredentials)
            return array(
                'response' => array(
                    'success' => false,
                    'errors' => array(
                        array(
                            'code' => Emails_Constants::EMAIL_CREDENTIALS_NOT_AVAILABLE,
                            'message' => sprintf($this->ci->lang->line('email_credentials_not_available'))
                        )
                    )
                )
            );

        // Load Mustache engine
        Mustache_Autoloader::register();

        $objMustache = new Mustache_Engine;

        // Render body template using mustache engine
        $objEmailTemplate->subject = $objMustache->render($objEmailTemplate->subject, $arrSubjectParameters);

        // Render body template using mustache engine
        $objEmailTemplate->body = $objMustache->render($objEmailTemplate->body, $arrBodyParameters);

        $objCommonTemplateParameters = $this->ci->send_email->getCommonTemplateParameters()->result();

        // Re render body template with common parameters
        if(!empty($objCommonTemplateParameters))
        {
            $arrCommonTemplateParameters = array();

            foreach($objCommonTemplateParameters as $objCommonTemplateParameter)
            {
                $arrCommonTemplateParameters[$objCommonTemplateParameter->code] = $objCommonTemplateParameter->value;
            }

            $objEmailTemplate->body = $objMustache->render($objEmailTemplate->body, $arrCommonTemplateParameters);
        }

        // Set to_address, from_name, from_address, reply_name and reply_address
        $objEmailTemplate->to_addresses = $arrToAddress; // May contain multiple email address
        $objEmailTemplate->from_name = (isset($p_objEmailData->from_name)) ? $p_objEmailData->from_name : $objEmailTemplate->default_from_name;
        $objEmailTemplate->from_address = (isset($p_objEmailData->from_address)) ? $p_objEmailData->from_address : $objEmailTemplate->default_from_email;
        $objEmailTemplate->reply_name = (isset($p_objEmailData->reply_name)) ? $p_objEmailData->reply_name : $objEmailTemplate->default_reply_name;
        $objEmailTemplate->reply_address = (isset($p_objEmailData->reply_address)) ? $p_objEmailData->reply_address : $objEmailTemplate->default_reply_email;
        $objEmailTemplate->gateway_code = $strGatewayCode;
        $objEmailTemplate->template_code = $strTemplateCode;
        $objEmailTemplate->attachment_url = $strAttachmentUrl;

        // Config
        $objEmailTemplate->config = (array)json_decode($objGatewayCredentials);

        // Gateway code
        switch($strGatewayCode)
        {
            case 'AWS':

                $this->aws($objEmailTemplate);
                break;

            default:
                // Gmail
                if(!$this->gmail($objEmailTemplate))
                    return array(
                        'response' => [
                            'success' => false,
                            'errors' => array(array(
                                'code' => Send_Email_Constants::EMAIL_NOT_SENT,
                                'message' => sprintf($this->ci->lang->line('email_failure_message'))
                            ))
                        ]
                    );

                // Success return
                return array(
                    'response' => [
                        'success' => true,
                        'result' => array(
                            'message' => sprintf($this->ci->lang->line('email_success_message'))
                        )
                    ],
                    'HTTPCode' => Common_Constants::HTTP_OK
                );

                break;
        }

        // Add email
        $nEmailID = $this->ci->lib_emails->addEmail($arrEmail);

        if($nEmailID)
            return array(
                'response' => array(
                    'result' => array(
                        'id' => $nEmailID,
                        'message' => sprintf($this->ci->lang->line('email_created_successfully'), $nEmailID)
                    ),
                    'success' => true,
                ),
                'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
            );

        return array(
            'response' => array(
                'result' => array(
                    'errors' => array(
                        array(
                            'code' => Emails_Constants::EMAIL_NOT_CREATED,
                            'message' => $this->ci->lang->line('email_not_created')
                        )
                    )
                ),
                'success' => false
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
        );
    }
}

/* End of file lib_emails.php */
/* Location: ./application/libraries/v1/emails/lib_emails.php */