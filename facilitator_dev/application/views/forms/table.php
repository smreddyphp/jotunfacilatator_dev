<table class="table admin-form theme-warning tc-checkbox-1 fs13">
    <thead>
        <tr class="bg-light">
            <th>s.no</th>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php if(!empty($objForms) && !isset($objForms->message)): ?>
        <?php $nI = (($nOffset - 1) * $nLimit) + 1; ?>
        <?php foreach($objForms as $objForm): ?>
            <tr>
                <td><?php echo $nI++; ?></td>
                <td><?php echo $objForm->name; ?></td>
                <td><?php echo $objForm->description; ?></td>
                <td>
                    <span class="label <?php echo ($objForm->status == 1) ? 'label-success' : 'label-danger'; ?>">
                        <?php echo $this->config->item('forms_status')[$objForm->status]; ?>
                    </span>
                </td>
                <td><?php echo anchor(base_url($this->config->item('forms_edit_uri').$objForm->id), 'Edit', 'class="btn btn-xs btn-success"'); ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="5" align="center"><?php echo isset($objForms->message) ? $objForms->message : $this->config->item('no_data_found_message'); ?></td></tr>
    <?php endif; ?>
    </tbody>
</table>