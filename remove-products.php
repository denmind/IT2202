<!DOCTYPE html>
<html>
	<head>
		<title>DFPPI Products</title>
		<link rel = "icon" href = "images/logo.png">
		<meta http-equiv="refresh" content="1; url=products.php" />
	</head>
</html>
			<?php
				session_start();
				require 'sql_connect.php';
				
				if ($conn){
					/*tablename, attributes and input names*/
					$change_q = "UPDATE `products` SET 
								`p_name` = '{$_POST["p_name"]}', 
								`p_weight` = '{$_POST["p_weight"]}',
								`p_price` = {$_POST["p_price"]},
								`p_weight` = {$_POST["p_weight"]},
								`p_price` = '{$_POST["p_price"]}',
								`p_descp` = '{$_POST["p_descp"]}',
								`status` = '{$_POST["status"]}'
								WHERE p_Id = {$_SESSION['edit-id']}";
								
					echo (mysqli_query($conn,$change_q)) ? "Edit Success!" : "Failure in editing!";
					
					$_POST = array();
					mysqli_close($conn);
				}
			?>
