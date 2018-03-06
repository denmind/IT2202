<!DOCTYPE html>
<html>
	<head>
		<title>DFPPI Customers</title>
		<link rel = "icon" href = "images/logo.png">
		<meta http-equiv="refresh" content="1; url=customers.php" />
	</head>
</html>
<?php
	require 'sql_connect.php';
	
	if ($conn){
		$fname = stripslashes($_POST["fn"]);
		$lname = stripslashes($_POST["ln"]);
		$cinfo = stripslashes($_POST["c_info"]);
		
		
		$query = "INSERT INTO client (c_Id, c_FirstName, c_LastName, c_contactInfo) 
				  VALUES (NULL,'".$fname."','".$lname."','".$cinfo."')";
				  
		echo (mysqli_query($conn,$query)) ? "Submit Success!" : "Failure in submission!";
		mysqli_close($conn);
	}
	
?>