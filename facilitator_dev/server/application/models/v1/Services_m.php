<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Services_m extends CI_Model
{
    public function __construct()
    {
        //$this->_table = $this->config->item('shops_table');
    }

    public function user_targets($duration,$user_id)
    {
        if($duration==1)
        {
              $current_month  = date('m');
              $month = date("m",strtotime($this->get_user($user_id)->created));
              return $this->db->query("SELECT month_description, SUM(total_sales) as total_sales,SUM(total_collection) AS total_collection,SUM(total_product_target) as total_product_target,SUM(achieved_sales) as achieved_sales,SUM(achieved_collection) AS achieved_collection,SUM(achieved_product) as achieved_product from dealer_targets WHERE dealer_id IN(SELECT dealer_id from user_dealers WHERE user_id=$user_id) AND month BETWEEN  $month AND $current_month group by month")->result();

        }
        else
        {
             $result = $this->db->query("SELECT SUM(total_sales) as total_sales,SUM(total_collection) as total_collection,SUM(total_product_target) as total_product_target,SUM(achieved_sales) as achieved_sales,SUM(achieved_collection) as achieved_collection,SUM(achieved_product) as achieved_product FROM `users` WHERE `id` IN (select dealer_id from user_dealers where user_id=$user_id)");
	        return $result->result();
        }
    }

    public function dealer_shops($user_id)
    {
      return $this->db->query("select * from shops where id in(select shop_id from dealers_shops where user_id=$user_id)")->result();
    }

    public function get_user_data($user_id)
    {
        return $this->db->query("select * from users where id=$user_id")->row();
    }

    public function get_shop_data($shop_id)
    {
        return $this->db->query("select * from shops where id = $shop_id")->row();
    }

    public function get_single_shop_tasks($user_id,$shop_id,$status)
    {
      return $this->db->query("select t.*,s.name,s.address,s.email from tasks as t join shops as s on(t.shop_id = s.id) where t.shop_id = $shop_id and t.user_id=$user_id and t.status in($status)")->result();
    }

    public function get_task_forms()
    {
      return $this->db->query("select * from forms where status=1")->result();
    }

    public function dealer_monthly_current_targets($dealer_id)
    {
        /*$current=date('m');
        $prev = date('m', strtotime('-1 month'));
        return  $this->db->query("select * from dealer_targets where dealer_id=$dealer_id and month in($current,$prev)")->result();*/
        $current_month  = date('m');
        $month = date("m",strtotime($this->get_user($dealer_id)->created));
        return  $this->db->query("SELECT * from dealer_targets WHERE dealer_id =$dealer_id AND month BETWEEN $month AND $current_month GROUP BY month")->result();

    }

    public function dealer_yearly_targets($dealer_id)
    {
        return $this->db->query("select total_sales,total_collection,total_product_target,achieved_sales,achieved_collection,achieved_product from users where id = $dealer_id and role_id=4")->result();
    }

    public function dealer_product_targets($dealer_id,$month)
    {
        return $this->db->query("select * from dealer_product_targets where dealer_id = '".$dealer_id."' and month = '".$month."'")->result();
    }

    public function get_user($user_id)
    {
        return $this->db->get_where("users",array("id"=>$user_id))->row();
    }

    public function add_task_forms_data($table,$data)
    {
        $query = $this->db->set($data)->insert($table);
        return $this->db->insert_id;
    }

    public function get_products($table)
    {
        return $this->db->get($table)->result_array();
    }

    public function update_task_form_status($id,$status)
    {
        $task_id = $this->db->query("SELECT task_id FROM task_forms WHERE id=$id")->row()->task_id;
        $this->db->where('id',$id)->update('task_forms',array('status'=>$status));
        return  $this->db->where('id',$task_id)->update('tasks',array('status'=>2));
    }

    public function check_tasks_competion_status($task_form_id)
    {
        $result = $this->db->query("SELECT * FROM task_forms WHERE STATUS=1 AND task_id IN(SELECT task_id FROM task_forms WHERE id=$task_form_id)")->result_array();
        return count($result);
    }

    public function update_task_forms_status($task_form_id)
    {
        $task_id = $this->db->query("SELECT task_id FROM task_forms WHERE id=$task_form_id")->row()->task_id;
        if($task_id != "")
        {
           $this->db->query("UPDATE task_forms SET status=3 WHERE task_id=$task_id");
           // $new_task = $this->db->select('user_id,shop_id')->from('tasks')->where('id',$task_id)->get()->row();
           // $this->db->insert('tasks',array('user_id'=>$new_task->user_id,'shop_id'=>$new_task->shop_id,'assigned_by'=>1,'status'=>1));
           // $id = $this->db->insert_id();
           // $this->db->insert('task_forms',array('task_id'=>$id,'form_id','13'));
           return  $this->db->where('id',$task_id)->update('tasks',array('status'=>3));
        }

    }
    public function add_default_form($user_id,$shop_id){
      $this->db->insert('tasks',array('user_id'=>$user_id,'shop_id'=>$shop_id,'assigned_by'=>1,'status'=>1));
       $id = $this->db->insert_id();
       $this->db->insert('task_forms',array('task_id'=>$id,'form_id'=>'13'));
    }

    public function get_task_form_data($task_form_id)
    {
        if($task_form_id !="")
        {
            $form_id = $this->db->where("id",$task_form_id)->get("task_forms")->row()->form_id;
            if($form_id == 9)
            {
                return $this->db->where("task_form_id",$task_form_id)->get("task_form_shop_information")->result_array();
            }
            else if($form_id == 10)
            {
                return $this->db->where("task_form_id",$task_form_id)->get("task_form_dealer_profitability_program")->row_array();
            }
            else if($form_id == 11)
            {
                return $this->db->where("task_form_id",$task_form_id)->get("task_form_three")->result_array();
            }
            else if($form_id == 12)
            {
                return $this->db->where("task_form_id",$task_form_id)->get("task_form_four")->result_array();
            }
            else if($form_id == 13)
            {
                return $this->db->where("task_form_id",$task_form_id)->get("task_form_five")->result_array();
            }
        }
    }

    public function get_form_data($form_id,$data)
    {
        if($form_id != "")
        {
            if($form_id == 14)
            {
                return $this->db->order_by("id","desc")->limit(1)->where($data)->get("form_one")->row_array();
            }
            else if($form_id == 15)
            {
                return $this->db->order_by("id","desc")->limit(1)->where($data)->get("form_two")->row_array();
            }
            else if($form_id == 16)
            {
              return $this->db->order_by("id","desc")->limit(1)->where($data)->get("form_three")->row_array();
            }
        }
    }

    public function update_shop_information($emp_id,$shop_id,$data)
    {
      if($this->db->where(array("emp_id"=>$emp_id,"shop_id"=>$shop_id))->get("form_three")->row_array())
      {
        return $this->db->where(array("emp_id"=>$emp_id,"shop_id"=>$shop_id))->update("form_three",$data);
      }
      else
      {
        return $this->db->insert("form_three",$data);
      }
      
    }

}
