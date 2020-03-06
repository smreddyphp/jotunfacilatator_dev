<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_Rest_Services extends Lib_Api
{
    function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->library('v1/services/Lib_Services');
        $this->ci->load->model('v1/services_m');
        date_default_timezone_set('Asia/Riyadh');
    }

    public function user_targets()
    {
        $duration = $this->ci->post('duration');
        $user_id = $this->ci->post("user_id");
        if(is_numeric($user_id) != "" && is_numeric($duration) != "")
        {
            $result =  $this->ci->lib_services->get_targets($duration,$user_id);
            if($result)
            {
                $arrResult = array(
                        'success' => true,
                        'targets' =>$result
                    );

                return array(
                    'response' => $arrResult,
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                );
            }else{
                return $this->throws(
                        array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>"No Data Found"),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
            }
        }
        else
        {
             return $this->throws(
                    array(Services_Constants::SERVICES_PARAM_MISSING_ =>"Parameters Missing"),
                    Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }


    }

    public function dealer_shops()
    {
      $user_id = $this->ci->post('dealer_id');
      if(is_numeric($user_id) != "")
      {
            $result =  $this->ci->lib_services->get_dealer_shops_data($user_id);
            $userdata =  $this->ci->lib_services->get_user($user_id);
            if($result)
            {
                $arrResult = array(
                        'success' => true,
                        'dealer_data' => $userdata,
                        'shops' =>$result
                    );

                return array(
                    'response' => $arrResult,
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                );

            }else{
                return $this->throws(
                        array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>"No Data Found"),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
            }
      }
      else
      {
          return $this->throws(
                    array(Services_Constants::SERVICES_PARAM_MISSING_ =>"Parameters Missing"),
                    Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
      }

    }

    public function shop_tasks()
    {
      $shop_id = $this->ci->post('id');
      $user_id = $this->ci->post('user_id');
      if(is_numeric($shop_id) != "")
      {
            $current =  $this->ci->lib_services->get_shop_tasks($user_id,$shop_id,$status="1,2");
            if(empty($current)){
              $this->ci->lib_services->add_new_task_default_form($user_id,$shop_id);
            }
            $current =  $this->ci->lib_services->get_shop_tasks($user_id,$shop_id,$status="1,2");
            $complete =  $this->ci->lib_services->get_shop_tasks($user_id,$shop_id,$status=3);
            $shopdata =  $this->ci->lib_services->get_shop($shop_id);
            $forms =  $this->ci->lib_services->forms();
            if($shopdata)
            {
                $arrResult = array(
                        'success' => true,
                        'shop_data' => $shopdata,
                        'current_tasks' =>$current,
                        'completed_tasks' =>$complete,
                        'forms' =>$forms
                    );

                return array(
                    'response' => $arrResult,
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                );
            }else{
                return $this->throws(
                        array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>"No Data Found"),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
            }
      }
      else
      {
          return $this->throws(
                    array(Services_Constants::SERVICES_PARAM_MISSING_ =>"Parameters Missing"),
                    Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
      }

    }


    public function dealer_targets()
    {
          $dealer_id = $this->ci->post('dealer_id');
          if(is_numeric($dealer_id) != "")
          {
               $month = date('m');
               $prev = date('m', strtotime('-1 month'));
               $targets = $this->ci->services_m->dealer_monthly_current_targets($dealer_id);
               $yearly_targets = $this->ci->services_m->dealer_yearly_targets($dealer_id);

                if($targets)
                {
                    $arrResult = array(
                            'success' => true,
                            'targets' => $targets,
                            'yearly_targets' => $yearly_targets,
                        );

                    return array(
                        'response' => $arrResult,
                        'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                    );
                }
                else
                {
                    return $this->throws(
                            array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>"No Data Found"),
                            Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
                }
          }
          else
          {
              return $this->throws(
                        array(Services_Constants::SERVICES_PARAM_MISSING_ =>"Parameters Missing"),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
          }

    }

    public function dealer_product_targets()
    {
       $dealer_id = $this->ci->post('dealer_id');
       $month = $this->ci->post('month');
      if(is_numeric($dealer_id) != "" && is_numeric($month) != "")
      {
            $product_targets = $this->ci->services_m->dealer_product_targets($dealer_id,$month);
            if($product_targets)
            {
                $arrResult = array(
                        'success' => true,
                        'product_targets' => $product_targets
                    );

                return array(
                    'response' => $arrResult,
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                );
            }
            else
            {
                return $this->throws(
                        array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>"No Data Found"),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
            }
      }
      else
      {
          return $this->throws(
                    array(Services_Constants::SERVICES_PARAM_MISSING_ =>"Parameters Missing"),
                    Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
      }

    }

    public function data_submit_task_forms()
    {
        $form_data = $this->ci->post('form_data');
        $table="task_form_shop_information";
        if(!empty($form_data))
        {
              foreach($form_data as $a)
              {
                    $data = array(
                           'task_form_id' => $a['task_form_id'],
                           'sales_man_staff' => $a['sales_man_staff'],
                           'nationality' => $a['nationality'],
                           'phone_no'=>$a['phone_no'],
                           'experience' =>$a['experience'],
                           'status' =>$a['status'],
                           'shop_type' =>$a['shop_type'],
                           'no_openings' =>$a['no_openings'],
                           'new_concept' =>$a['new_concept'],
                           'flag_ship_store' =>$a['flag_ship_store'],
                           'created' =>date('Y-m-d H:i:s'),
                        );
                    $result = $this->ci->lib_services->add_form_data($table,$data);
                }

             $this->ci->services_m->update_task_form_status($form_data[0]['task_form_id'],$status='2');
             //$this->ci->services_m->update_task_form_status($data['task_form_id'],$status='2');
            $result = $this->ci->services_m->check_tasks_competion_status($form_data[0]['task_form_id']);
            if($result==0)
            {
               $this->ci->services_m->update_task_forms_status($form_data[0]['task_form_id']);
            }

                $arrResult = array(
                    'success' => true,
                    'message' =>"Successfully Submitted",
                 );
                 return array(
                'response' => $arrResult,
                'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
            );

        }
        else
        {
            return $this->throws(
                        array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>"Empty Data Given"),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function data_submit_task_forms_two()
    {

        $config['upload_path'] 			= 'assets/media';
		$config['allowed_types']	 	= '*';
		$config['max_size'] 			= 1024 * 80;
		$config['file_name'] 			= time();

		$this->ci->load->library('upload',$config);
		$this->ci->upload->initialize($config);

		if($this->ci->upload->do_upload("image"))
		{
			$image['file_name'] = $this->ci->upload->data();
			$file['name'] = $image['file_name']['file_name'];
			$file['task_form_id'] = $this->ci->post('task_form_id');
			if($file['task_form_id'] !="")
			{
			    $this->ci->lib_services->add_form_data("task_form_images",$file);
			}
		}

        $data['task_form_id'] = $this->ci->post('task_form_id');
        $data['review_date'] = $this->ci->post('review_date');
        $data['review_done_with'] = $this->ci->post('review_done_with');
        $data['date_of_next_review'] = $this->ci->post('date_of_next_review');
        $data['agreed_actions'] = $this->ci->post('agreed_actions');
        $data['product'] = $this->ci->post('product');
        $data['sell_up_product'] = $this->ci->post('sell_up_product');
        $data['incremental_sales'] = $this->ci->post('incremental_sales');
        $data['product_target'] = $this->ci->post('product_target');
        $data['created'] = date('Y-m-d H:i:s');
        $table="task_form_dealer_profitability_program";
        if($data['task_form_id'] != "" && $data['review_date'] != "" && $data['review_done_with'] != "" && $data['date_of_next_review'] != "" && $data['agreed_actions'] != "" && $data['product'] != "" && $data['sell_up_product'] != "" && $data['incremental_sales'] != "" && $data['product_target'] != "")
        {
            $this->ci->lib_services->add_form_data($table,$data);
            $this->ci->services_m->update_task_form_status($data['task_form_id'],$status='2');
            $result = $this->ci->services_m->check_tasks_competion_status($data['task_form_id']);
            if($result==0)
            {
               $this->ci->services_m->update_task_forms_status($data['task_form_id']);
            }
            $arrResult = array(
                    'success' => true,
                    'message' =>"Successfully Submitted",
                 );
                     return array(
                    'response' => $arrResult,
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                );
        }
        else
        {
            return $this->throws(
                        array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>"Required Fields can not be Empty"),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function data_submit_task_forms_three()
    {
        $form_data = $this->ci->post('form_data');

        $table="task_form_three";


        if(!empty($form_data))
        {

            foreach($form_data as $data)
            {
                //print_r($form_data);exit;
                $data['created'] = date('Y-m-d H:i:s');
                $this->ci->lib_services->add_form_data($table,$data);
            }
            $this->ci->services_m->update_task_form_status($form_data[0]['task_form_id'],$status='2');
            $result = $this->ci->services_m->check_tasks_competion_status($form_data[0]['task_form_id']);
            if($result==0)
            {
               $this->ci->services_m->update_task_forms_status($form_data[0]['task_form_id']);
            }
            $arrResult = array(
                    'success' => true,
                    'message' =>"Successfully Submitted",
                 );
                     return array(
                    'response' => $arrResult,
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                );
        }
        else
        {
            return $this->throws(
                        array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>"Required Fields can not be Empty"),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function data_submit_task_forms_three_images()
    {
        $task_form_id = $this->ci->post('task_form_id');
        $table = "task_form_three";
        //print_r($_FILES);exit;

        $flags = [
                    'sign_board'  => '19',
                    'shop_floor'  => '20',
                    'reception'   => '21',
                    'color_floor' => '22',
                    'multi_color' => '23',
                    'floor'       => '24',
                    'floor1'      => '25',
                    'additional'  => '26',
                    'additional1'  => '27',
                 ] ;

                 /*foreach($flags as $key=>$value)
                 {
                     if($_FILES[$value]['name'] == "")
                     {
                         return $this->throws(
                        array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>"Required Fields can not be Empty"),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
                     }
                 }*/


        foreach($flags as $key=>$value)
        {
            //echo $_FILES[$value]['name']; exit;

            if (!empty($_FILES[$value]['name']))
       		{
                $config['upload_path']   = 'assets/media/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';

                $this->ci->load->library('upload', $config);
                $this->ci->upload->initialize($config);

                if ($this->ci->upload->do_upload($value))
                {
                    $image = $this->ci->upload->data();

        		    //print_r($image);exit;

        			$file['task_form_id'] = $task_form_id;
        			$file['field_id'] = $value;
        			$file['value'] = $image['file_name'];

        		    $this->ci->lib_services->add_form_data($table,$file);
        		    unset($file);

                }
                else
                {
                    print_r($this->ci->display_errors());exit;
                }
            }

        }

        $arrResult = array(
            'success' => true,
            'message' =>"Successfully Submitted",
         );
             return array(
            'response' => $arrResult,
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
        );
    }



    public function data_submit_task_forms_four()
    {
        $data['dealer_name'] = $this->ci->post('dealer_name');
        $data['occupation'] = $this->ci->post('occupation');
        $data['phone_number'] = $this->ci->post('phone_number');
        $data['email'] = $this->ci->post('email');
        $data['home_town'] = $this->ci->post('home_town');
        $data['address'] = $this->ci->post('address');
        $data['task_form_id'] = $this->ci->post('task_form_id');
        $table="task_form_four";

        if($data['dealer_name'] != "" && $data['occupation'] != "" && $data['phone_number'] != "" && $data['email'] != "" && $data['home_town'] != "" && $data['address'] != "" && $data['task_form_id'] != "")
        {
          $data['date'] = date('Y-m-d H:i:s');
            $this->ci->lib_services->add_form_data($table,$data);
            $this->ci->services_m->update_task_form_status($data['task_form_id'],$status='2');
            $result = $this->ci->services_m->check_tasks_competion_status($data['task_form_id']);
            if($result==0)
            {
               $this->ci->services_m->update_task_forms_status($data['task_form_id']);
            }

            $arrResult = array(
                    'success' => true,
                    'message' =>"Successfully Submitted",
                 );
                     return array(
                    'response' => $arrResult,
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                );
        }
        else
        {
            return $this->throws(
                        array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>"Required Fields can not be Empty"),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function data_submit_task_forms_five()
    {
        $error = "";
        if($this->ci->post('sales_visit')!=""){
          $data['sales_visit'] = $this->ci->post('sales_visit');
        } else{
          //$error ="Sales visit date is required";
          $error ="Required Fields can not be Empty";
        }
        if($this->ci->post('posm')!=""){
          $data['posm'] = $this->ci->post('posm');
        } else{
          $error ="Required Fields can not be Empty";
        }

        if($this->ci->post('posm')=='No' && $this->ci->post('missing')==''){
          $error ="Required Fields can not be Empty";
        } else{
          $data['missing'] = ($this->ci->post('missing'))?$this->ci->post('missing'):"";
        }
        if($this->ci->post('color_chips')!=''){
          $data['color_chips'] = $this->ci->post('color_chips');
        } else{
          $error ="Required Fields can not be Empty";
        }
        if($this->ci->post('led_playing')!=""){
          $data['led_playing'] = $this->ci->post('led_playing');
        } else{
          $error ="Required Fields can not be Empty";
        }
        if($this->ci->post('old_campaign')!=""){
          $data['old_campaign'] = $this->ci->post('old_campaign');
        } else{
          $error ="Required Fields can not be Empty";
        }
        if($this->ci->post('get_removed')!=""){
          $data['get_removed'] = $this->ci->post('get_removed');
        } else{
          $error ="Required Fields can not be Empty";
        }
        if($this->ci->post('explain_campaigns')!=""){
            $data['explain_campaigns'] = $this->ci->post('explain_campaigns');
        } else{
          $error ="Required Fields can not be Empty";
        }
        if($this->ci->post('sales_target')!=""){
          $data['sales_target'] = $this->ci->post('sales_target');
        }else{
          $error ="Required Fields can not be Empty";
        }
        if($this->ci->post('sales_forecast')!=""){
          $data['sales_forecast'] = $this->ci->post('sales_forecast');
        } else{
          $error ="Required Fields can not be Empty";
        }
        if($this->ci->post('collection_forecast')!=""){
          $data['collection_forecast'] = $this->ci->post('collection_forecast');
        } else{
          $error ="Required Fields can not be Empty";
        }
        if($this->ci->post('jotun_way_completed')!=""){
          $data['jotun_way_completed'] = $this->ci->post('jotun_way_completed');
        } else{
          $error ="Required Fields can not be Empty";
        }
        if($this->ci->post('jotun_way_completed')=='No' && $this->ci->post('jotun_way_date')==""){
          $error ="Required Fields can not be Empty";
        } else{
          $data['jotun_way_date'] = ($this->ci->post('jotun_way_date'))?$this->ci->post('jotun_way_date'):"";
        }
        if($this->ci->post('roleplay')!=""){
          $data['roleplay'] = $this->ci->post('roleplay');
        } else{
          $error ="Required Fields can not be Empty";
        }
        if($this->ci->post('task_form_id')!=""){
          $data['task_form_id'] = $this->ci->post('task_form_id');
        }
        else{
          $error ="Required Fields can not be Empty";
        }

        $table="task_form_five";
        end:
        if ($error !="" ) {
            //$result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
            //$this->response($result,REST_Controller::HTTP_OK);
            return $this->throws(
                        array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>"Required Fields can not be Empty"),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }
        //if($data['sales_visit'] != "" && $data['posm'] != "" && $data['missing'] != "" && $data['color_chips'] != "" && $data['led_playing'] != "" && $data['old_campaign'] != "" && $data['explain_campaigns'] != "" && $data['sales_target'] != "" && $data['sales_forecast'] != "" && $data['collection_forecast'] != "" && $data['jotun_way_completed'] != "" && $data['jotun_way_date'] != "" && $data['roleplay'] != "" && $data['get_removed'] !="" && $data['task_form_id'])
        else {
            $data['created_on'] = date('Y-m-d H:i:s');
             $this->ci->lib_services->add_form_data($table,$data);
             //$this->db->insert($table,$data);
             //echo $id = $this->db->insert_id;
            $this->ci->services_m->update_task_form_status($data['task_form_id'],$status='2');
            $result = $this->ci->services_m->check_tasks_competion_status($data['task_form_id']);
            if($result==0)
            {
               $this->ci->services_m->update_task_forms_status($data['task_form_id']);
            }
            // if($id!=""){
            //   $res = $this->db->get_where('task_form_five',array('id'=>$id))->row_array();
            // }

            $arrResult = array(
                    'success' => true,
                    'message' =>"Successfully Submitted",
                    //'data'    => $res,
                 );
                     return array(
                    'response' => $arrResult,
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                );
        }
        // else
        // {
        //     return $this->throws(
        //                 array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>"Required Fields can not be Empty"),
        //                 Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        // }
    }

    public function products()
    {
           $product_targets = $this->ci->services_m->get_products("products");
            if($product_targets)
            {
                $arrResult = array(
                        'success' => true,
                        'products' => $product_targets
                    );

                return array(
                    'response' => $arrResult,
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                );
            }
            else
            {
                return $this->throws(
                        array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>"No Data Found"),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
            }
    }

     public function sell_up_products()
     {
           $product_targets = $this->ci->services_m->get_products("sell_up_products");
            if($product_targets)
            {
                $arrResult = array(
                        'success' => true,
                        'sell_up_products' => $product_targets
                    );

                return array(
                    'response' => $arrResult,
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                );
            }
            else
            {
                return $this->throws(
                        array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>"No Data Found"),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
            }
     }

    public function get_task_form_submit_data()
    {
        $task_form_id = $this->ci->post("task_form_id");
        $form_id = $this->ci->post("form_id");
        if($task_form_id != "")
        {
             $form_data = $this->ci->services_m->get_task_form_data($task_form_id);
            if($form_data)
            {
                $arrResult = array(
                        'success' => true,
                        'form_data' => $form_data
                    );

                return array(
                    'response' => $arrResult,
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                );
            }
            else
            {
                return $this->throws(
                        array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>"No Data Found"),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
            }
        }
        else
        {
            return $this->throws(
                    array(Services_Constants::SERVICES_PARAM_MISSING_ =>"Parameters Missing"),
                    Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }

    }

    //Updated Forms 04/03/2020

    public function shop_data()
    {
        $shop_id = $this->ci->get("shop_id");
        if(@$shop_id != "")
        {
             $shopdata = $this->ci->services_m->get_shop_data($shop_id);
             $forms = $this->ci->lib_services->forms();
            if($shopdata)
            {
                $arrResult = array(
                        'success' => true,
                        'shop_data' => $shopdata,
                        'forms' => $forms
                    );
                return array(
                    'response' => $arrResult,
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                );
            }
            else
            {
                return $this->throws(
                        array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>"No Data Found"),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
            }
        }
        else
        {
            return $this->throws(
                    array(Services_Constants::SERVICES_PARAM_MISSING_ =>"Shop Id Missing"),
                    Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function form_one()
    {
        $error = "";
        if($this->ci->post('emp_id')!=""){
          $data['emp_id'] = $this->ci->post('emp_id');
        }else{
          $error ="Employee Id can not be Empty";
        }

        if($this->ci->post('shop_id')!=""){
          $data['shop_id'] = $this->ci->post('shop_id');
        } else{
          $error ="Shop Id can not be Empty";
        }

        if($this->ci->post('date')!=''){
          $data['date'] = $this->ci->post('date');
        } else{
          $error ="Date can not be Empty";
        }

        if($this->ci->post('time')!=""){
          $data['time'] = $this->ci->post('time');
        } else{
          $error ="Time can not be Empty";
        }

        if($this->ci->post('working_hours')!=""){
          $data['working_hours'] = $this->ci->post('working_hours');
        } else{
          $error ="Working Hours can not be Empty";
        }

        if($this->ci->post('accetable_flooring')!=""){
          $data['accetable_flooring'] = $this->ci->post('accetable_flooring');
        }/*else{
          $error ="Accetable Flooring can not be Empty";
        }
*/
        if($this->ci->post('lights_working')!=""){
            $data['lights_working'] = $this->ci->post('lights_working');
        }/* else{
          $error ="Light Working can not be Empty";
        }*/

        if($this->ci->post('wallsclean_painting')!=""){
          $data['wallsclean_painting'] = $this->ci->post('wallsclean_painting');
        }/*else{
          $error ="Wellsclean Painting can not be Empty";
        }*/

        if($this->ci->post('working_air_condition')!=""){
          $data['working_air_condition'] = $this->ci->post('working_air_condition');
        }/*else{
          $error ="Work Air Condition can not be Empty";
        }*/

        if($this->ci->post('shopwindow_clean') != ""){
          $data['shopwindow_clean'] = $this->ci->post('shopwindow_clean');
        }/* else{
          $error ="Shop Window can not be Empty";
        }
*/
        if($this->ci->post('clean_signboard')!=""){
          $data['clean_signboard'] = $this->ci->post('clean_signboard');
        }/* else{
          $error ="Clean Signboard can not be Empty";
        }*/

        if($this->ci->post('shop_hygiene')!=""){
          $data['shop_hygiene'] = $this->ci->post('shop_hygiene');
        }/* else{
          $error ="Shop Hygine can not be Empty";
        } */      

        if($this->ci->post('warehouse_maintained')!=""){
          $data['warehouse_maintained'] = $this->ci->post('warehouse_maintained');
        }/* else{
          $error ="warehouse maintained can not be Empty";
        }*/

        if($this->ci->post('signboard')!=""){
          $data['signboard'] = $this->ci->post('signboard');
        }
        /*else{
          $error ="Signboard can not be Empty";
        }*/
       
        if($this->ci->post('receptiondesk_seatingarea')!=""){
          $data['receptiondesk_seatingarea'] = $this->ci->post('receptiondesk_seatingarea');
        }
        /*else{
          $error ="Required Fields can not be Empty";
        }*/

        if($this->ci->post('colorbar')!=""){
          $data['colorbar'] = $this->ci->post('colorbar');
        }
       /* else{
          $error ="Required Fields can not be Empty";
        }*/

        if($this->ci->post('brochures')!=""){
          $data['brochures'] = $this->ci->post('brochures');
        }
        /*else{
          $error ="Required Fields can not be Empty";
        }*/

        if($this->ci->post('design_gallery')!=""){
          $data['design_gallery'] = $this->ci->post('design_gallery');
        }
        /*else{
          $error ="Required Fields can not be Empty";
        }*/

        if($this->ci->post('seating_area_gallery')!=""){
          $data['seating_area_gallery'] = $this->ci->post('seating_area_gallery');
        }
        /*else{
          $error ="Required Fields can not be Empty";
        }*/

        if($this->ci->post('color_trend_updated')!=""){
          $data['color_trend_updated'] = $this->ci->post('color_trend_updated');
        }
       /* else{
          $error ="Required Fields can not be Empty";
        }*/

        if($this->ci->post('salesman_in_uniform')!=""){
          $data['salesman_in_uniform'] = $this->ci->post('salesman_in_uniform');
        }
        /*else{
          $error ="Required Fields can not be Empty";
        }*/

        if($this->ci->post('staff')!=""){
          $data['staff'] = $this->ci->post('staff');
        }
        else{
          $error ="Staff Field can not be Empty";
        }

        if($this->ci->post('staff_names') != ""){
          $data['staff_names'] = $this->ci->post('staff_names');
        }
       else{
          $error ="Staff Names Field can not be Empty";
        }
        if($this->ci->post('exterior_display')!=""){
          $data['exterior_display'] = $this->ci->post('exterior_display');
        }
        /*else{
          $error ="Exterior Display can not be Empty";
        }*/

        if($this->ci->post('posm')!=""){
          $data['posm'] = $this->ci->post('posm');
        }
        /*else{
          $error ="POSM can not be Empty";
        }*/

        if($this->ci->post('back_wall')!=""){
          $data['back_wall'] = $this->ci->post('back_wall');
        }
        /*else{
          $error ="Back Wall can not be Empty";
        }*/

        if($this->ci->post('mc_area')!=""){
          $data['mc_area'] = $this->ci->post('mc_area');
        }
        /*else{
          $error ="MC area can not be Empty";
        }*/

        if($this->ci->post('jotun_way') != ""){
          $data['jotun_way'] = $this->ci->post('jotun_way');
        }
       /* else{
          $error ="Jotun Way can not be Empty";
        }*/

        if($this->ci->post('salesman_appearence')!=""){
          $data['salesman_appearence'] = $this->ci->post('salesman_appearence');
        }
        /*else{
          $error ="Salesman appearence can not be Empty";
        }*/

        if($this->ci->post('inform_sales_target')!=""){
          $data['inform_sales_target'] = $this->ci->post('inform_sales_target');
        }
        /*else{
          $error ="Inform Sales Target Fields can not be Empty";
        }*/

        if($this->ci->post('inform_push_compaign')!=""){
          $data['inform_push_compaign'] = $this->ci->post('inform_push_compaign');
        }
        /*else{
          $error ="Inform Push Compaign can not be Empty";
        }*/

        if($this->ci->post('inform_enduser_campaign')!=""){
          $data['inform_enduser_campaign'] = $this->ci->post('inform_enduser_campaign');
        }
        /*else{
          $error ="Inform Enduser Campaign can not be Empty";
        }*/

        if($this->ci->post('inform_salesman_incetnive')!=""){
          $data['inform_salesman_incetnive'] = $this->ci->post('inform_salesman_incetnive');
        }
       /* else{
          $error ="Inform salesman Incentive can not be Empty";
        }*/

        if($this->ci->post('refresh_master_painter')!=""){
          $data['refresh_master_painter'] = $this->ci->post('refresh_master_painter');
        }
        /*else{
          $error ="Refresh master Painter can not be Empty";
        }*/

        if($this->ci->post('innvations_in_focus')!=""){
          $data['innvations_in_focus'] = $this->ci->post('innvations_in_focus');
        }        

        if($this->ci->post('premium_products')!=""){
          $data['premium_products'] = $this->ci->post('premium_products');
        }        

        if($this->ci->post('area_specific_products')!=""){
          $data['area_specific_products'] = $this->ci->post('area_specific_products');
        }

        if($this->ci->post('salesman_greeting_his_customer')!=""){
          $data['salesman_greeting_his_customer'] = $this->ci->post('salesman_greeting_his_customer');
        }
       /* else{
          $error ="Salesman Greeting His Customer Fields can not be Empty";
        }*/

        if($this->ci->post('understanding_customer_needs')!=""){
          $data['understanding_customer_needs'] = $this->ci->post('understanding_customer_needs');
        }
        /*else{
          $error ="Understanding Customer can not be Empty";
        }*/

        if($this->ci->post('asking_open_ended_questions')!=""){
          $data['asking_open_ended_questions'] = $this->ci->post('asking_open_ended_questions');
        }
       /* else{
          $error ="Asking Open Ended Questions can not be Empty";
        }*/

        if($this->ci->post('selling_up')!=""){
          $data['selling_up'] = $this->ci->post('selling_up');
        }
        /*else{
          $error ="Selling Up can not be Empty";
        }*/
        if($this->ci->post('building_rapport')!=""){
          $data['building_rapport'] = $this->ci->post('building_rapport');
        }
        /*else{
          $error ="Building Rapport can not be Empty";
        }*/

        if($this->ci->post('product_training')!=""){
          $data['product_training'] = $this->ci->post('product_training');
        }
        /*else{
          $error ="product Training can not be Empty";
        }
*/
        if($this->ci->post('product_trained')!=""){
          $data['product_trained'] = $this->ci->post('product_trained');
        }
        /*else{
          $error ="product Trained can not be Empty";
        }*/

        if($this->ci->post('role_play')!=""){
          $data['role_play'] = $this->ci->post('role_play');
        }
        /*else{
          $error ="Role Play can not be Empty";
        }*/

        if($this->ci->post('communicate_sales_target')!=""){
          $data['communicate_sales_target'] = $this->ci->post('communicate_sales_target');
        }
        /*else{
          $error ="Communicate Sales Target can not be Empty";
        }*/
        if($this->ci->post('communicate_collection_target')!=""){
          $data['communicate_collection_target'] = $this->ci->post('communicate_collection_target');
        }
       /* else{
          $error ="Communicate Collection Target can not be Empty";
        } */     

        if($this->ci->post('inform_ongoing_compaigns')!=""){
          $data['inform_ongoing_compaigns'] = $this->ci->post('inform_ongoing_compaigns');
        }
        /*else{
          $error ="Inform Ongoing Compaigns can not be Empty";
        }*/

        if($this->ci->post('campaigns')!=""){
          $data['campaigns'] = $this->ci->post('campaigns');
        }
        /*else{
          $error ="campaigns can not be Empty";
        }*/

        if($this->ci->post('update_ongoing_projects')!=""){
          $data['update_ongoing_projects'] = $this->ci->post('update_ongoing_projects');
        }
        /*else{
          $error ="Update Ongoing Projects can not be Empty";
        }*/

        if($this->ci->post('jdpp_completed')!=""){
          $data['jdpp_completed'] = $this->ci->post('jdpp_completed');
        }
        /*else{
          $error ="Jdpp can not be Empty";
        }*/

        if($this->ci->post('agreed_actions')!=""){
          $data['agreed_actions'] = $this->ci->post('agreed_actions');
        }
        /*else{
          $error ="Agreed Actions can not be Empty";
        }*/

        if($this->ci->post('actions')!="")
        {
          $data['actions'] = $this->ci->post('actions');
        }
       /* else
        {
          $error ="Required Fields can not be Empty";
        }*/

        end:
        if ($error !="" )
        {            
            return $this->throws(
                        array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>$error),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }        
        else
        {
             $data['created'] = date('Y-m-d H:i:s');
             $this->ci->lib_services->add_form_data("form_one",$data);
            $arrResult = array(
                    'success' => true,
                    'message' =>"Successfully Submitted",
                 );
            return array(
                    'response' => $arrResult,
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                );
        }        
    }

    public function get_form_data()
    {       
        if($this->ci->post('shop_id')!="")
        {
           $data['shop_id'] = $this->ci->post('shop_id');
        }
        else
        {
           $error = "Shop Id Fields can not be Empty";
        }

        if($this->ci->post('form_id')!="")
        {
          $form_id = $this->ci->post('form_id');
        }
        else
        {
          $error = "Form Id Fields can not be Empty";
        }

        if($this->ci->post('emp_id')!="")
        {
          $data['emp_id'] = $this->ci->post('emp_id');
        }
        else
        {
          $error = "Employee Id Fields can not be Empty";
        }

        end:
        if ($error !="" )
        {            
            return $this->throws(
                        array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>$error),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }        
        else
        {
            $form_data = $this->ci->services_m->get_form_data($form_id,$data);
            if(@$form_data)
            {
              $arrResult = array(
                        'success' => true,
                        'form_data' => $form_data
                    );
                return array(
                    'response' => $arrResult,
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                );
            }
            else
            {
              return $this->throws(
                        array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>"No Data Found"),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
            }
            
        }  
    }

    public function form_two()
    {       
        $error = "";
        if($this->ci->post('emp_id')!=""){
          $data['emp_id'] = $this->ci->post('emp_id');
        }else{
          $error ="Employee Id can not be Empty";
        }

        if($this->ci->post('shop_id')!=""){
          $data['shop_id'] = $this->ci->post('shop_id');
        } else{
          $error ="Shop Id can not be Empty";
        }

        if($this->ci->post('keys')!="")
        {
          $data['field_id'] = $this->ci->post('keys');
        }
        else
        {
          $error = "Keys can not be Empty";
        }

        if($this->ci->post('values')!="")
        {
          $data['value'] = $this->ci->post('values');
        }
        else
        {
          $error = "Values Fields can not be Empty";
        }

        end:
        if ($error !="" )
        {            
            return $this->throws(
                        array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>$error),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }        
        else
        {
            $data['created'] = date('Y-m-d H:i:s');
            $this->ci->lib_services->add_form_data("form_two",$data);
            $arrResult = array(
                    'success' => true,
                    'message' =>"Successfully Submitted",
                 );
            return array(
                    'response' => $arrResult,
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                );
        }  
    }

    public function form_three()
    {       
        $error = "";
        if($this->ci->post('emp_id')!=""){
          $data['emp_id'] = $this->ci->post('emp_id');
        }else{
          $error ="Employee Id can not be Empty";
        }

        if($this->ci->post('shop_id')!=""){
          $data['shop_id'] = $this->ci->post('shop_id');
        } else{
          $error ="Shop Id can not be Empty";
        }

        if($this->ci->post('owner_name')!="")
        {
          $data['owner_name'] = $this->ci->post('owner_name');
        }
        else
        {
          $error = "Owner Name can not be Empty";
        }

        if($this->ci->post('owner_email')!="")
        {
          $data['owner_email'] = $this->ci->post('owner_email');
        }
        else
        {
          $error = "Owner Email can not be Empty";
        }

        if($this->ci->post('owner_mobile')!="")
        {
          $data['owner_mobile'] = $this->ci->post('owner_mobile');
        }
        else
        {
          $error = "Owner Mobile Fields can not be Empty";
        }

        if($this->ci->post('manager_name')!="")
        {
          $data['manager_name'] = $this->ci->post('manager_name');
        }
        else
        {
          $error = "Manager Name can not be Empty";
        }

        if($this->ci->post('manager_mobile')!="")
        {
          $data['manager_mobile'] = $this->ci->post('manager_mobile');
        }
        else
        {
          $error = "Manager Mobile Fields can not be Empty";
        }

        if($this->ci->post('manager_email')!="")
        {
          $data['manager_email'] = $this->ci->post('manager_email');
        }
        else
        {
          $error = "Manager Email Fields can not be Empty";
        }

        if($this->ci->post('accountant_name')!="")
        {
          $data['accountant_name'] = $this->ci->post('accountant_name');
        }
        else
        {
          $data['accountant_name'] = "";
        }       

        if($this->ci->post('accountant_mobile')!="")
        {
          $data['accountant_mobile'] = $this->ci->post('accountant_mobile');
        }
        else
        {
          $data['accountant_mobile'] = "";
        }       

        if($this->ci->post('accountant_email')!="")
        {
          $data['accountant_email'] = $this->ci->post('accountant_email');
        }
        else
        {
          $data['accountant_email'] = "";
        }        

        if($this->ci->post('salesman_name')!="")
        {
          $data['salesman_name'] = $this->ci->post('salesman_name');
        }
        else
        {
          $error = "Salesman Name Fields can not be Empty";
        }

        if($this->ci->post('salesman_mobile')!="")
        {
          $data['salesman_mobile'] = $this->ci->post('salesman_mobile');
        }
        else
        {
          $error = "Salesman Mobile Fields can not be Empty";
        }

        if($this->ci->post('operator_name')!="")
        {
          $data['operator_name'] = $this->ci->post('operator_name');
        }
        else
        {
          $data['operator_name'] = "";
        }        

        if($this->ci->post('operator_mobile')!="")
        {
          $data['operator_mobile'] = $this->ci->post('operator_mobile');
        }
        else
        {
          $data['operator_mobile'] = "";
        }        

        if($this->ci->post('help_name')!="")
        {
          $data['help_name'] = $this->ci->post('help_name');
        }
        else
        {
          $data['help_name'] = "";
        }        

        if($this->ci->post('help_mobile')!="")
        {
          $data['help_mobile'] = $this->ci->post('help_mobile');
        }
        else
        {
          $data['help_mobile'] = "";
        }
        end:
        if ($error !="" )
        {            
            return $this->throws(
                        array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>$error),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }        
        else
        {
           $data['created'] = date('Y-m-d H:i:s');
           $this->ci->services_m->update_shop_information($data["emp_id"],$data["shop_id"],$data);
            $arrResult = array(
                    'success' => true,
                    'message' =>"Successfully Submitted",
                 );
            return array(
                    'response' => $arrResult,
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                );
        }  
    }

    public function form_four()
    {
        $error = "";
        if($this->ci->post('emp_id') != ""){
          $data['emp_id'] = $this->ci->post('emp_id');
        }else{
          $error = "Employee Id can not be Empty";
          goto end;
        }        
        if($this->ci->post('shop_id') != ""){
          $data['shop_id'] = $this->ci->post('shop_id');
        }else{
          $error = "Shop Id can not be Empty";
          goto end;
        }        
        end:
        if ($error != "" ){
            return $this->throws(
                        array(Services_Constants::SERVICES_LIST_NOT_AVAIL =>$error),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }
        else
        {
            if(@$_FILES['reception_area']['name'])
            {
                $reception_area = $this->insert_multipleimages("reception_area");
                $data['reception_area'] = implode(",",$reception_area);
            }

            if(@$_FILES['type_of_area']['name'])
            {

                $type_of_area = $this->insert_multipleimages("type_of_area");
                $data['type_of_area'] = implode(",",$type_of_area);               
            }

            if(@$_FILES['shop_facade']['name'])
            {
                $shop_facade = $this->insert_multipleimages("shop_facade");
                $data['shop_facade'] = implode(",",$shop_facade);
            }

            if(@$_FILES['jcci']['name'])
            {
                $jcci = $this->insert_multipleimages("jcci");
                $data['jcci'] = implode(",",$jcci);
            }

            if(@$_FILES['jcce']['name'])
            {
                $jcce = $this->insert_multipleimages("jcce");
                $data['jcce'] = implode(",",$jcce);
            }

            if(@$_FILES['design_gallery']['name'])
            {
                $design_gallery = $this->insert_multipleimages("design_gallery");
                $data['design_gallery'] = implode(",",$design_gallery);
            }

            if(@$_FILES['enterior_display']['name'])
            {
                $enterior_display = $this->insert_multipleimages("enterior_display");
                $data['enterior_display'] = implode(",",$enterior_display);
            }
            
            $data["created"] = date('Y-m-d h:i:s',time());            
            $this->ci->lib_services->add_form_data("form_four",$data);
            $arrResult = array('success' => true,'message' =>"Successfully Submitted");
            return array(
                        'response' => $arrResult,
                        'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                    );
        }
    }

    public function insert_multipleimages($key)
    {
         $countfile = count(array_filter($_FILES[$key]['name']));
         $images = array();
         if($countfile != 0)
         {     
            for($i=0;$i<$countfile;$i++)
            {         
                if(!empty($_FILES[$key]['name'][$i]))
                {                   
                  $target_dir = "assets/shop_profiles/";
                  $file_name = "image".time().rand(00000,999999).".png";                   
                  $target_file = $target_dir.$file_name;
                  if(move_uploaded_file($_FILES[$key]["tmp_name"][$i],$target_file))
                   {                      
                      $images[] = $file_name;                              
                   }
                }
            }
            return $images;                 
        }
    }



}

/* End of file lib_shops.php */
/* Location: ./application/libraries/v1/shops/lib_shops.php */
