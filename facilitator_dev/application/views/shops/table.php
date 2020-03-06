<input type="hidden" id="table_name" value='shops'>
<div id="show_shop_result">
<table class="table admin-form theme-warning tc-checkbox-1 fs13" id="dealerfilter_result">
    <thead>
    <tr class="bg-light">
        <th class="text-center">Select</th>
        <th class="text-center">SI No</th>
        <th>Avatar</th>
        <th>Shop Name</th>
        <th>Address</th>
        <th>Account No</th>
        <th>Owner Email</th>
        <th>Last Evalution</th>
        <th> Shop Type</th>
        <th>Status</th>
        <th>Action</th>
        <th>view</th>
 <?php if($this->lib_auth->getRoleID() == 1){ ?>
        <th>Delete</th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
    <?php if(!empty($objShops) && !isset($objShops->message)): ?>
        <?php $nI = (($nOffset - 1) * $nLimit) + 1; ?>
        <?php foreach($objShops as $objShop): ?>
        <?php
        $shop_id = $objShop->id;
        $data['last_evaluation'] = $this->load->sales_model->get_lm_tfp($shop_id);
        ?>
            <tr>
<td class=""><label class="option block mn"><input type="checkbox" id="actionid" value="<?php echo $objShop->id; ?>" ><span class="checkbox mn"></span></label></td>
                <td><?php echo $nI++; ?></td>
                <td class="w50">
				<?php if($objShop->image == ""){?>
				<img src="<?php echo base_url(); ?>server/assets/media/default-shop-icon.png" class="img-responsive mw30 ib mr10" >
				<?php }else{?>
                    <?php echo img(array('src' => $this->config->item('base_url').$this->config->item('shops_image_path').$objShop->image), '','class="img-responsive mw30 ib mr10"'); ?>
				<?php }?>
                </td>
                <td><?php echo $objShop->name; ?></td>
                <td><?php echo $objShop->address; ?></td>
                 <td><?php echo $objShop->acc_no; ?></td>
                <td><?php echo $objShop->email; ?></td>
                <td><?php print_r($data['last_evaluation']['last_evaluation']); ?></td>
                <td><?php if($objShop->shop_type_id == 1){ echo "Type1"; } else if($objShop->shop_type_id == 2){ echo "Type2"; }else if($objShop->shop_type_id == 3){ echo "Type3"; }?></td>
                <td>
                  <span class="label <?php echo ($objShop->status == 1) ? 'label-success' : 'label-danger'; ?>">
                      <?php echo $this->config->item('shops_status')[$objShop->status]; ?>
                  </span>
                </td>
                <td>
                    <!-----<?php echo anchor(base_url($this->config->item('shops_edit_uri').$objShop->id), 'Edit', 'class="btn btn-xs btn-success"'); ?>----------->
                    <a href="<?php echo base_url(); ?>index.php/shops/edit/<?php echo $objShop->id; ?>" class="btn btn-xs btn-success">Edit</a>
                </td>
                <td><!-----<?php echo anchor(base_url($this->config->item('sales_view_uri').$objShop->id), 'View verifier', 'class="btn btn-success br2 btn-xs fs12 dropdown-toggle"'); ?>----->
                    <a href="<?php echo base_url(); ?>sales/get_shop_verifiers/<?php echo $objShop->id; ?>" class="btn btn-success br2 btn-xs fs12">View verifier</a>
                </td>
 <?php if($this->lib_auth->getRoleID() == 1){ ?>
	<td><span class="btn btn-danger br2 btn-xs fs12" onclick="deleteteam('<?php echo $objShop->id; ?>')">Delete</span></td>
<?php  } ?>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="5" align="center"><?php echo isset($objShops->message) ? $objShops->message : $this->config->item('no_data_found_message'); ?></td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
<!-- Pagination -->
<?php $this->load->view($this->config->item('pagination_view')); ?>
<!-- /Pagination -->
</div>