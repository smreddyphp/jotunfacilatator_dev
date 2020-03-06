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
        form#editShopForm label.field-icon {
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
                        <span class="panel-title hidden-xs">New Shop</span>
                    </div>
                    <div class="panel-body p20 pb10">
                        <div class="admin-form">
                            <div class="section row mbn">
                                <div class="col-md-10 col-sm-10 pl15">
                                    <div class="section row mb15">
                                        <?php echo form_open($this->uri->uri_string(), array('id' => 'editShopForm')); ?>
                                        <div class="form-group">
                                            <label for="name" class="col-md-4 col-sm-4 col-xs-12">Name</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <label for="name" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'name', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter name here', 'value' => set_value('name', $objShop->name))); ?>
                                                    <label for="name" class="field-icon">
                                                        <i class="fa fa-list-ol"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="code" class="col-md-4 col-sm-4 col-xs-12">Area/City</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <label for="code" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'address', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter code here', 'value' => set_value('address', $objShop->address))); ?>
                                                    <label for="code" class="field-icon">
                                                        <i class="fa fa-list-ol"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="code" class="col-md-4 col-sm-4 col-xs-12">Latitude</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
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
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <label for="code" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'longitude', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter longitude here', 'value' => set_value('longitude', $objShop->longitude))); ?>
                                                    <label for="code" class="field-icon">
                                                        <i class="fa fa-list-ol"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="col-md-4 col-sm-4 col-xs-12">Last Evaluation</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <label for="description" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'last_evaluation', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter last evaluation here', 'value' => set_value('description', $objShop->last_evaluation))); ?>
                                                    <label for="description" class="field-icon">
                                                        <i class="fa fa-list-ol"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name1" class="col-md-4 col-sm-4 col-xs-12">Shop Type</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <label for="status" class="field select">
                                                    <?php echo form_dropdown('shop_type_id', array('' => 'Select Shop Type') + $arrShopTypes, (isset($objShop->shop_type) && !empty($objShop->shop_type)) ? $objShop->shop_type->id : '', 'data-placeholder="Choose Shop Type" class="select-search" tabindex="2"'); ?>
                                                    <i class="arrow double"></i>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="col-md-4 col-sm-4 col-xs-12">Account Num</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <label for="description" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'acc_no', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter account num here', 'value' => set_value('description', $objShop->acc_no))); ?>
                                                    <label for="description" class="field-icon">
                                                        <i class="fa fa-list-ol"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="col-md-4 col-sm-4 col-xs-12">Email</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <label for="description" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'email', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter email here', 'value' => set_value('description', $objShop->email))); ?>
                                                    <label for="description" class="field-icon">
                                                        <i class="fa fa-list-ol"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="status" class="col-md-4 col-sm-4 col-xs-12">Status</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <label for="status" class="field select">
                                                    <?php echo form_dropdown('status', $this->config->item('shops_status'), set_value('status', $objShop->status), 'class="select-search"'); ?>
                                                    <i class="arrow double"></i>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-md-offset-4 col-sm-offset-4">
                                            <input type="hidden" name="image" value="" />
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
</body>