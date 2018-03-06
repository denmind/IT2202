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
			$client = stripslashes($_POST["c_Id"]);
			$employee = stripslashes($_POST["f_Id"]);
			$address = stripslashes($_POST["o_add"]);

			$query = "INSERT INTO 
					`orders` (`o_Id`, `o_orderDateTime`, 
					`o_addressOfDelivery`, `c_Id`, `f_Id`, `o_status`) 
					VALUES ('NULL', CURRENT_TIMESTAMP, 
					'".$address."', '".$client."', '".$employee."', 'Not started')";
					
			
				
			echo (mysqli_query($conn,$query)) ? "Submit Success!" : "Failure in submission!";
			mysqli_close($conn);
		}
?>

