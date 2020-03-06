<?php
	$rid = "";
	if(isset($_GET['rid'])) {
		$rid = $_GET['rid'];
	}
	$arrData = array();	
	
	if($rid!=""){
      	$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "facilitator";
		
		if(!($link = mysqli_connect($servername, $username, $password, $dbname))) {
			echo "DB not connected";die;
		}
		$query = "SELECT * FROM api_logs WHERE id='".$rid."'";
		$result = mysqli_query($link, $query);
		if($result) {
			while ($row = mysqli_fetch_assoc($result)){
				$arrData["details"] = "<b>Request Id</b>: ".$row["id"]."<br><b>URI</b>: ".$row["uri"]."<br><b>Method</b>: ".strtoupper($row["method"])."<br><b>Auth Token</b>: ".$row["auth_token"]."<br><b>IP Address</b>: ".$row["ip_address"]."<br><b>User Id</b>: ".$row["basic_auth_user"]."<br><b>Response Code</b>: ".$row["response_code"]."<br><b>Timestamp</b>: ".$row["time_stamp"]."";
				$arrData["request_headers"] = $row["request_headers"];
				$arrData["request_params"] = $row["params"];
				$arrData["response_headers"] = $row["response_headers"];
				$arrData["response"] = $row["response"];				
			}
		}		
		mysqli_free_result($result);
		mysqli_close($link);
	}
	
	if(count($arrData)>0){
		if($arrData["request_params"] == null){
			$arrData["request_params"]  = '{}';
		}
		if($arrData["response"] == null){
			$arrData["response"]  = '{}';
		}
		if($arrData["request_headers"] == null){
			$arrData["request_headers"]  = '{}';
		}
		if($arrData["response_headers"] == null){
			$arrData["response_headers"]  = '{}';
		}
?>
      <input id="tab1" type="radio" name="tabs"><label for="tab1">Details (<?php echo $rid; ?>)</label>
      <input id="tab2" type="radio" name="tabs"><label for="tab2">Request Params</label>
      <input id="tab3" type="radio" name="tabs" checked><label for="tab3">Response</label>
      <input id="tab4" type="radio" name="tabs"><label for="tab4">Request Headers</label>
      <input id="tab5" type="radio" name="tabs"><label for="tab5">Response Headers</label>

	  <span id="json1" style="display:none;"><?php echo htmlEntities($arrData["request_params"], ENT_QUOTES | ENT_IGNORE, "UTF-8"); ?></span>
	  <span id="json2" style="display:none;"><?php echo htmlEntities($arrData["response"], ENT_QUOTES | ENT_IGNORE, "UTF-8"); ?></span>
	  <span id="json3" style="display:none;"><?php echo htmlEntities($arrData["request_headers"], ENT_QUOTES | ENT_IGNORE, "UTF-8"); ?></span>
	  <span id="json4" style="display:none;"><?php echo htmlEntities($arrData["response_headers"], ENT_QUOTES | ENT_IGNORE, "UTF-8"); ?></span>

      <section id="content1"><p><?php echo $arrData["details"]; ?></p></section>
      <section id="content2"></section>
      <section id="content3"></section>
      <section id="content4"></section>
      <section id="content5"></section>
<?php
	}else{
		echo "nothing";
	}
?>


