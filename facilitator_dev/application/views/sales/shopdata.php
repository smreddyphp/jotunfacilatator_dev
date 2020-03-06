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
    .toppad{margin-top:20px;}
    .form_descrpt{padding: 10px;}
    .form_dtal_btn {margin-top: 50px;}
    .fs12.b1 {margin-bottom: 10px;}
    .img_form {width: 90px;margin-top: 10px;}
    .p-t-sm {padding-top:10px;}

td{
 width: calc(100%/7);
}
thead th{
 width: calc(100%/7);
}
</style>


<div id="main">
    <?php $this->load->view($this->config->item('header_view')); ?>
    <?php $this->load->view($this->config->item('sidebar_view')); ?>

    <section id="content_wrapper">
        <div class="row mb10">
            <div class="inner-header mb10">
                <div class="bread-cumLeft">
                    <ol class="breadcrumb">
                        <li>Home</li>
                        <li class="crumb-active">View Forms</li>
                    </ol>
                </div>
                <div class="settings-right">
                    <div id="skin-toolbox">
                        <div class="panel">
                            <div class="panel-heading" unselectable="on" style="user-select: none;"> <span class="panel-icon"> <i class="fa fa-spin fa-gear"></i> </span> <span class="panel-title"> Theme Options</span> </div>
                            <div class="panel-body pn">
                                <ul class="nav nav-list nav-list-sm pl15 pt10" role="tablist">
                                    <li class="active"> <a href="#toolbox-header" role="tab" data-toggle="tab">Navbar</a> </li>
                                    <li> <a href="#toolbox-sidebar" role="tab" data-toggle="tab">Sidebar</a> </li>
                                    <li> <a href="#toolbox-settings" role="tab" data-toggle="tab">Misc</a> </li>
                                </ul>
                                <div class="tab-content p20 ptn pb15">
                                    <div role="tabpanel" class="tab-pane active" id="toolbox-header">
                                        <form id="toolbox-header-skin">
                                            <h4 class="mv20">Header Skins</h4>
                                            <div class="skin-toolbox-swatches">
                                                <div class="checkbox-custom checkbox-disabled fill mb5">
                                                    <input type="radio" name="headerSkin" id="headerSkin8" checked="" value="">
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
                                                    <input type="radio" name="sidebarSkin" checked="" id="sidebarSkin3" value="">
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
                                                    <input type="radio" id="fullwidth-option" checked="" name="layout-option">
                                                    <label for="fullwidth-option">Fullwidth Layout</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb20">
                                                <div class="radio-custom radio-disabled mb5">
                                                    <input type="radio" id="boxed-option" name="layout-option" disabled="">
                                                    <label for="boxed-option">Boxed Layout <b class="text-muted">(Coming Soon)</b> </label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="form-group mn br-t p15"> <a href="#" id="clearLocalStorage" class="btn btn-primary btn-block pb10 pt10">Clear LocalStorage</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start: Topbar -->
        <header id="topbar" class="ph10">
            <div class="topbar-left">
                <ul class="nav nav-list nav-list-topbar pull-left">
                    <li class="active"> <a href=""> View Forms</a> </li>
                </ul>
