<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller
{
	/**
	 * __construct method
	 */
    function __construct()
    {
      parent::__construct();
      $this->load->library('excel');
        // Load model
	    $this->load->model('sales_model');
		  $this->load->model('user_model');
		  $this->load->model('dashboard_model');

      // Check login
      $this->lib_auth->checkUriPermissions();

      // Load Lib_Forms, Lib_Shops, Lib_Roles, Lib_Users, Lib_Task_Forms and Lib_Sales Libraries
      $this->load->library(array('Lib_Forms', 'Lib_Shops', 'Lib_Roles', 'Lib_Users', 'Lib_Task_Forms', 'Lib_Sales'));
    }

    //smr
    public function view_user_tasks($user_id="")
    {
        if($user_id != "")
        {
             $data['tasks'] = $this->db->order_by('id','desc')->where("user_id",$user_id)->get("tasks")->result();
             $this->load->view("sales/view_user_tasks",$data);
        }
        else
        {
            show_404();
        }
    }


#Mahendar 2020-2-28 Updated Comments
    public function view_user_works($user_id="",$fid="")
    {
        $data['form_id'] = $fid ;

        if($user_id != "")
        {    
             if($fid==14){
                 $data['tasks'] = $this->db->order_by('id','desc')->where("emp_id",$user_id)->get("form_one")->result();
              }
              else if($fid == 15) {             
                 $data['tasks'] = $this->db->order_by('id','desc')->where("emp_id",$user_id)->get("form_two")->result();
               }
               else if($fid == 16)
               {                 
                  $data['tasks'] = $this->db->order_by('id','desc')->where("emp_id",$user_id)->get("form_three")->result();;
               }
               else if($fid == 17)
               {                
                 $data['tasks'] = $this->db->order_by('id','desc')->where("emp_id",$user_id)->get("form_four")->result();
               }
             $this->load->view("sales/view_user_works",$data);
        }
        else
        {
            show_404();
        }
    }

    public function forms($user_id="")
    {
        if($user_id != "")
        {
             $data["user_id"] = $user_id;
             $data["forms"] = $this->db->where("status",1)->get("forms")->result();
             $this->load->view("sales/forms",$data);
        }
        else
        {
            show_404();
        }
    }

    public function view_form($tid="",$fid=""){
        if($tid != "" && $fid != "")
        {   
             if($fid==14){                
                 $data['form_one'] = $this->db->get_where("form_one",array('id'=>$tid))->row_array();

                 $this->load->view('sales/view_form',$data);
              }
              else if($fid == 15) {             
                 $data['form_two'] = $this->db->get_where("form_two",array('id'=>$tid))->row_array();
                 $this->load->view('sales/view_form',$data);
               }
               else if($fid == 16)
               {                 
                  $data['form_three'] = $this->db->get_where("form_three",array('id'=>$tid))->row_array();
                  $this->load->view('sales/view_form',$data);
               }
               else if($fid == 17)
               {                
                 $data['form_four'] = $this->db->get_where("form_four",array('id'=>$tid))->row_array();
                 $this->load->view('sales/view_form',$data);
               }               
        }
        else{
            show_404();
        }
    }

    //28-2-2020 Mahendar

    public function report_forms($role='',$id='')
    {
        $data['id'] = $id;
        $data['role'] = $role;
        $data['forms'] = $this->db->where("status",1)->get("forms")->result();
        if($data['id'] != "" && $role != "" && $role == "dealer" || $role == "salesman")
        {
             $this->load->view('sales/reports_model',$data);
        }
        else
        {
            show_404();
        }

    }


    public function export_form14($flag="employeee_flag")
    {
      $user_id =$this->input->post('user_id');
      $start = $this->input->post('start');
      $end = $this->input->post('end');
      $role =$this->input->post('role');
      $form_id = $this->input->post('form_id');

      if($start)
      {
        $start = date('Y-m-d',strtotime($this->input->post('start')));
        $this->db->where('DATE(created) >=',$start);
      }

      if($end)
      {
        $end = date('Y-m-d',strtotime($this->input->post('end')));
        $this->db->where('DATE(created) <=',$end);
      }

      $form_one_data = $this->db->order_by('id','DESC')->get_where("form_one",array('emp_id'=>$user_id))->result_array();

      $export_data = [] ;

      foreach ($form_one_data as $key => $record) 
      {
        $employee_details = $this->db->where('id',$user_id)->get('users')->row_array();
        $shop_details = $this->db->where('id',$record['shop_id'])->get('shops')->row_array();

        $shifts = array_chunk(explode(',',$record['working_hours']),2);

        foreach ($shifts as $k => $shift) 
        {
          $shift = implode(" to ", $shift);

          $shifts[$k] = $shift ;
        }

        $workingshifts = implode("<br>",$shifts) ;

        $shopping_experience = [ 
                                ['Date of visit', $record['date']],
                                ['Time of Visit',$record['time']],
                                ['Shop Working Hours',implode("<br>",$shifts)],
                                ['Staff in the Shop at the time of visit', trim($record['staff'],',')],
                                ['Staff Names  ', $record['staff_names']]
                              ];


        $shop_dealer = [
                        [' Acceptable Flooring ', $record['accetable_flooring']],
                        [' Working Air Condition ',$record['working_air_condition']],
                        [' Lights Working ',$record['lights_working']],
                        [' WallsClean & Painted ',$record['wallsclean_painting']],
                        [' Shop Window Clean ',$record['shopwindow_clean']],
                        [' Clean Signboard ',$record['clean_signboard']],
                        [' Shop Hygiene ',$record['shop_hygiene']],
                        [' Drums on Shop Floor ',$record['drums_on_shop_floor']],
                        [' Warehouse Maintained ',$record['warehouse_maintained']],
                       ];

        $shop_jotun = [
                        [' Signboard – Working, Clean, Flex not faded ', $record['signboard']],
                        [' Reception Desk& Seating Area – Clean & organized ', $record['receptiondesk_seatingarea']],
                        [' Color Bar- JCCI & JCCE (Chips Clean and all in stock and placed properly) ', $record['colorbar']],
                        [' Brochures for JCCI & JCCE in Place ', $record['brochures']],
                        [' Design gallery- Inspiration panels clean, Pictures according  ', $record['design_gallery']],
                        [' Seating Area in Gallery- Clean & Organized  ', $record['seating_area_gallery']],
                        [' Color Trend Updated, I Shape  ', $record['color_trend_updated']],
                        [' Salesman in Uniform  ', $record['salesman_in_uniform']],
                        [' Exterior display- organized & lights in working condition  ', $record['exterior_display']],
                        [' POSM –Available &in Designated Area  ', $record['posm']],
                        [' Back Wall – Color of the season & LCD playing new videos  ', $record['back_wall']],
                        [' MC Area- Mc machine & area clean, Global Network Connected  ', $record['mc_area']],
                      ];

        $sales_men = [
                      ['Jotun Way Completed',$record['jotun_way']],
                      ['Salesman Appearance',$record['salesman_appearence']],
                      ['Inform Sales Target',$record['inform_sales_target']],
                      ['Inform Push Campaign',$record['inform_push_compaign']],
                      ['Inform End User Campaign',$record['inform_enduser_campaign']],
                      ['Inform Salesman Incentive',$record['inform_salesman_incetnive']],
                      ['Refresh Master Painter',$record['refresh_master_painter']],
                    ];

        $products = [
                      ['Innovations in Focus',$record['innvations_in_focus']],
                      ['Premium Products',$record['premium_products']],
                      ['Area Specific Products',$record['area_specific_products']],
                    ];

        $sales_process = [
                          ['Salesman Greeting his Customer',$record['salesman_greeting_his_customer']],
                          ['Understanding Customer Needs',$record['understanding_customer_needs']],
                          ['Asking Open Ended Questions',$record['asking_open_ended_questions']],
                          ['Selling Up',$record['selling_up']],
                          ['Building Rapport',$record['building_rapport']],
                        ];

        $job_training = [
                          ['Product Training',$record['product_training']],
                          ['Product Trained',$record['product_trained']],
                          ['Role Play',$record['role_play']],
                        ]; 

        $dealer = [
                    ['Communicate Sales Target',$record['communicate_sales_target']],
                    ['Communicate Collection Target',$record['communicate_collection_target']],
                    ['Inform Ongoing Campaigns',$record['inform_ongoing_compaigns'],trim(@$record['campaigns'],',')],
                    ['Update on Ongoing Projects',$record['update_ongoing_projects']],
                    ['JDPP Completed',$record['jdpp_completed']],
                    ['Agreed Actions',$record['agreed_actions']],
                  ];

        $actions = [["Actions",trim(@$record["actions"],',')]];

        $export_data[$key]['shopping_experience'] = $shopping_experience;
        $export_data[$key]['shop_dealer'] = $shop_dealer;
        $export_data[$key]['shop_jotun'] = $shop_jotun;
        $export_data[$key]['sales_men'] = $sales_men;
        $export_data[$key]['products'] = $products;
        $export_data[$key]['sales_process'] = $sales_process;
        $export_data[$key]['job_training'] = $job_training;
        $export_data[$key]['actions'] = $actions;
        $export_data[$key]['dealer'] = $dealer;
        $export_data[$key]['created'] = date('F,d Y - h:i:s a',strtotime($record['created']));

        $export_data[$key]['employee_details'] = $employee_details;
        $export_data[$key]['shop_details'] = $shop_details;
      }

      //echo "<pre>"; print_r($export_data);exit;


      header("Content-Type: application/vnd.ms-excel");
      header('Content-Disposition: attachment; filename="Shop Visit Reports - ' . date('d-m-Y') . '.xls"');
      echo "<html>
              <head>
                <meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" />
              </head>
              <body>";


      foreach ($export_data as $key => $record) {

        echo  "<table border ='1'>
                <tr>
                  <th style = 'background-color: yellow;' colspan=\"10\" nowrap=\"nowrap\">Record ".($key+1)." on ".$record['created']."
                  </th>
                </tr>";


        //Employee & Shop Details
        echo  "<tr>
                <th style = 'background-color: #f06272;' colspan=\"5\" nowrap=\"nowrap\"> Employee Details
                </th>
                <th style = 'background-color: #f06272;' colspan=\"5\" nowrap=\"nowrap\"> Shop Details
                </th>
              </tr>";

          $emp_details = $record['employee_details'];
          $shop_details = $record['shop_details'];

        echo "<tr>
                <td nowrap=\"nowrap\" colspan=\"2\">Username</td>
                <td nowrap=\"nowrap\" colspan=\"3\">".$emp_details['username']."</td>

                <td nowrap=\"nowrap\" colspan=\"2\">Name</td>
                <td nowrap=\"nowrap\" colspan=\"3\">".$shop_details['name']."</td>
              </tr>
              <tr>
                <td nowrap=\"nowrap\" colspan=\"2\">Email</td>
                <td nowrap=\"nowrap\" colspan=\"3\">".$emp_details['email']."</td>

                <td nowrap=\"nowrap\" colspan=\"2\">Email</td>
                <td nowrap=\"nowrap\" colspan=\"3\">".$shop_details['email']."</td>
              </tr>
              <tr>
                <td nowrap=\"nowrap\" colspan=\"2\">Phone</td>
                <td nowrap=\"nowrap\" colspan=\"3\" style='text-align:left'>".$emp_details['phone']."</td>

                <td nowrap=\"nowrap\" colspan=\"2\">Phone</td>
                <td nowrap=\"nowrap\" colspan=\"3\" style='text-align:left'>".$shop_details['phone']."</td>
              </tr>
              <tr>
                <td nowrap=\"nowrap\" colspan=\"2\">Code</td>
                <td nowrap=\"nowrap\" colspan=\"3\" style='text-align:left'>".$emp_details['code']."</td>

                <td nowrap=\"nowrap\" colspan=\"2\">Acct No</td>
                <td nowrap=\"nowrap\" colspan=\"3\" style='text-align:left'>".$shop_details['acc_no']."</td>
              </tr>";

        //shopping_experience
        echo "<tr>
                <th style = 'background-color: #f06272;' colspan=\"10\" nowrap=\"nowrap\">Shopping Experience (Sales Visit)</th>
              </tr>";
        foreach ($record['shopping_experience'] as $key => $r) {
          echo "<tr>
                  <td nowrap=\"nowrap\" colspan=\"5\">".$r[0]."</td>
                  <td nowrap=\"nowrap\" colspan=\"5\">".$r[1]."</td>
                </tr>";
        }

        //shop_dealer
        echo "<tr>
                <th style = 'background-color: #f06272;' colspan=\"10\" nowrap=\"nowrap\">Shop (Dealer)</th>
              </tr>";
        foreach ($record['shop_dealer'] as $key => $r) {
          echo "<tr>
                  <td nowrap=\"nowrap\" colspan=\"5\">".$r[0]."</td>
                  <td nowrap=\"nowrap\" colspan=\"5\">".$r[1]."</td>
                </tr>";
        }

        //shop_jotun
        echo "<tr>
                <th style = 'background-color: #f06272;' colspan=\"10\" nowrap=\"nowrap\">Shop (Jotun)</th>
              </tr>";
        foreach ($record['shop_jotun'] as $key => $r) {
          echo "<tr>
                  <td nowrap=\"nowrap\" colspan=\"5\">".$r[0]."</td>
                  <td nowrap=\"nowrap\" colspan=\"5\">".$r[1]."</td>
                </tr>";
        }


        //sales_men
        echo "<tr>
                <th style = 'background-color: #f06272;' colspan=\"10\" nowrap=\"nowrap\">Salesman</th>
              </tr>";
        foreach ($record['sales_men'] as $key => $r) {
          echo "<tr>
                  <td nowrap=\"nowrap\" colspan=\"5\">".$r[0]."</td>
                  <td nowrap=\"nowrap\" colspan=\"5\">".$r[1]."</td>
                </tr>";
        }

        //products
        echo "<tr>
                <th style = 'background-color: #f06272;' colspan=\"10\" nowrap=\"nowrap\">Products</th>
              </tr>";
        foreach ($record['products'] as $key => $r) {
          echo "<tr>
                  <td nowrap=\"nowrap\" colspan=\"5\">".$r[0]."</td>
                  <td nowrap=\"nowrap\" colspan=\"5\">".$r[1]."</td>
                </tr>";
        }

        //sales_process
        echo "<tr>
                <th style = 'background-color: #f06272;' colspan=\"10\" nowrap=\"nowrap\">Sales Process</th>
              </tr>";
        foreach ($record['sales_process'] as $key => $r) {
          echo "<tr>
                  <td nowrap=\"nowrap\" colspan=\"5\">".$r[0]."</td>
                  <td nowrap=\"nowrap\" colspan=\"5\">".$r[1]."</td>
                </tr>";
        }

        //job_training
        echo "<tr>
                <th style = 'background-color: #f06272;' colspan=\"10\" nowrap=\"nowrap\">On Job Trainig</th>
              </tr>";
        foreach ($record['job_training'] as $key => $r) {
          echo "<tr>
                  <td nowrap=\"nowrap\" colspan=\"5\">".$r[0]."</td>
                  <td nowrap=\"nowrap\" colspan=\"5\">".$r[1]."</td>
                </tr>";
        }

        //job_training
        echo "<tr>
                <th style = 'background-color: #f06272;' colspan=\"10\" nowrap=\"nowrap\">Dealer</th>
              </tr>";
        foreach ($record['dealer'] as $key => $r) {
          echo "<tr>";

                if($r[0]=="Inform Ongoing Campaigns" && $r[1]=="Yes")
                {
                  echo "<td nowrap=\"nowrap\" colspan=\"5\">".$r[0]."</td>
                        <td nowrap=\"nowrap\" colspan=\"5\"><p>".$r[1]."</p><p>"."$r[2]."."</p></td>
                      </tr>";
                }
                else{
                  echo "<td nowrap=\"nowrap\" colspan=\"5\">".$r[0]."</td>
                        <td nowrap=\"nowrap\" colspan=\"5\">".$r[1]."</td>
                      </tr>";
                }
        }

        //actions
        echo "<tr>
                <th style = 'background-color: #f06272;' colspan=\"10\" nowrap=\"nowrap\">Actions</th>
              </tr>";
        foreach ($record['actions'] as $key => $r) {
          echo "<tr>
                  <td nowrap=\"nowrap\" colspan=\"5\">".$r[0]."</td>
                  <td nowrap=\"nowrap\" colspan=\"5\">".$r[1]."</td>
                </tr>";
        }

        echo "<tr></tr></table>";
      }

      echo "</body></html>";

      return true ;
    }


    public function export_form15()
    {
      $user_id =$this->input->post('user_id');
      $start = $this->input->post('start');
      $end = $this->input->post('end');
      $role =$this->input->post('role');
      $form_id = $this->input->post('form_id');

      if($start)
      {
        $start = date('Y-m-d',strtotime($this->input->post('start')));
        $this->db->where('DATE(created) >=',$start);
      }

      if($end)
      {
        $end = date('Y-m-d',strtotime($this->input->post('end')));
        $this->db->where('DATE(created) <=',$end);
      }

      $form_two_data = $this->db->order_by('id',"DESC")->get_where("form_two",array('emp_id'=>$user_id))->result_array();

      header("Content-Type: application/vnd.ms-excel");
      header('Content-Disposition: attachment; filename="Shop Profile - ' . date('d-m-Y') . '.xls"');
      echo "<html>
              <head>
                <meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" />
              </head>
                <body>";

      foreach ($form_two_data as $key => $record) {

        echo "<table border ='1'>
                <tr>
                  <th style = 'background-color: yellow;' colspan=\"10\" nowrap=\"nowrap\">Record ".($key+1)." on ".$record['created']."
                  </th>
                </tr>";

        $id = $record['shop_id'];
        $de_name = $this->db->query("select * from users where acc_no in(select distinct(acc_no) from shops where id = $id)")->row()->username;
        $sh_name = $this->db->query("select * from shops where id = $id")->row();

        echo  "<tr>
                <th colspan=\"2\" nowrap=\"nowrap\">Dealer Name</th>
                <td nowrap=\"nowrap\" colspan=\"3\">".@$de_name."</td>
                <th colspan=\"2\" nowrap=\"nowrap\">Shop Name</th>
                <td nowrap=\"nowrap\" colspan=\"3\">".@$sh_name->name."</td>
              </tr>
              <tr>                                                
                <th colspan=\"2\" nowrap=\"nowrap\">Date of Visit </th>
                <td nowrap=\"nowrap\" colspan=\"3\" style='text-align:left'>".$record["created"]."</td>
                <th colspan=\"2\" nowrap=\"nowrap\">Shop Location</th>
                <td nowrap=\"nowrap\" colspan=\"3\">".@$sh_name->address."</td>
              </tr>                                           
              <tr>
                <th colspan=\"2\" nowrap=\"nowrap\">Account</th>
                <td nowrap=\"nowrap\" colspan=\"3\" style='text-align:left'>".@$sh_name->acc_no."</td>
              </tr>
          </tbody>";

          echo "<table border='1'>
                  <tbody>
                      <tr style = 'background-color: #f06272;' colspan=\"10\" nowrap=\"nowrap\">
                          <th colspan=\"2\" nowrap=\"nowrap\">Zones</th>
                          <th colspan=\"6\" nowrap=\"nowrap\">Description (EN)</th>
                          <th colspan=\"2\" nowrap=\"nowrap\" style='text-align:center'>Score</th>
                      </tr>";

                      $fields = explode(',',$record["field_id"]);
                      $values = explode(',',$record["value"]);
                      $i=0;

                  foreach ($fields as $ke => $field){

                   if($ke==0)
                   {
                      echo  "<tr>
                              <td style = 'background-color: #f06272;font-weight:bold' colspan=\"2\" nowrap=\"nowrap\">A</td>
                              <td style = 'font-weight:bold' colspan=\"6\" colspan=\"6\" nowrap=\"nowrap\">Cleanness (40%)</td>
                              <td style = 'font-weight:bold' colspan=\"6\" colspan=\"2\" nowrap=\"nowrap\" style='text-align:center'>40</td>
                            </tr>";
                    }

                  if($ke==6)
                  {
                    echo  "<tr>
                            <td style = 'background-color: #f06272;font-weight:bold' colspan=\"2\" nowrap=\"nowrap\">B</td>
                            <td style = 'font-weight:bold' colspan=\"6\" nowrap=\"nowrap\">Organization (20%)</td>
                            <td style = 'font-weight:bold' colspan=\"6\" colspan=\"2\" nowrap=\"nowrap\" style='text-align:center'>20</td>
                          </tr>";
                  }
                  
                  if($ke==10) {

                    echo "<tr >
                            <td style = 'background-color: #f06272;font-weight:bold' colspan=\"2\" nowrap=\"nowrap\">C</td>
                            <td style = 'font-weight:bold' colspan=\"6\" colspan=\"6\" nowrap=\"nowrap\">Availability & Condition of POSM (40%)</td>
                            <td style = 'font-weight:bold' colspan=\"6\" colspan=\"2\" nowrap=\"nowrap\" style='text-align:center'>40</td>
                          </tr>";
                   }

                    echo  "<tr>
                            <td colspan=\"2\" nowrap=\"nowrap\"><?php echo @$ke+1; ?></td>
                            <td colspan=\"6\" nowrap=\"nowrap\">".$this->db->where("id",$field)->get("form_fields")->row_array()["name"]."</td>
                            <td colspan=\"2\" nowrap=\"nowrap\" style='text-align:center'>".$values[$i]."</td> 
                          </tr>";
                  $i++; }

                if($values)
                {
                  echo "<tfoot>
                          <tr style = 'background-color: #f06272;font-weight:bold' colspan=\"2\" nowrap=\"nowrap\">
                            <th colspan=\"8\" nowrap=\"nowrap\">Total Marks</th>
                            <th colspan=\"2\" nowrap=\"nowrap\" style='text-align:center'>".array_sum(@$values)."</th>
                          </tr>
                        </tfoot>" ;
                }
          echo "</tbody><tr></tr>";
      }

      echo "</table>";
      echo "</body></html>";
      return true ;
    }



    public function export_form16()
    {
      $user_id =$this->input->post('user_id');
      $start = $this->input->post('start');
      $end = $this->input->post('end');
      $role =$this->input->post('role');
      $form_id = $this->input->post('form_id');

      if($start)
      {
        $start = date('Y-m-d',strtotime($this->input->post('start')));
        $this->db->where('DATE(created) >=',$start);
      }

      if($end)
      {
        $end = date('Y-m-d',strtotime($this->input->post('end')));
        $this->db->where('DATE(created) <=',$end);
      }

      $form_three_data = $this->db->get_where("form_three",array('emp_id'=>$user_id))->result_array(); 

      header("Content-Type: application/vnd.ms-excel");
      header('Content-Disposition: attachment; filename="Shops List - ' . date('d-m-Y') . '.xls"');
      echo "<html>
              <head>
                <meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" />
              </head>
                <body>";

      foreach ($form_three_data as $key => $record) 
      {

        $owner_name = explode(',',$record["owner_name"]);
        $owner_email = explode(',',$record["owner_email"]);
        $owner_mobile = explode(',',$record["owner_mobile"]);
        $manager_name = explode(',',$record["manager_name"]);
        $manager_mobile = explode(',',$record["manager_mobile"]);
        $manager_email = explode(',',$record["manager_email"]);
        $salesman_name = explode(',',$record["salesman_name"]);
        $salesman_mobile = explode(',',$record["salesman_mobile"]);



        echo "<table border ='1'>
                <tr>
                  <th style = 'background-color: yellow;' colspan=\"6\" nowrap=\"nowrap\">Record ".($key+1)." on ".$record['created']."
                  </th>
                </tr>";

        //Employee & Shop Details
        echo  "<tr>
                <th style = 'background-color: #f06272;' colspan=\"3\" nowrap=\"nowrap\"> Employee Details
                </th>
                <th style = 'background-color: #f06272;' colspan=\"3\" nowrap=\"nowrap\"> Shop Details
                </th>
              </tr>";

        $emp_details = $this->db->where('id',$user_id)->get('users')->row_array();
        $shop_details = $this->db->where('id',$record['shop_id'])->get('shops')->row_array();

        echo "<tr>
                <td nowrap=\"nowrap\" colspan=\"1\">Username</td>
                <td nowrap=\"nowrap\" colspan=\"2\">".$emp_details['username']."</td>

                <td nowrap=\"nowrap\" colspan=\"1\">Name</td>
                <td nowrap=\"nowrap\" colspan=\"2\">".$shop_details['name']."</td>
              </tr>
              <tr>
                <td nowrap=\"nowrap\" colspan=\"1\">Email</td>
                <td nowrap=\"nowrap\" colspan=\"2\">".$emp_details['email']."</td>

                <td nowrap=\"nowrap\" colspan=\"1\">Email</td>
                <td nowrap=\"nowrap\" colspan=\"2\">".$shop_details['email']."</td>
              </tr>
              <tr>
                <td nowrap=\"nowrap\" colspan=\"1\">Phone</td>
                <td nowrap=\"nowrap\" colspan=\"2\" style='text-align:left'>".$emp_details['phone']."</td>

                <td nowrap=\"nowrap\" colspan=\"1\">Phone</td>
                <td nowrap=\"nowrap\" colspan=\"2\" style='text-align:left'>".$shop_details['phone']."</td>
              </tr>
              <tr>
                <td nowrap=\"nowrap\" colspan=\"1\">Code</td>
                <td nowrap=\"nowrap\" colspan=\"2\" style='text-align:left'>".$emp_details['code']."</td>

                <td nowrap=\"nowrap\" colspan=\"1\">Acct No</td>
                <td nowrap=\"nowrap\" colspan=\"2\" style='text-align:left'>".$shop_details['acc_no']."</td>
              </tr>";



        //Business Owner Start
        echo "<tbody>
                <tr>
                  <th style = 'background-color: #f06272;' colspan=\"6\" nowrap=\"nowrap\">Business Owner</th>
                </tr>
                <tr>
                  <th colspan=\"6\" nowrap=\"nowrap\">Responsible for all Government Rules & Regulations.Signs all Official Documents, Contracts etc.</th>
                </tr>
                <tr>
                    <th colspan=\"2\" nowrap=\"nowrap\">Name</th>
                    <th colspan=\"2\" nowrap=\"nowrap\">Mobile Number</th>
                    <th colspan=\"2\" nowrap=\"nowrap\">Email</th>
                </tr>";

              foreach(@$owner_name as $key => $oname) 
              {
               echo  "<tr>
                        <td colspan=\"2\" nowrap=\"nowrap\">".@$oname."</td>
                        <td colspan=\"2\" nowrap=\"nowrap\">".@$owner_mobile[$key]."</td>
                        <td colspan=\"2\" nowrap=\"nowrap\">".@$owner_email[$key]."</td>
                      </tr>";
              }
        echo "</tbody></table>" ;
        //Business Owner End

        //Business Manager Start
        echo "<table border ='1'>
                <tbody>
                  <tr>
                    <th style = 'background-color: #f06272;' colspan=\"6\" nowrap=\"nowrap\">Business Manager</th>
                  </tr>
                  <tr>
                  <th colspan=\"6\" nowrap=\"nowrap\">Responsible for the Business, including operations, sales, shops.Right person to contact regarding Sales Campaigns, Sales Targets, Product Launches etc.</th>
                  </tr>
                  <tr>
                      <th colspan=\"2\" nowrap=\"nowrap\">Name</th>
                      <th colspan=\"2\" nowrap=\"nowrap\">Mobile Number</th>
                      <th colspan=\"2\" nowrap=\"nowrap\">Email</th>
                  </tr>";
            foreach(@$manager_name as $ke => $mname)
            {
              echo  "<tr>
                      <td colspan=\"2\" nowrap=\"nowrap\">".@$mname."</td>
                      <td colspan=\"2\" nowrap=\"nowrap\">".@$manager_mobile[$ke]."</td>
                      <td colspan=\"2\" nowrap=\"nowrap\">".@$manager_email[$ke]."</td>
                    </tr>" ;
            }
        echo "</tbody></table>";
        //Business Manager End


        //Accountant Start
        echo "<table border ='1'>
              <tbody>
                <tr>
                  <th style = 'background-color: #f06272;' colspan=\"6\" nowrap=\"nowrap\">Accountant</th>
                </tr>
                <tr>
                  <th colspan=\"6\" nowrap=\"nowrap\">Responsible for All Financial Transactions for the Dealer. Payments, Balance Confirmation, Payment Agreement, Bonus etc.</th>
                </tr>
                <tr>
                    <th colspan=\"2\" nowrap=\"nowrap\">Name</th>
                    <th colspan=\"2\" nowrap=\"nowrap\">Mobile Number</th>
                    <th colspan=\"2\" nowrap=\"nowrap\">Email</th>
                </tr>";
         echo "<tr>
                <td colspan=\"2\" nowrap=\"nowrap\">".@$record["accountant_name"]."</td>
                <td colspan=\"2\" nowrap=\"nowrap\">".@$record["accountant_mobile"]."</td>
                <td colspan=\"2\" nowrap=\"nowrap\">".@$record["accountant_email"]."</td>
              </tr>";
        echo "</tbody></table>";
        //Accountant End


        //Shop Salesman Start
        echo "<table border ='1'>
              <tbody>
                <tr>
                  <th style = 'background-color: #f06272;' colspan=\"6\" nowrap=\"nowrap\">Shop Salesman</th>
                </tr>
                <tr>
                  <th colspan=\"6\" nowrap=\"nowrap\">Shop Salesman, responsible for Sell out from shop.Contact Person for Market Input, Sell out Campaigns, Shop Salesman Incentive, Painters Information etc.
                  </th>
                </tr>
                <tr>
                  <th colspan=\"3\" nowrap=\"nowrap\">Name</th>
                  <th colspan=\"3\" nowrap=\"nowrap\">Mobile Number</th>
                </tr>";

            foreach(@$salesman_name as $key => $sname) 
            {
             echo  "<tr>
                      <td colspan=\"3\" nowrap=\"nowrap\">".@$sname."</td>
                      <td colspan=\"3\" nowrap=\"nowrap\">".@$salesman_mobile[$key]."</td>
                    </tr>";
            }
        echo "</tbody></table>" ;
        //Shop Salesman End


        //Multicolor Machine Operator Start
        echo "<table border ='1'>
              <tbody>
                <tr>
                  <th style = 'background-color: #f06272;' colspan=\"6\" nowrap=\"nowrap\">Multicolor Machine Operator</th>
                </tr>
                <tr>
                  <th colspan=\"6\" nowrap=\"nowrap\">Operates the Machine Tints the colors.Responsible for Global Network, Machine Maintenance etc.</th>
                </tr>
                <tr>
                    <th colspan=\"3\" nowrap=\"nowrap\">Name</th>
                    <th colspan=\"3\" nowrap=\"nowrap\">Mobile Number</th>
                </tr>";
         echo "<tr>
                <td colspan=\"3\" nowrap=\"nowrap\">".@$record["operator_name"]."</td>
                <td colspan=\"3\" nowrap=\"nowrap\">".@$record["operator_mobile"]."</td>
              </tr>";
        echo "</tbody></table>";
        //Multicolor Machine Operator End


        //Shop Help Start
        echo "<table border ='1'>
              <tbody>
                <tr>
                  <th style = 'background-color: #f06272;' colspan=\"6\" nowrap=\"nowrap\">Shop Help</th>
                </tr>
                <tr>
                  <th colspan=\"6\" nowrap=\"nowrap\">Always in the shop assists in loading, offloading, tinting, delivery etc.</th>
                </tr>
                <tr>
                    <th colspan=\"3\" nowrap=\"nowrap\">Name</th>
                    <th colspan=\"3\" nowrap=\"nowrap\">Mobile Number</th>
                </tr>";
         echo "<tr>
                <td colspan=\"3\" nowrap=\"nowrap\">".@$record["help_name"]."</td>
                <td colspan=\"3\" nowrap=\"nowrap\">".@$record["help_mobile"]."</td>
              </tr>";
        echo "</tbody></table>";
        //Shop Help End
      }

      echo "</body></html>";

      return true ;
    }


    public function export_form17()
    {
      $user_id =$this->input->post('user_id');
      $start = $this->input->post('start');
      $end = $this->input->post('end');
      $role =$this->input->post('role');
      $form_id = $this->input->post('form_id');

      if($start)
      {
        $start = date('Y-m-d',strtotime($this->input->post('start')));
        $this->db->where('DATE(created) >=',$start);
      }

      if($end)
      {
        $end = date('Y-m-d',strtotime($this->input->post('end')));
        $this->db->where('DATE(created) <=',$end);
      }

      $form_four_data = $this->db->order_by('id',"DESC")->get_where("form_four",array('emp_id'=>$user_id))->result_array(); 

      header("Content-Type: application/vnd.ms-excel");
      header('Content-Disposition: attachment; filename="Add Profile - ' . date('d-m-Y') . '.xls"');
      echo "<html>
              <head>
                <meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" />
              </head>
                <body>";

      foreach ($form_four_data as $key => $record) 
      {
        echo "<table border ='1'>
                <tr>
                  <th style = 'background-color: yellow;' colspan=\"6\" nowrap=\"nowrap\">Record ".($key+1)." on ".$record['created']."
                  </th>
                </tr>";

        //Employee & Shop Details
        echo  "<tr>
                <th style = 'background-color: #f06272;' colspan=\"3\" nowrap=\"nowrap\"> Employee Details
                </th>
                <th style = 'background-color: #f06272;' colspan=\"3\" nowrap=\"nowrap\"> Shop Details
                </th>
              </tr>";

        $emp_details = $this->db->where('id',$user_id)->get('users')->row_array();
        $shop_details = $this->db->where('id',$record['shop_id'])->get('shops')->row_array();

        $reception_area = explode(',', $record['reception_area']);
        $type_of_area = explode(',', $record['type_of_area']);
        $shop_facade = explode(',', $record['shop_facade']);
        $jcci = explode(',', $record['jcci']);
        $jcce = explode(',', $record['jcce']);
        $design_gallery = explode(',', $record['design_gallery']);
        $enterior_display = explode(',', $record['enterior_display']);

        echo "<tr>
                <td nowrap=\"nowrap\" colspan=\"1\">Username</td>
                <td nowrap=\"nowrap\" colspan=\"2\">".$emp_details['username']."</td>

                <td nowrap=\"nowrap\" colspan=\"1\">Name</td>
                <td nowrap=\"nowrap\" colspan=\"2\">".$shop_details['name']."</td>
              </tr>
              <tr>
                <td nowrap=\"nowrap\" colspan=\"1\">Email</td>
                <td nowrap=\"nowrap\" colspan=\"2\">".$emp_details['email']."</td>

                <td nowrap=\"nowrap\" colspan=\"1\">Email</td>
                <td nowrap=\"nowrap\" colspan=\"2\">".$shop_details['email']."</td>
              </tr>
              <tr>
                <td nowrap=\"nowrap\" colspan=\"1\">Phone</td>
                <td nowrap=\"nowrap\" colspan=\"2\" style='text-align:left'>".$emp_details['phone']."</td>

                <td nowrap=\"nowrap\" colspan=\"1\">Phone</td>
                <td nowrap=\"nowrap\" colspan=\"2\" style='text-align:left'>".$shop_details['phone']."</td>
              </tr>
              <tr>
                <td nowrap=\"nowrap\" colspan=\"1\">Code</td>
                <td nowrap=\"nowrap\" colspan=\"2\" style='text-align:left'>".$emp_details['code']."</td>

                <td nowrap=\"nowrap\" colspan=\"1\">Acct No</td>
                <td nowrap=\"nowrap\" colspan=\"2\" style='text-align:left'>".$shop_details['acc_no']."</td>
              </tr>";

        //Shop Help Start
        echo "<table border ='1'>
              <tbody>
                <tr>
                  <th style = 'background-color: #f06272;' colspan=\"6\" nowrap=\"nowrap\">Reception Area</th>
                </tr>";
            foreach ($reception_area as $key => $image) 
            {
              echo "<tr><td colspan=\"6\" nowrap=\"nowrap\"><a href=".base_url()."server/assets/shop_profiles/".$image.">".base_url()."server/assets/shop_profiles/".$image."</a></td></tr>";
            }

        echo "<tr><tr></tbody></table>";
        //Shop Help End

        //Shop Help Start
        echo "<table border ='1'>
              <tbody>
                <tr>
                  <th style = 'background-color: #f06272;' colspan=\"6\" nowrap=\"nowrap\">Any Other Photo</th>
                </tr>";
            foreach ($type_of_area as $key => $image) 
            {
              echo "<tr><td colspan=\"6\" nowrap=\"nowrap\"><a href=".base_url()."server/assets/shop_profiles/".$image.">".base_url()."server/assets/shop_profiles/".$image."</a></td></tr>";
            }

        echo "<tr><tr></tbody></table>";
        //Shop Help End

        //Shop Help Start
        echo "<table border ='1'>
              <tbody>
                <tr>
                  <th style = 'background-color: #f06272;' colspan=\"6\" nowrap=\"nowrap\">Shop Facade</th>
                </tr>";
            foreach ($shop_facade as $key => $image) 
            {
              echo "<tr><td colspan=\"6\" nowrap=\"nowrap\"><a href=".base_url()."server/assets/shop_profiles/".$image.">".base_url()."server/assets/shop_profiles/".$image."</a></td></tr>";
            }

        echo "<tr><tr></tbody></table>";
        //Shop Help End

        //Shop Help Start
        echo "<table border ='1'>
              <tbody>
                <tr>
                  <th style = 'background-color: #f06272;' colspan=\"6\" nowrap=\"nowrap\">JCCI</th>
                </tr>";
            foreach ($jcci as $key => $image) 
            {
              echo "<tr><td colspan=\"6\" nowrap=\"nowrap\"><a href=".base_url()."server/assets/shop_profiles/".$image.">".base_url()."server/assets/shop_profiles/".$image."</a></td></tr>";
            }

        echo "<tr><tr></tbody></table>";
        //Shop Help End

        //Shop Help Start
        echo "<table border ='1'>
              <tbody>
                <tr>
                  <th style = 'background-color: #f06272;' colspan=\"6\" nowrap=\"nowrap\">JCCE</th>
                </tr>";
            foreach ($jcce as $key => $image) 
            {
              echo "<tr><td colspan=\"6\" nowrap=\"nowrap\"><a href=".base_url()."server/assets/shop_profiles/".$image.">".base_url()."server/assets/shop_profiles/".$image."</a></td></tr>";
            }

        echo "<tr><tr></tbody></table>";
        //Shop Help End
        //Shop Help Start
        echo "<table border ='1'>
              <tbody>
                <tr>
                  <th style = 'background-color: #f06272;' colspan=\"6\" nowrap=\"nowrap\">Design Gallery</th>
                </tr>";
            foreach ($design_gallery as $key => $image) 
            {
              echo "<tr><td colspan=\"6\" nowrap=\"nowrap\"><a href=".base_url()."server/assets/shop_profiles/".$image.">".base_url()."server/assets/shop_profiles/".$image."</a></td></tr>";
            }

        echo "<tr><tr></tbody></table>";
        //Shop Help End

        //Shop Help Start
        echo "<table border ='1'>
              <tbody>
                <tr>
                  <th style = 'background-color: #f06272;' colspan=\"6\" nowrap=\"nowrap\">Enterior Display</th>
                </tr>";
            foreach ($enterior_display as $key => $image) 
            {
              echo "<tr><td colspan=\"6\" nowrap=\"nowrap\"><a href=".base_url()."server/assets/shop_profiles/".$image.">".base_url()."server/assets/shop_profiles/".$image."</a></td></tr>";
            }

        echo "<tr><tr></tbody></table>";
        //Shop Help End

      }

      echo "</body></html>";

      return true ;
    }


    public function generate_report()
    {
        $user_id =$this->input->post('user_id');
        $star = $this->input->post('start');
        $en = $this->input->post('end');
        $role =$this->input->post('role');
        $form_id = $this->input->post('form_id');


        //New Forms
        if($form_id==14)
        {
          return $this->export_form14();
        }

        //New Forms
        if($form_id==15)
        {
          return $this->export_form15();
        }

        //New Forms
        if($form_id==16)
        {
          return $this->export_form16();
        }

        //New Forms
        if($form_id==17)
        {
          return $this->export_form17();
        }


        if($role=="salesman")
        {
            if($star != "" && $en != "")
            {
                $start = date("Y-m-d H:i:s",strtotime($star));
                $end = date("Y-m-d H:i:s",strtotime($en));
                $result = $this->db->query("select GROUP_CONCAT(id) as form_ids from task_forms where task_id in(select id from tasks where user_id=$user_id AND created >= '".$start."' and created <= '".$end."') and form_id=$form_id and status!=1")->result_array();
            }
            else
            {
                $result = $this->db->query("select GROUP_CONCAT(id) as form_ids from task_forms where task_id in(select id from tasks where user_id=$user_id) and form_id=$form_id and status!=1")->result_array();
            }
            $form_ids = $result[0]['form_ids'];
            $sales_data = $this->db->where("id",$user_id)->get("users")->row_array();
        }
        else
        {
            if($star != "" && $en != "")
            {
                $start = date("Y-m-d H:i:s",strtotime($star));
                $end = date("Y-m-d H:i:s",strtotime($en));
                $result = $this->db->query("select GROUP_CONCAT(id) as form_ids from task_forms where task_id in(select id from tasks where shop_id in(SELECT shop_id from dealers_shops where user_id=$user_id AND created >= '".$start."' and created <= '".$end."')) and form_id=$form_id and status!=1")->result_array();
            }
            else
            {
                $result = $this->db->query("select GROUP_CONCAT(id) as form_ids from task_forms where task_id in(select id from tasks where shop_id in(SELECT shop_id from dealers_shops where user_id=$user_id)) and form_id=$form_id and status!=1")->result_array();
            }

            $form_ids = $result[0]['form_ids'];
            $sales_data = $this->db->where("id",$user_id)->get("users")->row_array();
        }

      //  print_r($result);exit;

        if($form_id == 12)
        {

                if($form_ids != "")
                {
                    $employee_data = $this->db->query("select * from task_form_four where task_form_id in($form_ids)")->result();
                }
                else
                {
                    $employee_data = array();
                }


                		header("Content-Type: application/vnd.ms-excel");
                        header('Content-Disposition: attachment; filename="DEALER_INFORMATION' . date('d-m-Y') . '.xls"');
                        echo "<html><head><meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" /></head><body><table border ='1'>
                                              <tr >
                                                <th style = 'background-color: #f06272;' colspan=\"11\" nowrap=\"nowrap\">Dealer Information Report</th>
                                              </tr><tr >";

                                              if($role=="salesman"){
                                                echo "<th  colspan=\"5\">SalesMan Name</th>
                                                <th  colspan=\"6\">".$sales_data['username']."</th>
                                              </tr>";
                                              }
                                              else
                                              {
                                                  echo "<th  colspan=\"5\">Dealer Name</th>
                                                 <th  colspan=\"6\">".$sales_data['username']."</th>
                                                  </tr>";
                                              }

                                              $i=1;

            		foreach($employee_data as $ky=>$row)
            		{
            		    $shop_name = $this->sales_model->shop_name($row->task_form_id);
            		    $shop_data = $this->sales_model->shop_address($row->task_form_id);
            		    $shop_address = $this->localname($shop_data['latitude'],$shop_data['longitude']);
            		    if($role=="salesman")
            		    {
            		       $dealer_name = $this->sales_model->dealer_name($row->task_form_id);
            		    }else{
            		       $salesman_name = $this->sales_model->salesman_name($row->task_form_id);
            		    }


            			 if($ky==0){
                                                            echo "<tr >
                                                                <th nowrap=\"nowrap\">S No</th>
                                                                <th nowrap=\"nowrap\">Name</th>
                                                                <th nowrap=\"nowrap\">Occupation</th>
                                                                <th nowrap=\"nowrap\">Phone Number</th>
                                                                <th nowrap=\"nowrap\">Email</th>
                                                                <th nowrap=\"nowrap\">Home Town</th>
                                                                <th nowrap=\"nowrap\">Address</th>
                                                                <th nowrap=\"nowrap\">Shop Name</th>
                                                                <th nowrap=\"nowrap\">Shop Address</th>";
                                                                if($role=="salesman"){
                                                                echo "<th nowrap=\"nowrap\">Dealer Name</th>";
                                                                }else{
                                                                    echo "<th nowrap=\"nowrap\">Salesman Name</th>";
                                                                }
                                                                echo "<th nowrap=\"nowrap\">Date</th>
                                                              </tr>";
                                      }
                                                                echo "<tr>
                                                                <td>$i</td>
                                                                <td>".$row->dealer_name."</td>
                                                                <td>".$row->occupation."</td>
                                                                <td>".$row->phone_number."</td>
                                                                <td>".$row->email."</td>
                                                                <td>".$row->home_town."</td>
                                                                <td>".$row->address."</td>
                                                                <td>".$shop_name."</td>
                                                                <td>".$shop_address."</td>";
                                                                if($role=="salesman")
                                                                {
                                                                echo "<td>".$dealer_name."</td>";
                                                                }
                                                                else
                                                                {
                                                                    echo "<td>".$salesman_name."</td>";
                                                                }
                                                                echo "<td>".$row->date."</td>
                                                               </tr>";

                                        $i++;
            		}
            		echo "</table></body></html>";

        }
        else if($form_id==9)
        {
        		if($form_ids != "")
        		{
        		     $s_ids = explode(',',$form_ids);
        		    // print_r($s_ids);exit;
        		}
        		else
        		{
        		    $s_ids = array();
        		}

           	header("Content-Type: application/vnd.ms-excel");
                        header('Content-Disposition: attachment; filename="SHOP_INFORMATION' . date('d-m-Y') . '.xls"');
                        echo "<html><head><meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" /></head><body><table border ='1'>
                                              <tr >
                                                <th style = 'background-color: #24AC3F;' colspan=\"8\" nowrap=\"nowrap\">SHOP Information Report</th>
                                              </tr><tr >";
                                               if($role=="salesman"){
                                                echo "<th  colspan=\"4\">SalesMan Name</th>
                                                <th  colspan=\"4\">".$sales_data['username']."</th>
                                              </tr>";
                                              }
                                              else
                                              {
                                                  echo "<th  colspan=\"4\">Dealer Name</th>
                                                 <th  colspan=\"4\">".$sales_data['username']."</th>
                                                  </tr>";
                                              }



            //$excel_row=2;
            foreach($s_ids as $key=>$value)
            {

               $shops = $this->db->where("task_form_id",$value)->get("task_form_shop_information")->result_array();
               //$excel_row;
               $i=1;
               foreach($shops as $ky=>$shop)
               {
            	    	$shop_name = $this->sales_model->shop_name($shop['task_form_id']);
            	    	$shop_data = $this->sales_model->shop_address($shop['task_form_id']);
            	    	$shop_address = $this->localname($shop_data['latitude'],$shop_data['longitude']);

            	    	if($role=="salesman")
            		    {
            		       $dealer_name = $this->sales_model->dealer_name($shop['task_form_id']);
            		    }else{
            		       $salesman_name = $this->sales_model->salesman_name($shop['task_form_id']);
            		    }

            			    if($ky==0){
                                                            echo "<tr>
                                                                    <th nowrap=\"nowrap\">Shop Name</th>
                                                                    <th nowrap=\"nowrap\">".@$shop_name."</th>
                                                                    <th nowrap=\"nowrap\">Shop Address</th>
                                                                    <th nowrap=\"nowrap\">".@$shop_address."</th>";
                                                                     if($role=="salesman"){
                                                                echo "<th nowrap=\"nowrap\">Dealer Name</th>
                                                                <th nowrap=\"nowrap\">".@$dealer_name."</th>";
                                                                }else{
                                                                    echo "<th nowrap=\"nowrap\">Salesman Name</th>
                                                                    <th nowrap=\"nowrap\">".@$salesman_name."</th>";
                                                                }


                                                                    echo "<th nowrap=\"nowrap\">Date</th>
                                                                    <th nowrap=\"nowrap\">".@$shop['created']."</th>
                                                                </tr>
                                                                <tr>
                                                                    <th  colspan=\"2\" nowrap=\"nowrap\">Shop Type</th>
                                                                    <th  colspan=\"2\" nowrap=\"nowrap\">".@$shops[0]['shop_type']."</th>
                                                                    <th  colspan=\"2\" nowrap=\"nowrap\">No Of Openings</th>
                                                                    <th  colspan=\"2\" nowrap=\"nowrap\">".@$shops[0]['no_openings']."</th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan=\"2\" nowrap=\"nowrap\">New Concept</th>
                                                                    <th colspan=\"2\" nowrap=\"nowrap\">".@$shops[0]['new_concept']."</th>
                                                                    <th colspan=\"2\" nowrap=\"nowrap\">Flag Ship Store</th>
                                                                    <th colspan=\"2\" nowrap=\"nowrap\">".@$shops[0]['flag_ship_store']."</th>
                                                                </tr>
                                                               <tr >
                                                                    <th nowrap=\"nowrap\">S No</th>
                                                                    <th colspan=\"2\" nowrap=\"nowrap\">Name</th>
                                                                    <th colspan=\"2\" nowrap=\"nowrap\">Nationality</th>
                                                                    <th nowrap=\"nowrap\">Phone Number</th>
                                                                    <th nowrap=\"nowrap\">Expirence</th>
                                                                    <th nowrap=\"nowrap\">Type</th>
                                                              </tr>";
                                      }
                                                                echo "<tr>
                                                                <td>$i</td>
                                                                <td colspan=\"2\">".@$shop['sales_man_staff']."</td>
                                                                <td colspan=\"2\">".@$shop['nationality']."</td>
                                                                <td>".@$shop['phone_no']."</td>
                                                                <td>".@$shop['experience']."</td><td>";
                                                                if($shop['status']==1){ echo "SALES MAN";}else{ echo "STAFF"; }
                                                               echo "</td></tr>";

                                        $i++;
            			//$excel_row++;
               }
              // $excel_row++;

            }
            	   	echo "</table></body></html>";

        }
        else if($form_id==11)
        {
                if($form_ids != "")
        		{
        		     $s_ids = explode(',',$form_ids);
        		}
        		else
        		{
        		    $s_ids = array();
        		}
                        header("Content-Type: application/vnd.ms-excel");
                        header('Content-Disposition: attachment; filename="SHOP_EVALUATION' . date('d-m-Y') . '.xls"');
                        echo "<html><head><meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" /></head><body><table border ='1'>
                                              <tr >
                                                <th style = 'background-color: #FE5D17;' colspan=\"8\" nowrap=\"nowrap\">Shop Evaluation Report</th>
                                              </tr><tr >";
                                                if($role=="salesman"){
                                                echo "<th  colspan=\"4\">SalesMan Name</th>
                                                <th  colspan=\"4\">".$sales_data['username']."</th>
                                              </tr>";
                                              }
                                              else
                                              {
                                                  echo "<th  colspan=\"4\">Dealer Name</th>
                                                 <th  colspan=\"4\">".$sales_data['username']."</th>
                                                  </tr>";
                                              }
            $excel_row=2;
            foreach($s_ids as $key=>$value)
            {

               $shops = $this->db->where("task_form_id",$value)->get("task_form_three")->result_array();
               $status1 = $this->db->where(array("task_form_id"=>$value,"status"=>1))->get("task_form_three")->result_array();
               $sum1 = $this->db->query("select sum(value) as score from task_form_three where task_form_id=$value and status=1")->row_array()['score'];
               $sum2 = $this->db->query("select sum(value) as score from task_form_three where task_form_id=$value and status=2")->row_array()['score'];
               $sum3 = $this->db->query("select sum(value) as score from task_form_three where task_form_id=$value and status=3")->row_array()['score'];
               $avg = $this->db->query("select sum(value) as score from task_form_three where task_form_id=$value and status in(1,2,3)")->row_array()['score'];
               $status2 = $this->db->where(array("task_form_id"=>$value,"status"=>2))->get("task_form_three")->result_array();
               $status3 = $this->db->where(array("task_form_id"=>$value,"status"=>3))->get("task_form_three")->result_array();

               $i=1;
               foreach($status1 as $ky=>$shop)
               {
                        $shop_name = $this->sales_model->shop_name($shop['task_form_id']);
                        $shop_data = $this->sales_model->shop_address($shop['task_form_id']);
                        $shop_address = $this->localname($shop_data['latitude'],$shop_data['longitude']);

                        if($role=="salesman")
            		    {
            		       $dealer_name = $this->sales_model->dealer_name($shop['task_form_id']);
            		    }else{
            		       $salesman_name = $this->sales_model->salesman_name($shop['task_form_id']);
            		    }
                        $field_name = $this->sales_model->field_name($shop['field_id']);

                                      if($ky==0){
                                                            echo " <tr>
                                                                    <th>Shop Name</th>
                                                                    <td>".$shop_name."</th>
                                                                     <th>Shop Address</th>
                                                                    <td>".$shop_address."</th>
                                                                    <th>Date</th>
                                                                    <td>".$shop['created']."</th>";
                                                                     if($role=="salesman"){
                                                                echo "<th nowrap=\"nowrap\">Dealer Name</th>
                                                                <th nowrap=\"nowrap\">".@$dealer_name."</th>";
                                                                }else{
                                                                    echo "<th nowrap=\"nowrap\">Salesman Name</th>
                                                                    <th nowrap=\"nowrap\">".@$salesman_name."</th>";
                                                                }

                                                               echo" </tr><tr >
                                                                <th nowrap=\"nowrap\">S No</th>
                                                                <th nowrap=\"nowrap\"  colspan=\"5\">Shop Hygiene</th>
                                                                <th nowrap=\"nowrap\" colspan=\"2\">Score</th>
                                                              </tr>";
                                      }
                                                                echo "<tr>
                                                                <td>$i</td>
                                                                <td colspan=\"5\">".$field_name."</td>
                                                                <td colspan=\"2\">" .$shop['value']. "</td>
                                                               </tr>";
                                                               if(sizeof($status1)==$i)
                                                               {
                                                                    echo "<tr>
                                                                         <th></th>
                                                                        <th colspan=\"5\">TOTAL</th>
                                                                        <th colspan=\"2\">".$sum1."</th>

                                                                      </tr>
                                                                      <tr>
                                                                      </tr>";
                                                               }
                                        $i++;


               }

               echo " <tr >
                        <th nowrap=\"nowrap\">S No</th>
                        <th nowrap=\"nowrap\"  colspan=\"5\">Display and Marchandising</th>
                        <th nowrap=\"nowrap\" colspan=\"2\">Score</th>
                      </tr>";

                $j=1;
               foreach($status2 as $ky=>$shop)
               {
                        $shop_name = $this->sales_model->shop_name($shop['task_form_id']);
                        $field_name = $this->sales_model->field_name($shop['field_id']);


                                                            echo " <tr>
                                                                <td>$j</td>
                                                                <td colspan=\"5\">".$field_name."</td>
                                                                <td colspan=\"2\">" .$shop['value']. "</td>
                                                               </tr>";
                                                               if(sizeof($status2)==$j)
                                                               {
                                                                    echo "<tr>
                                                                        <th></th>
                                                                        <th colspan=\"5\">TOTAL</th>
                                                                        <th colspan=\"2\">".$sum2."</th>
                                                                      </tr>
                                                                      <tr>
                                                                      </tr>";
                                                               }
                                        $j++;


               }

               echo " <tr >
                        <th nowrap=\"nowrap\">S No</th>
                        <th nowrap=\"nowrap\" colspan=\"5\">Multi colour Care</th>
                        <th nowrap=\"nowrap\" colspan=\"2\">Score</th>
                      </tr>";

                $k=1;
               foreach($status3 as $ky=>$shop)
               {
                        $shop_name = $this->sales_model->shop_name($shop['task_form_id']);
                        $field_name = $this->sales_model->field_name($shop['field_id']);


                                                            echo " <tr>
                                                                <td>$k</td>
                                                                <td colspan=\"5\">".$field_name."</td>
                                                                <td colspan=\"2\">" .$shop['value']. "</td>
                                                               </tr>";
                                                               if(sizeof($status3)==$k)
                                                               {
                                                                    echo "<tr>
                                                                        <th></th>
                                                                        <th colspan=\"5\">TOTAL</th>
                                                                        <th colspan=\"2\">".$sum3."</th>

                                                                      </tr>
                                                                      ";
                                                               }
                                        $k++;


               }
               echo "<tr>
               <th colspan=\"6\">Total Avarage</th><th colspan=\"2\">".$avg." %"."</th>
               </tr><tr></tr>";
            }
            echo "</table></body></html>";
        }
        else if($form_id==10)
        {
                    if($form_ids != "")
            		{
            		     $employee_data = $this->db->query("select * from task_form_dealer_profitability_program where task_form_id in($form_ids)")->result();
            		}
            		else
            		{
            		    $employee_data =array();
            		}


            	header("Content-Type: application/vnd.ms-excel");
                        header('Content-Disposition: attachment; filename="DEALER_PORTABILITY' . date('d-m-Y') . '.xls"');
                        echo "<html><head><meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" /></head><body><table border ='1'>
                                              <tr >
                                                <th style = 'background-color:#17FE1F;' colspan=\"8\" nowrap=\"nowrap\">Dealer Profitability Program Report</th>
                                              </tr><tr >";
                                                 if($role=="salesman"){
                                                echo "<th  colspan=\"4\">SalesMan Name</th>
                                                <th  colspan=\"4\">".$sales_data['username']."</th>
                                              </tr>";
                                              }
                                              else
                                              {
                                                  echo "<th  colspan=\"4\">Dealer Name</th>
                                                 <th  colspan=\"4\">".$sales_data['username']."</th>
                                                  </tr>";
                                              }

            		foreach($employee_data as $row)
            		{
            			$shop_name = $this->sales_model->shop_name($row->task_form_id);
            			$shop_data = $this->sales_model->shop_address($row->task_form_id);
            			$shop_address = $this->localname($shop_data['latitude'],$shop_data['longitude']);

            			if($role=="salesman")
            		    {
            		       $dealer_name = $this->sales_model->dealer_name($row->task_form_id);
            		    }else{
            		       $salesman_name = $this->sales_model->salesman_name($row->task_form_id);
            		    }



                                                            echo "<tr>
                                                                    <th nowrap=\"nowrap\">Shop Name</th>
                                                                    <th nowrap=\"nowrap\">".@$shop_name."</th>
                                                                    <th nowrap=\"nowrap\">Shop Address</th>
                                                                    <th nowrap=\"nowrap\">".@$shop_address."</th>";
                                                                     if($role=="salesman"){
                                                                echo "<th nowrap=\"nowrap\">Dealer Name</th>
                                                                <th nowrap=\"nowrap\">".@$dealer_name."</th>";
                                                                }else{
                                                                    echo "<th nowrap=\"nowrap\">Salesman Name</th>
                                                                    <th nowrap=\"nowrap\">".@$salesman_name."</th>";
                                                                }
                                                                    echo "<th nowrap=\"nowrap\">Date</th>
                                                                    <th nowrap=\"nowrap\">".@$row->created."</th>
                                                                </tr>
                                                                <tr>
                                                                    <th  colspan=\"2\" nowrap=\"nowrap\">Review Date</th>
                                                                    <th  colspan=\"2\" nowrap=\"nowrap\">".@$row->review_date."</th>
                                                                    <th  colspan=\"2\" nowrap=\"nowrap\">Review Done With</th>
                                                                    <th  colspan=\"2\" nowrap=\"nowrap\">".@$row->review_done_with."</th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan=\"2\" nowrap=\"nowrap\">Date Of Next Review</th>
                                                                    <th colspan=\"2\" nowrap=\"nowrap\">".@$row->date_of_next_review."</th>
                                                                    <th colspan=\"2\" nowrap=\"nowrap\">Aggred Actions</th>
                                                                    <th colspan=\"2\" nowrap=\"nowrap\">".@$row->agreed_actions."</th>
                                                                </tr>
                                                               <tr >
                                                                    <th nowrap=\"nowrap\">S No</th>
                                                                    <th colspan=\"2\" nowrap=\"nowrap\">Product</th>
                                                                    <th colspan=\"2\" nowrap=\"nowrap\">Sell Up Product</th>
                                                                    <th colspan=\"2\" nowrap=\"nowrap\">Incremental Sales</th>
                                                                    <th nowrap=\"nowrap\">Product Target</th>
                                                              </tr>";
                                      $products = explode(',',$row->product);
                                      $sell_up_product = explode(',',$row->sell_up_product);
                                      $incremental_sales = explode(',',$row->incremental_sales);
                                      $product_target = explode(',',$row->product_target);
                                      $i=1;
                                      foreach($products as $key=>$product)
                                      {
                                                                echo "<tr>
                                                                <td>$i</td>
                                                                <td colspan=\"2\">".@$products[$key]."</td>
                                                                <td colspan=\"2\">".@$sell_up_product[$key]."</td>
                                                                <td colspan=\"2\">".@$incremental_sales[$key]."</td>
                                                                <td>".@$product_target[$key]."</td>
                                                               </tr>";

                                        $i++;
                                      }
            		}
            		 echo "</table></body></html>";
        }
        else if($form_id==13)
        {
        		if($form_ids != "")
        		{
        		     $s_ids = explode(',',$form_ids);
        		    // print_r($s_ids);exit;
        		}
        		else
        		{
        		    $s_ids = array();
        		}

           	header("Content-Type: application/vnd.ms-excel");
                        header('Content-Disposition: attachment; filename="SALES_VISIT' . date('d-m-Y') . '.xls"');
                        echo "<html><head><meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" /></head><body><table border ='1'>
                                              <tr >
                                                <th style = 'background-color: #24AC3F;' colspan=\"8\" nowrap=\"nowrap\">Sales Visit Report</th>
                                              </tr><tr >";
                                               if($role=="salesman"){
                                                echo "<th  colspan=\"4\">SalesMan Name</th>
                                                <th  colspan=\"4\">".$sales_data['username']."</th>
                                              </tr>";
                                              }
                                              else
                                              {
                                                  echo "<th  colspan=\"4\">Dealer Name</th>
                                                 <th  colspan=\"4\">".$sales_data['username']."</th>
                                                  </tr>";
                                              }



            //$excel_row=2;
            foreach($s_ids as $key=>$value)
            {

               $shops = $this->db->where("task_form_id",$value)->get("task_form_five")->result_array();
               //$excel_row;
               $i=1;
               foreach($shops as $ky=>$shop)
               {
            	    	$shop_name = $this->sales_model->shop_name($shop['task_form_id']);
            	    	$shop_data = $this->sales_model->shop_address($shop['task_form_id']);
            	    	$shop_address = $this->localname($shop_data['latitude'],$shop_data['longitude']);

            	    	if($role=="salesman")
            		    {
            		       $dealer_name = $this->sales_model->dealer_name($shop['task_form_id']);
            		    }else{
            		       $salesman_name = $this->sales_model->salesman_name($shop['task_form_id']);
            		    }

            			    if($ky==0){
                                                            echo "<tr>
                                                                    <th nowrap=\"nowrap\">Shop Name</th>
                                                                    <th nowrap=\"nowrap\">".@$shop_name."</th>
                                                                    <th nowrap=\"nowrap\">Shop Address</th>
                                                                    <th nowrap=\"nowrap\">".@$shop_address."</th>";
                                                                     if($role=="salesman"){
                                                                echo "<th nowrap=\"nowrap\">Dealer Name</th>
                                                                <th nowrap=\"nowrap\">".@$dealer_name."</th>";
                                                                }else{
                                                                    echo "<th nowrap=\"nowrap\">Salesman Name</th>
                                                                    <th nowrap=\"nowrap\">".@$salesman_name."</th>";
                                                                }


                                                                    echo "<th nowrap=\"nowrap\">Date</th>
                                                                    <th nowrap=\"nowrap\">".@$shop['created_on']."</th>
                                                                </tr>


                                                               <tr >
                                                                    <th nowrap=\"nowrap\">S No</th>
                                                                    <th colspan=\"4\" nowrap=\"nowrap\"></th>
                                                                    <th colspan=\"3\" nowrap=\"nowrap\"></th>

                                                              </tr>";
                                      }
                                                                echo "<tr>
                                                                <td>1</td>
                                                                <td colspan=\"4\">Sales Visit</td>
                                                                <td colspan=\"3\">".@$shop['sales_visit']."</td></tr>";
                                                                echo "<tr>
                                                                <td>2</td>
                                                                <td colspan=\"4\">Are All the POSM available in the shop</td>
                                                                <td colspan=\"3\">".@$shop['posm']."</td></tr>";

                                                                echo "<tr>
                                                                <td>3</td>
                                                                <td colspan=\"4\">If No what is missing</td>
                                                                <td colspan=\"3\">".@$shop['missing']."</td></tr>";
                                                                echo "<tr>
                                                                <td>4</td>
                                                                <td colspan=\"4\">Are All Color Chips available in JCCE & JCCI</td>
                                                                <td colspan=\"3\">".@$shop['color_chips']."</td></tr>";
                                                                echo "<tr>
                                                                <td>5</td>
                                                                <td colspan=\"4\">Is The LED playing Jotun Vide</td>
                                                                <td colspan=\"3\">".@$shop['led_playing']."</td></tr>";
                                                                echo "<tr>
                                                                <td>6</td>
                                                                <td colspan=\"4\">Are there any old campaign display(posters, danglers, rollup) still in the shop</td>
                                                                <td colspan=\"3\">".@$shop['old_campaign']."</td></tr>";
                                                                echo "<tr>
                                                                <td>7</td>
                                                                <td colspan=\"4\">(If Yes then Get it removed)</td>
                                                                <td colspan=\"3\">".@$shop['get_removed']."</td></tr>";
                                                                echo "<tr>
                                                                <td>8</td>
                                                                <td colspan=\"4\">Explain all Ongoing Campaigns (Sales, Push, End User, Salesman Incentive)</td>
                                                                <td colspan=\"3\">".@$shop['explain_campaigns']."</td></tr>";
                                                                echo "<tr>
                                                                <td>9</td>
                                                                <td colspan=\"4\">Inform about Sales & Collection Target</td>
                                                                <td colspan=\"3\">".@$shop['sales_target']."</td></tr>";
                                                                echo "<tr>
                                                                <td>10</td>
                                                                <td colspan=\"4\">Sales Forecast</td>
                                                                <td colspan=\"3\">".@$shop['sales_forecast']."</td></tr>";
                                                                echo "<tr>
                                                                <td>11</td>
                                                                <td colspan=\"4\">Collection Forecast</td>
                                                                <td colspan=\"3\">".@$shop['collection_forecast']."</td></tr>";
                                                                echo "<tr>
                                                                <td>12</td>
                                                                <td colspan=\"4\">Jotun Way Completed for Saudi Sales Staff</td>
                                                                <td colspan=\"3\">".@$shop['jotun_way_completed']."</td></tr>";
                                                                echo "<tr>
                                                                <td>13</td>
                                                                <td colspan=\"4\">If No provide the date when he would be available</td>
                                                                <td colspan=\"3\">".@$shop['jotun_way_date']."</td></tr>";
                                                                echo "<tr>
                                                                <td>14</td>
                                                                <td colspan=\"4\">Roleplay for Selling Up, On Job Training</td>
                                                                <td colspan=\"3\">".@$shop['roleplay']."</td>
                                                                </tr>";


                                        $i++;
            			//$excel_row++;
               }
              // $excel_row++;

            }
            	   	echo "</table></body></html>";

        }
        // {
        // 		if($form_ids != "")
        // 		{
        // 		     $s_ids = explode(',',$form_ids);
        // 		}
        // 		else
        // 		{
        // 		    $s_ids = array();
        // 		}
        //
        //    	header("Content-Type: application/vnd.ms-excel");
        //                 header('Content-Disposition: attachment; filename="SALES_VISIT' . date('d-m-Y') . '.xls"');
        //                 echo "<html><head><meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" /></head><body><table border ='1'>
        //                                       <tr >
        //                                         <th style = 'background-color: #24AC3F;' colspan=\"8\" nowrap=\"nowrap\">Sales Visit Report</th>
        //                                       </tr>";
        //                 echo "<th>
        //                 <td>S No</td><td></td><td></td></th>";
        //                 echo "<td>Sales Visit</td>
        //                 <td>Are All the POSM available in the shop  </td>
        //                 <td>If No what is missing</td>
        //                 <td>Are All Color Chips available in JCCE & JCCI</td>
        //                 <td>Is The LED playing Jotun Vide</td>
        //                 <td>Are there any old campaign display(posters, danglers, rollup) still in the shop</td>
        //                 <td>(If Yes then Get it removed)</td>
        //                 <td>Explain all Ongoing Campaigns (Sales, Push, End User, Salesman Incentive) </td>
        //                 <td>Inform about Sales & Collection Target</td>
        //                 <td>Sales Forecast</td>
        //                 <td>Collection Forecast</td>
        //                 <td>Jotun Way Completed for Saudi Sales Staff</td>
        //                 <td>If No provide the date when he would be available</td>
        //                 <td>Roleplay for Selling Up, On Job Training</td>
        //                 </th>";
        //                                       //  if($role=="salesman"){
        //                                       //   echo "<tr ><th  colspan=\"4\">SalesMan Name</th>
        //                                       //   <th  colspan=\"4\">".$sales_data['username']."</th>
        //                                       // </tr>";
        //                                       // }
        //                                       // else
        //                                       // {
        //                                       //     echo "<tr ><th  colspan=\"4\">Dealer Name</th>
        //                                       //    <th  colspan=\"4\">".$sales_data['username']."</th>
        //                                       //     </tr>";
        //                                       // }
        //
        //
        //
        //     //$excel_row=2;
        //     $i=1;
        //     $k=1;
        //     foreach($s_ids as $key=>$value)
        //     {
        //
        //        $shops = $this->db->where("task_form_id",$value)->get("task_form_five")->result_array();
        //        //$excel_row;
        //
        //        foreach($shops as $ky=>$shop)
        //        {
        //     	    	$shop_name = $this->sales_model->shop_name($shop['task_form_id']);
        //     	    	$shop_data = $this->sales_model->shop_address($shop['task_form_id']);
        //     	    	$shop_address = $this->localname($shop_data['latitude'],$shop_data['longitude']);
        //
        //     	    	if($role=="salesman")
        //     		    {
        //     		       $dealer_name = $this->sales_model->dealer_name($shop['task_form_id']);
        //     		    }else{
        //     		       $salesman_name = $this->sales_model->salesman_name($shop['task_form_id']);
        //     		    }
        //
        //     			    // if($i==1){
        //               //     echo "<tr><th nowrap=\"nowrap\">Shop Name</th><th nowrap=\"nowrap\">".@$shop_name."</th><th nowrap=\"nowrap\">Shop Address</th><th nowrap=\"nowrap\">".@$shop_address."</th>";
        //               //       if($role=="salesman"){
        //               //         echo "<th nowrap=\"nowrap\">Dealer Name</th><th nowrap=\"nowrap\">".@$dealer_name."</th>";
        //               //         }else{
        //               //             echo "<th nowrap=\"nowrap\">Salesman Name</th><th nowrap=\"nowrap\">".@$salesman_name."</th>";
        //               //         }
        //               //       echo "<th nowrap=\"nowrap\">Date</th>
        //               //       <th nowrap=\"nowrap\">".@$shop['created_on']."</th>
        //               //   </tr>";
        //               //         }
        //                           echo "<tr>
        //                           <td>$k</td>
        //                           <td>".@$shop['sales_visit']."</td>
        //                           <td>".@$shop['posm']."</td>
        //                           <td>".@$shop['missing']."</td>
        //                           <td>".@$shop['color_chips']."</td>
        //                           <td>".@$shop['led_playing']."</td>
        //                           <td>".@$shop['old_campaign']."</td>
        //                           <td>".@$shop['get_removed']."</td>
        //                           <td>".@$shop['explain_campaigns']."</td>
        //                           <td>".@$shop['sales_target']."</td>
        //                           <td>".@$shop['sales_forecast']."</td>
        //                           <td>".@$shop['collection_forecast']."</td>
        //                           <td>".@$shop['jotun_way_completed']."</td>
        //                           <td>".@$shop['jotun_way_date']."</td>
        //                           <td>".@$shop['roleplay']."</td>
        //                           ";
        //                           //if($shop['status']==1){ echo "SALES MAN";}else{ echo "STAFF"; }
        //                          echo "</tr>";
        //                          $k++;
        //     			//$excel_row++;
        //        }
        //       // $excel_row++;
        //
        //     }
        //     	   	echo "</table></body></html>";
        //
        // }

    }

    //smr
    public function view_task_forms($id="")
    {
        if($id != "")
        {
             $data['task_forms'] = $this->db->select('*,task_forms.status as tf_status,task_forms.id as task_form_id')->order_by('task_forms.id','desc')->where("task_forms.task_id",$id)->join('forms','forms.id = task_forms.form_id','left')->get("task_forms")->result();
             $this->load->view("sales/view_task_forms",$data);
        }
        else
        {
            show_404();
        }
    }

    public function address()
    {
        $res = $this->localname("24.06456","45.28644");
        echo $res;
        exit;
        print_r($res);
    }

    public function localname($lat,$long)
    {
        //$url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$long."&key=AIzaSyDk0QY5mdOF0Ouf6m10QvI5wLq8Lh3qkk4";
        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$long."&key=AIzaSyDk0QY5mdOF0Ouf6m10QvI5wLq8Lh3qkk4";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response, true);
        //print_r($response_a);
        if(count($response_a)){
           // return $response_a['results'][0]['address_components'][2]['long_name'];
            return $response_a['results'][1]['formatted_address'];//[0]['address_components'][2]['long_name'];
        }else{
            return false;
        }

    }

    public function view_form_data($tid="",$fid=""){
        if($tid != "" && $fid != "")
        {
            $data['signature'] = $this->db->get_where('task_forms',array('id'=>$tid,'form_id'=>$fid))->row();
            if($fid ==9){
                $table = "task_form_shop_information";
                $data['form_data'] = $this->db->get_where($table,array('task_form_id'=>$tid))->result();
               // print_r($data['form_data']);
                //exit;
                //echo $this->db->last_query();exit;
                $this->load->view('sales/view_form_data2',$data);
              }
              else if($fid == 10) {
                $data['image']= $this->db->get_where('task_form_images',array('task_form_id'=>$tid))->row();
                //echo $this->db->last_query();exit;
                $table = "task_form_dealer_profitability_program";
                $data['form_data'] = $this->db->get_where($table,array('task_form_id'=>$tid))->row();

                $this->load->view('sales/view_form_data1',$data);
               }
               else if($fid == 11)
               {
                  $table = "task_form_three";
                  $data['form_data1'] = $this->db->where(array('task_form_id'=>$tid,'status'=>1))->join('form_fields','form_fields.id = task_form_three.field_id','left')->get($table)->result();
                  $data['form_data2'] = $this->db->where(array('task_form_id'=>$tid,'status'=>2))->join('form_fields','form_fields.id = task_form_three.field_id','left')->get($table)->result();
                  $data['form_data3'] = $this->db->where(array('task_form_id'=>$tid,'status'=>3))->join('form_fields','form_fields.id = task_form_three.field_id','left')->get($table)->result();
                  $data['images'] = $this->db->query("select * from task_form_three where field_id in(19,20,21,22,23,24,25,26) and task_form_id=$tid")->result();
                  $this->load->view('sales/view_form_data3',$data);
               }
               else  if($fid == 12) {
                 $table = "task_form_four";
                 $data['form_data'] = $this->db->get_where($table,array('task_form_id'=>$tid))->row();
                 $this->load->view('sales/view_form_data4',$data);
               }
               else  if($fid == 13) {
                 $table = "task_form_five";
                 $data['form_data'] = $this->db->get_where($table,array('task_form_id'=>$tid))->row();
                 $this->load->view('sales/view_form_data5',$data);
               }
        }
        else{
            show_404();
        }
    }


    //smr
    public function delete_task($task_id="")
    {
        if($task_id != "")
        {
            $user_id = $this->db->where("id",$task_id)->get("tasks")->row()->user_id;
            $this->db->where("id",$task_id)->delete("tasks");
            $this->db->where("task_id",$task_id)->delete("task_forms");
            redirect("sales/view_user_tasks/$user_id");
            redirect("sales/sales_index");
        }
        else
        {
            if($this->lib_auth->getRoleID() == 2)
            {
                redirect("sales/manager_sales");
            }
            else
            {
                redirect("sales/sales_index");
            }

        }

    }

    /**
	 * index method
	 *
     * @param integer $nOffset
	 * @return void
	 */
    function index()
    {
        // Limit
        /*$arrData['nLimit'] = $nLimit = 20;
        $arrData['nOffset'] = $nOffset;

        // Offset
        $nOffset = $nLimit * ($nOffset - 1);

        // Get users for pagination
        $nCreatedBy = ($this->lib_auth->getRoleID() != 1) ? $this->lib_auth->getUserID() : NULL;
        $arrData += $this->lib_users->getUsersForPagination($nLimit, $nOffset, $nCreatedBy);

        // Load Lib_Pagination library
        $this->load->library('Lib_Pagination');

        // Pagination
//$strBaseUrl = base_url($this->config->item('sales_index_uri'));
//Modified by eswar 20-4-2017
$strBaseUrl = base_url().'index.php/sales/'.$this->uri->segment(2);

        $nTotalRows = $arrData['nTotalRows'];
        $arrData['strPagination'] = $this->lib_pagination->pagination($strBaseUrl, $nTotalRows, $nLimit, 3);

         // Get roles list
        $nRoleID = ($this->lib_auth->getRoleID() != 1) ? 1 : NULL;
        $arrData['arrRoles'] = $this->lib_roles->getRolesList($nRoleID);
//echo "<pre>";print_r($arrData);exit;
    	return $this->load->view($this->config->item('template_view'), $arrData);*/
    	$data['users'] = $this->user_model->get_all_users();
        $this->load->view("sales/sales_index",$data);
    }


    public function sales_index()
    {
        $data['users'] = $this->user_model->get_all_users();
        $this->load->view("sales/sales_index",$data);
    }

    public function manager_sales()
    {
        $id = $this->lib_auth->getUserID();
        $data['users'] = $this->db->where("created_by",$id)->get("users")->result();
        $this->load->view("sales/sales_index",$data);
    }

   /**
     * view method
     *
     * @param integer $nID
     * @return void
     */
    public function view($nID)
    {
        // Get forms by user ID
        //$arrData['objUser'] = $objUser = $this->lib_users->getFormsByUserID($nID);

        //smr
        $arrData['objUser'] = $objUser = $this->user_model->getUser_ByID($nID);
        //$arrData['forms'] = $objUser = $this->sales_model->task_forms($nID);

        // Check status
        if(!$objUser)
        {
            $this->session->set_flashdata('flash_failure', $this->lib_users->strFlashMessage);
            redirect($this->config->item('sales_index_uri'));
        }
        //$arrData['objUser_geo'] = $this->sales_model->getgeo_shop_data($nID);

        $arrData['objUser_geo'] = $this->sales_model->mgetgeo_shop_data($nID);
        return $this->load->view($this->config->item('template_view'), $arrData);
    }

 public function view_date_search()
    {
        $nID=$this->input->post("user_id");
        $from_date=$this->input->post("fromdate");
        $to_date=$this->input->post("todate");
        // Get forms by user ID
        $arrData['objUser'] = $objUser = $this->lib_users->getFormsByUserID($nID);

        // Check status
        if (!$objUser)
        {
            $this->session->set_flashdata('flash_failure', $this->lib_users->strFlashMessage);
            redirect($this->config->item('sales_index_uri'));
        }
        //$arrData['objUser_geo'] = $this->sales_model->getgeo_shop_data_filter($nID,$from_date,$to_date);
       $arrData['objUser_geo'] = $this->sales_model->Mgetgeo_shop_data_filter($nID,$from_date,$to_date);


//print_r($arrData['mt_objUser_geo']);exit;
        return $this->load->view($this->config->item('template_view'), $arrData);
    }

    public function get_geodata()
    {
        $id=$this->input->post("id");
        $data=array(
          "id"=>$id,
            "online_state"=>1
        );
        $res=$this->sales_model->get_geodata($data)->result_array();
        echo json_encode($res);
    }

    /**
     * shops_view method
     *
     * @param integer $p_nUserID
     * @param integer $p_nFormID
     * @return void
     */

    public function shops_view($p_nUserID, $p_nFormID)
    {

        // Get shops by forms and user ID
        $arrData['objUser'] = $objUser = $this->lib_users->getShopsByFormAndUserID($p_nUserID, $p_nFormID);

      // Check status
        if (!$objUser)
        {
            $this->session->set_flashdata('flash_failure', $this->lib_users->strFlashMessage);
            redirect($this->config->item('sales_index_uri'));
        }
//echo "<pre>";print_r($arrData);exit;
        return $this->load->view($this->config->item('template_view'), $arrData);
    }


    public function dealer_targets()
    {
        $dealer_id = $this->input->post('dealer_id');
        $months = array("january","february","march","april","may","june","july","august","september","october","november","december");
        foreach($months as $key=>$month){
            $data['year'][$month] =$this->sales_model->assign_dealer_monthly_targets($dealer_id,$key+1);
        }
        $data['yearly'] =$this->sales_model->get_assign_dealer_year_targets($dealer_id);
       $this->load->view('sales/add_user_targets',$data);
    }

    /**
     * shop_details_view method
     *
     * @param integer $p_nTaskFormID
     * @return void
     */
    public function shop_details_view($p_nTaskID, $p_nTaskFormID, $form_id)
    {
        $arrData['total'] = $this->sales_model->get_totalvalue($p_nTaskFormID,$form_id);

$arrData['userinfo'] = $this->sales_model->getusername($p_nTaskID);

        //load library Lib_Tasks
        $this->load->library('Lib_Tasks');

        // Get task form by ID
        $arrData['objUser'] = $objUser = $this->lib_tasks->getTaskFormByID($p_nTaskID, $p_nTaskFormID);
	$arrData['task_id'] = $p_nTaskID;
	$arrData['task_form_id'] = $p_nTaskFormID;

        //Get Modified data
	$arrData['modified_date'] = $this->sales_model->get_modified_from_taskformpoints($p_nTaskFormID);

        // Check status
        if (!$objUser)
        {
            $this->session->set_flashdata('flash_failure', $this->lib_tasks->strFlashMessage);
            redirect($this->config->item('sales_index_uri'));
        }
//echo "<pre>";print_r($arrData);exit;
        return $this->load->view($this->config->item('template_view'), $arrData);
    }




    //sales Export csv
     public function export_csv($p_nTaskID, $p_nTaskFormID, $form_id)
    {
        //load library Lib_Tasks
        $this->load->library('Lib_Tasks');
        $arrData['userinfo'] = $this->sales_model->getusername($p_nTaskID);
        $arrData['total'] = $this->sales_model->get_totalvalue($p_nTaskFormID,$form_id);
        // Get task form by ID
        $arrData['objUser'] = $objUser = $this->lib_tasks->getTaskFormByID($p_nTaskID, $p_nTaskFormID);
		$arrData['task_id'] = $p_nTaskID;
		$arrData['task_form_id'] = $p_nTaskFormID;
        // Check status

		$filename = "Xl_Users_Reports_On_".date('dS_M').".xls";
		header('Content-Encoding: UTF-8');
		header('Content-type: text/csv; charset=UTF-8');
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename='.$filename);
		$this->load->view('sales/shops/details-excel',$arrData);
    }

    /**
     * ajax_add_task method
     *
     * @param integer $nUserID
     * @return void
     */
    public function ajax_add_task($nUserID)
    {
        // Check the ajax request
        if (!$this->input->post())
        {
            // Set
            $arrData['nUserID'] = $nUserID;

            // Get shops list
            $arrData['arrShops'] = $this->lib_shops->getShopsList(1);

            // Get forms list
            $arrData['arrForms'] = $this->lib_forms->getFormsList(1);

            return $this->load->view($this->config->item('sales_add_task_view'), $arrData);
        }

        // Set Validation Rules
        $this->form_validation->set_rules('shop_id', 'shop', 'trim|required');
        $this->form_validation->set_rules('form_ids[]', 'forms', 'trim|required');

        // Run validation
        if($this->form_validation->run() == false)
        {
            $arrResult = array(
                'success' => false,
                'validations' => array(
                    'shop_id' => form_error('shop_id', '<label class="error">', '</label>'),
                    'form_ids[]' => form_error('form_ids[]', '<label class="error">', '</label>'),
                )
            );

            echo json_encode($arrResult);
            return;
        }

        // Task
        $arrTask = array(
            'shop_id' => $this->input->post('shop_id'),
            'form_ids' => $this->input->post('form_ids[]')
        );

        // Add task
        $objResult = $this->lib_users->addTask($arrTask, $nUserID);
        echo json_encode($objResult);
        return;
    }

    /**
     * ajax_edit_task method
     *
     * @param integer $nUserID
     * @param integer $nTaskID
     * @return void
     */
    public function ajax_edit_task($nUserID, $nTaskID)
    {
        // Check the ajax request
        if (!$this->input->post())
        {
           // Set
            $arrData['nUserID'] = $nUserID;
            $arrData['nTaskID'] = $nTaskID;

            // Get shops list
            $arrData['arrShops'] = $this->lib_shops->getShopsList(1);

            // Get forms list
            $arrData['arrForms'] = $this->lib_forms->getFormsList(1);

            // Get task by ID
            $arrData['objTask'] = $this->lib_tasks->getTaskByID($nTaskID);

            return $this->load->view($this->config->item('sales_add_task_view'), $arrData);
        }

        // Set Validation Rules
        $this->form_validation->set_rules('shop_id', 'shop', 'trim|required');
        $this->form_validation->set_rules('form_ids[]', 'forms', 'trim|required');

        // Run validation
        if($this->form_validation->run() == false)
        {
            $arrResult = array(
                'success' => false,
                'validations' => array(
                    'shop_id' => form_error('shop_id', '<label class="error">', '</label>'),
                    'form_ids[]' => form_error('form_ids[]', '<label class="error">', '</label>'),
                )
            );

            echo json_encode($arrResult);
            return;
        }

        // Task
        $arrTask = array(
            'shop_id' => $this->input->post('shop_id'),
            'form_ids' => $this->input->post('form_ids[]')
        );

        // Update topic
        $objResult = $this->lib_tasks->updateTask($arrTask, $nUserID, $nTaskID);
        echo json_encode($objResult);
        return;
    }

     /**
     * ajax_get_sales_by_search method
     *
     * @return object
     */
    public function ajax_get_sales_by_search()
    {
        // Check the ajax request
        if (!$this->input->is_ajax_request())
        {
            $arrResult = array(
                'result' => array(
                    'success' => false,
                    'message' => 'This method not allowed.'
                )
            );
            echo json_encode($arrResult);
            return;
        }

        // Input
        $nRoleID = $this->input->get('role_id');
        $nStatus = $this->input->get('status');

        // Limit
        $arrData['nLimit'] = $nLimit = 10;
        $arrData['nOffset'] = $nOffset = !($this->input->get('page', TRUE)) ? $this->input->get('page', TRUE) : 1;
        $nOffset = $nLimit * ($nOffset - 1);

        // Get users by search
        $nCreatedBy = ($this->lib_auth->getRoleID() != 1) ? $this->lib_auth->getUserID() : NULL;
        $arrData += $this->lib_users->getUsersForPagination($nLimit, $nOffset, $nCreatedBy, NULL, $nStatus, $nRoleID);

        // Load Lib_Pagination library
        $this->load->library('Lib_Pagination');

        // Pagination
        $strUrlSuffix = ($nRoleID) ? '?role_id='.$nRoleID.'&' : '';
        $strUrlSuffix .= ($strUrlSuffix) ? (($nStatus) ? 'status='.$nStatus : '') : (($nStatus) ? '?status='.$nStatus : '');
        $strBaseUrl = base_url($this->config->item('sales_ajax_get_sales_by_search')).$strUrlSuffix;
        $nTotalRows = $arrData['nTotalRows'];
        $arrData['strPagination'] = $this->lib_pagination->pagination($strBaseUrl, $nTotalRows, $nLimit, 3, '?'.http_build_query($_GET, '', '&'));
        $arrData['nIsAjax'] = 1;

        // Result
        $arrResult = array(
            'result' => array(
                'success' => true,
                'view' => $this->load->view($this->config->item('sales_table_view'), $arrData, true),
                'pagination' => $this->load->view($this->config->item('pagination_view'), $arrData, true)
            )
        );

        echo json_encode($arrResult);
        return;
    }

    /**
* download_forms method
* @param integer $p_nTaskFormID
* @return void
*/
    public function download_forms($p_nTaskFormID) {

        // Load Admin_Export library
        $this->load->library('Admin_Export');

        // Load model


        $forms = $this->lib_task_forms->gettaskforms($p_nTaskFormID);

                    echo "<pre>";
                    print_r($forms);
                    echo "</pre>"; die();

        $this->admin_export->to_excel($forms, 'forms');
    }

