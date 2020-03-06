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
                        <li class="crumb-active">Team Management</li>
                        <li class="crumb-active">Edit User</li>
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
                        <span class="panel-title hidden-xs">New User</span>
                    </div>
                    <div class="panel-body p20 pb10">


 <form method="POST" action="<?php echo base_url(); ?>users/update_user/<?php echo $objUser->id; ?>"  id="editUserForm">




<div class="col-md-10 form-group">
<label for="name1" class="col-md-4 col-sm-4 col-xs-12">Role Name</label>
<div class="col-md-8 col-sm-8 col-xs-12">
<label for="status" class="field select">
<?php if($this->lib_auth->getRoleID() == 1){ ?>
<?php echo form_dropdown('role_id', array('' => 'Select Role') + $arrRoles, (isset($objUser->role_id) && !empty($objUser->role_id)) ? $objUser->role_id : '', 'data-placeholder="Choose Role" class="select-search form-control rolevalue" tabindex="2" onchange="ueget_role();  get_rolechange();"'); ?>
<?php } else { ?>
<?php echo form_dropdown('role_id', array('' => 'Select Role') + $arrRoles, (isset($objUser->role_id) && !empty($objUser->role_id)) ? $objUser->role_id : '', 'data-placeholder="Choose Role" class="select-search form-control" tabindex="2" disabled="disabled"'); ?>
<input type="hidden" name="role_id" value="<?php echo $objUser->role_id; ?>" >
<?php  } ?> 
<i class="arrow double"></i>
</label>
</div>
</div>


<?php// echo $objUser->role->id;
//exit; ?>

<div id="shops_data" >

<?php if($this->lib_auth->getRoleID() != '1'){?>  
<input type="hidden"   name="manager_id"    value="<?php echo $this->lib_auth->getUserID(); ?>" >
<?php }else{?>
<?php if($this->lib_auth->getRoleID() == '1'){ ?>
<div class="col-md-10 form-group" id="manager_results">
    <?php  if($objUser->role_id != '1' && $objUser->role_id != '2'){?>
	<label for="name1" class="col-md-4 col-sm-4 col-xs-12">Manager</label>	
	<div class="col-md-8 col-sm-8 col-xs-12">
		<label for="password" class="field prepend-icon">
			<select name="manager_id" class="form-control">
				<option value="">Select Manager</option>
				<?php foreach($getm as $result){ ?>
				<option value="<?php echo $result['id']; ?>" <?php if($geteditm['created_by'] == $result['id']){ echo 'selected'; ?><?php } ?> ><?php echo $result['username']; ?></option>
				<?php } ?>				
			</select>
		</label>
	</div>
	<?php } ?> 
</div>
<?php } }?>

<?php 
$U_zones = explode(',',$objUser->zone);
?>
                                        

<div class="col-md-10 form-group">
<label for="code" class="col-md-4 col-sm-4 col-xs-12">Select Zone</label>
<div class="col-md-8 col-sm-8 col-xs-12">
<label for="code" class="field select">
<select class="form-control event-name gui-input br-light light" name="zone[]" id="zone" multiple="multiple" onchange="ueget_dealers_zone();">
<option <?php if(in_array('1',$U_zones)){ ?> selected="selected" <?php } ?> value="1">Riyadh</option>
<option <?php if(in_array('2',$U_zones)){ ?> selected="selected" <?php } ?> value="2">Khamis</option>
<option <?php if(in_array('3',$U_zones)){ ?> selected="selected" <?php } ?> value="3">Jeddah</option>
<option <?php if(in_array('4',$U_zones)){ ?> selected="selected" <?php } ?> value="4">Dammam</option>
<option <?php if(in_array('5',$U_zones)){ ?> selected="selected" <?php } ?> value="5">Yanbu</option>
</select>
<label for="name2" class="field-icon">
<i class="arrow double"></i>
</label>

</label>
</div>
</div>



    <input type="hidden" id="userid" value="<?php  echo $this->uri->segment(3); ?>" >

<?php

if($arrShops == ""){ ?>
<?php }else{ ?>
 <?php $temp=array();foreach($arrShops as $result_tasks){?>
<?php array_push($temp,$result_tasks['id']); ?>							 
  						  <?php } ?>
<?php } ?>