<?php 
$page = $_SERVER['PHP_SELF'];
$gd = explode('/', $page);
$shop_id = $gd[5];
$form_id = $gd[6];
?>
<?php $rresult = count($result); if($rresult != "0"){?>
<a href="<?php echo base_url(); ?>index.php/sales/shopsexcel/<?php echo $shop_id; ?>/<?php echo $form_id;  ?>" class="btn btn-sm btn btn-primary " style="    margin-left: 920px;">Download</a>
<?php } ?>

            </div>
        </header>
        <!-- End: Topbar -->

        <!-- Begin: Content -->
        <section id="content" class="table-layout">

            <!-- begin: .tray-center -->
            <div class="tray tray-center" style="height: 598px;">

                <!-- create new order panel -->
                <div class="panel mb25 mt5">
                   <!----<div class="panel-menu admin-form theme-primary">
                       <div class="row">
                            <div class="col-md-4">
                                <label class="field select">
                                    <select id="filter-purchases" name="filter-purchases">
                                        <option value="0">Filter by Name</option>
                                        <option value="1">1-49</option>
                                        <option value="2">50-499</option>
                                        <option value="1">500-999</option>
                                        <option value="2">1000+</option>
                                    </select>
                                    <i class="arrow double"></i>
                                </label>
                            </div>
                            <div class="col-md-4">
                                <label class="field select">
                                    <select id="filter-group" name="filter-group">
                                        <option value="0">Filter by Email</option>
                                        <option value="1">Users</option>
                                        <option value="2">Vendors</option>
                                        <option value="3">Distributors</option>
                                        <option value="4">Employees</option>
                                    </select>
                                    <i class="arrow double"></i>
                                </label>
                            </div>
                            <div class="col-md-4">
                                <label class="field select">
                                    <select id="filter-status" name="filter-status">
                                        <option value="0">Filter by Status</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                        <option value="3">Suspended</option>
                                        <option value="4">Online</option>
                                           <option value="5">Offline</option>
                                    </select>
                                    <i class="arrow double"></i>
                                </label>
                            </div>
                        </div>
                    </div>---->
                </div>				

                <!-- recent orders table -->
                <?php foreach($result as $value){?>
                  <div class="panel">
                      <div class="panel-body pn">
                          <div class="container">
                              <div class="row p-t-sm">
                                  <div class="col-md-2 " align="center">
                                   <?php if($value['profile_image'] == ""){?><img src="<?php echo base_url();?>server/assets/media/profile.png" 
 class="img-responsive img_form">
												  <?php }else{?>
			<img src="<?php echo base_url(); ?>server/assets/media/<?php echo $value['profile_image'];?>"  class="img-responsive img_form">
												  <?php } ?> </div>
                                  <div class=" col-md-10">
                                      <div class="table-responsive">
                                          <table class="table table-user-information">
                                              <thead>
                                              <tr>                                                 
                                                  <th>User Name</th>
                                                  <th>First Name</th>
                                                  <th>Email ID</th>
                                                  <th>Mobile</th> 
<th>Verified Status</th>
<th>View</th>            
<th>Action</th>                                     
                                              </tr>
                                              </thead>
                                              <tbody>
                                              <tr>                                                  
                                                  <td><?php echo $value['username'];?></td>
                                                  <td><?php echo $value['first_name'];?></td>
                                                  <td><?php echo $value['email'];?></td>
                                                  <td><?php echo $value['phone'];?></td>
<?php
$task_form_id = $value['id'];
$data['rows'] = $this->load->sales_model->getstatus_shops($task_form_id);
$rows = $data['rows'];
?>
<td>
<?php if($rows != ""){ ?>
<span class="btn btn-success btn-sm">Completed</span>
<?php }else{?>
<span class="btn btn-primary btn-sm">Pending</span>
<?php } ?>
</td>

<td><?php echo anchor(base_url($this->config->item('sales_shop_details_view_uri').$value['task_id'].'/'.$value['id'].'/'.$value['form_id']), 'View Details', 'class="btn btn-sm btn-success"'); ?></td>

<?php if($rows != ""){ ?>
<td><span class="btn btn-sm btn-danger" disabled="disabled" onclick="unassigntask('<?php echo $value['task_id']; ?>','<?php echo $value['id']; ?>');">Unassign</span></td>
<?php }else{ ?>
<td><span class="btn btn-sm btn-danger" onclick="unassigntask('<?php echo $value['task_id']; ?>','<?php echo $value['id']; ?>');">Unassign</span></td>
<?php } ?>
                                              </tr>
                                              </tbody>
                                          </table>
                                      </div>
                                      <div class="clearfix"></div>
                                      <p class="text-right"> 
                                    
                                      </p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
				<?php } ?>
            </div>
            <!-- end: .tray-center -->

        </section>
        <!-- End: Content -->

    </section>

    <?php $this->load->view($this->config->item('scripts_view')); ?>