<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>



<table>
    <thead>
	<th>Shop Name</th>
	<th>Account No</th>
	<th>Shop Type</th>
	<th>Area</th>
	<th>Last Evaluation</th>
	
	<th>User Name</th>
	<th>1% Training</th>
	<th>2% Shop size </th>
	<th>1%  Warehouse</th>
	<th>0.5% Global Network</th>
	<th>1% Truck Binding</th>
	
	
	
<?php if($shop_data['shop_type_id'] == '1'){ ?>
	<th>1.50% Shop Hygiene and Standards Shop Type 1</th>
<?php }else if($shop_data['shop_type_id'] == '2'){ ?>	
	<th>1.50% Shop Hygiene and Standards Shop Type 2</th>
<?php } else { ?>
	<th>1.50% Shop Hygiene and Standards Shop Type 3</th>
<?php } ?>	
	
</thead>
<?php foreach($shopstotal as $result => $value){ 
$data['username'] = $this->sales_model->get_username($value['user_id']);
$total = $value['value'];
?>
<tbody>
	<tr>
		<td><?php echo $shop_data['name']; ?></td>
		<td><?php echo $shop_data['acc_no']; ?></td>
		<td><?php if($shop_data['shop_type_id'] == '1'){ echo "Type1"; }else if($shop_data['shop_type_id'] == '2'){ echo "Type2"; }else{ echo "Type3"; } ?></td>
		<td><?php echo $shop_data['address_search']; ?></td>
		
		 <?php  $task_id = $value['task_id'];
                                                  $data['last_modified'] = $this->load->sales_model->getmodified_shops($task_id); ?>
                        <td><?php echo date('Y-m-d H:i:s', strtotime($data['last_modified']['modified']));  ?></td>
	<!--<td><?php echo $shop_data['last_evaluation']; ?></td>-->	
		
		<td><?php echo $data['username']['username'];?></td>
		
		
		<td><?php if($value['form_id'] == '1'){ $bonus = $total/2; $bp = $bonus/100; echo $bp; }else{ } ?></td>
		
		<td><?php if($value['form_id'] == '2'){ $bonus = $total*1; $bp = $bonus/100; echo $bp; }else{  } ?></td>
		
		<td><?php if($value['form_id'] == '3'){ $bonus = $total*1; $bp = $bonus/100; echo $bp; }else{  } ?></td>
		
		<td><?php if($value['form_id'] == '4'){ $bonus = $total*0.5; $bp = $bonus/100; echo $bp; }else{  } ?></td>
		
		<td><?php if($value['form_id'] == '5'){ $bonus = $total*1; $bp = $bonus/100; echo $bp; }else{  } ?></td>
		
		<td><?php if($value['form_id'] == '6' || $value['form_id'] == '7' || $value['form_id'] == '8' ){  $bonus = $total*1.5;  $bp = $bonus/100; echo  $bp; }else{  } ?></td>
		
	</tr>
</tbody>
<?php } ?>
</table>


