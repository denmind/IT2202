<!DOCTYPE html>
<?php
	session_start();
	
	require 'sql_connect.php';
	
	$fq = "SELECT d.*, f.f_id, f.f_firstName, f.f_lastName
		   FROM delivery d
		   JOIN faculty f
		   ON f.f_id = d.d_Id
		   ORDER BY d_deliverySchedule DESC";
	
	$cq = "SELECT *
		   FROM client
		   ORDER BY c_LastName"; 
	
	$fset = mysqli_query($conn,$fq);
	$cset = mysqli_query($conn,$cq);
	
?>
<html>
	<head>
		<title>DFPPI | Delivery Orders</title>
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
			<form method = "post" autocomplete = "off" action = "add-dop.php" onsubmit = "return check();">
				<div class = "top-form">
					<p class = "form-header">Delivery Order Products</p>
				</div>
				<div class = "mid-form">
					<p class = "form-body">Delivery schedule / Employee assigned
						<select name = "d_Id" class = "input-form" data-validation="required">
							<option></option>
							<?php 
								while($var = mysqli_fetch_assoc($fset)){
									echo "<option value = '{$var["d_Id"]}'>{$var["d_deliverySchedule"]} [{$var["d_status"]}]  {$var["f_lastName"]}, {$var["f_firstName"]}</option>";
								}
							?>
						</select>
					</p>
					<p class = "form-body">Who is the client?
						<select name = "c_Id" class = "input-form" data-validation="required">
							<option></option>
							<?php 
								while($var = mysqli_fetch_assoc($cset)){
									echo "<option value = '{$var["c_Id"]}'>{$var["c_LastName"]}, {$var["c_FirstName"]}</option>";
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
	</body>
</html>
<script src = "js/confirm-form.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery.form-validator.js"></script>
<script src="js/validate.js"></script>