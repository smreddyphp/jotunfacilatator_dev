<!doctype html>
<html>
<head>
   <!-- Meta, title, CSS, favicons, etc. -->
   <meta charset="utf-8">
   <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
   <title>USers</title>
   <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
   <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
   <meta name="author" content="AdminDesigns">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Font CSS (Via CDN) -->
   <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
   <!-- Theme CSS -->

      <title>USers</title>
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
.reset_body input{
    width:50%;
}
.reset_body button{
   float:right;
   margin:20px 0px;
}
.reset_footer .btn-default{
    float:left !important;
    padding: 9px 12px;
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
                            <li class="crumb-active">Team Management</li>
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
                            <p><a href="<?php echo base_url();?>users/add" class="btn btn-success">Add New User</a></p></div>
                    </div>
                </div>
                <div class="panel col-md-12">
                        <div class="panel-heading">
                            <h4><strong>List of Users</strong></h4>
                        </div>
                        <div class="panel-body pn">
                            <div class="table-scrollable">
										<div id="example3_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
										    <div class="row">
										        <div class="col-sm-12 col-md-6" style="display:none">
										            <div class="dataTables_length" id="example3_length">
										                <label>Show <select name="example3_length" aria-controls="example3" class="form-control form-control-sm">
										                    <option value="10">10</option>
										                    <option value="25">25</option>
										                    <option value="50">50</option>
										                    <option value="100">100</option>
										                    </select> entries</label>
										                    </div>
										                    </div>
										                    <div class="col-sm-12 col-md-6" style="display:none">
										                        <div id="example3_filter" class="dataTables_filter">
										                            <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example3"></label>
										                            </div>
										                            </div>
										                            </div>
										                            <div class="row">
										                                <div class="col-sm-12">
										                                    <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle dataTable no-footer" id="example3" role="grid" aria-describedby="example3_info">
											<thead>
												<tr role="row">
												    <th class="sorting_asc" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Sr.No: activate to sort column descending" style="width: 46px;">Sr.No</th>
												    <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Exam Name: activate to sort column ascending" style="width: 124px;">Code</th>
												    <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Exam Open Date Time: activate to sort column ascending" style="width: 174px;">Username</th>
												    <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Exam Close Time: activate to sort column ascending" style="width: 136px;">First Name</th>
												    <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Exam Duration In Minutes: activate to sort column ascending" style="width: 202px;">Email</th>
												    <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Exam Duration In Minutes: activate to sort column ascending" style="width: 202px;">Phone</th>
												    <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Exam Duration In Minutes: activate to sort column ascending" style="width: 202px;">Status</th>
												    <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Exam Duration In Minutes: activate to sort column ascending" style="width: 202px;">Edit</th>
												    
												    <?php if($this->lib_auth->getRoleID() == 1){ ?>
                                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Exam Duration In Minutes: activate to sort column ascending" style="width: 202px;">Delete</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Exam Duration In Minutes: activate to sort column ascending" style="width: 202px;"></th>
                                                    <?php } ?>
												</tr>
											</thead>
											<tbody>
											    <?php 
											    if(!empty($users))
											    {
											        $i=1;
											        foreach($users as $key=>$dealer){ ?>
											        <tr class="odd" role="row">
    													<td class="sorting_1"><?php echo $i++; ?></td>
    													<td><?php echo $dealer->code;?></td>
    													<td><?php echo $dealer->username;?></td>
    													<td><?php echo $dealer->first_name;?></td>
    													<td><?php echo $dealer->email;?></td>
    													<td><?php echo $dealer->phone;?></td>
  				                                        <td>
  				                                       <?php if($dealer->status == 1){?>
                                        				<span class="label label-success" onclick="changestatusteam(<?php echo $dealer->id ?>,'1')">Active</span>
                                        				<?php }else{?>
                                        				<span class="label label-danger" onclick="changestatusteam(<?php echo $dealer->id ?>,'0')">Inactive</span>
                                        				<?php } ?>
                                                        </td>
                                                        <td><a href="<?php echo base_url();?>users/edit/<?php echo $dealer->id; ?>" class="btn btn-xs btn-success"><span >Edit</span></a></td>
                                                          <?php if($this->lib_auth->getRoleID() == 1){ ?>
                                                        	<td><span class="label label-danger" onclick="deletedata(<?php echo $dealer->id; ?>)">Delete</span></td>
                                                        	<td><span class="label label-primary" data-toggle="modal" data-target="#resetPassword<?php echo $key;?>">Reset Password</span></td>
                                                        	<div id="resetPassword<?php echo $key;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reset Password</h4>
      </div>
      <div class="modal-body reset_body">
        <input type="password" class="form-control" name="password" id="password<?php echo $key;?>" placeholder="Enter New Password" required>
        <input type="hidden" class="form-control" name="user_id" id="user_id<?php echo $key;?>" value="<?php echo $dealer->id;?>">
      </div>
      <div class="modal-footer reset_footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-success submit" onclick="reset_password(<?php echo $key;?>)">Submit</button>
      </div>
    </div>

  </div>
</div>
                                                        <?php } ?>
    											    </tr>
											            
											       <?php }
											    }
											    ?>
											</tbody>
										</table></div></div>
										<div class="row">
										    <div class="col-sm-12 col-md-5">
										        <div class="dataTables_info" id="example3_info" role="status" aria-live="polite" style="display:none">Showing 1 to 2 of 2 entries</div>
										        </div>
										        <div class="col-sm-12 col-md-7">
										            <div class="dataTables_paginate paging_simple_numbers " id="example3_paginate" style="display:none">
										                <ul class="pagination" >
										                    <li class="paginate_button page-item previous disabled" id="example3_previous" >
										                        <a href="#" aria-controls="example3" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
										                        </li>
										                        <li class="paginate_button page-item active">
										                            <a href="#" aria-controls="example3" data-dt-idx="1" tabindex="0" class="page-link">1</a>
										                            </li>
										                            <li class="paginate_button page-item next disabled" id="example3_next">
										                                <a href="#" aria-controls="example3" data-dt-idx="2" tabindex="0" class="page-link">Next</a>
										                                </li>
										                                </ul>
										                                </div>
										                                </div>
										                                </div>
										                                </div>
									</div>
                            <!-- Pagination -->
                            
                            <!-- /Pagination -->
                        </div>
                    </div>
                
            </section>
            <!-- End: Content -->

        </section>
        <?php $this->load->view($this->config->item('footer_view')); ?>
    </div>
    <?php $this->load->view($this->config->item('scripts_view')); ?>

    <script src="<?php echo base_url($this->config->item('js_validate_min')); ?>" type='text/javascript'></script>

    <script type="text/javascript">

        // $('input[name="search"]').on('keyup',function() {

        //     var search = $(this).val();
            
        //     // Get user list
        //     get_user_list(search, "<?php echo base_url($this->config->item('dealers_ajax_get_dealers_by_search_uri')); ?>");
        // });

        // $('select[name="filter-status"]').on('change',function() {

        //     var search = $(this).val();
            
        //     // Get user list
        //     get_user_list(search, "<?php echo base_url($this->config->item('dealers_ajax_get_dealers_by_search_uri')); ?>");
        // });

        // // Get shop list
        // function get_user_list(search, link) {

        //     // Call ajax
        //     ajaxResponse = ajaxCall(link+'?search='+search, "GET");

        //     if(typeof ajaxResponse == 'undefined')
        //         return;

        //     if(ajaxResponse.result.success == true) {

        //         $('.table-responsive').html(ajaxResponse.result.view);
        //     }
        // }

        // // Click on ajax page link
        // $(document).on('click', '.ajax-paginate a', function(e) {

        //     e.preventDefault();

        //     // Obj
        //     obj = $(this);

        //     // Call ajax
        //     ajaxResponse = ajaxCall(obj.attr('href'), "GET");

        //     if(typeof ajaxResponse == 'undefined')
        //         return;

        //     if(ajaxResponse.result.success == true) {

        //         $('.table-responsive').html(ajaxResponse.result.view);
        //     }
        // });
        
        function changestatusteam(id,ustatus){
var id = id;
var status = ustatus;
var table_name ="users";	
//alert(id);
//alert(status);
//alert(table_name);
swal({ title: "Are you sure?" ,
		text: "Do you want to change status!",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: 'Yes, change it!',
		cancelButtonText: 'No, Cancel it!',
		closeOnConfirm: false,
		confirmButtonColor : "#DD6B55",
		allowOutsideClick: false,
		allowEscapeKey: false
		},
			function() {			
			swal.disableButtons();    
			jQuery.ajax({
			type:'POST',
			data:'id='+id+'&status='+status+'&table_name='+table_name,
			url:'../../dashboard/changestatus',
			success: function(html){
if(html == 1){			
		swal({title: "Status changed successfully"},function(){
        location.reload();         
         });
}	
			}
			});
			});			
}

function deletedata(id,ustatus){
var id = id;
var table_name = "users";	
swal({ title: "Are you sure?" ,
		text: "Do you want to delete this!",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: 'Yes, delete it!',
		cancelButtonText: 'No, Cancel it!',
		closeOnConfirm: false,
		confirmButtonColor : "#DD6B55",
		allowOutsideClick: false,
		allowEscapeKey: false
		},
			function() {			
			swal.disableButtons();    
			jQuery.ajax({
			type:'POST',
			data:'id='+id+'&table_name='+table_name,
			url:'<?php echo base_url();?>dashboard/deletedata',
			success: function(html){
if(html != ""){			
		swal({title: "Data deleted successfully"},function(){
        location.reload();         
         });
}	
			}
			});
			});			
}

$(".submit").click(function(){
    
});

function reset_password(id)
{
    var password = $("#password"+id).val();
    var user_id = $("#user_id"+id).val();
    if(password == "")
    {
       alert("Please Enter Password");
       return false;
    }
    jQuery.ajax({
			type:'POST',
			data:'user_id='+user_id+'&password='+password,
			url:'<?php echo base_url();?>users/reset_password',
			success: function(html){
			    console.log(html);
           			
            		swal({title: "Password Reset successfully"},function(){
                    location.reload();         
                     });
            
			}
			});	
}
    </script>
    
</body>
<script src="http://jotunksa.com/facilitator_dev/assets/js/dataTables.bootstrap4.min.js" type='text/javascript'></script>
<script src="http://jotunksa.com/facilitator_dev/assets/js/jquery.dataTables.min.js" type='text/javascript'></script>
<script src="http://jotunksa.com/facilitator_dev/assets/js/table_data.js" type='text/javascript'></script>
