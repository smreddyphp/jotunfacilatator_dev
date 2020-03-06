<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Services extends REST_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('v1/services/Lib_Rest_Services');
        //$this->load->model();
    }

    public function get_targets_post()
    {
        return $this->lib_rest_services->user_targets();
    }

    public function get_dealer_shops_post()
    {
        return $this->lib_rest_services->dealer_shops();
    }

    public function get_shop_tasks_post()
    {
        return $this->lib_rest_services->shop_tasks();
    }

    public function get_dealer_targets_post()
    {
        return $this->lib_rest_services->dealer_targets();
    }

    public function get_dealer_product_targets_post()
    {
        return $this->lib_rest_services->dealer_product_targets();
    }

    public function get_products_get()
    {
        return $this->lib_rest_services->products();
    }

    public function get_sell_up_products_get()
    {
        return $this->lib_rest_services->sell_up_products();
    }

    public function task_form_data_post()
    {
        return $this->lib_rest_services->data_submit_task_forms();
    }

    public function task_form_two_post()
    {
        return $this->lib_rest_services->data_submit_task_forms_two();
    }

    public function task_form_three_post()
    {
        return $this->lib_rest_services->data_submit_task_forms_three();
    }

    public function task_form_three_images_post()
    {
        return $this->lib_rest_services->data_submit_task_forms_three_images();
    }

    public function task_form_four_post()
    {
        return $this->lib_rest_services->data_submit_task_forms_four();
    }
    public function task_form_five_post()
    {
        return $this->lib_rest_services->data_submit_task_forms_five();
    }

    public function get_task_forms_data_post()
    {
        return $this->lib_rest_services->get_task_form_submit_data();
    }

    #Updated Forms 4/03/2020 By Mahendar Reddy

    public function shop_details_get()
    {
        return $this->lib_rest_services->shop_data();
    }

    public function get_form_data_post()
    {
        return $this->lib_rest_services->get_form_data();
    }

    public function shoping_expirence_post()
    {
        return $this->lib_rest_services->form_one();
    }

    public function shop_evaluation_post()
    {
        return $this->lib_rest_services->form_two();
    }

    public function shop_information_post()
    {
        return $this->lib_rest_services->form_three();
    }

    public function shop_profile_post()
    {
        return $this->lib_rest_services->form_four();
    }

}
