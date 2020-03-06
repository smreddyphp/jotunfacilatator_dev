<?php 
        
    $super_user_id = $this->lib_auth->getUserID() ; 
    
    $superuser_details = $this->db->where('id',$super_user_id)->get('users')->row_array();
?>


<aside id="sidebar_left" class="nano nano-primary affix has-scrollbar sidebar-default">
    <!-- Start: Sidebar Left Content -->
    <div class="sidebar-left-content nano-content">
        <!-- Start: Sidebar Header -->
        <header class="sidebar-header">
            <!-- Sidebar Widget - Menu (Slidedown) -->
            <div class="sidebar-widget menu-widget">
                <div class="row text-center mbn">
                    <div class="col-xs-4">
                        <a href="index-main.php" class="text-primary" data-toggle="tooltip" data-placement="top" title="Dashboard">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="javascript:" class="text-info" data-toggle="tooltip" data-placement="top" title="Messages">
                            <span class="glyphicon glyphicon-inbox"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="javascript:" class="text-alert" data-toggle="tooltip" data-placement="top" title="Tasks">
                            <span class="glyphicon glyphicon-bell"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="javascript:" class="text-system" data-toggle="tooltip" data-placement="top" title="Activity">
                            <span class="fa fa-desktop"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="javascript:" class="text-danger" data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="fa fa-gears"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="javascript:" class="text-warning" data-toggle="tooltip" data-placement="top" title="Cron Jobs">
                            <span class="fa fa-flask"></span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Sidebar Widget - Author (hidden)  -->
            <div class="sidebar-widget author-widget hidden">
                <div class="media">
                    <a class="media-left" href="#">
                        <img src="assets/img/avatars/3.jpg" class="img-responsive">
                    </a>
                    <div class="media-body">
                            <h4 class="media-heading"><a href="<?php echo base_url(); ?>users/edit_profile/<?php echo $this->lib_auth->getUserID();?>"><?php  print_r(ucwords($this->session->userdata('auth_me')->first_name)) ; ?></a></h4>
                        </div>
                </div>
            </div>
            <!-- Sidebar Widget - Search (hidden) -->
            <div class="sidebar-widget search-widget hidden">
                <div class="input-group">
               <span class="input-group-addon">
               <i class="fa fa-search"></i>
               </span>
                    <input type="text" id="sidebar-search" class="form-control" placeholder="Search...">
                </div>
            </div>
        </header>
        <!-- End: Sidebar Header -->
        <!-- Start: Sidebar Left Menu -->
        <ul class="nav sidebar-menu">
            <?php if($this->lib_auth->getRoleID() == 1): ?>
                <li class="user-prfl-li">
                    <div class="media">
                        <div class="media-left">
                         <?php $user_image = $this->session->userdata('auth_me')->profile_image; ?>             
			  <?php if($user_image == ""){?>
			  <img src="<?php echo base_url(); ?>server/assets/media/profile.png" class="media-object img-circle">
			  <?php }else{?>
			  <img src="<?php echo base_url(); ?>server/assets/media/<?php echo $user_image; ?>" class="media-object img-circle">
			  <?php } ?>
                        </div>
                       <div class="media-body">
                            <h4 class="media-heading"><a href="<?php echo base_url(); ?>users/edit_profile/<?php echo $this->lib_auth->getUserID();?>" style="text-decoration:none;color:white"><?php  print_r(ucwords($this->session->userdata('auth_me')->first_name)); ?></a></h4>
                        </div>
                    </div>
                </li>
                <li>
                    <!--<a href="<?php echo base_url(); ?>index.php/sales/index"><span class="fa fa-building sidebar-title"></span>Sales Management</a>-->
                    <a href="<?php echo base_url(); ?>index.php/sales/sales_index"><span class="fa fa-building sidebar-title"></span>Sales Management</a>
                    <span class="plusminus1" style="display:none;">+</span>
                </li>

                <li>
                    <a href="<?php echo base_url(); ?>index.php/dealers/index"><span class="fa fa-cube sidebar-title"></span>Dealers Management</a>
                    <span class="plusminus1" style="display:none;">+</span>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/dealers/super_users"><span class="fa fa-cube sidebar-title"></span>Super Users Management</a>
                    <span class="plusminus1" style="display:none;">+</span>
                </li>
                <li>
                    <?php echo anchor(base_url($this->config->item('forms_index_uri')),
                        '<span class="fa fa-pencil-square-o sidebar-title"></span> Form Management'); ?>
                    <span class="plusminus1" style="display:none;">+</span>
                </li>
                <li>
                    <a class="accordion-toggle" href="javascript:void(0);">
                        <span class="fa fa-user"></span>
                        <span class="sidebar-title">Team Management</span>
                        <span class="plusminus">+</span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                        <!--<a href="<?php echo base_url(); ?>index.php/users/index">Team</a>-->
                        <a href="<?php echo base_url(); ?>index.php/users/users_index">Team</a>
                            <!---<?php echo anchor(base_url($this->config->item('users_index_uri')), 'Team'); ?>---->
                        </li>
                         <!------ <li>
                            <?php echo anchor(base_url($this->config->item('roles_index_uri')), 'Roles'); ?>
                        </li>--->
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/designations/index">Designations</a>
                            <!-----<?php echo anchor(base_url($this->config->item('designations_index_uri')), 'Designations'); ?>--------->
                        </li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url(); ?>index.php/shops/index"><span class="fa fa-building sidebar-title"></span>Shop Management</a>
                    <span class="plusminus1" style="display:none;">+</span>
                </li>
                <!-- <li><a href="<?php echo base_url(); ?>index.php/users/live_track"><span class="fa fa-hand-o-right sidebar-title"></span>Track</a>
                    <span class="plusminus1" style="display:none;">+</span>
                </li>
                 <li><a href="<?php echo base_url(); ?>index.php/sales/actionlog"><span class="fa fa-user sidebar-title"></span>Action Log</a>
                    <span class="plusminus1" style="display:none;">+</span>
                </li>
                <li><a href="<?php echo base_url(); ?>index.php/dashboard/products"><span class="fa fa-building sidebar-title"></span>Products </a>
                    <span class="plusminus1" style="display:none;">+</span>
                </li>
                <li><a href="<?php echo base_url(); ?>index.php/dashboard/sell_up_products"><span class="fa fa-building sidebar-title"></span>Sell Up Products</a>
                    <span class="plusminus1" style="display:none;">+</span>
                </li> -->
                <li><a href="<?php echo base_url(); ?>index.php/dashboard/salesman_work"><span class="fa fa-building sidebar-title"></span>Salesmans Works</a>
                    <span class="plusminus1" style="display:none;">+</span>
                </li>
