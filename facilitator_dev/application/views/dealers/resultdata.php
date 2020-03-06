<?php  foreach($result as $data){
    ?>		

                            <tr> 
<td class=""><label class="option block mn"><input type="checkbox" id="actionid" value="<?php echo $data->id; ?>" name="checkbox[]"><span class="checkbox mn"></span></label></td>                           							
                                                      
                            <td class=""><?php echo $data->username;?></td>                           
                            <td class=""><?php echo $data->first_name;?></td>                           
                            <td class=""><?php echo $data->last_name;?></td>                           
                            <td class=""><?php echo $data->email;?></td>                           
                            <td class=""><?php echo $data->phone;?></td>  


<?php 
$status =$data->status;
if($status == 1){?>
    <td class=""><span class="label label-success" onclick="changestatus(<?php echo $data->id; ?>,'1')">Active</span></td>                 
<?php }else{?>
	<td class=""><span class="label label-danger" onclick="changestatus(<?php echo $data->id; ?>,'0')">InActive</span></td>             
<?php }?>

			<td class=""><a href="<?php echo base_url(); ?>index.php/dealers/edit/<?php echo $data->id; ?>"><span class="label label-success">Edit</span></a></td>  

  <?php if($this->lib_auth->getRoleID() == 1){ ?>
<td class=""><span class="label label-danger" onclick="deletedata(<?php echo $data->id; ?>)">Delete</span></td>  
<?php } ?>
                            
                          </tr>
<?php } ?>