// Added  By Eswar 13-4-2017

      public function task($nUserID){

            // Set
            //$arrData['nUserID'] = $nUserID;
            $data['nUserID'] = $nUserID;

            // Get shops list
           // $arrData['arrShops'] = $this->sales_model->getShopsList($nUserID);
            //$data['arrShops'] = $this->sales_model->getShopsList($nUserID);
            $data['dealers'] = $this->sales_model->get_user_dealers($nUserID);

            // Get forms list
            //$arrData['arrForms'] = $this->sales_model->getFormsList();
            $data['arrForms'] = $this->sales_model->get_forms_list();
            //return $this->load->view($this->config->item('template_view'), $arrData);
            $this->load->view("sales/tasks/add_task", $data);
	}

	 public function task_edit($user_id="",$task_id=""){

	     if($user_id != "" && $task_id != "")
	     {
	        $data['nUserID'] = $user_id;
            $data['dealers'] = $this->sales_model->get_user_dealers($user_id);
            $data['task_shops'] = $this->sales_model->get_user_dealers($user_id);
            $data['task_forms'] = $this->sales_model->get_user_dealers($user_id);
            $data['arrForms'] = $this->sales_model->get_forms_list();
            $this->load->view("sales/tasks/edit_task",$data);
	     }
	     else
	     {
	         show_404();
	     }


	}

