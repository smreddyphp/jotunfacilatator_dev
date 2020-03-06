<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'/libraries/v1/users/Users_Constants.php';

class Lib_Users
{
    /**
     * __construct method
     */
    function __construct() 
    {
        // CI
        $this->ci = &get_instance();

        // Load users config
        $this->ci->load->config('v1/users');

        // Load lang config
        $this->ci->lang->load('v1/users', $this->ci->lib_api->lang);

        // Load user model
        $this->ci->load->model('v1/user');
    }

    /**
     * addUser method
     *
     * @param string[] $p_arrUser
     * @return string[]
     */
    public function addUser($p_arrUser)
    {
        return $this->ci->user->addUser($p_arrUser);
    }

    public function update_user_geodata($arrUser,$userid)
    {
        return $this->ci->user->updateUser($arrUser,$userid);
    }
    /**
     * updateUser method
     *
     * @param string[] $p_arrUser
     * @param integer $p_nID
     * @return boolean
     */
    public function updateUser($p_arrUser, $p_nID)
    {
        return $this->ci->user->updateUser($p_arrUser, $p_nID);
    }

    /**
     * getUserByID method
     *
     * @param integer $p_nID
     * @return object
     */
    public function getUserByID($p_nID)
    {
        return $this->ci->user->getUserByID($p_nID);
    }

    /**
     * checkUserExistByID method
     *
     * @param integer $p_nID
     * @return object
     */
    public function checkUserExistByID($p_nID)
    {
        return $this->ci->user->checkUserExistByID($p_nID);
    }

    /**
     * getUserByEmail method
     *
     * @param integer $p_strEmail
     * @return object
     */
    public function getUserByEmail($p_strEmail)
    {
        return $this->ci->user->getUserByEmail($p_strEmail);
    }

    /**
     * getLoggedUserByToken method
     *
     * @param integer $p_strResetToken
     * @return object
     */
    public function getLoggedUserByToken($p_strResetToken)
    {
        return $this->ci->user->getLoggedUserByToken($p_strResetToken);
    }

    /**
     * getUserByResetToken method
     *
     * @param integer $p_strResetToken
     * @return object
     */
    public function getUserByResetToken($p_strResetToken)
    {
        return $this->ci->user->getUserByResetToken($p_strResetToken);
    }

    /**
     * getUsersForPagination method
     *
     * @param integer $p_nLimit
     * @param integer $p_nOffset
     * @param integer $p_nCreatedBy
     * @param integer $p_strSearch
     * @param integer $p_nStatus
     * @param integer $p_nRoleID
     * @param integer $p_nExceptUserID
     * @return object
     */
    public function getUsersForPagination($p_nLimit = NULL, $p_nOffset = NULL, $p_nCreatedBy = NULL, $p_strSearch = NULL, $p_nStatus = NULL, $p_nRoleID = NULL, $p_nExceptUserID = NULL)
    {
        return $this->ci->user->getUsersForPagination($p_nLimit, $p_nOffset, $p_nCreatedBy, $p_strSearch, $p_nStatus, $p_nRoleID, $p_nExceptUserID)->result();
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
    public function getNoOfUsers($p_nCreatedBy = NULL, $p_strSearch = NULL, $p_nStatus = NULL, $p_nRoleID = NULL, $p_nExceptUserID = NULL)
    {
        return $this->ci->user->getNoOfUsers($p_nCreatedBy, $p_strSearch, $p_nStatus, $p_nRoleID, $p_nExceptUserID);
    }

    /**
     * deleteUser method
     *
     * @param integer $p_nID
     * @return boolean
     */
    public function deleteUser($p_nID)
    {
        return $this->ci->user->deleteUser($p_nID);
    }

    /**
     * @param object $p_objResults
     * @return string[]
     */
    public function arrangeFormat($p_objResults)
    {
        $arrData = array();

        foreach ($p_objResults as $objResult)
        {
            $arrUser = array(
                'id' => $objResult->id,
                'code' => $objResult->code,
                'username' => $objResult->username,
                'first_name' => $objResult->first_name,
                'last_name' => $objResult->last_name,
                'email' => $objResult->email,
                'phone' => $objResult->phone,
                'profile_image' => $objResult->profile_image,
                'status' => $objResult->status,
                'role' => array(
                    'id' => $objResult->role_id,
                    'name' => $objResult->role_name,
                ),
                'created' => $objResult->created,
                'modified' => $objResult->modified
            );

            $arrData[] = $arrUser;
        }

        return $arrData;
    }

    /**
     * _randomResetToken method
     *
     * @param integer $p_nLength
     * @return string
     */
    function _randomResetToken($p_nLength = 60) 
    {
        $strTimeStamp = time();
        
        $strChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'.$strTimeStamp;
        $nCharLength = strlen($strChars);

        $strRandomString = '';
        for ($nI = 0; $nI < $p_nLength; $nI++)
            $strRandomString .= $strChars[rand(0, $nCharLength - 1)];

        return $strRandomString;
    }
}

/* End of file lib_users.php */
/* Location: ./application/libraries/v1/users/lib_users.php */