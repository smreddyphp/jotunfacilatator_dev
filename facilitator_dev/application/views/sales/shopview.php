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
.toppad
{margin-top:20px;
}
        .form_descrpt{
            padding: 10px;
        }
        .form_dtal_btn {
    margin-top: 50px;
}
.fs12.b1 {
    margin-bottom: 10px;
}
        .img_form {
 width: 90px; 
    margin-top: 10px;
}
        
        .form-border {
    border-left-color: #032673;
    border-left-width: 4px;
}
     .form_img {
    
    padding: 10px;
}
       .form_text {
    padding: 10px;
    padding-top: 20px;
}
.carousel-control {
    background-image: none !important;
}
.carousel-control {
    font-size: 60px !important;
    position: absolute;
    top: 25%;
}modal
div#myCarousel .carousel-inner .item img{
    height: 400px !important;
    width: 100%;
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
                        <li class="crumb-active">View Forms</li>
                    </ol>
                </div>
                <div class="settings-right">
                    <div id="skin-toolbox">
                        <div class="panel">
                            <div class="panel-heading"> <span class="panel-icon"> <i class="fa fa-spin fa-gear"></i> </span> <span class="panel-title"> Theme Options</span> </div>
                            <div class="panel-body pn">
                                <ul class="nav nav-list nav-list-sm pl15 pt10" role="tablist">
                                    <li class="active"> <a href="#toolbox-header" role="tab" data-toggle="tab">Navbar</a> </li>
                                    <li> <a href="#toolbox-sidebar" role="tab" data-toggle="tab">Sidebar</a> </li>
                                    <li> <a href="#toolbox-settings" role="tab" data-toggle="tab">Misc</a> </li>
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
                                                    <label for="boxed-option">Boxed Layout <b class="text-muted">(Coming Soon)</b> </label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="form-group mn br-t p15"> <a href="#" id="clearLocalStorage" class="btn btn-primary btn-block pb10 pt10">Clear LocalStorage</a> </div>
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
                    <li class="active"> <a href=""> View Forms</a> </li>
                    
                </ul>
                <ul class="nav nav-list nav-list-topbar pull-right">
                    <li><a href="#" data-toggle="modal" data-target="#myModal">View Gallery</a></li>
                    
                    <li><a href="<?php echo base_url(); ?>index.php/sales/download_shops_data/<?php echo $result['id']; ?>">Download</a></li>
                    
                    <li><a href="<?php echo base_url(); ?>index.php/sales/download_shopstotal/<?php echo $result['id']; ?>">Download Total</a></li>
                </ul>
            </div>
        </header>
        <!-- End: Topbar -->

        <!-- Begin: Content -->
        <section id="content" class="table-layout animated fadeIn">

            <!-- begin: .tray-center -->
            <div class="tray tray-center">

                <!-- create new order panel -->
                <div class="panel mb25 mt5"> </div>
                <!-- recent orders table -->
                <div class="panel">
                    <div class="panel-body pn">
                        <div class="container">
                            <div class="media">
                                <div class="media-left form_img"> 
