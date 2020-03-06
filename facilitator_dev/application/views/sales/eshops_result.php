  <?php if($arrShops == ""){ ?>
  <div class="col-md-10 form-group" id="shops_zone_replace">
        <label for="name1" class="col-md-4 col-sm-4 col-xs-12" style="text-align: right;">Select Shop<span class="star">*</span></label>
		<div class="col-md-8 col-sm-8 col-xs-12" >
			<select name="shop_id[]" class="form-control" multiple="multiple" id="shops" size="2">				
			<?php foreach($shops as $result){ ?>
			<option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
			<?php } ?>				
			</select>
		</div>
	</div>
    <?php }else{ ?>
<?php 
$temp=array();
foreach($arrShops as $result_tasks){ 
array_push($temp,$result_tasks['id']); 
} 
?>


<div class="col-md-10 form-group">
<label class="col-lg-4  col-md-4 col-sm-6 col-xs-12  fs14 control-label text-right mt10" for="textArea1">Assign Shop</label>
<div class="col-lg-8  col-md-8 col-sm-6 col-xs-12" id="shop_result">
<div class="">

<select name="shop_id[]" class="form-control" multiple="multiple" size="2" id="shops">						

<?php foreach($shops as $result){?>								  							  
<option  value="<?php echo $result['id']; ?>" <?php if(in_array($result['id'],$temp)){echo "selected";}?>><?php echo $result['name']; ?></option>							  
<?php } ?>

</select>                            

</div>
</div>
</div>
<?php } ?>


	
	

<script>
$(function () {
            $('#shops').multiselect({
                includeSelectAllOption: false
            });
            $('#btnSelected').click(function () {
                var selected = $("#shops option:selected");
                var message = "";
                selected.each(function () {
                    message += $(this).text() + " " + $(this).val() + "\n";
                });                
            });
        });
</script>