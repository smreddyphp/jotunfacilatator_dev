<?php
	$mid = 0;
	if(isset($_GET['mid'])) {
		$mid = $_GET['mid'];
	}
	$token = "";
	if(isset($_GET['token'])) {
		$token = $_GET['token'];
	}
	$arrRequests = array();	
	if($mid!=0){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "facilitator";	
		if(!($link = mysqli_connect($servername, $username, $password, $dbname))) {
			echo "DB not connected";die;
		}
		$query = "SELECT id, method, uri, response_code, rtime FROM api_logs WHERE auth_token='".$token."' and id>".$mid." order by id desc";
		$result = mysqli_query($link, $query);
		if($result) {
			while ($row = mysqli_fetch_assoc($result)){
				$colorOfID = "red";
				switch ($row['response_code']) {
					case 200:
						$colorOfID = "#6DB36D";
						break;
					default:
						$colorOfID = "red";
				}
				$arrRequests[] = "<span id=\"".$row['id']."\" style=\"margin-bottom: 3px;padding-bottom: 2px;display: inline-block;border-bottom: 1px solid #ccc;width: 100%;cursor: pointer; cursor: hand;\" onclick=\"showDetails('".$row['id']."');return false;\"><span style=\"color:".$colorOfID.";font-weight:bold;\">".$row['id']."</span>: "."<a href=\"#\" id=\"item-".$row['id']."\" onclick=\"showDetails('".$row['id']."');return false;\"><b>".strtoupper($row['method'])."</b> | <b>".$row['response_code']."</b> | ".$row['rtime']."<br>".$row['uri']."</a></span>";
			}
		}		
		mysqli_free_result($result);
		mysqli_close($link);
	}
    if(count($arrRequests)>0){
      foreach($arrRequests as $requestData){
        echo $requestData."<br>";
      }
    }
?>