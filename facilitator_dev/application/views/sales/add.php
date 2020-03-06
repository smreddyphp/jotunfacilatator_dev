<body class="dashboard-page sb-l-o sb-r-c">
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
    <div id="main">
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
                  <li class="crumb-active">Add New Shop</li>
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
                        <?php echo form_open($this->uri->uri_string(), array('id' => 'addShopForm'));?>
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
                                    <?php echo form_input(array('name' => 'last_evaluation', 'class' => 'event-name gui-input br-light light', 'placeholder' => 'Last Evaluation', 'value' => set_value('last_evaluation'))); ?>
                                   <label for="name2" class="field-icon">
                                     <i class="fa fa-list-alt" aria-hidden="true"></i>
                                   </label>
                                 </label>
                               </div>
                               <div class="col-xs-6">
                                 <label for="text" class="field prepend-icon">
                                    <?php echo form_dropdown('shop_type_id', array('' => 'Select Shop Type') + $arrShops, $this->input->post('shop_type_id'),'', 'class="event-name gui-input br-light light fa fa-building'); ?>
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
                           <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
                             <div class="fileupload-preview thumbnail mb15">
                               <img src="http://localhost/facilitator/assets/img/logos/download.svg" alt="holder">
                             </div>
                             <span class="button btn-system btn-file btn-block ph5">
                               <span class="fileupload-new">Image</span>
                               <?php
                                echo form_upload(array('name' => 'image', 'class' => 'fileupload-new'));
                                 ?>
                             </span>
                           </div>
                         </div>
                      <?php echo form_close(); ?>
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
    </div>
    <?php $this->load->view($this->config->item('scripts_view')); ?>
    <script src="<?php echo base_url($this->config->item('js_validate_min')); ?>" type='text/javascript'></script>
    <script type="text/javascript">
    </script>
</body>