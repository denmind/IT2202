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
					$change_q = "UPDATE `delivery` SET 
								`d_status` = '{$_POST["d_status"]}', 
								`d_deliverySchedule` = '{$_POST["d_deliverySchedule"]}',
								`f_id` = {$_POST["f_Id"]}
								WHERE d_Id = {$_SESSION['edit-id']}";
								
					echo (mysqli_query($conn,$change_q)) ? "Edit Success!" : "Failure in editing!";
					
					$_POST = array();
					mysqli_close($conn);
				}
			?>
