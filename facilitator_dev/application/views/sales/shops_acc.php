    <div class="col-md-10 form-group" id="shop_account_number_replace">
        <label for="name1" class="col-md-4 col-sm-4 col-xs-12" style="text-align: right;">Shops Account Number<span class="star">*</span></label>
		<div class="col-md-8 col-sm-8 col-xs-12" >
			<select name="shop_acc_number" class="form-control">
			    <option value="">Select Shop Number</option>			
			<?php foreach($shops as $result){ ?>
			    <option value="<?php echo $result['acc_no']; ?>"><?php echo $result['acc_no']; ?></option>
			<?php } ?>				
			</select>
		</div>
	</div>