public function add_task($user_id)
{

		$dealer_id = $this->input->post('dealer_id');
		$shop = $this->input->post('shop');
		$shops_count = count($shop);
		$forms = $this->input->post('form_ids');
    array_push($forms,'13');
		$forms_count = count($forms);
		for($i=0;$i<$shops_count;$i++){
			$shops_array = array(
			'user_id' => $user_id,
			//'dealer_id' => $dealer_id,
			'shop_id' => $shop[$i],
			'assigned_by' => $this->lib_auth->getUserID()
			);
      // $previous = $this->db->select('*')->from('tasks')->where('shop_id',$shop[$i])->get()->result_array();
      // if(!empty($previous)){
      //   foreach($previous as $prev){
      //     $del = $this->db->select('id')->from('task_forms')->where('form_id','13')->where('task_id',$prev['id'])->get()->row_array();
      //     if($del){
      //       $this->db->where('id',$del['id'])->delete('task_forms');
      //     }
      //   }
      // }

			$this->db->insert('tasks',$shops_array);
			$task_id = $this->db->insert_id();

			for($j=0;$j<$forms_count;$j++){
				$forms_array = array(
				'task_id' =>  $task_id,
				'form_id' => $forms[$j]
				);
				$this->db->insert('task_forms',$forms_array);
			}
		}

        if($this->lib_auth->getRoleID() == 2){
             $this->session->set_flashdata('message', 'success');
    	    redirect('sales/manager_sales');
        }else{
             $this->session->set_flashdata('message', 'success');
    	    redirect('sales/sales_index');
        }

}

	public function getshops_type(){
		$type = $this->input->post('type');
		$data['shops'] = $this->sales_model->getshops_type($type);
		$this->load->view('sales/shops_result',$data);
	}


	// Search shop based on name
	public function search_shop_address(){
		$address = $this->input->post('address');
		$data['shops'] = $this->sales_model->search_shop_address($address);
		$this->load->view('sales/shops_result',$data);
	}

