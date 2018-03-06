<!DOCTYPE html>
<html>
	<head>
		<title>DFPPI Employees</title>
		<link rel = "icon" href = "images/logo.png">
		<meta http-equiv="refresh" content="1; url=employees.php" />
	</head>
	<body>
		<p>Query being submitted . . .</p>
	</body>
</html>
<?php
	require 'sql_connect.php';
	
	if ($conn){
		$fn = $_POST["fn"];
		$mi = $_POST["mi"];
		$ln = $_POST["ln"];
		$g = $_POST["sx"];
		$re = $_POST["re"];
		$ad = $_POST["add"];
		$mob = $_POST["mn"];
		$em = $_POST["em"];
		$dob = $_POST["dob"];
		$pob = $_POST["pob"];
		$cs = $_POST["cs"];
		$ls = $_POST["ls"];
		$pos = $_POST["pos"];
		$sal = $_POST["sal"];
		$dept = $_POST["dept"];
		
		$query = "INSERT INTO `faculty` 
		(`f_id`, `f_firstName`, `f_midInitial`, 
		`f_lastName`, `f_dateHired`, `f_sex`, `f_religion`,
		`f_address`, `f_mobileNo`, `f_email`, `f_dateOfBirth`, 
		`f_placeOfBirth`, `f_civilStatus`, `f_langSpoken`, `f_position`, `f_salary`,
		`f_department`) 
		VALUES (NULL, '".$fn."', '".$mi."', '".$ln."', DATE(NOW()), '".$g."', 
		'".$re."','".$ad."', '".$mob."', '".$em."', '".$dob."', '".$pob."', '".$cs."', 
		'".$ls."', '".$pos."', '".$sal."', '".$dept."')";
				  
		mysqli_query($conn,$query);
		mysqli_close($conn);
	}
	
?>