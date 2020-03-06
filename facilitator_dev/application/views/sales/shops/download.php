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
<th>Last evaluation</th>
<th>Acc_no</th>
<th>Email</th>
<th>Phone</th>
<th>Zone</th>
<th>Latitude</th>
<th>Longitude</th>
<th>Image</th>
<th>Status</th>
<th>Shop Type</th>
<th>Created</th>
<th>Modified</th>
<th>Address search</th>
<th>Door Number</th>
<th>Street_number</th>
<th>Colony</th>
<th>District</th>
<th>Province</th>
<th>Postal Code</th>
<th>Country</th>
</thead>

<tbody>

<?php foreach($shops as $result => $value){?>
<tr>
<td><?php echo $value['name']; ?></td>

	 <?php
        $shop_id = $value['id'];
        $data['last_evaluation'] = $this->load->sales_model->get_lm_tfp($shop_id);
        ?>
		<td><?php  print_r($data['last_evaluation']['last_evaluation']);  ?></td>
		
		
<!--<td><?php echo $value['last_evaluation']; ?></td>-->
<td><?php echo $value['acc_no']; ?></td>
<td><?php echo $value['email']; ?></td>
<td><?php echo $value['phone']; ?></td>

<td><?php   
        if($value['address'] == '1'){ 
            echo "Eastern Province";
        }else if($value['address'] == '2'){ 
            echo "Central Province";
        }else if($value['address'] == '3'){         
            echo "Northern Province";
        }else if($value['address'] == '4'){             
            echo "Western Province";
        }else{
            echo "South Province";
        }    
    ?>
</td>

<td><?php echo $value['latitude']; ?></td>
<td><?php echo $value['longitude']; ?></td>
<td><?php echo $value['image']; ?></td>

<td><?php if($value['status'] == '1'){ echo "Active"; }else{ echo "Inactive"; } ?></td>

<td><?php if($value['shop_type_id'] == '1'){ echo "Type1"; }else if($value['shop_type_id'] == 2){ echo "Type2"; }else{ echo "Type3"; } ?></td>


<td><?php echo $value['created']; ?></td>
<td><?php echo $value['modified']; ?></td>
<td><?php echo $value['address_search']; ?></td>
<td><?php echo $value['door_number']; ?></td>
<td><?php echo $value['street_number']; ?></td>
<td><?php echo $value['colony']; ?></td>
<td><?php echo $value['distric']; ?></td>
<td><?php echo $value['province']; ?></td>
<td><?php echo $value['postal_code']; ?></td>
<td><?php echo $value['country']; ?></td>



</tr>
<?php } ?>

</tbody>

<table>