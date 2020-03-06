<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('form_rule'))
{
    /**
     * Form Rule
     *
     * Returns the rule for a specific form field. This is a helper for the
     * form validation class.
     *
     * @param	string
     * @return	string
     */
    function form_rule($field = '')
    {
        if (FALSE === ($OBJ =& _get_validation_object()))
        {
            return '';
        }

        return $OBJ->rule($field);
    }
}