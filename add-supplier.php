<!DOCTYPE html>
<html>
	<head>
		<title>DFPPI Supplier</title>
		<link rel = "icon" href = "images/logo.png">
		<meta http-equiv="refresh" content="1; url=supplier.php" />
	</head>
</html>
<?php
	require 'sql_connect.php';
	
	if ($conn){
		$name = stripslashes($_POST["name"]);
		$contact = stripslashes($_POST["contact"]);
		$address = stripslashes($_POST["address"]);
		
		$query = "INSERT INTO `supplier` (`supp_Id`, `supp_name`, `supp_address`, `supp_contact`, `supp_stat`) 
					VALUES (NULL, '{$name}', '{$address}', '{$contact}', 'On-contract')";
				
				
				  
		echo (mysqli_query($conn,$query)) ? "Submit Success!" : "Failure in submission!";
		
		$_POST = array();
		mysqli_close($conn);
	}
?>