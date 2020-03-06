<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model
{
    /**
     * __construct method
     */
    public function __construct()
    {
        $this->_table = $this->config->item('users_table');
    }

    /**
     * addUser method
     *
     * @param object $p_arrDetails
     * @return integer
     */
    function addUser($p_arrDetails)
    {
        $this->db->insert($this->_table, $p_arrDetails);

        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();

        return false;
    }

    /**
     * updateUser method
     *
     * @param object $p_arrDetails
     * @param integer $p_nID
     * @return bool
     */
    function updateUser($p_arrDetails, $p_nID)
    {
        $this->db->where('id', $p_nID);

        return $this->db->update($this->_table, $p_arrDetails);
    }

    /**
     * getUserByID method
     *
     * @param integer $p_nID
     * @return object
     */
    function getUserByID($p_nID)
    {
        $_roles_table = $this->config->item('roles_table');

        $this->db->select("$this->_table.*, $_roles_table.name as role_name");
        $this->db->join("$_roles_table", "$_roles_table.id = $this->_table.role_id");

        $this->db->where("$this->_table.id", $p_nID);
        $this->db->limit(1);

        return $this->db->get($this->_table);
    }

    /**
     * checkUserExistByID method
     *
     * @param integer $p_nID
     * @return boolean
     */
    function checkUserExistByID($p_nID) 
    {
        $this->db->where('id', $p_nID);

        $objQuery = $this->db->get($this->_table);
        if($objQuery->num_rows() == 0)
            return false;

        return true;
    }

    /**
     * getUserByEmail method
     *
     * @param string $p_strEmail
     * @return object
     */
    function getUserByEmail($p_strEmail)
    {
        $this->db->select('*');
        $this->db->where('email', $p_strEmail);
        $this->db->limit(1);

        return $this->db->get($this->_table);
    }

    /**
     * getLoggedUserByToken method
     *
     * @param string $p_strToken
     * @return object
     */
    function getLoggedUserByToken($p_strToken)
    {
        $_auth_tokens_table = $this->config->item('auth_tokens_table');
        $_roles_table = $this->config->item('roles_table');

        $this->db->select("$this->_table.*, $_roles_table.name as role_name");

        $this->db->join("$_auth_tokens_table", "$_auth_tokens_table.user_id = $this->_table.id");
        $this->db->join("$_roles_table", "$_roles_table.id = $this->_table.role_id");
        $this->db->where("$_auth_tokens_table.token", $p_strToken);

        $this->db->limit(1);

        return $this->db->get($this->_table);
    }

    /**
     * getUserByResetToken method
     *
     * @param integer $p_strResetToken
     * @return object
     */
    public function getUserByResetToken($p_strResetToken)
    {
        $this->db->select('*');
        $this->db->where('reset_token', $p_strResetToken);
        $this->db->limit(1);

        return $this->db->get($this->_table);
    }

    /**
     * getUsersForPagination method
     *
     * @param integer $p_nLimit
     * @param integer $p_nOffset
     * @param integer $p_nCreatedBy
     * @param string $p_strSearch
     * @param integer $p_nStatus
     * @param integer $p_nRoleID
     * @param integer $p_nExceptUserID
     * @return object
     */
    function getUsersForPagination($p_nLimit = NULL, $p_nOffset = NULL, $p_nCreatedBy = NULL, $p_strSearch = NULL, $p_nStatus = NULL, $p_nRoleID = NULL, $p_nExceptUserID = NULL)
    {
        $_roles_table = $this->config->item('roles_table');

        $this->db->select("$this->_table.*, $_roles_table.name as role_name");
        $this->db->join("$_roles_table", "$_roles_table.id = $this->_table.role_id");

        ($p_nCreatedBy) ? $this->db->where("$this->_table.created_by", $p_nCreatedBy) : false;
        ($p_nRoleID) ? $this->db->where("$this->_table.role_id", $p_nRoleID) : false;
        ($p_nExceptUserID) ? $this->db->where("$this->_table.id !=", $p_nExceptUserID) : false;
        ($p_nStatus != 'all') ? $this->db->where("$this->_table.status", $p_nStatus) : false;
        ($p_strSearch) ? $this->db->where("($this->_table.first_name like '%$p_strSearch%' or $this->_table.last_name like '%$p_strSearch%' or $this->_table.email like '%$p_strSearch%')") : false;

        ($p_nLimit) ? $this->db->limit($p_nLimit) : false;
        ($p_nOffset) ? $this->db->offset($p_nOffset) : false;

        $this->db->order_by("$this->_table.modified", "desc");
    
        return $this->db->get($this->_table);
    }

    /**
     * getNoOfUsers method
     *
     * @param integer $p_nCreatedBy
     * @param string $p_strSearch
     * @param integer $p_nStatus
     * @param integer $p_nRoleID
     * @param integer $p_nExceptUserID
     * @return integer
     */
    function getNoOfUsers($p_nCreatedBy = NULL, $p_strSearch = NULL, $p_nStatus = NULL, $p_nRoleID = NULL, $p_nExceptUserID = NULL)
    {
        $_roles_table = $this->config->item('roles_table');

        $this->db->select("count($this->_table.id) as count");
        $this->db->join("$_roles_table", "$_roles_table.id = $this->_table.role_id");

        ($p_nCreatedBy) ? $this->db->where("$this->_table.created_by", $p_nCreatedBy) : false;
        ($p_nRoleID) ? $this->db->where("$this->_table.role_id", $p_nRoleID) : false;
        ($p_nExceptUserID) ? $this->db->where("$this->_table.id !=", $p_nExceptUserID) : false;
        ($p_nStatus != 'all') ? $this->db->where("$this->_table.status", $p_nStatus) : false;
        ($p_strSearch) ? $this->db->where("($this->_table.first_name like '%$p_strSearch%' or $this->_table.last_name like '%$p_strSearch%' or $this->_table.email like '%$p_strSearch%')") : false;

        return $this->db->get($this->_table)->row();
    }
    
    //smr
    function get_user_targets($p_nID)
    {
        return $this->db->get_where($this->_table,array("user_id"=>$p_nID))->result();
    }

    /**
     * deleteUser method
     *
     * @param integer $p_nID
     * @return bool
     */
    function deleteUser($p_nID)
    {
        $this->db->where('id', $p_nID);
        return $this->db->delete($this->_table);
    }
}