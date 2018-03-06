<!DOCTYPE html>
<html>
	<head>
		<title>DFPPI Customers</title>
		<link rel = "icon" href = "images/logo.png">
		<meta http-equiv="refresh" content="1; url=customers.php" />
	</head>
</html>
<?php
	session_start();
	require 'sql_connect.php';
				
	if ($conn){
		/*tablename, attributes and input names*/
		$query = "UPDATE `client` SET 
					`c_FirstName` = '{$_POST["c_FirstName"]}', 
					`c_LastName` = '{$_POST["c_LastName"]}',
					`c_contactInfo` = '{$_POST["c_contactInfo"]}'
					WHERE c_Id = {$_SESSION['edit-id']}";
								
		echo (mysqli_query($conn,$query)) ? "Edit Success!" : "Failure in editing!";
					
		$_POST = array();
		mysqli_close($conn);
	}
?>
