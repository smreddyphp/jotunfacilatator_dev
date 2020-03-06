<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Email_template extends CI_Model
{
    /**
     * __construct method
     */
    public function __construct()
    {
        $this->_table = $this->config->item('email_templates_table');
    }

    /**
     * addEmailTemplate method
     *
     * @param object $p_arrDetails
     * @return integer
     */
    function addEmailTemplate($p_arrDetails)
    {
        $this->db->insert($this->_table, $p_arrDetails);

        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();

        return false;
    }

    /**
     * updateEmailTemplate method
     *
     * @param object $p_arrDetails
     * @param integer $p_nID
     * @return bool
     */
    function updateEmailTemplate($p_arrDetails, $p_nID)
    {
        $this->db->where('id', $p_nID);

        return $this->db->update($this->_table, $p_arrDetails);
    }

    /**
     * getEmailTemplateByID method
     *
     * @param integer $p_nID
     * @return object
     */
    function getEmailTemplateByID($p_nID)
    {
        $this->db->select('*');
        $this->db->where('id', $p_nID);
        $this->db->limit(1);

        return $this->db->get($this->_table);
    }

    /**
     * getEmailTemplateByCode method
     *
     * @param integer $p_strCode
     * @return object
     */
    public function getEmailTemplateByCode($p_strCode)
    {
        $this->db->select('*');
        $this->db->where('code', $p_strCode);
        $this->db->limit(1);

        return $this->db->get($this->_table);
    }

    /**
     * checkEmailTemplateExistByID method
     *
     * @param integer $p_nID
     * @return boolean
     */
    function checkEmailTemplateExistByID($p_nID) 
    {
        $this->db->where('id', $p_nID);

        $objQuery = $this->db->get($this->_table);
        if($objQuery->num_rows() == 0)
            return false;

        return true;
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
    function getEmailTemplatesForPagination($p_nLimit = null, $p_nOffset = null, $p_strSearch = null, $p_nStatus = null)
    {
        $this->db->select("$this->_table.*");

        if($p_strSearch)
        {
            $this->db->like('name', $p_strSearch);
        }

        ($p_nStatus != 'all') ? $this->db->where("$this->_table.status", $p_nStatus) : false;

        ($p_nLimit) ? $this->db->limit($p_nLimit) : false;
        ($p_nOffset) ? $this->db->offset($p_nOffset) : false;

        $this->db->order_by('modified', 'desc');
    
        return $this->db->get($this->_table);
    }

    /**
     * getNoOfEmailTemplates method
     *
     * @param string $p_strSearch
     * @param integer $p_nStatus
     * @return integer
     */
    function getNoOfEmailTemplates($p_strSearch = null, $p_nStatus = null)
    {
        $this->db->select('count(id) as count');

        if($p_strSearch)
        {
            $this->db->like('name', $p_strSearch);
        }

        ($p_nStatus != 'all') ? $this->db->where("$this->_table.status", $p_nStatus) : false;

         return $this->db->get($this->_table)->row();
    }

    /**
     * deleteEmailTemplate method
     *
     * @param integer $p_nID
     * @return boolean
     */
    function deleteEmailTemplate($p_nID)
    {
        $this->db->where('id', $p_nID);
        return $this->db->delete($this->_table);
    }

    /**
     * getFileTypesByEmailTemplateID method
     *
     * @param integer $p_nID
     * @return object
     */
    public function getFileTypesByEmailTemplateID($p_nID)
    {
        $_email_file_types_table = $this->config->item('email_file_types_table');
        $_email_template_file_types_table = $this->config->item('email_template_file_types_table');

        $this->db->select("$_email_file_types_table.name");
        $this->db->join("$_email_template_file_types_table", "$_email_template_file_types_table.static_email_file_type_id = $_email_file_types_table.id");

        $this->db->where("$_email_template_file_types_table.email_template_id", $p_nID);

        return $this->db->get($_email_file_types_table);
    }

    /**
     * getEmailTemplateParameters method
     *
     * @return object
     */
    public function getEmailTemplateParameters()
    {
        $_email_template_parameters_table = $this->config->item('email_template_parameters_table');

        $this->db->select('*');
        return $this->db->get($_email_template_parameters_table);
    }
}