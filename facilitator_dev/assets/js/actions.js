function getfilter(){	
   var filter = document.getElementById("filterdata").value;      
   jQuery.ajax({
	   type:'POST',	   
	   data:{'status': filter},
	   url:'dashboard/getfilterdata',
	   success:function(html){
if(html != ""){
		   jQuery("#showresult").html(html);
                   $("#nodata").html("");
}else if(html ==  ""){
var msg = '<div class="panel-menu admin-form theme-primary"><div class="row"><div class="col-md-12"><span style="text-align:center"><h3>No Data found</h3></span></div></div></div>';
			$("#showresult").html("");
                        $("#nodata").html(msg);
}
	   }	   
   });	   
}


function getfilterdealer(){	
   var filter = document.getElementById("filterdata").value;      
   jQuery.ajax({
	   type:'POST',	   
	   data:{'status': filter},
	   url:'../../dealers/getfilterdata',
	   success:function(html){
if(html != ""){
		   jQuery("#showresult").html(html);
                   $("#nodata").html("");
}else if(html ==  ""){
var msg = '<div class="panel-menu admin-form theme-primary"><div class="row"><div class="col-md-12"><span style="text-align:center"><h3>No Data found</h3></span></div></div></div>';
			$("#showresult").html("");
                        $("#nodata").html(msg);
}
	   }	   
   });	   
}



function getfilterteam(){	
   var filter = document.getElementById("filterdata").value;      
   jQuery.ajax({
	   type:'POST',	   
	   data:{'status': filter},
	   url:'../../dashboard/getfilterdata',
	   success:function(html){
if(html != ""){
		   jQuery("#showresult").html(html);
                   $("#nodata").html("");
}else if(html ==  ""){
var msg = '<div class="panel-menu admin-form theme-primary"><div class="row"><div class="col-md-12"><span style="text-align:center"><h3>No Data found</h3></span></div></div></div>';
			$("#showresult").html("");
                        $("#nodata").html(msg);
}
	   }	   
   });	   
}

// To Perform Multiple Action
	
function callaction(){  
var table_name = document.getElementById("table_name").value;   
var action = document.getElementById("filter-group").value;   
if ($("#dealerfilter_result input:checked").length == 0) {
swal({title:"Select checkbox to perform any action"});
$("#dealer_bulk").val("0");
document.getElementById("filter-group").selectedIndex = "0";
}
	else{
		if(action!="2"){
		swal({ title: "Are you sure?" ,
		text: "Do you want to change the status",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: 'Yes, change it!',
		cancelButtonText: 'No, Cancel it!',
		closeOnConfirm: false,
		confirmButtonColor : "#DD6B55",
		allowOutsideClick: false,
		allowEscapeKey: false
		}, 
		function(isConfirm) {
		if (isConfirm) {
		$("#dealerfilter_result input:checked").each(function() {
		var check_id = $(this).val();
		swal.disableButtons();
		$.ajax({
		type : "POST",
		data : 'action='+action+'&checked_id='+check_id+'&table_name='+table_name,
		url:"dashboard/changeaction",
		success: function(html){			
if(html == 1){			
		swal({title: "Status changed successfully"},function(){
        location.reload();         
         });
}
		}       
		});
		});
		} else {
		}
		}); 
		}
				else{
				swal({ title: "Are you sure?" ,
				text: "Do you want to Delete",
				type: "warning",
				showCancelButton: true,
				confirmButtonText: 'Yes, change it!',
				cancelButtonText: 'No, Cancel it!',
				closeOnConfirm: false,
				confirmButtonColor : "#DD6B55",
				allowOutsideClick: false,
				allowEscapeKey: false
				}, 
				function(isConfirm) {
				if (isConfirm) {
				$("#dealerfilter_result input:checked").each(function() {
				var check_id = $(this).val();
				swal.disableButtons();
				$.ajax({
				type : "POST",
				data : 'action='+action+'&checked_id='+check_id+'&table_name='+table_name,
				url:"dashboard/changeaction",
				success: function(val){
				if(val==1){
				swal({title: "Deleted successfully"},function(){
				location.reload();
				});
				}      
				}
				});
				});
				} else {
				}
				}); 
				}
	}            
}


// To Change user status

