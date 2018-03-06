<!DOCTYPE html>
<html>
	<head>
		<title>DFPPI Supplier</title>
		<link rel = "icon" href = "images/logo.png">
		<meta http-equiv="refresh" content="1; url=supplier.php" />
	</head>
</html>
			<?php
				session_start();
				require 'sql_connect.php';
				
				if ($conn){
					/*tablename, attributes and input names*/
					$query = "UPDATE `supply_orders` SET 
								`so_DateTime` = '{$_POST["so_DateTime"]}', 
								`so_quantityOrdered` = '{$_POST["so_quantityOrdered"]}',
								`f_id` = '{$_POST["f_id"]}',
								`status` = '{$_POST["status"]}'
								WHERE so_Id = {$_SESSION['edit-id']}";
								
					echo (mysqli_query($conn,$query)) ? "Edit Success!" : "Failure in editing!";
					
					$_POST = array();
					
					mysqli_close($conn);
				}
			?>
