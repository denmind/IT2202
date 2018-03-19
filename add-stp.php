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

			$query = "INSERT INTO `storage_delivery_products` 
			(`sdp_Id`, `sdp_quantity`, `sdp_weight`, `sdp_date`, `s_Id`, `d_Id`)
			VALUES (NULL, '{$_POST['sdp_quantity']}', '{$_POST['sdp_weight']}', '{$_POST['sdp_date']}',
			'{$_POST['s_Id']}', '{$_POST['d_Id']}')";
					
			echo (mysqli_query($conn,$query)) ? "Submit Success!" : "Failure in submission!";
			
			$_POST = array();
			mysqli_close($conn);
		}
?>

