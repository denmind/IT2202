<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "2101_final_project";


	$link = mysqli_connect($servername,$username,$password,$database);
	
	if ($link){
		$fname = stripslashes($_POST["fn"]);
		$lname = stripslashes($_POST["ln"]);
		$cinfo = stripslashes($_POST["c_info"]);
		
		
		$query = "INSERT INTO client (c_Id, c_FirstName, c_LastName, c_contactInfo) 
				  VALUES (NULL,'".$fname."','".$lname."','".$cinfo."')";
				  
		mysqli_query($link,$query);
		mysqli_close($link);
	}
	
?>