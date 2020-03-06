<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH .'/libraries/Form_Validation_Constants.php';

class This_Form_validation extends CI_Form_validation
{
    /**
     * __construct method
     */
    function __construct($rules = array())
    {
        parent::__construct($rules);

        // CI
        $this->ci = &get_instance();
    }

    /**
     * validate method
     *
     * @param string $group
     * @return boolean
     */
    public function validate($group = '')
    {
        // Remove unknown fields
        $this->remove_unknown_fields();

        // Run
        return $this->run($group);
    }

    /**
     * Get Rule
     *
     * Gets the rule associated with a particular field having error message
     *
     * @param string $field	Field name
     * @return string
     */
    public function rule($field)
    {
        if (empty($this->_field_data[$field]['rule']))
            return '';

        return $this->_field_data[$field]['rule'];
    }

    /**
     * Remove Unknown Fields
     *
     * @return void
     */
    function remove_unknown_fields()
    {
        if(empty($this->validation_data) || empty($this->_field_data))
            return false;

        // Loop
        foreach($this->_field_data as $field => $value)
        {
            if(!array_key_exists($field, $this->validation_data))
                unset($this->_field_data[$field]);
        }
    }

    /**
     * get_errors method
     *
     * @param string $p_strClass
     * @return string[]
     */
    public function get_errors($p_strClass)
    {
        // Set error delimiters
        $this->set_error_delimiters('', '');

        // Error
        $arrErrors = array();

        // Check empty
        if(empty($this->_field_data))
            return $arrErrors;

        // Loop
        foreach($this->_field_data as $strField => $arrField)
        {
            // Check error and rule
            if(form_error($strField) && form_rule($strField))
            {
                // Constant
                $strConstant = 'RULE_'.strtoupper(form_rule($strField));

                // Copy
                $arrErrors[] = array(
                    'code' => constant("$p_strClass::{$strConstant}"),
                    'field' => $strField,
                    'message' => form_error($strField, '', '')
                );
            }
        }

        return $arrErrors;
    }

    /**
     * decimal method
     *
     * @param string $value
     * @return bool
     */
    public function decimal($value) 
    {
        //First check if decimal
        if(!parent::decimal($value)) {

            //Now check if integer
            return (bool) parent::integer($value);
        }

        return true;
    }

    /**
     * is_unique method
     *
     * @param string $value, string $field
     * @return bool
     */
    function is_unique($value, $field)
    {
        list($field, $id) = explode(', ', $field);
        list($config_item, $field) = explode('.', $field);

        $_table = $this->ci->config->item($config_item.'_table');

        // Get data by field
        $this->ci->db->where($field, $value);
        $this->ci->db->limit(1);

        // Get data
        $query = $this->ci->db->get($_table);

        // Check num of rows
        if($query->num_rows()) {

            $data = $query->row();

            if($id && $id == $data->id)
                return true;

            return false;
        }

        return true;
    }

    /**
     * is_exist method
     *
     * @param string $value, string $field
     * @return bool
     */
    function is_exist($value, $field) 
    {
        list($config_item, $field, $status) = explode('.', $field);

        $_table = $this->ci->config->item($config_item.'_table');

        // Get data by field
        $this->ci->db->where($field, $value);
        $this->ci->db->where('status', $status);
        $this->ci->db->limit(1);

        if($this->ci->db->get($_table)->num_rows() == 0) {

            $this->ci->form_validation->set_message('is_exist', 'The '.$value.' does not exist.');
            return false;
        }

        return true;
    }

    /**
     * check_string method
     *
     * @param string $value, string $field
     * @return bool
     */
    public function check_string($value, $field) 
    {
        if(ctype_alpha(str_replace(' ', '', $value)))
            return true;

        if(ctype_alpha(str_replace('-', '', $value)))
            return true;

        $this->ci->form_validation->set_message('check_string', 'The '.$field.' should contain only characters.');
        return false;
    }

    /**
     * file_upload method
     *
     * @param string $value, string $field
     * @return void
     */
    public function file_upload($value, $field) 
    {
        // Set error delimiters
        $this->set_error_delimiters('', '');

        list($config_item, $required) = explode(', ', $field);
        list($config_item, $field) = explode('.', $config_item);

        switch ($required) {
            case 0:
                
                return true;
                break;

            case 1:

                if(isset($_FILES[$field]) && empty($_FILES[$field]['name'])) {

                    // throw an error because nothing was uploaded
                    $this->ci->form_validation->set_message('file_upload', "The $field field is required.");
                    return false;
                }
                break;

            case 2:

                if(empty($_FILES) || (isset($_FILES[$field]) && empty($_FILES[$field]['name'])))
                    return true;
                break;
        }

        // Set config
        $config['upload_path'] = APPPATH.'../'.$this->ci->config->item($config_item.'_file_path');
        $config['allowed_types'] = $this->ci->config->item($config_item.'_file_allowed_types');
        $config['overwrite'] = true;

        // Check file exists
        if(!file_exists($config['upload_path']) && !is_dir($config['upload_path']))
        {
            // create dir
            mkdir($config['upload_path'], 0777, true);
        }

        // Load upload library
        $this->ci->load->library('upload');

        // Initialize config
        $this->ci->upload->initialize($config);

        if($this->ci->upload->do_upload($field))
        {
            // set a $_POST value for 'image' that we can use later
            $upload_data = $this->ci->upload->data();

            // Set
            $_POST = array();
            $_POST[$field.'_path'] = $upload_data['file_path'];
            $_POST[$field] = $upload_data['file_name'];
            $_POST[$field.'_type'] = $upload_data['file_type'];
            $_POST[$field.'_ext'] = $upload_data['file_ext'];
            $_POST[$field.'_size'] = $upload_data['file_size'];

            // Key
            $_POST[$field.'_code'] = md5(microtime().date('d-m-Y H:i:s').$_POST[$field]);
            $_POST[$field.'_key'] = $_POST[$field.'_code'].$_POST[$field.'_ext'];

            // Rename
            rename($_POST[$field.'_path'].$_POST[$field], $_POST[$field.'_path'].$_POST[$field.'_key']);

            return true;
        }

        // possibly do some clean up ... then throw an error
        $this->ci->form_validation->set_message('file_upload', $this->ci->upload->display_errors());
        return false;
    }
}

/* End of file This_Form_Validation.php */
/* Location: ./application/libraries/This_Form_Validation.php */