<!DOCTYPE html>
<?php
	session_start();
?>
<html>
	<head>
		<title>DFPPI Employees</title>
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
				<a href = "employees-attendance.php" class = "bloke">
					<div class = "container">
						<img class = "bloke-img" src = "images/calendar.png" alt = "View faculty attendance" title = "View faculty attendance">
						<div class="overlay">
							<div class="text">View faculty attendance</div>
						 </div>
					</div>
				</a>
				<a href = "employees-view.php" class = "bloke">
					<div class = "container">
						<img class = "bloke-img" src = "images/id-card.png" alt = "View faculty's information" title = "View faculty's information">
						<div class="overlay">
							<div class="text">View faculty's information</div>
						 </div>
					</div>
				</a>
				
				<?php if($_SESSION['privilege'] == 'Human Resources' || $_SESSION['privilege'] == 'All'){ ?>
					<a href = "employees-add.php" class = "bloke">
						<div class = "container">
							<img class = "bloke-img" src = "images/add-user.png" alt = "Add faculty member" title = "Add faculty member">
							<div class="overlay">
								<div class="text">Add faculty member</div>
							 </div>
						</div>
					</a>
					<a href = "employees-delete.php" class = "bloke">
						<div class = "container">
							<img class = "bloke-img" src = "images/remove-user.png" alt = "Update faculty member info" title = "Remove faculty member">
							<div class="overlay">
								<div class="text">Update faculty member info</div>
							 </div>
						</div>
					</a>
				<?php } ?>
		</div>
	</body>
</html>