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
    </style>

    <?php $this->load->view($this->config->item('header_view')); ?>
    <?php $this->load->view($this->config->item('sidebar_view')); ?>
    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">
        <div class="row mb10">
            <div class="inner-header mb10">
                <div class="bread-cumLeft">
                    <ol class="breadcrumb">
                        <li>Home</li>
                        <li class="crumb-active">Shop Management</li>
                    </ol>
                </div>
                <div class="settings-right">
                    <div id="skin-toolbox">
                        <div class="panel">
                            <div class="panel-heading" unselectable="on" style="-moz-user-select: none;">
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
                                                    <input name="headerSkin" id="headerSkin8" checked="" value="" type="radio">
                                                    <label for="headerSkin8">Light</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-primary mb5">
                                                    <input name="headerSkin" id="headerSkin1" value="bg-primary" type="radio">
                                                    <label for="headerSkin1">Primary</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-info mb5">
                                                    <input name="headerSkin" id="headerSkin3" value="bg-info" type="radio">
                                                    <label for="headerSkin3">Info</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-warning mb5">
                                                    <input name="headerSkin" id="headerSkin4" value="bg-warning" type="radio">
                                                    <label for="headerSkin4">Warning</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-danger mb5">
                                                    <input name="headerSkin" id="headerSkin5" value="bg-danger" type="radio">
                                                    <label for="headerSkin5">Danger</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-alert mb5">
                                                    <input name="headerSkin" id="headerSkin6" value="bg-alert" type="radio">
                                                    <label for="headerSkin6">Alert</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-system mb5">
                                                    <input name="headerSkin" id="headerSkin7" value="bg-system" type="radio">
                                                    <label for="headerSkin7">System</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-success mb5">
                                                    <input name="headerSkin" id="headerSkin2" value="bg-success" type="radio">
                                                    <label for="headerSkin2">Success</label>
                                                </div>
                                                <div class="checkbox-custom fill mb5">
                                                    <input name="headerSkin" id="headerSkin9" value="bg-dark" type="radio">
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
                                                    <input name="sidebarSkin" checked="" id="sidebarSkin3" value="" type="radio">
                                                    <label for="sidebarSkin3">Dark</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-disabled mb5">
                                                    <input name="sidebarSkin" id="sidebarSkin1" value="sidebar-light" type="radio">
                                                    <label for="sidebarSkin1">Light</label>
                                                </div>
                                                <div class="checkbox-custom fill checkbox-light mb5">
                                                    <input name="sidebarSkin" id="sidebarSkin2" value="sidebar-light light" type="radio">
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
                                                    <input checked="" id="header-option" type="checkbox">
                                                    <label for="header-option">Fixed Header</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox-custom fill mb5">
                                                    <input checked="" id="sidebar-option" type="checkbox">
                                                    <label for="sidebar-option">Fixed Sidebar</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox-custom fill mb5">
                                                    <input id="breadcrumb-option" type="checkbox">
                                                    <label for="breadcrumb-option">Fixed Breadcrumbs</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox-custom fill mb5">
                                                    <input id="breadcrumb-hidden" type="checkbox">
                                                    <label for="breadcrumb-hidden">Hide Breadcrumbs</label>
                                                </div>
                                            </div>
                                            <h4 class="mv20">Layout Options</h4>
                                            <div class="form-group">
                                                <div class="radio-custom mb5">
                                                    <input id="fullwidth-option" checked="" name="layout-option" type="radio">
                                                    <label for="fullwidth-option">Fullwidth Layout</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb20">
                                                <div class="radio-custom radio-disabled mb5">
                                                    <input id="boxed-option" name="layout-option" disabled="" type="radio">
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
        <!-- Start: Topbar -->
        <header id="topbar" class="ph10">
            <div class="topbar-left">
                <ul class="nav nav-list nav-list-topbar pull-left">
                    <li class="active">
                        <a href="">Shop Management</a>
                    </li>
                </ul>
            </div>
        </header>
        <section id="content" class="table-layout">
            <div class="tray tray-center">
                <div class="panel mb25 mt5">
                    <div class="panel-heading">
                        <span class="panel-title hidden-xs"> Shop Management</span>
                    </div>
                    
                </div>
                <div class="panel">
                    <div class="panel-menu admin-form theme-primary">
                        <div class="row">
                            <div class="form-group">
                               

        
                                    <table class="table admin-form theme-warning tc-checkbox-1 fs13" id="dealerfilter_result">
    <thead>
    <tr class="bg-light">
        <th class="text-center">SI No</th>
        <th>Avatar</th>
        <th>Shop Name</th>
        <th>Owner Email</th>
        <th>Last Evalution</th>
        <th> Shop Type</th>
        <th>Status</th>     
        <th>view</th>
    </tr>
    </thead>
    <tbody>
   <?php $nI = (($nOffset - 1) * $nLimit) + 1; ?>
