<?php
	$token = "";
	$max_id = 0;
	if(isset($_GET['token'])) {
		$token = $_GET['token'];
	}
	$arrRequests = array();	
	if(true){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "facilitator";	
		if(!($link = mysqli_connect($servername, $username, $password, $dbname))) {
			echo "DB not connected";die;
		}
      
		$query = "SELECT * FROM auth_tokens WHERE token='".$token."' order by id desc";
        if($token=='')
        {
            $query = $query." limit 0,25";
        }
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
                if($max_id == 0)
                {
                    $max_id = $row['id'];
                }
			}
		}		
		mysqli_free_result($result);
		mysqli_close($link);
	}
?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Facilitator Dev Requests</title>
    <link rel="stylesheet" href="jquery.jsonview.min.css" />
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="jquery.jsonview.min.js"></script>
    <style>
      body {font: 12px 'Open Sans', sans-serif;color: #000;background: #fff;}
      h1 {color:orange;font-weight: 400;text-align: left;margin-top: 3px;margin-bottom: 5px;}
      p {margin: 0 0 20px;line-height: 1.5;font-size:14px;}
      a, a:hover, a:active, a:visited {color:#551A8B;text-decoration:none;font-size:13px;}
      main {min-width: 320px;max-width: 800px;padding: 10px;margin: 0 auto;background: #fff;}
      section {display: none;padding: 20px;border-top: 1px solid #ddd;}
      input {display: none;}
      label {display: inline-block;margin: 0 0 -1px;padding: 5px 15px;font-weight: 600;text-align: center;color: #bbb;border: 1px solid transparent;}
      label:hover {color: #888;cursor: pointer;}
      input:checked + label {color: #555;border: 1px solid #ddd;border-top: 2px solid orange;border-bottom: 1px solid #fff;}
      #tab1:checked ~ #content1,#tab2:checked ~ #content2,#tab3:checked ~ #content3,#tab4:checked ~ #content4,#tab5:checked ~ #content5 {display: block;}
      [type=checkbox]:after {content: attr(value);margin: -1px 18px;vertical-align: top;white-space:nowrap;display: inline-block;}
    </style>
  </head>
  <body>
    <center>
    <table style="width:100%;" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td valign="top" align="left" width="450">
                <table style="width:100%;border-bottom: 1px #ddd solid;" cellpadding="0" cellspacing="0" border="0">
                  <tr>
                    <td valign="center" align="left"><h1>Requests</h1></td>
                    <td valign="center" align="left" width="25"><input type="checkbox" value="" onchange="setRefresh()" checked style="display:block;"/></td>
                    <td valign="center" align="left" width="120">Auto refresh (5sec)</td>
                  </tr>
                </table>
                <div style="overflow:auto;white-space:nowrap;max-width:450px;min-width:450px;line-height:20px;margin-top:10px;" id="requestsContainer">
                <?php
                    if(count($arrRequests)>0){
                        foreach($arrRequests as $requestData){
                            echo $requestData."<br>";
                        }
                    }else{
                        echo "nothing";
                    }
                ?>
                </div>
            </td>
            <td valign="top" align="left">
                <main id="requestDetailsPanel"></main>
            </td>
        </tr>
    </table>
    </center>
    <script type="text/javascript">
        maxId = <?php echo $max_id; ?>;
        function showDetails(rid){
            if (window.XMLHttpRequest){
                xmlhttp=new XMLHttpRequest();
            }else{
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }	
            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById("requestDetailsPanel").innerHTML=xmlhttp.responseText;
                  	$("#content2").JSONView(document.getElementById("json1").innerHTML);
                  	$("#content3").JSONView(document.getElementById("json2").innerHTML);
                  	$("#content4").JSONView(document.getElementById("json3").innerHTML);
                  	$("#content5").JSONView(document.getElementById("json4").innerHTML);
              
                    $('*[id*=item-]:visible').each(function() {
                        $(this).css('color', '#551A8B');
                    });
                    document.getElementById("item-"+rid).style.color = "orange";
                }
            }
            xmlhttp.open("GET","requestDetails.php?rid="+rid,true);
            xmlhttp.send();
        }
        timer = setInterval(updateRequests,4000);
        function updateRequests(){
            if (window.XMLHttpRequest){
                xmlhttp=new XMLHttpRequest();
            }else{
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }	
            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                  var reqResponse = xmlhttp.responseText;
                  if(reqResponse.length > 2){
                    document.getElementById("requestsContainer").innerHTML=reqResponse+document.getElementById("requestsContainer").innerHTML;
                    maxId = reqResponse.substr(10,6);
                    if(!isNumber(maxId)){
                       maxId = reqResponse.substr(10,5);
                    }
                  }
                }
            }
            xmlhttp.open("GET","updateRequests.php?mid="+maxId+"&token=<?php echo $token; ?>",true);
            xmlhttp.send();
        }
        function isNumber(n) {
          return !isNaN(parseFloat(n)) && isFinite(n);
        }
        function setRefresh()
        {
          updateRequests();
          if(timer){
            clearInterval(timer);
            timer = false;
          }
          else
          {
            timer = setInterval(updateRequests,4000);
          }
        }
    </script>
  </body>
</html>