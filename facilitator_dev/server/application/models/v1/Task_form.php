<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Task_form extends CI_Model
{
    /**
     * __construct method
     */
    public function __construct()
    {
        $this->_table = $this->config->item('task_forms_table');
    }

    /**
     * updateTaskForm method
     *
     * @param object $p_arrDetails
     * @param integer $p_nID
     * @return bool
     */
    function updateTaskForm($p_arrDetails, $p_nID)
    {
        $this->db->where('id', $p_nID);

        return $this->db->update($this->_table, $p_arrDetails);
    }

    /**
     * getTaskFormByID method
     *
     * @param integer $p_nID
     * @return object
     */
    public function getTaskFormByID($p_nID)
    {
        // Config items
        $_tasks_table = $this->config->item('tasks_table');
        $_shops_table = $this->config->item('shops_table');
        $_shop_types_table = $this->config->item('shop_types_table');
        $_forms_table = $this->config->item('forms_table');

        $this->db->select("$this->_table.*, $_tasks_table.id as task_id,
            $_shops_table.id as shop_id, $_shops_table.name as shop_name, $_shops_table.last_evaluation as shop_last_evaluation, $_shops_table.modified as shop_modified,
            $_shops_table.address as shop_address, $_shops_table.acc_no as shop_acc_no, $_shop_types_table.id as shop_type_id,$_shop_types_table.name as shop_type_name,
            $_forms_table.name as form_name, $_forms_table.total_points as form_tpoints");
        $this->db->join("$_tasks_table", "$_tasks_table.id = $this->_table.task_id");
        $this->db->join("$_forms_table", "$_forms_table.id = $this->_table.form_id");
        $this->db->join("$_shops_table", "$_shops_table.id = $_tasks_table.shop_id");
        $this->db->join("$_shop_types_table", "$_shop_types_table.id = $_shops_table.shop_type_id");
        $this->db->where("$this->_table.id", $p_nID);
        $this->db->limit(1);

        return $this->db->get($this->_table);
    }

    /**
     * checkTaskFormExistByID method
     *
     * @param integer $p_nID
     * @return boolean
     */
    function checkTaskFormExistByID($p_nID)
    {
        $this->db->where('id', $p_nID);

        $objQuery = $this->db->get($this->_table);
        if($objQuery->num_rows() == 0)
            return false;

        return true;
    }

    /**
     * addPoints method
     *
     * @param string[] $p_arrDetails
     * @return boolean
     */
    public function addPoints($p_arrDetails)
    {
        //return $p_arrDetails;exit;
        $_task_form_points_table = $this->config->item('task_form_points_table');

        $this->db->insert_batch($_task_form_points_table, $p_arrDetails);

//echo $this->db->last_query();exit;

        if ($this->db->affected_rows() >= 1)
            return true;

        return false;
    }

    /**
     * getPointsByTaskFormID method
     *
     * @param integer $p_nTaskFormID
     * @return object
     */
    function getPointsByTaskFormID($p_nTaskFormID)
    {
        // Config items
        $_sub_forms_table = $this->config->item('sub_forms_table');
        $_task_form_points_table = $this->config->item('task_form_points_table');

        $this->db->select("$_task_form_points_table.*, $_sub_forms_table.name as sub_form_name");
        $this->db->join("$_sub_forms_table", "$_sub_forms_table.id = $_task_form_points_table.sub_form_id");
        $this->db->where("$_task_form_points_table.task_form_id", $p_nTaskFormID);

        return $this->db->get($_task_form_points_table);
    }

    /**
     * deletePointsByTaskFormID method
     *
     * @param string[] $p_nTaskFormID
     * @return boolean
     */
    public function deletePointsByTaskFormID($p_nTaskFormID)
    {
        $_task_form_points_table = $this->config->item('task_form_points_table');

        $this->db->where('task_form_id', $p_nTaskFormID);

        return $this->db->delete($_task_form_points_table);
    }
    
    
    public function get_taskformpoints_taskformid($p_nTaskFormID)
    {
        $_task_form_points_table = $this->config->item('task_form_points_table');
        $this->db->select('*');
        $this->db->from($_task_form_points_table);
        $this->db->where('task_form_id', $p_nTaskFormID);
        $query = $this->db->get();
        return $rows = $query->num_rows();
    }
    
    
    
    public function get_taskformpointsdata_taskformid($p_nTaskFormID)
    {
        $_task_form_points_table = $this->config->item('task_form_points_table');
        $this->db->select('*');
        $this->db->from($_task_form_points_table);
        $this->db->where('task_form_id', $p_nTaskFormID);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * getTaskFormsByUserID method
     *
     * @param integer $p_nUserID
     * @return object
     */
    public function getTaskFormsByUserID($p_nUserID)
    {
        // Config items
        $_forms_table = $this->config->item('forms_table');
        $_tasks_table = $this->config->item('tasks_table');

        $this->db->select("$this->_table.*,
            $_forms_table.name as form_name");

        $this->db->join("$_tasks_table", "$_tasks_table.id = $this->_table.task_id");
        $this->db->join("$_forms_table", "$_forms_table.id = $this->_table.form_id");

        $this->db->where("$_tasks_table.user_id", $p_nUserID);

        $this->db->group_by("$this->_table.form_id");

        return $this->db->get($this->_table);
    }

    /**
     * getTaskFormsByFormAndUserID method
     *
     * @param integer $p_nFormID
     * @param integer $p_nUserID
     * @return object
     */
    public function getTaskFormsByFormAndUserID($p_nFormID, $p_nUserID)
    {
        // Config items
        $_forms_table = $this->config->item('forms_table');
        $_shops_table = $this->config->item('shops_table');
        $_tasks_table = $this->config->item('tasks_table');

        $this->db->select("$this->_table.*,
            $_shops_table.id as shop_id, $_shops_table.name as shop_name, $_shops_table.address as shop_address,
            $_shops_table.email as shop_email, $_shops_table.acc_no as shop_acc_no, $_shops_table.last_evaluation as shop_last_evaluation, 
            $_shops_table.image as shop_image, $_forms_table.name as form_name");

        $this->db->join("$_tasks_table", "$_tasks_table.id = $this->_table.task_id");
        $this->db->join("$_shops_table", "$_shops_table.id = $_tasks_table.shop_id");
        $this->db->join("$_forms_table", "$_forms_table.id = $this->_table.form_id");

        $this->db->where("$this->_table.form_id", $p_nFormID);
        $this->db->where("$_tasks_table.user_id", $p_nUserID);

        return $this->db->get($this->_table);
    }

    /**
     * getNoOfFormsByTaskID method
     *
     * @param integer $p_nTaskID
     * @return object
     */
    public function getNoOfFormsByTaskID($p_nTaskID)
    {
        $this->db->select('count(*) as count');
        $this->db->where('task_id', $p_nTaskID);
        $this->db->group_by('task_id');

        return $this->db->get($this->_table);
    }

    /**
     * getNoOfFormPointsByTaskID method
     *
     * @param integer $p_nTaskID
     * @return object
     */
    public function getNoOfFormPointsByTaskID($p_nTaskID)
    {
        // Config items
        $_task_form_points_table = $this->config->item('task_form_points_table');

        // Query
        $strQuery = "
            select count(*) as count
            from (
                select $this->_table.id
                from $this->_table
                join $_task_form_points_table on $_task_form_points_table.task_form_id = $this->_table.id
                where $this->_table.task_id = $p_nTaskID
                group by $_task_form_points_table.task_form_id
            ) as task_forms_temp
        ";

        return $this->db->query($strQuery);
    }

    /**
     * addImages method
     *
     * @param string[] $p_arrDetails
     * @return boolean
     */
    public function addImages($p_arrDetails)
    {
        $_task_form_images_table = $this->config->item('task_form_images_table');

        $this->db->insert_batch($_task_form_images_table, $p_arrDetails);

        if ($this->db->affected_rows() >= 1)
            return true;

        return false;
    }

    /**
     * getImagesByTaskFormID method
     *
     * @param integer $p_nTaskFormID
     * @return object
     */
    function getImagesByTaskFormID($p_nTaskFormID)
    {
        // Config items
        $_task_form_images_table = $this->config->item('task_form_images_table');

        $this->db->select('*');
        $this->db->where('task_form_id', $p_nTaskFormID);

        return $this->db->get($_task_form_images_table);
    }

    /**
     * deleteImagesByTaskFormID method
     *
     * @param string[] $p_nTaskFormID
     * @return boolean
     */
    public function deleteImagesByTaskFormID($p_nTaskFormID)
    {
        $_task_form_images_table = $this->config->item('task_form_images_table');

        $this->db->where('task_form_id', $p_nTaskFormID);

        return $this->db->delete($_task_form_images_table);
    }
}