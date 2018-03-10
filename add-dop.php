<!DOCTYPE html>
<html>
	<head>
		<title>DFPPI Deliveries</title>
		<link rel = "icon" href = "images/logo.png">
		<meta http-equiv="refresh" content="1; url=deliveries.php" />
	</head>
</html>
<?php
		session_start();
		require 'sql_connect.php';
		
		if ($conn){

			$query = "INSERT INTO `delivery_orders` 
					(`do_Id`, `d_Id`, `c_Id`) VALUES 
					(NULL, '{$_POST['d_Id']}', '{$_POST['c_Id']}')";
					
			echo (mysqli_query($conn,$query)) ? "Submit Success!" : "Failure in submission!";
			
			$_POST = array();
			mysqli_close($conn);
		}
?>