function changestatus(id,ustatus){
var id = id;
var status = ustatus;
var table_name = document.getElementById("table_name").value;	
//alert(id);
//alert(status);
//alert(table_name);
swal({ title: "Are you sure?" ,
		text: "Do you want to change status!",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: 'Yes, change it!',
		cancelButtonText: 'No, Cancel it!',
		closeOnConfirm: false,
		confirmButtonColor : "#DD6B55",
		allowOutsideClick: false,
		allowEscapeKey: false
		},
			function() {			
			swal.disableButtons();    
			jQuery.ajax({
			type:'POST',
			data:'id='+id+'&status='+status+'&table_name='+table_name,
			url:'dashboard/changestatus',
			success: function(html){
if(html == 1){			
		swal({title: "Status changed successfully"},function(){
        location.reload();         
         });
}	
			}
			});
			});			
}


// To Change user status team

function changestatusteam(id,ustatus){
var id = id;
var status = ustatus;
var table_name = document.getElementById("table_name").value;	
//alert(id);
//alert(status);
//alert(table_name);
swal({ title: "Are you sure?" ,
		text: "Do you want to change status!",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: 'Yes, change it!',
		cancelButtonText: 'No, Cancel it!',
		closeOnConfirm: false,
		confirmButtonColor : "#DD6B55",
		allowOutsideClick: false,
		allowEscapeKey: false
		},
			function() {			
			swal.disableButtons();    
			jQuery.ajax({
			type:'POST',
			data:'id='+id+'&status='+status+'&table_name='+table_name,
			url:'../../dashboard/changestatus',
			success: function(html){
if(html == 1){			
		swal({title: "Status changed successfully"},function(){
        location.reload();         
         });
}	
			}
			});
			});			
}



//

function changestatusd(id,ustatus){
var id = id;
var status = ustatus;
var table_name = document.getElementById("table_name").value;	
//alert(id);
//alert(status);
//alert(table_name);
swal({ title: "Are you sure?" ,
		text: "Do you want to change status!",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: 'Yes, change it!',
		cancelButtonText: 'No, Cancel it!',
		closeOnConfirm: false,
		confirmButtonColor : "#DD6B55",
		allowOutsideClick: false,
		allowEscapeKey: false
		},
			function() {			
			swal.disableButtons();    
			jQuery.ajax({
			type:'POST',
			data:'id='+id+'&status='+status+'&table_name='+table_name,
			url:'../../dealers/changestatus',
			success: function(html){
if(html == 1){			
		swal({title: "Status changed successfully"},function(){
        location.reload();         
         });
}	
			}
			});
			});			
}

// To Delete data

function deletedata(id,ustatus){
var id = id;
var table_name = document.getElementById("table_name").value;	
swal({ title: "Are you sure?" ,
		text: "Do you want to delete this!",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: 'Yes, delete it!',
		cancelButtonText: 'No, Cancel it!',
		closeOnConfirm: false,
		confirmButtonColor : "#DD6B55",
		allowOutsideClick: false,
		allowEscapeKey: false
		},
			function() {			
			swal.disableButtons();    
			jQuery.ajax({
			type:'POST',
			data:'id='+id+'&table_name='+table_name,
			url:'dashboard/deletedata',
			success: function(html){
if(html != ""){			
		swal({title: "Data deleted successfully"},function(){
        location.reload();         
         });
}	
			}
			});
			});			
}


// To Delete Team
function deleteteam(id,ustatus){
var id = id;
var table_name = document.getElementById("table_name").value;	
swal({ title: "Are you sure?" ,
		text: "Do you want to delete this!",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: 'Yes, delete it!',
		cancelButtonText: 'No, Cancel it!',
		closeOnConfirm: false,
		confirmButtonColor : "#DD6B55",
		allowOutsideClick: false,
		allowEscapeKey: false
		},
			function() {			
			swal.disableButtons();    
			jQuery.ajax({
			type:'POST',
			data:'id='+id+'&table_name='+table_name,
			url:'../../dashboard/deletedata',
			success: function(html){
if(html != ""){			
		swal({title: "Data deleted successfully"},function(){
        location.reload();         
         });
}	
			}
			});
			});			
}


//


// To Delete Team
function deletedealer(id,ustatus){
var id = id;
var table_name = document.getElementById("table_name").value;	
swal({ title: "Are you sure?" ,
		text: "Do you want to delete this!",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: 'Yes, delete it!',
		cancelButtonText: 'No, Cancel it!',
		closeOnConfirm: false,
		confirmButtonColor : "#DD6B55",
		allowOutsideClick: false,
		allowEscapeKey: false
		},
			function() {			
			swal.disableButtons();    
			jQuery.ajax({
			type:'POST',
			data:'id='+id+'&table_name='+table_name,
			url:'../../dealers/deletedata',
			success: function(html){
if(html != ""){			
		swal({title: "Data deleted successfully"},function(){
        location.reload();         
         });
}	
			}
			});
			});			
}
// TO Get Managers using in add user pageX

