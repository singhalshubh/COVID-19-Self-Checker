<?php
	$idWeb = $_GET["idWeb"];
	$len = strlen((string)$idWeb);
	$db = mysqli_connect("localhost","root","","covid") or die("Error Connecting");
	$query = "select decision,id from covid where id like'$idWeb%'";
	$result = mysqli_query($db,$query) or die(mysqli_error($db));
	$responseArray = mysqli_fetch_all($result,MYSQLI_ASSOC);
	//echo $responseArray[1]["id"];
	$query1 = "select count(id) as cf from covid where id like'$idWeb%'";
	$result1 = mysqli_query($db,$query1) or die(mysqli_error($db));
	$responseArray1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);
	//echo $responseArray1[0]["cf"];
	$array = array();
	$arrayIndex = array();
	$k=0;
	for($i=0; $i < $responseArray1[0]["cf"] ; $i++) {
		if(strlen($responseArray[$i]["id"]) == $len+1 ) {
			$array[$k] = $responseArray[$i]["decision"];
			$arrayIndex[$k] = $responseArray[$i]["id"];
			$k = $k+1; 
		}
	}	
	@flush();
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>COVID-19 Self Test</title>
</head>
<body id="root">
	<script type="text/javascript">
		
		var heading = document.createElement("div");
		heading.innerHTML = "Stage of detection "+<?php echo $len?>;
		document.getElementById("root").appendChild(heading);
		var array = <?php echo json_encode($array)?>;
		var arrayIndex = <?php echo json_encode($arrayIndex)?>;
		for(let i=0; i < array.length ; i++) {
			var div = document.createElement("button");
			div.id = arrayIndex[i];
			div.onclick = function() {location.href='track.php?idWeb='+arrayIndex[i];};
			div.innerHTML = array[i];
			div.style.width = "80%";
			//div.style.background =  "Transparent";
			div.style.border = "1px solid black";
			div.style.height = "20%"; 
			div.style.margin = "5%";
			div.style.padding = "2%";
			document.getElementById('root').appendChild(div);
		}
	</script>
</body>
</html>