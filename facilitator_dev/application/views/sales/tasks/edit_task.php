<!doctype html>
<html>
<head>
   <!-- Meta, title, CSS, favicons, etc. -->
   <meta charset="utf-8">
   <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
   <title>Add Dealer</title>
   <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
   <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
   <meta name="author" content="AdminDesigns">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Font CSS (Via CDN) -->
   <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
   <!-- Theme CSS -->

      <title>Add Dealer</title>
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
.multiselect-container {
		height:400px;
		overflow:auto;
	}
        .navbar-branding.dark {
            background: #3A3633;
        }
		label.error, .star{
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
           .subtotalDiv label.col-md-4.col-sm-4.col-xs-12 {
            margin-top: 12px;
            font-size: 15px;
        }
        .admin-form .form-group {
            margin-bottom: 20px;
            overflow: hidden;
        }
        form#addUserForm label.field-icon {
    display: none;
}
        .admin-form .prepend-icon > input, .admin-form .prepend-icon > textarea {
    padding-left: 10px !important;
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
        <!-- Start: Content-Wrapper -->
        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <div class="row mb10">
                <div class="inner-header mb10">
                    <div class="bread-cumLeft">
                        <ol class="breadcrumb"><li>Home</li><li class="crumb-active">Task Management</li><li class="crumb-active">Edit Task</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- End: Topbar -->

            <!-- Begin: Content -->
            <section id="content" class="table-layout animated fadeIn">
                <!-- begin: .tray-center -->
                <div class="tray tray-center">
                    <!-- create new order panel -->
                    <div class="panel mb25 mt5">
                        <div class="panel-heading">
                            <span class="panel-title hidden-xs">New Task</span>
                        </div>
                        <div class="panel-body p20 pb10">
<form method="POST" action="<?php echo base_url(); ?>sales/add_task/<?php echo $nUserID;?>"  id="user_add" enctype="multipart/form-data">

<div id="dealers_shops_data">
            <div class="col-md-10 form-group">
                <label for="name1" class="col-md-4 col-sm-4 col-xs-12" style="text-align: right;">Select Dealer<span class="star">*</span></label>
				<div class="col-md-8 col-sm-8 col-xs-12" >
						<select class="form-control event-name gui-input br-light light" name="dealer_id[]" id="dealer" multiple="multiple" onchange="get_dealers_shops();">
						<?php foreach($dealers as $result){ ?>
						<option value="<?php echo $result['id']; ?>"><?php echo $result['username'];?></option>
						<?php } ?>				
						</select>
				</div>
			</div>


<div id="shops_zone_replace">
				<div class="col-md-10 form-group">
                                        <label for="name1" class="col-md-4 col-sm-4 col-xs-12" style="text-align: right;">Select Shops<span class="star">*</span></label>
					<div class="col-md-8 col-sm-8 col-xs-12" >
							<select name="shop[]" class="form-control" multiple="multiple" id="shopsadd" size="2">				
							<?php foreach($shops as $result){ ?>
							<option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
							<?php } ?>				
							</select>
					</div>
				</div>	
</div>
			
</div>

    
				    <div class="admin-form">
                                <div class="section row mbn">
                                    <div class="col-md-10 col-sm-10 pl15">
                                        <div class="section row mb15">
                                            <?php if(!empty($arrForms)): ?>
                                                <?php foreach($arrForms as $nKey => $strForm): ?>
                                                    <div class=" col-md-12 col-lg-12 col-sm-12  admin-form  tc-checkbox-1 checkboxess">
                                                        <div class="col-md-7 col-md-offset-4 col-sm-offset-4 mt10 mb10">
                                                            <label class="option block mn">
                                                                <?php echo form_checkbox(array('name' => 'form_ids[]', 'value' => $strForm->id)); ?>
                                                                <span class="checkbox mn outline"></span>
                                                                <span class="ml5"><?php echo $strForm->name; ?></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            <div class=" form-group text-right">
                                                <p><?php echo form_button(array('type' => 'submit', 'content' => 'Submit', 'class' => 'btn btn-success')); ?>
                                                </p>
                                            </div>
                                           
                                        </div>
                                        <!-- end section row -->
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
    </div>
    <?php $this->load->view($this->config->item('scripts_view')); ?>
    <script src="<?php echo base_url($this->config->item('js_validate_min')); ?>" type='text/javascript'></script>
   <script type="text/javascript">

        // Validate form
        $('#user_add').validate({
            rules: {
                dealer_id: {
                    required: true
                },
		  'shop[]': {
		    required: true,
		},
		'form_ids[]': {
		    required: true,
		}
            },	

        });
    </script>
	<script type="text/javascript">
        $(function () {
            $('#shopsadd').multiselect({
                includeSelectAllOption: false
            });
            $('#btnSelected').click(function () {
                var selected = $("#shopsadd option:selected");
                var message = "";
                selected.each(function () {
                    message += $(this).text() + " " + $(this).val() + "\n";
                });                
            });
        });
        
        $(function () {
            $('#dealer').multiselect({
                includeSelectAllOption: false
            });
            $('#btnSelected').click(function () {
                var selected = $("#dealer option:selected");
                var message = "";
                selected.each(function () {
                    message += $(this).text() + " " + $(this).val() + "\n";
                });                
            });
        });
        
         function get_dealers_shops(){
            var dealer_id = $("#dealer").val();
            jQuery.ajax({
                type:'POST',
                url:'<?php echo base_url();?>sales/dealers_shops_list',
                data:'dealer_id='+dealer_id,
            success:function(html){
            $("#shops_zone_replace").html(html);
            }
            });
        }
    </script>
</body>