<?php if($shops_result == ""){?>
<?php }else{?>
<?php foreach($shops_result as $value){
 ?>
        <tr>
<td><?php echo $nI++; ?></td>
<td>
<?php if($value['image'] == ""){ ?>
<img src="<?php echo base_url(); ?>server/assets/media/default-shop-icon.png" class="img-responsive mw30 ib mr10">
<?php } else {?>
<img src="<?php echo base_url(); ?>server/assets/media/<?php echo $value['image']; ?>" class="img-responsive mw30 ib mr10">
<?php } ?>
</td>
<td><?php echo $value['name']; ?></td>
<td><?php echo $value['email']; ?></td>
<td><?php echo $value['last_evaluation']; ?></td>
<td><?php if($value['shop_type_id'] == 1){ echo "Type1"; }else if($value['shop_type_id'] == 2){ echo "Type2"; }else{ echo "Type3"; }?></td>
<td>
<?php if($value['status'] == 1){ ?> <span class="label label-success">Active</span><?php }else{ ?>
<span class="label label-primary">Pending</span>
<?php } ?></td>
<td><a href="<?php echo base_url(); ?>sales/shopsviewverifier/<?php echo $value['id']; ?>" class="btn btn-success br2 btn-xs fs12">View verifier</a></td>
        </tr>
<?php } ?>
<?php } ?>
    </tbody>
