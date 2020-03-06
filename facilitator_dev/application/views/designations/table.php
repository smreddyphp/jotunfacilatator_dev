<input type="hidden" id="table_name" value="designations">
<?php  $user_id =  $this->lib_auth->getUserID(); ?>
<table class="table admin-form theme-warning tc-checkbox-1 fs13">
    <thead>
    <tr class="bg-light">
        <th>#</th>
        <th>Code</th>
        <th>Name</th>
        <th>Description</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php if(!empty($objDesignations) && !isset($objDesignations->message)): ?>
        <?php $nI = (($nOffset - 1) * $nLimit) + 1; ?>
        <?php foreach($objDesignations as $objDesignation): ?>
		   <?php if($user_id == 1){?>
            <tr>
                <td><?php echo $nI++; ?></td>
                <td><?php echo $objDesignation->code; ?></td>
                <td><?php echo $objDesignation->name; ?></td>
                <td><?php echo $objDesignation->description; ?></td>
                <td>
                    <span class="label <?php echo ($objDesignation->status == 1) ? 'label-success' : 'label-danger'; ?>">
                        <?php echo $this->config->item('designations_status')[$objDesignation->status]; ?>
                    </span>
                </td>
                <td><?php echo anchor(base_url($this->config->item('designations_edit_uri').$objDesignation->id), 'Edit', 'class="btn btn-xs btn-success"'); ?>
            
<span class="label label-danger" onclick="deletedata(<?php echo $objDesignation->id; ?>)">Delete</span></td>
            </tr>
		   <?php }else{?>
		       <?php if($objDesignation->created_by == $user_id){?>
					 <tr>
                <td><?php echo $nI++; ?></td>
                <td><?php echo $objDesignation->code; ?></td>
                <td><?php echo $objDesignation->name; ?></td>
                <td><?php echo $objDesignation->description; ?></td>
                <td>
                    <span class="label <?php echo ($objDesignation->status == 1) ? 'label-success' : 'label-danger'; ?>">
                        <?php echo $this->config->item('designations_status')[$objDesignation->status]; ?>
                    </span>
                </td>
                <td><?php echo anchor(base_url($this->config->item('designations_edit_uri').$objDesignation->id), 'Edit', 'class="btn btn-xs btn-success"'); ?>
            
<span class="label label-danger" onclick="deletedata(<?php echo $objDesignation->id; ?>)">Delete</span></td>
            </tr>
			   <?php } ?>
		   <?php } ?>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="5" align="center"><?php echo isset($objDesignations->message) ? $objDesignations->message : $this->config->item('no_data_found_message'); ?></td></tr>
    <?php endif; ?>
    </tbody>
</table>