<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_managementm extends CI_Model {
    
/**
 * construct method
 */    
    public function __construct() {
        
        $this->_table = $this->config->item('sales_table');
    }
}