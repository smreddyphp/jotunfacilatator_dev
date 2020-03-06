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
                            <li class="crumb-active">Team Management User</li>
                        </ol>
                    </div>

                </div>
            </div>

            <!-- Begin: Content -->
            <section id="content" class="table-layout animated fadeIn">

                <!-- begin: .tray-center -->
                <div class="tray tray-center">

                    <!-- create new order panel -->
<?php if($this->lib_auth->getRoleID() == 1){?>
                    <div class="panel mb25 mt5">
                        <div class="panel-heading">
                            <span class="panel-title hidden-xs"> Add New User</span>
                        </div>
                        <div class="panel-body p20 pb10">
                            <h4 style="margin-bottom:20px; margin-top:5px">Create a New User</h4>
                            <p><?php echo anchor(base_url($this->config->item('users_add_uri')), 'Add New User', 'class="btn btn-success"'); ?>
                        </div>
                    </div>
<?php } ?>

	<?php if($this->session->flashdata('message') != ""){ ?>
	<?php echo '<script>setTimeout(function() {swal({title: "User added successfully!"});}, 100);</script>'; ?>
	<?php } ?>

                    <!-- recent orders table -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h4><strong>List of Users</strong></h4>
                        </div>
                        <div class="panel-menu admin-form theme-primary">
                            <div class="row">
                                
                                    <div class="col-sm-4 has-feedback">
                                        <?php echo form_input(array('name' => 'search', 'class' => 'form-control', 'placeholder' => 'Search here')); ?>                                       
                                    </div>
                             
                              
                                 <div class="col-md-4">
                  <label class="field select">
                    <select id="filterdata" onchange="getfilterteam()" name="filter-group">
                      <option>Filter by Status</option>
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                      <option value="">All</option>                      
                    </select>
                    <i class="arrow double"></i>
                  </label>
                </div>
                               <!---- <div class="col-md-4">
                                    <label class="field select">
                                        <select id="filter-status" name="filter-status">
                                            <option value="0">Filter by User</option>
                                            <option value="1">Sales Manager</option>
                                            <option value="2">Sales Proprietor</option>
                                            <option value="3">Sales Executor</option>
                                        </select>
                                        <i class="arrow double"></i>
                                    </label>
                                </div>------>
                             
                                <div class="col-md-4">
                  <label class="field select">
                    <select id="filter-group" name="filter-group"  onchange="maction();">
                      <option>Action</option>
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
  <?php if($this->lib_auth->getRoleID() == 1){ ?>
                      <option value="2">Delete</option>                      
<?php } ?>
                    </select>
                    <i class="arrow double"></i>
                  </label>
                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body pn">
                            <div class="table-responsive">
                                <?php $this->load->view($this->config->item('users_table_view')); ?>
                            </div>
                            <!-- Pagination -->
                            
                            <!-- /Pagination -->
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

        $('input[name="search"]').on('keyup',function() {

            var search = $(this).val();
            
            // Get user list
            get_user_list(search, "<?php echo base_url($this->config->item('users_ajax_get_users_by_search_uri')); ?>");
        });

        $('select[name="filter-status"]').on('change',function() {

            var search = $(this).val();
            
            // Get user list
            get_user_list(search, "<?php echo base_url($this->config->item('users_ajax_get_users_by_search_uri')); ?>");
        });

        // Get shop list
        function get_user_list(search, link) {

            // Call ajax
            ajaxResponse = ajaxCall(link+'?search='+search, "GET");

            if(typeof ajaxResponse == 'undefined')
                return;

            if(ajaxResponse.result.success == true) {

                $('.table-responsive').html(ajaxResponse.result.view);
            }
        }

        // Click on ajax page link
        $(document).on('click', '.ajax-paginate a', function(e) {

            e.preventDefault();

            // Obj
            obj = $(this);

            // Call ajax
            ajaxResponse = ajaxCall(obj.attr('href'), "GET");

            if(typeof ajaxResponse == 'undefined')
                return;

            if(ajaxResponse.result.success == true) {

                $('.table-responsive').html(ajaxResponse.result.view);
            }
        });
    </script>
</body>