<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<style>
table, td{
	border: 1px solid black;
	text-align:center;
}

</style>

 <table class="" >
                  	<tbody>
                  	<?php foreach($tfp as $kvalue){ ?>
                    <tr>
                    	<td colspan="10">
                        	<div class="media">
                            	<div class="pull-left"><h1 class="forjm-logo">Shop Name: <?php echo $kvalue['shop_details']['name']; ?></h1></div>
                            </div>
                        </td>
                    </tr>
                    
                    <tr><td colspan="10">
                    <div class="media-body" style=" border:1px solid black;">
                                	<h4>Work: 
                                	<?php if($kvalue['form_id'] == 1){ echo "Training"; } ?>
                                <?php if($kvalue['form_id'] == 2){ echo "Shopsize"; } ?>
                                <?php if($kvalue['form_id'] == 3){ echo "Warehouse"; } ?>
                                <?php if($kvalue['form_id'] == 4){ echo "Global Network"; } ?>
                                <?php if($kvalue['form_id'] == 5){ echo "Truck Binding"; } ?>
                                <?php if($kvalue['form_id'] == 6){ echo "Shop Hygiene and Standards Shop Type 1"; } ?>
                                <?php if($kvalue['form_id'] == 7){ echo "Shop Hygiene and Standards Shop Type 2"; } ?>
                                <?php if($kvalue['form_id'] == 8){ echo "Shop Hygiene and Standards Shop Type 3"; } ?>
                                	</h4>
                                </div></td>
                    </tr>
                    
                     <tr>
                        <th>Serial No</th>
                        <th colspan="2">Acct/Date</th>
                        <td colspan="2">06/4/2009</td>
                        <th>Shop Name</th>
                        <td><?php echo $kvalue['shop_details']['name']; ?></td>
                        <th colspan="3" class="text-center">Shop Type</th>
                    </tr>
                    
                     <tr>
                    	<td rowspan="3" class="text-center" style="font-size: 20px;"><?php echo $kvalue['task_form_id']; ?></td>
                        <th colspan="2">Area/City</th>
                        <td colspan="2"><?php echo $kvalue['shop_details']['distric']; ?></td>  
                        <th>Last Evaluation</th>
                         <?php  $task_id = $kvalue['task_id'];
                                                  $data['last_modified'] = $this->load->sales_model->getmodified_shops($task_id); ?>
                        <td><?php echo date('Y-m-d H:i:s', strtotime($data['last_modified']['modified']));  ?></td>
                        <!--<td><?php echo $kvalue['shop_details']['last_evaluation']; ?></td>-->
                            <td class="text-center">Type 1</td>
                            <td class="text-center">Type 2</td>
                            <td class="text-center">Type 3</td>
                    </tr>
                    
                     <tr>
                    	<th colspan="2">Date</th>
                        <td colspan="2">15/12/2015</td>
                        <th>Account No</th>
                        <td><?php echo $kvalue['shop_details']['acc_no']; ?></td>
                        <?php $shop_type = $kvalue['shop_details']['shop_type_id']; ?>
                        <?php switch ($shop_type) {
                           case 1: ?>
                                <td class="text-center">Y</td>
                                <td class="text-center">N</td>
                                <td class="text-center">N</td>
                           <?php break;
                           case 2: ?>
                                <td class="text-center">N</td>
                                <td class="text-center">Y</td>
                                <td class="text-center">N</td>
                           <?php break;
                           case 3: ?>
                                <td class="text-center">N</td>
                                <td class="text-center">N</td>
                                <td class="text-center">Y</td>
                           <?php break;
                            
                            default:
                               echo $kvalue['shop_details']['shop_type_id'];
                                break;
                        } ?>
                    </tr>
                  </tbody>
                  
                    
                               <tbody style="border: 1px solid black;">
                                  <tr>
                                     
                                     <th>Name</th>
                                     <th>Value</th>
                                     <th>Comments</th>
                                  </tr>
                  
                     <?php foreach($kvalue['points'] as $pvalue){  ?>
			             
<tr>
<td><?php print_r($pvalue['id']);?></td>
<td><?php print_r($pvalue['name']);?></td>
<td><?php print_r($pvalue['value']);?></td>
<td><?php print_r($pvalue['comment']);?></td>
</tr>
 					            
                                <?php } ?> 
                                
                                 <?php $total = $kvalue['total_points']['value'];  ?>
                                <tr>
                                     <th colspan="2">
                                        <p><strong>Total Points</strong></p>
                                     </th>
                                     <th>
                                        <p><?php print_r($kvalue['total_points']['value']);?></p>
                                     </th>                                     
                                  </tr>
                                  
                                   <tr>
                                     <th colspan="2">
                                        <p>Bonus %</p>
                                     </th>
                                     
                                     <?php  if($kvalue['form_id'] == 1) { $bonus = $total/2; $bp = $bonus/100;  ?>
                                     <td><b>1 %</b></td>
                                     <th><?php echo $bp; ?></th>
                                     <?php } ?>
                                     
                                     
                                     <?php  if($kvalue['form_id'] == 5 || $kvalue['form_id'] == 3) { $bonus = $total*1; $bp = $bonus/100;  ?>
                                     <td><b>1 %</b></td>
                                     <th><?php echo $bp; ?></th>
                                     <?php } ?>
                                     
                                     <?php  if($kvalue['form_id'] == 2) { $bonus = $total*1; $bp = $bonus/100;  ?>
                                     <td><b>2 %</b></td>
                                     <th><?php echo $bp; ?></th>
                                     <?php } ?>
                                     
                                     <?php  if($kvalue['form_id'] == 4) { $bonus = $total*0.5; $bp = $bonus/100;  ?>
                                     <td><b>0.5 %</b></td>
                                     <th><?php echo $bp; ?></th>
                                     <?php } ?>
                                     
                                     <?php if($kvalue['form_id'] == 6 || $kvalue['form_id'] == 7 || $kvalue['form_id'] == 8) { $bonus = $total*1.5; $bp = $bonus/100;  ?>
                                     <td><b>1.5 %</b></td>
                                     <th><?php echo $bp; ?></th>
                                     <?php } ?>
                                     
                                  </tr>
                                
<tr>
<th colspan="2">
<p>Checked By</p>
</th>
<td></td>
<td style="line-height:16px;"><span><strong>Mr.<?php echo ucwords($kvalue['username']);?></strong> <br> <small>Sales Proprietor</small></span></td>
</tr> 
                                
                                </tbody>
                           
                                
                                 <tr>
                                     <th colspan='10'><h3>Shop Images</h></th>
                                  </tr>
                                <?php foreach($kvalue['images'] as $ivalue){ ?>
                                <tr>
                                <td>Image</td>
                                <td><a href="<?php  echo $this->config->item('base_url').$this->config->item('shops_image_path').$ivalue['name']; ?>"><?php print_r($ivalue['name']); ?></a></td>
                                </tr></br>
                                 <?php } ?>
                                
                       
                    
                    <?php } ?>
                            
                            </tbody>
                            </table>
                            