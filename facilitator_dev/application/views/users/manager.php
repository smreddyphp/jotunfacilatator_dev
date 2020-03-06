	<label for="name1" class="col-md-4 col-sm-4 col-xs-12">Select Manager<span class="star">*</span></label>
	<div class="col-md-8 col-sm-8 col-xs-12">
		<label for="status" class="field select">
			<select class="form-control" name="manager_id" id="manager_id">							
				<option value=""> Select Manager</option>	
				<?php foreach($mresult as $value){?>					
				<option value="<?php echo $value['id']; ?>"><?php echo $value['username']; ?></option>
				<?php } ?>
			</select>
		</label>