// Excel download for sales

public function salesexcel($p_nUserID, $p_nFormID)
{
				  // Get shops by forms and user ID
			$arrData['objUser'] = $objUser = $this->lib_users->getShopsByFormAndUserID($p_nUserID, $p_nFormID);
//echo "<pre>";print_r($objUser);exit;
$username = ucwords($objUser->username);
$email = $objUser->email;
$form_name = ucwords($objUser->form->name);
		     $shops = $objUser->shops;
			 foreach($shops as $result){
			     			 $task_id = $result->task_form->task_id;
	//$arrData['modified_date'] = $this->sales_model->get_modified_from_taskformpoints($task_form_id);
	$arrData['modified_date'] = $this->sales_model->getmodified_shops($task_id);
				 $exceldata[] = array($result->name,$result->email,$result->acc_no,$arrData['modified_date']['modified']);
				 }


                $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('Sales Excel');
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A1', 'Username:  '.$username);
                $this->excel->getActiveSheet()->setCellValue('A2', 'Email:  '.$email);
                $this->excel->getActiveSheet()->setCellValue('A3', 'Form:  '.$form_name);

                $this->excel->getActiveSheet()->setCellValue('A5', 'Shop Name');
                $this->excel->getActiveSheet()->setCellValue('B5', 'Owner Email');
                $this->excel->getActiveSheet()->setCellValue('C5', 'Shop Account Number');
                $this->excel->getActiveSheet()->setCellValue('D5', 'Last Evaluation');
                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A1:D1');
                $this->excel->getActiveSheet()->mergeCells('A2:D2');
                $this->excel->getActiveSheet()->mergeCells('A3:D3');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

                $this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12);

                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(12);

                $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(12);

