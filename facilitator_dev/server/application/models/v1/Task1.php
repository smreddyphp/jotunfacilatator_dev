<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Task extends CI_Model
{
    /**
     * __construct method
     */
    public function __construct()
    {
        $this->_table = $this->config->item('tasks_table');
    }

    /**
     * addTask method
     *
     * @param object $p_arrDetails
     * @return integer
     */
    function addTask($p_arrDetails)
    {
        $this->db->insert($this->_table, $p_arrDetails);

        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();

        return false;
    }

    /**
     * updateTask method
     *
     * @param object $p_arrDetails
     * @param integer $p_nID
     * @return bool
     */
    function updateTask($p_arrDetails, $p_nID)
    {
        $this->db->where('id', $p_nID);

        return $this->db->update($this->_table, $p_arrDetails);
    }

    /**
     * getTaskByID method
     *
     * @param integer $p_nID
     * @param $p_nUserID
     * @return object
     */
    function getTaskByID($p_nID, $p_nUserID = NULL)
    {
        // Confi items
        $_shops_table = $this->config->item('shops_table');

        $this->db->select("$this->_table.*, $_shops_table.name as shop_name, $_shops_table.area as shop_area, $_shops_table.address as shop_address");

        $this->db->join("$_shops_table", "$_shops_table.id = $this->_table.shop_id");

        $this->db->where("$this->_table.id", $p_nID);
        ($p_nUserID) ? $this->db->where("$this->_table.user_id", $p_nUserID) : false;

        $this->db->limit(1);

        // Get compiled select
        $strQuery = $this->db->get_compiled_select($this->_table, false);

        // Reset query
        $this->db->reset_query();

        // Confi items
        $_forms_table = $this->config->item('forms_table');
        $_task_forms_table = $this->config->item('task_forms_table');

        $this->db->select("tasks_temp.*, $_task_forms_table.id as task_form_id, $_task_forms_table.form_id as form_id,
            $_forms_table.name as form_name");

        $this->db->join("($strQuery) as tasks_temp", "tasks_temp.id = $this->_table.id");
        $this->db->join("$_task_forms_table", "$_task_forms_table.task_id = $this->_table.id", "left");
        $this->db->join("$_forms_table", "$_forms_table.id = $_task_forms_table.form_id", "left");

        return $this->db->get($this->_table);
    }

    /**
     * checkTaskExistByID method
     *
     * @param integer $p_nID
     * @return boolean
     */
    function checkTaskExistByID($p_nID) 
    {
        $this->db->where('id', $p_nID);

        $objQuery = $this->db->get($this->_table);
        if($objQuery->num_rows() == 0)
            return false;

        return true;
    }

    /**
     * getTasksForPagination method
     *
     * @param integer $p_nLimit
     * @param integer $p_nOffset
     * @param integer $p_nUserID
     * @param string $p_strSearch
     * @param integer $p_nStatus
     * @return object
     */
    function getTasksForPagination($p_nLimit = NULL, $p_nOffset = NULL, $p_nUserID = NULL, $p_strSearch = NULL, $p_nStatus = NULL)
    {
        // Confi items
        $_shops_table = $this->config->item('shops_table');

        $this->db->select("$this->_table.*, $_shops_table.name as shop_name, $_shops_table.area as shop_area, $_shops_table.address as shop_address");

        $this->db->join("$_shops_table", "$_shops_table.id = $this->_table.shop_id");

        ($p_nUserID) ? $this->db->where("$this->_table.user_id", $p_nUserID) : false;
        ($p_nStatus != 'all') ? $this->db->where("$this->_table.status", $p_nStatus) : false;

        ($p_nLimit) ? $this->db->limit($p_nLimit) : false;
        ($p_nOffset) ? $this->db->offset($p_nOffset) : false;

        $this->db->order_by("$this->_table.modified", "desc");

        // Get compiled select
        $strQuery = $this->db->get_compiled_select($this->_table, false);

        // Reset query
        $this->db->reset_query();

        // Confi items
        $_forms_table = $this->config->item('forms_table');
        $_task_forms_table = $this->config->item('task_forms_table');

        $this->db->select("tasks_temp.*, $_task_forms_table.id as task_form_id, $_task_forms_table.form_id as form_id,
            $_forms_table.name as form_name");

        $this->db->join("($strQuery) as tasks_temp", "tasks_temp.id = $this->_table.id");
        $this->db->join("$_task_forms_table", "$_task_forms_table.task_id = $this->_table.id", "left");
        $this->db->join("$_forms_table", "$_forms_table.id = $_task_forms_table.form_id", "left");

        return $this->db->get($this->_table);
    }

    /**
     * getNoOfTasks method
     *
     * @param string $p_strSearch
     * @param integer $p_nStatus
     * @return integer
     */
    function getNoOfTasks($p_strSearch = null, $p_nStatus = null)
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
     * deleteTask method
     *
     * @param integer $p_nID
     * @return boolean
     */
    function deleteTask($p_nID)
    {
        $this->db->where('id', $p_nID);
        return $this->db->delete($this->_table);
    }

    /**
     * addTaskForms method
     *
     * @param string[] $p_arrDetails
     * @return integer
     */
    public function addTaskForms($p_arrDetails)
    {
        $_task_forms_table = $this->config->item('task_forms_table');

        $this->db->insert_batch($_task_forms_table, $p_arrDetails);

        if ($this->db->affected_rows() >= 1)
            return true;

        return false;
    }

    /**
     * deleteTaskFormsByTaskID method
     *
     * @param string[] $p_nTaskID
     * @return boolean
     */
    public function deleteTaskFormsByTaskID($p_nTaskID)
    {
        $_task_forms_table = $this->config->item('task_forms_table');

        $this->db->where('task_id', $p_nTaskID);

        return $this->db->delete($_task_forms_table);
    }
}