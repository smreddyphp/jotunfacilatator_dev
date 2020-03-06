  <link rel="stylesheet" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <body class="dashboard-page sb-l-o sb-r-c">
    <style>
div#myTable_length {
    margin: 25px 10px;
}
        div#myTable_filter {
    margin-top: 24px;
    margin-right: 10px;
}
        div#myTable_filter > select {
    background: red;
        }
label.error, .star {
    color: red;
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
        input.btn-sm.btn.btn-primary.upload-csv {
            padding: 7px 25px;
            margin-top: 1px;
}
div#dealerfilter_result_wrapper div#dealerfilter_result_length {
    margin-top: 10px;
    margin-left: 10px;
    font-size: 13px;
    margin-bottom: 10px;
}
div#dealerfilter_result_wrapper div#dealerfilter_result_filter {
    margin-top: 10px;
    margin-right: 10px;
    font-size: 13px;
}
div#dealerfilter_result_wrapper div#dealerfilter_result_filter input[type="search"] {
  border: 1px solid #ddd !important;
    height: 28px !important;
}
label.col-md-4.col-sm-4.col-xs-12 {
    text-align: right;
    padding-top: 10px;
}
.admin-form .form-group {
    padding-bottom: 20px;
    overflow: hidden;
    margin-bottom: 5px;
}
label.error, .star {
    color: red;
    bottom: -20px;
    position: absolute;
    font-size: 12px;
}
    </style>

    <?php $this->load->view($this->config->item('header_view')); ?>
    <?php $this->load->view($this->config->item('sidebar_view')); ?>
    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">
        <div class="row mb10">
            <div class="inner-header mb10">
                <div class="bread-cumLeft">
                    <ol class="breadcrumb">
                        <li>Home</li>
                        <li class="crumb-active">Shop Management</li>
                    </ol>
                </div>
                <div class="settings-right">
                    <div id="skin-toolbox">
                        <div class="panel">
                            <div class="panel-heading" unselectable="on" style="-moz-user-select: none;">
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
                                                    <input name="headerSkin" id="headerSkin8" checked="" value="" type="radio">
                                                    <label for="headerSkin8">Light</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-primary mb5">
                                                    <input name="headerSkin" id="headerSkin1" value="bg-primary" type="radio">
                                                    <label for="headerSkin1">Primary</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-info mb5">
                                                    <input name="headerSkin" id="headerSkin3" value="bg-info" type="radio">
                                                    <label for="headerSkin3">Info</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-warning mb5">
                                                    <input name="headerSkin" id="headerSkin4" value="bg-warning" type="radio">
                                                    <label for="headerSkin4">Warning</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-danger mb5">
                                                    <input name="headerSkin" id="headerSkin5" value="bg-danger" type="radio">
                                                    <label for="headerSkin5">Danger</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-alert mb5">
                                                    <input name="headerSkin" id="headerSkin6" value="bg-alert" type="radio">
                                                    <label for="headerSkin6">Alert</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-system mb5">
                                                    <input name="headerSkin" id="headerSkin7" value="bg-system" type="radio">
                                                    <label for="headerSkin7">System</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-success mb5">
                                                    <input name="headerSkin" id="headerSkin2" value="bg-success" type="radio">
                                                    <label for="headerSkin2">Success</label>
                                                </div>
                                                <div class="checkbox-custom fill mb5">
                                                    <input name="headerSkin" id="headerSkin9" value="bg-dark" type="radio">
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
                                                    <input name="sidebarSkin" checked="" id="sidebarSkin3" value="" type="radio">
                                                    <label for="sidebarSkin3">Dark</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-disabled mb5">
                                                    <input name="sidebarSkin" id="sidebarSkin1" value="sidebar-light" type="radio">
                                                    <label for="sidebarSkin1">Light</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-light mb5">
                                                    <input name="sidebarSkin" id="sidebarSkin2" value="sidebar-light light" type="radio">
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
                                                    <input checked="" id="header-option" type="checkbox">
                                                    <label for="header-option">Fixed Header</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox-custom fill mb5">
                                                    <input checked="" id="sidebar-option" type="checkbox">
                                                    <label for="sidebar-option">Fixed Sidebar</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox-custom fill mb5">
                                                    <input id="breadcrumb-option" type="checkbox">
                                                    <label for="breadcrumb-option">Fixed Breadcrumbs</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox-custom fill mb5">
                                                    <input id="breadcrumb-hidden" type="checkbox">
                                                    <label for="breadcrumb-hidden">Hide Breadcrumbs</label>
                                                </div>
                                            </div>
                                            <h4 class="mv20">Layout Options</h4>
                                            <div class="form-group">
                                                <div class="radio-custom mb5">
                                                    <input id="fullwidth-option" checked="" name="layout-option" type="radio">
                                                    <label for="fullwidth-option">Fullwidth Layout</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb20">
                                                <div class="radio-custom radio-disabled mb5">
                                                    <input id="boxed-option" name="layout-option" disabled="" type="radio">
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
        <!-- Start: Topbar -->
        <header id="topbar" class="ph10">
            <div class="topbar-left">
                <ul class="nav nav-list nav-list-topbar pull-left">
                    <li class="active">
                        <a href="">Basic shop Details</a>
                    </li>
                </ul>
            </div>
        </header>
        <section id="content" class="table-layout">
            <div class="tray tray-center">
                <div class="panel mb25 mt5">
                    <div class="panel-heading">
                        <span class="panel-title hidden-xs"> Add New Shop Details</span>
                    </div>
                    <div class="panel-body p20 pb10">
                        <div class="tab-content pn br-n admin-form">
                            <div id="tab1_1" class="tab-pane active">
                                <div class="section row mbn">
                                    <?php echo form_open_multipart(base_url($this->config->item('shops_add_uri')), array('id' => 'addShopForm')); ?>
                                    <div class="form-group">
                                            <label for="name" class="col-md-4 col-sm-4 col-xs-12">shop name</label>
                                            <div class="col-md-6 col-sm-8 col-xs-12">
                                                <label for="name1" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'name', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'shop name', 'value' => set_value('name'))); ?>
                                                    <label for="name1" class="field-icon">
                                                        <i class="fa fa-building-o" aria-hidden="true"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>
                                         <?php if(@$zone_id){ ?>
                                            <div class="form-group">
                                                <label for="name" class="col-md-4 col-sm-4 col-xs-12">Zone</label>
                                                <div class="col-md-6 col-sm-8 col-xs-12">
                                                    <label for="name2" class="field select">
                                                    <select class="event-name gui-input br-light light" name="address">
                                                        <option value="<?=$zone_id?>"><?=$zone?></option>
                                                    </select>
                                                    <label for="name2" class="field-icon">
                                                           <i class="arrow double"></i>
                                                    </label> 
                                                    </label>
                                                </div>
                                            </div>
                                            <?php }else{ ?>
                                            <div class="form-group">
                                                <label for="name" class="col-md-4 col-sm-4 col-xs-12">Zone</label>
                                                <div class="col-md-6 col-sm-8 col-xs-12">
                                                    <label for="name2" class="field select">
                                                        <select class="event-name gui-input br-light light" name="address">
                                                            <option value="">Select Zone</option>
                                                            <option value="1">Riyadh</option>
                                                            <option value="2">Khamis</option>
                                                            <option value="3">Jeddah</option>
                                                            <option value="4">Dammam</option>
                                                            <option value="5">Yanbu</option>
                                                        </select>
                                                        <label for="name2" class="field-icon">
                                                               <i class="arrow double"></i>
                                                        </label> 
                                                        </label>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        <div class="form-group">
                                            <label for="name" class="col-md-4 col-sm-4 col-xs-12">Last Evaluation</label>
                                            <div class="col-md-6 col-sm-8 col-xs-12">
                                                <label for="text" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'last_evaluation', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Last Evaluation', 'value' => set_value('last_evaluation'))); ?>
                                                    <label for="name2" class="field-icon">
                                                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-md-4 col-sm-4 col-xs-12"> Select Shop Type </label>
                                            <div class="col-md-6 col-sm-8 col-xs-12">
                                                <label for="text" class="field select">
                                                    <?php echo form_dropdown('shop_type_id', array('' => 'Select Shop Type') + $arrShopTypes, $this->input->post('shop_type_id'),'' ,'class="event-name gui-input br-light light'); ?>
                                                    <label for="name2" class="field-icon">
                                                        <i class="arrow double"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-md-4 col-sm-4 col-xs-12">Account Number </label>
                                            <div class="col-md-6 col-sm-8 col-xs-12">
                                                <label for="text" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'acc_no', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Account Number', 'value' => set_value('acc_no'))); ?>
                                                    <label for="name2" class="field-icon">
                                                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-md-4 col-sm-4 col-xs-12">Email ID </label>
                                            <div class="col-md-6 col-sm-8 col-xs-12">
                                                <label for="email" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'email', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Email ID', 'value' => set_value('email'))); ?>
                                                    <label for="password2" class="field-icon">
                                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-md-4 col-sm-4 col-xs-12">Phone Number </label>
                                            <div class="col-md-6 col-sm-8 col-xs-12">
                                               <label for="text" class="field prepend-icon">
                                                    <input type="text" name="phone" id="phone" class="event-name gui-input br-light light" placeholder="Phone Number" value="<?=set_value('phone')?>">
                                                   <label class="field-icon">
                                                        <i class="fa fa-phone"></i>
                                                    </label>
                                                </label> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-md-4 col-sm-4 col-xs-12">Image </label>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <input type="hidden" name="image" value="" />
                                        <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
                                            <div class="fileupload-preview thumbnail mb15">
                                                <img src="<?php echo base_url(); ?>assets/img/logos/download.svg" alt="holder">
                                            </div>
                                             <span class="button btn-system btn-file btn-block ph5">
                                                 <span class="fileupload-new">Image</span>
<input type="file" name="file" class="fileupload-new" >
                                                 <!----<?php echo form_upload(array('name' => 'file', 'class' => 'fileupload-new')); ?>------>
                                             </span>
                                        </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-md-4 col-sm-4 col-xs-12">latitude </label>
                                            <div class="col-md-6 col-sm-8 col-xs-12">
                                                 <label for="latitude" class="field prepend-icon">
                                                    <input type="text" name="latitude" id="latitude" class="event-name gui-input br-light light" placeholder="latitude" value="<?=set_value('latitude')?>">
                                                    <label for="latitude" class="field-icon">
                                                        <i class="fa fa-map-marker"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-md-4 col-sm-4 col-xs-12">longitude </label>
                                            <div class="col-md-6 col-sm-8 col-xs-12">
                                                 <label for="longitude" class="field prepend-icon">
                                                    <input type="text" name="longitude" id="longitude" class="event-name gui-input br-light light" placeholder="longitude" value="<?=set_value('longitude')?>">
                                                    <label for="longitude" class="field-icon">
                                                        <i class="fa fa-map-marker"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>
                                    <div class="col-md-12 pl15">
                                        <div class="section row mb15">
                                           
                                        </div>
                                        <!-- <div class="section row mb15">
                                            <div class="col-xs-6">
                                                <label for="text" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'latitude', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'latitude', 'value' => set_value('latitude'))); ?>
                                                    <label for="name2" class="field-icon">
                                                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                                                    </label>
                                                </label>
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="text" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'longitude', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'longitude', 'value' => set_value('longitude'))); ?>
                                                    <label for="name2" class="field-icon">
                                                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>-->
                                        <div class="section row mb15">
                                            
                                            <div class="col-xs-6">
                                                
                                            </div>
                                        </div>
                                        <div class="section row mb15">
                                            <div class="col-xs-6">
                                                
                                            </div>
                                            <div class="col-xs-6">
                                                
                                            </div>
                                        </div>
                                        <!--                                                <div class="section row mb15">
                                            <div class="col-xs-6">
                                                <label for="text" class="field prepend-icon">
                                            <?php echo form_input(array('name' => 'latitude', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'latitude', 'value' => set_value('latitude'))); ?>
                                                    <label for="name2" class="field-icon">
                                                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                                                    </label>
                                                </label>
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="text" class="field prepend-icon">
                                            <?php echo form_input(array('name' => 'longitude', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'longitude', 'value' => set_value('longitude'))); ?>
                                                    <label for="name2" class="field-icon">
                                                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>-->
                                        <div class="section row mb15">
                                        <div class="col-xs-6">
                                                
                                            </div>
                                        


                                        <!--<div class="col-xs-6">-->
                                        <!--        <label for="text" class="field select">-->
                                        <!--            <?php //echo form_dropdown('dealer_id', array('' => 'Select Dealer') + $dealers, $this->input->post('dealer_id'),'' ,'class="event-name gui-input br-light light'); ?>-->
                                        <!--            <label for="name2" class="field-icon">-->
                                        <!--                <i class="arrow double"></i>-->
                                        <!--            </label>-->
                                        <!--        </label>-->
                                        <!--    </div>-->



                                    </div>

                                    <div class="clear-fix"></div>
                                             <!--<div class="section row mb10 mt25 ">-->

                                             <!--   <div class="col-md-4 mb15">-->
                                             <!--       <label class="modal_label mb10" for="sales_target">Sales Target :</label>-->
                                             <!--       <label for="sales_target" class="field prepend-icon">-->
                                             <!--           <input type="text" name="sales_target" id="sales_target" class="event-name gui-input br-light light" placeholder="Sales Target">-->
                                             <!--           <label for="sales_target" class="field-icon">-->
                                             <!--               <i class="fa fa-bullhorn"></i>-->
                                             <!--           </label>-->
                                             <!--       </label>-->
                                             <!--   </div>-->

                                             <!--   <div class="col-md-4 mb15">-->
                                             <!--       <label class="modal_label mb10" for="purchase_target">Purchase Target :</label>-->
                                             <!--       <label for="purchase_target" class="field prepend-icon">-->
                                             <!--           <input type="text" name="purchase_target" id="purchase_target" class="event-name gui-input br-light light" placeholder="Purchase Target">-->
                                             <!--           <label for="purchase_target" class="field-icon">-->
                                             <!--               <i class="fa fa-shopping-cart"></i>-->
                                             <!--           </label>-->
                                             <!--       </label>-->
                                             <!--   </div>-->

                                             <!--   <div class="col-md-4 mb15">-->
                                             <!--       <label class="modal_label mb10" for="goods_target">Goods target :</label>-->
                                             <!--       <label for="goods_target" class="field prepend-icon">-->
                                             <!--           <input type="text" name="goods_target" id="goods_target" class="event-name gui-input br-light light" placeholder="Goods Target">-->
                                             <!--           <label for="goods_target" class="field-icon">-->
                                             <!--               <i class="fa fa-archive"></i>-->
                                             <!--           </label>-->
                                             <!--       </label>-->
                                             <!--   </div>-->
                                             <!--</div>-->


                                        <div class="clear-fix"></div>
                                        
                                            <div class="col-xs-6">
                                               
                                            </div>
                                            <div class="col-xs-6">
                                               
                                            </div>
                                            
                                            

                                             <div class="col-md-12  mt15 mb15" id="locationField">
                                                <label class="modal_label mb10" for="autocomplete">Search address* :</label>
                                                <label for="autocomplete" class="field prepend-icon">
                                                    <input id="autocomplete" placeholder="Search your address" name="address_search" class="event-name gui-input br-light light" onFocus="geolocate()" type="text">
                                                    <label for="autocomplete" class="field-icon">
                                                        <i class="fa fa-map-marker"></i>
                                                    </label>
                                                </label>
                                            </div>


                                            <div class="section row mb10" id="address">
                                                <div class="col-md-4 mb15">
                                                    <label class="modal_label mb10" for="door_no">Door number :</label>
                                                    <label for="door_no" class="field prepend-icon">
                                                        <input type="text" name="door_no" id="door_no" class="event-name gui-input br-light light" placeholder="Door or plot no.">
                                                        <label for="door_no" class="field-icon">
                                                            <i class="fa fa-map-marker"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                                <div class="col-md-4 mb15">
                                                    <label class="modal_label mb10" for="street_number">Street_number :</label>
                                                    <label for="street_number" class="field prepend-icon">
                                                        <input type="text" name="street_number" id="street_number" class="event-name gui-input br-light light" placeholder="Street number">
                                                        <label for="street_number" class="field-icon">
                                                            <i class="fa fa-map-marker"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                                <div class="col-md-4 mb15">
                                                    <label class="modal_label mb10" for="route">Colony or Street :</label>
                                                    <label for="route" class="field prepend-icon">
                                                        <input type="text" name="route" id="route" class="event-name gui-input br-light light" placeholder="Colony or street">
                                                        <label for="route" class="field-icon">
                                                            <i class="fa fa-map-marker"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                                <div class="col-md-4 mb15">
                                                    <label class="modal_label mb10" for="locality">District* :</label>
                                                    <label for="locality" class="field prepend-icon">
                                                        <input type="text" name="locality" id="locality" class="event-name gui-input br-light light" placeholder="District">
                                                        <label for="locality" class="field-icon">
                                                            <i class="fa fa-map-marker"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                                <div class="col-md-4 mb15">
                                                    <label class="modal_label mb10" for="administrative_area_level_1">Province* :</label>
                                                    <label for="administrative_area_level_1" class="field prepend-icon">
                                                        <input type="text" name="province" id="administrative_area_level_1" class="event-name gui-input br-light light" placeholder="State or Province">
                                                        <label for="administrative_area_level_1" class="field-icon">
                                                            <i class="fa fa-map-marker"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                                <div class="col-md-4 mb15">
                                                    <label class="modal_label mb10" for="postal_code">Postal Code :</label>
                                                    <label for="postal_code" class="field prepend-icon">
                                                        <input type="text" name="postal_code" id="postal_code" class="event-name gui-input br-light light" placeholder="postal_code">
                                                        <label for="postal_code" class="field-icon">
                                                            <i class="fa fa-map-marker"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                                <div class="col-md-4 mb15">
                                                    <label class="modal_label mb10" for="country">Country* :</label>
                                                    <label for="country" class="field prepend-icon">
                                                        <input type="text" name="country" id="country" class="event-name gui-input br-light light" placeholder="country">
                                                        <label for="country" class="field-icon">
                                                            <i class="fa fa-map-marker"></i>
                                                        </label>
                                                    </label>
                                                </div>

                                                </div>
                                                <div class="section row mb15">
                                                <div id="dealer_map" style="height:450px;margin-left: 15px; width: 1000px; border: 2px solid ;"></div>
                                                </div>
                                        <div class="section row mb15">
                                            <div class="col-xs-6">
                                                <?php echo form_button(array('type' => 'button', 'id'=>'add_shop', 'content' => 'Add New Shop', 'class' => 'btn btn-success')); ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				

				
                             
                    
                    
                                
        </section>
    </section>
    <?php $this->load->view($this->config->item('footer_view')); ?>
    <?php $this->load->view($this->config->item('scripts_view')); ?>
    <script src="<?php echo base_url($this->config->item('js_validate_min')); ?>" type='text/javascript'></script>
    <script>
                                                        // This example displays an address form, using the autocomplete feature
                                                        // of the Google Places API to help users fill in the information.

                                                        // This example requires the Places library. Include the libraries=places
                                                        // parameter when you first load the API. For example:
                                                        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

                                                        var placeSearch, autocomplete;
                                                        var componentForm = {
                                                            street_number: 'short_name',
                                                            route: 'long_name',
                                                            locality: 'long_name',
                                                            administrative_area_level_1: 'short_name',
                                                            country: 'long_name',
                                                            postal_code: 'short_name'
                                                        };
                                                        //Set up some of our variables.
                                                        var map; //Will contain map object.
                                                        var marker = false; ////Has the user plotted their location marker? 

                                                        function initAutocomplete() {
                                                            //The center location of our map.
                                                            var centerOfMap = new google.maps.LatLng(59.1313095, 10.2165948);

                                                            //Map options.
                                                            var options = {
                                                                center: centerOfMap, //Set center.
                                                                zoom: 7 //The zoom value.
                                                            };

                                                            //Create the map object.
                                                            map = new google.maps.Map(document.getElementById('dealer_map'), options);

                                                            //Listen for any clicks on the map.
                                                            google.maps.event.addListener(map, 'click', function (event) {
                                                                //Get the location that the user clicked.
                                                                var clickedLocation = event.latLng;
                                                                //If the marker hasn't been added.
                                                                if (marker === false) {
                                                                    //Create the marker.
                                                                    marker = new google.maps.Marker({
                                                                        position: clickedLocation,
                                                                        map: map,
                                                                        draggable: true //make it draggable
                                                                    });
                                                                    //Listen for drag events!
                                                                    google.maps.event.addListener(marker, 'dragend', function (event) {
                                                                        markerLocation();
                                                                    });
                                                                } else {
                                                                    //Marker has already been added, so just change its location.
                                                                    marker.setPosition(clickedLocation);
                                                                }
                                                                //Get the marker's location.
                                                                markerLocation();
                                                            });

                                                            // Create the autocomplete object, restricting the search to geographical
                                                            // location types.
                                                            autocomplete = new google.maps.places.Autocomplete(
                                                                    /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                                                                    {types: ['geocode']});

                                                            // When the user selects an address from the dropdown, populate the address
                                                            // fields in the form.
                                                            autocomplete.addListener('place_changed', fillInAddress);
                                                        }

                                                        //This function will get the marker's current location and then add the lat/long
                                                        //values to our textfields so that we can save the location.
                                                        function markerLocation() {
                                                            //Get location.
                                                            var currentLocation = marker.getPosition();
                                                            var geocoder = new google.maps.Geocoder;
                                                            //Add lat and lng values to a field that we can save.
                                                            document.getElementById('latitude').value = currentLocation.lat(); //latitude
                                                            document.getElementById('longitude').value = currentLocation.lng(); //longitude
                                                            var latlng = {lat: currentLocation.lat(), lng: currentLocation.lng()};
                                                            geocoder.geocode({'location': latlng}, function (results, status) {
                                                                if (status === 'OK') {
                                                                    if (results[1]) {
                                                                        for (var component in componentForm) {
                                                                            document.getElementById(component).value = '';
                                                                            document.getElementById(component).disabled = false;
                                                                        }
                                                                        //console.log( JSON.stringify(results) );
                                                                        // Get each component of the address from the place details
                                                                        // and fill the corresponding field on the form.
                                                                        for (var i = 0; i < results[0].address_components.length; i++) {
                                                                            var addressType = results[0].address_components[i].types[0];
                                                                            if (componentForm[addressType]) {
                                                                                var val = results[0].address_components[i][componentForm[addressType]];
                                                                                document.getElementById(addressType).value = val;
                                                                            }
                                                                        }
                                                                    } else {
                                                                        window.alert('No results found');
                                                                    }
                                                                } else {
                                                                    window.alert('Geocoder failed due to: ' + status);
                                                                }
                                                            });
                                                        }



                                                        function fillInAddress() {
                                                            // Get the place details from the autocomplete object.
                                                            var place = autocomplete.getPlace();

                                                            for (var component in componentForm) {
                                                                document.getElementById(component).value = '';
                                                                document.getElementById(component).disabled = false;
                                                            }

                                                            // Get each component of the address from the place details
                                                            // and fill the corresponding field on the form.
                                                            for (var i = 0; i < place.address_components.length; i++) {
                                                                var addressType = place.address_components[i].types[0];
                                                                if (componentForm[addressType]) {
                                                                    var val = place.address_components[i][componentForm[addressType]];
                                                                    document.getElementById(addressType).value = val;
                                                                }
                                                            }
                                                            var lat = place.geometry.location.lat();
                                                            var lng = place.geometry.location.lng();
                                                            document.getElementById("latitude").value = place.geometry.location.lat();
                                                            document.getElementById("longitude").value = place.geometry.location.lng();
                                                            data = {lat: lat, lng: lng};
                                                            var map = new google.maps.Map(document.getElementById('dealer_map'), {
                                                                zoom: 10,
                                                                center: data
                                                            });
                                                            var marker = new google.maps.Marker({
                                                                position: data,
                                                                map: map
                                                            });
                                                            //Listen for any clicks on the map.
                                                            google.maps.event.addListener(map, 'click', function (event) {
                                                                //Get the location that the user clicked.
                                                                var clickedLocation = event.latLng;
                                                                //If the marker hasn't been added.
                                                                if (marker === false) {
                                                                    //Create the marker.
                                                                    marker = new google.maps.Marker({
                                                                        position: clickedLocation,
                                                                        map: map,
                                                                        draggable: true //make it draggable
                                                                    });
                                                                    //Listen for drag events!
                                                                    google.maps.event.addListener(marker, 'dragend', function (event) {
                                                                        markerLocation();
                                                                    });
                                                                } else {
                                                                    //Marker has already been added, so just change its location.
                                                                    marker.setPosition(clickedLocation);
                                                                }
                                                                //Get the marker's location.
                                                                markerLocationNew(marker);
                                                            });


                                                        }
                                                        function markerLocationNew(marker) {
                                                            //Get location.
                                                            var currentLocation = marker.getPosition();
                                                            var geocoder = new google.maps.Geocoder;
                                                            //Add lat and lng values to a field that we can save.
                                                            document.getElementById('latitude').value = currentLocation.lat(); //latitude
                                                            document.getElementById('longitude').value = currentLocation.lng(); //longitude
                                                            var latlng = {lat: currentLocation.lat(), lng: currentLocation.lng()};
                                                            geocoder.geocode({'location': latlng}, function (results, status) {
                                                                if (status === 'OK') {
                                                                    if (results[1]) {
                                                                        for (var component in componentForm) {
                                                                            document.getElementById(component).value = '';
                                                                            document.getElementById(component).disabled = false;
                                                                        }
                                                                        //console.log( JSON.stringify(results) );
                                                                        // Get each component of the address from the place details
                                                                        // and fill the corresponding field on the form.
                                                                        for (var i = 0; i < results[0].address_components.length; i++) {
                                                                            var addressType = results[0].address_components[i].types[0];
                                                                            if (componentForm[addressType]) {
                                                                                var val = results[0].address_components[i][componentForm[addressType]];
                                                                                document.getElementById(addressType).value = val;
                                                                            }
                                                                        }
                                                                    } else {
                                                                        window.alert('No results found');
                                                                    }
                                                                } else {
                                                                    window.alert('Geocoder failed due to: ' + status);
                                                                }
                                                            });
                                                        }
                                                        // Bias the autocomplete object to the user's geographical location,
                                                        // as supplied by the browser's 'navigator.geolocation' object.
                                                        function geolocate() {
                                                            if (navigator.geolocation) {
                                                                navigator.geolocation.getCurrentPosition(function (position) {
                                                                    var geolocation = {
                                                                        lat: position.coords.latitude,
                                                                        lng: position.coords.longitude
                                                                    };
                                                                    var circle = new google.maps.Circle({
                                                                        center: geolocation,
                                                                        radius: position.coords.accuracy
                                                                    });
                                                                    autocomplete.setBounds(circle.getBounds());
                                                                });
                                                            }
                                                        }

                                                        document.getElementById("map_error").onclick = function () {
                                                            setTimeout(function () {
                                                                google.maps.event.trigger(map, "resize");
                                                            }, 1000);
                                                        };
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4eXifX2tOU10k77cLPepLiLYv7jvvGDY&libraries=places&callback=initAutocomplete" async defer></script> 
    
    <script type="text/javascript">
    $('#upload_profile_photo').click(function (e) {
                                                        e.preventDefault();
                                                        var fileUpload = document.getElementById("uploaded_file");
                                                        if (fileUpload.value != null) {
                                                            var uploadFile = new FormData();
                                                            var files = $("#uploaded_file").get(0).files;

                                                            if (files.length > 0) {
                                                                $('#upload_profile_photo').val("Processing...");
                                                                uploadFile.append("csv", files[0]);
                                                                $.ajax({
                                                                    url: "csvuploadfile",
                                                                    contentType: false,
                                                                    processData: false,
                                                                    data: uploadFile,
                                                                    type: 'POST',
                                                                    success: function (data) {
                                                                        var obj = jQuery.parseJSON(data);
//                                                                        alert(obj.success);
//                                                                        console.log(data);
                                                                        $('#upload_profile_photo').val("Upload CSV");
                                                                        $("#uploaded_file").val("");
                                                                        if (obj.error)
                                                                        {
                                                                            notify('Error', obj.error);
                                                                        }
                                                                        if (obj.success || obj.unsuccess)
                                                                        {
                                                                            notify('success', "Inserted rows :" + obj.success);
                                                                            notify('Error', "Not inserted rows :" + obj.unsuccess);
                                                                        }
                                                                    }
                                                                });
                                                            } else {
                                                                notify('error',"Choose CSV File");
                                                            }
                                                        } else {
                                                            notify('error',"Choose CSV File");
                                                        }

                                                    });
    

        // Validate form
       /* $('#addShopForm').validate({
            ignore: [],
            rules: {
                name: {
                    required: true
                },
                address: {
                    required: true
                },
                latitude: {
                    required: true
                },
                longitude: {
                    required: true
                },
                last_evaluation: {
                    required: true,
                    date : true
                },
                shop_type_id: {
                    required: true
                },
                acc_no: {
                    required: true
                },
                email: {
                    required: true
                }
            },
            submitHandler: function(form) {

                // Disable submit
                $(form).find('button[type="submit"]').text('Sending...').prop('disabled', true);

                // Call ajax
                ajaxResponse = ajaxCall($(form).attr('action'), "POST", $(form).serialize());
//console.log(ajaxResponse);
                if(typeof ajaxResponse == 'undefined')
                    return;
                
                if(ajaxResponse.success == false) {

                    if(ajaxResponse.result.validations != 'undefined') {

                        $.each(ajaxResponse.result.validations, function(key, value) {

                            $(form).find('button[name="'+key+'"], select[name="'+key+'"]').after(value);
                        });
                    }

                    var errorMessages = [];
                    $.isEmptyObject(ajaxResponse.errors) || $.each(ajaxResponse.errors, function(e, obj) {
                        var name = new Array();
                        names = '';
                        if(obj.location != undefined)
                        {
                            loc = String(obj.location);
                            name = loc.split(' -> ');
                            names = '<br/> Location => ' + name[1];
                        }

                        //store all errors server msg
                        errorMessages.push(obj.code + ' => ' + obj.message + names);
                    });

                    $(form).find('button[type="submit"]').text('Submit').prop('disabled', false);

                    notify('failure', errorMessages.join('<br/>'));
                }

                if(ajaxResponse.success == true) {

                     notify('success', ajaxResponse.result.message);

                    // Enable submit
                    $(form).find('button[type="submit"]').text('Done!').prop('disabled', false), setTimeout(function(){
                        $(form).find('button[type="submit"]').text('Add New Shop');

                        // redirect to index
                        location.href = "<?php echo base_url(); ?>index.php/shops/index";
                    }, 1000);
                }
            }
        });*/
        
        $("#addShopForm").validate({
        ignore: [],      
        rules: {
                name: {
                    required: true
                },
                address: {
                    required: true
                },
                latitude: {
                    required: true
                },
                longitude: {
                    required: true
                },
                last_evaluation: {
                    required: true,
                    //date : true
                },
                shop_type_id: {
                    required: true
                },
                acc_no: {
                    required: true
                },
                email: {
                    required: true
                },
                phone: {
                    required: true
                }
          
        },
        messages : {
          "name"                   : "Required",
          "address"                : "Required",
          "latitude"               : "Required",
          "last_evaluation"        : "Required",
          "shop_type_id"           : "Required",
          "acc_no"                 : "Required",
          "email"                  : "Required",
          "phone"                  : "Required",
        }, 
        errorPlacement: function(error, element) 
        {
          error.insertBefore(element);
        }    
      });
      
      $('#add_shop').click(function(){ 
      var validator = $("#addShopForm").validate();
        validator.form();

        if(validator.form() == true){
            var data = new FormData($('#addShopForm')[0]);
            $.ajax({                
              url: "<?php echo site_url('shops/add');?>",
              type: "POST",
              dataType: "html",
              mimeType: "multipart/form-data",
              data: data,
              contentType: false,
              cache: false,
              processData:false,          
              success: function(html){
                    //alert("success");
                   // console.log(html);
                    window.location.href = "<?php echo base_url(); ?>index.php/shops/index";
                }
         });
        }
      });

        // On change of file
        $('input:file').change(function () {

            // Create Uploader
            createUploader($(this).closest('form'))
        });

        // createUploader
        function createUploader(obj) {

            // Form Data
            objForm = new FormData();

            // Set
            objForm.append('file', obj.find('input[name="file"]')[0].files[0]);

            // Ajax Call
            $.ajax({
                url: "<?php echo $this->config->item('rest_media_url'); ?>",
                headers: {
                    'P-Auth-Token': "<?php echo $this->session->userdata('auth_token') ?>"
                },
                method: 'POST',
                dataType: 'json',
                data: objForm,
                processData: false,
                contentType: false,
                success: function(ajaxResult) {

                    if(ajaxResult.success == true)
                        obj.find('input[name="image"]').val(ajaxResult.result.file.result.key);
                }
            });
        }
    </script>
    <script type="text/javascript">

        $(document).on('change', 'select[name="filter_shop_type_id"], select[name="filter_status"]', function() {

            // Get shops list
            ajaxResult = get_shop_list("<?php echo base_url($this->config->item('shops_ajax_get_shops_by_search_uri')); ?>");

            if(typeof ajaxResult == 'undefined')
                return;

            if(ajaxResult.result.success == true) {

                $('.table-responsive').html(ajaxResult.result.view);
            }
        });

        // Get shop list
        function get_shop_list(url) {

            // Shop type id
            shop_type_id = $('select[name="filter_shop_type_id"]').val();

            // Status
            status = $('select[name="filter_status"]').val();

            // Call ajax
            return ajaxCall(url, "GET", {shop_type_id: shop_type_id, status: status});
        }
    </script>
    <script type="text/javascript">

        // Click on ajax page link
        $(document).on('click', '.ajax-paginate a', function(e) {

            e.preventDefault();

            // Get shops list
            ajaxResult = ajaxCall($(this).attr('href'), "GET");

            if(typeof ajaxResult == 'undefined')
                return;

            if(ajaxResult.result.success == true) {

                $('.table-responsive').html(ajaxResult.result.view);
            }
        });
    </script>
    
    <script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function(){
    $('#dealerfilter_result').DataTable();
});

</script>

</body>