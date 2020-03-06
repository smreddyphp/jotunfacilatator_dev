<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_model extends CI_Model{

	// To Get shops based on type
	public function getshops_type($type){
		$query = $this->db->query("select * from `shops` where shop_type_id='".$type."'");
		return $query->result();
	}

	public function get_dealer_targets_sum($dealer_id)
	{
	    $current_month  = date('m');
	    $result = $this->db->query("SELECT SUM(total_sales) as total_sales,SUM(total_collection) as total_collection,SUM(total_product_target) as total_product_target FROM `dealer_targets` WHERE `dealer_id` IN ($dealer_id) AND `month` IN ($current_month)");
	    return $result->row();
	}

	public function get_dealer_year_targets($dealer_id)
	{
	    $result = $this->db->query("SELECT SUM(total_sales) as total_sales,SUM(total_collection) as total_collection,SUM(total_product_target) as total_product_target FROM `users` WHERE `id` IN ($dealer_id)");
	    return $result->row();
	}

	public function get_assign_dealer_year_targets($dealer_id)
	{
	    $result = $this->db->query("SELECT SUM(total_sales) as total_sales,SUM(total_collection) as total_collection,SUM(total_product_target) as total_product_target,SUM(achieved_sales) as achieved_sales,SUM(achieved_collection) as achieved_collection,SUM(achieved_product) as achieved_product FROM `users` WHERE `id` IN ($dealer_id)");
	    return $result->row();
	}

	public function delete_dealer_targets($dealer_id)
	{
	    return $this->db->query("delete from dealer_targets where dealer_id=$dealer_id");
	}

	//13/02/2019
	public function assign_dealer_monthly_targets($dealer_id,$month)
	{
	    //$current_month  = date('m');
	    $result = $this->db->query("SELECT SUM(total_sales) as total_sales,SUM(total_collection) as total_collection,SUM(total_product_target) as total_product_target,SUM(achieved_sales) as achieved_sales,SUM(achieved_collection) as achieved_collection,SUM(achieved_product) as achieved_product FROM `dealer_targets` WHERE `dealer_id` IN ($dealer_id) AND `month` IN ($month)");
	    return $result->row();
	}

	// To Get search results
	public function search_shop_address($address){
		$query = $this->db->query("select id,name from shops where address_search='".$address."'");
        return $query->result_array();
    }

// To get shops view verifier
	public function getshopsviewverifier($shop_id){
		$query = $this->db->query("select * from `shops` where id='".$shop_id."'");
		return $query->row_array();
	}


	public function get_shop_verifiers($shop_id)
	{
		$form1_data = $this->db->distinct('emp_id')->select('emp_id')->where('shop_id',$shop_id)->get('form_one')->result_array();
		$form2_data = $this->db->distinct('emp_id')->select('emp_id')->where('shop_id',$shop_id)->get('form_two')->result_array();
		$form3_data = $this->db->distinct('emp_id')->select('emp_id')->where('shop_id',$shop_id)->get('form_three')->result_array();
		$form4_data = $this->db->distinct('emp_id')->select('emp_id')->where('shop_id',$shop_id)->get('form_four')->result_array();

		$form1_data = array_map(function($row){ return $row['emp_id'] ; },$form1_data);
		$form2_data = array_map(function($row){ return $row['emp_id'] ; },$form2_data);
		$form3_data = array_map(function($row){ return $row['emp_id'] ; },$form3_data);
		$form4_data = array_map(function($row){ return $row['emp_id'] ; },$form4_data);

		$employees = array_merge($form1_data,$form2_data,$form3_data,$form4_data);

		$employees = array_unique($employees);

		return $employees ;
	}



	public function task_forms($user_id)
	{
	    return $this->db->query("select t_f.*,t.*,f.* FROM task_forms AS t_f JOIN tasks as t ON(t_f.task_id=t.id) JOIN forms as f ON(t_f.form_id=f.id) WHERE t.user_id=$user_id")->result();
	}

	// To get Forms
	public function getforms(){
		$query = $this->db->query("select * from `forms`");
		return $query->result_array();
	}

	public function getforms_limit(){
		$query = $this->db->query("select * from `forms` where id<6");
		return $query->result_array();
	}

	// To Get shop data
	public function getshopdata($shop_id,$form_id){
	    $created_by = $this->lib_auth->getUserID();
	    if($created_by == 1){
		$query = $this->db->query("SELECT * FROM `tasks`  inner join users on users.id = tasks.user_id inner join task_forms on tasks.id=task_forms.task_id where tasks.shop_id='".$shop_id."' and task_forms.form_id='".$form_id."'");
	    }else{
	    $query = $this->db->query("SELECT * FROM `tasks`  inner join users on users.id = tasks.user_id inner join task_forms on tasks.id=task_forms.task_id where tasks.shop_id='".$shop_id."' and task_forms.form_id='".$form_id."' and users.created_by='".$created_by."'");
	    }
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}

        // Get shop name
public function getshopname($shop_id){
$query = $this->db->query("select * from `shops` where id='".$shop_id."'");
return $query->row_array();
}

  // Get form name
public function getformname($form_id){
$query = $this->db->query("select * from `forms` where id='".$form_id."'");
return $query->row_array();
}


	public function getusername($p_nTaskID){
		$query = $this->db->query("select * from users inner join tasks on tasks.user_id=users.id and tasks.id='".$p_nTaskID."'");
		return $query->row_array();
	}

	public function getgeo_shop_data($user_id) {
  /*      $query = $this->db->query("SELECT shops.id,shops.name,shops.latitude,shops.longitude,tasks.created,tasks.modified FROM `tasks`  inner join shops on shops.id=tasks.shop_id where tasks.user_id='" . $user_id . "'&& DATE(tasks.modified) = CURDATE() GROUP BY (tasks.shop_id)  ORDER BY TIME(tasks.modified) "); */
$query = $this->db->query("SELECT shops.id,shops.name,shops.latitude,shops.longitude,tasks.created,tasks.modified,(select tasks.modified from tasks where tasks.shop_id=shops.id && DATE(tasks.modified) = CURDATE() ORDER BY TIME(tasks.modified) DESC limit 0,1) as tim FROM `tasks`  inner join shops on shops.id=tasks.shop_id where tasks.user_id='" . $user_id . "'&& DATE(tasks.modified) = CURDATE() GROUP BY (tasks.shop_id)");
        return $query->result_array();
    }

    public function getgeo_shop_data_filter($user_id,$from_date,$to_date)
    {
     /*   $query = $this->db->query("SELECT shops.id,shops.name,shops.latitude,shops.longitude,tasks.created,tasks.modified FROM `tasks`  inner join shops on shops.id=tasks.shop_id where tasks.user_id='" . $user_id . "'&& DATE(tasks.modified)>='".date('Y-m-d', strtotime($from_date))."'&& DATE(tasks.modified)<='".date('Y-m-d', strtotime($to_date))."'GROUP BY (tasks.shop_id)  ORDER BY TIME(tasks.modified)");*/
$query = $this->db->query("SELECT shops.id,shops.name,shops.latitude,shops.longitude,tasks.created,tasks.modified,(select tasks.modified from tasks where tasks.shop_id=shops.id &&DATE(tasks.modified)>='".date('Y-m-d', strtotime($from_date))."'&& DATE(tasks.modified)<='".date('Y-m-d', strtotime($to_date))."' ORDER BY TIME(tasks.modified) DESC limit 0,1) as tim FROM `tasks`  inner join shops on shops.id=tasks.shop_id where tasks.user_id='" . $user_id . "'&& DATE(tasks.modified)>='".date('Y-m-d', strtotime($from_date))."'&& DATE(tasks.modified)<='".date('Y-m-d', strtotime($to_date))."' GROUP BY (tasks.shop_id)");

        return $query->result_array();
    }
   public function mgetgeo_shop_data($user_id) {
  $query = $this->db->query("select shops.id,shops.name,shops.latitude,shops.longitude,task_form_points.modified,forms.name as formname from tasks inner join shops on shops.id=tasks.shop_id
join task_forms on task_forms.task_id=tasks.id join forms on forms.id=task_forms.form_id join task_form_points on task_form_points.task_form_id=task_forms.id
where tasks.user_id='".$n."'GROUP BY (task_form_points.modified)");
 return $query->result_array();
    }
    public function Mgetgeo_shop_data_filter($n,$from_date,$to_date)
    {
$query = $this->db->query("select shops.id,shops.name,shops.latitude,shops.longitude,task_form_points.modified,forms.name as formname from tasks inner join shops on shops.id=tasks.shop_id
join task_forms on task_forms.task_id=tasks.id join forms on forms.id=task_forms.form_id join task_form_points on task_form_points.task_form_id=task_forms.id
where tasks.user_id='".$n."'&& DATE(task_form_points.modified)>='".date('Y-m-d', strtotime($from_date))."' && DATE(task_form_points.modified)<='".date('Y-m-d', strtotime($to_date))."'GROUP BY (task_form_points.modified)");
 return $query->result_array();
    }
        public function get_geodata($data)
        {

            $this->db->where($data);
            return $this->db->get("users");
        }


// Added By Eswar 20-4-2017

	public function getShopsList($user_id){
		$query = $this->db->query("select * from `user_shops` where user_id='".$user_id."'");
		$rows = $query->num_rows();
		$data['result'] = $query->result_array();
		for($i=0;$i<$rows;$i++){
			$shop_id = $data['result'][$i]['shop_id'];
			$query = $this->db->query("select * from `shops` where id='".$shop_id."'");
			$data['shops'][] = $query->row_array();
		}
		return $data['shops'];
	}

	//SMR
	public function getDealersList($user_id){
		$query = $this->db->query("select * from `user_dealers` where user_id='".$user_id."'");
		$rows = $query->num_rows();
		$data['result'] = $query->result_array();
		for($i=0;$i<$rows;$i++){
			$dealer_id = $data['result'][$i]['dealer_id'];
			$query = $this->db->query("select * from `users` where role_id = 4 and id='".$dealer_id."'");
			$data['dealers'][] = $query->row_array();
		}
		return $data['dealers'];
	}

	//smr
	public function get_user_dealers($user_id)
	{
	    return $this->db->query("select id,username from users where id in (select dealer_id from user_dealers where user_id=$user_id)")->result_array();
	}

	//Mahendar 1/31/2019
   public function get_deler_shopsList($user_id){
		$query = $this->db->query("select * from `dealers_shops` where user_id in($user_id)");
		$rows = $query->num_rows();
		$data['result'] = $query->result_array();
		for($i=0;$i<$rows;$i++){
			$shop_id = $data['result'][$i]['shop_id'];
			$query = $this->db->query("select * from `shops` where id='".$shop_id."'");
			$data['shops'][] = $query->row_array();
		}
		return $data['shops'];
	}

	//Mahendar
	public function get_dealer_list($user_id){
		$query = $this->db->query("select * from `user_dealers` where user_id='".$user_id."'");
		$rows = $query->num_rows();
		$data['result'] = $query->result_array();
		for($i=0;$i<$rows;$i++){
			$dealer_id = $data['result'][$i]['dealer_id'];
			$query = $this->db->query("select * from `users` where role_id = 4 and id='".$dealer_id."'");
			$data['dealers'][] = $query->row_array();
		}
		return $data['dealers'];
	}

         public function getstatus_shops($task_form_id){
         $query = $this->db->query("select * from `task_form_points` where task_form_id='".$task_form_id."'");
         return $query->num_rows();
         }


        // Added By Eswar 21-4-2017
        public function getusersssss($created_by){
            $query = $this->db->query("select id from `users` where created_by='".$created_by."'");
            $data['users'] = $query->result();
//echo "<pre>";print_r($data['users']);exit;
            $users_count = count($data['users']);
                  for($i=0;$i<$users_count;$i++){
                        $user_id = $data['users'][$i]->id;
                        $query = $this->db->query("select * from `user_shops` where user_id='".$user_id."'");
                        $data['user_rows'][] = $query->result_array();
                        $users_row_count = count($data['user_rows'][$i]);
for($j=0;$j<$users_row_count;$j++){
$shop_id = $data['user_rows'][$i][$j]['shop_id'];
$query = $this->db->query("select * from `shops` where id='".$shop_id."'");
$data['shops_result'][] = $query->row_array();
}
                  }
return $data['shops_result'];
       }


         public function getusers($created_by){
            $query = $this->db->query("select GROUP_CONCAT(id) as id from `users` where created_by='".$created_by."'");
            $data['result'] =  $query->row_array();
            $user_ids = $data['result']['id'];
           if($user_ids != ""){
            $query = $this->db->query("select * from  `user_shops` where user_id IN ($user_ids) GROUP BY shop_id");
           }
            //echo $this->db->last_query();exit;
            $data['sresult'] = $query->result_array();
            $shops_count = count($data['sresult']);

            for($i=0;$i<$shops_count;$i++){
                $query = $this->db->query("select * from `shops` where id='".$data['sresult'][$i]['shop_id']."'");
                $data['shops_result'][] = $query->row_array();
            }
                       return $data['shops_result'];
        }




public function getusers_shops($user_id){
$query = $this->db->query("select * from `user_shops` where user_id='".$user_id."'");
return $data['shop_results'] = $query->result();
}

         public function getshops_manager($shop_id){
              $query = $this->db->query("select * from `shops` where id='".$shop_id."'");
              return $data['shops_result'] = $query->row_array();
         }

         public function get_shop_types(){
		 $query = $this->db->query("select * from `shop_types`");
		 return $query->result_array();
	 }


	 public function get_modified_from_taskformpoints($p_nTaskFormID){
		 $query  = $this->db->query("select modified from `task_form_points` where task_form_id='".$p_nTaskFormID."' group by task_form_id");
	     return $query->row_array();
	 }

	 public function getshops_statusfilter($status){
           	 $this->db->select('*');
                 $this->db->from('shops');
                 $this->db->where('status',$status);
                 $query = $this->db->get();
                 return $query->result();
         }

    // Added by Eswar  19-5-2017

    public function getFormsList(){
		 $query = $this->db->query("select id,name from `forms` where id<6");
		 return $query->result();
	 }

	 //smr
	 public function get_forms_list(){
		 $query = $this->db->query("select id,name from `forms` where id!='13'");
		 return $query->result();
	 }


	 public function get_stypes($shop_id){
		$query = $this->db->query("select shop_type_id from `shops` where id='$shop_id'");
		return $query->row_array();
	 }

	//Added By Eswar 22-5-2017
	 public function get_totalvalueold($p_nTaskFormID,$form_id){
	     //Training
if($form_id == 1){
	     $query = $this->db->query("select value from `task_form_points` where task_form_id='$p_nTaskFormID' and name='Painter Training Total Points'");
	     $data['res1'] = $query->row_array();
	     $pt = $data['res1']['value'];
	     $query = $this->db->query("select * from `task_form_points` where task_form_id='$p_nTaskFormID' and name='Shop Staff Training Total Points'");
	     $data['res2'] = $query->row_array();
	     $st = $data['res2']['value'];
	     $total = $pt+$st;
	return $total;
	     }

// shopsize
if($form_id == 2){
	     $query = $this->db->query("select value from `task_form_points` where task_form_id='$p_nTaskFormID' and name='Shop Size Total Points'");
	     $data['res1'] = $query->row_array();
	     $total = $data['res1']['value'];

	return $total;
	     }


if($form_id == 3){
	$query = $this->db->query("select value from `task_form_points` where task_form_id='$p_nTaskFormID' and name='Availability Total Points'");
	     $data['res1'] = $query->row_array();
	     $atp = $data['res1']['value'];
	     $query = $this->db->query("select value from `task_form_points` where task_form_id='$p_nTaskFormID' and name='Organization Training Total Points'");
	     $data['res2'] = $query->row_array();
		 $otp = $data['res2']['value'];
		 $p  = $atp+$otp;
	     $query = $this->db->query("select value from `task_form_points` where task_form_id='$p_nTaskFormID' and name='Safety Total Points'");
	     $data['res3'] = $query->row_array();
		 $sp = $data['res3']['value'];
	     $total = $p+$sp;
		return $total;
}


if($form_id == 4){
	$query = $this->db->query("select value from `task_form_points` where task_form_id='$p_nTaskFormID' and name='Online Report Total Points'");
	$data['res1'] = $query->row_array();
	$total = $data['res1']['value'];

	return $total;
}

if($form_id == 5){
	$query = $this->db->query("select value from `task_form_points` where task_form_id='$p_nTaskFormID' and name='Availability Total Points'");
	$data['res1'] = $query->row_array();
	$data['atp'] = $data['res1']['value'];
	$atp = $data['atp'];
	$query = $this->db->query("select value from `task_form_points` where task_form_id='$p_nTaskFormID' and name='Conditions Total Points'");
	$data['res22'] = $query->row_array();
	$data['res2'] = $data['res22']['value'];
	$ctp = $data['res2'];
	$total = $atp+$ctp;

   return $total;
}

if($form_id == 6 || $form_id == 7 || $form_id == 8){
	$query = $this->db->query("select value from `task_form_points` where task_form_id='$p_nTaskFormID' and name='Facade Total Points'");
	$data['res11'] = $query->row_array();
	$data['res1'] = $data['res11']['value'];
	$atp = $data['res1'];
	$query = $this->db->query("select value from `task_form_points` where task_form_id='$p_nTaskFormID' and name='Shop Hygiene Total Points'");
	$data['res12'] = $query->row_array();
	$data['res2'] = $data['res12']['value'];
	$ctp = $data['res2'];
		$p = $atp+$ctp;
	$query = $this->db->query("select value from `task_form_points` where task_form_id='$p_nTaskFormID' and name='Display & Merchandising Total Points'");
	$data['res13'] = $query->row_array();
	$data['res3'] = $data['res13']['value'];
	$atp2 = $data['res3'];
	$query = $this->db->query("select value from `task_form_points` where task_form_id='$p_nTaskFormID' and name='Multicolor Care Total Points'");
	$data['res14'] = $query->row_array();
	$data['res4'] = $data['res14']['value'];
	$ctp2 = $data['res4'];
		$p2 = $atp2+$ctp2;
		$sp = $p+$p2;
	$query = $this->db->query("select value from `task_form_points` where task_form_id='$p_nTaskFormID' and name='Shop in Shop Concept Total Points'");
	$data['res15'] = $query->row_array();
	$data['res5'] = $data['res15']['value'];
	$ctp5 = $data['res5'];
		$total = $ctp5+$sp;

	return $total;
}
	 }

// Added By Eswar 06-07-2017
public function get_shops_zone($zone_id){
    $this->db->select('*');
    $this->db->from('shops');
    $this->db->where_in('zone',$zone_id,false);
    $query =  $this->db->get();
    //echo $this->db->last_query();exit;
    return $query->result_array();
}

// Added By Eswar 06-07-2017
public function get_shops_acc($zone_id){
   $query = $this->db->query("select distinct(acc_no) from shops where acc_no not in(select acc_no from users where role_id = 4) and zone='".$zone_id."'");
   return $query->result_array();
}

// SMR
public function get_dealers_zone($zone_id){
    /*$this->db->select('*');
    $this->db->from('users');
    $this->db->where_in('zone',$zone_id,false);
    $query =  $this->db->get();*/
    $query= $this->db->query("SELECT * FROM `users` WHERE `role_id` = 4 AND `zone` IN ($zone_id)");
   // echo $this->db->last_query();exit;
   return $query->result_array();
}


public function get_shops_zones($zone_id){
    $query = $this->db->query("select * from `shops` where zone='".$zone_id."'");
    return $query->result();
}


public function get_shop_type($shop_id){
    $query = $this->db->query("select shop_type_id from `shops` where id='".$shop_id."'");
    return $query->row_array();
}


public function download_shops_data($shop_id){
		$query = $this->db->query("SELECT u.username as username,u.first_name as first_name,u.email as email,u.phone as phone,tf.form_id as form_id,tf.id as task_form_id,t.id as task_id FROM `tasks` as t  inner join users as u on u.id = t.user_id inner join task_forms as tf on t.id=tf.task_id where t.shop_id='".$shop_id."'");
		$data['result'] = $query->result_array();
		$result = $data['result'];
		$count = count($result);

		$data['userdata'] = array();
		for($i=0;$i<$count;$i++){
		        array_push($data['userdata'],array(
		               'username' => $result[$i]['username'],
		               'firstname' => $result[$i]['first_name'],
		               'email' => $result[$i]['email'],
		               'mobile' => $result[$i]['phone'],
		               'form_id'  => $result[$i]['form_id'],
		               'task_form_id'  => $result[$i]['task_form_id'],
		               'task_id'  => $result[$i]['task_id']
		        ));
		}
		return $data['userdata'];
	}


	public function get_tfp($shop_id){
			$query = $this->db->query("select t.id as task_id,t.shop_id as shop_id,tf.id as task_form_id,tf.form_id as form_id,u.first_name as username from tasks as t inner join task_forms as tf on t.id=tf.task_id inner join users as u  on u.id=t.user_id where t.shop_id='".$shop_id."' and tf.signature!=''");
			$data['tfp'] = $query->result_array();

			$query = $this->db->query("select * from `shops` where id='".$shop_id."'");
			$data['shop_details'] = $query->row_array();

			$tfp_points = array();
			for($i=0;$i<count($data['tfp']);$i++){
			$form_id = $data['tfp'][$i]['form_id'];
				$task_form_id = $data['tfp'][$i]['task_form_id'];
				$query = $this->db->query("select * from `task_form_points` where task_form_id='".$task_form_id."'");
				$data['points'] = $query->result_array();
		$query = $this->db->query("select value from `task_form_points` where task_form_id='".$task_form_id."' and name='Total points'");
		$data['total'] = $query->row_array();

		$query = $this->db->query("select * from `task_form_images` where task_form_id='".$task_form_id."'");
		$data['images'] = $query->result_array();

				  	array_push($tfp_points,
				  		array(
				  			'points' => $data['points'],
				  			'images' => $data['images'],
				  			'username' => $data['tfp'][$i]['username'],
				  			'form_id' => $data['tfp'][$i]['form_id'],
				  			'task_form_id' => $data['tfp'][$i]['task_form_id'],
				  			'total_points' => $data['total'],
				  			'shop_details' => $data['shop_details'],
				  			'task_id' => $data['tfp'][$i]['task_id']
				  		)
				  	);

			}
                     return $tfp_points;
echo"<pre>";print_r($tfp_points);exit;

		}

	public function get_taskid($shop_id){
		$query = $this->db->query("select t.id as task_id,t.shop_id as shop_id,tf.id as taskform_id,tfi.name as name from tasks as t inner join task_forms as tf on t.id=tf.task_id inner join task_form_images as tfi on tf.id=tfi.task_form_id where t.shop_id='".$shop_id."'");
		return $query->result_array();
		}

	public function actionlog(){
	    $this->db->select('u.username as username,u.email as useremail,s.name as shopname,s.email as shopemail,s.name as shopname,tf.id as task_form_id,tf.task_id as task_id,tf.form_id as form_id,tfp.modified as modified');
	    $this->db->from('tasks','task_forms','task_form_points','users','shops');
	    $this->db->join('users as u','tasks.user_id = u.id');
	    $this->db->join('shops as s','tasks.shop_id = s.id');
	    $this->db->join('task_forms as tf','tf.task_id = tasks.id');
	    $this->db->join('task_form_points as tfp','tfp.task_form_id = tf.id');
	    $this->db->where('tfp.updated','1');
	    $this->db->group_by('task_form_id');
	    $this->db->order_by('tfp.id','desc');
	    $query = $this->db->get();

	    //$query = $this->db->query("select * from tasks inner join task_forms on tasks.id=task_forms.task_id inner join task_form_points on task_forms.id=task_form_points.task_form_id inner  join users on tasks.user_id= users.id inner join shops on shops.id=tasks.shop_id group by (task_form_id)");
	     return $query->result_array();
	    //echo $this->db->last_query();exit;

    }

    public function getstatus_shopsd($task_form_id){
        $query = $this->db->query("select * from `task_form_points` where task_form_id='".$task_form_id."'");
        $rows = $query->num_rows();
        if($rows != ""){
            $status = "Completed";
        }else{
            $status = "Pending";
        }
        return $status;
    }


    public function get_shops(){
        $query = $this->db->query("select * from `shops`");
        return $query->result();
    }


    public function super_user_shops(){
	    $super_user_id = $this->lib_auth->getUserID() ; 
	    $superuser_details = $this->db->where('id',$super_user_id)->get('users')->row_array();

        $query = $this->db->where('zone',$superuser_details['zone'])->get('shops')->result();
        return $query;
    }

    public function edit_shop($shop_id,$arrShop){
        $this->db->where('id',$shop_id);
        $this->db->update('shops',$arrShop);
        return $this->db->affected_rows();
    }

    public function getShopByID($shop_id){
        $query = $this->db->query("select * from `shops` where id='".$shop_id."'");
        //echo $this->db->last_query();exit;
        return $query->row();
    }


    public function getmodified_shops_old($task_form_id){
		 $query = $this->db->query("select modified from `task_form_points` where task_form_id='".$task_form_id."'");
        	return $query->row_array();
	}


	public function getmodified_shops($task_id){
		 $query = $this->db->query("select modified from `tasks` where id='".$task_id."'");
		 //echo $this->db->last_query();exit;
        	return $query->row_array();
	}



	public function get_lm_tfp_old($shop_id){
	    $query = $this->db->query("SELECT tfp.modified as last_evaluation FROM `tasks` inner join task_forms on tasks.id=task_forms.task_id inner join task_form_points as  tfp on tfp.task_form_id=task_forms.id where tasks.shop_id='".$shop_id."' GROUP BY tfp.modified order by tfp.modified desc limit 0,1");
	    return $query->row_array();
	}


	public function get_lm_tfp($shop_id){
	    $query = $this->db->query("SELECT t.modified as last_evaluation FROM `tasks` as t inner join shops on shops.id=t.shop_id  where t.shop_id='".$shop_id."' GROUP BY t.modified order by t.modified desc limit 0,1");
	    return $query->row_array();
	}

	public function download_shops(){
		$query = $this->db->query("select * from `shops` order by name asc");
		return $query->result_array();
	}

	public function get_shop_details($shop_id){
		$query = $this->db->query("select * from `shops` where id='".$shop_id."'");
		return $query->row_array();
	}

	public function download_shopstotal($shop_id){
	$query = $this->db->query("SELECT * FROM `tasks` inner join task_forms on tasks.id=task_forms.task_id inner join task_form_points on task_form_points.task_form_id = task_forms.id where tasks.shop_id='".$shop_id."' and task_forms.signature != '' and task_form_points.name='Total points'");
	//echo $this->db->last_query();exit;
	return  $query->result_array();
	}

	public function get_formname($form_id){
	    $query = $this->db->query("select * from `forms` where id='".$form_id."'");
	    return $query->row_array();
	}

	public function get_username($user_id){
	    $query = $this->db->query("select * from `users` where id='".$user_id."'");
	    return $query->row_array();
	}

	 public function get_totalvalue($p_nTaskFormID){

	     $query = $this->db->query("select value from `task_form_points` where task_form_id='$p_nTaskFormID' and name='Total points'");
	     $data['res1'] = $query->row_array();
	     $total = $data['res1']['value'];
	return $total;

	 }

	 public function download_totalshops(){
    	$query = $this->db->query("SELECT * FROM `tasks` inner join task_forms on tasks.id=task_forms.task_id inner join task_form_points on task_form_points.task_form_id = task_forms.id inner join shops on tasks.shop_id = shops.id where task_forms.signature != '' and task_form_points.name='Total points' order by shops.name asc");
    	//echo $this->db->last_query();exit;
	    return  $query->result_array();
	}

	public function shop_name($form_id)
	{
	    $id = $this->db->query("select * from tasks where id in(select task_id from task_forms where id = $form_id)")->row_array()['shop_id'];
	    $result = $this->db->query("select name from shops where id=$id")->row_array();
	    return $result['name'];
	}

	public function shop_address($form_id)
	{
	    $id = $this->db->query("select * from tasks where id in(select task_id from task_forms where id = $form_id)")->row_array()['shop_id'];
	    $result = $this->db->query("select * from shops where id=$id")->row_array();
	    return $result;
	}

	public function dealer_name($form_id)
	{
	    $id = $this->db->query("select * from tasks where id in(select task_id from task_forms where id = $form_id)")->row_array()['shop_id'];
	    $result = $this->db->query("select username from users where id in(select user_id from dealers_shops where shop_id=$id)")->row_array();
	    return $result['username'];
	}

	public function salesman_name($form_id)
	{
	    $id = $this->db->query("select * from tasks where id in(select task_id from task_forms where id = $form_id)")->row_array()['user_id'];
	     $result = $this->db->query("select * from users where id=$id")->row_array();
	    return $result['username'];
	}

	public function field_name($id)
	{
	    $result = $this->db->query("select * from form_fields where id=$id")->row_array();
	    return $result['name'];
	}


}
