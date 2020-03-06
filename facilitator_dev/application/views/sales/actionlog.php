<link rel="stylesheet" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
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
        padding: 10px 10px;
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

    .panel-controls {display:none;}
    .tray-center {height:auto !important;}
    .panel-headIndx {
        padding: 10px 2px;
        font-weight: 600;
    }
    .tray-center .dropdown-menu {
        top: 100%;
        right: 0;
        left: auto;
    }
    div#myTable_length {
    margin: 25px 10px;
}
        div#myTable_filter {
    margin-top: 24px;
    margin-right: 10px;
}
        div#myTable_filter > select {
    background: red;
        }
    #chart svg {width:100% !important;}
    #chart svg g {width:100% !important;}
</style>
<div id="main">
    <?php
    $this->load->view($this->config->item('header_view'));
    $this->load->view($this->config->item('sidebar_view'));
    ?>
    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">
        <!-- Start: Topbar-Dropdown -->
        <!-- <div id="topbar-dropmenu">
           <div class="topbar-menu row">
           <div class="col-xs-4 col-sm-2"> <a href="#" class="metro-tile"> <span class="glyphicon glyphicon-inbox"></span> <span class="metro-title">Messages</span> </a> </div>
           <div class="col-xs-4 col-sm-2"> <a href="#" class="metro-tile"> <span class="glyphicon glyphicon-user"></span> <span class="metro-title">Users</span> </a> </div>
           <div class="col-xs-4 col-sm-2"> <a href="#" class="metro-tile"> <span class="glyphicon glyphicon-headphones"></span> <span class="metro-title">Support</span> </a> </div>
           <div class="col-xs-4 col-sm-2"> <a href="#" class="metro-tile"> <span class="fa fa-gears"></span> <span class="metro-title">Settings</span> </a> </div>
           <div class="col-xs-4 col-sm-2"> <a href="#" class="metro-tile"> <span class="glyphicon glyphicon-facetime-video"></span> <span class="metro-title">Videos</span> </a> </div>
           <div class="col-xs-4 col-sm-2"> <a href="#" class="metro-tile"> <span class="glyphicon glyphicon-picture"></span> <span class="metro-title">Pictures</span> </a> </div>
           </div>
           </div>-->
        <!-- End: Topbar-Dropdown -->
        <!-- Start: Topbar -->
        <!-- End: Topbar -->
        <!-- Begin: Content -->
        <section id="content" class="animated fadeIn">
            <div class="row mb10">
                <div class="inner-header mb10">
                    <div class="bread-cumLeft">
                        <ol class="breadcrumb">
                            <li>Home</li>
                            <li class="crumb-active">Action Log</li>
                        </ol>
                    </div>
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
                </div>
            </div>
            <!-- Dashboard Tiles -->

            <!-- Admin-panels -->
            <div class="admin-panels ui-sortable animated fadeIn" style="height: 371px;"> 
        
        <!-- end: .row -->
        <div class="col-md-12 mb10">
       
        
        <div class="clearfix"></div>
        
     <div class="row">
            
            <div class="col-md-12 col-sm-12 col-xs-12">
            <section id="" class="table-layout animated fadeIn">
                <div class="tray tray-center">
                <div class="panel">
				
                    <div class="panel-headIndx"> <span class="panel-title hidden-xs"> Action Log</span> </div>
					<div class="panel-menu admin-form theme-primary">
              <div class="row">              
			  
               
              </div>
            </div>
			<input type="hidden" value='users' id="table_name">
                    <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table admin-form theme-warning tc-checkbox-1 fs13" id="myTable">
                        <thead>
                            <tr class="bg-light">
                            <th class="">S.no</th>
                            <th class="">Shopname</th>
                            <th class="">Username</th>
                            <th class="">Useremail</th>
                            <th class="">Form</th>
                            <th class="">Modified on</th>
                            <th>View</th>
                          </tr>
                          </thead>

                          <tbody id="showresult">  
                            <?php $i=1; foreach($result as $value){?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $value['shopname']; ?></td> 
                                    <td><?php echo $value['username']; ?></td> 
                                    <td><?php echo $value['useremail']; ?></td> 
                                    <td>
                                        <?php if($value['form_id'] == 1){ echo "Training"; } ?>
                                        <?php if($value['form_id'] == 2){ echo "Shopsize"; } ?>
                                        <?php if($value['form_id'] == 3){ echo "Warehouse"; } ?>
                                        <?php if($value['form_id'] == 4){ echo "Global Network"; } ?>
                                        <?php if($value['form_id'] == 5){ echo "Truck Binding"; } ?>
                                        <?php if($value['form_id'] == 6){ echo "Shop Hygiene and Standards Shop Type 1"; } ?>
                                        <?php if($value['form_id'] == 7){ echo "Shop Hygiene and Standards Shop Type 2"; } ?>
                                        <?php if($value['form_id'] == 8){ echo "Shop Hygiene and Standards Shop Type 3"; } ?>
                                    </td> 
                                    <td><?php echo $value['modified']; ?></td> 
                                    <td><a href="<?php echo base_url(); ?>sales/shop_details_view/<?php echo $value['task_id']; ?>/<?php echo $value['task_form_id']; ?>/<?php echo $value['form_id']; ?>">view</a></td>
                                </tr>
                            <?php } ?>
                          </tbody>
                      </table>
