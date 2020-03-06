<?php if(count($objShops) == 0){ ?>   
<div class="panel-menu admin-form theme-primary"><div class="row"><div class="col-md-12"><span style="text-align:center"><h3 id="fly">No Data found</h3></span></div></div></div>
<?php }else{ ?>
<div style="overflow-y:scroll;height:450px">
<table class="table admin-form theme-warning tc-checkbox-1 fs13" id="dealerfilter_result">
<thead>
    <tr class="bg-light">
        <th class="text-center">Select</th>
        <th class="text-center">SI No</th>
        <th>Avatar</th>
        <th>Shop Name</th>
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
      
        <?php  $i=1; foreach($objShops as $objShop): ?>
            <tr>
<td class=""><label class="option block mn"><input type="checkbox" id="actionid" value="<?php echo $objShop->id; ?>" ><span class="checkbox mn"></span></label></td>
             <td><?php echo $i++; ?></td>
                <td class="w50">
				<?php if($objShop->image == ""){?>
				<img src="<?php echo base_url(); ?>server/assets/media/default-shop-icon.png" class="img-responsive mw30 ib mr10" >
				<?php }else{?>
                    <?php echo img(array('src' => $this->config->item('base_url').$this->config->item('shops_image_path').$objShop->image), '','class="img-responsive mw30 ib mr10"'); ?>
				<?php }?>
                </td>
                <td><?php echo $objShop->name; ?></td>
                <td><?php echo $objShop->email; ?></td>
                <td><?php echo $objShop->last_evaluation; ?></td>
                <td>
				<?php if($objShop->shop_type_id == 1){ 
				echo "Type1";  
				}else if($objShop->shop_type_id == 2){ 
				echo "Type2"; 
				}else{ echo "Type3"; }?>
				
				</td>
                <td>
                  <span class="label <?php echo ($objShop->status == 1) ? 'label-success' : 'label-danger'; ?>">
                      <?php echo $this->config->item('shops_status')[$objShop->status]; ?>
                  </span>
                </td>
                <td><?php echo anchor(base_url($this->config->item('shops_edit_uri').$objShop->id), 'Edit', 'class="btn btn-xs btn-success"'); ?>
                </td>
                <td><!---<?php echo anchor(base_url($this->config->item('sales_view_uri').$objShop->id), 'View verifier', 'class="btn btn-success br2 btn-xs fs12 dropdown-toggle"'); ?>-->
				<a href="<?php echo base_url(); ?>index.php/sales/shopsviewverifier/<?php echo $objShop->id; ?>" class="btn btn-success br2 btn-xs fs12 dropdown-toggle">View verifier</a>
                </td>

 <?php if($this->lib_auth->getRoleID() == 1){ ?>
	<td><span class="btn btn-danger br2 btn-xs fs12" onclick="deleteteam('<?php echo $objShop->id; ?>')">Delete</span></td>
<?php  } ?>
            </tr>
        <?php  endforeach; ?>
  </tbody>
  </table>
</div>
    <?php } ?>




<script type="text/javascript">
message = document.getElementById("fly").innerHTML; // $ = taking a new line
distance = 50; // pixel(s)
speed = 200; // milliseconds

var txt="",
	num=0,
	num4=0,
	flyofle="",
	flyofwi="",
	flyofto="",
	fly=document.getElementById("fly");


function stfly() {
	for(i=0;i != message.length;i++) {
		if(message.charAt(i) != "$")
			txt += "<span style='position:relative;visibility:hidden;' id='n"+i+"'>"+message.charAt(i)+"<\/span>";
		else
			txt += "<br>";
	}
	fly.innerHTML = txt;
	txt = "";
	flyofle = fly.offsetLeft;
	flyofwi = fly.offsetWidth;
	flyofto = fly.offsetTop;
	fly2b();
}

function fly2b() {
	if(num4 != message.length) {
		if(message.charAt(num4) != "$") {
			var then = document.getElementById("n" + num4);
			then.style.left = flyofle - then.offsetLeft + flyofwi / 2 + 'px';
			then.style.top = flyofto - then.offsetTop + distance + 'px';
			fly3(then.id, parseInt(then.style.left), parseInt(then.style.left) / 5, parseInt(then.style.top), parseInt(then.style.top) / 5);
		}
		num4++;
		setTimeout("fly2b()", speed);
	}
}

function fly3(target,lef2,num2,top2,num3) {
	if((Math.floor(top2) != 0 && Math.floor(top2) != -1) || (Math.floor(lef2) != 0 && Math.floor(lef2) != -1)) {
		if(lef2 >= 0)
			lef2 -= num2;
		else
			lef2 += num2 * -1;
		if(Math.floor(lef2) != -1) {
			document.getElementById(target).style.visibility = "visible";
			document.getElementById(target).style.left = Math.floor(lef2) + 'px';
		} else {
			document.getElementById(target).style.visibility = "visible";
			document.getElementById(target).style.left = Math.floor(lef2 + 1) + 'px';
		}
		if(lef2 >= 0)
			top2 -= num3
		else
			top2 += num3 * -1;
		if(Math.floor(top2) != -1)
			document.getElementById(target).style.top = Math.floor(top2) + 'px';
		else
			document.getElementById(target).style.top = Math.floor(top2 + 1) + 'px';
		setTimeout("fly3('"+target+"',"+lef2+","+num2+","+top2+","+num3+")",50)
	}
}
stfly()
</script>