<?php if($result['image'] != ""){?>
 <img src="<?php echo base_url(); ?>server/assets/media/<?php echo $result['image']; ?>" class="media-object img-circle " style="width:70px"></a> 
<?php } else { ?>
 <img src="<?php echo base_url(); ?>server/assets/media/default-shop-icon.png" class="media-object img-circle " style="width:70px"></a> 
<?php } ?>
</div>
                                <div class="media-body form_text"> <a href="form_description.php">
                                        <h3 class="media-heading"><?php echo $result['name']; ?></h3>
                                       <!-- <p>Shop ID:<?php  ?></p>-->
                                    </a> </div>
                            </div>
                        </div>
                    </div>
                </div>
               <?php foreach($forms as $value){?>
                  <div class="panel">
                      <div class="panel-body pn form-border">
                          <div class="container">
                              <div class="row form_h3">
                             <h3> <a href="<?php echo base_url(); ?>index.php/sales/shopdata/<?php echo $result['id']; ?>/<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a><h3>
                              </div>
                          </div>
                      </div>
                  </div>
			   <?php }?>
			   
			   
			<div class="panel">
                      <div class="panel-body pn form-border">
                          <div class="container">
                              <div class="row form_h3">
                                  <?php if($type['shop_type_id'] == 1){ ?>
                              <h3> <a href="<?php echo base_url(); ?>index.php/sales/shopdata/<?php echo $result['id']; ?>/6">Shop Hygiene and Standards Shop Type 1</a><h3>
                                  <?php } ?>
                                  
                                  
                                  <?php if($type['shop_type_id'] == 2){ ?>
                              <h3> <a href="<?php echo base_url(); ?>index.php/sales/shopdata/<?php echo $result['id']; ?>/7">Shop Hygiene and Standards Shop Type 2</a><h3>
                                  <?php } ?>
                                  
                                  <?php if($type['shop_type_id'] == 3){ ?>
                              <h3> <a href="<?php echo base_url(); ?>index.php/sales/shopdata/<?php echo $result['id']; ?>/8">Shop Hygiene and Standards Shop Type 3</a><h3>
                                  <?php } ?>
                                  
                                  
                              </div>
                          </div>
                      </div>
               </div>
                  
				  
<!---<?php echo anchor(base_url($this->config->item('sales_shops_view_uri').$objUser->id.'/'.$objForm->id), $objForm->name); ?>--->
            </div>
            <!-- end: .tray-center -->
        </section>
        <!-- End: Content -->

    </section>
    
    <aside id="sidebar_right" class="nano affix">

        <!-- Start: Sidebar Right Content -->
        <div class="sidebar-right-content nano-content">

            <div class="tab-block sidebar-block br-n">
                <ul class="nav nav-tabs tabs-border nav-justified hidden">
                    <li class="active">
                        <a href="#sidebar-right-tab1" data-toggle="tab">Tab 1</a>
                    </li>
                    <li>
                        <a href="#sidebar-right-tab2" data-toggle="tab">Tab 2</a>
                    </li>
                    <li>
                        <a href="#sidebar-right-tab3" data-toggle="tab">Tab 3</a>
                    </li>
                </ul>
                <div class="tab-content br-n">
                    <div id="sidebar-right-tab1" class="tab-pane active">

                        <h5 class="title-divider text-muted mb20"> Server Statistics
                <span class="pull-right"> 2013
                  <i class="fa fa-caret-down ml5"></i>
                </span>
                        </h5>
                        <div class="progress mh5">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 44%">
                                <span class="fs11">DB Request</span>
                            </div>
                        </div>
                        <div class="progress mh5">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 84%">
                                <span class="fs11 text-left">Server Load</span>
                            </div>
                        </div>
                        <div class="progress mh5">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 61%">
                                <span class="fs11 text-left">Server Connections</span>
                            </div>
                        </div>

                        <h5 class="title-divider text-muted mt30 mb10">Traffic Margins</h5>
                        <div class="row">
                            <div class="col-xs-5">
                                <h3 class="text-primary mn pl5">132</h3>
                            </div>
                            <div class="col-xs-7 text-right">
                                <h3 class="text-success-dark mn">
                                    <i class="fa fa-caret-up"></i> 13.2% </h3>
                            </div>
                        </div>

                        <h5 class="title-divider text-muted mt25 mb10">Database Request</h5>
                        <div class="row">
                            <div class="col-xs-5">
                                <h3 class="text-primary mn pl5">212</h3>
                            </div>
                            <div class="col-xs-7 text-right">
                                <h3 class="text-success-dark mn">
                                    <i class="fa fa-caret-up"></i> 25.6% </h3>
                            </div>
                        </div>

                        <h5 class="title-divider text-muted mt25 mb10">Server Response</h5>
                        <div class="row">
                            <div class="col-xs-5">
                                <h3 class="text-primary mn pl5">82.5</h3>
                            </div>
                            <div class="col-xs-7 text-right">
                                <h3 class="text-danger mn">
                                    <i class="fa fa-caret-down"></i> 17.9% </h3>
                            </div>
                        </div>

                        <h5 class="title-divider text-muted mt40 mb20"> User Activity
                            <span class="pull-right text-primary fw600">1 Hour</span>
                        </h5>

                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="assets/img/avatars/6.jpg" class="mw40 br64" alt="holder-img">
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading">Article
                                    <small class="text-muted">- 08/16/22</small>
                                </h5>Updated 36 days ago by
                                <a class="text-system" href="#"> Max </a>
                            </div>
                        </div>
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="assets/img/avatars/4.jpg" class="mw40 br64" alt="holder-img">
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading">Richard
                                    <small class="text-muted">@cloudesigns</small>
                                    <small class="pull-right text-muted">6h</small>
                                </h5>Updated 36 days ago by
                                <a class="text-system" href="#"> Max </a>
                            </div>
                        </div>
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="assets/img/avatars/3.jpg" class="mw40 br64" alt="holder-img">
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading">1,610 kcal
                                    <span class="fa fa-caret-down text-primary pl5"></span>
                                </h5>Updated 36 days ago by
                                <a class="text-system" href="#"> Max </a>
                            </div>
                        </div>
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="assets/img/avatars/2.jpg" class="mw40 br64" alt="holder-img">
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading">1,610 kcal
                                    <span class="label label-xs label-system ml5">Featured</span>
                                </h5>Updated 36 days ago by
                                <a class="text-system" href="#"> Max </a>
                            </div>
                        </div>
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="assets/img/avatars/5.jpg" class="mw40 br64" alt="holder-img">
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading">1,610 kcal</h5>
                                Updated ago by
                                <a class="text-system" href="#"> Max </a>
                            </div>
                            <a class="media-right pl30" href="#">
                                <span class="fa fa-pencil text-muted mb5"></span>
                                <br>
                                <span class="fa fa-remove text-danger-light"></span>
                            </a>
                        </div>
                    </div>
                    <div id="sidebar-right-tab2" class="tab-pane"></div>
                    <div id="sidebar-right-tab3" class="tab-pane"></div>
                </div>
                <!-- end: .tab-content -->
            </div>

        </div>
    </aside>
    <!-- End: Right Sidebar -->

