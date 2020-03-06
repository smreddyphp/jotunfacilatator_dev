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
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMy7kVNonnVqF0qD360rTewRcNjj8HA10&callback=initialize"></script> 
 <!-- Start: Content-Wrapper -->
    
        <section id="content_wrapper">
            <div class="row mb10">
      <div class="inner-header mb10">
        <div class="bread-cumLeft">
            <ol class="breadcrumb">
              <li>Home</li>
              <li class="crumb-active">Online Users</li>
            </ol>
        </div>      
      </div>
    </div>

      <!-- Begin: Content -->
      <section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">

        
          <div class="panel">
            <div class="panel-heading">
                <h4><strong>Online Users</strong></h4>
              </div>
            <div class="panel-menu admin-form theme-primary">

            <div class="panel-body pn">
              <div class="table-responsive">
                
            <div id="map" style="height: 600px;"></div>
              </div>
              
            </div>
          </div>

        </div>
        <!-- end: .tray-center -->
      </section>
      <!-- End: Content -->
           
        </section>
        <script type="text/javascript">

            var locations = JSON.parse('<?= json_encode($geo) ?>');
            var bounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: new google.maps.LatLng(23.8859, 45.0792),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            for (i = 0; i < locations.length; i++) {
                var coor = new google.maps.LatLng(locations[i].lattitude, locations[i].longitude);
                bounds.extend(coor);
                marker = new google.maps.Marker({
                    position: coor,
                    map: map
                });

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infowindow.setContent(locations[i].first_name);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
                map.fitBounds(bounds);
            }
            var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function (event) {
                this.setZoom(12);
                google.maps.event.removeListener(boundsListener);
            });
        </script>
    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    <?php $this->load->view($this->config->item('footer_view')); ?>
    <?php $this->load->view($this->config->item('scripts_view')); ?>
    <script src="<?php echo base_url($this->config->item('js_validate_min')); ?>" type='text/javascript'></script>