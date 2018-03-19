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
		$status = "Not started"; //finished
		
		$query = "INSERT INTO `supply_orders` (`so_Id`, `so_DateTime`, `so_quantityOrdered`, `status`, `f_Id`, `supp_Id`, `rm_Id`) 
		VALUES (NULL, CURRENT_TIMESTAMP, '{$_POST['so_quantityOrdered']}', 'Not started',
		'{$_POST['f_id']}', '{$_POST['supp_Id']}', '{$_POST['rm_Id']}')";
				 
		
				
				  
		echo (mysqli_query($conn,$query)) ? "Submit Success!" : "Failure in submission!";
		$_POST = array();
		mysqli_close($conn);
	}
?>