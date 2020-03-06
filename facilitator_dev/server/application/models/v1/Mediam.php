<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mediam extends CI_Model
{
    /**
     * __construct method
     */
    public function __construct()
    {
        $this->_table = $this->config->item('media_table');
    }

    /**
     * addMedia method
     *
     * @param object $p_arrDetails
     * @return integer
     */
    function addMedia($p_arrDetails)
    {
        $this->db->insert($this->_table, $p_arrDetails);

        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();

        return false;
    }

    /**
     * updateMedia method
     *
     * @param object $p_arrDetails
     * @param integer $p_nID
     * @return bool
     */
    function updateMedia($p_arrDetails, $p_nID)
    {
        $this->db->where('id', $p_nID);

        return $this->db->update($this->_table, $p_arrDetails);
    }

    /**
     * getMediaByID method
     *
     * @param integer $p_nID
     * @return object
     */
    function getMediaByID($p_nID)
    {
        $this->db->select('*');
        $this->db->where('id', $p_nID);
        $this->db->limit(1);

        return $this->db->get($this->_table);
    }

    /**
     * checkMediaExistByID method
     *
     * @param integer $p_nID
     * @return boolean
     */
    function checkMediaExistByID($p_nID) 
    {
        $this->db->where('id', $p_nID);

        $objQuery = $this->db->get($this->_table);
        if($objQuery->num_rows() == 0)
            return false;

        return true;
    }

    /**
     * getMediaForPagination method
     *
     * @param integer $p_nLimit
     * @param integer $p_nOffset
     * @param string $p_strSearch
     * @param integer $p_nStatus
     * @return object
     */
    function getMediaForPagination($p_nLimit = null, $p_nOffset = null, $p_strSearch = null, $p_nStatus = null)
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
     * getNoOfMedia method
     *
     * @param string $p_strSearch
     * @param integer $p_nStatus
     * @return integer
     */
    function getNoOfMedia($p_strSearch = null, $p_nStatus = null)
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
     * deleteMedia method
     *
     * @param integer $p_nID
     * @return boolean
     */
    function deleteMedia($p_nID)
    {
        $this->db->where('id', $p_nID);
        return $this->db->delete($this->_table);
    }
}