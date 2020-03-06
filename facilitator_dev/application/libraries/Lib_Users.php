<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_Users
{
    public $strFlashMessage;

    /**
     * __construct
     */
    function __construct()
    {
        $this->ci = &get_instance();

        // Load users config
        $this->ci->load->config('default/users');

        // Set API
        $this->strAPI = $this->ci->config->item('users_api');
    }

    /**
     * addUser
     *
     * @param string[] $p_arrDetails
     * @return boolean
     */
    function addUser($p_arrDetails)
    {
        // Post
        $objResult = $this->ci->rest->post($this->strAPI, json_encode($p_arrDetails), 'json');

        // False
        if($objResult->success == false)
        {
            $this->strFlashMessage = $objResult->result->errors;
            return false;
        }

        // Email
        $arrEmail = array(
            'gateway_code' => 'GMAIL',
            'template_code' => 'REGISTRATION-MAIL-USER',
            'subject_parameters' => json_encode($p_arrDetails),
            'body_parameters' => json_encode($p_arrDetails),
            'to_address' => $p_arrDetails['email']
        );

        // Send mail
        if(!$this->ci->lib_common->sendMail($arrEmail))
        {
            $this->strFlashMessage = $this->ci->lib_common->strFlashMessage;
            return false;
        }

        return true;
    }

    /**
     * updateUser
     *
     * @param string[] $p_arrDetails
     * @param integer $p_nID
     * @return boolean
     */
    function updateUser($p_arrDetails, $p_nID)
    {
        // Put
        return $this->ci->rest->put($this->strAPI.$p_nID, json_encode($p_arrDetails), 'json');
    }

    /**
     * getUserByID
     *
     * @param integer $p_nID
     * @return object
     */
    function getUserByID($p_nID)
    {
        // Get category by ID
        $objResult = $this->ci->rest->get($this->strAPI.$p_nID);

        // Flash message
        $this->strFlashMessage = ($objResult->success == false) ? $objResult->errors[0]->message : '';

        return ($objResult->success == true) ? $objResult->result[0] : false;
    }

    /**
     * getUsers
     *
     * @return object
     */
    function getUsers($p_nStatus)
    {
        // Params
        $arrParams = ($p_nStatus) ? array('status' => $p_nStatus) : array();

        // Get users
        $objResult = $this->ci->rest->get($this->strAPI, $arrParams, 'json');
        return ($objResult->success == true) ? $objResult->result : array();
    }

    /**
     * getUsersList
     *
     * @param string $p_nStatus
     * @param string[] $p_arrColumns
     * @return string[]
     */
    function getUsersList($p_nStatus = NULL, $p_arrColumns = array('id', 'name'))
    {
        // Assign
        list($strIndex, $strValue) = $p_arrColumns;

        // Get users
        $objData = $this->getUsers($p_nStatus);

        // Create index, value array
        $arrData = array();
        if(!empty($objData))
            foreach($objData as $objDat)
                $arrData[$objDat->{$strIndex}] = $objDat->{$strValue};

        return $arrData;
    }

    /**
     * getUsersForPagination
     *
     * @param integer $p_nLimit
     * @param integer $p_nOffset
     * @param integer $p_nCreatedBy
     * @param string $p_strSearch
     * @param integer $p_nStatus
     * @return string[]
     */
    function getUsersForPagination($p_nLimit, $p_nOffset, $p_nCreatedBy = NULL, $p_strSearch = NULL, $p_nStatus = NULL)
    {
        // Params
        $arrParams = array('limit' => $p_nLimit, 'offset' => $p_nOffset, 'created_by' => $p_nCreatedBy);
        $arrParams += ($p_strSearch) ? array('search' => $p_strSearch) : array();
        $arrParams += ($p_nStatus) ? array('status' => $p_nStatus) : array();

        // Get users
        $objResult = $this->ci->rest->get($this->strAPI, $arrParams, 'json');
        
        return ($objResult->success == true) ? array('objUsers' => $objResult->result, 'nTotalRows' => $objResult->totalCount) : array('objUsers' => array(), 'nTotalRows' => 0, 'message' => $objResult->result->errors[0]->message);
    }

    /**
     * deleteUser
     *
     * @param integer $p_nID
     * @return object
     */
    function deleteUser($p_nID)
    {
        // Delete by ID
        return $this->ci->rest->delete($this->strAPI.$p_nID);
    }

    /**
     * addTask
     *
     * @param string[] $p_arrDetails
     * @param integer $p_nUserID
     * @return boolean
     */
    function addTask($p_arrDetails, $p_nUserID)
    {
        return $this->ci->rest->post($this->strAPI.$p_nUserID.'/tasks', json_encode($p_arrDetails), 'json');
    }

    /**
     * updateTask
     *
     * @param string[] $p_arrDetails
     * @param integer $p_nUserID
     * @param integer $p_nTaskID
     * @return boolean
     */
    function updateTask($p_arrDetails, $p_nUserID, $p_nTaskID)
    {
        // Put
        return $this->ci->rest->put($this->strAPI.$p_nUserID.'/tasks/'.$p_nTaskID, json_encode($p_arrDetails), 'json');
    }

    /**
     * getFormsByUserID
     *
     * @param integer $p_nID
     * @return object
     */
    function getFormsByUserID($p_nID)
    {
        // Get forms by userID
        $objResult = $this->ci->rest->get($this->strAPI.$p_nID.'/forms');

        // Flash message
        $this->strFlashMessage = ($objResult->success == false) ? $objResult->errors[0]->message : '';

        return ($objResult->success == true) ? $objResult->result[0] : false;
    }

    /**
     * getShopsByFormAndUserID
     *
     * @param integer $p_nUserID
     * @param integer $p_nFormID
     * @return object
     */
    function getShopsByFormAndUserID($p_nUserID, $p_nFormID)
    {
        // Get shops by form and userID
        $objResult = $this->ci->rest->get($this->strAPI.$p_nUserID.'/forms/'.$p_nFormID);

        // Flash message
        $this->strFlashMessage = ($objResult->success == false) ? $objResult->errors[0]->message : '';

        return ($objResult->success == true) ? $objResult->result[0] : false;
    }
}

/* End of file Lib_Users.php */
/* Location: ./application/libraries/Lib_Users.php */