</div>
<!-- End: Main -->
<div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">VIEW IMAGES</h4>
         </div>
         <div class="modal-body">
             
                <div id = "myCarousel" class = "carousel slide">
                   <!-- Carousel indicators -->
                   <ol class = "carousel-indicators">
                      <?php foreach($images as $nKey => $objImage): ?>
                        <li data-target="#myCarousel" data-slide-to="<?php echo $nKey; ?>" <?php echo ($nKey == 0) ? 'class="active"' : ''; ?>></li>
                      <?php endforeach; ?>
                   </ol>
                   <!-- Carousel items -->
                   <div class="carousel-inner">
                      <?php foreach($images as $nKey => $objImage): ?>
                        <div class="item<?php echo ($nKey == 0) ? ' active' : ''; ?>">
                          <?php echo img(array('src' => $this->config->item('base_url').$this->config->item('shops_image_path').$objImage['name']), '','class="img-responsive"'); ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                   <!-- Carousel nav -->
                   <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                   <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                </div>
            
         </div>
       <!--  <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>-->
      </div>
   </div>
</div>

<!-- BEGIN: PAGE SCRIPTS -->

<!-- jQuery -->
<?php $this->load->view($this->config->item('footer_view')); ?>
<?php $this->load->view($this->config->item('scripts_view')); ?>
<script src="<?php echo base_url($this->config->item('js_validate_min')); ?>" type='text/javascript'></script>