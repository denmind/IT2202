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
		$y = stripslashes($_POST["op_quantity"]);
		$z = stripslashes($_POST["o_Id"]);
		$a = stripslashes($_POST["p_Id"]);
		
		
		$query = "INSERT INTO `order_products` (`op_Id`, `op_quantity`, `o_Id`, `p_Id`) VALUES (NULL, {$y},  {$z},  {$a})";
				  
		
		echo (mysqli_query($conn,$query)) ? "Submit Success!" : "Failure in submission!";
		
		mysqli_close($conn);
	}
	
?>