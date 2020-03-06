<input type="hidden" value="users" id="table_name">
<table class="table admin-form theme-warning tc-checkbox-1 fs13" id="dealerfilter_result" >
    <thead>
    <tr class="bg-light">
        <th>Select</th>
        <th>S.No</th>
        <th>Code</th>
        <th>Username</th>
        <th>Firstname</th>
<!---------<th>Lastname</th>------>
        <th>Email</th>
        <th>Phone</th>
        <th>User</th>
        <th>Status</th>
        <th>Edit</th>
  <?php if($this->lib_auth->getRoleID() == 1){ ?>
        <th>Delete</th>
<?php } ?>
    </tr>
    </thead>
    <tbody id="showresult">
    <?php if(!empty($objUsers) && !isset($objUsers->message)): ?>
        <?php $nI = (($nOffset - 1) * $nLimit) + 1; ?>
        <?php foreach($objUsers as $objUser): ?>
            <tr>
                <td class=""><label class="option block mn"><input type="checkbox" id="actionid" value="<?php echo $objUser->id; ?>" ><span class="checkbox mn"></span></label></td>
                <td><?php echo $nI++; ?></td>
                <td><?php echo $objUser->code; ?></td>
                <td><?php echo $objUser->username; ?></td>
                <td><?php echo $objUser->first_name; ?></td>
   <!-----------<td><?php echo $objUser->last_name; ?></td>---------->
                <td><?php echo $objUser->email; ?></td>
                <td><?php echo $objUser->phone; ?></td>
                <td>
                    <?php
                    if(isset($objUser->role) && !empty($objUser->role))
                        echo $objUser->role->name;
                    ?>
                </td>
                <td>
				<?php if($objUser->status == 1){?>
				<span class="label label-success" onclick="changestatusteam(<?php echo $objUser->id ?>,'1')">Active</span>
				<?php }else{?>
				<span class="label label-danger" onclick="changestatusteam(<?php echo $objUser->id ?>,'0')">Inactive</span>
				<?php } ?>
                    
                </td>
                <td><?php echo anchor(base_url($this->config->item('users_edit_uri').$objUser->id), 'Edit', 'class="btn btn-xs btn-success"'); ?></td>
  <?php if($this->lib_auth->getRoleID() == 1){ ?>
				<td class=""><span class="label label-danger" onclick="deleteteam(<?php echo $objUser->id; ?>)">Delete</span></td>  
<?php } ?>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="5" align="center"><?php echo isset($objUsers->message) ? $objUsers->message : $this->config->item('no_data_found_message'); ?></td></tr>
    <?php endif; ?>
    </tbody>
</table>
<!-- Pagination -->
<?php $this->load->view($this->config->item('pagination_view')); ?>
<!-- /Pagination -->
<div id="nodata"></div>