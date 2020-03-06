<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Task_forms extends Rest_Controller
{
    /**
     * __construct method
     */
    function __construct()
    {
        parent::__construct();

        // Load Lib_Rest_Task_Forms library
        $this->load->library('v1/task_forms/Lib_Rest_Task_Forms');
    }

    /**
     * Create signature
     *
     * Create a signature for a given data
     *
     * @uri v1/login
     * @httpmethod POST
     * @param integer $nID
     * @return object
     */
    public function signature_post($nID)
    {
        // Post login
        return $this->lib_rest_task_forms->postSignature($nID);
    }
}

/* End of file task_forms.php */
/* Location: ./application/controllers/v1/task_forms.php */