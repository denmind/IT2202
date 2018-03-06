<!DOCTYPE html>
<html>
	<head>
		<title>DFPPI Inventory</title>
		<link rel = "icon" href = "images/logo.png">
		<meta http-equiv="refresh" content="2; url=inventory.php" />
	</head>
	<body>
		<p>Query being submitted . . .</p>
	</body>
</html>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "2101_final_project";


	$link = mysqli_connect($servername,$username,$password,$database);
	
	if ($link){
		$iq = stripslashes($_POST["iq"]);
		$ia = stripslashes($_POST["ia"]);
		$pi = stripslashes($_POST["pi"]);
		
		$query = "INSERT INTO `storage_products` 
		(`sp_Id`, `sp_quantity`, `sp_dateTimeStored`, `s_Id`, `p_Id`)
		VALUES (NULL, '{$iq}', CURRENT_TIMESTAMP, '{$ia}', '{$pi}')";
				
				  
		mysqli_query($link,$query);
		mysqli_close($link);
	}
?>