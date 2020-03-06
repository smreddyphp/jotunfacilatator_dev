<body class="dashboard-page sb-l-o sb-r-c">
    <style>
        .navbar-branding.dark {
            background: #3A3633;
        }
label.error{
color:red;
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
input.btn.btn-primary.create-submit-grnbtn.br-radius-4.btn-block {
    background: #57ad68 !important;
    border-radius: 4px;
}
        span.button.btn-system.btn-file.btn-block {
    height: 34px;
    line-height: 34px;
    border-radius: 1px;
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
                        <li class="crumb-active">Profile Management</li>
                        <li class="crumb-active">Edit Profile</li>
                    </ol>
                </div>
            </div>
        </div>
			<?php if($this->session->flashdata('message') == 'success'){ ?>
	<?php echo '<script>setTimeout(function() {swal({title: "Details updated successfully!"});}, 100);</script>'; ?>
	<?php }else if($this->session->flashdata('message') == 'failed'){ ?>
	<?php echo '<script>setTimeout(function() {swal({title: "Details not updated!"});}, 100);</script>'; ?>
	<?php } ?>
        <!-- Begin: Content -->
        <section id="content" class="table-layout animated fadeIn">
            <!-- begin: .tray-center -->
            <div class="tray tray-center">
                <!-- create new order panel -->
                <div class="panel mb25 mt5">
                    <div class="panel-heading">
                        <span class="panel-title hidden-xs">Edit Profile</span>
                    </div>
                    <div class="panel-body p20 pb10">
					
        <form class="form-horizontal" id="form" role="form" action="<?php echo base_url(); ?>users/update_profile/<?php echo $profile_details['id']; ?>" method="POST" enctype="multipart/form-data">
                <div class="col-lg-3 proile-left">
                  <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
                    <div class="fileupload-preview profile-img thumbnail mb20">
					<?php if($profile_details['profile_image'] == ""){?>
                      <img  src="<?php echo base_url(); ?>server/assets/media/profile.png" alt="image">					  
					<?php } else {?>
					  <img  src="<?php echo base_url(); ?>server/assets/media/<?php echo $profile_details['profile_image']; ?>" alt="image">					  
					<?php } ?>
					  <input type="hidden" value="<?php echo $profile_details['profile_image']; ?>" name="previous_image">
                    </div>
                    <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-6">
                        <span class="button btn-system btn-file btn-block">
                          <span class="fileupload-new">Select</span>
                          <span class="fileupload-exists">Change</span>
                          <input type="file" id="admin_image" name="admin_image">
                        </span>
                      </div>
                      <div class="col-md-3"></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-9">
                  <div class="gifloading"></div>
                  <h4 class="mb20">Account Settings</h4>          
                  <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">User Name</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?php echo $profile_details['username']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="password" id="password" name="password" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="cpassword" class="col-lg-2 control-label">Confirm Password</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="password" id="cpassword" name="cpassword" class="form-control">
                      </div>
                    </div>
                  </div>
                  <hr class="short alt">
                  <h4 class="mb20">Profile Settings</h4>
                  <div class="form-group">
                    <label for="admin_fname" class="col-lg-2 control-label">First Name</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" value="<?php echo $profile_details['first_name']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="admin_lname" class="col-lg-2 control-label">Last Name</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" value="<?php echo $profile_details['last_name']; ?>">
                      </div>
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label for="admin_lname" class="col-lg-2 control-label">Mobile</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Mobile Number" value="<?php echo $profile_details['phone']; ?>">
                      </div>
                    </div>
                  </div>
                
                  <hr class="short alt">          
			   
                  <div class="form-group">
                    <label for="inputStandard" class="col-lg-4 col-md-4 control-label"></label>
                    <div class="col-lg-3">
                      <div class="">
                        <input type="submit" class="btn btn-primary  create-submit-grnbtn br-radius-4 btn-block" id="updateadmin_submit" value="Update">
                      </div>
                    </div>
                  </div>
                </div>
              </form>
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
    
<script>
$(document).ready(function () {
    $("#form").validate({
        rules: {			
            "username": {
                required: true,                
            },
            "password": {
                required: true,                
            },
			"cpassword":{
				equalTo: "#password"
			},
			"fname":{
				required: true,
			},
			"lname":{
				required: true,
			},
			"mobile":{
				required: true,
			}
        },        
    });
});
</script>

</body>