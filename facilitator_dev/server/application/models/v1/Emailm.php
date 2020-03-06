<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Emailm extends CI_Model
{
    /**
     * __construct method
     */
    public function __construct()
    {
        $this->_table = $this->config->item('emails_table');
    }

    /**
     * addEmail method
     *
     * @param object $p_arrDetails
     * @return integer
     */
    function addEmail($p_arrDetails)
    {
        $this->db->insert($this->_table, $p_arrDetails);

        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();

        return false;
    }
}