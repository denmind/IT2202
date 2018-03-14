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
		<div class = "div-form">
			<form method = "post" autocomplete = "off" action = "add-product.php" onsubmit = "return check();">
				<div class = "top-form">
					<p class = "form-header">Product Information</p>
				</div>
				<div class = "mid-form">
					<p class = "form-body">Product Name
					<input type = "text" name = "name" required = "required" class = "input-form" maxlength = 32 autofocus placeholder = "Inch-Strong"></p>
					<p class = "form-body">Product Type
					<select name = "type" class = "input-form">
						<option value = "General">General</option>
						<option value = "Container">Container</option>
						<option value = "Vacuum Pack">Vacuum Pack</option>
						<option value = "Strap">Strap</option>
						<option value = "Sticker">Sticker</option>
						<option value = "Post">Post</option>
					</select>
					<!--<input type = "text" name = "type" required = "required" class = "input-form" maxlength = 32 placeholder = "Container/Vacuum Pack/Strap/Sticker/Post"></p>-->
					<p class = "form-body">Weight
					<input type = "text" name = "weight" required = "required" class = "input-form" maxlength = 32 placeholder = "32"></p>
					<p class = "form-body">Price per quantity
					<input type = "text" name = "price" required = "required" class = "input-form" maxlength = 32 placeholder = "523"></p>
					<p class = "form-body">Product Description
					<textarea name = "descp" required = "required" class = "input-form" maxlength = 128 placeholder = "Long-lasting and durable"></textarea></p>
				</div>
				<div class = "bot-form">
					<input type = "submit" value = "Submit Form" class = "input-submit">
				</div>
			</form>
		</div>
	</body>
</html>