<?php
	if(isset($_GET["idWeb"]))
		$stage = $_GET["idWeb"];
	else {
		$stage = $_COOKIE["stage"];
	}
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>Create your Self Test</title>
</head>
<body>	
	<script type="text/javascript">
		function createButton() {
			for(let i=1;i< <?php echo $stage ?>;i++) {
				var button = document.createElement("input");
				button.type = "button";
				button.id = "btn"+i;
				button.value = "Edit Stage "+i;
				var url = 'index.php?idWeb='+i;
				button.onclick = function() {location.href = url;};
				document.getElementById("intro").appendChild(button);
			}
		}
	</script>
	<div id = "intro">
		Welcome to the COVID-19. Please add Stage <?php echo $stage; ?> to our system.
		<script type="text/javascript">createButton(); console.log("not");</script>
	</div>
	<button onclick="createDiv()" id = "plus">
		Plus		
	</button>
	<button onclick="deleteDiv()" id = "minus">
		Minus
	</button>
	<form id = "form" action="index1.php">
		<input type="submit" onclick = "submit1()" name="submit" value="Proceed to the next stage" >
	</form>
</body>
<script type="text/javascript">
	var array = 1;
	function createDiv() {
		var section = document.createElement("input");
		var input = document.createElement("input");
		section.type = "text"; 
		input.type = "text";
		input.id = array+1;
		section.id = array;
		input.name = array+1;
		section.name = array; 
		array+=2;
		input.style.border = "1px solid black;"
		section.maxlength = <?php echo $stage; ?>;
		section.minlength = <?php echo $stage; ?>;
		section.size = <?php echo $stage; ?>;
		input.style.width = "100%";
		input.style.marginBottom = "2%";
		input.style.height = "10%";
		document.getElementById("form").appendChild(section);
		document.getElementById("form").appendChild(input);
	}
	function deleteDiv() {
		var input = document.getElementById(array-1);
		var section = document.getElementById(array-2);
		input.remove();
		section.remove();
		array-=2;
	}
	function submit1() {
		document.cookie = "number="+array+";path=/";
		document.cookie = "stage="+<?php echo $stage+1?>+";path=/";
	}
</script>

<style type="text/css">
	#form {
		width: 100%;
		height: 100%;
	}
</style>
</html>