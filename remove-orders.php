<!DOCTYPE html>
<html>
	<head>
		<title>DFPPI Customers</title>
		<link rel = "icon" href = "images/logo.png">
	</head>
</html>
<?php
	session_start();
	require 'sql_connect.php';
	
	if ($conn){
		/*tablename, attributes and input names*/
		$query = "UPDATE `orders` SET 
					`o_Id` = '{$_POST['o_Id']}',
					`o_orderDateTime` = '{$_POST['o_orderDateTime']}',
					`o_addressOfDelivery` = '{$_POST["add"]}',
					`c_Id` = {$_POST["c_Id"]},
					`f_Id` = {$_POST["f_Id"]}, 
					`o_status` = '{$_POST["status"]}' 
					WHERE `o_Id` = {$_SESSION["edit-id"]}";
					
		echo (mysqli_query($conn,$query)) ? "Edit Success!" : "Failure in editing!";
		
		mysqli_close($conn);
	}
?>