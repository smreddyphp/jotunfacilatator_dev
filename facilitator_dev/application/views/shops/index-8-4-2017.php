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
    .col-xs-6 button.btn.btn-success {
            margin-top: 15px;
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
        <!-- End: Topbar -->
        <!-- Begin: Content -->
        <section id="content" class="table-layout">
            <!-- begin: .tray-center -->
            <div class="tray tray-center">
                <!-- create new order panel -->
                <div class="panel mb25 mt5">
                    <div class="panel-heading">
                        <span class="panel-title hidden-xs"> Add New Shop Details</span>
                        <!-- <ul class="nav panel-tabs-border panel-tabs">
                           <li class="active">
                              <a href="#tab1_1" data-toggle="tab">Add Shop </a>
                          <p><a href="http://localhost/facilitator/roles/add" class="btn btn-success">Add New Shop</a></p>

                           </li>
                        </ul> -->
                    </div>
                    <div class="panel-body p20 pb10">
                        <div class="tab-content pn br-n admin-form">
                            <div id="tab1_1" class="tab-pane active">
                                <div class="section row mbn">
                                    <?php echo form_open_multipart(base_url($this->config->item('shops_add_uri')), array('id' => 'addShopForm')); ?>
                                    <div class="col-md-9 pl15">
                                        <div class="section row mb15">
                                            <div class="col-xs-6">
                                                <label for="name1" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'name', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'shop name', 'value' => set_value('name'))); ?>
                                                    <label for="name1" class="field-icon">
                                                        <i class="fa fa-building-o" aria-hidden="true"></i>
                                                    </label>
                                                </label>
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="name2" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'address', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Area/City', 'value' => set_value('address'))); ?>
                                                    <label for="name2" class="field-icon">
                                                        <i class="fa fa-globe" aria-hidden="true"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="section row mb15">
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
                                        </div>
                                        <div class="section row mb15">
                                            <div class="col-xs-6">
                                                <label for="text" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'last_evaluation', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Last Evaluation', 'value' => set_value('last_evaluation'))); ?>
                                                    <label for="name2" class="field-icon">
                                                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                                                    </label>
                                                </label>
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="text" class="field select">
                                                    <?php echo form_dropdown('shop_type_id', array('' => 'Select Shop Type') + $arrShopTypes, $this->input->post('shop_type_id'),'' ,'class="event-name gui-input br-light light'); ?>
                                                    <label for="name2" class="field-icon">
                                                        <i class="arrow double"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="section row mb15">
                                            <div class="col-xs-6">
                                                <label for="text" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'acc_no', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Account Number', 'value' => set_value('acc_no'))); ?>
                                                    <label for="name2" class="field-icon">
                                                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    </label>
                                                </label>
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="email" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'email', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Eamil ID', 'value' => set_value('email'))); ?>
                                                    <label for="password2" class="field-icon">
                                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                                    </label>
                                                </label>
                                            </div>
                                            <div class="col-xs-6">
                                             <span>
                                                <?php echo form_button(array('type' => 'submit', 'content' => 'Add New Shop', 'class' => 'btn btn-success')); ?>
                                             </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="hidden" name="image" value="" />
                                        <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
                                            <div class="fileupload-preview thumbnail mb15 mt5">
                                                <img src="<?php echo base_url(); ?>assets/img/logos/download.svg" alt="holder">
                                            </div>
                                             <span class="button btn-system btn-file btn-block ph5">
                                                 <span class="fileupload-new">Image</span>
                                                 <?php echo form_upload(array('name' => 'file', 'class' => 'fileupload-new')); ?>
                                             </span>
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<input type="hidden" value="shops" id="table_name">
                <!-- recent orders table -->
                <div class="panel">
                    <div class="panel-menu admin-form theme-primary">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-6 has-feedback">
                                    <?php echo form_input(array('name' => 'search', 'class' => 'form-control', 'placeholder' => 'Search here')); ?>                                   
                                </div>
 <div class="col-md-6">
                  <label class="field select">
                    <select id="filter-group" name="filter-group"  onchange="callaction();">
                      <option>Action</option>
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                      <option value="2">Delete</option>                      
                    </select>
                    <i class="arrow double"></i>
                  </label>
                </div>
                            </div>
                            <!-- <div class="col-md-4">
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
                                     <!--   <option value="4">Online</option>
                                        <option value="5">Offline</option>
                                  </select>
                                  <i class="arrow double"></i>
                               </label>
                            </div> -->
                        </div>
                    </div>
                    <div class="panel-body pn">
                        <div class="table-responsive">
                            <!-- Table -->
                            <?php $this->load->view($this->config->item('shops_table_view')); ?>
                            <!-- /Table -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: .tray-center -->
        </section>
    </section>
    <?php $this->load->view($this->config->item('footer_view')); ?>
    <?php $this->load->view($this->config->item('scripts_view')); ?>
    <script src="<?php echo base_url($this->config->item('js_validate_min')); ?>" type='text/javascript'></script>
    <script type="text/javascript">

        // Validate form
        $('#addShopForm').validate({
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
                    required: true
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
                        location.href = "<?php echo base_url($this->config->item('shops_index_uri')); ?>";
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
    <script type="text/javascript">

        $('input[name="search"]').on('keyup',function() {

            var search = $(this).val();

            if(search.length > 2) {

                get_shop_list(search, "<?php echo base_url($this->config->item('shops_ajax_get_shops_by_search_uri')); ?>");
            } else {

                get_shop_list('', "<?php echo base_url($this->config->item('shops_ajax_get_shops_by_search_uri')); ?>");
            }
        });

        // Get shop list
        function get_shop_list(search, link) {

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

                get_shop_list(search, $(this).attr('href'));
            } else {

                get_shop_list('', $(this).attr('href'));
            }

            return;
        });
    </script>
</body>