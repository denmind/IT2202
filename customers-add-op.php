<!DOCTYPE html>
<?php 
	session_start(); 
	
	require 'sql_connect.php';
    if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] != true){
        $_SESSION['isLogin'] = false;
        header("Location:index.php");
        exit();
    }
	$pq = "SELECT * FROM products WHERE status = 'In-use' ORDER BY p_name";
	$cq = "SELECT orders.o_Id,orders.o_orderDateTime,client.c_Id,client.c_LastName,client.c_FirstName 
		FROM orders  
		JOIN client 
		ON client.c_Id = orders.c_Id
		WHERE o_status = 'Not started' 
		ORDER BY o_orderDateTime DESC";
		
	$pr = mysqli_query($conn,$pq);
	$cr = mysqli_query($conn,$cq);
?>
<html>
	<head>
		<title>DFPPI Add Order Products</title>
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
			<form method = "post" autocomplete = "off" action = "add-op.php" onsubmit = "return check();">
				<div class = "top-form">
					<p class = "form-header">Order Product Information</p>
				</div>
				<div class = "mid-form">
					<p class = "form-body">Product Quantity
					<input type = "text" name = "op_quantity" class = "input-form" autofocus data-validation="number required" data-validation-allowing="positive range[1;10000]"></p>
					<p class = "form-body">Product Name
						<select name = "p_Id" class = "input-form" data-validation="required">
							<option></option>
							<?php 
								while($var = mysqli_fetch_assoc($pr)){
									echo "<option value = '{$var["p_Id"]}'>{$var["p_name"]} [{$var["p_type"]}]</option>";
								}
							?>
						</select>
					</p>
					<p class = "form-body">Order Date/Client Name
						<select name = "o_Id" class = "input-form" >
							<option></option>
							<?php 
								while($var = mysqli_fetch_assoc($cr)){
									echo "<option value = '{$var["o_Id"]}'>{$var["o_orderDateTime"]} - {$var["c_LastName"]}, {$var["c_FirstName"]}</option>";
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