<div id="dealers_zone_replace">
<div class="col-md-10 form-group">
<label class="col-lg-4  col-md-4 col-sm-6 col-xs-12  fs14 control-label text-right mt10" for="textArea1">Assign Dealer</label>
<div class="col-lg-8  col-md-8 col-sm-6 col-xs-12" id="shop_result">
<div class="">
<?php if($arrShops == ""){ ?>
<select name="dealers[]" class="form-control" multiple="multiple" size="2" id="shopsadd2"  onchange="get_dealer_targets()">						

<?php foreach($dealers as $result){?>								  							  
<option  value="<?php echo $result['id']; ?>" ><?php echo $result['username']; ?></option>							  
<?php } ?>

</select>                            
<?php }else{?>
<select name="dealers[]" class="form-control" multiple="multiple" size="2" id="shopsadd2"  onchange="get_dealer_targets()">						

<?php foreach($dealers as $result){?>								  							  
<option  value="<?php echo $result['id']; ?>" <?php if(in_array($result['id'],$temp)){echo "selected";}?>><?php echo $result['username']; ?></option>							  
<?php } ?>

</select>                            
<?php } ?>
</div>
</div>
</div>
</div>	
</div>
   

                        <div class="admin-form">
                            <div class="section row mbn">
                                <div class="col-md-10 col-sm-10 pl15">
                                    <div class="section row mb15">
                                        
                                        
                                         
                                        
                                        
                                        <div class="form-group">
                                            <label for="name" class="col-md-4 col-sm-4 col-xs-12">Name</label>
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
                                                    <?php echo form_input(array('name' => 'email','id'=>'email', 'onblur'=>'checkMailStatus()', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter Email here', 'value' => set_value('name', $objUser->email))); ?>
<?php }else{ ?>
<input type="text" name="email" id="email" class="event-name gui-input br-light light" value="<?php echo $objUser->email; ?>" readonly >
<?php  } ?>
 <span style="color:red;display:none" id="email_error">This Email Already Exist</span>
                                                    <label for="name" class="field-icon">
                                                        <i class="fa fa-list-ol"></i>
                                                    </label>
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

                                      
                                        
                                   
            <div class="form-group">
	<label for="name1" class="col-md-4 col-sm-4 col-xs-12">Designation</label>	
	<div class="col-md-8 col-sm-8 col-xs-12">
		<label for="password" class="field prepend-icon">
  <?php if($this->lib_auth->getRoleID() == 1){ ?>
			<select name="designation" class="form-control">
				<option value="">Select Designation</option>
				<?php foreach($getd as $result){ ?>
				<option value="<?php echo $result->id; ?>" <?php if($geteditd['designation'] == $result->id){ echo 'selected'; ?><?php } ?> ><?php echo $result->name; ?></option>
				<?php } ?>				
			</select>
<?php }else{ ?>
<input type="hidden" name="designation" value="<?php echo $geteditd['designation']; ?>" >
			<select name="designation" class="form-control" disabled>
				<option value="">Select Designation</option>
				<?php foreach($getd as $result){ ?>
				<option value="<?php echo $result->id; ?>" <?php if($geteditd['designation'] == $result->id){ echo 'selected'; ?><?php } ?> ><?php echo $result->name; ?></option>
				<?php } ?>				
			</select>

<?php } ?>
		</label>
	</div>
</div>
<!-- <div class="form-group duration_div" id="targets">
    
    <div class="target-tabs">
        <ul class="nav nav-tabs nav-tabs1">
    <li class="active time_dur"><a data-toggle="tab" href="#Monthly">Monthly</a></li>
    <li class="time_dur"><a data-toggle="tab" href="#Yearly">Yearly</a></li>
  </ul>
  <div class="tab-content">
    <div id="Monthly" class="tab-pane fade in active">
        <ul class="nav nav-tabs">
<?php 
$months = array("january","february","march","april","may","june","july","august","september","october","november","december");
foreach($months as $key=>$month){ ?>
    <li <?php if(date("m")== $key+1){ ?> class="active" <?php }?> ><a data-toggle="tab" href="#<?php echo $month;?>"><?php echo substr($month,0,3);?></a></li>
<?php }
?>
</ul>
<div class="tab-content">
<?php 
$year_months = array("january","february","march","april","may","june","july","august","september","october","november","december");
foreach($year_months as $key=>$mont){ ?>
     <div id="<?php echo $mont;?>" class="tab-pane fade <?php if(date("m")==$key+1){ echo "in active"; }?>">
      <div class="col-md-12 pad_0 tabs-col january">
      <div class="col-md-4 pad_0 target_content">
        <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Total Sales</label>
      </div>
      <div class="col-md-9">
      <input type="text" name="data[january][total_sales]"  id="january_total_sales" class="form-control number" value="<?php echo number_format($year[$mont]->total_sales);?>" readonly>
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
      <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Total Collection</label>
      </div>
      <div class="col-md-9">
      <input type="text" name="data[january][total_collection]"  id="january_total_collection" class="form-control number"  value="<?php echo number_format($year[$mont]->total_collection);?>" readonly>
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
      <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Total Product Targets</label>
      </div>
      <div class="col-md-8">
      <input type="text" name="data[january][total_product_target]" id="january_total_product_target" class="form-control number"  value="<?php echo number_format($year[$mont]->total_product_target);?>" readonly>
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
        <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Achieved Sales</label>
      </div>
      <div class="col-md-9">
      <input type="text" name="data[january][achieved_sales]"  id="january_total_sales" class="form-control number"  value="<?php echo number_format($year[$mont]->achieved_sales);?>" readonly>
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
      <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Achieved Collection</label>
      </div>
      <div class="col-md-9">
      <input type="text" name="data[january][achieved_collection]"  id="january_total_collection" class="form-control number"  value="<?php echo number_format($year[$mont]->achieved_collection);?>" readonly>
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
      <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Achieved Products</label>
      </div>
      <div class="col-md-8">
      <input type="text" id="january_total_product_target" class="form-control number"  value="<?php echo number_format($year[$mont]->achieved_product);?>" readonly>
      </div>
      </div>
    
    </div>
  </div>
<?php }
?></div></div>
<div id="Yearly" class="tab-pane fade">
<div class="tab-content">
  <div class="tab-pane fade in active">
     <div class="col-md-12 pad_0 tabs-col">
        <div class="col-md-4 pad_0 target_content">
    <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Total Sales</label>
      </div>
      <div class="col-md-9">
      <input type="text" class="form-control number" value="<?php echo number_format($yearly->total_sales);?>" readonly />
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
      <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Total Collection</label>
      </div>
      <div class="col-md-9">
      <input type="text" class="form-control number" value="<?php echo number_format($yearly->total_collection);?>" readonly  >
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
      <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Total Product Targets</label>
      </div>
      <div class="col-md-8">
      <input type="text" class="form-control number" value="<?php echo number_format($yearly->total_product_target);?>" readonly  >
      </div>
      <div class="col-md-1 pad_0">
      <span><i class="fa fa-plus-square-o add_icon" aria-hidden="true"></i></span>
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
        <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Achieved Sales</label>
      </div>
      <div class="col-md-9">
      <input type="text"  id="january_total_sales" class="form-control number"  value="<?php echo number_format($yearly->achieved_sales);?>" readonly >
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
      <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Achieved Collection</label>
      </div>
      <div class="col-md-9">
      <input type="text" id="january_total_collection" class="form-control number"  value="<?php echo number_format($yearly->achieved_collection);?>" readonly >
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
      <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Achieved Products</label>
      </div>
      <div class="col-md-8">
      <input type="text" id="january_total_product_target" class="form-control number"  value="<?php echo number_format($yearly->achieved_product);?>" readonly >
      </div>
      </div>
      
    </div>
  </div>
  </div>
</div>
    
    </div>
    </div>
    </div> -->

  </div>
  </div>
   
    </div>
                                                       
                                        
                                        
                                        
                                        <div class=" form-group text-right">
                                            <?php echo form_button(array('type' => 'submit','id'=>'register','content' => 'Update User', 'class' => 'btn btn-success')); ?>
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

        // Validate form
        $('#editUserForm').validate({
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
            "zone[]":{
               required: true, 
            }
           
        });
    </script>
    
     <script>
        function get_dealer_targets(){
            
                //alert("hello");
                
                var dealers = $("#shopsadd2").val();
                jQuery.ajax({
                    type:'POST',
                    url:'<?php echo base_url();?>sales/dealer_targets',
                    data:'dealer_id='+dealers,
                success:function(html){
                    //console.log(html);
                  $("#targets").html(html);
                }
                });
            }
    </script>

 <script type="text/javascript">
        $(function () {
            $('#shopsadd2').multiselect({
                includeSelectAllOption: false
            });
            $('#btnSelected').click(function () {
                var selected = $("#shopsadd2 option:selected");
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
        
       /* function get_dealers_zone(){
            var zone_id = $("#zone").val();
            jQuery.ajax({
                type:'POST',
                url:'../sales/eget_dealers_zone',
                data:'zone_id='+zone_id,
            success:function(html){
            $("#dealers_zone_replace").html(html);
            }
            });
        }*/
        
        function ueget_dealers_zone(){
            var zone_id = $("#zone").val();
            var user_id = $("#userid").val();
        jQuery.ajax({
            type:'POST',
            url:'../../sales/eget_dealers_zone',
            data:'zone_id='+zone_id+'&user_id='+user_id,
        success:function(html){
            //alert(html);
           $("#dealers_zone_replace").html(html);
        }
        });
}

function checkMailStatus(){
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
}

 $('.number').bind('keyup paste', function(){
        this.value = this.value.replace(/[^0-9]/g, '');
  });

    </script>
    
    

</body>