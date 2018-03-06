<!DOCTYPE html>
<?php
	session_start();
?>
<html>
	<head>
		<title>DFPPI Deliveries</title>
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
		<div class = "choices">
				<a href = "deliveries-view.php" class = "bloke">
					<div class = "container">
						<img class = "bloke-img" src = "images/delivery.png" alt = "View/Search a delivery schedule" title = "View/Search a delivery schedule">
						<div class="overlay">
							<div class="text">View/Search a delivery schedule</div>
						 </div>
					</div>
				</a>
				
				<?php if($_SESSION['privilege'] == 'Delivery & Transportation' || $_SESSION['privilege'] == 'All'){ ?>
					<a href = "deliveries-add.php" class = "bloke">
						<div class = "container">
							<img class = "bloke-img" src = "images/round-add.png" alt = "Add delivery schedules" title = "Add Delivery schedules">
							<div class="overlay">
								<div class="text">Add delivery schedules</div>
							 </div>
						</div>
					</a>
					<a href = "deliveries-delete.php" class = "bloke">
						<div class = "container">
							<img class = "bloke-img" src = "images/round-delete.png" alt = "Update schedules" title = "Remove schedules">
							<div class="overlay">
								<div class="text">Update schedules</div>
							 </div>
						</div>
					</a>
				<?php } ?>
		</div>
	</body>
</html>