<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lib_Api
{
	public $lang;

	/**
	 * __construct method
	 */
	function __construct() 
	{
		// CI
		$this->ci = &get_instance();

		$this->lang = 'english';
	}

	/**
	 * throws method
	 *
	 * @param string[] $p_arrMessages
	 * @param integer $p_nHTTPCode
	 * @return string[]
	 */
	public function throws($p_arrMessages, $p_nHTTPCode = 500)
	{
		$arrErrors = array();

		// Is array
		if(is_array($p_arrMessages))
		{
			foreach($p_arrMessages as $strCode => $arrMessage)
			{
				if(is_string($arrMessage))
					$arrErrors[] = array(
						'code' => $strCode,
						'message' => $arrMessage
					);

				if(is_array($arrMessage))
					$arrErrors[] = $arrMessage;
			}
		}
		else
		{
			$arrErrors[] = array(
				'message' => $p_arrMessages
			);
		}

		return array(
			'response' => array(
				'success' => false,
				'result' => array(
					'errors' => $arrErrors
				)
			),
			'HTTPCode' => $p_nHTTPCode
		);
	}
}

/* End of file lib_api.php */
/* Location: ./application/libraries/v1/lib_api.php */