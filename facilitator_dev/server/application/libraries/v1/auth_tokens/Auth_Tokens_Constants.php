<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Tokens_Constants extends Form_Validation_Constants
{
    /**
     * Error message codes
     * Sequence: 2-11-001
     * Sequence Description: API(2)-Auth Tokens(11)-MessageNumber(001)
     */
    const AUTH_TOKEN_REQUIRED = 211001;
    const AUTH_TOKEN_INVALID = 211002;
    const AUTH_TOKEN_EXPIRED = 211003;
    const AUTH_TOKEN_NOT_AVAIL = 211004;
}