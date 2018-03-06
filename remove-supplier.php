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
					$change_q = "UPDATE `supplier` SET 
								`supp_name` = '{$_POST["supp_name"]}',
								`supp_contact` = '{$_POST["supp_contact"]}',
								`supp_address` = '{$_POST["supp_address"]}',
								`supp_stat` = '{$_POST["supp_stat"]}'
								WHERE supp_Id = {$_SESSION['edit-id']}";
								
					echo (mysqli_query($conn,$change_q)) ? "Submit Success!" : "Failure in submission!";
					
					$_POST = array();
					mysqli_close($conn);
				}
			?>