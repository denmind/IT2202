<!DOCTYPE html>
<?php
	session_start();
    if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] != true){
        $_SESSION['isLogin'] = false;
        header("Location:index.php");
        exit();
    }
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "2101_final_project";

	$link = mysqli_connect($servername,$username,$password,$database);
	
	$fQuery = "SELECT f_id,f_lastName,f_firstName FROM faculty WHERE f_department='Production' ORDER BY f_lastName";
	$pQuery = "SELECT p_Id,p_name FROM products ORDER BY p_name";
	
	$fset = mysqli_query($link,$fQuery);
	$pset = mysqli_query($link,$pQuery);
?>
<html>
	<head>
		<title>DFPPI Add Production</title>
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
			<form method = "post" autocomplete = "off" action = "add-production.php" onsubmit = "return check();">
				<div class = "top-form">
					<p class = "form-header">Product Information</p>
				</div>
				<div class = "mid-form">
					<p class = "form-body">Production Date
					<input type = "date" name = "date" data-validation="required" class = "input-form"></p>
					<p class = "form-body">Production Quantity
					<input type = "text" name = "quantity" data-validation="required number" data-validation-allowing="positive" class = "input-form" maxlength = 32 placeholder = "Amount to produce"></p>
					<p class = "form-body">Faculty Id
						<select class = "input-form" name = "f_id">
							<option>- - - - - - - - - - - -</option>
								<?php 
									while($var = mysqli_fetch_assoc($fset)){
										echo "<option value = '{$var["f_id"]}'>{$var["f_lastName"]},{$var["f_firstName"]}</option>";
									}
								?>
						</select>
					</p>
					<p class = "form-body">Product Id
						<select class = "input-form" name = "p_id">
							<option>- - - - - - - - - - - -</option>
								<?php 
									while($s = mysqli_fetch_assoc($pset)){
										echo "<option value = '{$s["p_Id"]}'>{$s["p_name"]}</option>";
									}
								?>
						</select>
					</p>
				</div>
				<div class = "bot-form">
					<input type = "submit" value = "Submit Form" class = "input-submit">
				</div>
			</form>
		</div>
	</body>
</html>
<script src = "js/confirm-form.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery.form-validator.js"></script>
<script src="js/validate.js"></script>