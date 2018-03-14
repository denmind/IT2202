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
	
	$query = "SELECT f_id,f_lastName,f_firstName FROM faculty WHERE f_department = 'Production' ORDER BY f_lastName ";
	
	$set = mysqli_query($link,$query);
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
		<div class = "div-form">
			<form method = "post" autocomplete = "off" action = "add-supply-order.php" onsubmit = "return check();">
				<div class = "top-form">
					<p class = "form-header">Supply Order Information</p>
				</div>
				<div class = "mid-form">
					<p class = "form-body">Quantity Ordered
					<input type = "number" name = "qo" required = "required" class = "input-form" maxlength = 32 autofocus placeholder = "Amount ordered"></p>
					<p class = "form-body">Faculty Assigned
					<select name = "type" class = "input-form">
						<option>- - - - - - - - - - - -</option>
						<?php 
							while($var = mysqli_fetch_assoc($set)){
								echo "<option value = '{$var["f_id"]}'>{$var["f_lastName"]},{$var["f_firstName"]}</option>";
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