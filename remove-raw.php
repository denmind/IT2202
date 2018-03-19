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
		$query = "UPDATE `raw_materials` SET 
					`rm_name` = '{$_POST['rm_name']}',
					`rm_quantity` = '{$_POST["rm_quantity"]}',
					`rm_pricePerUnit` = '{$_POST["rm_pricePerUnit"]}',
					`rm_type` = '{$_POST["rm_type"]}', 
					`rm_descp` = '{$_POST["rm_descp"]}',
					`p_Id` = '{$_POST["p_Id"]}', 
					`s_Id` = '{$_POST["s_Id"]}' 
					WHERE `rm_Id` = {$_SESSION["edit-id"]}";
					
		echo (mysqli_query($conn,$query)) ? "Edit Success!" : "Failure in editing!";
		
		$_POST = array();
		mysqli_close($conn);
	}
?>