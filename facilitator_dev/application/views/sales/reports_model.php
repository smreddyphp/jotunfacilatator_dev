
<!doctype html>
<html>
<head>
   <!-- Meta, title, CSS, favicons, etc. -->
   <meta charset="utf-8">
   <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
   <title>Sales Management</title>
   <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
   <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
   <meta name="author" content="AdminDesigns">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Font CSS (Via CDN) -->
   <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
   <!-- Theme CSS -->

      <title>Sales Management</title>
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
button.multiselect.dropdown-toggle.btn.btn-default {
    width: 400px;
    text-align: left;
    background: transparent;
}
ul.multiselect-container.dropdown-menu {
    width: 100%;
}
.multiselect-container {
		height:250px;
		overflow:auto;
	}
.fa-search{
	pointer-events: none;
    position: absolute;
    top: 16px;
    right: 4px;
    width: 24px;
    height: 24px;
    color: #9F9F9F;
    z-index: 100;
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
        width: 220px !important; top:-12px !important;}

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
    .submit_btn{
        background-color:#4a89dc;
        color:#fff;
        margin:30px auto;
        display:block;
    }
    .report_submit{
        margin:15px 0px;
    }

    #example3_wrapper td{
        width:auto !important;
    }
</style>
<style>
    .modal-dialog{
        width:60%;
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
                    <ol class="breadcrumb">
                        <li>Home</li>
                        <li class="crumb-active">Report</li>
                    </ol>
                </div>
                <div class="settings-right">
                    <div id="skin-toolbox">
                        <div class="panel">
                            <div class="panel-heading">
                     <span class="panel-icon">
                     <i class="fa fa-spin fa-gear"></i>
                     </span>
                                <span class="panel-title"> Theme Options</span>
                            </div>
                            <div class="panel-body pn">
                                <ul class="nav nav-list nav-list-sm pl15 pt10" role="tablist">
                                    <li class="active">
                                        <a href="#toolbox-header" role="tab" data-toggle="tab">Navbar</a>
                                    </li>
                                    <li>
                                        <a href="#toolbox-sidebar" role="tab" data-toggle="tab">Sidebar</a>
                                    </li>
                                    <li>
                                        <a href="#toolbox-settings" role="tab" data-toggle="tab">Misc</a>
                                    </li>
                                </ul>
                                <div class="tab-content p20 ptn pb15">
                                    <div role="tabpanel" class="tab-pane active" id="toolbox-header">
                                        <form id="toolbox-header-skin">
                                            <h4 class="mv20">Header Skins</h4>
                                            <div class="skin-toolbox-swatches">
                                                <div class="checkbox-custom checkbox-disabled fill mb5">
                                                    <input type="radio" name="headerSkin" id="headerSkin8" checked value="">
                                                    <label for="headerSkin8">Light</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-primary mb5">
                                                    <input type="radio" name="headerSkin" id="headerSkin1" value="bg-primary">
                                                    <label for="headerSkin1">Primary</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-info mb5">
                                                    <input type="radio" name="headerSkin" id="headerSkin3" value="bg-info">
                                                    <label for="headerSkin3">Info</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-warning mb5">
                                                    <input type="radio" name="headerSkin" id="headerSkin4" value="bg-warning">
                                                    <label for="headerSkin4">Warning</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-danger mb5">
                                                    <input type="radio" name="headerSkin" id="headerSkin5" value="bg-danger">
                                                    <label for="headerSkin5">Danger</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-alert mb5">
                                                    <input type="radio" name="headerSkin" id="headerSkin6" value="bg-alert">
                                                    <label for="headerSkin6">Alert</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-system mb5">
                                                    <input type="radio" name="headerSkin" id="headerSkin7" value="bg-system">
                                                    <label for="headerSkin7">System</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-success mb5">
                                                    <input type="radio" name="headerSkin" id="headerSkin2" value="bg-success">
                                                    <label for="headerSkin2">Success</label>
                                                </div>
                                                <div class="checkbox-custom fill mb5">
                                                    <input type="radio" name="headerSkin" id="headerSkin9" value="bg-dark">
                                                    <label for="headerSkin9">Dark</label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="toolbox-sidebar">
                                        <form id="toolbox-sidebar-skin">
                                            <h4 class="mv20">Sidebar Skins</h4>
                                            <div class="skin-toolbox-swatches">
                                                <div class="checkbox-custom fill mb5">
                                                    <input type="radio" name="sidebarSkin" checked id="sidebarSkin3" value="">
                                                    <label for="sidebarSkin3">Dark</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-disabled mb5">
                                                    <input type="radio" name="sidebarSkin" id="sidebarSkin1" value="sidebar-light">
                                                    <label for="sidebarSkin1">Light</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-light mb5">
                                                    <input type="radio" name="sidebarSkin" id="sidebarSkin2" value="sidebar-light light">
                                                    <label for="sidebarSkin2">Lighter</label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="toolbox-settings">
                                        <form id="toolbox-settings-misc">
                                            <h4 class="mv20 mtn">Layout Options</h4>
                                            <div class="form-group">
                                                <div class="checkbox-custom fill mb5">
                                                    <input type="checkbox" checked="" id="header-option">
                                                    <label for="header-option">Fixed Header</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox-custom fill mb5">
                                                    <input type="checkbox" checked="" id="sidebar-option">
                                                    <label for="sidebar-option">Fixed Sidebar</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox-custom fill mb5">
                                                    <input type="checkbox" id="breadcrumb-option">
                                                    <label for="breadcrumb-option">Fixed Breadcrumbs</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox-custom fill mb5">
                                                    <input type="checkbox" id="breadcrumb-hidden">
                                                    <label for="breadcrumb-hidden">Hide Breadcrumbs</label>
                                                </div>
                                            </div>
                                            <h4 class="mv20">Layout Options</h4>
                                            <div class="form-group">
                                                <div class="radio-custom mb5">
                                                    <input type="radio" id="fullwidth-option" checked name="layout-option">
                                                    <label for="fullwidth-option">Fullwidth Layout</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb20">
                                                <div class="radio-custom radio-disabled mb5">
                                                    <input type="radio" id="boxed-option" name="layout-option" disabled>
                                                    <label for="boxed-option">Boxed Layout
                                                        <b class="text-muted">(Coming Soon)</b>
                                                    </label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="form-group mn br-t p15">
                                    <a href="#" id="clearLocalStorage" class="btn btn-primary btn-block pb10 pt10">Clear LocalStorage</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start: Topbar-Dropdown -->
        <div id="topbar-dropmenu">
            <div class="topbar-menu row">
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="metro-tile">
                        <span class="metro-icon glyphicon glyphicon-inbox"></span>
                        <p class="metro-title">Messages</p>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="metro-tile">
                        <span class="metro-icon glyphicon glyphicon-user"></span>
                        <p class="metro-title">Users</p>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="metro-tile">
                        <span class="metro-icon glyphicon glyphicon-headphones"></span>
                        <p class="metro-title">Support</p>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="metro-tile">
                        <span class="metro-icon fa fa-gears"></span>
                        <p class="metro-title">Settings</p>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="metro-tile">
                        <span class="metro-icon glyphicon glyphicon-facetime-video"></span>
                        <p class="metro-title">Videos</p>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="metro-tile">
                        <span class="metro-icon glyphicon glyphicon-picture"></span>
                        <p class="metro-title">Pictures</p>
                    </a>
                </div>
            </div>
        </div>
        <!-- End: Topbar-Dropdown -->
        <!-- Start: Topbar -->
        <header id="topbar" class="ph10">
            <div class="topbar-left">
                <ul class="nav nav-list nav-list-topbar pull-left">
                    <li class="active">
                        <a href="#">Report Generation</a>
                    </li>
                </ul>
            </div>
        </header>
        <!-- End: Topbar -->
        <!-- Begin: Content -->
        <section id="content" class="table-layout animated fadeIn">
            <!-- begin: .tray-center -->
            <div class="tray tray-center">
                <!-- create new order panel -->
                <!-- recent orders table -->
                <div class="panel">
                    <div class="panel-body pn">
						<form method="POST" action="<?php echo base_url(); ?>sales/generate_report">
                    </div>
    				<div class="form-group report_submit">
                        <label class="col-lg-3  col-md-3 col-sm-6 col-xs-12  fs14 control-label text-center mt10" for="textArea1">Start Date</label>
                        <div class="col-lg-8  col-md-8 col-sm-6 col-xs-12">
    						  <div class="">
    						  <input type="date" name="start" class="form-control">                          
    						</div>
    					</div><br>
    					<label class="col-lg-3  col-md-3 col-sm-6 col-xs-12  fs14 control-label text-center mt10" for="textArea1">End Date</label>
                        <div class="col-lg-8  col-md-8 col-sm-6 col-xs-12">
    						  <div class="">
    						  <input type="date" name="end" class="form-control">
    						  </select>                            
    						</div>
    					</div><br>
    					<label class="col-lg-3  col-md-3 col-sm-6 col-xs-12  fs14 control-label text-center mt10" for="textArea1">Select Form</label>
                        <div class="col-lg-8  col-md-8 col-sm-6 col-xs-12">
    						  <div class="">
    						  <select name="form_id" class="form-control" required="required">						
    						    <option value="">Select Form</option>
    						    <?php 
    					    foreach($forms as $form){ ?>
    						    <option value="<?php echo $form->id; ?>"><?php echo $form->name; ?></option>
    						    <?php
    						        
    						    }
    						    ?>
    						  </select>                            
    						</div>
    					</div>
    					<input type="hidden" name="user_id" value="<?php echo $id;?>">
    					<input type="hidden" name="role" value="<?php echo $role;?>">
    				<div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
    					 <input type="submit" name="submit" value="Submit" class="btn btn-default submit_btn">
    					 </div>
    				</div>
               
                </div>				
            </form>
	





                   </div>
                    </div>
                </div>
            </div>
            <!-- end: .tray-right -->
        </section>
        <!-- End: Content -->
    </section>

    
    <?php $this->load->view($this->config->item('footer_view')); ?>
    <?php $this->load->view($this->config->item('scripts_view')); ?>
    <script src="<?php echo base_url($this->config->item('js_validate_min')); ?>" type='text/javascript'></script>
    <?php $this->load->view($this->config->item('sales_tasks_scritps_view')); ?>
  
<script type="text/javascript">
function validate_form()
{
	var shop=document.getElementById("shops").value;
	if(shop == ""){ $("#error").html("Please select shop");$("#error").css('color', 'red'); return false; }else 
	if( $('input[name="form_ids[]"]:checked').length == 0 ){ $("#error").html("Please select form");$("#error").css('color', 'red'); return false; } else { return true; }
}
</script>

	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBwQLz9j33gPJoEG6lQ8BRbfNxR_jjAMi4&sensor=false&libraries=places"></script>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('searchshop'));
            google.maps.event.addListener(places, 'place_changed', function () {
                var place = places.getPlace();
                var address = place.formatted_address;
                var latitude = place.geometry.location.lat();
                var longitude = place.geometry.location.lng();
                //var mesg = "Address: " + address;
                //mesg += "\nLatitude: " + latitude;
                //mesg += "\nLongitude: " + longitude;
                jQuery.ajax({
					type:"POST",
					data:'address='+address,
					url:'../search_shop_address',
					success:function(html){
						jQuery("#shop_result").html(html);
					}
				});					
            });
        });
    </script>
	
	 <script type="text/javascript">

        $('input[name="search"]').on('keyup',function() {

            var search = $(this).val();

            if(search.length > 2) {

                get_sale_list(search, "<?php echo base_url($this->config->item('sales_ajax_get_sales_by_search_uri')); ?>");
            } else {

                get_sale_list('', "<?php echo base_url($this->config->item('sales_ajax_get_sales_by_search_uri')); ?>");
            }
        });

        // Get sale list
        function get_sale_list(search, link) {

            // Call ajax
            ajaxResponse = ajaxCall(link, "GET", {"search": search});

            if(typeof ajaxResponse == 'undefined')
                return;

            if(ajaxResponse.result.success == true) {

                $('.table-responsive').html(ajaxResponse.result.view);
            }
        }

        // Click on ajax page link
        $('.page-content').on('click', '.ajax-paginate a', function() {

            var search = $('input[name="search"]').val();

            if(search.length > 2) {

                get_sale_list(search, $(this).attr('href'));
            } else {

                get_sale_list('', $(this).attr('href'));
            }

            return false;
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
    
    <script>
    $("#shops").on('change', function() 
{	
     $("#moreforms_result1").hide();
	 $("#moreforms_result2").hide();
	 $("#moreforms_result3").hide();
 var shoptype = $("#shops").val();   
 for(i=0;i<shoptype.length;i++){
	 $("#moreforms_result1").hide();
	 $("#moreforms_result2").hide();
	 $("#moreforms_result3").hide();
	 st = shoptype[i];
	 jQuery.ajax({
		 type:'POST',
		 url:'../get_stypes',
		 data:'shop_id='+st,
		 success:function(html){			 
		 if(html == 1){			 
			 $("#moreforms_result1").show();			 
		 }else if(html == 2){
			 $("#moreforms_result2").show();
		 }else if(html == 3){
			 $("#moreforms_result3").show();
		 }
		 
		 }		 
	 });
 }
});
	</script>
        
    
</body>