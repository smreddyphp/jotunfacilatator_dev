
   <div class="modal-body">
    <div class="popup-staticpage-content">
        <div class="row">
            <h1 class="text-center fs20 mb20">Today Task Assignment</h1>
            <form action="<?php echo base_url($this->config->item('sales_ajax_add_task_uri').$nUserID); ?>" method="post" role="form">
                <div class="form-group">
                    <label class="col-lg-4  col-md-4 col-sm-6 col-xs-12  fs14 control-label text-right mt10" for="textArea1">Assign Shop</label>
                    <div class="col-lg-7  col-md-7 col-sm-6 col-xs-12">
                        <div class="">
                            <?php echo form_dropdown('shop_id', array('' => 'Select Shop') + $arrShops, $this->input->post('shop_id'), 'class="form-control"'); ?>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <?php if(!empty($arrForms)): ?>
                    <?php foreach($arrForms as $nKey => $strForm): ?>
                        <div class=" col-md-12 col-lg-12 col-sm-12  admin-form  tc-checkbox-1 checkboxess">
                            <div class="col-md-7 col-md-offset-4 col-sm-offset-4 mt10 mb10">
                                <label class="option block mn">
                                    <?php echo form_checkbox(array('name' => 'form_ids[]', 'value' => $nKey)); ?>
                                    <span class="checkbox mn outline"></span>
                                    <span class="ml5"><?php echo $strForm; ?></span>
                                </label>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="col-lg-4 col-md-4 col-md-offset-3 col-xs-offset-3 mb10 mt10">
                    <?php echo form_submit(array('value' => 'Submit', 'class' => 'btn btn-default pull-right')); ?>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <?php echo form_button(array('content' => 'Close', 'class' => 'btn btn-default', 'data-dismiss' => 'modal')); ?>
    </div>
</div>