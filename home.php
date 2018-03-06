<!DOCTYPE html>
<?php
	session_start();
	$fl = $_SESSION["first_name"][0];
	$ln = $_SESSION["last_name"];
?>
<html>
	<head>
		<title>DFPPI Home</title>
		<link rel = "icon" href = "images/logo.png">
		<link rel = "stylesheet" href = "css/bootstrap.min.css" crossorigin = "anonymous">
		<link rel = "stylesheet" href = "css/design.css">
		<script src = "js/jquery.min.js"></script>
		<script src = "js/bootstrap.min.js"></script>
		<script src = "js/highcharts.js"></script>
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
					<li><a id = "li-a" href = "docs/manual.html"><i>Help?</i></a></li>
					<li><a id = 'li-a' href = 'home-profile.php'><?php echo $fl,$ln ?></a></li>;
					<li><a id = "li-a" href = "index.php"><b>Sign Out</b></a></li>
				</ul>
			</div>
		</nav>
		<p class="main-text">Reports and Information<p>
		<div class = "main-content">
			<div id="today"></div>
			<div id="today2"></div>
		</div>
	</body>
</html>
<?php
	require 'sql_connect.php';
	
	$s1 = "SELECT COUNT(*),p.p_name
				FROM order_products op
				RIGHT JOIN products p
				ON p.p_Id = op.p_Id
				GROUP BY p_name
				ORDER BY (p_name)";
	$s2 = "SELECT p_name FROM products ORDER BY p_name";
	
	$t1 = mysqli_query($conn,$s1);
	$t2 = mysqli_query($conn,$s2);
?>