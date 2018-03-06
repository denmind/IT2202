<!DOCTYPE html>
<html>
	<head>
		<title>DFPPI Supplier</title>
		<link rel = "icon" href = "images/logo.png">
		<meta http-equiv="refresh" content="1; url=supplier.php" />
	</head>
</html>
<?php
	require 'sql_connect.php';
	
	if ($conn){
		$so = stripslashes($_POST["qo"]);
		$fid = stripslashes($_POST["type"]);
		
		$query = "INSERT INTO `supply_orders`
				 (`so_Id`, `so_DateTime`, `so_quantityOrdered`, `f_Id`) 
				 VALUES (NULL, CURRENT_TIMESTAMP, '{$so}', '{$fid}')";
				
				  
		echo (mysqli_query($conn,$query)) ? "Submit Success!" : "Failure in submission!";
		$_POST = array();
		mysqli_close($conn);
	}
?>