function get_role(){
	var role_value = $( ".rolevalue" ).val();
	if(role_value == '3'){
		$("#manager_results").show();
       jQuery.ajax({
		   type:'POST',
		   data:'role_value='+role_value,
		   url:'../index.php/dashboard/get_managers',
		   success:function(html){			   
			  jQuery("#manager_results").html(html);
		   }
	   });
	}else{
		$("#manager_results").hide();
	}
}


function ueget_role(){
	var role_value = $( ".rolevalue" ).val();
	if(role_value == '3'){
		$("#manager_results").show();
       jQuery.ajax({
		   type:'POST',
		   data:'role_value='+role_value,
		   url:'../../index.php/dashboard/get_managers',
		   success:function(html){			   
			  jQuery("#manager_results").html(html);
		   }
	   });
	}else {
		$("#manager_results").hide();
	}
}


// To get shops based on type

function getshops_type(){
	var type = document.getElementById("filter-purchases").value;	
	jQuery.ajax({
		type:"POST",
		data:'type='+type,
		url:'../getshops_type',
		success:function(html){
			jQuery("#shop_result").html(html);
		}		
	});
}



// To unassign task

function unassigntask(task_id,task_form_id){
swal({ title: "Are you sure?" ,
		text: "Do you want to unassign this task!",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: 'Yes, Unassign it!',
		cancelButtonText: 'No, Cancel it!',
		closeOnConfirm: false,
		confirmButtonColor : "#DD6B55",
		allowOutsideClick: false,
		allowEscapeKey: false
		},
			function() {			
			swal.disableButtons();    
			jQuery.ajax({
			type:'POST',
			data:'task_id='+task_id+'&task_form_id='+task_form_id,
			url:'../../../dashboard/unassign_task',
			success: function(html){
			    if(html != ""){			
		swal({title: "Task unassigned successfully"},function(){
        location.reload();         
         });
}	
			}
			});
			});
}



// To get shops based on type

function shop_filter(){
	var type = document.getElementById("shop_type").value;
var msg = '<option value="">Filter By status</option><option value="1">Active</option><option value="0">Inactive</option>';
$("#shop_status").html(msg);
	jQuery.ajax({
		type:'POST',
		data:{'type': type},
		url:'../../shops/getshops_type',
		success:function(html){	
		   jQuery("#show_shop_result").html(html);                 
		}		
	});
}


// To get shops based on status filter

function shops_status_filter(){
var status_shop = document.getElementById("shop_status").value;
var msg = '<option value="">Filter By Type</option><option value="1">Type1</option><option value="2">Type2</option><option value="3">Type3</option>';
$("#shop_type").html(msg);
   jQuery.ajax({
	   type:'POST',	   
	   data:{'status': status_shop},
	   url:'../../shops/getshops_statusfilter',
	   success:function(html){
                jQuery("#show_shop_result").html(html);                 
	   }	   
   });	  
}



// Modified By Eswar on 6-7-2017
// Multiple actions for shop and Dealer
function mactiondealer(){  
var table_name = document.getElementById("table_name").value;   
var action = document.getElementById("filter-group").value;   
if ($("#dealerfilter_result input:checked").length == 0) {
swal({title:"Select checkbox to perform any action"});
$("#dealer_bulk").val("0");
document.getElementById("filter-group").selectedIndex = "0";
}
	else{
		if(action!="2"){
		swal({ title: "Are you sure?" ,
		text: "Do you want to change the status",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: 'Yes, change it!',
		cancelButtonText: 'No, Cancel it!',
		closeOnConfirm: false,
		confirmButtonColor : "#DD6B55",
		allowOutsideClick: false,
		allowEscapeKey: false
		}, 
		function(isConfirm) {
		if (isConfirm) {
		$("#dealerfilter_result input:checked").each(function() {
		var check_id = $(this).val();
		swal.disableButtons();
		$.ajax({
		type : "POST",
		data : 'action='+action+'&checked_id='+check_id+'&table_name='+table_name,
		url:"../../dealers/changeaction",
		success: function(html){			
if(html == 1){			
		swal({title: "Status changed successfully"},function(){
        location.reload();         
         });
}
		}       
		});
		});
		} else {
		}
		}); 
		}
				else{
				swal({ title: "Are you sure?" ,
				text: "Do you want to Delete",
				type: "warning",
				showCancelButton: true,
				confirmButtonText: 'Yes, change it!',
				cancelButtonText: 'No, Cancel it!',
				closeOnConfirm: false,
				confirmButtonColor : "#DD6B55",
				allowOutsideClick: false,
				allowEscapeKey: false
				}, 
				function(isConfirm) {
				if (isConfirm) {
				$("#dealerfilter_result input:checked").each(function() {
				var check_id = $(this).val();
				swal.disableButtons();
				$.ajax({
				type : "POST",
				data : 'action='+action+'&checked_id='+check_id+'&table_name='+table_name,
				url:"../../dealers/changeaction",
				success: function(val){
				if(val==1){
				swal({title: "Deleted successfully"},function(){
				location.reload();
				});
				}      
				}
				});
				});
				} else {
				}
				}); 
				}
	}            
}

