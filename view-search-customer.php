<!DOCTYPE html><?php session_start(); ?><html>
	<head>
		<title>DFPPI Customers</title>
		<link rel = "icon" href = "images/logo.png">
		<link rel = "stylesheet" href = "css/bootstrap.min.css" crossorigin = "anonymous">
		<link rel = "stylesheet" href = "css/design.css">
		<script src = "js/bootstrap.min.js"></script>
		<script src = "js/jquery.min.js"></script>
	</head>
	
	<body>
		<div class = "ultra-banner">
			<div class = "left-ub">
				<a href = "home.php"><img id = "left-logo" src = "images/ultra-banner.png" alt = "DFPPI Home"></a>
			</div>
			<div class = "right-ub">
				<a href = "http://www.davaofibre.ph"><img id = "right-logo" src = "images/other.png" alt = "Employee Module"></a>
			</div>
		</div>
		<div class = "line-sep">
		</div>
		<nav class="navbar navbar-default" id = "myNav">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li><a id = "li-a" href = "customers.php">Customers and Orders</a></li>
					<li><a id = "li-a" href = "employees.php">Employees</a></li>
					<li><a id = "li-a" href = "deliveries.php">Deliveries</a></li>
					<li><a id = "li-a" href = "products.php">Products</a></li>
					<li><a id = "li-a" href = "supplier.php">Suppliers</a></li>
					<li><a id = "li-a" href = "production.php">Production</a></li>
					<li><a id = "li-a" href = "inventory.php">Inventory</a></li>
					<li><a id = "li-a" href = "docs/manual.html"><i>Need Help?</i></a></li>
				</ul>
			</div>
		</nav>
	</body>
</html>
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