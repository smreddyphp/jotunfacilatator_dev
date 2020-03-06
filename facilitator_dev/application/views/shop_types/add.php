<body class="dashboard-page sb-l-o sb-r-c">
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
                        <li class="crumb-active">Add New ShopType</li>
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
                        <span class="panel-title hidden-xs">New ShopType</span>
                    </div>
                    <div class="panel-body p20 pb10">
                        <div class="admin-form">
                            <div class="section row mbn">
                                <div class="col-md-12 pl15">
                                    <div class="section row mb15">
                                        <?php echo form_open($this->uri->uri_string(), array('id' => 'addShopTypeForm')); ?>
                                        <div class="form-group">
                                            <label for="name" class="col-md-4 col-sm-4 col-xs-12">Name</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <label for="name" class="field prepend-icon">
                                                    <?php echo form_input(array('name' => 'name', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Enter name here', 'value' => set_value('name'))); ?>
                                                    <label for="name" class="field-icon">
                                                        <i class="fa fa-list-ol"></i>
                                                    </label>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="status" class="col-md-4 col-sm-4 col-xs-12">Status</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <label for="status" class="field select">
                                                    <?php echo form_dropdown('status', $this->config->item('shop_types_status'), $this->input->post('status')); ?>
                                                    <i class="arrow double"></i>
                                                </label>
                                            </div>
                                        </div>

                                        <div class=" form-group text-right">
                                            <?php echo form_button(array('type' => 'submit', 'content' => 'Create New ShopType', 'class' => 'btn btn-success')); ?>
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
        $('#addShopTypeForm').validate({
            rules: {
                name: {
                    required: true
                },
                status: {
                    required: true,
                    number: true
                }
            },
            submitHandler: function(form) {

                $(form).find('input[type="submit"]').val('Sending...').prop('disabled', true);

                // Call ajax
                ajaxResponse = ajaxCall($(form).attr('action'), "POST", $(form).serialize());

                if(typeof ajaxResponse == 'undefined')
                    return;

                if(ajaxResponse.success == false) {

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

                    $(form).find('input[type="submit"]').val('Submit').prop('disabled', false);
                }

                if(ajaxResponse.success == true) {

                    // Reset fields
                    reset('form');

                    // Enable submit
                    $(form).find('input[type="submit"]').val('Done!').prop('disabled', false), setTimeout(function(){
                        $(form).find('input[type="submit"]').val('Submit');

                        // redirect to index
                        location.href = "<?php echo base_url($this->config->item('shop_types_index_uri')); ?>";
                    }, 2000);
                }
            }
        });
    </script>
</body>