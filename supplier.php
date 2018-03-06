<!DOCTYPE html>
<?php
	session_start();
?>
<html>
	<head>
		<title>DFPPI Suppliers</title>
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
			<a href = "supplier-view-so.php" class = "bloke">
				<div class = "container">
					<img class = "bloke-img" src = "images/empty-cart.png" alt = "View/Search a supply order" title = "View/Search a supply orders">
					<div class="overlay">
						<div class="text">View/Search a supply order</div>
					 </div>
				</div>
			</a>
			<a href = "supplier-view-supp.php" class = "bloke">
				<div class = "container">
					<img class = "bloke-img" src = "images/supply-group.png" alt = "View/Search for a supplier" title = "View/Search for a supplier">
					<div class="overlay">
						<div class="text">View/Search for a supplier</div>
					 </div>
				</div>
			</a>
			<?php if($_SESSION['privilege'] == 'Production' || $_SESSION['privilege'] == 'All'){ ?>
				<a href = "supplier-add-so.php" class = "bloke">
					<div class = "container">
						<img class = "bloke-img" src = "images/order-cart.png" alt = "Add a supply order" title = "Add a supply order">
						<div class="overlay">
							<div class="text">Add a supply order</div>
						 </div>
					</div>
				</a>
				<a href = "supplier-add-supp.php" class = "bloke">
				<div class = "container">
					<img class = "bloke-img" src = "images/add-group.png" alt = "Add supplier's info" title = "Add supplier's info">
					<div class="overlay">
						<div class="text">Add supplier's info</div>
					 </div>
				</div>
				</a>
				<a href = "supplier-delete-so.php" class = "bloke">
					<div class = "container">
						<img class = "bloke-img" src = "images/remove-cart.png" alt = "Update supply order" title = "Update supply order">
						<div class="overlay">
							<div class="text">Update supply order</div>
						 </div>
					</div>
				</a>
				<a href = "supplier-delete-supp.php" class = "bloke">
					<div class = "container">
						<img class = "bloke-img" src = "images/remove-group.png" alt = "Update supplier info" title = "Update supplier info">
						<div class="overlay">
							<div class="text">Update supplier info</div>
						 </div>
					</div>
				</a>
			<?php } ?>
		</div>
	</body>
</html>