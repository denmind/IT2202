<!DOCTYPE html>
<html>
	<head>
		<title>DFPPI Products</title>
		<link rel = "icon" href = "images/logo.png">
		<meta http-equiv="refresh" content="1; url=production.php" />
	</head>
</html>
			<?php
				session_start();
				require 'sql_connect.php';
				
				if ($conn){
					/*tablename, attributes and input names*/
					$change_q = "UPDATE `production` SET 
								`prdn_date` = '{$_POST["prdn_date"]}', 
								`prdn_quantity` = '{$_POST["prdn_quantity"]}',
								`f_id` = {$_POST["f_id"]},
								`p_Id` = {$_POST["p_Id"]},
								`status` = '{$_POST["status"]}'
								WHERE prdn_Id = {$_SESSION['edit-id']}";
								
					echo (mysqli_query($conn,$change_q)) ? "Edit Success!" : "Failure in editing!";
					
					$_POST = array();
					mysqli_close($conn);
				}
			?>