<!-----<?php echo anchor(base_url($this->config->item('shops_index_uri')),'<span class="fa fa-building sidebar-title"></span> Shop Management'); ?>---->
            <?php elseif($superuser_details['role_id']==2 && $superuser_details['user_type']==9): ?>
                    <li class="user-prfl-li">
                        <div class="media">
                            <div class="media-left">
                              <?php $user_image = $this->session->userdata('auth_me')->profile_image; ?>             
                			  <?php if($user_image == ""){?>
                			  <img src="<?php echo base_url(); ?>server/assets/media/profile.png" class="media-object img-circle">
                			  <?php }else{?>
                			  <img src="<?php echo base_url(); ?>server/assets/media/<?php echo $user_image; ?>" class="media-object img-circle">
                			  <?php } ?>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="<?php echo base_url(); ?>users/edit_profile/<?php echo $this->lib_auth->getUserID();?>" style="text-decoration:none;color:white"><?php  print_r(ucwords($this->session->userdata('auth_me')->first_name)); ?></a></h4>
                            </div>
                        </div>
                    </li>
                    <li><a href="<?php echo base_url(); ?>index.php/shops/index"><span class="fa fa-building sidebar-title"></span>Shop Management</a>
                        <span class="plusminus1" style="display:none;">+</span>
                    </li>
                     <li>
                        <a href="<?php echo base_url(); ?>index.php/dealers/index"><span class="fa fa-cube sidebar-title"></span>Dealers Management</a>
                        <span class="plusminus1" style="display:none;">+</span>
                    </li>
                <?php else: ?>
                                    <li class="user-prfl-li">
                    <div class="media">
                        <div class="media-left">
                          <?php $user_image = $this->session->userdata('auth_me')->profile_image; ?>             
                          <?php if($user_image == ""){?>
                          <img src="<?php echo base_url(); ?>server/assets/media/profile.png" class="media-object img-circle">
                          <?php }else{?>
                          <img src="<?php echo base_url(); ?>server/assets/media/<?php echo $user_image; ?>" class="media-object img-circle">
                          <?php } ?>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="<?php echo base_url(); ?>users/edit_profile/<?php echo $this->lib_auth->getUserID();?>" style="text-decoration:none;color:white"><?php  print_r(ucwords($this->session->userdata('auth_me')->first_name)); ?></a></h4>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/sales/manager_sales"><span class="fa fa-building sidebar-title"></span>Sales Management</a>
                    <span class="plusminus1" style="display:none;">+</span>
                </li>
                 <li>
                    <a href="<?php echo base_url(); ?>index.php/dealers/manager_dealers"><span class="fa fa-cube sidebar-title"></span>Dealers Management</a>
                    <span class="plusminus1" style="display:none;">+</span>
                </li>
                <li><a href="<?php echo base_url(); ?>index.php/dashboard/salesman_work"><span class="fa fa-building sidebar-title"></span>Salesmans Works</a>
                    <span class="plusminus1" style="display:none;">+</span>
                </li>
  <li><a href="<?php echo base_url(); ?>index.php/users/live_track/<?=$this->lib_auth->getUserID()?>"><span class="fa fa-hand-o-right sidebar-title"></span>Track</a>
                    <span class="plusminus1" style="display:none;">+</span>
                </li>
            <?php endif; ?>
        </ul>
    </div>
    <!-- End: Sidebar Left Content -->
</aside>

<div class="settings-right">
    <div id="skin-toolbox">
        <div class="panel">
            <div class="panel-heading">
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
                                    <input type="radio" name="headerSkin" id="headerSkin8" checked value="">
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
                                    <input type="radio" name="sidebarSkin" checked id="sidebarSkin3" value="">
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
                                    <input type="radio" id="fullwidth-option" checked name="layout-option">
                                    <label for="fullwidth-option">Fullwidth Layout</label>
                                </div>
                            </div>
                            <div class="form-group mb20">
                                <div class="radio-custom radio-disabled mb5">
                                    <input type="radio" id="boxed-option" name="layout-option" disabled>
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