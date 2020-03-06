<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lib_Common 
{
	public $lang;

	/**
	 * __construct method
	 *
	 * @return void
	 */
	function __construct() 
	{
		// CI
		$this->ci = &get_instance();

		$this->lang = 'english';
	}
}

/* End of file lib_common.php */
/* Location: ./application/libraries/v1/lib_common.php */