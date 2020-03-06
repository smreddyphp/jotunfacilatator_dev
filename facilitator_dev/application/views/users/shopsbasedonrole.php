<?php if($role_value == 1){ ?>

<?php }else if($role_value == 2 || $role_value == 3){ ?>
<div class="col-md-10 form-group">
<label for="code" class="col-md-4 col-sm-4 col-xs-12">Select Zone</label>
<div class="col-md-8 col-sm-8 col-xs-12">
<label for="code" class="field select">
<select class="form-control event-name gui-input br-light light" name="zone" id="zone" onchange="ueget_shops_zone();"  multiple="multiple">
<option value="1">Eastern Province</option>
<option value="2">Central Province</option>
<option value="3">Northern Province</option>
<option value="4">Western Province</option>
<option value="5">South Province</option>
</select>
<label for="name2" class="field-icon">
<i class="arrow double"></i>
</label>
</label>
</div>
</div>



    <input type="hidden" id="userid" value="<?php  echo $this->uri->segment(3); ?>" >

<?php if($arrShops == ""){ ?>
<?php }else{ ?>
 <?php $temp=array();foreach($arrShops as $result_tasks){?>
<?php array_push($temp,$result_tasks['id']); ?>							 
  						  <?php } ?>
<?php } ?>

<div id="shops_zone_replace">
<div class="col-md-10 form-group">
<label class="col-lg-4  col-md-4 col-sm-6 col-xs-12  fs14 control-label text-right mt10" for="textArea1">Assign Shop</label>
<div class="col-lg-8  col-md-8 col-sm-6 col-xs-12" id="shop_result">
<div class="">
<?php if($arrShops == ""){ ?>
<select name="shop_id[]" class="form-control" multiple="multiple" size="2" id="shops">						

<?php foreach($shops as $result){?>								  							  
<option  value="<?php echo $result['id']; ?>" ><?php echo $result['name']; ?></option>							  
<?php } ?>

</select>                            
<?php }else{?>
<select name="shop_id[]" class="form-control" multiple="multiple" size="2" id="shops">						

<?php foreach($shops as $result){?>								  							  
<option  value="<?php echo $result['id']; ?>" <?php if(in_array($result['id'],$temp)){echo "selected";}?>><?php echo $result['name']; ?></option>							  
<?php } ?>

</select>                            
<?php } ?>
</div>
</div>
</div>
</div>
<?php } ?>

<script type="text/javascript">
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
    
    <script type="text/javascript">
        $(function () {
            $('#zone').multiselect({
                includeSelectAllOption: false
            });
            $('#btnSelected').click(function () {
                var selected = $("#zone option:selected");
                var message = "";
                selected.each(function () {
                    message += $(this).text() + " " + $(this).val() + "\n";
                });                
            });
        });
    </script>