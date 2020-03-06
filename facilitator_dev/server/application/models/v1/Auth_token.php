<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_token extends CI_Model
{
    /**
     * __construct method
     */
    public function __construct()
    {
        $this->_table = $this->config->item('auth_tokens_table');
    }

    /**
     * addAuthToken method
     *
     * @param object $p_arrDetails
     * @return integer
     */
    function addAuthToken($p_arrDetails)
    {
        $this->db->insert($this->_table, $p_arrDetails);

        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();

        return false;
    }

    /**
     * updateAuthToken method
     *
     * @param object $p_arrDetails
     * @param integer $p_nID
     * @return bool
     */
     
    function updateAuthToken($p_arrDetails, $p_nID)
    {
        $this->db->where('id', $p_nID);
        return $this->db->update($this->_table, $p_arrDetails);
    }

    /**
     * updateAuthTokenByToken method
     *
     * @param string[] $p_arrDetails
     * @param string $p_strToken
     * @return boolean
     */
    public function updateAuthTokenByToken($p_arrDetails, $p_strToken)
    {
        $this->db->where('token', $p_strToken);

        return $this->db->update($this->_table, $p_arrDetails);
    }

    /**
     * getAuthTokenByToken method
     *
     * @param string $p_sToken
     * @return object
     */
    function getAuthTokenByToken($p_sToken)
    {
        $this->db->select('*, TIMESTAMPDIFF(SECOND, modified, NOW()) as seconds, ');
        $this->db->where('token', $p_sToken);
        $this->db->limit(1);

        return $this->db->get($this->_table);
    }
}