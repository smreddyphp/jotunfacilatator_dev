<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	/**
	 * __construct method
	 */
	function __construct()
	{
		parent::__construct();
		
		// Set API
		$this->login_api = 'access/login';
		$this->me_api = 'access/me';
		$this->logout_api = 'access/logout';

		// Load Lib_Auth Library
		$this->load->library('Lib_Auth');
	}

	/**
	 * login method
	 *
	 * @return void
	 */
	function login()
	{
	    
		// Check ajax request
		if (!$this->input->is_ajax_request())
		{
			// Check user is logged in
			if($this->lib_auth->isLoggedIn())
				redirect(base_url());

			return $this->load->view($this->config->item('template_view'));
		}

		// Check user is logged in
		if($this->lib_auth->isLoggedIn())
		{
			// Login input data
			$arrLogin = array(
				'success' => false,
				'result' => array(
					'errors' => array(
						array(
							'message' => 'User is already logged in.'
						)
					),
					'redirect_to' => base_url()
				)
			);

			echo json_encode($arrLogin);
			return;
		}

		// Login input data
		$arrLogin = array(
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		);

		// Login
		$objResult = $this->lib_auth->login($arrLogin);
		echo json_encode($objResult);
		return;
	}

	/**
	 * logout method
	 *
	 * @param integer $bForce
	 * @return void
	 */
	function logout($bForce = 0)
	{
		// Logout
		if($this->lib_auth->logout($bForce))
			redirect($this->config->item('auth_login_uri')); // Redirect to login
	}

	/**
	 * register method
	 *
	 * @return void
	 */
	function register()
	{
		// Load Admin_Roles library
		$this->load->library('Admin_Roles');

		// Get roles list
		$data['roles'] = $this->admin_roles->get_roles_list();

		// Set form validation rules
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_email_check');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|max_length[20]');
		$this->form_validation->set_rules('confirm_password', 'confirm password', 'trim|matches[password]');
		$this->form_validation->set_rules('role_id', 'role', 'trim|required');
		
		// Check validation run
		if($this->form_validation->run() == false)
			return $this->load->view($this->config->item('login_template_view'), $data);

		// Input data
		$user = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'role_id' => $this->input->post('role_id'),
		);

		// Register user
		if($this->dx_auth->register($user))
		{
			// Set success message accordingly
			if ($this->dx_auth->email_activation)
			{
				$this->session->set_flashdata('flash_success', 'The user successfully registered. Check email address to activate account.');
			}
			else
			{
				$this->session->set_flashdata('flash_success', 'The user successfully registered.');
			}
			
			// Redirect to register page
			redirect($this->config->item('auth_users_uri'));
		} 

		$data['error'] = 'The user could not be registered';

		// Load registration page
		$this->load->view($this->config->item('login_template_view'), $data);
	}
}