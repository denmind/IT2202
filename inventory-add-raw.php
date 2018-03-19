<!DOCTYPE html>
<?php 
	session_start(); 
    if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] != true){
        $_SESSION['isLogin'] = false;
        header("Location:index.php");
        exit();
		
    }
	
	require 'sql_connect.php';
		
	if($conn){
		$type = "SELECT rm_type
				FROM raw_materials
				GROUP BY rm_type
				ORDER BY rm_type";
		
		$store = "SELECT *
				FROM storage
				ORDER BY s_isleLoc";
		
		$product = "SELECT p_Id,p_name,p_type
					FROM products
					ORDER BY p_name";
		
		$result = mysqli_query($conn,$type);
		$rstore = mysqli_query($conn,$store);
		$rproduct = mysqli_query($conn,$product);
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
		<div class = "div-form">
			<form method = "post" autocomplete = "off" action = "add-raw.php" onsubmit = "return check();">
				<div class = "top-form">
					<p class = "form-header">Raw Materials</p>
				</div>
				<div class = "mid-form">
					<p class = "form-body">Name
					<input type = "text" name = "rm_name" data-validation="required" class = "input-form" maxlength = 32 autofocus ></p>
					<p class = "form-body">Quantity
					<input type = "text" name = "rm_quantity" data-validation="required number" data-validation-allowing="positive" class = "input-form" maxlength = 8></p>
					<p class = "form-body">Price per unit
					<input type = "text" name = "rm_pricePerUnit" data-validation="required number" data-validation-allowing="positive float" class = "input-form" maxlength = 8></p>
					<p class = "form-body">Type
						<select name = "rm_type" class = "input-form" data-validation="required">
							<option value="General">General</option>
							<?php 
								while($var = mysqli_fetch_assoc($result)){
									echo "<option value = '{$var["rm_type"]}'>{$var["rm_type"]}</option>";
								}
							?>
						</select>	
					</p>
					<p class = "form-body">Where to be stored?
						<select name = "s_Id" class = "input-form" data-validation="required">
							<option></option>
							<?php 
								while($var = mysqli_fetch_assoc($rstore)){
									echo "<option value = '{$var["s_Id"]}'>{$var["s_isleLoc"]} / {$var["s_rowLoc"]} / {$var["s_colLoc"]}</option>";
								}
							?>
						</select>	
					</p>
					<p class = "form-body">For what product?
						<select name = "p_Id" class = "input-form" >
							<option></option>
							<?php 
								while($var = mysqli_fetch_assoc($rproduct)){
									echo "<option value = '{$var["p_IdPrimary"]}'>{$var["p_name"]} [{$var["p_type"]}] </option>";
								}
							?>
						</select>	
					</p>
					<p class = "form-body">Description (<span id="maxlength">128</span> characters left)
					<textarea name = "rm_descp" id="area" data-validation = "required alphanumeric"  class = "input-form" maxlength = 128></textarea></p>
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