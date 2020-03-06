  <?php if($arrShops == ""){ ?>
  <div class="col-md-10 form-group" id="dealers_zone_replace">
        <label for="name1" class="col-md-4 col-sm-4 col-xs-12" style="text-align: right;">Select Dealer<span class="star">*</span></label>
		<div class="col-md-8 col-sm-8 col-xs-12" >
			<select name="dealers[]" class="form-control" multiple="multiple" id="shopsadd2" size="2"  onchange="get_dealer_targets()">				
			<?php foreach($dealers as $result){ ?>
			<option value="<?php echo $result['id']; ?>"><?php echo $result['username']; ?></option>
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
<label class="col-lg-4  col-md-4 col-sm-6 col-xs-12  fs14 control-label text-right mt10" for="textArea1">Assign Dealer</label>
<div class="col-lg-8  col-md-8 col-sm-6 col-xs-12" id="shop_result">
<div class="">

<select name="dealers[]" class="form-control" multiple="multiple" size="2" id="shopsadd2"  onchange="get_dealer_targets()">						

<?php foreach($dealers as $result){?>								  							  
<option  value="<?php echo $result['id']; ?>" <?php if(in_array($result['id'],$temp)){echo "selected";}?>><?php echo $result['username']; ?></option>							  
<?php } ?>

</select>                            

</div>
</div>
</div>
<?php } ?>


	
	

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