<body class="external-page external-alt sb-l-c sb-r-c">
   <style>
    /*----------LOGIN-PAGE-CSS-------*/
       body.external-page.external-alt{
   
   background-image: url(<?php echo base_url('assets/img/login-bg.jpg');?>);
    background-repeat:no-repeat;
    position: relative;
    
} 
    .over-lay{
        
        background-color: #333;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        opacity: 0.6;
}
.admin-form .panel {
    margin-bottom: 20px;
    background-color: transparent;
    border: 1px solid #DDD;
}
.admin-form .panel-footer {
  
    background: transparent;
}.admin-form .field-label {
  
    color: #fff;
    font-size: 15px !important;
}
.admin-form .switch > label + span {
    color: #fff;
}
section.login-page .admin-form .btn-primary {
       background-color: #feb031;
    line-height: 36px;
    border-radius: 3px;
    margin-top: 6px;
    padding-left: 15px;
    padding-right: 15px;
    height: 36px;
}
  section.login-page .admin-form .btn-primary:hover {
    background-color: #feb031;
}
section.login-page .admin-form .btn-primary:hover, .admin-form .btn-primary:focus {
    background-color: #feb031;
    border-color: #feb031;
}
section.login-page .admin-form .switch-primary > input:checked + label {
    background: #feb031 !important;
    border-color: #feb031 !important;
    position: relative;
}
section.login-page .admin-form .switch-primary > input:checked + label:after {
    color: #feb031 !important;
}
    </style>
    <section id="content" class="login-page">
       <div class="over-lay"></div>
        <div class="admin-form theme-info mw500">
            <!-- Login Logo -->
            <div class="row table-layout">
                <a href="javascript:" title="Return to Dashboard"></a>
            </div>
            <!-- Login Panel/Form -->
            <div class="panel mt20 mb25">
                <?php echo form_open($this->uri->uri_string(), array('method' => 'post')); ?>
                <div class="panel-body p25 pb15">
                    <!-- Username Input -->
                    <div class="section">
                        <label for="email" class="field-label text-muted fs18 mb10">Email</label>
                        <label for="email" class="field prepend-icon">
                            <?php echo form_input(array('name' => 'email', 'class' => 'gui-input', 'placeholder' => 'Enter email')); ?>
                            <label for="email" class="field-icon">
                                <i class="fa fa-user"></i>
                            </label>
                        </label>
                    </div>

                    <!-- Password Input -->
                    <div class="section">
                        <label for="username" class="field-label text-muted fs18 mb10">Password</label>
                        <label for="password" class="field prepend-icon">
                            <?php echo form_password(array('name' => 'password', 'class' => 'gui-input', 'placeholder' => 'Enter password')); ?>
                            <label for="password" class="field-icon">
                                <i class="fa fa-lock"></i>
                            </label>
                        </label>
                    </div>

                </div>

                <div class="panel-footer clearfix">
                    <?php echo form_button(array('name' => 'sign-in', 'type' => 'submit', 'content' => 'Sign in <i class="icon-circle-right2 position-right"></i>', 'class' => 'button btn-primary mr10 pull-right')); ?>
                    <label class="switch ib switch-primary mt10">
                        <input type="checkbox" name="remember" id="remember" checked>
                        <label for="remember" data-on="YES" data-off="NO"></label>
                        <span>Remember me</span>
                    </label>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </section>
    <?php $this->load->view($this->config->item('scripts_view')); ?>
    <script src="<?php echo base_url($this->config->item('js_validate_min')); ?>" type='text/javascript'></script>
    <script type="text/javascript">

        // Validate form
        $('form').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                }
            },
            submitHandler: function(form) {

                // Disable
                $(form).find('button[type="submit"]').val('Submit').prop('disabled', true);

                // Call ajax
                ajaxResponse = ajaxCall("<?php echo base_url($this->config->item('auth_login_uri')) ?>", "POST", $(form).serialize());

                // Enable
                $(form).find('button[type="submit"]').val('Submit').prop('disabled', false);

                if(typeof ajaxResponse == 'undefined')
                    return;

                if(ajaxResponse.success == false) {

                    errorMessages = [];
                    $.isEmptyObject(ajaxResponse.result.errors) || $.each(ajaxResponse.result.errors, function(e, obj) {

                        name = new Array();
                        code = names = '';
                        if(obj.location != undefined)
                        {
                            loc = String(obj.location);
                            name = loc.split(' -> ');
                            names = '<br/> Location => ' + name[1];
                        }

                        // store all errors server msg
                        if(typeof obj.code != 'undefined')
                            code = obj.code + ' => ';

                        errorMessages.push(code + obj.message + names);
                    });

                    notify('failure', errorMessages.join('<br/>'));
                }

                if(ajaxResponse.success == true) {

                    notify('success', ajaxResponse.result.message);

                    // redirect to index
                    location.reload();
                }
            }
        });
    </script>
</body>