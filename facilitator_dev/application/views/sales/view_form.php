<!doctype html>
<html>
<head>
   <!-- Meta, title, CSS, favicons, etc. -->
   <meta charset="utf-8">
   <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
   <title>View form data</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Font CSS (Via CDN) -->
   <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
   <!-- Theme CSS -->

      <title>Form Data</title>
   <!-- <link rel="shortcut icon" href="" type="image/x-icon"> -->
   <link href="<?php echo base_url();?>assets/xcharts.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url();?>assets/skin/default_skin/css/theme.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url();?>assets/skin/default_skin/css/theme2.css" rel="stylesheet" type="text/css">
   <link href='<?php echo base_url();?>assets/skin/default_skin/css/theme3.css' rel='stylesheet' type='text/css'>
   <link href='<?php echo base_url();?>assets/admin-tools/admin-forms/css/admin-forms.css' rel='stylesheet' type='text/css'>
   <link href="<?php echo base_url();?>assets/custom.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url();?>assets/sweetalert.css" rel="stylesheet" type="text/css">
   <!-- Favicon -->
   <!--
      <link rel="shortcut icon" href="assets/img/favicon.png">
      -->
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
   <![endif]-->
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
   <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"   rel="stylesheet" type="text/css" />

</head>
<body class="dashboard-page sb-l-o sb-r-c">
    <style>
        .navbar-branding.dark {
            background: #3A3633;

        }
        h3.logo_h3 {
            color: #fff;
        }

        .sidebar-user-material .category-content {
            background: url(assets/img/logos/user_bg4.jpg) center center no-repeat;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .sidebar-user-material-content>h6 {
            color: #fff;
            text-shadow: 0 0 1px rgba(0,0,0,.5);
            font-size:15px;
            margin-bottom: 0;

        }
        .category-content {
            padding: 40px;
            margin-bottom: 10px;
        }
        .sidebar-user-material-content>a>img {
            height: 80px;
        }
        .text-size-small {
            font-size: 12px;
        }
        .sub-nav li::before {
            content: "";
            display: block;
            position: absolute;
            width: 8px;
            left: 19px;
            top: 20px;
            border-top: 1px solid #7A7A7A;
            z-index: 1;
        }
        .sub-nav::before {
            content: "";
            display: block;
            position: absolute;
            z-index: 1;
            left: 18px;
            top: 35px;
            bottom: 0;
            border-left: 1px solid #7A7A7A;
        }
        .sb-l-disable-animation .sidebar-user-material {display:none !important;}
        .sb-l-disable-animation .sub-nav { background-color: rgba(69,69,69,1) !important; width:220px !important;}
        .sb-l-disable-animation .sub-nav li::before {display:none !important;}
        .sb-l-disable-animation .sub-nav::before {  display:none !important;}
        .sb-l-disable-animation .sidebar-menu li {/*width: 220px !important;*/  display:block !important;}
        body.sb-l-m .sidebar-header, body.sb-l-m #sidebar_left .sidebar-title, body.sb-l-m #sidebar_left .sidebar-label, body.sb-l-m #sidebar_left .sidebar-title-tray, body.sb-l-m #sidebar_left .caret, body.sb-l-m #sidebar_left .sidebar-proj, body.sb-l-m #sidebar_left .sidebar-stat {
            width: 220px; top:-12px !important;}

        .accordion-toggle .plusminus, .accordion-toggle .plusminus1 {
            font-size: 12px;
            float: right;
            line-height: 8px;
            width: 10px;
            height: 10px;
            border: 1px solid #ccc;
            margin-right: 8px;
            text-align: center;
            border-radius: 2px;
            color: #ccc;
            margin-top: 14px;
        }
        .admin-panels.fade-onload {
            opacity: 1;
        }
        .sidebar-menu .media {
            height: 41px;
            padding: 6px 15px;
            border-bottom: 1px solid #1A1817;
        }
        .sidebar-menu .user-prfl-li {border-bottom: 1px solid #525151;}
        .sidebar-menu .media img {
            width: 30px;
            padding-top: 1px;
        }
        .sidebar-menu .media .media-heading {
            color: #ccc;
            margin-top: 7px;
            font-size: 13px;
        }
        .inner-header {
            background: #474544;
            width: 100%;
            float: left;
            padding: 15px 10px;
            margin-top:51px
        }
        .sb-l-disable-animation .sidebar-menu .user-prfl-li {
            border-bottom: 0px !important;
        }
        .sb-l-disable-animation .sidebar-menu .media {
                                  border-bottom: 0px !important;
                              }
        .sb-l-disable-animation .sidebar-menu .media .media-heading {display:none !important;}
        .sb-l-disable-animation .plusminus {display:none !important;}

        .logo_h3 .dashbrd-menu{
            font-size: 15px !important;
            margin-left: -10px !important;
            margin-top:5px;

        }
    .col-sm-12.has-feedback .form-control-feedback {
    position: absolute;
    top: 1px;
    right: 15px;
    z-index: 2;
    display: block;
    width: 39px;
    height: 39px;
    line-height: 39px;
    text-align: center;
    font-size: 18px;
}
.table-layout > div, .table-layout > aside, .table-layout > section {
    display: block;
}
.tray{
    height:auto !important;
}
#content.table-layout > div, #content.table-layout > section {
    vertical-align: top;
    padding: 0px 20px;
}
.dataTables_paginate{
    float:right;
}
.manage_pagination{
    display:block !important;
}
.dataTables_filter input{
    width: 80%;
    height: 39px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    outline: 0!important;
    box-shadow: none!important;
}
.dataTables_length select{
    width:43%;
    height: 39px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    outline: 0!important;
    box-shadow: none!important;
}
.dataTables_paginate .previous{
    color: #777777;
    background-color: #ffffff;
    border:1px solid #dddddd;

    padding: 5px 12px;
}
.paginate_button{
    color: #777777;
    background-color: #ffffff;
    border:1px solid #dddddd;
    padding: 5px 12px;
}
.paginate_button:hover{
    text-decoration:none;
    color: #777777;
}
.disabled{
    cursor: not-allowed;
}
.current{
    background-color: #4a89dc;
    border-color: #4a89dc;
    color:#fff;
}
.current:hover{
     color: #fff;
}
/*----- f02282020 ---*/
.shop_visit {
    padding: 30px;
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    vertical-align: baseline;
}
.sale_h {
    margin-bottom: 25px;
    margin-top: 25px;
    font-size: 17px;
    color: #474544;
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 10px;
    border-top: none;
}
.mx-auto {
    margin: 0 auto;
    display: block;
    float: inherit;
}
.cus_table tr:not(:last-child) {
    border-bottom: 1px solid #eeeeee;
}
.cus_table td {
    text-align: right;
    position: relative;
}
.cust1_card .sale_h {
    margin-bottom: 10px;
}
.sale_d {
    margin-bottom: 25px;
}
.cus1_table tr, .cus1_table td, .cus1_table th {
    border: 1px solid #ccc;
}
.cus2_table {
    margin: 15px 0px;
}
.cus2_table.shp_1 th {
    width: 15%;
    font-size: 12px;
}
.cus3_tb th, .cus3_tb td {
    text-align: center;
}
th.wd-10 {
    width: 5%;
}
.sp_h {
    color: #37bc9b;
    font-weight: 600;
}
img.cust_jimg {
    width: 350px;
    height: 180px;
    margin: auto;
    display: block;
}
    </style>
    <div id ="main">
        <?php $this->load->view($this->config->item('header_view')); ?>
        <?php $this->load->view($this->config->item('sidebar_view')); ?>

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">
            <div class="row mb10">
                <div class="inner-header mb10">
                    <div class="bread-cumLeft">
                        <ol class="breadcrumb">
                            <li>Home</li>
                            <li class="crumb-active">Forms Data</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Begin: Content -->

            <section id="content" class="table-layout animated fadeIn">
                <div class="tray tray-center col-md-12">
                    <div class="panel mb25 mt5">
                        <!--<div class="panel-heading">-->
                        <!--    <span class="panel-title hidden-xs"> Add New Dealer</span>-->
                        <!--</div>-->
                        <div class="panel-body p20 pb10">
                            <!--<h4 style="margin-bottom:20px; margin-top:5px">Create a New Dealer</h4>-->
                            <!--<p><a href="<?php echo base_url();?>users/add" class="btn btn-success">Add New User</a></p></div>-->
                    </div>
                </div>
                
                <!---- Shopping Experience (Sales Visit) Form Opening ---->
                <?php if(@$form_one){?>
                <div class="panel col-md-12">
                        <div class="shop_visit">
                            <div class="cust_card">
                                <h4 class="sale_h">Shopping Experience (Sales Visit)</h4>
                                <div class="col-md-8 mx-auto mbt-5">
                                <table class="table cus_table">
                                    <tr>
                                        <th>Date of visit</th>
                                        <td><?php echo @$form_one["created"];?></td>
                                    </tr>
                                    <tr>
                                        <th>Time of Visit </th>
                                        <td><?php echo @$form_one["time"];?></td>
                                    </tr>
                                    <tr>
                                        <th>Shop Working Hours </th>
                                        <td><?php echo trim(@$form_one["working_hours"],',');?></td>
                                    </tr>
                                    <tr>
                                        <th>Staff in the Shop at the time of visit </th>
                                        <td>
                                            <p><?php echo trim(@$form_one["staff"],',');?></p>
                                            <!-- <p>Sales Manager</p>
                                            <p>Shop Salesman</p>
                                            <p>Accountant</p>
                                            <p>Shop Help</p>
                                            <p>Machine Operator</p> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Staff Names</th>
                                        <td><?php echo trim(@$form_one["staff_names"],',');?></td>
                                    </tr>
                                </table>
                                </div>
                            </div>
                            <div class="cust_card">
                                <h4 class="sale_h">Shop (Dealer)</h4>
                                <div class="col-md-8 mx-auto mbt-5">
                                <table class="table cus_table">
                                    <tr>
                                        <th>Clean and acceptable Flooring</th>
                                        <td><?php echo @$form_one["accetable_flooring"];?></td>
                                    </tr>
                                    <tr>
                                        <th>Working Air Condition </th>
                                        <td><?php echo @$form_one["working_air_condition"];?></td>
                                    </tr>
                                    <tr>
                                        <th>Are Lights Working </th>
                                        <td><?php echo @$form_one["lights_working"];?></td>
                                    </tr>
                                    <tr>
                                        <th>Walls Clean & Painted </th>
                                        <td><?php echo @$form_one["wallsclean_painting"];?></td>
                                    </tr>
                                    <tr>
                                        <th>Is Shop Window Clean </th>
                                        <td><?php echo @$form_one["shopwindow_clean"];?></td>
                                    </tr>
                                    <tr>
                                        <th>Is Signboard Clean </th>
                                        <td><?php echo @$form_one["clean_signboard"];?></td>
                                    </tr>
                                    <tr>
                                        <th>Is Shop Floor Clean</th>
                                        <td><?php echo @$form_one["shop_hygiene"];?></td>
                                    </tr>                                   
                                    <tr>
                                        <th>Is Warehouse Organised</th>
                                        <td><?php echo @$form_one["warehouse_maintained"];?></td>
                                    </tr>
                                   <!--  <tr>
                                        <th>Sign Board Working Clean ,Flex not faded</th>
                                        <td></td>
                                    </tr> -->
                                </table>
                                </div>
                            </div>    
                            <div class="cust_card">
                                <h4 class="sale_h">Shop (Jotun)</h4>
                                <div class="col-md-8 mx-auto mbt-5">
                                <table class="table cus_table">
                                    <tr>
                                        <th>Signboard  Working, Clean, Flex not faded</th>
                                        <td><?php echo @$form_one["signboard"];?></td>
                                    </tr>
                                    <tr>
                                        <th>Reception Desk& Seating Area  Clean & organized</th>
                                        <td><?php echo @$form_one["receptiondesk_seatingarea"];?></td>
                                    </tr>
                                    <tr>
                                        <th>Color Bar  JCCI & JCCE (Chips Clean and all in stock and placed properly)</th>
                                        <td><?php echo @$form_one["colorbar"];?></td>
                                    </tr>
                                    <tr>
                                        <th>Brochures for JCCI & JCCE in Place</th>
                                        <td><?php echo @$form_one["brochures"];?></td>
                                    </tr>
                                    <tr>
                                        <th>Design gallery Inspiration panels clean, Pictures according </th>
                                        <td><?php echo @$form_one["design_gallery"];?></td>
                                    </tr>
                                    <tr>
                                        <th>Seating Area in Gallery Clean & Organized-</th>
                                        <td><?php echo @$form_one["seating_area_gallery"];?></td>
                                    </tr>
                                    <tr>
                                        <th>Update Color Trends & I Shape</th>
                                        <td><?php echo @$form_one["color_trend_updated"];?></td>
                                    </tr>
                                    <tr>
                                        <th>Salesman in Uniform</th>
                                        <td><?php echo @$form_one["salesman_in_uniform"];?></td>
                                    </tr>
                                    <tr>
                                        <th>Exterior display organized & lights in working condition</th>
                                        <td><?php echo @$form_one["exterior_display"];?></td>
                                    </tr>
                                    <tr>
                                        <th>POSM Available &in Designated Area. </th>
                                        <td><?php echo @$form_one["posm"];?></td>
                                    </tr>
                                    <tr>
                                        <th>Back Wall  Color of the season & LCD playing new videos.</th>
                                        <td><?php echo @$form_one["back_wall"];?></td>
                                    </tr>
                                    <tr>
                                        <th>MC Area Mc machine & area clean, Global Network Connected.	</th><td><?php echo @$form_one["mc_area"];?></td>
                                    </tr>
                                </table>
                                </div>
                            </div>    
                            <div class="cust_card">
                                <h4 class="sale_h">Salesman</h4>
                                <div class="col-md-8 mx-auto mbt-5">
                                <table class="table cus_table">
                                    <tr><th>    Jotun Way Completed	</th><td><?php echo @$form_one["jotun_way"];?></td> </tr>
                                    <tr><th>	Salesman Appearance </th><td><?php echo @$form_one["salesman_appearence"];?> </td> </tr>
                                    <tr><th>	Inform Sales Target	</th><td><?php echo @$form_one["inform_sales_target"];?></td> </tr>
                                    <tr><th>    Inform Push Campaign 	</th><td><?php echo @$form_one["inform_push_compaign"];?></td> </tr>
                                    <tr><th>	Inform End User Campaign </th><td><?php echo @$form_one["inform_enduser_campaign"];?></td> </tr>
                                    <tr><th>    Inform Salesman Incentive</th><td><?php echo @$form_one["inform_salesman_incetnive"];?></td> </tr>
                                    <tr><th>	Refresh Master Painter 	</th><td><?php echo @$form_one["refresh_master_painter"];?></td> </tr>
                                </table>
                                </div>
                            </div> 
                            <div class="cust_card">
                                <h4 class="sale_h">Products</h4>
                                <div class="col-md-8 mx-auto mbt-5">
                                <table class="table cus_table">
                                    <tr><th>    Innovations in Focus 	</th><td><?php echo @$form_one["innvations_in_focus"];?> </td> </tr>
                                    <tr><th>    Premium Products</th><td><?php echo @$form_one["premium_products"];?>  </td> </tr>
                                    <tr><th>	Area Specific Products	</th><td><?php echo @$form_one["area_specific_products"];?></td> </tr>
                                </table>
                                </div>
                            </div>
                            <div class="cust_card">
                                <h4 class="sale_h">Sales Process</h4>
                                <div class="col-md-8 mx-auto mbt-5">
                                <table class="table cus_table">
                                    <tr><th>    Salesman Greeting his Customer 	</th><td><?php echo @$form_one["salesman_greeting_his_customer"];?> </td> </tr>
                                    <tr><th>    Understanding Customer Needs</th><td><?php echo @$form_one["understanding_customer_needs"];?>  </td> </tr>
                                    <tr><th>	Asking Open Ended Questions	</th><td><?php echo @$form_one["asking_open_ended_questions"];?></td> </tr>
                                    <tr><th>    Selling Up</th><td><?php echo @$form_one["selling_up"];?>  </td> </tr>
                                    <tr><th>	Building Rapport	</th><td><?php echo @$form_one["building_rapport"];?></td> </tr>
                                </table>
                                </div>
                            </div>
                            <div class="cust_card">
                                <h4 class="sale_h">On Job Training</h4>
                                <div class="col-md-8 mx-auto mbt-5">
                                <table class="table cus_table">
                                    <tr><th>   Product Training : </th><td><?php echo @$form_one["product_training"];?></td> </tr>
                                    <tr><th>   Product Trained:     </th><td><?php echo @$form_one["product_trained"];?></td> </tr>
                                    <tr><th>    Role Play</th><td><?php echo @$form_one["role_play"];?>  </td> </tr>
                                </table>
                                </div>
                            </div>  
                            <div class="cust_card">
                                <h4 class="sale_h">Dealer</h4>
                                <div class="col-md-8 mx-auto mbt-5">
                                <table class="table cus_table">
                                    <tr><th>Communicate Sales Target	</th><td><?php echo @$form_one["communicate_sales_target"];?></td> </tr>
                                    <tr><th>Communicate Collection Target  </th><td><?php echo @$form_one["communicate_collection_target"];?></td> </tr>
                                    <tr><th>Inform Ongoing Campaigns	</th>
                                                <td>
                                                    <p><?php echo @$form_one["inform_ongoing_compaigns"];?></p>
                                                    <?php if(@$form_one["inform_ongoing_compaigns"]=="Yes"){?>
                                                    <p><?php echo trim(@$form_one["campaigns"],',');?></p>
                                                    <!-- <p>Product Campaign</p>
                                                    <p>Shop Salesman Campaign</p>
                                                    <p>End User Campaign</p>
                                                    <p>Collection Campaign</p> -->
                                                <?php } ?>
                                                </td> 
                                    </tr>
                                    <tr><th>Update on Ongoing Projects	</th><td><?php echo @$form_one["update_ongoing_projects"];?></td> </tr>
                                    <tr><th>	JDPP Completed  </th><td><?php echo @$form_one["jdpp_completed"];?></td> </tr>
                                    <tr><th>	Agreed Actions</th><td><?php echo @$form_one["agreed_actions"];?></td> </tr>
                                </table>
                                </div>
                            </div>
                            <div class="cust_card">
                                <?php $actions = explode(',',trim(@$form_one["actions"],','));              
                                 ?>
                                <h4 class="sale_h">Actions</h4>
                                <div class="col-md-8 mx-auto mbt-5">
                                <table class="table cus_table">                                    
                                    <?php if(@$actions){ foreach(@$actions as $key => $value) {
                                   ?>
                                       <tr><td><?php echo @$value;?></td></tr>            
                                <?php } } ?>  
                                </table>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <?php } ?>
                    <!---- Shopping Experience (Sales Visit) Form Closing ---->

                    
                    <!---- Shop Information Form Opening ---->
                    <?php if(@$form_three){ 
                        $owner_name = explode(',',$form_three["owner_name"]);
                        $owner_email = explode(',',$form_three["owner_email"]);
                        $owner_mobile = explode(',',$form_three["owner_mobile"]);
                        $manager_name = explode(',',$form_three["manager_name"]);
                        $manager_mobile = explode(',',$form_three["manager_mobile"]);
                        $manager_email = explode(',',$form_three["manager_email"]);
                        $salesman_name = explode(',',$form_three["salesman_name"]);
                        $salesman_mobile = explode(',',$form_three["salesman_mobile"]);
                     ?>
                    <div class="panel col-md-12">
                        <div class="shop_visit">
                            <div class="cust_card cust1_card">
                                <h4 class="sale_h">Business Owner</h4>
                                <p Class="sale_d">Responsible for all Government Rules & Regulations.Signs all Official Documents, Contracts etc.</p>
                                <div class="col-md-8 mx-auto mbt-5">
                                    <table class="table cus1_table">
                                        <tbody>
                                            <tr>
                                                <th>Name</th>
                                                <th>Mobile Number</th>
                                                <th>Email</th>
                                            </tr>
                                            <?php $j=0;foreach(@$owner_name as $key => $oname) { ?>
                                            <tr>
                                                <td><?php echo @$oname;?></td>
                                                <td><?php echo @$owner_mobile[$j];?></td>
                                                <td><?php echo @$owner_email[$j];?></td>
                                            </tr>
                                            <?php $j++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="cust_card cust1_card">
                                <h4 class="sale_h">Business Manager</h4>
                                <p Class="sale_d">Responsible for the Business, including operations, sales, shops.Right person to contact regarding Sales Campaigns, Sales Targets, Product Launches etc.</p>
                                <div class="col-md-8 mx-auto mbt-5">
                                    <table class="table cus1_table">
                                        <tbody>
                                            <tr>
                                                <th>Name</th>
                                                <th>Mobile Number</th>
                                                <th>Email</th>
                                            </tr>
                                            <?php 
                                            $i=0;
                                            foreach(@$manager_name as $ke => $mname) { ?>
                                            <tr>
                                                <td><?php echo @$mname;?></td>
                                                <td><?php echo @$manager_mobile[$i];?></td>
                                                <td><?php echo @$manager_email[$i];?></td>
                                            </tr>
                                            <?php $i++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="cust_card cust1_card">
                                <h4 class="sale_h">Accountant</h4>
                                <p Class="sale_d">Responsible for All Financial Transactions for the Dealer. Payments, Balance Confirmation, Payment Agreement, Bonus etc.</p>
                                <div class="col-md-8 mx-auto mbt-5">
                                    <table class="table cus1_table">
                                        <tbody>
                                            <tr>
                                                <th>Name</th>
                                                <th>Mobile Number</th>
                                                <th>Email</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo @$form_three["accountant_name"];?></td>
                                                <td><?php echo @$form_three["accountant_mobile"];?> </td>
                                                <td><?php echo @$form_three["accountant_email"];?></td>
                                            </tr>                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="cust_card cust1_card">
                                <h4 class="sale_h">Shop Salesman</h4>
                                <p Class="sale_d">Shop Salesman, responsible for Sell out from shop.Contact Person for Market Input, Sell out Campaigns, Shop Salesman Incentive, Painters Information etc.</p>
                                <div class="col-md-8 mx-auto mbt-5">
                                    <table class="table cus1_table">
                                        <tbody>
                                            <tr>
                                                <th>Name</th>
                                                <th>Mobile Number</th>
                                            </tr>
                                            <?php foreach(@$salesman_name as $k => $sname) { ?>
                                            <tr>
                                                <td><?php echo @$sname;?></td>
                                                <td><?php echo @$salesman_mobile[$k];?></td>    
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="cust_card cust1_card">
                                <h4 class="sale_h">Multicolor Machine Operator</h4>
                                <p Class="sale_d">Operates the Machine Tints the colors.Responsible for Global Network, Machine Maintenance etc.</p>
                                <div class="col-md-8 mx-auto mbt-5">
                                    <table class="table cus1_table">
                                        <tbody>
                                            <tr>
                                                <th>Name</th>
                                                <th>Mobile Number</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo @$form_three["operator_name"];?></td>
                                                <td><?php echo @$form_three["operator_mobile"];?> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="cust_card cust1_card">
                                <h4 class="sale_h">Shop Help</h4>
                                <p Class="sale_d">Always in the shop assists in loading, offloading, tinting, delivery etc.</p>
                                <div class="col-md-8 mx-auto mbt-5">
                                    <table class="table cus1_table">
                                        <tbody>
                                            <tr>
                                                <th>Name</th>
                                                <th>Mobile Number</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo @$form_three["help_name"];?></td>
                                                <td><?php echo @$form_three["help_mobile"];?> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  } ?>
                    <!---- Shop Information Form Closing ---->
                    <?php if(@$form_two){?>
                         <div class="panel col-md-12">
                             <div class="shop_visit">
                               <div class="cust_card cust1_card">
                                <h4 class="sale_h">Shop Profile</h4>
                                <div class="col-md-11 mx-auto mbt-5">
                                    <table class="table cus1_table cus2_table shp_1">
                                        <?php 
                                        $id= $form_two['shop_id'];
                        $de_name = $this->db->query("select * from users where acc_no in(select distinct(acc_no) from shops where id = $id)")->row()->username;
                        $sh_name = $this->db->query("select * from shops where id = $id")->row();
                                        ?>
                                        <tbody>
                                            <tr>
                                                <th>Dealer Name</th>
                                                <td><?php echo @$de_name; ?></td>
                                                <th>Shop Name</th>
                                                <td><?php echo @$sh_name->name; ?></td>
                                            </tr>
                                            <tr>                                                
                                                <th>Date of Visit </th>
                                                <td><?php echo $form_two["created"];?></td>
                                                <th>Shop Location</th>
                                                <td><?php echo @$sh_name->address; ?></td>
                                            </tr>                                           
                                            <tr>
                                                <th>Account</th>
                                                <td><?php echo @$sh_name->acc_no; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="cust_card cust1_card">
                                <div class="col-md-11 mx-auto mbt-5">
                                    <table class="table cus1_table cus2_table cus3_tb">
                                        <tbody>
                                            <tr>
                                                <th class="wd-10">Zones</th>
                                                <th>Description (EN)</th>
                                                <!-- <th class="wd-10">Scoring Range</th> -->
                                                <th class="wd-10">Score</th>
                                            </tr>
                                            <?php 
                                            $fields = explode(',',$form_two["field_id"]);
                                            $values = explode(',',$form_two["value"]);
                                            $i=0;
                                            foreach ($fields as $ke => $field){ ?>
                                        <?php if($ke==0){?>
                                            <tr class="sp_h">
                                                <td>A</td>
                                                <td>Cleanness (40%)</td>
                                                <!-- <td> </td> -->
                                                <td>40</td>
                                            </tr>
                                        <?php } ?>
                                        <?php if($ke==6){?>
                                            <tr class="sp_h">
                                                <td>B</td>
                                                <td>Organization (20%)</td>
                                                <!-- <td> </td> -->
                                                <td>20</td>
                                            </tr>
                                        <?php } ?>
                                        <?php if($ke==10){?>
                                            <tr class="sp_h">
                                                <td>C</td>
                                                <td>Availability & Condition of POSM (40%)</td>
                                                <!-- <td> </td> -->
                                                <td>40</td>
                                            </tr>
                                        <?php } ?>
                                            <tr>
                                                <td><?php echo @$ke+1; ?></td>
                                                <td><?php echo $this->db->where("id",$field)->get("form_fields")->row_array()["name"];?></td>
                                                <!-- <td>0</td> -->
                                                <td><?php echo $values[$i];?></td> 
                                            </tr>

                                        <?php $i++; } ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th colspan="2">Total Marks</th>
                                            <th><?php echo array_sum(@$values);?></th>
                                            </tr>
                                            <!-- <tr>
                                                <th colspan="2">Total Bonus (Max 2 %)</th>
                                                <th>2</th>
                                            </tr> -->
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                             </div>
                         </div>
                     <?php } ?>
                     <?php if(@$form_four){?>
                          <div class="panel col-md-12">
                             <div class="shop_visit">
                               <div class="cust_card cust1_card">
                                <h4 class="sale_h">Shop Profile</h4>
                                <div class="col-md-11 mx-auto mbt-5">
                                    <table class="table cus1_table cus2_table shp_1">
                                         <?php 
                                        $id= $form_four['shop_id'];
                        $de_name = $this->db->query("select * from users where acc_no in(select distinct(acc_no) from shops where id = $id)")->row()->username;                        
                        $sh_name = $this->db->query("select * from shops where id = $id")->row();
                        $reception_area = explode(',',trim(@$form_four["reception_area"],','));
                        $type_of_area = explode(',',trim(@$form_four["type_of_area"],','));
                        $shop_facade = explode(',',trim(@$form_four["shop_facade"],','));
                        $jcci = explode(',',trim(@$form_four["jcci"],','));
                        $jcce = explode(',',trim(@$form_four["jcce"],','));
                        $design_gallery = explode(',',trim(@$form_four["design_gallery"],','));
                        $enterior_display = explode(',',trim(@$form_four["enterior_display"],','));
                                        ?>
                                        <tbody>
                                            <tr>
                                                <th>Dealer Name</th>
                                                <td><?php echo @$de_name; ?></td>
                                                <th>Shop Name</th>
                                                <td><?php echo @$sh_name->name; ?></td>
                                            </tr>
                                            <tr>                                                
                                                <th>Date of Visit </th>
                                                <td><?php echo @$form_four["created"];?></td>
                                                <th>Shop Location</th>
                                                <td><?php echo @$sh_name->address; ?></td>
                                            </tr>                                           
                                            <tr>
                                                <th>Account</th>
                                                <td><?php echo @$sh_name->acc_no; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if(@!empty($reception_area)){ echo"<h3>Reception Area</h3>"; foreach (@$reception_area as $key => $value) { if($value != ""){
                                   ?>
                                        <img src="<?php echo base_url();?>server/assets/shop_profiles/<?php echo @$value; ?>" class="cust_jimg" alt="img">            
                                }
                                <?php } } } ?>                               
                                <?php if(@$shop_facade){ echo"<h3>SHOP Facade</h3>"; foreach (@$shop_facade as $key => $value) { if($value != ""){
                                   ?>
                                        <img src="<?php echo base_url();?>server/assets/shop_profiles/<?php echo @$value; ?>" class="cust_jimg" alt="img">            
                                <?php } } } ?> 
                                <?php if(@$jcci){ echo"<h3>JCCI</h3>"; foreach (@$jcci as $key => $value) { if($value != ""){
                                   ?>
                                        <img src="<?php echo base_url();?>server/assets/shop_profiles/<?php echo @$value; ?>" class="cust_jimg" alt="img">            
                                <?php } } } ?> 
                                <?php if(@$jcce){ echo"<h3>JCCE</h3>"; foreach (@$jcce as $key => $value) { if($value != ""){
                                   ?>
                                        <img src="<?php echo base_url();?>server/assets/shop_profiles/<?php echo @$value; ?>" class="cust_jimg" alt="img">            
                                <?php } } } ?> 
                                <?php if(@$design_gallery){ echo"<h3>Design Gallary</h3>"; foreach (@$design_gallery as $key => $value) { if($value != ""){
                                   ?>
                                        <img src="<?php echo base_url();?>server/assets/shop_profiles/<?php echo @$value; ?>" class="cust_jimg" alt="img">            
                                <?php } } } ?> 
                                <?php if(@$enterior_display){ echo"<h3>Interior Display</h3>"; foreach (@$enterior_display as $key => $value) { if($value != ""){
                                   ?>
                                        <img src="<?php echo base_url();?>server/assets/shop_profiles/<?php echo @$value; ?>" class="cust_jimg" alt="img">            
                                <?php } } } ?> 
                                 <?php if(@$type_of_area){ echo"<h3>any Other Photos</h3>"; foreach (@$type_of_area as $key => $value) { if($value != ""){
                                   ?>
                                        <img src="<?php echo base_url();?>server/assets/shop_profiles/<?php echo @$value; ?>" class="cust_jimg" alt="img">            
                                <?php } } } ?>                                
                            </div>
                            </div>
                            </div>
                        <?php } ?>
                </div>
            </section>
            <!-- End: Content -->

        </section>
        <?php $this->load->view($this->config->item('footer_view')); ?>
    </div>
    <?php $this->load->view($this->config->item('scripts_view')); ?>
</body>
