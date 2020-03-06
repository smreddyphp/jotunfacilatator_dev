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
a.carousel-control{
   background-image:none !important;
   top: 40%;
   font-size: 40px;
   color: #fff;
}
</style>
<div id="main">
  <?php $this->load->view($this->config->item('header_view')); ?>
  <?php $this->load->view($this->config->item('sidebar_view')); ?>

<section id="content_wrapper">
    
    <div class="row mb10">
    <div class="inner-header mb10">
  	<div class="bread-cumLeft">
  	<ol class="breadcrumb"><li>Home</li><li class="crumb-active">View Forms</li></ol>
    </div>
    
  </div>
    </div>

      <!-- Start: Topbar -->
      <header id="topbar" class="ph10">
        <div class="topbar-left">
          <ul class="nav nav-list nav-list-topbar pull-left">
            <li class="active">
              <a href=""> View Forms</a>
            </li>
          </ul>
  <ul class="nav nav-list nav-list-topbar pull-left">
<?php $md = $modified_date['modified']; if($md == "" || $md == "0000-00-00 00:00:00"){ ?>
<?php }else{?>
            <li class="">
              <a href="#" style="margin-left:250px;font-size: 14px;"> Last Modified    :   <?php echo date("Y-m-d", strtotime($modified_date['modified'])); ?></a>
            </li>
<?php } ?>
          </ul>
            <?php //echo anchor(base_url($this->config->item('forms_download_uri').'/'.$objUser->id), 'Download', 'class = "btn btn-info pull-right"'); ?>
        </div>
      </header>
      <!-- End: Topbar -->
      

      <!-- Begin: Content -->
      <section id="content" class="table-layout">

        <!-- begin: .tray-center -->
        <div class="tray tray-center" style="height: 598px;">

		<h3>My Account Information</h3>
          <!-- recent orders table -->
  		 <div class="panel">
            <div class="panel-heading">
            	Your Basic Information
               <span> <a href="<?php echo site_url('sales/export_csv/'.$task_id.'/'.$task_form_id.'/'.$objUser->form_id);?>" class="btn btn-info btn-xs">Export To Csv</a></span>
              <a href="#" class="pull-right" data-toggle="modal" data-target="#myModal">View Images</a>
            </div>
            <div class="panel-body">
             <div class="">
      		 <div class="row">
                <div class=" col-md-12"> 
                <div class="table-responsive">
                  <table class="table table-user-information rowDetails-sigle">
                  	<tbody><tr>
                    	<td colspan="10">
                        	<div class="media">
                            	<div class="pull-left"><h1 class="forjm-logo"><?php echo $objUser->shop->name; ?></h1></div>
                                <div class="media-body">
                                	<h4><?php echo $objUser->form->name; ?></h4>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Serial No</th>
                        <th colspan="2">Acct/Date</th>
                        <td colspan="2">06/4/2009</td>
                        <th>Shop Name</th>
                        <td><?php echo $objUser->shop->name; ?></td>
                        <th colspan="3" class="text-center">Shop Type</th>
                    </tr>
                    <tr>
                    	<td rowspan="3" class="text-center" style="font-size: 20px;"><?php echo $objUser->id ?></td>
                        <th colspan="2">Area/City</th>
                        <td colspan="2"><?php echo $objUser->shop->address; ?></td>  
                        <th>Last Evaluation</th>
                                                  <?php $task_id = $objUser->task_id;
                                                  $data['last_modified'] = $this->load->sales_model->getmodified_shops($task_id); ?>
                        <td><?php print_r($data['last_modified']['modified']); ?></td>
                            <td class="text-center">Type 1</td>
                            <td class="text-center">Type 2</td>
                            <td class="text-center">Type 3</td>
                    </tr>
                    <tr>
                    	<th colspan="2">Date</th>
                        <td colspan="2">15/12/2015</td>
                        <th>Account No</th>
                        <td><?php echo $objUser->shop->acc_no; ?></td>
                        <?php $shop_type = $objUser->shop->shop_type_id ?>
                        <?php switch ($shop_type) {
                           case 1: ?>
                                <td class="text-center"><i class="fa fa-check green"></i></td>
                                <td class="text-center"><i class="fa fa-close red"></i></td>
                                <td class="text-center"><i class="fa fa-close red"></i></td>
                           <?php break;
                           case 2: ?>
                                <td class="text-center"><i class="fa fa-close red"></i></td>
                                <td class="text-center"><i class="fa fa-check green"></i></td>
                                <td class="text-center"><i class="fa fa-close red"></i></td>
                           <?php break;
                           case 3: ?>
                                <td class="text-center"><i class="fa fa-close red"></i></td>
                                <td class="text-center"><i class="fa fa-close red"></i></td>
                                <td class="text-center"><i class="fa fa-check green"></i></td>
                           <?php break;
                            
                            default:
                               echo $objUser->shop->shop_type_id;
                                break;
                        } ?>
                    </tr>
                  </tbody></table>
                </div>
                </div>
              </div>
              </div>
            </div>
          </div>
          
         <div class="panel">
            <div class="panel-heading">
            	Painting and Shop Staff Training with Points
            </div>
            <div class="panel-body">
             <div class="">
          		 <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                          <table class="table table-user-information rowDetails-sigle">
                               <tbody>
                                  <tr>
                                     <th></th>
                                     <th></th>
                                     <th>Score</th>
                                     <th>Comments</th>
                                  </tr>
                                  <?php  $total_points = 0 ?>
                                  <?php if(isset($objUser->sub_forms)): ?>
                                  <?php foreach($objUser->sub_forms as $objPoints): ?>
                                      <?php foreach($objPoints->points as $objPoint): ?>
                                        <?php $total_points = $total_points+$objPoint->value; ?>
                                          <tr>
                                             <td>
                                                <p><?php echo $objPoint->id; ?></p>
                                             </td>
                                             <td>
                                                <p><?php echo $objPoint->name; ?></p>
                                             </td>
                                             <td>
                                                <p><?php echo $objPoint->value; ?></p>
                                             </td>
                                             <td>
                                                <p><?php echo $objPoint->comment; ?> </p>
                                             </td>
                                          </tr>
                                      <?php endforeach; ?>
                                  <?php endforeach; ?>
                                  <?php endif; ?>                     
                                  <tr>
                                     <th colspan="2">
                                        <p><strong>Total Points</strong></p>
                                     </th>
                                     <th>
                                        <p><?php  echo $total; ?></p>
                                     </th>
                                     <th>Full Score = <?php echo $objUser->form->total; ?></th>
                                  </tr>
                                  <tr>
                                     <th colspan="2">
                                        <p>Bonus %</p>
                                     </th>
                                     
                                     <?php  if($objUser->form_id == 1) { $bonus = $total/2; $bp = $bonus/100;  ?>
                                     <td><b>1 %</b></td>
                                     <th><?php echo $bp; ?></th>
                                     <?php } ?>
                                     
                                     
                                     <?php  if($objUser->form_id == 5 || $objUser->form_id == 3) { $bonus = $total*1; $bp = $bonus/100;  ?>
                                     <td><b>1 %</b></td>
                                     <th><?php echo $bp; ?></th>
                                     <?php } ?>
                                     
                                     <?php  if($objUser->form_id == 2) { $bonus = $total*1; $bp = $bonus/100;  ?>
                                     <td><b>2 %</b></td>
                                     <th><?php echo $bp; ?></th>
                                     <?php } ?>
                                     
                                     <?php  if($objUser->form_id == 4) { $bonus = $total*0.5; $bp = $bonus/100;  ?>
                                     <td><b>0.5 %</b></td>
                                     <th><?php echo $bp; ?></th>
                                     <?php } ?>
                                     
                                     <?php if($objUser->form_id == 6 || $objUser->form_id == 7 || $objUser->form_id == 8) { $bonus = $total*1.5; $bp = $bonus/100;  ?>
                                     <td><b>1.5 %</b></td>
                                     <th><?php echo $bp; ?></th>
                                     <?php } ?>
                                     
                                  </tr>
                                  <tr>
                                     <th colspan="2">
                                        <p>Checked By</p>
                                     </th>
                                     <td></td>
                              <td style="line-height:16px;"><span><strong>Mr.<?php echo ucwords($userinfo['username']);?></strong> <br> <!---<small>Sales Proprietor</small>---></span></td>
                                  </tr>
                               </tbody>
                            </table>
                        </div>
                    </div>
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
<?php $this->load->view($this->config->item('scripts_view')); ?>

 <div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">VIEW IMAGES</h4>
         </div>
         <div class="modal-body">
             <?php if(isset($objUser->images)): ?>
                <div id = "myCarousel" class = "carousel slide">
                   <!-- Carousel indicators -->
                   <ol class = "carousel-indicators">
                      <?php foreach($objUser->images as $nKey => $objImage): ?>
                        <li data-target="#myCarousel" data-slide-to="<?php echo $nKey; ?>" <?php echo ($nKey == 0) ? 'class="active"' : ''; ?>></li>
                      <?php endforeach; ?>
                   </ol>
                   <!-- Carousel items -->
                   <div class="carousel-inner">
                      <?php foreach($objUser->images as $nKey => $objImage): ?>
                        <div class="item<?php echo ($nKey == 0) ? ' active' : ''; ?>">
                          <?php echo img(array('src' => $this->config->item('base_url').$this->config->item('shops_image_path').$objImage->name), '','class="img-responsive"'); ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                   <!-- Carousel nav -->
                   <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                   <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                </div>
             <?php endif; ?>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
</body>