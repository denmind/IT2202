<!DOCTYPE html>
<html>
	<head>
		<title>DFPPI Inventory</title>
		<link rel = "icon" href = "images/logo.png">
		<meta http-equiv="refresh" content="1; url=inventory.php" />
	</head>
</html>
			<?php
				session_start();
				require 'sql_connect.php';
				
				if ($conn){
					/*tablename, attributes and input names*/
					$change_q = "UPDATE `storage_products` SET 
								`sp_quantity` = '{$_POST["sp_quantity"]}',
								`sp_dateTimeStored` = '{$_POST["sp_dateTimeStored"]}',
								`s_Id` = {$_POST["s_Id"]},
								`p_Id` = '{$_POST["p_Id"]}'
								WHERE sp_Id = {$_SESSION['edit-id']}";
								
					echo (mysqli_query($conn,$change_q)) ? "Edit Success!" : "Failure in editing!";
					
					$_POST = array();
					mysqli_close($conn);
				}
			?>
