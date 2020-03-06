<body class="dashboard-page sb-l-o sb-r-c">
    <style>
.admin-form .gui-input[disabled]{
color:black;
}
.admin-form select[disabled]{
color:black;
}
.multiselect-container {
		height:400px;
		overflow:auto;
	}
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
        .sb-l-disable-animati]on .sidebar-menu .media {
                                  border-bottom: 0px !important;
                              }
        .sb-l-disable-animation .sidebar-menu .media .media-heading {display:none !important;}
        .sb-l-disable-animation .plusminus {display:none !important;}
        .logo_h3 .dashbrd-menu{
            font-size: 15px !important;
            margin-left: -10px !important;
            margin-top:5px;

        }
        #toggle_sidemenu_l, #toggle_sidemenu_t {

            width: 40px !important;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }
        .admin-form .gui-textarea {height:42px;}
        .subtotalDiv {
            background: #e8e8e8;
            padding: 10px 1px;
            overflow:hidden;
        }
        .subtotalDiv label.col-md-4.col-sm-4.col-xs-12 {
            margin-top: 12px;
            font-size: 15px;
        }
        .admin-form .form-group {
            margin-bottom: 20px;
            overflow: hidden;
        }
   .admin-form .prepend-icon > input, .admin-form .prepend-icon > textarea {
    padding-left: 10px !important;
}
form#editUserForm label.field-icon {
display: none;
}
  .form-group.text-right button.btn.btn-success {
      margin-right: 13px;
}
    label.col-md-4.col-sm-4.col-xs-12 {
            text-align: right;
    font-size: 15px;
    margin-top: 10px;
        position: relative;
    right: 15px;
}
<!--button.multiselect.dropdown-toggle.btn.btn-default {
    text-align: left;
    background: transparent;
	width:100%;
}
ul.multiselect-container.dropdown-menu label.checkbox{
	border:0px !important;
}
span.multiselect-native-select .btn-group{
	width: 100%;
    overflow: visible;
    border: 1px solid #eee;
}
ul.multiselect-container.dropdown-menu {
	width:100%;
}
.dropdown-menu > .active > a {
	background-color:white !important;
}-->
ul.multiselect-container.dropdown-menu label.checkbox {
	color:#444;
	font-size:15px !important;
}
.added_input{
    position:relative !important;
    overflow: hidden;
    clear: both;
    display: block;
}
.remove_button{
    position: absolute !important;
    top: 6%;
    left: 97%;
    right: 0%;
}
.remove_icon{
        font-size: 25px;
    vertical-align: middle;
    margin-top: 20%;
    color: red;
}

    </style>
 <div id="main">
    <?php $this->load->view($this->config->item('header_view')); ?>
    <?php $this->load->view($this->config->item('sidebar_view')); ?>
    <style>
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }
        .admin-form .gui-textarea {
            height:42px;
        }
        .subtotalDiv {
            background: #e8e8e8;
            padding: 10px 1px;
            overflow:hidden;
        }
        .subtotalDiv label.col-md-4.col-sm-4.col-xs-12 {
            margin-top: 12px;
            font-size: 15px;
        }
        .admin-form .form-group {
            margin-bottom: 20px;
            overflow: hidden;
        }
    </style>
    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">
        <div class="row mb10">
            <div class="inner-header mb10">
                <div class="bread-cumLeft">
                    <ol class="breadcrumb">
                        <li>Home</li>
                        <li class="crumb-active">Dealer Management</li>
                        <li class="crumb-active">Edit Dealer</li>
                    </ol>
                </div>
            </div>
        </div>

<?php if($this->session->flashdata('message') != ""){ ?>
	<?php echo '<script>setTimeout(function() {swal({title: "Details updated successfully!"});}, 100);</script>'; ?>
	<?php } ?>		


        <!-- Begin: Content -->
        <section id="content" class="table-layout animated fadeIn">
            <!-- begin: .tray-center -->
            <div class="tray tray-center">
                <!-- create new order panel -->
                <div class="panel mb25 mt5">
                    <div class="panel-heading">
                        <span class="panel-title hidden-xs">Dealer</span>
                    </div>
                    <div class="panel-body p20 pb10">


 <form method="POST" action="<?php echo base_url(); ?>dealers/update_dealer/<?php echo $objUser->id; ?>"  id="editUserForm"  enctype="multipart/form-data">

<div id="shops_data" >
<div class="col-md-10 form-group">
<label for="code" class="col-md-4 col-sm-4 col-xs-12">Select Zone</label>
<div class="col-md-8 col-sm-8 col-xs-12">
<label for="code" class="field select">
 <?php if(@$zone_id){ ?>
    <div class="form-group">
        <div class="col-md-6 col-sm-8 col-xs-12">
            <label for="name2" class="field select">
                <select class="form-control event-name gui-input br-light light" name="zone" id="zone1" onchange="eget_shops_acc();">
                    <option value="<?=$zone_id?>"><?=$zone?></option>
                </select>
            </label>
        </div>
    </div>
    <?php }else{ ?>
        <select class="form-control event-name gui-input br-light light" name="zone" id="zone1" onchange="eget_shops_acc();">
            <option value="">Select Zone</option>
            <option <?php if($objUser->zone == 1){ ?> selected="selected" <?php } ?> value="1">Riyadh</option>
            <option <?php if($objUser->zone == 2){ ?> selected="selected" <?php } ?> value="2">Khamis</option>
            <option <?php if($objUser->zone == 3){ ?> selected="selected" <?php } ?> value="3">Jeddah</option>
            <option <?php if($objUser->zone == 4){ ?> selected="selected" <?php } ?> value="4">Dammam</option>
            <option <?php if($objUser->zone == 5){ ?> selected="selected" <?php } ?> value="5">Yanbu</option>
        </select>
    <?php } ?>
<label for="name2" class="field-icon">
<i class="arrow double"></i>
</label>
</label>
</div>
</div>
<input type="hidden" id="userid" value="<?php  echo $this->uri->segment(3); ?>" >
<?php if($arrShops == ""){ ?>
<?php }else{ ?>
 <?php $temp=array();
        foreach($arrShops as $result_tasks){ ?>
        <?php array_push($temp,$result_tasks['id']); ?>							 
  						  <?php } ?>
<?php } ?>
<div id="shop_account_number_replace">
    <div class="col-md-10 form-group">
        <label for="name1" class="col-md-4 col-sm-4 col-xs-12" style="text-align: right;">Shops Account Number<span class="star">*</span></label>
        <div class="col-md-8 col-sm-8 col-xs-12" >
            <select name="shop_acc_number" class="form-control">
                <option value="<?php echo $objUser->acc_no;?>" selected><?php echo $objUser->acc_no;?></option>
                <?php 
                foreach($shopp_acc as $shop_acc)
                {
                    ?><option value="<?php echo $shop_acc['acc_no'];?>"><?php echo $shop_acc['acc_no'];?></option><?php
                    /* if($objUser->acc_no == $shop_acc['acc_no']){?>
                     <option value="<?php echo $shop_acc['acc_no'];?>" selected><?php echo $shop_acc['acc_no'];?></option>
                     <?php
                     }
                     else
                     {
                         ?><option value="<?php echo $shop_acc['acc_no'];?>"><?php echo $shop_acc['acc_no'];?></option><?php
                     }*/
                } ?>
               
    				
            </select>
	    </div>
	</div>
