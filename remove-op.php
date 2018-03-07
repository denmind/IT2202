<!DOCTYPE html>
<html>
	<head>
		<title>DFPPI Customers</title>
		<link rel = "icon" href = "images/logo.png">
		<meta http-equiv="refresh" content="1; url=customers.php" />
	</head>
</html>
<?php
	session_start();
	require 'sql_connect.php';
	
	if ($conn){
		/*tablename, attributes and input names*/
		$query = "UPDATE `order_products` SET 
				`op_quantity` = {$_POST['op_quantity']}, 
				`o_Id` = {$_POST['o_Id']},
				`p_Id` = {$_POST['p_Id']} 
				WHERE `op_Id` = {$_SESSION["edit-id"]}";
					
		echo (mysqli_query($conn,$query)) ? "Edit Success!" : "Failure in editing!";
		
		$_POST = array();
		mysqli_close($conn);
	}
?>