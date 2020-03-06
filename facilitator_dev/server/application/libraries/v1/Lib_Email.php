<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lib_Email 
{
	/**
	 * __construct method
	 */
	function __construct() 
	{
		// CI
		$this->ci = &get_instance();

		// Load email config
		$this->ci->load->config('v1/email');
	}

	/**
	 * send method
	 *
	 * @param array $p_arrDetails, 
	 * @param string $p_strForm
	 * @param integer $p_nType
	 * @param boolean $p_bAttachment
	 * @return boolean
	 */
	public function send($p_arrDetails, $p_strForm, $p_nType, $p_bAttachment = false) 
	{
	    //print_r($p_arrDetails);
	    
		// Load Email Library
		$this->ci->load->library('email');
		
		// Object
		$objEmail = $this->ci->email;
		$objEmail->clear(true);
		$objEmail->initialize($this->ci->config->item('email'));
		$objEmail->set_newline("\r\n");

		switch($p_nType) 
		{
			case 1:

				$strFromEmail = $this->ci->config->item('noreply_email');
				$strFromName = $this->ci->config->item('admin_email_name');
				$strTo = $p_arrDetails['email'];
                $strSubject = $this->ci->config->item($p_strForm.'_user_subject');
				$strView = $this->ci->config->item($p_strForm.'_user_email_view');
				
				break;

			case 2:

				$strFromEmail = $this->ci->config->item('noreply_email');
				$strFromName = $this->ci->config->item('admin_email_name');
				$strTo = $this->ci->config->item($p_strForm.'_email');
                $strSubject = $this->ci->config->item($p_strForm.'_support_subject');
				$strView = $this->ci->config->item($p_strForm.'_support_email_view');
				
				break;
		}

		$objEmail->from($strFromEmail, $strFromName);
		$objEmail->to($strTo);
		$objEmail->subject($strSubject);

		// Message
		$strMessage = $this->ci->load->view($strView, $p_arrDetails, true);
		$objEmail->message($strMessage);

		// Attachments
		if($p_bAttachment) 
		{
			// Check is_array
			if(is_array($p_arrDetails['files'])) 
			{
				foreach($p_arrDetails['files'] as $file)
					$objEmail->attach($file);
			} 
			else 
			{
				$objEmail->attach($p_arrDetails['files']);
			}
		}

		return $objEmail->send();
	
	}
}

/* End of file lib_email.php */
/* Location: ./application/libraries/v1/lib_email.php */