<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

/**
 * Constructor
 *
 * @return void
 */
    function __construct() {

        parent::__construct();

        $this->ci = &get_instance();
    }

/**
 * decimal method
 *
 * @param string $value
 * @return bool
 */
    public function decimal($value) {

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
    function is_unique($value, $field) {

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
    function is_exist($value, $field) {

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
    public function check_string($value, $field) {

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
    public function file_upload($value, $field) {

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
        $config['upload_path'] = APPPATH.'../'.$this->ci->config->item($config_item.'_'.$field.'_path');
        $config['allowed_types'] = $this->ci->config->item($config_item.'_'.$field.'_allowed_types');
        $config['overwrite'] = true;

        // Check file exists
        if(!file_exists($config['upload_path']) && !is_dir($config['upload_path'])) {

            // create dir
            mkdir($config['upload_path'], 0777, true);
        }

        // Load upload library
        $this->ci->load->library('upload');

        // Initialize config
        $this->ci->upload->initialize($config);

        if($this->ci->upload->do_upload($field)) {

            // set a $_POST value for 'image' that we can use later
            $upload_data = $this->ci->upload->data();

            $_POST[$field.'_path'] = $upload_data['full_path'];
            $_POST[$field] = $upload_data['file_name'];

            $this->_cleanup[] = $upload_data['full_path'];

            return true;
        }

        // possibly do some clean up ... then throw an error
        $this->ci->form_validation->set_message('file_upload', $this->ci->upload->display_errors());
        return false;
    }
}

/* End of file MY_Form_Validation.php */
/* Location: ./application/libraries/MY_Form_Validation.php */