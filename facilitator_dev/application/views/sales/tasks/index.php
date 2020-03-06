<div class="panel panel-flat">
    <div class="panel-heading">
        <div class="row">
            <div class="col-lg-6">
                <h6 class="panel-title"><?php echo $this->config->item('courses_view_learning_types_title'); ?></h6>
            </div>
            <div class="col-lg-6">
                <div class="text-right">
                    <a href="javascript:void(0);" class="btn btn-success order-learning-types-link" data-course_id="<?php echo $objCourse->id; ?>">Order By</a>
                    <?php echo anchor(base_url($this->config->item('courses_ajax_add_learning_type_uri').$objCourse->id), '<i class="icon-plus-circle2"></i>', 'class="btn btn-success add-learning-type-link" data-target="#learning-type-modal" data-popup="tooltip" title="Add"'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-framed table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php if(!empty($objLearningTypes)): ?>
                    <tbody>
                        <?php $nI = 1; ?>
                        <?php foreach($objLearningTypes as $objLearningType): ?>
                            <tr>
                                <td><?php echo $nI++; ?></td>
                                <td><?php echo $objLearningType->name; ?></td>
                                <td><span class="label <?php echo ($objLearningType->status == 1) ? 'label-success' : 'label-danger'; ?>"><?php echo $this->config->item('courses_learning_types_status')[$objLearningType->status]; ?></span></td>
                                <td>
                                    <?php
                                        echo anchor(base_url($this->config->item('courses_ajax_edit_learning_type_uri').$objCourse->id.'/'.$objLearningType->id), '<i class="icon-pencil7"></i>', 'class="btn btn-primary edit-learning-type-link" data-target="#learning-type-modal" data-popup="tooltip" title="Edit"');
                                        echo ' ';
                                        echo anchor(base_url($this->config->item('courses_ajax_delete_learning_type_uri').$objCourse->id.'/'.$objLearningType->id), '<i class="icon-trash"></i>', 'class="btn btn-danger delete drop" data-popup="tooltip" title="Delete"');
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>