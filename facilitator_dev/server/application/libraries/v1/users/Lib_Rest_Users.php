<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_Rest_Users extends Lib_Api {

    /**
     * __construct method
     */
    function __construct() {
        // CI
        $this->ci = &get_instance();

        // Load Lib_Users Library
        $this->ci->load->library('v1/users/Lib_Users');
    }

    /**
     * @return string[]
     */
    public function postUser() {
        $manager_id = $this->ci->post('manager_id');
        if ($this->ci->post('role_id') == '1') {
            if ($manager_id == "") {
                $created = $this->ci->post('created_by');
            } else {
                $created = $manager_id;
            }
        } else {
            $created = $this->ci->post('created_by');
        }

        // Input
        $arrUser = array(
            'username' => $this->ci->post('username'),
            'first_name' => $this->ci->post('first_name'),
            'last_name' => $this->ci->post('last_name'),
            'email' => $this->ci->post('email'),
            'password' => md5($this->ci->post('password')),
            'phone' => $this->ci->post('phone'),
            'status' => $this->ci->post('status'),
            'role_id' => $this->ci->post('role_id'),
            'created_by' => $created,
            'designation' => $this->ci->post('designation'),
            'created' => date('Y-m-d H:i:s', time())
        );

        // Set data
        $this->ci->form_validation->set_data($arrUser);

        // Set rules
        $this->ci->form_validation->set_rules('username', 'username', 'required');
        $this->ci->form_validation->set_rules('first_name', 'first_name', 'required');
        $this->ci->form_validation->set_rules('last_name', 'last_name', 'required');
        $this->ci->form_validation->set_rules('email', 'email', 'required|is_unique[users.email, 0]');
        $this->ci->form_validation->set_rules('password', 'password', 'required');
        $this->ci->form_validation->set_rules('phone', 'phone', 'required|numeric');
        $this->ci->form_validation->set_rules('role_id', 'role_id', 'required|numeric');
        $this->ci->form_validation->set_rules('status', 'status', 'required|numeric');

        // Code
        $arrUser += ($this->ci->post('code')) ? array('code' => $this->ci->post('code')) : array('code' => uniqid());

        // Run
        if ($this->ci->form_validation->run() == false)
            return $this->throws($this->ci->form_validation->get_errors('Users_Constants'), Restserver\Libraries\REST_Controller::HTTP_OK);

        // Add user
        $nUserID = $this->ci->lib_users->addUser($arrUser);
        if (!$nUserID)
            return $this->throws(
                            array(Users_Constants::USER_NOT_CREATED => sprintf($this->ci->lang->line('user_not_created'))), Restserver\Libraries\REST_Controller::HTTP_OK);

        return array(
            'response' => array(
                'success' => true,
                'result' => array(
                    'id' => $nUserID,
                    'message' => 'User successfully created.'
                )
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
        );
    }

    /**
     * @return string[]
     */
    public function putUser($nID) {
        // Check user exist by ID
        if (!$this->ci->lib_users->checkUserExistByID($nID))
            return $this->throws(
                            array(Users_Constants::USER_NOT_AVAIL => sprintf($this->ci->lang->line('user_not_available'))), Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Put method
        $arrUser = $this->ci->put();

        // Set data
        $this->ci->form_validation->set_data($arrUser);

        //Set rules
        $this->ci->form_validation->set_rules('username', 'username', 'required');
        $this->ci->form_validation->set_rules('first_name', 'first_name', 'required');
        $this->ci->form_validation->set_rules('last_name', 'last_name', 'required');
        $this->ci->form_validation->set_rules('phone', 'phone', 'required|numeric');
        $this->ci->form_validation->set_rules('status', 'status', 'required|numeric');
        $this->ci->form_validation->set_rules('role_id', 'role_id', 'required|numeric');
        $this->ci->form_validation->set_rules('profile_image', 'profile image', 'required');

        // Validate
        if ($this->ci->form_validation->validate() == false)
            return $this->throws($this->ci->form_validation->get_errors('Users_Constants'), Restserver\Libraries\REST_Controller::HTTP_OK);

        // Update user by ID
        $bValue = $this->ci->lib_users->updateUser($arrUser, $nID);
        if (!$bValue)
            return $this->throws(
                            array(Users_Constants::USER_NOT_UPDATED => sprintf($this->ci->lang->line('user_not_updated'))), Restserver\Libraries\REST_Controller::HTTP_OK);

        return array(
            'response' => array(
                'success' => true,
                'result' => array(
                    'id' => $nID,
                    'message' => sprintf($this->ci->lang->line('user_updated_successfully'), $nID)
                )
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
        );
    }

    /**
     * @param integer $p_nID
     * @return string[]
     */
    public function getUsers($p_nID = NULL) {
        // Set
        $nLimit = ($this->ci->get('limit')) ? (int) $this->ci->get('limit') : NULL;
        $nOffset = ($this->ci->get('offset')) ? (int) $this->ci->get('offset') : NULL;
        $nCreatedBy = ($this->ci->get('created_by')) ? $this->ci->get('created_by') : NULL;
        $strSearch = ($this->ci->get('search')) ? $this->ci->get('search') : NULL;
        $nStatus = $this->ci->get('status');
        $nStatus = (isset($nStatus)) ? $nStatus : 'all';
        $nRoleID = ($this->ci->get('role_id')) ? (int) $this->ci->get('role_id') : NULL;

        // Load Lib_Roles Libraries
        $this->ci->load->library('v1/roles/Lib_Roles');

        switch (1) {
            case ($p_nID != NULL):

                // Get user by id
                $objUser = $this->ci->lib_users->getUserByID($p_nID)->row();

                // Check empty
                if (empty($objUser))
                    return $this->throws(
                                    array(Users_Constants::USER_NOT_AVAIL => sprintf($this->ci->lang->line('user_not_available'))), Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

                // Arrange format
                $arrUser = $this->ci->lib_users->arrangeFormat(array($objUser));

                // Result
                $arrResult = array(
                    'success' => true,
                    'result' => $arrUser,
                    'totalCount' => 1
                );

                break;

            // Check limit and offset
            default:

                // User ID
                $nUserID = ($this->ci->lib_auth_tokens->getUserID()) ? $this->ci->lib_auth_tokens->getUserID() : $this->ci->lib_auth_tokens->getAuthTokenByToken($this->ci->input->server('HTTP_P_AUTH_TOKEN'))->row()->user_id;

                // Get users for pagination
                $objUsers = $this->ci->lib_users->getUsersForPagination($nLimit, $nOffset, $nCreatedBy, $strSearch, $nStatus, $nRoleID, $nUserID);

                // Check empty
                if (empty($objUsers))
                    return $this->throws(
                                    array(Users_Constants::USER_LIST_NOT_AVAIL => sprintf($this->ci->lang->line('user_list_not_available'))), Restserver\Libraries\REST_Controller::HTTP_OK);

                // Arrange format
                $arrUsers = $this->ci->lib_users->arrangeFormat($objUsers);

                // Result
                $arrResult = array(
                    'success' => true,
                    'result' => $arrUsers,
                    'totalCount' => $this->ci->lib_users->getNoOfUsers($nCreatedBy, $strSearch, $nStatus, $nRoleID, $nUserID)->count,
                );

                break;
        }

        return array(
            'response' => $arrResult,
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
        );
    }

    /**
     * @param integer $p_nID
     * @return string[]
     */
    public function deleteUser($p_nID) {
        // Check user exist by ID
        if (!$this->ci->user->checkuserExistByID($p_nID))
            return $this->throws(
                            array(Users_Constants::USER_NOT_AVAIL => sprintf($this->ci->lang->line('user_not_available'))), Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Delete user by ID
        $bValue = $this->ci->user->deleteUser($p_nID);
        if (!$bValue)
            return $this->throws(
                            array(Users_Constants::USER_NOT_DELETED => sprintf($this->ci->lang->line('user_not_deleted'))), Restserver\Libraries\REST_Controller::HTTP_OK);

        return array(
            'response' => [
                'success' => true,
                'result' => array(
                    'id' => $p_nID,
                    'message' => sprintf($this->ci->lang->line('user_deleted_successfully'), $p_nID)
                )
            ],
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
        );
    }

    /**
     * @return string[]
     */
    public function postLogin() {
        // Set
        $arrLogin = array(
            'email' => $this->ci->post('email'),
            'password' => $this->ci->post('password'),
            'redirect_uri' => $this->ci->post('redirect_uri')
        );

        // Set rules
        $this->ci->form_validation->set_rules('email', 'email', 'trim|required');
        $this->ci->form_validation->set_rules('password', 'password', 'trim|required');
        $this->ci->form_validation->set_rules('redirect_uri', 'redirect uri', '');

        // Set data
        $this->ci->form_validation->set_data($arrLogin);

        // Run validation
        if ($this->ci->form_validation->run() == false)
            return $this->throws(
                            $this->ci->form_validation->get_errors('Users_Constants'), Restserver\Libraries\REST_Controller::HTTP_OK);

        // Get user by Email
        $objUser = $this->ci->lib_users->getUserByEmail($arrLogin['email'])->row();

        // Check empty
        if (empty($objUser))
            return $this->throws(
                            array(Users_Constants::EMAIL_NOT_AVAIL => sprintf($this->ci->lang->line('user_email_not_available'))), Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Check passwords match
        if ($objUser->password != md5($arrLogin['password']))
            return $this->throws(
                            array(Users_Constants::PASSWORD_MIS_MATCH => sprintf($this->ci->lang->line('user_password_not_matched'))), Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Load Lib_Auth_Tokens Library
        $this->ci->load->library('v1/auth_tokens/Lib_Auth_Tokens');

        // Auth token
        $arrAuthToken = array(
            'token' => bin2hex(openssl_random_pseudo_bytes(16)),
            'expiry_time' => $this->ci->config->item('auth_token_expiry_time_in_seconds'),
            'user_agent_info' => $this->ci->input->server('HTTP_USER_AGENT'),
            'user_agent_origin' => $this->ci->input->server('HTTP_ORIGIN'),
            'ip' => ip2long($this->ci->input->server('HTTP_P_IP_ADDRESS')),
            'user_id' => $objUser->id
        );

        // Add auth token
        if ($this->ci->lib_auth_tokens->addAuthToken($arrAuthToken)) {
            // Set auth-token
            $this->ci->session->set_userdata('auth-token', $arrAuthToken);

            return array(
                'response' => array(
                    'success' => true,
                    'result' => array(
                        'expiry_time' => $arrAuthToken['expiry_time'] . ' ' . $this->ci->lang->line('login_duration_in_time'),
                        'token' => $arrAuthToken['token'],
                        'redirect_uri' => isset($arrLogin['redirect_uri']) ? $arrLogin['redirect_uri'] : null,
                        'message' => sprintf($this->ci->lang->line('user_logged_in_successfully'), $arrLogin['email'])
                    )
                ),
                'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
            );
        }
    }

    /**
     * @return string[]
     */
    public function getLogout() {
        // Set
        $arrLogout = array(
            'redirecturi' => $this->ci->get('redirecturi')
        );

        // Token
        $strToken = $this->ci->input->server('HTTP_P_AUTH_TOKEN');
        $strToken = isset($strToken) ? $strToken : '';

        // Get auth token by Token
        $objAuthToken = $this->ci->lib_auth_tokens->getAuthTokenByToken($strToken)->row();

        // Check empty
        if (empty($objAuthToken))
            return $this->throws(
                            array(Auth_Tokens_Constants::AUTH_TOKEN_INVALID => sprintf($this->ci->lang->line('auth_token_invalid'))), Restserver\Libraries\REST_Controller::HTTP_UNAUTHORIZED);

        // Auth token
        $arrAuthToken = array(
            'expiry_time' => 0
        );

        // Update auth token by Token
        if (!$this->ci->lib_auth_tokens->updateAuthTokenByToken($arrAuthToken, $strToken))
            return $this->throws(
                            array(Auth_Tokens_Constants::AUTH_TOKEN_NOT_UPDATED => sprintf($this->ci->lang->line('auth_token_not_updated'))), Restserver\Libraries\REST_Controller::HTTP_OK);

        // Unset
        $this->ci->session->unset_userdata('auth-token');

        // Return
        return array(
            'response' => array(
                'success' => true,
                'result' => array(
                    'message' => $this->ci->lang->line('user_logged_out_successfully'),
                    'redirect_uri' => isset($arrLogout['redirecturi']) ? $arrLogout['redirecturi'] : null
                )
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
        );
    }

    /**
     * @return string[]
     */
    public function postForgotPassword() {
        // Forgot password
        $arrForgotPassword = array(
            'email' => $this->ci->post('email'),
            //'base_url' => $this->ci->config->item('base_url'),
            'base_url' => 'jotunksa.com/facilitator-server/',
        );


        // Get user by Email
        $objUser = $this->ci->lib_users->getUserByEmail($arrForgotPassword['email'])->row();

        // Check empty
        if (empty($objUser))
            return $this->throws(
                            array(Users_Constants::EMAIL_NOT_AVAIL => sprintf($this->ci->lang->line('user_email_not_available'))), Restserver\Libraries\REST_Controller::HTTP_NOT_ACCEPTABLE);

        // Create random string to send in email
        $strToken = $this->ci->lib_users->_randomResetToken(24);

        // Set data to update user
        $arrUpdateToken = array(
            'reset_token' => $strToken
        );

        // Update user
        $this->ci->lib_users->updateUser($arrUpdateToken, $objUser->id);

        // Set
        $arrForgotPassword += array(
            'first_name' => $objUser->first_name,
            'reset_url' => 'auth/reset_password?key=' . $strToken
        );

        // Load Lib_Email
        $this->ci->load->library('v1/Lib_Email');

        // Send forgot password email
        if (!$this->ci->lib_email->send($arrForgotPassword, 'users_forgot_password', 1))
            return $this->throws(
                            array(Users_Constants::MAIL_SENDING_ERROR => 'Error in sending mail.'), Restserver\Libraries\REST_Controller::HTTP_NOT_ACCEPTABLE);

        return array(
            'response' => array(
                'success' => true,
                'result' => array(
                    'message' => 'Reset password link sent successfully.',
                    'redirect_url' => $arrForgotPassword['base_url']
                )
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
        );
    }

    /**
     * @return string[]
     */
    public function postResetPassword() {
        // Reset password
        $arrResetPassword = array(
            'reset_token' => $this->ci->post('reset_token'),
            'password' => $this->ci->post('password')
        );

        // Get user by Reset Token
        $objUser = $this->ci->user->getUserByResetToken($arrResetPassword['reset_token'])->row();

        // Check empty
        if (empty($objUser))
            return $this->throws(
                            array(Users_Constants::TOKEN_NOT_AVAIL => 'Token is invalid'), Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Check new password and confirm new password matches
        if ($objUser->password == md5($arrResetPassword['password']))
            return $this->throws(
                            array(Users_Constants::PASSWORD_ALREADY_USED => 'Password already used'), Restserver\Libraries\REST_Controller::HTTP_CONFLICT);

        // Reset password
        $arrResetPassword = array(
            'password' => md5($arrResetPassword['password']),
            'reset_token' => ''
        );

        // Update user
        if (!$this->ci->lib_users->updateUser($arrResetPassword, $objUser->id))
            return $this->throws(
                            array(Users_Constants::PASSWORD_NOT_UPDATED => 'Password not updated'), Restserver\Libraries\REST_Controller::HTTP_OK);

        return array(
            'response' => array(
                'success' => true,
                'result' => array(
                    'message' => 'Password updated.'
                )
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
        );
    }

    /**
     * @return string[]
     */
    public function getLoggedUser() {
        // Auth token
        $strToken = $this->ci->input->server('HTTP_P_AUTH_TOKEN');

        // Check empty
        if (empty($strToken))
            return $this->throws(
                            array(Auth_Tokens_Constants::AUTH_TOKEN_REQUIRED => $this->ci->lang->line('auth_token_required')), Restserver\Libraries\REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

        // Load Lib_Roles Library
        $this->ci->load->library('v1/roles/Lib_Roles');

        // Get logged user by Token
        $objLoggedUser = $this->ci->lib_users->getLoggedUserByToken($strToken)->row();

        // Check empty
        if (empty($objLoggedUser))
            return $this->throws(
                            array(Auth_Tokens_Constants::AUTH_TOKEN_NOT_AVAIL => $this->ci->lang->line('auth_token_not_available')), Restserver\Libraries\REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

        // Arrange format
        $arrLoggedUser = $this->ci->lib_users->arrangeFormat(array($objLoggedUser));

        return array(
            'response' => array(
                'success' => true,
                'result' => $arrLoggedUser
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
        );
    }

    /**
     * @param integer $p_nID
     * @param integer $p_nTaskID
     * @return string[]
     */
    public function getTasks($p_nID, $p_nTaskID = NULL) {
        // Set
        $nLimit = ($this->ci->get('limit')) ? (int) $this->ci->get('limit') : NULL;
        $nOffset = ($this->ci->get('offset')) ? (int) $this->ci->get('offset') : NULL;
        $strSearch = ($this->ci->get('search')) ? (int) $this->ci->get('search') : NULL;
        $nStatus = ($this->ci->get('status')) ? (int) $this->ci->get('status') : 'all';

        // Check user exist by ID
        if (!$this->ci->lib_users->checkUserExistByID($p_nID))
            return $this->throws(
                            array(Users_Constants::USER_NOT_AVAIL => $this->ci->lang->line('user_not_available')), Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Load Lib_Forms, Lib_Shops and Lib_Tasks Library
        $this->ci->load->library(array('v1/forms/Lib_Forms', 'v1/shops/Lib_Shops', 'v1/tasks/Lib_Tasks'));

        switch (1) {
            case ($p_nID != NULL && $p_nTaskID != NULL):

                // Get task by id
                $objTask = $this->ci->lib_tasks->getTaskByID($p_nTaskID)->row();

                // Check empty
                if (empty($objTask))
                    return $this->throws(
                                    array(Tasks_Constants::TASK_NOT_AVAIL => $this->ci->lang->line('task_not_available')), Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

                // Arrange format
                $arrTask = $this->ci->lib_tasks->arrangeFormat(array($objTask));

                // Result
                $arrResult = array(
                    'result' => $arrTask,
                    'totalCount' => 1,
                    'success' => true
                );

                break;

            default:

                // Get tasks for pagination
                $objTasks = $this->ci->lib_tasks->getTasksForPagination($p_nID, $nLimit, $nOffset, $strSearch, $nStatus);

                // Check empty
                if (empty($objTasks))
                    return $this->throws(
                                    array(Tasks_Constants::TASK_LIST_NOT_AVAIL => $this->ci->lang->line('task_list_not_available')), Restserver\Libraries\REST_Controller::HTTP_OK);

                // Arrange format
                $arrTasks = $this->ci->lib_tasks->arrangeFormat($objTasks);

                // Result
                $arrResult = array(
                    'result' => $arrTasks,
                    'totalCount' => $this->ci->lib_tasks->getNoOfTasks($p_nID, $strSearch, $nStatus)->count,
                    'success' => true
                );

                break;
        }

        return array(
            'response' => $arrResult,
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
        );
    }

    /**
     * @param integer $p_nID
     * @return string[]
     */
    public function postTask($p_nID) {
        // Check user exist by ID
        if (!$this->ci->lib_users->checkUserExistByID($p_nID))
            return $this->throws(
                            array(Users_Constants::USER_NOT_AVAIL => $this->ci->lang->line('user_not_available')), Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Load Lib_Auth_Tokens Library
        $this->ci->load->library('v1/auth_tokens/Lib_Auth_Tokens');

        // Input
        $arrTask = array(
            'user_id' => $p_nID,
            'shop_id' => $this->ci->post('shop_id'),
            'assigned_by' => ($this->ci->lib_auth_tokens->getUserID()) ? $this->ci->lib_auth_tokens->getUserID() : $this->ci->lib_auth_tokens->getAuthTokenByToken($this->ci->input->server('HTTP_P_AUTH_TOKEN'))->row()->user_id
        );

        // Forms
        $arrFormIDs = $this->ci->post('form_ids');

        // Load Lib_Tasks Library
        $this->ci->load->library('v1/tasks/Lib_Tasks');

        // Add task
        $nTaskID = $this->ci->lib_tasks->addTask($arrTask);

        // Check ID
        if (!$nTaskID)
            return $this->throws(
                            array(Tasks_Constants::TASK_NOT_CREATED => $this->ci->lang->line('task_not_created')), Restserver\Libraries\REST_Controller::HTTP_CREATED);

        // Task forms
        $arrTaskForms = array();

        // Loop
        foreach ($arrFormIDs as $nKey => $nFormID) {
            $arrTaskForms[] = array(
                'form_id' => $nFormID,
                'task_id' => $nTaskID
            );
        }

        // Add task forms
        if ($this->ci->lib_tasks->addTaskForms($arrTaskForms))
            return array(
                'response' => array(
                    'result' => array(
                        'id' => $nTaskID,
                        'message' => sprintf($this->ci->lang->line('task_created_successfully'), $nTaskID)
                    ),
                    'success' => true,
                ),
                'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
            );
    }

    /**
     * @param integer $p_nID
     * @param integer $p_nTaskID
     * @return string[]
     */
    public function putTask($p_nID, $p_nTaskID) {
        // Check user exist by ID
        if (!$this->ci->lib_users->checkUserExistByID($p_nID))
            return $this->throws(
                            array(Users_Constants::USER_NOT_AVAIL => $this->ci->lang->line('user_not_available')), Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Load Lib_Tasks Library
        $this->ci->load->library('v1/tasks/Lib_Tasks');

        // Check task exist by ID
        if (!$this->ci->lib_tasks->checkTaskExistByID($p_nTaskID))
            return $this->throws(
                            array(Tasks_Constants::TASK_NOT_AVAIL => $this->ci->lang->line('task_not_available')), Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Input
        $arrTask = array(
            'user_id' => $p_nID,
            'shop_id' => $this->ci->put('shop_id'),
            'assigned_by' => ($this->ci->lib_auth_tokens->getUserID()) ? $this->ci->lib_auth_tokens->getUserID() : $this->ci->lib_auth_tokens->getAuthTokenByToken($this->ci->input->server('HTTP_P_AUTH_TOKEN'))->row()->user_id
        );

        // Forms
        $arrFormIDs = $this->ci->put('form_ids');

        // Update task by ID
        $bValue = $this->ci->lib_tasks->updateTask($arrTask, $p_nTaskID);

        // Check boolean
        if (!$bValue)
            return $this->throws(
                            array(Tasks_Constants::TASK_NOT_UPDATED => $this->ci->lang->line('task_not_updated')), Restserver\Libraries\REST_Controller::HTTP_OK);

        // Check empty
        if (empty($arrFormIDs))
            return array(
                'response' => array(
                    'success' => true,
                    'result' => array(
                        'id' => $p_nTaskID,
                        'message' => sprintf($this->ci->lang->line('task_updated_successfully'), $p_nTaskID)
                    )
                ),
                'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
            );

        // Delete task forms by task ID
        $this->ci->lib_tasks->deleteTaskFormsByTaskID($p_nTaskID);

        // Task forms
        $arrTaskForms = array();

        // Loop
        foreach ($arrFormIDs as $nKey => $nFormID)
            $arrTaskForms[] = array(
                'form_id' => $nFormID,
                'task_id' => $p_nTaskID
            );

        // Add task forms
        if ($this->ci->lib_tasks->addTaskForms($arrTaskForms))
            return array(
                'response' => array(
                    'success' => true,
                    'result' => array(
                        'id' => $p_nTaskID,
                        'message' => sprintf($this->ci->lang->line('task_updated_successfully'), $p_nTaskID)
                    )
                ),
                'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
            );
    }

    public function getonlinedata() {

        $userid = $this->ci->put('userid');
        $state = $this->ci->put('state');
        $lattitude = $this->ci->put('lattitude');
        $longitude = $this->ci->put('longitude');
        if ($userid!=NULL && $state!=NULL && $lattitude!=NULL && $longitude!=NULL) {
            $arrUser = array(
                "online_state" => $state,
                "lattitude" => $lattitude,
                "longitude" => $longitude
            );
            $nUserID = $this->ci->lib_users->update_user_geodata($arrUser, $userid);
            if ($nUserID) {
                return array(
                    'response' => array(
                        'success' => true,
                        'result' => array(
                            'message' => "Updated Successfully"
                        )
                    ),
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
                );
            } else {
                return array(
                    'response' => array(
                        'success' => false,
                        'result' => array(
                            'message' => "Some thing went wrong"
                        )
                    ),
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
                );
            }
        } else {
            return array(
                'response' => array(
                    'success' => false,
                    'result' => array(
                        'message' => "Recheck Parameters"
                    )
                ),
                'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
            );
        }
    }

    /**
     * @param integer $p_nID
     * @param integer $p_nFormID
     * @return string[]
     */
    public function getForms($p_nID = NULL, $p_nFormID = NULL) {
        // Check user exist by ID
        if (!$this->ci->lib_users->checkUserExistByID($p_nID))
            return $this->throws(
                            array(Users_Constants::USER_NOT_AVAIL => $this->ci->lang->line('user_not_available')), Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Load Lib_Roles, Lib_Forms, Lib_Shops, Lib_Tasks and Lib_Task_Forms Libraries
        $this->ci->load->library(array('v1/roles/Lib_Roles', 'v1/forms/Lib_Forms', 'v1/shops/Lib_Shops', 'v1/tasks/Lib_Tasks',
            'v1/task_forms/Lib_Task_Forms'));

        switch (1) {
            case ($p_nFormID != NULL):

                // Get form by ID
                $objForm = $this->ci->lib_forms->getFormByID($p_nFormID)->row();

                // Check empty
                if (empty($objForm))
                    return $this->throws(
                                    array(Forms_Constants::FORM_NOT_AVAIL => $this->ci->lang->line('form_not_available')), Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

                // Get user by ID
                $objUser = $this->ci->lib_users->getUserByID($p_nID)->row();

                // Arrange format
                $arrUser = $this->ci->lib_users->arrangeFormat(array($objUser));

                // Set form
                $arrUser[0]['form'] = $objForm;

                // Get task forms by form and user ID
                $objShops = $this->ci->lib_task_forms->getTaskFormsByFormAndUserID($p_nFormID, $p_nID)->result();


                // Arrange format
                $arrUser[0]['shops'] = (!empty($objShops)) ? $this->ci->lib_task_forms->arrangeShopsFormat($objShops) : NULL;

                // Result
                $arrResult = array(
                    'result' => $arrUser,
                    'totalCount' => 1,
                    'success' => true
                );

                break;

            default:

                // Get user by ID
                $objUser = $this->ci->lib_users->getUserByID($p_nID)->row();

                // Arrange format
                $arrUser = $this->ci->lib_users->arrangeFormat(array($objUser));

                // Get task forms by user ID
                $objTaskForms = $this->ci->lib_task_forms->getTaskFormsByUserID($p_nID)->result();

                // Arrange format
                $arrUser[0]['forms'] = (!empty($objTaskForms)) ? $this->ci->lib_task_forms->arrangeFormsFormat($objTaskForms) : NULL;

                // Result
                $arrResult = array(
                    'result' => $arrUser,
                    'totalCount' => 1,
                    'success' => true
                );

                break;
        }

        return array(
            'response' => $arrResult,
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
        );
    }

}

/* End of file lib_rest_users.php */
/* Location: ./application/libraries/v1/users/lib_rest_users.php */