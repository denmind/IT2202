<!DOCTYPE html>
<html>
	<head>
		<title>DFPPI Materials</title>
		<link rel = "icon" href = "images/logo.png">
		<meta http-equiv="refresh" content="1; url=inventory.php" />
	</head>
</html>
<?php
	require 'sql_connect.php';
	
	if ($conn){
		
		$_POST['status'] = "In-use";
		
		$query = "INSERT INTO `raw_materials` 
		(`rm_Id`, `rm_quantity`, `rm_name`, `rm_descp`, `rm_pricePerUnit`, `rm_type`, `status`, `s_Id`, `p_Id`) 
		VALUES (NULL, '{$_POST['rm_quantity']}', '{$_POST['rm_name']}', '{$_POST['rm_descp']}', 
		'{$_POST['rm_pricePerUnit']}', '{$_POST['rm_type']}', '{$_POST['status']}', 
		'{$_POST['s_Id']}', '{$_POST['s_Id']}')";
				
				  
		echo (mysqli_query($conn,$query)) ? "Submit Success!" : "Failure in submission!";
		
		$_POST = array();
		mysqli_close($conn);
	}
?>