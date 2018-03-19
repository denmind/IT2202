<!DOCTYPE html>
<html>
	<head>
		<title>DFPPI Delivery</title>
		<link rel = "icon" href = "images/logo.png">
		<meta http-equiv="refresh" content="1; url=deliveries.php" />
	</head>
</html>
<?php
	require 'sql_connect.php';
	
	if ($conn){
		$id = stripslashes($_POST["f_id"]);
		
		
		$query = "INSERT INTO `delivery` (`d_Id`, `d_deliverySchedule`, `f_id`) VALUES (NULL, CURRENT_DATE, '{$id}')";
				
				  
		echo (mysqli_query($conn,$query)) ? "Submit Success!" : "Failure in submission!";
		
		mysqli_close($conn);
	}
?>