<header class="navbar navbar-fixed-top">
   <div class="navbar-branding dark">
      <a class="navbar-brand jotun_f_logo " href="<?php echo(base_url($this->config->item('dashboard_index_uri'))) ?>">
         <h3 class="logo_h3 mt10">
            <span class="ml10">FACILITATOR </span><br>
            <p class="dashbrd-menu">ADMIN DASHBOARD</p>
         </h3>
      </a>
      <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
   </div>
   <div class="pull-right">
      <!-- <form class="navbar-form navbar-left navbar-search" role="search">
         <div class="form-group">
            <input type="text" class="form-control" placeholder="Search..." value="Search...">
         </div>
      </form> -->
      <ul class="nav navbar-nav">
         <li class="hidden-xs">
            <a class="request-fullscreen toggle-active" href="#">
               <span class="ad ad-screen-full fs18"></span>
            </a>
         </li>
         <!-- <li class="dropdown hidden-xs">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
               <span class="ad ad-radio-tower fs18"></span>
            </a>
            <ul class="dropdown-menu media-list w350 animated animated-shorter fadeIn" role="menu">
               <li class="dropdown-header">
                  <span class="dropdown-title"> Notifications</span>
                  <span class="label label-warning">12</span>
               </li>
               <li class="media">
                  <a class="media-left" href="#"> <img src="assets/img/avatars/5.jpg" class="mw40" alt="avatar"> </a>
                  <div class="media-body">
                     <h5 class="media-heading">Article
                        <small class="text-muted">- 08/16/22</small>
                     </h5>
                     Last Updated 36 days ago by
                     <a class="text-system" href="#"> Max </a>
                  </div>
               </li>
               <li class="media">
                  <a class="media-left" href="#"> <img src="assets/img/avatars/2.jpg" class="mw40" alt="avatar"> </a>
                  <div class="media-body">
                     <h5 class="media-heading mv5">Article
                        <small> - 08/16/22</small>
                     </h5>
                     Last Updated 36 days ago by
                     <a class="text-system" href="#"> Max </a>
                  </div>
               </li>
               <li class="media">
                  <a class="media-left" href="#"> <img src="assets/img/avatars/3.jpg" class="mw40" alt="avatar"> </a>
                  <div class="media-body">
                     <h5 class="media-heading">Article
                        <small class="text-muted">- 08/16/22</small>
                     </h5>
                     Last Updated 36 days ago by
                     <a class="text-system" href="#"> Max </a>
                  </div>
               </li>
               <li class="media">
                  <a class="media-left" href="#"> <img src="assets/img/avatars/4.jpg" class="mw40" alt="avatar"> </a>
                  <div class="media-body">
                     <h5 class="media-heading mv5">Article
                        <small class="text-muted">- 08/16/22</small>
                     </h5>
                     Last Updated 36 days ago by
                     <a class="text-system" href="#"> Max </a>
                  </div>
               </li>
            </ul>
         </li> -->
         <li class="hidden-xs">
            <?php echo anchor(base_url($this->config->item('auth_logout_uri')), ' ', 'class="fa fa-sign-out"'); ?>
            <!-- <a class="" href="admin-login.php">
               <span class="fa fa-sign-out"></span>
            </a> -->
         </li>
      </ul>
   </div>
</header>