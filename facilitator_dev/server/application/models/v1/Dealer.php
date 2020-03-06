<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dealer extends CI_Model
{
    /**
     * __construct method
     */
    public function __construct()
    {
        //$this->_table = $this->config->item('shops_table');
    }

    public function all_dealers($user_id)
    {
       return $this->db->query("select * from users where status=1 and id in( select dealer_id from user_dealers where user_id=$user_id)")->result();
    }

    /**
     * updateShop method
     *
     * @param object $p_arrDetails
     * @param integer $p_nID
     * @return bool
     */
    /*function updateShop($p_arrDetails, $p_nID)
    {
        $this->db->where('id', $p_nID);

        return $this->db->update($this->_table, $p_arrDetails);
    }*/

    /**
     * getShopByID method
     *
     * @param integer $p_nID
     * @return object
     */
    /*function getShopByID($p_nID)
    {
        $_shop_types_table = $this->config->item('shop_types_table');

        $this->db->select("$this->_table.*, $_shop_types_table.name as shop_type_name");
        $this->db->join("$_shop_types_table", "$_shop_types_table.id = $this->_table.shop_type_id");
        $this->db->where("$this->_table.id", $p_nID);
        $this->db->limit(1);

        return $this->db->get($this->_table);
    }*/

    /**
     * checkShopExistByID method
     *
     * @param integer $p_nID
     * @return boolean
     */
    /*function checkShopExistByID($p_nID) 
    {
        $this->db->where('id', $p_nID);

        $objQuery = $this->db->get($this->_table);
        if($objQuery->num_rows() == 0)
            return false;

        return true;
    }
*/
    /**
     * getShopsForPagination method
     *
     * @param integer $p_nLimit
     * @param integer $p_nOffset
     * @param string $p_strSearch
     * @param integer $p_nStatus
     * @param integer $p_nShopTypeID
     * @return object
     */
   /* function getShopsForPagination($p_nLimit = NULL, $p_nOffset = NULL, $p_strSearch = NULL, $p_nStatus = NULL, $p_nShopTypeID = NULL)
    {
        $_shop_types_table = $this->config->item('shop_types_table');

        $this->db->select("$this->_table.*, $_shop_types_table.name as shop_type_name");
        $this->db->join("$_shop_types_table", "$_shop_types_table.id = $this->_table.shop_type_id");

        ($p_nShopTypeID) ? $this->db->where("$this->_table.shop_type_id", $p_nShopTypeID) : false;
        ($p_nStatus != 'all') ? $this->db->where("$this->_table.status", $p_nStatus) : false;

        if($p_strSearch)
        {
            $this->db->like("$this->_table.name", $p_strSearch);
            $this->db->or_like("$this->_table.email", $p_strSearch);
        }

        ($p_nLimit) ? $this->db->limit($p_nLimit) : false;
        ($p_nOffset) ? $this->db->offset($p_nOffset) : false;

        $this->db->order_by('modified', 'desc');
    
        return $this->db->get($this->_table);
    }*/

    /**
     * getNoOfShops method
     *
     * @param string $p_strSearch
     * @param integer $p_nStatus
     * @param integer $p_nShopTypeID
     * @return integer
     */
    /*function getNoOfShops($p_strSearch = NULL, $p_nStatus = NULL, $p_nShopTypeID = NULL)
    {
        $this->db->select('count(id) as count');

        ($p_nShopTypeID) ? $this->db->where("$this->_table.shop_type_id", $p_nShopTypeID) : false;
        ($p_nStatus != 'all') ? $this->db->where("$this->_table.status", $p_nStatus) : false;

        if($p_strSearch)
        {
            $this->db->like('name', $p_strSearch);
        }

        return $this->db->get($this->_table)->row();
    }*/

    /**
     * deleteShop method
     *
     * @param integer $p_nID
     * @return boolean
     */
    /*function deleteShop($p_nID)
    {
        $this->db->where('id', $p_nID);
        return $this->db->delete($this->_table);
    }*/
}