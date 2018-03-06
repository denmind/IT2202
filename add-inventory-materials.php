<!DOCTYPE html>
<html>
	<head>
		<title>DFPPI Inventory</title>
		<link rel = "icon" href = "images/logo.png">
		<meta http-equiv="refresh" content="1; url=inventory.php" />
	</head>
	<body>
		<p>Query being submitted . . .</p>
	</body>
</html>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "2101_final_project";


	$link = mysqli_connect($servername,$username,$password,$database);
	
	if ($link){
		$isle = stripslashes($_POST["isle"]);
		$row = stripslashes($_POST["row"]);
		$col = stripslashes($_POST["col"]);
		
		$query = "INSERT INTO `storage` (
		`s_Id`, `s_isleLoc`, `s_rowLoc`, `s_colLoc`) 
		VALUES (NULL, '{$isle}', '{$row}', '$col')";
				
				  
		mysqli_query($link,$query);
		mysqli_close($link);
	}
?>