//$this->excel->getActiveSheet()->getStyle('A1:E1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FF808080');


       for($col = ord('A'); $col <= ord('C'); $col++){
                  //set column dimension
                       $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                 //change the font size
                       $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }


                //Fill data
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A6');
                $this->excel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                 $date = date('Y-m-d');
                $filename="Salesdata_".$date.".xls"; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache

                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');
    }

// Excel download for shops

 public function shopsexcel($shop_id,$form_id)
    {
		$data['test'] =  $this->sales_model->getshopdata($shop_id,$form_id);
//print_r($data);exit;
$count = count($data['test']);
for($i=0;$i<=$count;$i++){
$exceldata[] = array($data['test'][$i]['username'],$data['test'][$i]['first_name'],$data['test'][$i]['email'],$data['test'][$i]['phone']);
}

// Get shop name
$data['shop'] = $this->sales_model->getshopname($shop_id);
$shop_name = ucwords($data['shop']['name']);

// Get form name
$data['form'] = $this->sales_model->getformname($form_id);
$form_name = ucwords($data['form']['name']);



                $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('Shop Verifiers');
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A1', 'Shop:  '.$shop_name);
                $this->excel->getActiveSheet()->setCellValue('A2', 'Form:  '.$form_name);


                $this->excel->getActiveSheet()->setCellValue('A4', 'User Name');
                $this->excel->getActiveSheet()->setCellValue('B4', 'First Name');
                $this->excel->getActiveSheet()->setCellValue('C4', 'Email');
                $this->excel->getActiveSheet()->setCellValue('D4', 'Mobile Number');
                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A1:D1');
                $this->excel->getActiveSheet()->mergeCells('A2:D2');
                $this->excel->getActiveSheet()->mergeCells('A3:D3');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12);

                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(12);

                $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(12);

