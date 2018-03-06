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
					$change_q = "UPDATE `storage` SET 
								`s_isleLoc` = '{$_POST["s_isleLoc"]}', 
								`s_rowLoc` = '{$_POST["s_rowLoc"]}',
								`s_colLoc` = '{$_POST["s_colLoc"]}'
								WHERE s_Id = {$_SESSION['edit-id']}";
								
					echo (mysqli_query($conn,$change_q)) ? "Edit Success!" : "Failure in editing!";
					
					$_POST = array();
					mysqli_close($conn);
				}
			?>
