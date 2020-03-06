<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Emails_Constants extends Form_Validation_Constants
{
    /**
     * Error message codes
     * Sequence: 2-11-001
     * Sequence Description: API(2)-Emails(18)-MessageNumber(001)
     */

    const EMAIL_NOT_CREATED = 18001;
    const EMAIL_TO_ADDRESS_REQUIRED = 18002;
    const EMAIL_NOT_SENT = 18003;

    const EMAIL_ATTACHMENT_NOT_ALLOWED = 18004;
    const EMAIL_INVALID_FILE_TYPE = 18005;
}