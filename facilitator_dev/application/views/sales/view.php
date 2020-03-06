<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    
<body class="dashboard-page sb-l-o sb-r-c">
    
    <style>
     .datepicker.datepicker-dropdown.dropdown-menu.datepicker-orient-right.datepicker-orient-top {  
         position: absolute;
    left: 45% !important;
    right: 40% !important;
}
.dropdown-menu {
    right: 40% !important;
    width: 230px;
}
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
                                        <?php if ($objUser->profile_image == "") { ?>
                                            <img src="<?php echo base_url(); ?>server/assets/media/profile.png" class="media-object img-circle"  style="width:70px">
                                        <?php } else { ?>
                                        <img src="<?php echo base_url(); ?>server/assets/media/<?php echo $objUser->profile_image; ?>" style="width:70px;height:70px;" class="media-object img-circle"> <?php //echo img(array('src' => $this->config->item('base_url').$this->config->item('shops_image_path').$user->profile_image), '','class="media-object img-circle", style=""'); ?></td>
                                            <?php //echo img(array('src' => $this->config->item('base_url') . $this->config->item('shops_image_path') . $objUser->profile_image), '', 'class="media-object img-circle", style="width:70px;height:70px;"'); ?>
                                        <?php } ?>
                                    </div>
                                    <div class="media-body form_text"> <a href="form_description.php">
                                            <h3 class="media-heading"><?php echo $objUser->username; ?></h3>
                                            <p>Emp ID:<?php echo $objUser->code; ?></p>
                                        </a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($objUser->forms) && !empty($objUser->forms)): ?>
                        <?php foreach ($objUser->forms as $objForm): ?>
                            <div class="panel">
                                <div class="panel-body pn form-border">
                                    <div class="container">
                                        <div class="row form_h3">
                                            <h3> <?php echo anchor(base_url($this->config->item('sales_shops_view_uri') . $objUser->id . '/' . $objForm->id), $objForm->name); ?><h3>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            </div>

                                            <!-- end: .tray-center -->
                                            </section>
                                            <!-- recent orders table -->
                                            <div class="col-md-12">
                                                <div class="panel">
                                                    <div class="panel-body pn">
                                                        <div class="container">
                                                            <div class="row p-t-sm">
                                                                <div class="col-md-12 " align="center">
                                                                    <div class=" col-md-8">
                                                                        <div class=""> 
                                                                            <h3>Work History</h3>
                                                                        </div>
                                                                        <div class="filter-form"> 
                                                                            <form action="<?= base_url()?>sales/view_date_search" class="form-inline" method="post">
                                                                                <div class="form-group">
                                                                                    <input type="hidden" name="user_id" value="<?php echo $objUser->id; ?>"/>
                                                                                   <input class="form-control hasDatepicker" id="fromdate" name="fromdate" placeholder="From Date" type="text">
                                                                                </div>
                                                                                <div class="form-group">

                                                                                   <input class="form-control hasDatepicker" id="todate" name="todate" placeholder="To Date" type="text">
                                                                                </div>
                                                                                <button type="submit" class="btn btn-default">Filter</button>
                                                                            </form>
                                                                        </div>
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped table-user-information table-bordered">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Shop Name</th>
                                                                                        <th>Form Name</th>
                                                                                        <th>Last Visited</th>

                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php foreach ($objUser_geo as $geo_data) {
 ?>  
                                                                                        <tr>

                                                                                            <td><?= $geo_data['name'] ?></td>

                                                                                            <td><?= $geo_data['formname']?></td>
                                                                                            <td><?= $geo_data['modified']?></td>


                                                                                        </tr>
                                                                                    <?php } ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>

                                                                        <div class="clearfix"></div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <style>
                                                                #map_canvas {
                                                                    height: 500px;
                                                                    width: 100%;
                                                                    margin: 0px;
                                                                    padding: 0px
                                                                }
                                                                .filter-form {
                                                                    margin-bottom: 15px;
                                                                }
                                                                .filter-form input{
                                                                    height: 34px;
                                                                    margin-right: 10px;
                                                                }
                                                                .filter-form button.btn.btn-default{
                                                                    padding: 5px 30px;
                                                                    border-radius: 2px;
                                                                    margin-left: 15px;
                                                                    background-color: #30a487;
                                                                    border-color: #30a487;
                                                                    color: #fff;
                                                                    font-size: 14px;
                                                                }
                                                            </style>
                                                        </div>
                                                    </div>
                                                </div>     </div>

                                            <div class="col-md-12">

                                                <div id="map_canvas" style="width:100%;height:400px; border: 2px solid #3872ac; padding: 10px;"></div>
                                            </div>


                                            </div>
                                            <!-- End: Content -->
                                            </section>

                                            <script>

                                                var geocoder;
                                                var map;
                                                var lastCoordinates = [];
                                                var count = 0;
                                                var polyline;
                                                var path = []; // global variable to hold all the past locations
                                                var xgeo = 0.0;
                                                var ygeo = 0.0;
                                                function initialize() {

                                                    map = new google.maps.Map(
                                                            document.getElementById("map_canvas"), {
                                                        center: new google.maps.LatLng(37.4419, -122.1419),
                                                        zoom: 13,
                                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                                    });
                                                    polyline = new google.maps.Polyline({
                                                        // set desired options for color width
                                                        strokeColor: "#0000FF", // blue (RRGGBB, R=red, G=green, B=blue)
                                                        strokeOpacity: 0.5      // opacity of line
                                                    }); // create the polyline (global)
<?php foreach ($objUser_geo as $geo_data) { ?>
                                                        xgeo = '<?= $geo_data['latitude'] ?>';
                                                        ygeo = '<?= $geo_data['longitude'] ?>';
                                                        var name = '<?= $geo_data['name'] ?>';
                                                        abc(xgeo, ygeo, name);
<?php } ?>
                                                    setInterval(get_geodata, 3000);


                                                }
                                                function get_geodata()
                                                {
                                                    var uid = '<?= $objUser->id ?>';
                                                    //                                                    alert(uid);
                                                    $.post("<?= base_url() ?>sales/get_geodata", {id: uid}, function (data, status) {
                                                        //                                                        alert("Data: " + data + "\nStatus: " + status);
                                                        var obj = JSON.parse(data);
                                                        //                                                        console.log(obj[0]);
                                                        abc(obj[0].lattitude, obj[0].longitude, obj[0].username);
                                                    });
                                                }
                                                function abc(x, y, name) {
                                                    var objects = {};

                                                    count++;

                                                    objects[count] = {latitude: x, longitude: y, name: name};
                                                    //                                                    console.log(objects[count]);
                                                    gotdata(objects[count]);


                                                }
                                                //                                                google.maps.event.addDomListener(window, "load", initialize);

                                                function gotdata(obj) {

                                                    // if (xmlhttp.readyState == 4){
                                                    //                                                    count++;
                                                    // var d = xmlhttp.responseXML.documentElement 
                                                    //innerHTML shouldn't work for XML-Nodes
                                                    y = obj.longitude; // d.getElementsByTagName("y")[0].textContent,
                                                    x = obj.latitude; //d.getElementsByTagName("x")[0].textContent,
                                                    h = [obj.latitude, obj.longitude].join('_');

                                                    if (lastCoordinates[h]) {
                                                        return;
                                                    }
//                                                        var infowindow = new google.maps.InfoWindow({
//                                                            content: obj.name
//                                                        });
                                                    lastCoordinates[h] = new google.maps.Marker({
                                                        position: new google.maps.LatLng(x, y),
                                                        map: map,
                                                        title: obj.name
                                                    });
//                                                        lastCoordinates[h].addListener('click', function () {
//                                                            infowindow.open(map, lastCoordinates[h]);
//                                                        });
                                                    map.panTo(lastCoordinates[h].getPosition());
                                                    path.push(lastCoordinates[h].getPosition());
                                                    if (path.length >= 2) {
                                                        // display the polyline once it has more than one point
                                                        polyline.setMap(map);
                                                        polyline.setPath(path);
                                                    }
                                                    // }
                                                }
                                            </script>
                                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB985jmPF1O1jxwIROcqBF8c2T2Jd563ZM&callback=initialize"></script> 
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

                                            <!-- BEGIN: PAGE SCRIPTS -->

                                            <!-- jQuery -->
                                            <?php $this->load->view($this->config->item('footer_view')); ?>
                                            <?php $this->load->view($this->config->item('scripts_view')); ?>
                                            <script src="<?php echo base_url($this->config->item('js_validate_min')); ?>" type='text/javascript'></script>
<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>





<script>
	$(document).ready(function(){
		var date_input=$('input[name="fromdate"]'); //our date input has the name "date"
                var date_inputto=$('input[name="todate"]');
		
		date_input.datepicker({
			format: 'yyyy-mm-dd',
			todayHighlight: true,
			autoclose: true,
		})
                date_inputto.datepicker({
			format: 'yyyy-mm-dd',
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>