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
		<title>DFPPI Inventory</title>
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
			<!---
			<a href = "inventory-view-raw.php" class = "bloke">
				<div class = "container">
					<img class = "bloke-img" src = "images/tape.png" alt = "View materials" title = "View materials">
					<div class="overlay">
							<div class="text">View materials</div>
					 </div>
				</div>
			</a>-->
			<a href = "inventory-view-items.php" class = "bloke">
				<div class = "container">
					<img class = "bloke-img" src = "images/storage.png" alt = "View stored items" title = "View stored items">
					<div class="overlay">
							<div class="text">View stored items</div>
					 </div>
				</div>
			</a>
			<a href = "inventory-view-items.php" class = "bloke">
				<div class = "container">
					<img class = "bloke-img" src = "images/warehouse.png" alt = "View stored items" title = "View stored items">
					<div class="overlay">
							<div class="text">View storage location info</div>
					 </div>
				</div>
			</a>
			
			<?php if(isset($_SESSION['privilege']) && ($_SESSION['privilege'] == 'Inventory' || $_SESSION['privilege'] == 'All')){ ?>
				<!---
				<a href = "inventory-add-materials.php" class = "bloke">
					<div class = "container">
						<img class = "bloke-img" src = "images/tape-add.png" alt = "Add material" title = "Add material">
						<div class="overlay">
								<div class="text">Add materials info</div>
						 </div>
					</div>
				</a>-->
				<a href = "inventory-add-materials.php" class = "bloke">
					<div class = "container">
						<img class = "bloke-img" src = "images/round-add.png" alt = "Add material" title = "Add material">
						<div class="overlay">
								<div class="text">Add storage location info</div>
						 </div>
					</div>
				</a>
				<a href = "inventory-add-items.php" class = "bloke">
					<div class = "container">
						<img class = "bloke-img" src = "images/cart-add.png" alt = "Add item to storage" title = "Add item to storage">
						<div class="overlay">
								<div class="text">Add item to storage</div>
						 </div>
					</div>
				</a>
				<!---
				<a href = "inventory-delete-raw.php" class = "bloke">
					<div class = "container">
						<img class = "bloke-img" src = "images/tape-min.png" alt = "Add material" title = "Add material">
						<div class="overlay">
								<div class="text">Update materials info</div>
						 </div>
					</div>
				</a>-->
				<a href = "inventory-delete-materials.php" class = "bloke">
					<div class = "container">
						<img class = "bloke-img" src = "images/round-delete.png" alt = "Update material info" title = "Update material info">
						<div class="overlay">
								<div class="text">Update storage location info</div>
						 </div>
					</div>
				</a>
				<a href = "inventory-delete-items.php" class = "bloke">
					<div class = "container">
						<img class = "bloke-img" src = "images/cart-remove.png" alt = "Update stored items" title = "Update stored items">
						<div class="overlay">
								<div class="text">Update stored items</div>
						 </div>
					</div>
				</a>
			<?php } ?>
		</div>
	</body>
</html>