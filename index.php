<?php
	if(isset($_GET["idWeb"]))
		$stage = $_GET["idWeb"];
	else {
		$stage = $_COOKIE["stage"];
	}
?>

<!DOCTYPE html>
<html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Baloo+Da+2&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">

<meta charset="utf-8">
<head>
	<title>Create your Self Test</title>
</head>
<body id="body">	
	<script type="text/javascript">
		function createButton() {
			for(let i=1;i< <?php echo $stage ?>;i++) {
				var button = document.createElement("input");
				button.type = "button";
				button.id = "btn"+i;
				button.value = "Edit Stage "+i;
				var url = 'indexEdit.php?idWeb='+i;
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
		<i class="fa fa-plus" aria-hidden="false" id = "input">Please add the information!</i>		
	</button>
	<button onclick="deleteDiv()" id = "minus">
		<i class="fa fa-minus" aria-hidden="false" id = "input"> Please delete the information!</i>
	</button>
	<form id = "form" action="index1.php">
		<input type="submit" onclick = "submit1()" name="submit" value="Proceed to the next stage" id="forward">
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
		section.style.width = "20%";
		section.style.fontFamily = 'Baloo Da 2, cursive';
		input.style.width = "100%";
		input.style.height = "18%";
		section.placeholder = "Type the index number";
		input.placeholder = "Description";
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
	#body {
		background: #ffdbac;
	}

	#form {
		width: 100%;
		height: 100%;
	}
	#plus,#minus,#forward {
		background: #c1ffb6;
		margin-left: 80%;
		margin-bottom: 0.5%;
		font-family: 'Baloo Da 2', cursive;
	}
	#forward {
		background: #b6c1ff;
	}

	#intro {
		margin: 2%;
		overflow: hidden;
		margin-top: 3%;
		margin-left: 7%;
		width: 50%;
		text-align: center;
		font-size: 200%;
		font-family: 'Baloo Da 2', cursive;
		width: calc(100-7)%;
	}
	#input {
		font-family: 'Baloo Da 2', cursive;
	}
</style>
</html>