<div id="nodata"></div>
                      </div>
                  </div>
                  </div>
              </div>
              </section>
            </div>
									
            <!--   <div class="col-md-6 col-sm-6 col-xs-12">
            <section id="" class="table-layout animated fadeIn">
                <div class="tray tray-center">
                <div class="panel">
                    <div class="panel-headIndx"> <span class="panel-title hidden-xs"> Recent Users</span> </div>
                    <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table admin-form theme-warning tc-checkbox-1 fs13">
                        <thead>
                            <tr class="bg-light">
                            <th class="">Image</th>
                            <th class="">Product Title</th>
                            <th class="">SKU</th>
                            <th class="">Price</th>
                            <th class="">Stock</th>
                            <th class="text-right">Status</th>
                          </tr>
                          </thead>
                        <tbody>
                            <tr>
                            <td class="w100"><img class="img-responsive mw20 ib mr10" title="user" src="assets/img/stock/products/thumb_1.jpg"></td>
                            <td class="">Apple Ipod 4G - Silver</td>
                            <td class="">#21362</td>
                            <td class="">$215</td>
                            <td class="">1,400</td>
                            <td class="text-right"><div class="btn-group text-right">
                                <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active <span class="caret ml5"></span> </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li> <a href="#">Edit</a> </li>
                                  <li> <a href="#">Delete</a> </li>
                                  <li> <a href="#">Archive</a> </li>
                                  <li class="divider"></li>
                                  <li> <a href="#">Complete</a> </li>
                                  <li class="active"> <a href="#">Pending</a> </li>
                                  <li> <a href="#">Canceled</a> </li>
                                </ul>
                              </div></td>
                          </tr>
                            <tr>
                            <td class="w100"><img class="img-responsive mw20 ib mr10" title="user" src="assets/img/stock/products/thumb_2.jpg"></td>
                            <td class="">Apple Smart Watch - 1G</td>
                            <td class="">#15262</td>
                            <td class="">$455</td>
                            <td class="">2,100</td>
                            <td class="text-right"><div class="btn-group text-right">
                                <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active <span class="caret ml5"></span> </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li> <a href="#">Edit</a> </li>
                                  <li> <a href="#">Delete</a> </li>
                                  <li> <a href="#">Archive</a> </li>
                                  <li class="divider"></li>
                                  <li> <a href="#">Complete</a> </li>
                                  <li class="active"> <a href="#">Pending</a> </li>
                                  <li> <a href="#">Canceled</a> </li>
                                </ul>
                              </div></td>
                          </tr>
                            <tr>
                            <td class="w100"><img class="img-responsive mw20 ib mr10" title="user" src="assets/img/stock/products/thumb_6.jpg"></td>
                            <td class="">Apple Macbook 4th Gen - Silver</td>
                            <td class="">#66362</td>
                            <td class="">$1699</td>
                            <td class="">6,100</td>
                            <td class="text-right"><div class="btn-group text-right">
                                <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active <span class="caret ml5"></span> </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li> <a href="#">Edit</a> </li>
                                  <li> <a href="#">Delete</a> </li>
                                  <li> <a href="#">Archive</a> </li>
                                  <li class="divider"></li>
                                  <li> <a href="#">Complete</a> </li>
                                  <li class="active"> <a href="#">Pending</a> </li>
                                  <li> <a href="#">Canceled</a> </li>
                                </ul>
                              </div></td>
                          </tr>
                            <tr>
                            <td class="w100"><img class="img-responsive mw20 ib mr10" title="user" src="assets/img/stock/products/thumb_7.jpg"></td>
                            <td class="">Apple Iphone 16GB - Silver</td>
                            <td class="">#51362</td>
                            <td class="">$1299</td>
                            <td class="">5,200</td>
                            <td class="text-right"><div class="btn-group text-right">
                                <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active <span class="caret ml5"></span> </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li> <a href="#">Edit</a> </li>
                                  <li> <a href="#">Delete</a> </li>
                                  <li> <a href="#">Archive</a> </li>
                                  <li class="divider"></li>
                                  <li> <a href="#">Complete</a> </li>
                                  <li class="active"> <a href="#">Pending</a> </li>
                                  <li> <a href="#">Canceled</a> </li>
                                </ul>
                              </div></td>
                          </tr>
                          </tbody>
                      </table>
                      </div>
                  </div>
                  </div>
              </div>
              </section>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <section id="" class="table-layout animated fadeIn">
                <div class="tray tray-center">
                <div class="panel">
                    <div class="panel-headIndx"> <span class="panel-title hidden-xs"> Recent Products</span> </div>
                    <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table admin-form theme-warning tc-checkbox-1 fs13" id="tab1_4">
                        <thead>
                            <tr class="bg-light">
                            <th class="">Image</th>
                            <th class="">Product Title</th>
                            <th class="">SKU</th>
                            <th class="">Price</th>
                            <th class="">Stock</th>
                            <th class="text-right">Status</th>
                          </tr>
                          </thead>
                        <tbody>
                            <tr>
                            <td class="w100"><img class="img-responsive mw20 ib mr10" title="user" src="assets/img/stock/products/thumb_1.jpg"></td>
                            <td class="">Apple Ipod 4G - Silver</td>
                            <td class="">#21362</td>
                            <td class="">$215</td>
                            <td class="">1,400</td>
                            <td class="text-right"><div class="btn-group text-right">
                                <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active <span class="caret ml5"></span> </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li> <a href="#">Edit</a> </li>
                                  <li> <a href="#">Delete</a> </li>
                                  <li> <a href="#">Archive</a> </li>
                                  <li class="divider"></li>
                                  <li> <a href="#">Complete</a> </li>
                                  <li class="active"> <a href="#">Pending</a> </li>
                                  <li> <a href="#">Canceled</a> </li>
                                </ul>
                              </div></td>
                          </tr>
                            <tr>
                            <td class="w100"><img class="img-responsive mw20 ib mr10" title="user" src="assets/img/stock/products/thumb_2.jpg"></td>
                            <td class="">Apple Smart Watch - 1G</td>
                            <td class="">#15262</td>
                            <td class="">$455</td>
                            <td class="">2,100</td>
                            <td class="text-right"><div class="btn-group text-right">
                                <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active <span class="caret ml5"></span> </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li> <a href="#">Edit</a> </li>
                                  <li> <a href="#">Delete</a> </li>
                                  <li> <a href="#">Archive</a> </li>
                                  <li class="divider"></li>
                                  <li> <a href="#">Complete</a> </li>
                                  <li class="active"> <a href="#">Pending</a> </li>
                                  <li> <a href="#">Canceled</a> </li>
                                </ul>
                              </div></td>
                          </tr>
                            <tr>
                            <td class="w100"><img class="img-responsive mw20 ib mr10" title="user" src="assets/img/stock/products/thumb_6.jpg"></td>
                            <td class="">Apple Macbook 4th Gen - Silver</td>
                            <td class="">#66362</td>
                            <td class="">$1699</td>
                            <td class="">6,100</td>
                            <td class="text-right"><div class="btn-group text-right">
                                <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active <span class="caret ml5"></span> </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li> <a href="#">Edit</a> </li>
                                  <li> <a href="#">Delete</a> </li>
                                  <li> <a href="#">Archive</a> </li>
                                  <li class="divider"></li>
                                  <li> <a href="#">Complete</a> </li>
                                  <li class="active"> <a href="#">Pending</a> </li>
                                  <li> <a href="#">Canceled</a> </li>
                                </ul>
                              </div></td>
                          </tr>
                            <tr>
                            <td class="w100"><img class="img-responsive mw20 ib mr10" title="user" src="assets/img/stock/products/thumb_7.jpg"></td>
                            <td class="">Apple Iphone 16GB - Silver</td>
                            <td class="">#51362</td>
                            <td class="">$1299</td>
                            <td class="">5,200</td>
                            <td class="text-right"><div class="btn-group text-right">
                                <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active <span class="caret ml5"></span> </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li> <a href="#">Edit</a> </li>
                                  <li> <a href="#">Delete</a> </li>
                                  <li> <a href="#">Archive</a> </li>
                                  <li class="divider"></li>
                                  <li> <a href="#">Complete</a> </li>
                                  <li class="active"> <a href="#">Pending</a> </li>
                                  <li> <a href="#">Canceled</a> </li>
                                </ul>
                              </div></td>
                          </tr>
                          </tbody>
                      </table>
                      </div>
                  </div>
                  </div>
              </div>
              </section>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <section id="" class="table-layout animated fadeIn">
                <div class="tray tray-center">
                <div class="panel">
                    <div class="panel-headIndx"> <span class="panel-title hidden-xs"> Recent Orders</span> </div>
                    <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table admin-form theme-warning tc-checkbox-1 fs13" id="tab1_4">
                        <thead>
                            <tr class="bg-light">
                            <th class="">Image</th>
                            <th class="">Product Title</th>
                            <th class="">SKU</th>
                            <th class="">Price</th>
                            <th class="">Stock</th>
                            <th class="text-right">Status</th>
                          </tr>
                          </thead>
                        <tbody>
                            <tr>
                            <td class="w100"><img class="img-responsive mw20 ib mr10" title="user" src="assets/img/stock/products/thumb_1.jpg"></td>
                            <td class="">Apple Ipod 4G - Silver</td>
                            <td class="">#21362</td>
                            <td class="">$215</td>
                            <td class="">1,400</td>
                            <td class="text-right"><div class="btn-group text-right">
                                <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active <span class="caret ml5"></span> </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li> <a href="#">Edit</a> </li>
                                  <li> <a href="#">Delete</a> </li>
                                  <li> <a href="#">Archive</a> </li>
                                  <li class="divider"></li>
                                  <li> <a href="#">Complete</a> </li>
                                  <li class="active"> <a href="#">Pending</a> </li>
                                  <li> <a href="#">Canceled</a> </li>
                                </ul>
                              </div></td>
                          </tr>
                            <tr>
                            <td class="w100"><img class="img-responsive mw20 ib mr10" title="user" src="assets/img/stock/products/thumb_2.jpg"></td>
                            <td class="">Apple Smart Watch - 1G</td>
                            <td class="">#15262</td>
                            <td class="">$455</td>
                            <td class="">2,100</td>
                            <td class="text-right"><div class="btn-group text-right">
                                <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active <span class="caret ml5"></span> </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li> <a href="#">Edit</a> </li>
                                  <li> <a href="#">Delete</a> </li>
                                  <li> <a href="#">Archive</a> </li>
                                  <li class="divider"></li>
                                  <li> <a href="#">Complete</a> </li>
                                  <li class="active"> <a href="#">Pending</a> </li>
                                  <li> <a href="#">Canceled</a> </li>
                                </ul>
                              </div></td>
                          </tr>
                            <tr>
                            <td class="w100"><img class="img-responsive mw20 ib mr10" title="user" src="assets/img/stock/products/thumb_6.jpg"></td>
                            <td class="">Apple Macbook 4th Gen - Silver</td>
                            <td class="">#66362</td>
                            <td class="">$1699</td>
                            <td class="">6,100</td>
                            <td class="text-right"><div class="btn-group text-right">
                                <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active <span class="caret ml5"></span> </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li> <a href="#">Edit</a> </li>
                                  <li> <a href="#">Delete</a> </li>
                                  <li> <a href="#">Archive</a> </li>
                                  <li class="divider"></li>
                                  <li> <a href="#">Complete</a> </li>
                                  <li class="active"> <a href="#">Pending</a> </li>
                                  <li> <a href="#">Canceled</a> </li>
                                </ul>
                              </div></td>
                          </tr>
                            <tr>
                            <td class="w100"><img class="img-responsive mw20 ib mr10" title="user" src="assets/img/stock/products/thumb_7.jpg"></td>
                            <td class="">Apple Iphone 16GB - Silver</td>
                            <td class="">#51362</td>
                            <td class="">$1299</td>
                            <td class="">5,200</td>
                            <td class="text-right"><div class="btn-group text-right">
                                <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active <span class="caret ml5"></span> </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li> <a href="#">Edit</a> </li>
                                  <li> <a href="#">Delete</a> </li>
                                  <li> <a href="#">Archive</a> </li>
                                  <li class="divider"></li>
                                  <li> <a href="#">Complete</a> </li>
                                  <li class="active"> <a href="#">Pending</a> </li>
                                  <li> <a href="#">Canceled</a> </li>
                                </ul>
                              </div></td>
                          </tr>
                          </tbody>
                      </table>
                      </div>
                  </div>
                  </div>
              </div>
              </section>
            </div>
          </div>-->         
		 
        </div>
            <!-- end: .row -->
        </section>
        <!-- End: Content -->
        <div class="col-md-12">
            <div class="col-md-4 col-sm-4 col-xs-12"> </div>
        </div>
    </section>
    <!-- End: Content-Wrapper -->
    <?php $this->load->view($this->config->item('footer_view')); ?>
</div>
<?php $this->load->view($this->config->item('scripts_view')); ?>

<script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function(){
    $('#myTable').DataTable();
});
</script>


