    <div class="col-md-10 form-group" id="shops_zone_replace">
        <label for="name1" class="col-md-4 col-sm-4 col-xs-12" style="text-align: right;">Select Shop<span class="star">*</span></label>
		<div class="col-md-8 col-sm-8 col-xs-12" >
			<select name="shop[]" class="form-control" multiple="multiple" id="shopsadd2" size="2">				
			<?php foreach($shops as $result){ ?>
			<option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
			<?php } ?>				
			</select>
		</div>
	</div>
	
<script>
$(function () {
            $('#shopsadd2').multiselect({
                includeSelectAllOption: false
            });
            $('#btnSelected').click(function () {
                var selected = $("#shopsadd2 option:selected");
                var message = "";
                selected.each(function () {
                    message += $(this).text() + " " + $(this).val() + "\n";
                });                
            });
        });
</script>