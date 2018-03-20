<!DOCTYPE html>
<html>
	<head>
		<title>DFPPI Delivery</title>
		<link rel = "icon" href = "images/logo.png">
		<meta http-equiv="refresh" content="1; url=deliveries.php" />
	</head>
</html>
			<?php
				session_start();
				require 'sql_connect.php';
				
				if ($conn){
					$query = "UPDATE `storage_delivery_products` SET 
								`sdp_quantity` = '{$_POST['sdp_quantity']}', 
								`sdp_weight` = '{$_POST['sdp_weight']}', 
								`sdp_date` = '{$_POST['sdp_dateTime']}', 
								`s_Id` = '{$_POST['s_Id']}',
								`d_Id` = '{$_POST['d_Id']}'
								WHERE sdp_Id = {$_SESSION['edit-id']}";
								
					echo (mysqli_query($conn,$query)) ? "Edit Success!" : "Failure in editing!";
					
					$_POST = array();
					mysqli_close($conn);
				}
			?>
