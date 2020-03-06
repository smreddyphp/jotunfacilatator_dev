
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<style>
tr, td, th{
	border: 1px solid black !important;
	text-align:center;
}
div{
	border-bottom:1px solid black;
}
</style>
 <table class="table table-user-information rowDetails-sigle" style="border: 1px solid black;">
                  	<tbody><tr>
                    	<td colspan="10">
                        	<div class="media">
                            	<div class="pull-left"><h1 class="forjm-logo">Shop Name: <?php echo $objUser->shop->name; ?></h1></div>
                            </div>
                        </td>
                    </tr>
                    <tr><td colspan="10">
                    <div class="media-body" style=" border:1px solid black;">
                                	<h4>Work: <?php echo $objUser->form->name; ?></h4>
                                </div></td>
                    </tr>
                    <tr>
                        <th>Serial No</th>
                        <th colspan="2">Acct/Date</th>
                        <td colspan="2">06/4/2009</td>
                        <th>Shop Name</th>
                        <td><?php echo $objUser->shop->name; ?></td>
                        <th colspan="3" class="text-center">Shop Type</th>
                    </tr>
                    <tr>
                    	<td rowspan="3" class="text-center" style="font-size: 20px;"><?php echo $objUser->id ?></td>
                        <th colspan="2">Area/City</th>
                        <td colspan="2"><?php echo $objUser->shop->address; ?></td>  
                        <th>Last Evaluation</th>
                         <?php $task_id = $objUser->task_id;
                                                  $data['last_modified'] = $this->load->sales_model->getmodified_shops($task_id); ?>
                        <td><?php echo date('Y-m-d H:i:s', strtotime($data['last_modified']['modified']));  ?></td>
                        <!--<td><?php echo $objUser->shop->last_evaluation; ?></td>-->
                            <td class="text-center">Type 1</td>
                            <td class="text-center">Type 2</td>
                            <td class="text-center">Type 3</td>
                    </tr>
                    <tr>
                    	<th colspan="2">Date</th>
                        <td colspan="2">15/12/2015</td>
                        <th>Account No</th>
                        <td><?php echo $objUser->shop->acc_no; ?></td>
                        <?php $shop_type = $objUser->shop->shop_type_id ?>
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
                               echo $objUser->shop->shop_type_id;
                                break;
                        } ?>
                    </tr>
                  </tbody></table>
                          <table class="table table-user-information rowDetails-sigle" style="border: 1px solid black;">
                               <tbody>
                                  <tr>
                                     <th></th>
                                     <th></th>
                                     <th>Score</th>
                                     <th>Comments</th>
                                  </tr>
                                  <?php  $total_points = 0 ?>
                                  <?php if(isset($objUser->sub_forms)): ?>
                                  <?php foreach($objUser->sub_forms as $objPoints): ?>
                                      <?php foreach($objPoints->points as $objPoint): ?>
                                        <?php $total_points = $total_points+$objPoint->value; ?>
                                          <tr>
                                             <td>
                                                <p><?php echo $objPoint->id; ?></p>
                                             </td>
                                             <td>
                                                <p><?php echo $objPoint->name; ?></p>
                                             </td>
                                             <td>
                                                <p><?php echo $objPoint->value; ?></p>
                                             </td>
                                             <td>
                                                <p><?php echo $objPoint->comment; ?> </p>
                                             </td>
                                          </tr>
                                      <?php endforeach; ?>
                                  <?php endforeach; ?>
                                  <?php endif; ?>                     
                                  <tr>
                                     <th colspan="2">
                                        <p><strong>Total Points</strong></p>
                                     </th>
                                     <th>
                                        <p><?php echo $total; ?></p>
                                     </th>
                                     <th>Full Score = <?php echo $objUser->form->total; ?></th>
                                  </tr>
                                  <tr>
                                     <th colspan="2">
                                        <p>Bonus %</p>
                                     </th>
                                     
                                    <?php  if($objUser->form_id == 1) { $bonus = $total/2; $bp = $bonus/100;  ?>
                                     <td><b>1 %</b></td>
                                     <th><?php echo $bp; ?></th>
                                     <?php } ?>
                                     
                                     
                                     <?php  if($objUser->form_id == 5 || $objUser->form_id == 3) { $bonus = $total*1; $bp = $bonus/100;  ?>
                                     <td><b>1 %</b></td>
                                     <th><?php echo $bp; ?></th>
                                     <?php } ?>
                                     
                                     <?php  if($objUser->form_id == 2) { $bonus = $total*1; $bp = $bonus/100;  ?>
                                     <td><b>2 %</b></td>
                                     <th><?php echo $bp; ?></th>
                                     <?php } ?>
                                     
                                     <?php  if($objUser->form_id == 4) { $bonus = $total*0.5; $bp = $bonus/100;  ?>
                                     <td><b>0.5 %</b></td>
                                     <th><?php echo $bp; ?></th>
                                     <?php } ?>
                                     
                                     <?php if($objUser->form_id == 6 || $objUser->form_id == 7 || $objUser->form_id == 8) { $bonus = $total*1.5; $bp = $bonus/100;  ?>
                                     <td><b>1.5 %</b></td>
                                     <th><?php echo $bp; ?></th>
                                     <?php } ?>
                                     
                                  </tr>
                                  <tr>
                                     <th colspan="2">
                                        <p>Checked By</p>
                                     </th>
                                     <td></td>
                                     <td style="line-height:16px;"><span><strong>Mr.<?php echo ucwords($userinfo['username']);?></strong> <br> <small>Sales Proprietor</small></span></td>
                                  </tr>
                               </tbody>
                            </table>
                            
                            <table style="border: 1px solid black;">
                            <thead>
                            <tr><div style=" background-color: #F40408"><h1>Shop Images:</h1></div></tr>
                            <tr><th>S.No</th><th>Image</th></tr></thead>
                            <tbody>
                             <?php if(isset($objUser->images)){$i=0; foreach($objUser->images as $nKey => $objImage): $i++;?>
                             <tr>
                             <td><?php echo $i;?></td>
                             <td>
                          		<a href="<?php  echo $this->config->item('base_url').$this->config->item('shops_image_path').$objImage->name; ?>"><?php echo $objImage->name;?></a>
                          </td></tr>
                        <?php  endforeach; }; ?>
                            
                            </tbody>
                            </table>