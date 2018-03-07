<!DOCTYPE html>
<html>
	<head>
		<title>DFPPI Customers</title>
		<link rel = "icon" href = "images/logo.png">
		<meta http-equiv="refresh" content="1; url=customers.php" />
	</head>
</html>
<?php
	require "sql_connect.php";
	
	if ($conn){
		$x = $_POST["op_quantity"];
		$y = $_POST["o_Id"];
		$z = $_POST["p_Id"];
		
		
		$query = "INSERT INTO `order_products` 
				(`op_Id`, `op_quantity`, `o_Id`, `p_Id`)
				VALUES (NULL,{$x},{$y},{$z})";
				  
		
		echo (mysqli_query($conn,$query)) ? "Submit Success!" : "Failure in submission!";
		
		$_POST = array();
		mysqli_close($conn);
	}
?>