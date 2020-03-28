<?php
	if(isset($_GET["idWeb"]))
		$stage = $_GET["idWeb"];
	else {
		$stage = $_COOKIE["stage"];
	}
	if($stage!=1) {
		$number = $_COOKIE["number"];
		$number = $number-1;
		$db = mysqli_connect("localhost","root","","covid") or die("Error Connecting");
		for($i=1;$i<=$number-1;$i = $i+2) {
			$section = $_GET[(string)$i];
			$input = $_GET[(string)$i+1];
			if(empty($section) || empty($input)) {
				echo "Wrong input";
			}
			$query1 = "select id,decision from covid where id = $section";
			$result1 = mysqli_query($db,$query1) or die(mysqli_error($db));
			$responseArray1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);
			if($responseArray1[0]["id"]) {
					$query = "delete from covid where id = $section";
					$result = mysqli_query($db,$query) or die(mysqli_error($db));	
			}
			$query = "insert into covid values ('$section', '$input')";
			$result = mysqli_query($db,$query) or die(mysqli_error($db));
		}
	}
	if(!isset($_GET["idWeb"]))
		setcookie("stage",$stage,time() + (60*2), "/");
	header("refresh:0.01,url=index.php");
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>Self Checker!</title>
</head>
<body>

</body>
</html>