<!DOCTYPE html>
<html>
	<head>
		<title>DFPPI Production</title>
		<link rel = "icon" href = "images/logo.png">
		<meta http-equiv="refresh" content="1; url=production.php" />
	</head>
	<body>
		<p>Query being submitted . . .</p>
	</body>
</html>
<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "2101_final_project";


	$link = mysqli_connect($servername,$username,$password,$database);
	
	if ($link){
		$date = stripslashes($_POST["date"]);
		$quantity = stripslashes($_POST["quantity"]);
		$f_id = stripslashes($_POST["f_id"]);
		$p_id = stripslashes($_POST["p_id"]);
		
		$query = "INSERT INTO `production` 
		(`prdn_Id`, `prdn_date`, `prdn_quantity`, `f_Id`,`p_Id`) 
		VALUES (NULL, '{$date}', '{$quantity}', '{$f_id}','{$p_id}')";
				
				  
		$check = mysqli_query($link,$query);
		mysqli_close($link);
	}
?>