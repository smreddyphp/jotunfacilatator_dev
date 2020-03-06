<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users_Constants extends Form_Validation_Constants
{
    /**
     * Error message codes
     * Sequence: 2-11-001
     * Sequence Description: API(2)-Users(24)-MessageNumber(001)
     */
    const PASSWORD_MIS_MATCH = 24001;
    const PASSWORD_ALREADY_USED = 24002;
    const EMAIL_NOT_AVAIL = 24003;
    const MAIL_SENDING_ERROR = 24004;
    const USER_NOT_AVAIL = 24005;
    const USER_LIST_NOT_AVAIL = 24006;
    const USER_NOT_CREATED = 24007;
    const USER_NOT_UPDATED = 24008;
    const USER_NOT_DELETED = 24009;
}