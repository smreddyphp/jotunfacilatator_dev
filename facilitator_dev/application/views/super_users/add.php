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
}
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
    <!-- Start: Content-Wrapper -->
    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">
        <div class="row mb10">
            <div class="inner-header mb10">
                <div class="bread-cumLeft">
                    <ol class="breadcrumb"><li>Home</li><li class="crumb-active">SuperUser Management</li><li class="crumb-active">Add Super User</li>
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
                        <span class="panel-title hidden-xs">New Superuser</span>
                    </div>
                    <div class="panel-body p20 pb10">
                        <form method="POST" action="<?php echo base_url(); ?>dealers/save_super_user"  id="user_add" enctype="multipart/form-data">
                            <input type="hidden" name="superuser_id" value="<?=$super_user['id']?>">
                            <div class="col-md-10 form-group" id="manager_results" style="display:none"></div>
                            <div id="shops_data">
                                <div class="col-md-10 form-group">
                                    <label for="code" class="col-md-4 col-sm-4 col-xs-12">Select Zone</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <label for="code" class="field select">
                                            <select class="form-control event-name gui-input br-light light" name="zone" id="zone" onchange="get_shops_acc();">
                                                <option value="">Select Zone</option>
                                                <option value="1" <?=($super_user['zone']==1)?'selected':''?>>Riyadh</option>
                                                <option value="2" <?=($super_user['zone']==2)?'selected':''?>>Khamis</option>
                                                <option value="3" <?=($super_user['zone']==3)?'selected':''?>>Jeddah</option>
                                                <option value="4" <?=($super_user['zone']==4)?'selected':''?>>Dammam</option>
                                                <option value="5" <?=($super_user['zone']==5)?'selected':''?>>Yanbu</option>
                                            </select>
                                            <label for="name2" class="field-icon">
                                                <i class="arrow double"></i>
                                            </label>
                                        </label>
                                    </div>
                                </div>
                            </div>


                                    <div class="admin-form">
                                        <div class="section row mbn">
                                            <div class="col-md-10 col-sm-10 pl15">
                                                <div class="section row mb15">  
                                                    <div class="form-group">
                                                        <label for="name1" class="col-md-4 col-sm-4 col-xs-12">Username<span class="star">*</span></label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <label for="password" class="field prepend-icon">
                                                                <?php echo form_input(array('name' => 'username', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter username here', 'value' => $super_user['username']));
                                                                ?>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="name1" class="col-md-4 col-sm-4 col-xs-12">First Name<span class="star">*</span></label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <label for="password" class="field prepend-icon">
                                                                <?php echo form_input(array('name' => 'first_name', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter firstname here', 'value' => $super_user['first_name']));
                                                                ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name1" class="col-md-4 col-sm-4 col-xs-12">Last Name<span class="star">*</span></label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <label for="password" class="field prepend-icon">
                                                                <?php echo form_input(array('name' => 'last_name', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter lastname here', 'value' => $super_user['last_name']));
                                                                ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name1" class="col-md-4 col-sm-4 col-xs-12">Phone<span class="star">*</span></label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <label for="password" class="field prepend-icon">
                                                                <?php echo form_input(array('name' => 'phone', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter phone here', 'value' => $super_user['phone']));
                                                                ?>

                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name1" class="col-md-4 col-sm-4 col-xs-12">Email<span class="star">*</span></label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <label for="password" class="field prepend-icon">
                                                                <?php echo form_input(array('name' => 'email','id'=>'email', 'onblur'=>'checkMailStatus()', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter email here', 'value' => $super_user['email']));
                                                                ?>
                                                                <span style="color:red;display:none" id="email_error">This Email Already Exist</span>

                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name1" class="col-md-4 col-sm-4 col-xs-12">Password<span class="star">*</span></label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <label for="password" class="field prepend-icon">
                                                                <?php echo form_password(array('name' => 'password', 'class' => 'event-name gui-input br-light light', 'id' => 'password-cnf', 'placeholder' => 'Enter password here', 'value' => set_value('password')));
                                                                ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class=" form-group">
                                                        <label for="name1" class="col-md-4 col-sm-4 col-xs-12">Password Confirmation<span class="star">*</span></label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <label for="password" class="field prepend-icon">
                                                                <?php echo form_password(array('name' => 'password_cnf', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Re-enter password here', 'value' => set_value('password_cnf')));
                                                                ?>

                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class=" form-group">
                                                        <label for="name1" class="col-md-4 col-sm-4 col-xs-12">Image<span class="star"></span></label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <label for="password" class="field prepend-icon">
                                                            <input type="file" name="file" class='event-name gui-input br-light light'>
                                                    </label>
                                                </div>
                                            </div>
                                             <div class=" form-group">
                                                        <label for="name1" class="col-md-4 col-sm-4 col-xs-12">Status<span class="star"></span></label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <select class="form-control" name="status" id="status">
                                                            <option value="">Select Status</option>
                                                            <option value="1" <?=($super_user['status']==1)?'selected':''?>>Active</option>
                                                            <option value="2" <?=($super_user['status']==2)?'selected':''?>>InActive</option>
                                                        </select>
                                                    </label>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                 </div>
                            </div>

<div class=" form-group text-center">
    <p><?php echo form_button(array('type' => 'submit','id'=>'register', 'content' => 'Save User', 'class' => 'btn btn-success','style'=>"float:center")); ?>
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

 $('#user_add').validate({
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

        <?php if(!@$super_user['id']){ ?>

            password: {
                required: true
            },
            password_cnf: {
                equalTo: '#password-cnf',
                required: true
            },

        <?php } ?>
            
        role_id: {
            required: true
        },
        shop_acc_number: {
            required: true
        },
        status: {
            required: true,
            number: true
        },
        manager_id: {
            required: true,
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
      'shop[]': {
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

    $('.number').bind('keyup paste', function(){
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    function get_shops_acc(){
        var zone_id = $("#zone").val();
        jQuery.ajax({
            type:'POST',
            url:'../sales/get_shops_acc',
            data:'zone_id='+zone_id,
            success:function(html){
                $("#shop_account_number_replace").html(html);
            }
        });
    }

    function checkMailStatus(){
        var email=$("#email").val();
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>users/email_exists", 
            data:{email: email},
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


</script>
</body>