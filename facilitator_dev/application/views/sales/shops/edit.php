<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h5 class="modal-title"><?php echo $this->config->item('courses_edit_learning_type_title'); ?></h5>
</div>

<!-- Form inside modal -->
<form action="<?php echo base_url($this->config->item('courses_ajax_edit_learning_type_uri').$nCourseID.'/'.$nLearningTypeID); ?>" method="post"  role="form">
    <div class="modal-body has-padding">
        <div class="form-group">
            <label>Learning Type: </label>
            <?php echo form_dropdown('static_learning_type_id', $arrLearningTypes, $objLearningType->static_learning_type_id, 'data-placeholder="Choose a Learning Type..." class="select-search" tabindex="2" style="display: block"'); ?>
        </div>

        <div class="form-group">
            <label>Status: </label>
            <?php echo form_dropdown('status', $this->config->item('courses_learning_types_status'), $objLearningType->status, 'data-placeholder="Choose a Status..." class="select-search" tabindex="2" style="display: block"'); ?>
        </div>
    </div>

    <div class="modal-footer">
        <?php echo form_button(array('content' => 'Close', 'class' => 'btn btn-warning', 'data-dismiss' => 'modal')); ?>
        <?php echo form_submit(array('value' => 'Submit', 'class' => 'btn btn-primary')); ?>
    </div>

</form>