<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_Sales
{
    public $strFlashMessage;

    /**
     * __construct
     */
    function __construct()
    {
        $this->ci = &get_instance();

        // Load sales config
        $this->ci->load->config('default/sales');
    }
}

/* End of file Lib_Sales.php */
/* Location: ./application/libraries/Lib_Sales.php */