//$this->excel->getActiveSheet()->getStyle('A1:E1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FF808080');


       for($col = ord('A'); $col <= ord('C'); $col++){
                  //set column dimension
                       $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                 //change the font size
                       $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }


                //Fill data
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A5');
                $this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $date = date('Y-m-d');
                $filename="Shopsdata_".$date.".xls"; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache

                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
                $objWriter->save('php://output');
    }


        public function shopsviewverifier($shop_id){
            $data['images'] = $this->sales_model->get_taskid($shop_id);
            $data['type'] = $this->sales_model->get_shop_type($shop_id);
            //echo "<pre>";print_r($data);exit;
		    $data['result'] = $this->sales_model->getshopsviewverifier($shop_id);
		    $data['forms'] = $this->sales_model->getforms_limit();
		    //echo "<pre>";print_r($data['forms']);exit;
		    $this->load->view($this->config->item('template_view'),$data);
	    }

	    public function shops_varifier($shop_id="")
	    {
	        if($shop_id != "")
            {
                 $data['tasks'] = $this->db->order_by('id','desc')->where("shop_id",$shop_id)->get("tasks")->result();
                 $data['shop'] = 1;
                 $this->load->view("sales/view_user_tasks",$data);
            }
            else
            {
                show_404();
            }

	    }

        public function get_shop_verifiers($shop_id)
        {
            $employee_data = $this->sales_model->get_shop_verifiers($shop_id);

            $employee_details = [] ;

            foreach ($employee_data as $key => $emp_id) {
                $employee_details[] = $this->db->where('id',$emp_id)->get('users')->row();
            }

            $data['employees'] = $employee_details ;

            $this->load->view("sales/shop_verifiers",$data);
        }


	public function shopdata($shop_id,$form_id){
		$data['result'] = $this->sales_model->getshopdata($shop_id,$form_id);
		//echo"<pre>";print_r($data);exit;
		$this->load->view($this->config->item('template_view'),$data);
	}

	//Added by Eswar 19-5-2017
	public function get_stypes(){
		$shop_id = $this->input->post('shop_id');
		$data['result'] = $this->sales_model->get_stypes($shop_id);
		echo $data['result']['shop_type_id'];
	}

	// Added By Eswar 6-6-2017
