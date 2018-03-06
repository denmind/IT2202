<!DOCTYPE html>
<html>
	<head>
		<title>DFPPI Materials</title>
		<link rel = "icon" href = "images/logo.png">
		<meta http-equiv="refresh" content="1; url=inventory.php" />
	</head>
</html>
<?php
	require 'sql_connect.php';
	
	if ($conn){
		$name = stripslashes($_POST["name"]);
		$desc = stripslashes($_POST["descp"]);
		$ty = stripslashes($_POST["type"]);
		$we = stripslashes($_POST["weight"]);
		$price = stripslashes($_POST["price"]);
		
		$query = "INSERT INTO `products` 
				  (`p_Id`, `p_name`, `p_descp`, `p_type`, `p_weight`, `p_price`)
				  VALUES (NULL, '{$name}', '{$desc}', '{$ty}', '{$we}', '{$price}')";
				
				  
		echo (mysqli_query($conn,$query)) ? "Submit Success!" : "Failure in submission!";
		
		$_POST = array();
		mysqli_close($conn);
	}
?>