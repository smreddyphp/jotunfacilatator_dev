<table class="table admin-form theme-warning tc-checkbox-1 fs13">
    <thead>
    <tr class="bg-light">
        <th>S.No</th>
        <th>Image</th>
        <th>Code</th>
        <th>Email</th>
        <th>Registered</th>
        <th>User</th>
        <th>Status</th>
        <th>View</th>
        <th>Assign Task</th>
    </tr>
    </thead>
    <tbody>
    <?php if(!empty($objUsers) && !isset($objUsers->message)): ?>
        <?php $nI = (($nOffset - 1) * $nLimit) + 1; ?>
        <?php foreach($objUsers as $objUser): ?>
            <tr>
                <td><?php echo $nI++; ?></td>
				<?php if($objUser->profile_image == ""){?>
				<td><img src="<?php echo base_url(); ?>server/assets/media/profile.png" class="media-object img-circle"></td>
				<?php }else{?>
                <td> <?php echo img(array('src' => $this->config->item('base_url').$this->config->item('shops_image_path').$objUser->profile_image), '','class="media-object img-circle", style=""'); ?></td>
				<?php } ?>
                <td><?php echo $objUser->code; ?></td>
                <td><?php echo $objUser->email; ?></td>
                <td><?php echo $objUser->modified; ?></td>
                <td>
                    <?php
                    if(isset($objUser->role) && !empty($objUser->role))
                        echo $objUser->role->name;
                    ?>
                </td>
                <td>
                  <span class="label <?php echo ($objUser->status == 1) ? 'label-success' : 'label-danger'; ?>">
                      <?php echo $this->config->item('users_status')[$objUser->status]; ?>
                  </span>
                </td>
                <td><?php echo anchor(base_url($this->config->item('sales_view_uri').$objUser->id), 'View Forms', 'class="btn btn-xs btn-success"'); ?></td>
                <td>
                   <!----<?php echo anchor(base_url($this->config->item('sales_ajax_add_task_uri').$objUser->id), 'Assign Task', 'class="btn btn-success br2 btn-xs fs12 dropdown-toggle add-task-link" data-popup="tooltip" title="Add"'); ?>--->

                   <a href="<?php echo base_url(); ?>sales/task/<?php echo $objUser->id ?>" class="btn btn-success br2 btn-xs fs12">Assign Task</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5" align="center">
                <?php echo isset($objUsers->message) ? $objUsers->message : $this->config->item('no_data_found_message'); ?>
            </td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
<!-- Pagination -->
<?php $this->load->view($this->config->item('pagination_view')); ?>
<!-- /Pagination -->
<style>
    

.admin-form img.media-object.img-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}
</style>