</div>
<!--<div id="shops_zone_replace">-->
<!--<div class="col-md-10 form-group">-->
<!--<label class="col-lg-4  col-md-4 col-sm-6 col-xs-12  fs14 control-label text-right mt10" for="textArea1">Assign Shop</label>-->
<!--<div class="col-lg-8  col-md-8 col-sm-6 col-xs-12" id="shop_result">-->
<!--<div class="">-->
<!--<?php if($arrShops == ""){ ?>-->
<!--        <select name="shop_id[]" class="form-control" multiple="multiple" size="2" id="shops">-->
<!--            <?php foreach($shops as $result){?>								  							  -->
<!--            <option  value="<?php echo $result['id']; ?>" ><?php echo $result['name']; ?></option>							  -->
<!--            <?php } ?>-->
<!--        </select>                            -->
<!--<?php }else{?>-->
<!--<select name="shop_id[]" class="form-control" multiple="multiple" size="2" id="shops">-->
<!--<?php foreach($shops as $result){?>								  							  -->
<!--<option  value="<?php echo $result['id']; ?>" <?php if(in_array($result['id'],$temp)){echo "selected"; }?>><?php echo $result['name']; ?></option>							  -->
<!--<?php } ?>-->

<!--</select>                            -->
<!--<?php } ?>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
</div>
   

                        <div class="admin-form">
                            <div class="section row mbn">
                                <div class="col-md-10 col-sm-10 pl15">
                                    <div class="section row mb15">
                                        <div class="form-group">
                                            <label for="name" class="col-md-4 col-sm-4 col-xs-12">Username</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <label for="name" class="field prepend-icon">
  <?php if($this->lib_auth->getRoleID() == 1){ ?>
                                                    <?php echo form_input(array('name' => 'username', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter name here', 'value' => set_value('username', $objUser->username))); ?>
<?php  }else{ ?>
<input type="text" name="username" class="event-name gui-input br-light light" placeholder="Enter name here" 
value="<?php echo $objUser->username ?>" readonly >
<?php } ?>
                                                    <label for="name" class="field-icon">
                                                        <i class="fa fa-list-ol"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="code" class="col-md-4 col-sm-4 col-xs-12">First Name</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <label for="name" class="field prepend-icon">
  <?php if($this->lib_auth->getRoleID() == 1){ ?>
                                                    <?php echo form_input(array('name' => 'first_name', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter Firstname here', 'value' => set_value('name', $objUser->first_name))); ?>
<?php }else{ ?>
<input type="text" name="first_name" class="event-name gui-input br-light light" placeholder="Enter Firstname here" 
value="<?php echo $objUser->first_name; ?>" readonly >
<?php  } ?>
                                                    <label for="name" class="field-icon">
                                                        <i class="fa fa-list-ol"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="col-md-4 col-sm-4 col-xs-12">Last Name</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <label for="name" class="field prepend-icon">
  <?php if($this->lib_auth->getRoleID() == 1){ ?>
                                                    <?php echo form_input(array('name' => 'last_name', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter Lastname here', 'value' => set_value('name', $objUser->last_name))); ?>
<?php }else{ ?>
<input type="text" name="last_name" class="event-name gui-input br-light light" value="<?php echo $objUser->last_name; ?>" readonly >
<?php  } ?>
                                                    <label for="name" class="field-icon">
                                                        <i class="fa fa-list-ol"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="col-md-4 col-sm-4 col-xs-12">Phone</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <label for="name" class="field prepend-icon">
  <?php if($this->lib_auth->getRoleID() == 1){ ?>
                                                    <?php echo form_input(array('name' => 'phone', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter phone here', 'value' => set_value('name', $objUser->phone))); ?>
<?php }else{?>
                                         
<input type="text" name="phone" class="event-name gui-input br-light light" value="<?php echo $objUser->phone; ?>" readonly >
<?php  } ?>
                                                    <label for="name" class="field-icon">
                                                        <i class="fa fa-list-ol"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="col-md-4 col-sm-4 col-xs-12">Email </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <label for="name" class="field prepend-icon">
  <?php if($this->lib_auth->getRoleID() == 1){ ?>
                                                    <?php echo form_input(array('name' => 'email', 'id'=>'email', 'class' => 'event-name gui-input br-light light', 'onblur'=>'checkMailStatus()', 'placeholder' => 'Enter Email here', 'value' => set_value('name', $objUser->email))); ?>
<?php }else{ ?>
<input type="text" name="email" class="event-name gui-input br-light light" value="<?php echo $objUser->email; ?>" readonly >
<?php  } ?>
<span style="color:red;display:none" id="email_error">This Email Already Exist</span>
                                                    <label for="name" class="field-icon">
                                                        <i class="fa fa-list-ol"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>
                                        <div class=" form-group">
                                                <label for="name1" class="col-md-4 col-sm-4 col-xs-12">Image<span class="star"></span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <label for="password" class="field prepend-icon">
                                                        <?php //echo form_file(array('name' => 'file', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Re-enter password here', 'value' => set_value('password_cnf')));
                                                        ?>
                                                       <input type="file" name="file" class='event-name gui-input br-light light'>
                                                    </label>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="status" class="col-md-4 col-sm-4 col-xs-12">Status</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <label for="status" class="field select">
                                                    <?php echo form_dropdown('status', $this->config->item('roles_status'), set_value('status', $objUser->status), 'class="select-search"'); ?>
                                                    <i class="arrow double"></i>
                                                </label>
                                            </div>
                                        </div>
                                            
<!-- <div class="form-group duration_div" id="full-targets">
    <div class="target-tabs">
        <ul class="nav nav-tabs nav-tabs1">
    <li class="active time_dur"><a data-toggle="tab" href="#Monthly">Monthly</a></li>
    <li class="time_dur"><a data-toggle="tab" href="#Yearly">Yearly</a></li>
  </ul>

  <div class="tab-content"> -->
<!--     <div id="Monthly" class="tab-pane fade in active">
    <ul class="nav nav-tabs">
  <li <?php if(date("m")==1){ ?> class="active" <?php }?> ><a data-toggle="tab" href="#Jan">Jan</a></li>
  <li <?php if(date("m")==2){ ?> class="active" <?php }?> ><a data-toggle="tab" href="#Feb">Feb</a></li>
  <li <?php if(date("m")==3){ ?> class="active" <?php }?> ><a data-toggle="tab" href="#March">March</a></li>
  <li <?php if(date("m")==4){ ?> class="active" <?php }?> ><a data-toggle="tab" href="#April">April</a></li>
  <li <?php if(date("m")==5){ ?> class="active" <?php }?> ><a data-toggle="tab" href="#May">May</a></li>
  <li <?php if(date("m")==6){ ?> class="active" <?php }?> ><a data-toggle="tab" href="#June">June</a></li>
  <li <?php if(date("m")==7){ ?> class="active" <?php }?> ><a data-toggle="tab" href="#July">July</a></li>
  <li <?php if(date("m")==8){ ?> class="active" <?php }?> ><a data-toggle="tab" href="#Aug">Aug</a></li>
  <li <?php if(date("m")==9){ ?> class="active" <?php }?> ><a data-toggle="tab" href="#Sep">Sep</a></li>
  <li <?php if(date("m")==10){ ?> class="active" <?php }?> ><a data-toggle="tab" href="#Oct">Oct</a></li>
  <li <?php if(date("m")==11){ ?> class="active" <?php }?> ><a data-toggle="tab" href="#Nov">Nov</a></li>
  <li <?php if(date("m")==12){ ?> class="active" <?php }?> ><a data-toggle="tab" href="#Dec">Dec</a></li>
  <li ><a data-toggle="tab" href="#Jan1">Jan</a></li>
</ul>

<div class="tab-content">
  <div id="Jan" class="tab-pane fade <?php if(date("m")==01){ echo " in active"; }?>">
  <div class="col-md-12 pad_0 tabs-col january">
    <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[january][total_sales]" id="january_total_sales" class="form-control number" value="<?php echo ($targets[0]['total_sales'])?$targets[0]['total_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[january][total_collection]" id="january_total_collection" class="form-control number" value="<?php echo ($targets[0]['total_collection'])?$targets[0]['total_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Product Targets</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[january][total_product_target]" id="january_total_product_target" class="form-control number" value="<?php echo ($targets[0]['total_product_target'])?$targets[0]['total_product_target']:''; ?>">
  </div>
  <div class="col-md-1 pad_0">
     <span onclick="add_fields('january')" ><i class="fa fa-plus-square-o add_icon" aria-hidden="true"></i></span>
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[january][achieved_sales]"  id="january_total_sales" class="form-control number" value="<?php echo ($targets[0]['achieved_sales'])?$targets[0]['achieved_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[january][achieved_collection]"  id="january_total_collection" class="form-control number" value="<?php echo ($targets[0]['achieved_collection'])?$targets[0]['achieved_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Product</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[january][achieved_product]" id="january_total_product_target" class="form-control number" value="<?php echo ($targets[0]['achieved_product'])?$targets[0]['achieved_product']:''; ?>">
  </div>
  </div>
  
  <?php 
    $january_targets = $this->db->order_by('id','asc')->get_where("dealer_product_targets",array("dealer_id"=>$objUser->id,"month"=>1))->result();
    if(!empty($january_targets))
    {
        foreach($january_targets as $p_target){
  ?>
        <div class="added_input"><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Product Name</label></div><div class="col-md-8"><input type="text" name="january[product_name][]" class="form-control" value="<?php echo($p_target->product_name)?$p_target->product_name:'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label class="tar-lable">Product Target</label></div><div class="col-md-8"><input type="text" name="january[product_targets][]" class="form-control" value="<?php echo($p_target->product_targets)?number_format($p_target->product_targets):'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Achieved Targets</label></div><div class="col-md-8"><input type="text" name="january[achieved_targets][]" class="form-control" value="<?php echo($p_target->achieved_targets)?number_format($p_target->achieved_targets):'';?>"></div></div><span id="january" class="col-md-1 pad_0 remove_button" onclick="remove_fields(this.id)"><i class="fa fa-minus-square-o remove_icon"></i></span></div>
     <?php } 
    }
    ?>
</div>
  </div>
  <div id="Feb" class="tab-pane fade <?php if(date("m")==2){ echo " in active"; }?>">
  <div class="col-md-12 pad_0 tabs-col february">
    <div class="col-md-4 pad_0 target_content">
<div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[february][total_sales]" class="form-control number" id="february_total_sales" value="<?php echo ($targets[1]['total_sales'])?$targets[1]['total_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[february][total_collection]" class="form-control number" id="february_total_collection" value="<?php echo ($targets[1]['total_collection'])?$targets[1]['total_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Product Targets</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[february][total_product_target]" class="form-control number" id="february_total_product_target" value="<?php echo ($targets[1]['total_product_target'])?$targets[1]['total_product_target']:''; ?>">
  </div>
  <div class="col-md-1 pad_0">
  <span onclick="add_fields('february')" ><i class="fa fa-plus-square-o add_icon" aria-hidden="true"></i></span>
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[february][achieved_sales]"  id="january_total_sales" class="form-control number" value="<?php echo ($targets[1]['achieved_sales'])?$targets[1]['achieved_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[february][achieved_collection]"  id="january_total_collection" class="form-control number" value="<?php echo ($targets[1]['achieved_collection'])?$targets[1]['achieved_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Product</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[february][achieved_product]" id="january_total_product_target" class="form-control number" value="<?php echo ($targets[1]['achieved_product'])?$targets[1]['achieved_product']:''; ?>">
  </div>
  </div>
  
  <?php 
    $february_targets = $this->db->order_by('id','asc')->get_where("dealer_product_targets",array("dealer_id"=>$objUser->id,"month"=>2))->result();
    if(!empty($february_targets))
    {
        foreach($february_targets as $p_target){
  ?>
  <div class="added_input"><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Product Name</label></div><div class="col-md-8"><input type="text" name="february[product_name][]" class="form-control" value="<?php echo($p_target->product_name)?$p_target->product_name:'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label class="tar-lable">Product Target</label></div><div class="col-md-8"><input type="text" name="february[product_targets][]" class="form-control" value="<?php echo($p_target->product_targets)?number_format($p_target->product_targets):'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Achieved Targets</label></div><div class="col-md-8"><input type="text" name="february[achieved_targets][]" class="form-control" value="<?php echo($p_target->achieved_targets)?number_format($p_target->achieved_targets):'';?>"></div></div><span id="february" class="col-md-1 pad_0 remove_button" onclick="remove_fields(this.id)"><i class="fa fa-minus-square-o remove_icon"></i></span></div>
<?php } 
    }
    ?>
</div>
  </div>
  <div id="March" class="tab-pane fade <?php if(date("m")==3){ echo " in active"; }?>">
  <div class="col-md-12 pad_0 tabs-col march">
    <div class="col-md-4 pad_0 target_content">
<div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[march][total_sales]" class="form-control number"  id="march_total_sales"  value="<?php echo ($targets[2]['total_sales'])?$targets[2]['total_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[march][total_collection]" class="form-control number" id="march_total_collection" value="<?php echo ($targets[2]['total_collection'])?$targets[2]['total_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Product Targets</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[march][total_product_target]" class="form-control number" id="march_total_product_target" value="<?php echo ($targets[2]['total_product_target'])?$targets[2]['total_product_target']:''; ?>">
  </div>
  <div class="col-md-1 pad_0">
  <span onclick="add_fields('march')" ><i class="fa fa-plus-square-o add_icon" aria-hidden="true"></i></span>
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[march][achieved_sales]"  id="january_total_sales" class="form-control number" value="<?php echo ($targets[2]['achieved_sales'])?$targets[2]['achieved_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[march][achieved_collection]"  id="january_total_collection" class="form-control number" value="<?php echo ($targets[2]['achieved_collection'])?$targets[2]['achieved_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Product</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[march][achieved_product]" id="january_total_product_target" class="form-control number" value="<?php echo ($targets[2]['achieved_product'])?$targets[2]['achieved_product']:''; ?>">
  </div>
  </div>
<?php 
 $march_targets = $this->db->order_by('id','asc')->get_where("dealer_product_targets",array("dealer_id"=>$objUser->id,"month"=>3))->result();
    if(!empty($march_targets))
    {
        foreach($march_targets as $p_target){
  ?>
  <div class="added_input"><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Product Name</label></div><div class="col-md-8"><input type="text" name="march[product_name][]" class="form-control" value="<?php echo($p_target->product_name)?$p_target->product_name:'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label class="tar-lable">Product Target</label></div><div class="col-md-8"><input type="text" name="march[product_targets][]" class="form-control" value="<?php echo($p_target->product_targets)?number_format($p_target->product_targets):'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Achieved Targets</label></div><div class="col-md-8"><input type="text" name="march[achieved_targets][]" class="form-control" value="<?php echo($p_target->achieved_targets)?number_format($p_target->achieved_targets):'';?>"></div></div><span id="march" class="col-md-1 pad_0 remove_button" onclick="remove_fields(this.id)"><i class="fa fa-minus-square-o remove_icon"></i></span></div>
<?php } 
    } ?>
    
    
</div>
  </div>
  <div id="April" class="tab-pane fade <?php if(date("m")==4){ echo " in active"; }?>">
  <div class="col-md-12 pad_0 tabs-col april">
    <div class="col-md-4 pad_0 target_content">
<div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[april][total_sales]" class="form-control number" id="april_total_sales" value="<?php echo ($targets[3]['total_sales'])?$targets[3]['total_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[april][total_collection]" class="form-control number" id="april_total_collection" value="<?php echo ($targets[3]['total_collection'])?$targets[3]['total_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Product Targets</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[april][total_product_target]" class="form-control number" id="april_total_product_target" value="<?php echo ($targets[3]['total_product_target'])?$targets[3]['total_product_target']:''; ?>">
  </div>
  <div class="col-md-1 pad_0">
  <span onclick="add_fields('april')" ><i class="fa fa-plus-square-o add_icon" aria-hidden="true"></i></span>
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[april][achieved_sales]"  id="january_total_sales" class="form-control number" value="<?php echo ($targets[3]['achieved_sales'])?$targets[3]['achieved_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[april][achieved_collection]"  id="january_total_collection" class="form-control number" value="<?php echo ($targets[3]['achieved_collection'])?$targets[3]['achieved_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Product</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[april][achieved_product]" id="january_total_product_target" class="form-control number" value="<?php echo ($targets[3]['achieved_product'])?$targets[3]['achieved_product']:''; ?>">
  </div>
  </div>
<?php 
    $april_targets = $this->db->order_by('id','asc')->get_where("dealer_product_targets",array("dealer_id"=>$objUser->id,"month"=>4))->result();
    if(!empty($april_targets))
    {
       foreach($april_targets as $p_target){
  ?>
  <div class="added_input"><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Product Name</label></div><div class="col-md-8"><input type="text" name="april[product_name][]" class="form-control" value="<?php echo($p_target->product_name)?$p_target->product_name:'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label class="tar-lable">Product Target</label></div><div class="col-md-8"><input type="text" name="april[product_targets][]" class="form-control" value="<?php echo($p_target->product_targets)?number_format($p_target->product_targets):'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Achieved Targets</label></div><div class="col-md-8"><input type="text" name="april[achieved_targets][]" class="form-control" value="<?php echo($p_target->achieved_targets)?number_format($p_target->achieved_targets):'';?>"></div></div><span id="april" class="col-md-1 pad_0 remove_button" onclick="remove_fields(this.id)"><i class="fa fa-minus-square-o remove_icon"></i></span></div>
<?php } 
    } ?> 
    
</div>
  </div>
  <div id="May" class="tab-pane fade <?php if(date("m")==5){ echo " in active"; }?>">
  <div class="col-md-12 pad_0 tabs-col may">
    <div class="col-md-4 pad_0 target_content">
<div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[may][total_sales]" class="form-control number" id="may_total_sales" value="<?php echo ($targets[4]['total_sales'])?$targets[4]['total_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[may][total_collection]" class="form-control number"  id="may_total_collection" value="<?php echo ($targets[4]['total_collection'])?$targets[4]['total_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Product Targets</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[may][total_product_target]" class="form-control number" id="may_total_product_target" value="<?php echo ($targets[4]['total_product_target'])?$targets[4]['total_product_target']:''; ?>">
  </div>
  <div class="col-md-1 pad_0">
  <span onclick="add_fields('may')" ><i class="fa fa-plus-square-o add_icon" aria-hidden="true"></i></span>
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[may][achieved_sales]"  id="january_total_sales" class="form-control number" value="<?php echo ($targets[4]['achieved_sales'])?$targets[4]['achieved_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[may][achieved_collection]"  id="january_total_collection" class="form-control number" value="<?php echo ($targets[4]['achieved_collection'])?$targets[4]['achieved_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Product</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[may][achieved_product]" id="january_total_product_target" class="form-control number" value="<?php echo ($targets[4]['achieved_product'])?$targets[4]['achieved_product']:''; ?>">
  </div>
  </div>
 <?php 
    $may_targets = $this->db->order_by('id','asc')->get_where("dealer_product_targets",array("dealer_id"=>$objUser->id,"month"=>5))->result();
    if(!empty($may_targets))
    {
       foreach($may_targets as $p_target){
      ?>
      <div class="added_input"><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Product Name</label></div><div class="col-md-8"><input type="text" name="may[product_name][]" class="form-control" value="<?php echo($p_target->product_name)?$p_target->product_name:'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label class="tar-lable">Product Target</label></div><div class="col-md-8"><input type="text" name="may[product_targets][]" class="form-control" value="<?php echo($p_target->product_targets)?number_format($p_target->product_targets):'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Achieved Targets</label></div><div class="col-md-8"><input type="text" name="may[achieved_targets][]" class="form-control" value="<?php echo($p_target->achieved_targets)?number_format($p_target->achieved_targets):'';?>"></div></div><span id="may" class="col-md-1 pad_0 remove_button" onclick="remove_fields(this.id)"><i class="fa fa-minus-square-o remove_icon"></i></span></div>
    <?php } 
    }
    ?> 
</div>
  </div>
  <div id="June" class="tab-pane fade <?php if(date("m")==6){ echo " in active"; }?>">
  <div class="col-md-12 pad_0 tabs-col june">
    <div class="col-md-4 pad_0 target_content">
<div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[june][total_sales]" class="form-control number" id="june_total_sales" value="<?php echo ($targets[5]['total_sales'])?$targets[5]['total_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[june][total_collection]" class="form-control number" id="june_total_collection" value="<?php echo ($targets[5]['total_collection'])?$targets[5]['total_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Product Targets</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[june][total_product_target]" class="form-control number" id="june_total_product_target" value="<?php echo ($targets[5]['total_product_target'])?$targets[5]['total_product_target']:''; ?>">
  </div>
  <div class="col-md-1 pad_0">
  <span onclick="add_fields('june')" ><i class="fa fa-plus-square-o add_icon" aria-hidden="true"></i></span>
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[june][achieved_sales]"  id="january_total_sales" class="form-control number" value="<?php echo ($targets[5]['achieved_sales'])?$targets[5]['achieved_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[june][achieved_collection]"  id="january_total_collection" class="form-control number" value="<?php echo ($targets[5]['achieved_collection'])?$targets[5]['achieved_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Product</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[june][achieved_product]" id="january_total_product_target" class="form-control number" value="<?php echo ($targets[5]['achieved_product'])?$targets[5]['achieved_product']:''; ?>">
  </div>
  </div>
<?php 
    $june_targets = $this->db->order_by('id','asc')->get_where("dealer_product_targets",array("dealer_id"=>$objUser->id,"month"=>6))->result();
    if(!empty($june_targets))
    {
       foreach($june_targets as $p_target){
  ?>
  <div class="added_input"><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Product Name</label></div><div class="col-md-8"><input type="text" name="june[product_name][]" class="form-control" value="<?php echo($p_target->product_name)?$p_target->product_name:'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label class="tar-lable">Product Target</label></div><div class="col-md-8"><input type="text" name="june[product_targets][]" class="form-control" value="<?php echo($p_target->product_targets)?number_format($p_target->product_targets):'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Achieved Targets</label></div><div class="col-md-8"><input type="text" name="june[achieved_targets][]" class="form-control" value="<?php echo($p_target->achieved_targets)?number_format($p_target->achieved_targets):'';?>"></div></div><span id="june" class="col-md-1 pad_0 remove_button" onclick="remove_fields(this.id)"><i class="fa fa-minus-square-o remove_icon"></i></span></div>
<?php } 
    }
    ?> 
</div>
  </div>
  <div id="July" class="tab-pane fade <?php if(date("m")==7){ echo " in active"; }?>">
  <div class="col-md-12 pad_0 tabs-col july">
    <div class="col-md-4 pad_0 target_content">
<div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[july][total_sales]" class="form-control number" id="july_total_sales" value="<?php echo ($targets[6]['total_sales'])?$targets[6]['total_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[july][total_collection]" class="form-control number" id="july_total_collection" value="<?php echo ($targets[6]['total_collection'])?$targets[6]['total_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Product Targets</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[july][total_product_target]" class="form-control number" id="july_total_product_target" value="<?php echo ($targets[6]['total_product_target'])?$targets[6]['total_product_target']:''; ?>">
  </div>
  <div class="col-md-1 pad_0">
  <span onclick="add_fields('july')" ><i class="fa fa-plus-square-o add_icon" aria-hidden="true"></i></span>
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[july][achieved_sales]"  id="january_total_sales" class="form-control number" value="<?php echo ($targets[6]['achieved_sales'])?$targets[6]['achieved_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[july][achieved_collection]"  id="january_total_collection" class="form-control number" value="<?php echo ($targets[6]['achieved_collection'])?$targets[6]['achieved_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Product</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[july][achieved_product]" id="january_total_product_target" class="form-control number" value="<?php echo ($targets[6]['achieved_product'])?$targets[6]['achieved_product']:''; ?>">
  </div>
  </div>
<?php 
    $july_targets = $this->db->order_by('id','asc')->get_where("dealer_product_targets",array("dealer_id"=>$objUser->id,"month"=>7))->result();
    if(!empty($july_targets))
    {
        foreach($july_targets as $p_target){
  ?>
  <div class="added_input"><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Product Name</label></div><div class="col-md-8"><input type="text" name="july[product_name][]" class="form-control" value="<?php echo($p_target->product_name)?$p_target->product_name:'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label class="tar-lable">Product Target</label></div><div class="col-md-8"><input type="text" name="july[product_targets][]" class="form-control" value="<?php echo($p_target->product_targets)?number_format($p_target->product_targets):'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Achieved Targets</label></div><div class="col-md-8"><input type="text" name="july[achieved_targets][]" class="form-control" value="<?php echo($p_target->achieved_targets)?number_format($p_target->achieved_targets):'';?>"></div></div><span id="july" class="col-md-1 pad_0 remove_button" onclick="remove_fields(this.id)"><i class="fa fa-minus-square-o remove_icon"></i></span></div>
<?php } 
    }
    ?>
</div>
  </div>
  <div id="Aug" class="tab-pane fade <?php if(date("m")==8){ echo " in active"; }?>">
  <div class="col-md-12 pad_0 tabs-col august">
    <div class="col-md-4 pad_0 target_content">
<div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[august][total_sales]" class="form-control number" id="august_total_sales" value="<?php echo ($targets[7]['total_sales'])?$targets[7]['total_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[august][total_collection]" class="form-control number" id="august_total_collection" value="<?php echo ($targets[7]['total_collection'])?$targets[7]['total_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Product Targets</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[august][total_product_target]" class="form-control number" id="august_total_product_target" value="<?php echo ($targets[7]['total_product_target'])?$targets[7]['total_product_target']:''; ?>">
  </div>
  <div class="col-md-1 pad_0">
  <span onclick="add_fields('august')" ><i class="fa fa-plus-square-o add_icon" aria-hidden="true"></i></span>
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[august][achieved_sales]"  id="january_total_sales" class="form-control number" value="<?php echo ($targets[7]['achieved_sales'])?$targets[7]['achieved_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[august][achieved_collection]"  id="january_total_collection" class="form-control number" value="<?php echo ($targets[7]['achieved_collection'])?$targets[7]['achieved_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Product</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[august][achieved_product]" id="january_total_product_target" class="form-control number" value="<?php echo ($targets[7]['achieved_product'])?$targets[7]['achieved_product']:''; ?>">
  </div>
  </div>
<?php 
    $august_targets = $this->db->order_by('id','asc')->get_where("dealer_product_targets",array("dealer_id"=>$objUser->id,"month"=>8))->result();
    if(!empty($august_targets))
    {
       foreach($august_targets as $p_target){
  ?>
  <div class="added_input"><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Product Name</label></div><div class="col-md-8"><input type="text" name="august[product_name][]" class="form-control" value="<?php echo($p_target->product_name)?$p_target->product_name:'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label class="tar-lable">Product Target</label></div><div class="col-md-8"><input type="text" name="august[product_targets][]" class="form-control" value="<?php echo($p_target->product_targets)?number_format($p_target->product_targets):'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Achieved Targets</label></div><div class="col-md-8"><input type="text" name="august[achieved_targets][]" class="form-control" value="<?php echo($p_target->achieved_targets)?number_format($p_target->achieved_targets):'';?>"></div></div><span id="august" class="col-md-1 pad_0 remove_button" onclick="remove_fields(this.id)"><i class="fa fa-minus-square-o remove_icon"></i></span></div>
<?php } 
    }
    ?> 
</div>
  </div>
  <div id="Sep" class="tab-pane fade <?php if(date("m")==9){ echo " in active"; }?>">
  <div class="col-md-12 pad_0 tabs-col september">
    <div class="col-md-4 pad_0 target_content">
<div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[september][total_sales]" class="form-control number" id="september_total_sales" value="<?php echo ($targets[8]['total_sales'])?$targets[8]['total_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[september][total_collection]" class="form-control number" id="september_total_collection" value="<?php echo ($targets[8]['total_collection'])?$targets[8]['total_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Product Targets</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[september][total_product_target]" class="form-control number" id="september_total_product_target" value="<?php echo ($targets[8]['total_product_target'])?$targets[8]['total_product_target']:''; ?>">
  </div>
  <div class="col-md-1 pad_0">
  <span onclick="add_fields('september')" ><i class="fa fa-plus-square-o add_icon" aria-hidden="true"></i></span>
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[september][achieved_sales]"  id="january_total_sales" class="form-control number" value="<?php echo ($targets[8]['achieved_sales'])?$targets[8]['achieved_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[september][achieved_collection]"  id="january_total_collection" class="form-control number" value="<?php echo ($targets[8]['achieved_collection'])?$targets[8]['achieved_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Product</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[september][achieved_product]" id="january_total_product_target" class="form-control number" value="<?php echo ($targets[8]['achieved_product'])?$targets[8]['achieved_product']:''; ?>">
  </div>
  </div>
<?php 
    $september_targets = $this->db->order_by('id','asc')->get_where("dealer_product_targets",array("dealer_id"=>$objUser->id,"month"=>9))->result();
    if(!empty($september_targets))
    {
       foreach($september_targets as $p_target){
  ?>
  <div class="added_input"><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Product Name</label></div><div class="col-md-8"><input type="text" name="september[product_name][]" class="form-control" value="<?php echo($p_target->product_name)?$p_target->product_name:'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label class="tar-lable">Product Target</label></div><div class="col-md-8"><input type="text" name="september[product_targets][]" class="form-control" value="<?php echo($p_target->product_targets)?number_format($p_target->product_targets):'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Achieved Targets</label></div><div class="col-md-8"><input type="text" name="september[achieved_targets][]" class="form-control" value="<?php echo($p_target->achieved_targets)?number_format($p_target->achieved_targets):'';?>"></div></div><span id="september" class="col-md-1 pad_0 remove_button" onclick="remove_fields(this.id)"><i class="fa fa-minus-square-o remove_icon"></i></span></div>
<?php }
    }
     ?> 
</div>
  </div>
  <div id="Oct" class="tab-pane fade <?php if(date("m")==10){ echo " in active"; }?>">
  <div class="col-md-12 pad_0 tabs-col october">
    <div class="col-md-4 pad_0 target_content">
<div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[october][total_sales]" class="form-control number" id="october_total_sales" value="<?php echo ($targets[9]['total_sales'])?$targets[9]['total_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[october][total_collection]" class="form-control number" id="october_total_collection" value="<?php echo ($targets[9]['total_collection'])?$targets[9]['total_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Product Targets</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[october][total_product_target]" class="form-control number" id="october_total_product_target"  value="<?php echo ($targets[9]['total_product_target'])?$targets[9]['total_product_target']:''; ?>">
  </div>
  <div class="col-md-1 pad_0">
  <span onclick="add_fields('october')" ><i class="fa fa-plus-square-o add_icon" aria-hidden="true"></i></span>
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[october][achieved_sales]"  id="january_total_sales" class="form-control number" value="<?php echo ($targets[9]['achieved_sales'])?$targets[9]['achieved_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[october][achieved_collection]"  id="january_total_collection" class="form-control number" value="<?php echo ($targets[9]['achieved_collection'])?$targets[9]['achieved_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Product</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[october][achieved_product]" id="january_total_product_target" class="form-control number" value="<?php echo ($targets[9]['achieved_product'])?$targets[9]['achieved_product']:''; ?>">
  </div>
  </div>
<?php 
    $october_targets = $this->db->order_by('id','asc')->get_where("dealer_product_targets",array("dealer_id"=>$objUser->id,"month"=>10))->result();
    if(!empty($october_targets))
    {
        foreach($october_targets as $p_target){
  ?>
  <div class="added_input"><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Product Name</label></div><div class="col-md-8"><input type="text" name="october[product_name][]" class="form-control" value="<?php echo($p_target->product_name)?$p_target->product_name:'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label class="tar-lable">Product Target</label></div><div class="col-md-8"><input type="text" name="october[product_targets][]" class="form-control" value="<?php echo($p_target->product_targets)?number_format($p_target->product_targets):'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Achieved Targets</label></div><div class="col-md-8"><input type="text" name="october[achieved_targets][]" class="form-control" value="<?php echo($p_target->achieved_targets)?number_format($p_target->achieved_targets):'';?>"></div></div><span id="october" class="col-md-1 pad_0 remove_button" onclick="remove_fields(this.id)"><i class="fa fa-minus-square-o remove_icon"></i></span></div>
<?php }
    }
    ?> 
</div>
  </div>
  <div id="Nov" class="tab-pane fade <?php if(date("m")==11){ echo " in active"; }?>">
  <div class="col-md-12 pad_0 tabs-col november">
    <div class="col-md-4 pad_0 target_content">
<div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[november][total_sales]" class="form-control number" id="november_total_sales" value="<?php echo ($targets[10]['total_sales'])?$targets[10]['total_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[november][total_collection]" class="form-control number" id="november_total_collection" value="<?php echo ($targets[10]['total_collection'])?$targets[10]['total_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Product Targets</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[november][total_product_target]" class="form-control number" id="november_total_product_target" value="<?php echo ($targets[10]['total_product_target'])?$targets[10]['total_product_target']:''; ?>">
  </div>
  <div class="col-md-1 pad_0">
  <span onclick="add_fields('november')" ><i class="fa fa-plus-square-o add_icon" aria-hidden="true"></i></span>
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[november][achieved_sales]"  id="january_total_sales" class="form-control number" value="<?php echo ($targets[10]['achieved_sales'])?$targets[10]['achieved_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[november][achieved_collection]"  id="january_total_collection" class="form-control number" value="<?php echo ($targets[10]['achieved_collection'])?$targets[10]['achieved_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Product</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[november][achieved_product]" id="january_total_product_target" class="form-control number" value="<?php echo ($targets[10]['achieved_product'])?$targets[10]['achieved_product']:''; ?>">
  </div>
  </div>
<?php 
    $november_targets = $this->db->order_by('id','asc')->get_where("dealer_product_targets",array("dealer_id"=>$objUser->id,"month"=>11))->result();
    if(!empty($november_targets))
    {
      foreach($november_targets as $p_target){
  ?>
  <div class="added_input"><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Product Name</label></div><div class="col-md-8"><input type="text" name="november[product_name][]" class="form-control" value="<?php echo($p_target->product_name)?$p_target->product_name:'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label class="tar-lable">Product Target</label></div><div class="col-md-8"><input type="text" name="november[product_targets][]" class="form-control" value="<?php echo($p_target->product_targets)?number_format($p_target->product_targets):'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Achieved Targets</label></div><div class="col-md-8"><input type="text" name="november[achieved_targets][]" class="form-control" value="<?php echo($p_target->achieved_targets)?number_format($p_target->achieved_targets):'';?>"></div></div><span id="november" class="col-md-1 pad_0 remove_button" onclick="remove_fields(this.id)"><i class="fa fa-minus-square-o remove_icon"></i></span></div>
<?php } 
    }
     ?> 
</div>
  </div>
  <div id="Dec" class="tab-pane fade <?php if(date("m")==12){ echo " in active"; }?>">
  <div class="col-md-12 pad_0 tabs-col december">
    <div class="col-md-4 pad_0 target_content">
<div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[december][total_sales]" class="form-control number" id="december_total_sales"  value="<?php echo ($targets[11]['total_sales'])?$targets[11]['total_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[december][total_collection]" class="form-control number" id="december_total_collection"  value="<?php echo ($targets[11]['total_collection'])?$targets[11]['total_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Total Product Targets</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[december][total_product_target]" class="form-control number" id="december_total_product_target"  value="<?php echo ($targets[11]['total_product_target'])?$targets[11]['total_product_target']:''; ?>">
  </div>
  <div class="col-md-1 pad_0">
  <span onclick="add_fields('december')" ><i class="fa fa-plus-square-o add_icon" aria-hidden="true"></i></span>
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Sales</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[december][achieved_sales]"  id="january_total_sales" class="form-control number" value="<?php echo ($targets[11]['achieved_sales'])?$targets[11]['achieved_sales']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Collection</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="data[december][achieved_collection]"  id="january_total_collection" class="form-control number" value="<?php echo ($targets[11]['achieved_collection'])?$targets[11]['achieved_collection']:''; ?>">
  </div>
  </div>
  <div class="col-md-4 pad_0 target_content">
  <div class="col-md-3 padl_0">
  <label for="email" class="tar-lable">Achieved Product</label>
  </div>
  <div class="col-md-8">
  <input type="text" name="data[december][achieved_product]" id="january_total_product_target" class="form-control number" value="<?php echo ($targets[11]['achieved_product'])?$targets[11]['achieved_product']:''; ?>">
  </div>
  </div>
<?php 
    $december_targets = $this->db->order_by('id','asc')->get_where("dealer_product_targets",array("dealer_id"=>$objUser->id,"month"=>12))->result();
    if(!empty($december_targets))
    {
      foreach($december_targets as $p_target){
  ?>
  <div class="added_input"><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Product Name</label></div><div class="col-md-8"><input type="text" name="december[product_name][]" class="form-control" value="<?php echo($p_target->product_name)?$p_target->product_name:'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label class="tar-lable">Product Target</label></div><div class="col-md-8"><input type="text" name="december[product_targets][]" class="form-control" value="<?php echo($p_target->product_targets)?number_format($p_target->product_targets):'';?>"></div></div><div class="col-md-4 pad_0 target_content"><div class="col-md-3 padl_0"><label for="email" class="tar-lable">Achieved Targets</label></div><div class="col-md-8"><input type="text" name="december[achieved_targets][]" class="form-control" value="<?php echo($p_target->achieved_targets)?number_format($p_target->achieved_targets):'';?>"></div></div><span id="december" class="col-md-1 pad_0 remove_button" onclick="remove_fields(this.id)"><i class="fa fa-minus-square-o remove_icon"></i></span></div>
<?php } 
    }  ?> 
    
</div>
  </div>
  
  </div>
</div>
 -->
<!-- <div id="Yearly" class="tab-pane fade">
<div class="tab-content">
  <div class="tab-pane fade in active">
     <div class="col-md-12 pad_0 tabs-col">
        <div class="col-md-4 pad_0 target_content">
    <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Total Sales</label>
      </div>
      <div class="col-md-9">
      <input type="text" name="total_sales" class="form-control number" value="<?php echo ($objUser->total_sales)?number_format($objUser->total_sales):''; ?>">
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
      <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Total Collection</label>
      </div>
      <div class="col-md-9">
      <input type="text" name="total_collection" class="form-control number" value="<?php echo ($objUser->total_collection)?number_format($objUser->total_collection):''; ?>">
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
      <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Total Product Targets</label>
      </div>
      <div class="col-md-8">
      <input type="text" name="total_product_target" class="form-control number" value="<?php echo ($objUser->total_product_target)?number_format($objUser->total_product_target):''; ?>">
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
      <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Achieved Sales</label>
      </div>
      <div class="col-md-9">
      <input type="text" name="achieved_sales"  id="january_total_sales" class="form-control number"  value="<?php echo ($objUser->achieved_sales)?number_format($objUser->achieved_sales):''; ?>">
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
      <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Achieved Collection</label>
      </div>
      <div class="col-md-9">
      <input type="text" name="achieved_collection"  id="january_total_collection" class="form-control number"  value="<?php echo ($objUser->achieved_collection)?number_format($objUser->achieved_collection):''; ?>">
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
      <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Achieved Product</label>
      </div>
      <div class="col-md-8">
      <input type="text" name="achieved_product" id="january_total_product_target" class="form-control number"  value="<?php echo ($objUser->achieved_product)?number_format($objUser->achieved_product):''; ?>">
      </div>
      </div>
    
    </div>
  </div>
  </div>
</div> -->


    
<!--     </div>

  </div>
   
</div> -->
                                            
                                        <div class=" form-group text-right">
                                            <?php echo form_button(array('type' => 'submit','id'=>'register', 'content' => 'Update Dealer', 'class' => 'btn btn-success')); ?>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>
                                    <!-- end section row -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: .tray-center -->
        </section>
        <!-- End: Content -->
    </section>
    <?php $this->load->view($this->config->item('footer_view')); ?>
    <?php $this->load->view($this->config->item('scripts_view')); ?>
    <script src="<?php echo base_url($this->config->item('js_validate_min')); ?>" type='text/javascript'></script>
    <script type="text/javascript">
   

function add_fields(id)
{
    var max_fields      = 10; //maximum input boxes allowed
	var wrapper   		= $('.'+id); //Fields wrapper
	if($("#"+id+"_total_sales").val() !="" && $("#"+id+"_total_collection").val() != "" && $("#"+id+"_total_product_target").val() !="")
	{
	    wrapper.append("<div class='added_input'><div class='col-md-4 pad_0 target_content'><div class='col-md-3 padl_0'><label for='email' class='tar-lable'>Product Name</label></div><div class='col-md-8'><input type='text' name='"+id+"[product_name][]' class='form-control'></div></div><div class='col-md-4 pad_0 target_content'><div class='col-md-3 padl_0'><label email' class='tar-lable'>Product Target</label></div><div class='col-md-8'><input type='text' name='"+id+"[product_targets][]' class='form-control'></div></div><div class='col-md-4 pad_0 target_content'><div class='col-md-3 padl_0'><label for='email' class='tar-lable'>Achieved Targets</label></div><div class='col-md-8'><input type='text' name='"+id+"[achieved_targets][]' class='form-control'></div></div><span id='"+id+"' class='col-md-1 pad_0 remove_button' onclick='remove_fields(this.id)'><i class='fa fa-minus-square-o remove_icon'></i></span></div>");
	}
	else
	{
	   alert(id+" "+"Total Sales and Total Collection and Achived Targets Not Be Empty"); 
	}
}

function remove_fields(id)
{
     $('.'+id).on('click', '#'+id, function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
    });
}
    </script>
     <?php
    $field1 = "data[".lcfirst(date('F'))."][total_sales]";
    $field2 = "data[".lcfirst(date('F'))."][total_collection]";
    $field3 = "data[".lcfirst(date('F'))."][total_product_target]";
    ?>
    <script type="text/javascript">

        // Validate form
       /* $('#editUserForm').validate({
            rules: {
                name: {
                    required: true
                },
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                phone: {
                    required: true,
                    number: true
                },
                role_id: {
                    required: true
                },
                status: {
                    required: true,
                    number: true
                }
            },         
           
        });*/
         $('#editUserForm').validate({
            rules: {
                zone: {
                    required: true
                },
                username: {
                    required: true
                },
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                phone: {
                    required: true,
                    number: true
                },
                email: {
                    required: true
                },
                role_id: {
                    required: true
                },
                shop_acc_number: {
                    required: true
                },
                '<?php echo $field1; ?>': {
                    required: true,
                },
                "<?php echo $field2; ?>": {
                    required: true,
                },
                "<?php echo $field3; ?>": {
                    required: true,
                },
                designation: {
		    required: true,
		},
		  'shop_id[]': {
		    required: true,
		}
            },	

        });
    </script>

 <script type="text/javascript">
        $(function () {
            $('#shops').multiselect({
                includeSelectAllOption: false
            });
            $('#btnSelected').click(function () {
                var selected = $("#shops option:selected");
                var message = "";
                selected.each(function () {
                    message += $(this).text() + " " + $(this).val() + "\n";
                });                
            });
        });
    </script>
    
    <script type="text/javascript">
        $(function () {
            $('#zone').multiselect({
                includeSelectAllOption: false
            });
            $('#btnSelected').click(function () {
                var selected = $("#zone option:selected");
                var message = "";
                selected.each(function () {
                    message += $(this).text() + " " + $(this).val() + "\n";
                });                
            });
        });
        
/*$('input').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       //return false;
       alert("Special Characters Not Allowed");
    }
});*/

 function eget_shops_acc(){
    var zone_id = $("#zone1").val();
    jQuery.ajax({
        type:'POST',
        url:'<?php echo base_url();?>sales/eget_shops_acc',
        data:{zone_id:zone_id,user_id:'<?php echo $objUser->id?>'},
    success:function(html){
    $("#shop_account_number_replace").html(html);
    }
    });
}

 $('.number').bind('keyup paste', function(){
        this.value = this.value.replace(/[^0-9]/g, '');
  });
  
  /*function checkMailStatus(){
    var email=$("#email").val();
    $.ajax({
        type:'post',
            url:"<?php echo base_url();?>users/edit_email_exists", 
            data:{email: email,user_id:"<?php echo $objUser->id; ?>"},
            success:function(msg){
                console.log(msg);
                if(msg != "")
                {
                    $("#email_error").css("display","block");
                    $("#register").addClass("disabled");
                   // alert(msg);
                }
                else
                {
                    $("#email_error").css("display","none");
                    $("#register").removeClass("disabled"); 
                }
       
            }
     });
}*/
</script>
    

<?php if(@$zone_id){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            eget_shops_acc();
        })
    </script>
<?php } ?>


</body>