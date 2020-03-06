<table class="table admin-form theme-warning tc-checkbox-1 fs13">
    <thead>
    <tr class="bg-light">
        <th>#</th>
        <th>Name</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php if(!empty($objShopTypes) && !isset($objShopTypes->message)): ?>
        <?php $nI = (($nOffset - 1) * $nLimit) + 1; ?>
        <?php foreach($objShopTypes as $objShopType): ?>
            <tr>
                <td><?php echo $nI++; ?></td>
                <td><?php echo $objShopType->name; ?></td>
                <td>
                    <span class="label <?php echo ($objShopType->status == 1) ? 'label-success' : 'label-danger'; ?>">
                        <?php echo $this->config->item('shop_types_status')[$objShopType->status]; ?>
                    </span>
                </td>
                <td><?php echo anchor(base_url($this->config->item('shop_types_edit_uri').$objShopType->id), 'Edit', 'class="btn btn-xs btn-success"'); ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="5" align="center"><?php echo isset($objShopTypes->message) ? $objShopTypes->message : $this->config->item('no_data_found_message'); ?></td></tr>
    <?php endif; ?>
    </tbody>
</table>