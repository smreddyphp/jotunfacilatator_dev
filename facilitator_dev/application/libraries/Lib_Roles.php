<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_Roles
{
    public $strFlashMessage;

    /**
     * __construct
     */
    function __construct()
    {
        $this->ci = &get_instance();

        // Load roles config
        $this->ci->load->config('default/roles');

        // Set API
        $this->strAPI = $this->ci->config->item('roles_api');
    }

    /**
     * addRole
     *
     * @param string[] $p_arrDetails
     * @return boolean
     */
    function addRole($p_arrDetails)
    {
        // Post
        return $this->ci->rest->post($this->strAPI, json_encode($p_arrDetails), 'json');
    }

    /**
     * updateRole
     *
     * @param string[] $p_arrDetails
     * @param integer $p_nID
     * @return boolean
     */
    function updateRole($p_arrDetails, $p_nID)
    {
        // Put
        return $this->ci->rest->put($this->strAPI.$p_nID, json_encode($p_arrDetails), 'json');
    }

    /**
     * getRoleByID
     *
     * @param integer $p_nID
     * @return object
     */
    function getRoleByID($p_nID)
    {
        // Get category by ID
        $objResult = $this->ci->rest->get($this->strAPI.$p_nID);

        // Flash message
        $this->strFlashMessage = ($objResult->success == false) ? $objResult->errors[0]->message : '';

        return ($objResult->success == true) ? $objResult->result[0] : false;
    }

    /**
     * getRoles
     *
     * @return object
     */
    function getRoles($p_nStatus)
    {
        // Params
        $arrParams = ($p_nStatus) ? array('status' => $p_nStatus) : array();

        // Get roles
        $objResult = $this->ci->rest->get($this->strAPI, $arrParams, 'json');
        return ($objResult->success == true) ? $objResult->result : array();
    }

    /**
     * getRolesList
     *
     * @param integer $p_nExceptRoleID
     * @param string $p_nStatus
     * @param string[] $p_arrColumns
     * @return string[]
     */
    function getRolesList($p_nExceptRoleID = NULL, $p_nStatus = NULL, $p_arrColumns = array('id', 'name'))
    {
        // Assign
        list($strIndex, $strValue) = $p_arrColumns;

        // Get roles
        $objData = $this->getRoles($p_nStatus);

        // Create index, value array
        $arrData = array();
        if(!empty($objData))
            foreach($objData as $objDat)
                if($p_nExceptRoleID != $objDat->{$strIndex})
                    $arrData[$objDat->{$strIndex}] = $objDat->{$strValue};

        return $arrData;
    }

    /**
     * getRolesForPagination
     *
     * @param integer $p_nLimit
     * @param integer $p_nOffset
     * @param string $p_strSearch
     * @return string[]
     */
    function getRolesForPagination($p_nLimit, $p_nOffset, $p_strSearch = NULL)
    {
        // Get roles
        $objResult = $this->ci->rest->get($this->strAPI, array('limit' => $p_nLimit, 'offset' => $p_nOffset) + (($p_strSearch) ? array('search' => $p_strSearch) : array()), 'json');
        return ($objResult->success == true) ? array('objRoles' => $objResult->result, 'nTotalRows' => $objResult->totalCount) : array('objRoles' => array(), 'nTotalRows' => 0, 'message' => $objResult->errors[0]->message);
    }

    /**
     * deleteRole
     *
     * @param integer $p_nID
     * @return object
     */
    function deleteRole($p_nID)
    {
        // Delete by ID
        return $this->ci->rest->delete($this->strAPI.$p_nID);
    }
}

/* End of file Lib_Roles.php */
/* Location: ./application/libraries/Lib_Roles.php */