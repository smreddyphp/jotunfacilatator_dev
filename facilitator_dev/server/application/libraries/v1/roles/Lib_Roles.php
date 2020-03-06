<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'/libraries/v1/roles/Roles_Constants.php';

class Lib_Roles
{
    /**
     * __construct method
     */
    function __construct() 
    {
        // CI
        $this->ci = &get_instance();

        // Load Roles config
        $this->ci->load->config('v1/roles');

        // Load lang config
        $this->ci->lang->load('v1/roles', $this->ci->lib_api->lang);

        // Load Role model
        $this->ci->load->model('v1/role');
    }

    /**
     * addRole method
     *
     * @param string[] $p_arrRole
     * @return integer
     */
    public function addRole($p_arrRole)
    {
        return $this->ci->role->addRole($p_arrRole);
    }

    /**
     * updateRole method
     *
     * @param string[] $p_arrRole
     * @param integer $p_nID
     * @return boolean
     */
    public function updateRole($p_arrRole, $p_nID)
    {
        return $this->ci->role->updateRole($p_arrRole, $p_nID);
    }

    /**
     * checkRoleExistByID method
     *
     * @param integer $p_nID
     * @return boolean
     */
    public function checkRoleExistByID($p_nID)
    {
        return $this->ci->role->checkRoleExistByID($p_nID);
    }

    /**
     * getRoleByID method
     *
     * @param integer $p_nID
     * @return object
     */
    public function getRoleByID($p_nID)
    {
        return $this->ci->role->getRoleByID($p_nID);
    }

    /**
     * getRolesForPagination method
     *
     * @param integer $p_nLimit
     * @param integer $p_nOffset
     * @param integer $p_strSearch
     * @param integer $p_nStatus
     * @return object
     */
    public function getRolesForPagination($p_nLimit = NULL, $p_nOffset = NULL, $p_strSearch = NULL, $p_nStatus = NULL)
    {
        return $this->ci->role->getRolesForPagination($p_nLimit, $p_nOffset, $p_strSearch, $p_nStatus);
    }

    /**
     * getNoOfRoles method
     *
     * @param integer $p_strSearch
     * @param integer $p_nStatus
     * @return integer
     */
    public function getNoOfRoles($p_strSearch = NULL, $p_nStatus = NULL)
    {
        return $this->ci->role->getNoOfRoles($p_strSearch, $p_nStatus);
    }

    /**
     * deleteRole method
     *
     * @param integer $p_nID
     * @return boolean
     */
    public function deleteRole($p_nID)
    {
        return $this->ci->role->deleteRole($p_nID);
    }
}

/* End of file lib_role.php */
/* Location: ./application/libraries/v1/roles/lib_role.php */
