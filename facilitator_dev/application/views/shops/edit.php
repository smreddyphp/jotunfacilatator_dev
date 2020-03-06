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
    padding-left: 10px;
}
label.field-icon {
    display: none;
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
        label.col-md-4.col-sm-4.col-xs-12 {
            text-align: right;
            padding-top: 10px;
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
                        <li class="crumb-active">Edit Shop</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Begin: Content -->
        <section id="content" class="table-layout animated fadeIn">
            <!-- begin: .tray-center -->
            <div class="tray tray-center">
                <!-- create new order panel -->
                <div class="panel mb25 mt5">
                    <div class="panel-heading">
                        <span class="panel-title hidden-xs">Edit Shop</span>
                    </div>
                    <div class="panel-body p20 pb10">
                        <div class="admin-form">
                            <div class="section row mbn">
                                <div class="col-md-12 pl15">
                                    <div class="section row mb15">
                                    <!-----<?php echo form_open($this->uri->uri_string(), array('id' => 'editShopForm')); ?>-------->
                <form method="POST" action="<?php echo base_url(); ?>shops/edit_shop/<?php echo $objShop->id; ?>" enctype="multipart/form-data" >
                                        <div class="form-group">
                                            <label for="name" class="col-md-4 col-sm-4 col-xs-12">Name</label>
                                            <div class="col-md-6 col-sm-8 col-xs-12">
                                                <label for="name" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'name', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter name here', 'value' => set_value('name', $objShop->name))); ?>
                                                    <label for="name" class="field-icon">
                                                        <!--<i class="fa fa-list-ol"></i>-->
                                                    </label>
                                                </label>
                                            </div>
                                        </div>

                                       <div class="form-group">
                                            <label for="code" class="col-md-4 col-sm-4 col-xs-12">Area/City</label>
                                            <div class="col-md-6 col-sm-8 col-xs-12">
                                                <label for="code" class="field select">
                                                <?php if(@$zone_id){ ?>
                                                    <select class="event-name gui-input br-light light" name="address">
                                                        <option value="<?=$zone_id?>"><?=$zone?></option>
                                                    </select>
                                                <?php }else{ ?>
                                                    <select class="event-name gui-input br-light light" name="address">
                                                        <option value="">Select Zone</option>
                                                        <option <?php if($objShop->zone == 1){ ?> selected="selected" <?php } ?> value="1">Riyadh</option>
                                                        <option <?php if($objShop->zone == 2){ ?> selected="selected" <?php } ?> value="2">Khamis</option>
                                                        <option <?php if($objShop->zone == 3){ ?> selected="selected" <?php } ?> value="3">Jeddah</option>
                                                        <option <?php if($objShop->zone == 4){ ?> selected="selected" <?php } ?> value="4">Dammam</option>
                                                        <option <?php if($objShop->zone == 5){ ?> selected="selected" <?php } ?> value="5">Yanbu</option>
                                                    </select>
                                                <?php } ?>
                                                    <label for="name2" class="field-icon">
                                                           <i class="arrow double"></i>
                                                     </label>
<!-----------<?php echo form_input(array('name' => 'address', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter code here', 'value' => set_value('address', $objShop->address))); ?>-------->
                                                   
                                                </label>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="description" class="col-md-4 col-sm-4 col-xs-12">Last Evaluation</label>
                                            <div class="col-md-6 col-sm-8 col-xs-12">
                                                <label for="description" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'last_evaluation', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter last evaluation here', 'value' => set_value('description', $objShop->last_evaluation))); ?>
                                                    <label for="description" class="field-icon">
                                                        <!--<i class="fa fa-list-ol"></i>-->
                                                    </label>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name1" class="col-md-4 col-sm-4 col-xs-12">Shop Type</label>
                                            <div class="col-md-6 col-sm-8 col-xs-12">
                                                <label for="status" class="field select">
                                                    <select name="shop_type_id" class="select-search">
                                                        <option value="">Shop Type</option>
                                                        <option <?php if($objShop->shop_type_id == 1){?>selected="selected"<?php } ?> value="1">Type1</option>
                                                        <option <?php if($objShop->shop_type_id == 2){?>selected="selected"<?php } ?> value="2">Type2</option>
                                                        <option <?php if($objShop->shop_type_id == 3){?>selected="selected"<?php } ?>  value="3">Type3</option>
                                                    </select>
                                                   <!------ <?php echo form_dropdown('shop_type_id', array('' => 'Select Shop Type') + $arrShopTypes, (isset($objShop->shop_type) && !empty($objShop->shop_type)) ? $objShop->shop_type->id : '', 'data-placeholder="Choose Shop Type" class="select-search" tabindex="2"'); ?>---------->
                                                    <i class="arrow double"></i>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="col-md-4 col-sm-4 col-xs-12">Account Num</label>
                                            <div class="col-md-6 col-sm-8 col-xs-12">
                                                <label for="description" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'acc_no', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter account num here', 'value' => set_value('description', $objShop->acc_no))); ?>
                                                    <label for="description" class="field-icon">
                                                        <!--<i class="fa fa-list-ol"></i>-->
                                                    </label>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="col-md-4 col-sm-4 col-xs-12">Email</label>
                                            <div class="col-md-6 col-sm-8 col-xs-12">
                                                <label for="description" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'email', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter email here', 'value' => set_value('description', $objShop->email))); ?>
                                                    <label for="description" class="field-icon">
                                                        <!--<i class="fa fa-list-ol"></i>-->
                                                    </label>
                                                </label>
                                            </div>
                                        </div>

                                        <!--<div class="form-group">-->
                                        <!--    <label for="description" class="col-md-4 col-sm-4 col-xs-12">Dealer </label>-->
                                        <!--    <div class="col-md-6 col-sm-8 col-xs-12">-->
                                        <!--        <label for="description" class="field prepend-icon">-->
                                        <!--            <?php
                                                    // echo form_input(array('name' => 'email', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter email here', 'value' => set_value('description', $objShop->email))); 

                                                //echo form_dropdown('dealer_id',$dealers, $objShop->dealer_id ,array('class'=>'event-name gui-input br-light light')); -->
                                               ?>-->
                                        <!--            <label for="description" class="field-icon">-->
                                                        <!--<i class="fa fa-list-ol"></i>-->
                                        <!--            </label>-->
                                        <!--        </label>-->
                                        <!--    </div>-->
                                        <!--</div>-->


                                        <div class="form-group">
                                            <label for="description" class="col-md-4 col-sm-4 col-xs-12">Phone</label>
                                            <div class="col-md-6 col-sm-8 col-xs-12">
                                                <label for="description" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'phone', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter Phone Number', 'value' => set_value('description', $objShop->phone))); ?>
                                                    <label for="phone" class="field-icon">
                                                        <!--<i class="fa fa-list-ol"></i>-->
                                                    </label>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="status" class="col-md-4 col-sm-4 col-xs-12">Status</label>
                                            <div class="col-md-6 col-sm-8 col-xs-12">
                                                <label for="status" class="field select">
                                                    <?php echo form_dropdown('status', $this->config->item('shops_status'), set_value('status', $objShop->status), 'class="select-search"'); ?>
                                                    <i class="arrow double"></i>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="image" value="" />
                                            <label for="file" class="col-md-4 col-sm-4 col-xs-12">Image</label>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
                                                    <div class="fileupload-preview thumbnail mb15">
                                                        <img src="<?php echo base_url(); ?>assets/img/logos/download.svg" alt="holder">
                                                    </div>
                                                    <span class="button btn-system btn-file btn-block ph5">
                                                        <span class="fileupload-new">Image</span>
                                                        <?php echo form_upload(array('name' => 'file', 'class' => 'fileupload-new')); ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--                                        <div class="form-group">
                                            <label for="code" class="col-md-4 col-sm-4 col-xs-12">Latitude</label>
                                            <div class="col-md-6 col-sm-8 col-xs-12">
                                                <label for="code" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'latitude', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter latitude here', 'value' => set_value('latitude', $objShop->latitude))); ?>
                                                    <label for="code" class="field-icon">
                                                        <i class="fa fa-list-ol"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="code" class="col-md-4 col-sm-4 col-xs-12">Longitude</label>
                                            <div class="col-md-6 col-sm-8 col-xs-12">
                                                <label for="code" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'longitude', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter longitude here', 'value' => set_value('longitude', $objShop->longitude))); ?>
                                                    <label for="code" class="field-icon">
                                                        <i class="fa fa-list-ol"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>-->
<div class="form-group">
 <label for="code" class="col-md-4 col-sm-4 col-xs-12">Latitude</label>
                                        <div class="col-md-6 col-sm-8 col-xs-12">
                                                <label for="latitude" class="field prepend-icon">
                                                    <input type="text" name="latitude" id="latitude" class="event-name gui-input br-light light" placeholder="latitude" value="<?=set_value('latitude', $objShop->latitude)?>">
                                                    <label for="latitude" class="field-icon">
                                                        <i class="fa fa-map-marker"></i>
                                                    </label>
                                                </label>
                                            </div>
                                            </div>
                                            </div>
                                         <div class="form-group">   
                                            <label for="code" class="col-md-4 col-sm-4 col-xs-12">Longitude</label>
                                            <div class="col-md-6 col-sm-8 col-xs-12">
                                                <label for="longitude" class="field prepend-icon">
                                                    <input type="text" name="longitude" id="longitude" class="event-name gui-input br-light light" placeholder="longitude" value="<?=set_value('longitude', $objShop->longitude)?>">
                                                    <label for="longitude" class="field-icon">
                                                        <i class="fa fa-map-marker"></i>
                                                    </label>
                                                </label>
                                            </div>
</div>
                <!--<div class="section row mb10">-->
                <!--                                <div class="col-md-4 mb10">-->
                                                    
                <!--                                    <label class="modal_label mb10" for="sales_target">Sales Target :</label>-->
                <!--                                    <label for="sales_target" class="field prepend-icon">-->
                <!--                                        <input type="text" name="sales_target" id="sales_target" class="event-name gui-input br-light light" placeholder="Sales Target"  value="<?=set_value('sales_target', $objShop->sales_target)?>">-->
                <!--                                        <label for="sales_target" class="field-icon">-->
                <!--                                            <i class="fa fa-bullhorn"></i>-->
                <!--                                        </label>-->
                <!--                                    </label>-->
                <!--                                </div>-->
                <!--                                <div class="col-md-4 mb10">-->
                <!--                                    <label class="modal_label mb10" for="purchase_target">Purchase Target :</label>-->
                <!--                                    <label for="purchase_target" class="field prepend-icon">-->
                <!--                                        <input type="text" name="purchase_target" id="purchase_target" class="event-name gui-input br-light light" placeholder="Purchase Target"   value="<?=set_value('purchase_target', $objShop->purchase_target)?>">-->
                <!--                                        <label for="purchase_target" class="field-icon">-->
                <!--                                            <i class="fa fa-shopping-cart"></i>-->
                <!--                                        </label>-->
                <!--                                    </label>-->
                <!--                                </div>-->

                <!--                                <div class="col-md-4 mb10">-->
                <!--                                    <label class="modal_label mb10" for="goods_target">Goods target :</label>-->
                <!--                                    <label for="goods_target" class="field prepend-icon">-->
                <!--                                        <input type="text" name="goods_target" id="goods_target" class="event-name gui-input br-light light" placeholder="Goods Target"   value="<?=set_value('goods_target', $objShop->goods_target)?>">-->
                <!--                                        <label for="goods_target" class="field-icon">-->
                <!--                                            <i class="fa fa-archive"></i>-->
                <!--                                        </label>-->
                <!--                                    </label>-->
                <!--                                </div>-->
                                             
                <!--</div>-->
<div class="form-group">
                                            <div class="col-md-12  mt15 mb15" id="locationField">
                                                <label class="modal_label mb10" for="autocomplete">Search address* :</label>
                                                <label for="autocomplete" class="field prepend-icon">
                                                    <input id="autocomplete" placeholder="Search your address" name="address_search" class="event-name gui-input br-light light" onFocus="geolocate()" type="text" value="<?=set_value('address_search', $objShop->address_search)?>">
                                                    <label for="autocomplete" class="field-icon">
                                                        <i class="fa fa-map-marker"></i>
                                                    </label>
                                                </label>
                                            </div>
                                            <div class="section row mb10" id="address">
                                                <div class="col-md-4 mb10">
                                                    <label class="modal_label mb10" for="door_no">Door number :</label>
                                                    <label for="door_no" class="field prepend-icon">
                                                        <input type="text" name="door_no" id="door_no" class="event-name gui-input br-light light" placeholder="Door or plot no." value="<?=set_value('door_no', $objShop->door_number)?>">
                                                        <label for="door_no" class="field-icon">
                                                            <i class="fa fa-map-marker"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                                <div class="col-md-4 mb10">
                                                    <label class="modal_label mb10" for="street_number">Street_number :</label>
                                                    <label for="street_number" class="field prepend-icon">
                                                        <input type="text" name="street_number" id="street_number" class="event-name gui-input br-light light" placeholder="Street number" value="<?=set_value('street_number', $objShop->street_number)?>">
                                                        <label for="street_number" class="field-icon">
                                                            <i class="fa fa-map-marker"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                                <div class="col-md-4 mb10">
                                                    <label class="modal_label mb10" for="route">Colony or Street :</label>
                                                    <label for="route" class="field prepend-icon">
                                                        <input type="text" name="route" id="route" class="event-name gui-input br-light light" placeholder="Colony or street" value="<?=set_value('route', $objShop->colony)?>">
                                                        <label for="route" class="field-icon">
                                                            <i class="fa fa-map-marker"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                                <div class="col-md-4 mb10">
                                                    <label class="modal_label mb10" for="locality">District* :</label>
                                                    <label for="locality" class="field prepend-icon">
                                                        <input type="text" name="locality" id="locality" class="event-name gui-input br-light light" placeholder="District" value="<?=set_value('locality', $objShop->distric)?>">
                                                        <label for="locality" class="field-icon">
                                                            <i class="fa fa-map-marker"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                                <div class="col-md-4 mb10">
                                                    <label class="modal_label mb10" for="administrative_area_level_1">Province* :</label>
                                                    <label for="administrative_area_level_1" class="field prepend-icon">
                                                        <input type="text" name="province" id="administrative_area_level_1" class="event-name gui-input br-light light" placeholder="State or Province" value="<?=set_value('province', $objShop->province)?>">
                                                        <label for="administrative_area_level_1" class="field-icon">
                                                            <i class="fa fa-map-marker"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                                <div class="col-md-4 mb10">
                                                    <label class="modal_label mb10" for="postal_code">Postal Code :</label>
                                                    <label for="postal_code" class="field prepend-icon">
                                                        <input type="text" name="postal_code" id="postal_code" class="event-name gui-input br-light light" placeholder="postal_code" value="<?=set_value('postal_code', $objShop->postal_code)?>">
                                                        <label for="postal_code" class="field-icon">
                                                            <i class="fa fa-map-marker"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                                <div class="col-md-4 mb10">
                                                    <label class="modal_label mb10" for="country">Country* :</label>
                                                    <label for="country" class="field prepend-icon">
                                                        <input type="text" name="country" id="country" class="event-name gui-input br-light light" placeholder="country" value="<?=set_value('country', $objShop->country)?>">
                                                        <label for="country" class="field-icon">
                                                            <i class="fa fa-map-marker"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                            </div>
    <div id="dealer_map" style="height:300px;border: 2px solid; margin-left: 15px;">
        
    </div>
</div>
                                        <div class=" form-group text-right">
                                            <?php echo form_button(array('type' => 'submit', 'content' => 'Update Shop', 'class' => 'btn btn-success')); ?>
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
                                                        var map_lat='<?=$objShop->latitude?>';
                                                        var map_long='<?= $objShop->longitude?>';
                                                        function initAutocomplete() {
                                                            //The center location of our map.
                                                            var centerOfMap = new google.maps.LatLng(map_lat, map_long);

                                                            //Map options.
                                                            var options = {
                                                                center: centerOfMap, //Set center.
                                                                zoom: 10 //The zoom value.
                                                            };
                                                           
                                                            //Create the map object.
                                                            map = new google.maps.Map(document.getElementById('dealer_map'), options);
                                                                                     
                                                            marker = new google.maps.Marker({
                                                                        position: centerOfMap,
                                                                        map: map,
                                                                        draggable: true //make it draggable
                                                                    });              
                                                                    google.maps.event.addListener(marker, 'dragend', function (event) {
                                                                        markerLocation();
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

        // Validate form
        $('#editShopForm').validate({
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
console.log(ajaxResponse);
                if(typeof ajaxResponse == 'undefined')
                    return;

                if(ajaxResponse.success == false) {

                    if(ajaxResponse.result.validations != 'undefined') {

                        $.each(ajaxResponse.result.validations, function(key, value) {

                            $(form).find('button[name="'+key+'"], select[name="'+key+'"]').after(value);
                        });
                    }

                    var errorMessages = [];
                    $.isEmptyObject(ajaxResponse.result.errors) || $.each(ajaxResponse.result.errors, function(e, obj) {
                        var name = new Array();
                        names = '';
                        if(obj.field != undefined)
                        {
                            names = '<br/> Field => ' + obj.field;
                        }

                        //store all errors server msg
                        errorMessages.push(obj.code + ' => ' + obj.message + names);
                    });

                    $(form).find('button[type="submit"]').text('Update Shop').prop('disabled', false);

                    notify('failure', errorMessages.join('<br/>'));
                }

                if(ajaxResponse.success == true) {

                     notify('success', ajaxResponse.result.message);

                    // Enable submit
                    $(form).find('button[type="submit"]').text('Done!').prop('disabled', false), setTimeout(function(){
                        $(form).find('button[type="submit"]').text('Update Shop');

                        // redirect to index
                        location.href = "<?php echo base_url(); ?>index.php/shops/index";
                    }, 1000);
                }
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
</body>