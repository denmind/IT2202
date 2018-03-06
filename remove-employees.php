<!DOCTYPE html>
<html>
	<head>
		<title>DFPPI Employees</title>
		<link rel = "icon" href = "images/logo.png">
		<meta http-equiv="refresh" content="2; url=employees.php" />
	</head>
</html>
			<?php	
				session_start();
				require 'sql_connect.php';
					
					if ($conn && $link){
					
						$fn = $_POST["fn"];
						$ln = $_POST["ln"];
						
						$change_q = "UPDATE `faculty` SET 
									`f_firstName` = '{$fn}', 
									`f_midInitial` = '{$_POST["mi"]}',
									`f_lastName` = '{$ln}',
									`f_placeOfBirth` = '{$_POST["pob"]}',
									`f_civilStatus` = '{$_POST["cs"]}',
									`f_langSpoken` = '{$_POST["ls"]}', 
									`f_position` = '{$_POST["pos"]}',
									`f_salary` = '{$_POST["sal"]}',
									`f_department` = '{$_POST["dept"]}', 
									`f_status` = '{$_POST["state"]}',
									`f_sex` = '{$_POST["sx"]}',
									`f_religion` = '{$_POST["re"]}',
									`f_address` = '{$_POST["add"]}', 
									`f_mobileNo` = '{$_POST["mn"]}',
									`f_email` = '{$_POST["em"]}',
									`f_dateHired` = '{$_POST["doh"]}', 
									`f_dateOfBirth` = '{$_POST["dob"]}'
									WHERE f_id = {$_SESSION['edit-id']}";
						
						echo (mysqli_query($conn,$change_q) ) ? "Edit Success!" : "Failure in editing!";
						
						$_POST = array();
						
						mysqli_close($conn);
					}
	?>
