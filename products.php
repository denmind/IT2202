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
		<title>DFPPI Products</title>
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
			<a href = "products-view.php" class = "bloke">
				<div class = "container">
					<img class = "bloke-img" src = "images/list.png" alt = "View all products" title = "View all products">
					<div class="overlay">
						<div class="text">View all products</div>
					 </div>
				</div>
			</a>
			<?php if(isset($_SESSION['privilege']) && ($_SESSION['privilege'] == 'Production' || $_SESSION['privilege'] == 'All')){ ?>
				<a href = "products-add.php" class = "bloke">
				<div class = "container">
					<img class = "bloke-img" src = "images/round-add.png" alt = "Add product" title = "Add product ">
						<div class="overlay">
							<div class="text">Add product</div>
						 </div>
					</div>
				</a>
				<a href = "products-delete.php" class = "bloke">
					<div class = "container">
						<img class = "bloke-img" src = "images/round-delete.png" alt = "Update product info" title = "Update product info">
						<div class="overlay">
							<div class="text">Update product info</div>
						 </div>
					</div>
				</a>
			<?php } ?>
		</div>
	</body>
</html>