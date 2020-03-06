<?php //print_r($yearly); exit;?>

<div class="target-tabs">
        <ul class="nav nav-tabs nav-tabs1">
    <li class="active time_dur"><a data-toggle="tab" href="#Monthly">Monthly</a></li>
    <li class="time_dur"><a data-toggle="tab" href="#Yearly">Yearly</a></li>
  </ul>
<?php $months = array();?>
  <div class="tab-content">
    <div id="Monthly" class="tab-pane fade in active">
        <ul class="nav nav-tabs">
<?php 
$months = array("january","february","march","april","may","june","july","august","september","october","november","december");
foreach($months as $key=>$month){ ?>
    <li <?php if(date("m")== $key+1){ ?> class="active" <?php }?> ><a data-toggle="tab" href="#<?php echo $month;?>"><?php echo substr($month,0,3);?></a></li>
<?php }
?>
</ul>
<div class="tab-content">
<?php 
$year_months = array("january","february","march","april","may","june","july","august","september","october","november","december");
foreach($year_months as $key=>$mont){ ?>
     <div id="<?php echo $mont;?>" class="tab-pane fade <?php if(date("m")==$key+1){ echo "in active"; }?>">
      <div class="col-md-12 pad_0 tabs-col january">
      <div class="col-md-4 pad_0 target_content">
        <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Total Sales</label>
      </div>
      <div class="col-md-9">
      <input type="text" name="data[january][total_sales]"  id="january_total_sales" class="form-control number" value="<?php echo number_format($year[$mont]->total_sales);?>" readonly>
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
      <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Total Collection</label>
      </div>
      <div class="col-md-9">
      <input type="text" name="data[january][total_collection]"  id="january_total_collection" class="form-control number"  value="<?php echo number_format($year[$mont]->total_collection);?>" readonly>
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
      <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Total Product Targets</label>
      </div>
      <div class="col-md-8">
      <input type="text" name="data[january][total_product_target]" id="january_total_product_target" class="form-control number"  value="<?php echo number_format($year[$mont]->total_product_target);?>" readonly>
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
        <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Achieved Sales</label>
      </div>
      <div class="col-md-9">
      <input type="text" name="data[january][achieved_sales]"  id="january_total_sales" class="form-control number"  value="<?php echo number_format($year[$mont]->achieved_sales);?>" readonly>
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
      <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Achieved Collection</label>
      </div>
      <div class="col-md-9">
      <input type="text" name="data[january][achieved_collection]"  id="january_total_collection" class="form-control number"  value="<?php echo number_format($year[$mont]->achieved_collection);?>" readonly>
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
      <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Achieved Products</label>
      </div>
      <div class="col-md-8">
      <input type="text" id="january_total_product_target" class="form-control number"  value="<?php echo number_format($year[$mont]->achieved_product);?>" readonly>
      </div>
      </div>
    
    </div>
  </div>
<?php }
?></div></div>
<div id="Yearly" class="tab-pane fade">
<div class="tab-content">
  <div class="tab-pane fade in active">
     <div class="col-md-12 pad_0 tabs-col">
        <div class="col-md-4 pad_0 target_content">
    <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Total Sales</label>
      </div>
      <div class="col-md-9">
      <input type="text" class="form-control number" value="<?php echo number_format($yearly->total_sales);?>" readonly />
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
      <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Total Collection</label>
      </div>
      <div class="col-md-9">
      <input type="text" class="form-control number" value="<?php echo number_format($yearly->total_collection);?>" readonly  >
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
      <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Total Product Targets</label>
      </div>
      <div class="col-md-8">
      <input type="text" class="form-control number" value="<?php echo number_format($yearly->total_product_target);?>" readonly  >
      </div>
      <div class="col-md-1 pad_0">
      <!--<span><i class="fa fa-plus-square-o add_icon" aria-hidden="true"></i></span>-->
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
        <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Achieved Sales</label>
      </div>
      <div class="col-md-9">
      <input type="text"  id="january_total_sales" class="form-control number"  value="<?php echo number_format($yearly->achieved_sales);?>" readonly >
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
      <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Achieved Collection</label>
      </div>
      <div class="col-md-9">
      <input type="text" id="january_total_collection" class="form-control number"  value="<?php echo number_format($yearly->achieved_collection);?>" readonly >
      </div>
      </div>
      <div class="col-md-4 pad_0 target_content">
      <div class="col-md-3 padl_0">
      <label for="email" class="tar-lable">Achieved Products</label>
      </div>
      <div class="col-md-8">
      <input type="text" id="january_total_product_target" class="form-control number"  value="<?php echo number_format($yearly->achieved_product);?>" readonly >
      </div>
      </div>
    </div>
  </div>
  </div>
</div>
    </div>
  </div>
  </div>
  </div>