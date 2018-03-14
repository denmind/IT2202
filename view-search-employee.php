<!DOCTYPE html>
<?php 
    session_start(); 
    if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] != true){
        $_SESSION['isLogin'] = false;
        header("Location:index.php");
        exit();
    }
?>
<html>
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
				  
		mysqli_query($link,$query);
		mysqli_close($link);
	}
	
?>