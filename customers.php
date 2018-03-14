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
		<div class = "choices">
				<a href = "customers-view-customer.php" class = "bloke">
					<div class = "container">
						<img class = "bloke-img" src = "images/group.png" alt = "View/Search for a customer" title = "Search for a customer">
						<div class="overlay">
							<div class="text">View/Search for a customer</div>
						 </div>
					</div>
				</a>
				<a href = "customers-view-orders.php" class = "bloke">
					<div class = "container">
						<img class = "bloke-img"src = "images/online-shop.png" alt = "View/Search for an order" title = "Search for an order">
						<div class="overlay">
							<div class="text">View/Search for an order</div>
						 </div>
					</div>
				</a>
				<a href = "customers-view-op.php" class = "bloke">
					<div class = "container">
						<img class = "bloke-img" src = "images/price-tag.png" alt = "View/Search ordered products" title = "View/Search ordered products">
						<div class="overlay">
							<div class="text">View/Search ordered products</div>
						 </div>
					</div>
				</a>
				<?php if(isset($_SESSION['privilege']) && ($_SESSION['privilege'] == 'Sales & Finances' || $_SESSION['privilege'] == 'All')){ ?>
					<a href = "customers-add-customer.php" class = "bloke">
						<div class = "container">
							<img class = "bloke-img" src = "images/add-client.png" alt = "Add customer info" title = "Add customer info">
							<div class="overlay">
								<div class="text">Add customer info</div>
							 </div>
						</div>	
					</a>
					<a href = "customers-add-order.php" class = "bloke">
						<div class = "container">
							<img class = "bloke-img" src = "images/shopping-cart.png" alt = "Add customer order" title = "Add customer order">
							<div class="overlay">
								<div class="text">Add customer order</div>
							 </div>
						</div>
					</a>
					<a href = "customers-add-op.php" class = "bloke">
						<div class = "container">
							<img class = "bloke-img" src = "images/shopping-bag.png" alt = "Add product to an order" title = "Add product to an order">
							<div class="overlay">
								<div class="text">Add product to an order</div>
							 </div>
						</div>
					</a>
					<a href = "customers-update-customer.php" class = "bloke">
						<div class = "container">
							<img class = "bloke-img" src = "images/update-customer.png" alt = "Update customer info" title = "Update customer info">
							<div class="overlay">
								<div class="text">Update customer info</div>
							 </div>
						</div>
					</a>
					<a href = "customers-update-orders.php" class = "bloke">
						<div class = "container">
							<img class = "bloke-img" src = "images/update-order.png" alt = "Update order info" title = "Update order info">
							<div class="overlay">
								<div class="text">Update order info</div>
							 </div>
						</div>
					</a>
					<a href = "customers-update-op.php" class = "bloke">
						<div class = "container">
							<img class = "bloke-img" src = "images/edit.png" alt = "Edit products from an order" title = "Edit products from an order">
							<div class="overlay">
								<div class="text">Edit products from an order</div>
							 </div>
						</div>
				</a>
				<?php } ?>
				
				
		</div>
	</body>
</html>