</table>
<!-- Pagination -->
<?php $this->load->view($this->config->item('pagination_view')); ?>
<!-- /Pagination -->
                               
                                
                            </div>
                        </div>
                    </div>               
                    
                    <div class="panel-body pn">
                        <div class="table-responsive">
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <?php $this->load->view($this->config->item('footer_view')); ?>
    <?php $this->load->view($this->config->item('scripts_view')); ?>
    <script src="<?php echo base_url($this->config->item('js_validate_min')); ?>" type='text/javascript'></script>
    <script>
                                                        // This example displays an address form, using the autocomplete feature
                                                        // of the Google Places API to help users fill in the information.

                                                        // This example requires the Places library. Include the libraries=places
                                                        // parameter when you first load the API. For example:
                                                        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

                                                        var placeSearch, autocomplete;
                                                        var componentForm = {
                                                            street_number: 'short_name',
                                                            route: 'long_name',
                                                            locality: 'long_name',
                                                            administrative_area_level_1: 'short_name',
                                                            country: 'long_name',
                                                            postal_code: 'short_name'
                                                        };
                                                        //Set up some of our variables.
                                                        var map; //Will contain map object.
                                                        var marker = false; ////Has the user plotted their location marker? 

                                                        function initAutocomplete() {
                                                            //The center location of our map.
                                                            var centerOfMap = new google.maps.LatLng(59.1313095, 10.2165948);

                                                            //Map options.
                                                            var options = {
                                                                center: centerOfMap, //Set center.
                                                                zoom: 7 //The zoom value.
                                                            };

                                                            //Create the map object.
                                                            map = new google.maps.Map(document.getElementById('dealer_map'), options);

                                                            //Listen for any clicks on the map.
                                                            google.maps.event.addListener(map, 'click', function (event) {
                                                                //Get the location that the user clicked.
                                                                var clickedLocation = event.latLng;
                                                                //If the marker hasn't been added.
                                                                if (marker === false) {
                                                                    //Create the marker.
                                                                    marker = new google.maps.Marker({
                                                                        position: clickedLocation,
                                                                        map: map,
                                                                        draggable: true //make it draggable
                                                                    });
                                                                    //Listen for drag events!
                                                                    google.maps.event.addListener(marker, 'dragend', function (event) {
                                                                        markerLocation();
                                                                    });
                                                                } else {
                                                                    //Marker has already been added, so just change its location.
                                                                    marker.setPosition(clickedLocation);
                                                                }
                                                                //Get the marker's location.
                                                                markerLocation();
                                                            });

                                                            // Create the autocomplete object, restricting the search to geographical
                                                            // location types.
                                                            autocomplete = new google.maps.places.Autocomplete(
                                                                    /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                                                                    {types: ['geocode']});

                                                            // When the user selects an address from the dropdown, populate the address
                                                            // fields in the form.
                                                            autocomplete.addListener('place_changed', fillInAddress);
                                                        }

                                                        //This function will get the marker's current location and then add the lat/long
                                                        //values to our textfields so that we can save the location.
                                                        function markerLocation() {
                                                            //Get location.
                                                            var currentLocation = marker.getPosition();
                                                            var geocoder = new google.maps.Geocoder;
                                                            //Add lat and lng values to a field that we can save.
                                                            document.getElementById('latitude').value = currentLocation.lat(); //latitude
                                                            document.getElementById('longitude').value = currentLocation.lng(); //longitude
                                                            var latlng = {lat: currentLocation.lat(), lng: currentLocation.lng()};
                                                            geocoder.geocode({'location': latlng}, function (results, status) {
                                                                if (status === 'OK') {
                                                                    if (results[1]) {
                                                                        for (var component in componentForm) {
                                                                            document.getElementById(component).value = '';
                                                                            document.getElementById(component).disabled = false;
                                                                        }
                                                                        //console.log( JSON.stringify(results) );
                                                                        // Get each component of the address from the place details
                                                                        // and fill the corresponding field on the form.
                                                                        for (var i = 0; i < results[0].address_components.length; i++) {
                                                                            var addressType = results[0].address_components[i].types[0];
                                                                            if (componentForm[addressType]) {
                                                                                var val = results[0].address_components[i][componentForm[addressType]];
                                                                                document.getElementById(addressType).value = val;
                                                                            }
                                                                        }
                                                                    } else {
                                                                        window.alert('No results found');
                                                                    }
                                                                } else {
                                                                    window.alert('Geocoder failed due to: ' + status);
                                                                }
                                                            });
                                                        }



                                                        function fillInAddress() {
                                                            // Get the place details from the autocomplete object.
                                                            var place = autocomplete.getPlace();

                                                            for (var component in componentForm) {
                                                                document.getElementById(component).value = '';
                                                                document.getElementById(component).disabled = false;
                                                            }

                                                            // Get each component of the address from the place details
                                                            // and fill the corresponding field on the form.
                                                            for (var i = 0; i < place.address_components.length; i++) {
                                                                var addressType = place.address_components[i].types[0];
                                                                if (componentForm[addressType]) {
                                                                    var val = place.address_components[i][componentForm[addressType]];
                                                                    document.getElementById(addressType).value = val;
                                                                }
                                                            }
                                                            var lat = place.geometry.location.lat();
                                                            var lng = place.geometry.location.lng();
                                                            document.getElementById("latitude").value = place.geometry.location.lat();
                                                            document.getElementById("longitude").value = place.geometry.location.lng();
                                                            data = {lat: lat, lng: lng};
                                                            var map = new google.maps.Map(document.getElementById('dealer_map'), {
                                                                zoom: 10,
                                                                center: data
                                                            });
                                                            var marker = new google.maps.Marker({
                                                                position: data,
                                                                map: map
                                                            });
                                                            //Listen for any clicks on the map.
                                                            google.maps.event.addListener(map, 'click', function (event) {
                                                                //Get the location that the user clicked.
                                                                var clickedLocation = event.latLng;
                                                                //If the marker hasn't been added.
                                                                if (marker === false) {
                                                                    //Create the marker.
                                                                    marker = new google.maps.Marker({
                                                                        position: clickedLocation,
                                                                        map: map,
                                                                        draggable: true //make it draggable
                                                                    });
                                                                    //Listen for drag events!
                                                                    google.maps.event.addListener(marker, 'dragend', function (event) {
                                                                        markerLocation();
                                                                    });
                                                                } else {
                                                                    //Marker has already been added, so just change its location.
                                                                    marker.setPosition(clickedLocation);
                                                                }
                                                                //Get the marker's location.
                                                                markerLocationNew(marker);
                                                            });


                                                        }
                                                        function markerLocationNew(marker) {
                                                            //Get location.
                                                            var currentLocation = marker.getPosition();
                                                            var geocoder = new google.maps.Geocoder;
                                                            //Add lat and lng values to a field that we can save.
                                                            document.getElementById('latitude').value = currentLocation.lat(); //latitude
                                                            document.getElementById('longitude').value = currentLocation.lng(); //longitude
                                                            var latlng = {lat: currentLocation.lat(), lng: currentLocation.lng()};
                                                            geocoder.geocode({'location': latlng}, function (results, status) {
                                                                if (status === 'OK') {
                                                                    if (results[1]) {
                                                                        for (var component in componentForm) {
                                                                            document.getElementById(component).value = '';
                                                                            document.getElementById(component).disabled = false;
                                                                        }
                                                                        //console.log( JSON.stringify(results) );
                                                                        // Get each component of the address from the place details
                                                                        // and fill the corresponding field on the form.
                                                                        for (var i = 0; i < results[0].address_components.length; i++) {
                                                                            var addressType = results[0].address_components[i].types[0];
                                                                            if (componentForm[addressType]) {
                                                                                var val = results[0].address_components[i][componentForm[addressType]];
                                                                                document.getElementById(addressType).value = val;
                                                                            }
                                                                        }
                                                                    } else {
                                                                        window.alert('No results found');
                                                                    }
                                                                } else {
                                                                    window.alert('Geocoder failed due to: ' + status);
                                                                }
                                                            });
                                                        }
                                                        // Bias the autocomplete object to the user's geographical location,
                                                        // as supplied by the browser's 'navigator.geolocation' object.
                                                        function geolocate() {
                                                            if (navigator.geolocation) {
                                                                navigator.geolocation.getCurrentPosition(function (position) {
                                                                    var geolocation = {
                                                                        lat: position.coords.latitude,
                                                                        lng: position.coords.longitude
                                                                    };
                                                                    var circle = new google.maps.Circle({
                                                                        center: geolocation,
                                                                        radius: position.coords.accuracy
                                                                    });
                                                                    autocomplete.setBounds(circle.getBounds());
                                                                });
                                                            }
                                                        }

                                                        document.getElementById("map_error").onclick = function () {
                                                            setTimeout(function () {
                                                                google.maps.event.trigger(map, "resize");
                                                            }, 1000);
                                                        };
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB985jmPF1O1jxwIROcqBF8c2T2Jd563ZM&libraries=places&callback=initAutocomplete" async defer></script> 
    
    <script type="text/javascript">
    $('#upload_profile_photo').click(function (e) {
                                                        e.preventDefault();
                                                        var fileUpload = document.getElementById("uploaded_file");
                                                        if (fileUpload.value != null) {
                                                            var uploadFile = new FormData();
                                                            var files = $("#uploaded_file").get(0).files;

                                                            if (files.length > 0) {
                                                                $(this).val("Processing...");
                                                                uploadFile.append("csv", files[0]);
                                                                $.ajax({
                                                                    url: "Shops/csvuploadfile",
                                                                    contentType: false,
                                                                    processData: false,
                                                                    data: uploadFile,
                                                                    type: 'POST',
                                                                    success: function (data) {
                                                                        var obj = jQuery.parseJSON(data);
//                                                                        alert(obj.success);
//                                                                        console.log(data);
                                                                        $('#upload_profile_photo').val("Upload CSV");
                                                                        $("#uploaded_file").val("");
                                                                        if (obj.error)
                                                                        {
                                                                            notify('Error', obj.error);
                                                                        }
                                                                        if (obj.success || obj.unsuccess)
                                                                        {
                                                                            notify('success', "Inserted rows :" + obj.success);
                                                                            notify('Error', "Not inserted rows :" + obj.unsuccess);
                                                                        }
                                                                    }
                                                                });
                                                            } else {
                                                                notify('error',"Choose CSV File");
                                                            }
                                                        } else {
                                                            notify('error',"Choose CSV File");
                                                        }

                                                    });
    

        // Validate form
        $('#addShopForm').validate({
            ignore: [],
            rules: {
                name: {
                    required: true
                },
                address: {
                    required: true
                },
                latitude: {
                    required: true
                },
                longitude: {
                    required: true
                },
                last_evaluation: {
                    required: true,
                    date : true
                },
                shop_type_id: {
                    required: true
                },
                acc_no: {
                    required: true
                },
                email: {
                    required: true
                }
            },
            submitHandler: function(form) {

                // Disable submit
                $(form).find('button[type="submit"]').text('Sending...').prop('disabled', true);

                // Call ajax
                ajaxResponse = ajaxCall($(form).attr('action'), "POST", $(form).serialize());
//console.log(ajaxResponse);
                if(typeof ajaxResponse == 'undefined')
                    return;
                
                if(ajaxResponse.success == false) {

                    if(ajaxResponse.result.validations != 'undefined') {

                        $.each(ajaxResponse.result.validations, function(key, value) {

                            $(form).find('button[name="'+key+'"], select[name="'+key+'"]').after(value);
                        });
                    }

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

                    $(form).find('button[type="submit"]').text('Submit').prop('disabled', false);

                    notify('failure', errorMessages.join('<br/>'));
                }

                if(ajaxResponse.success == true) {

                     notify('success', ajaxResponse.result.message);

                    // Enable submit
                    $(form).find('button[type="submit"]').text('Done!').prop('disabled', false), setTimeout(function(){
                        $(form).find('button[type="submit"]').text('Add New Shop');

                        // redirect to index
                        location.href = "<?php echo base_url($this->config->item('shops_index_uri')); ?>";
                    }, 1000);
                }
            }
        });

        // On change of file
        $('input:file').change(function () {

            // Create Uploader
            createUploader($(this).closest('form'))
        });

        // createUploader
        function createUploader(obj) {

            // Form Data
            objForm = new FormData();

            // Set
            objForm.append('file', obj.find('input[name="file"]')[0].files[0]);

            // Ajax Call
            $.ajax({
                url: "<?php echo $this->config->item('rest_media_url'); ?>",
                headers: {
                    'P-Auth-Token': "<?php echo $this->session->userdata('auth_token') ?>"
                },
                method: 'POST',
                dataType: 'json',
                data: objForm,
                processData: false,
                contentType: false,
                success: function(ajaxResult) {

                    if(ajaxResult.success == true)
                        obj.find('input[name="image"]').val(ajaxResult.result.file.result.key);
                }
            });
        }
    </script>
    <script type="text/javascript">

        $(document).on('change', 'select[name="filter_shop_type_id"], select[name="filter_status"]', function() {

            // Get shops list
            ajaxResult = get_shop_list("<?php echo base_url($this->config->item('shops_ajax_get_shops_by_search_uri')); ?>");

            if(typeof ajaxResult == 'undefined')
                return;

            if(ajaxResult.result.success == true) {

                $('.table-responsive').html(ajaxResult.result.view);
            }
        });

        // Get shop list
        function get_shop_list(url) {

            // Shop type id
            shop_type_id = $('select[name="filter_shop_type_id"]').val();

            // Status
            status = $('select[name="filter_status"]').val();

            // Call ajax
            return ajaxCall(url, "GET", {shop_type_id: shop_type_id, status: status});
        }
    </script>
    <script type="text/javascript">

        // Click on ajax page link
        $(document).on('click', '.ajax-paginate a', function(e) {

            e.preventDefault();

            // Get shops list
            ajaxResult = ajaxCall($(this).attr('href'), "GET");

            if(typeof ajaxResult == 'undefined')
                return;

            if(ajaxResult.result.success == true) {

                $('.table-responsive').html(ajaxResult.result.view);
            }
        });
    </script>
</body>