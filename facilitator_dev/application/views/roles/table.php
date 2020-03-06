<table class="table admin-form theme-warning tc-checkbox-1 fs13">
    <thead>
    <tr class="bg-light">
        <th>S.NO</th>
        <th>Code</th>
        <th>Name</th>
        <th>Description</th>
        <th>Status</th>
        <th>Edit</th>
<th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php if(!empty($objRoles) && !isset($objRoles->message)): ?>
        <?php $nI = (($nOffset - 1) * $nLimit) + 1; ?>
        <?php foreach($objRoles as $objRole): ?>
            <tr>
                <td><?php echo $nI++; ?></td>
                <td><?php echo $objRole->code; ?></td>
                <td><?php echo $objRole->name; ?></td>
                <td><?php echo $objRole->description; ?></td>
                <td>
                    <span class="label <?php echo ($objRole->status == 1) ? 'label-success' : 'label-danger'; ?>">
                        <?php echo $this->config->item('roles_status')[$objRole->status]; ?>
                    </span>
                </td>
                <td><?php echo anchor(base_url($this->config->item('roles_edit_uri').$objRole->id), 'Edit', 'class="btn btn-xs btn-success"'); ?></td>
<td class=""><span class="label label-danger" onclick="deletedata(<?php echo $objRole->id; ?>)">Delete</span></td> 
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="5" align="center"><?php echo isset($objRoles->message) ? $objRoles->message : $this->config->item('no_data_found_message'); ?></td></tr>
    <?php endif; ?>
    </tbody>
</table>