<!-- Page header -->
<?php $this->load->view($this->config->item('page_header_view')); ?>
<!-- /page header -->
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <?php $this->load->view($this->config->item('sidebar_view')); ?>
        <!-- /main sidebar -->

        <!-- Main content -->
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-horizontal">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
								<div class="row">
									<div class="col-lg-6">
										<h5 class="panel-title"><?php echo $this->config->item('categories_view_title'); ?></h5>
									</div>
									<div class="col-lg-6">
										<div class="text-right">
											<?php echo anchor(base_url($this->config->item('categories_edit_uri').$objCategory->id), '<i class="icon-pencil7"></i>', 'class="btn btn-primary" data-popup="tooltip" title="Edit"'); ?>
										</div>
									</div>
								</div>
                            </div>

							<div class="panel-body">

								<div class="form-group">
									<label class="control-label col-lg-2">Name: </label>
									<div class="col-lg-10">
										<p class="form-control-static"><?php echo $objCategory->name; ?></p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-lg-2">Description: </label>
									<div class="col-lg-10">
										<p class="form-control-static"><?php echo $objCategory->description; ?></p>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-2">Code: </label>
									<div class="col-lg-10">
										<p class="form-control-static"><?php echo $objCategory->code; ?></p>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-2">Order: </label>
									<div class="col-lg-10">
										<p class="form-control-static"><?php echo $objCategory->order_by; ?></p>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-2">Status: </label>
									<div class="col-lg-10">
										<p class="form-control-static"><?php echo $this->config->item('categories_status')[$objCategory->status]; ?></p>
									</div>
								</div>

							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /main content -->

</div>
<!-- /page content -->

</div>
<!-- /page container -->

<!-- Footer -->
<?php $this->load->view($this->config->item('footer_view')); ?>
<!-- /footer -->