public function get_shops_zone(){
$zone_id = $this->input->post('zone_id');
//echo $zone_id;
//print_r(count($zid));
$data['shops'] = $this->sales_model->get_shops_zone($zone_id);
$this->load->view('sales/shops_result',$data);
}

public function get_shops_acc(){
    $zone_id = $this->input->post('zone_id');
    $data['shops'] = $this->sales_model->get_shops_acc($zone_id);
    $this->load->view('sales/shops_acc',$data);
}

public function eget_shops_acc(){
    $zone_id = $this->input->post('zone_id');
    $user_id = $this->input->post('user_id');
    $data['shops'] = $this->sales_model->get_shops_acc($zone_id);
    $data['zone'] = $zone_id;
    $data['dealer'] = $this->db->get_where("users",array("id"=>$user_id))->row();
    $this->load->view('sales/eshops_acc',$data);
}

public function get_dealers_zone(){
$zone_id = $this->input->post('zone_id');
//echo $zone_id;
//print_r(count($zid));
$data['shops'] = $this->sales_model->get_dealers_zone($zone_id);
$this->load->view('sales/dealers_result',$data);
}



public function eget_shops_zone(){
$zone_id = $this->input->post('zone_id');
$user_id = $this->input->post('user_id');
//echo $zone_id;
$zid = explode(',',$zone_id);
//print_r(count($zid));
	//$data['arrShops'] = $this->sales_model->getShopsList($user_id); smr
	$data['arrShops'] = $this->sales_model->get_deler_shopsList($user_id);
$data['shops'] = $this->sales_model->get_shops_zone($zone_id);
$this->load->view('sales/eshops_result',$data);
}