// Modified By Eswar on 6-7-2017
// Multiple actions for shop and teaM
function maction(){  
var table_name = document.getElementById("table_name").value;   
var action = document.getElementById("filter-group").value;   
if ($("#dealerfilter_result input:checked").length == 0) {
swal({title:"Select checkbox to perform any action"});
$("#dealer_bulk").val("0");
document.getElementById("filter-group").selectedIndex = "0";
}
	else{
		if(action!="2"){
		swal({ title: "Are you sure?" ,
		text: "Do you want to change the status",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: 'Yes, change it!',
		cancelButtonText: 'No, Cancel it!',
		closeOnConfirm: false,
		confirmButtonColor : "#DD6B55",
		allowOutsideClick: false,
		allowEscapeKey: false
		}, 
		function(isConfirm) {
		if (isConfirm) {
		$("#dealerfilter_result input:checked").each(function() {
		var check_id = $(this).val();
		swal.disableButtons();
		$.ajax({
		type : "POST",
		data : 'action='+action+'&checked_id='+check_id+'&table_name='+table_name,
		url:"../../dashboard/changeaction",
		success: function(html){			
if(html == 1){			
		swal({title: "Status changed successfully"},function(){
        location.reload();         
         });
}
		}       
		});
		});
		} else {
		}
		}); 
		}
				else{
				swal({ title: "Are you sure?" ,
				text: "Do you want to Delete",
				type: "warning",
				showCancelButton: true,
				confirmButtonText: 'Yes, change it!',
				cancelButtonText: 'No, Cancel it!',
				closeOnConfirm: false,
				confirmButtonColor : "#DD6B55",
				allowOutsideClick: false,
				allowEscapeKey: false
				}, 
				function(isConfirm) {
				if (isConfirm) {
				$("#dealerfilter_result input:checked").each(function() {
				var check_id = $(this).val();
				swal.disableButtons();
				$.ajax({
				type : "POST",
				data : 'action='+action+'&checked_id='+check_id+'&table_name='+table_name,
				url:"../../dashboard/changeaction",
				success: function(val){
				if(val==1){
				swal({title: "Deleted successfully"},function(){
				location.reload();
				});
				}      
				}
				});
				});
				} else {
				}
				}); 
				}
	}            
}


// To change shops 
function get_rolechange(){
var role_value = $( ".rolevalue" ).val();
if(role_value == 1){
$("#shops_data").hide();
}else{
$("#shops_data").show();
}
}


function euget_rolechange(){
var role_value = $( ".rolevalue" ).val();
jQuery.ajax({
    type:'POST',
    url:'../../sales/get_shopsbased_role',
    data:'role_value='+role_value,
success:function(html){
$("#shops_data").html(html);
}
});
}


// Get Shops Based on zone
function get_shops_zone(){
var zone_id = $("#zone").val();
jQuery.ajax({
    type:'POST',
    url:'../sales/get_shops_zone',
    data:'zone_id='+zone_id,
success:function(html){
$("#shops_zone_replace").html(html);
}
});
}


// Get Shops Based on zone
function ueget_shops_zone(){
var zone_id = $("#zone").val();
var user_id = $("#userid").val();
        jQuery.ajax({
            type:'POST',
            url:'../../sales/eget_shops_zone',
            data:'zone_id='+zone_id+'&user_id='+user_id,
        success:function(html){
            //alert(html);
        $("#shops_zone_replace").html(html);
        }
        });
}


    function get_shops_zoneshop(){
    var zone_id = $("#zoneshop").val();
    jQuery.ajax({
        type:'POST',
        url:'../../shops/get_shops_zone',
        data:'zone_id='+zone_id,
    success:function(html){
    jQuery("#show_shop_result").html(html);                 
    }
    });
    }
    
    
  