public function dealers_shops_list(){
$user_id = $this->input->post('dealer_id');
$data['shops'] = $this->sales_model->get_deler_shopsList($user_id);
$this->load->view('sales/shops_result',$data);
}

//smr
public function eget_dealers_zone(){
    $zone_id = $this->input->post('zone_id');
    $user_id = $this->input->post('user_id');
	//$data['arrShops'] = $this->sales_model->getShopsList($user_id); smr
	$data['arrShops'] = $this->sales_model->get_dealer_list($user_id);
    $data['dealers'] = $this->sales_model->get_dealers_zone($zone_id);
    $this->load->view('sales/edealers_result',$data);
}



  //sales Export csv
     public function download_shops_data($shop_id)
    {

        $data['test'] =  $this->sales_model->download_shops_data($shop_id);
		$data['tfp'] = $this->sales_model->get_tfp($shop_id);
		//echo '<pre>';print_r($data['tfp']);exit;
		$filename = "Xl_Users_Reports_On_".date('dS_M').".xls";
		header('Content-Encoding: UTF-8');
		header('Content-type: text/csv; charset=UTF-8');
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename='.$filename);
		$this->load->view('sales/shops/mdetails-excel',$data);
    }



    public function actionlog(){
        $data['result'] = $this->sales_model->actionlog();
        //echo "<pre>";print_r($data);exit;
        $this->load->view($this->config->item('template_view'),$data);
    }

    public function get_shopsbased_role(){
        $arrData['role_value'] = $this->input->post('role_value');
        	$arrData['arrShops'] = $this->sales_model->getShopsList($nID);
			$arrData['shops'] = $this->dashboard_model->getshopnames();
        $this->load->view('users/shopsbasedonrole',$arrData);
    }

     public function download_shops()
    {
        $data['shops'] = $this->sales_model->download_shops();
		//echo "<pre>"; print_r($data['shops']);exit;
		$filename = "Xl_Shops_On_".date('dS_M').".xls";
		header('Content-Encoding: UTF-8');
		header('Content-type: text/csv; charset=UTF-8');
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename='.$filename);
		$this->load->view('sales/shops/download',$data);
    }

    public function download_shopstotal($shop_id){
        $data['shop_data'] = $this->sales_model->get_shop_details($shop_id);
    	$data['shopstotal'] = $this->sales_model->download_shopstotal($shop_id);
    	//echo "<pre>"; print_r($data); exit;
    	$filename = "Xl_Shops_On_".date('dS_M').".xls";
		header('Content-Encoding: UTF-8');
		header('Content-type: text/csv; charset=UTF-8');
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename='.$filename);
    	$this->load->view('sales/shops/download_shopstotal',$data);

    }


     public function download_totalshops(){
    	$data['shopstotal'] = $this->sales_model->download_totalshops();
    	//echo "<pre>"; print_r($data); exit;
    	$filename = "Xl_Shops_On_".date('dS_M').".xls";
		header('Content-Encoding: UTF-8');
		header('Content-type: text/csv; charset=UTF-8');
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename='.$filename);
    	$this->load->view('sales/shops/download_totalshops',$data);

    }


}
