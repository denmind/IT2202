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
	$rq = "SELECT rm_Id,rm_name,rm_type
			FROM raw_materials
			ORDER BY rm_name";
	$sq = "SELECT supp_Id,supp_name
			FROM supplier
			ORDER BY supp_name";
	
	$set = mysqli_query($link,$query);
	$mres = mysqli_query($link,$rq);
	$sres = mysqli_query($link,$sq);
?>
<html>
	<head>
		<title>DFPPI Supplier</title>
		<link rel = "icon" href = "images/logo.png">
		<link rel = "stylesheet" href = "css/bootstrap.min.css" crossorigin = "anonymous">
		<link rel = "stylesheet" href = "css/design.css">
		<script src = "js/bootstrap.min.js"></script>
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
					<input type = "number" name = "so_quantityOrdered" data-validation="required number" data-validation-allowing="positive" class = "input-form" maxlength = 32 autofocus placeholder = "Amount ordered"></p>
					<p class = "form-body">Faculty Assigned
						<select data-validation="required" name = "f_id" class = "input-form">
							<option>- - - - - - - - - - - -</option>
							<?php 
								while($var = mysqli_fetch_assoc($set)){
									echo "<option value = '{$var["f_id"]}'>{$var["f_lastName"]},{$var["f_firstName"]}</option>";
								}
							?>
						</select>
					</p>
					<p class = "form-body">Material Ordered
						<select data-validation="required" name = "rm_Id" class = "input-form">
							<option>- - - - - - - - - - - -</option>
							<?php 
								while($var = mysqli_fetch_assoc($mres)){
									echo "<option value = '{$var["rm_Id"]}'>{$var["rm_name"]} [{$var["rm_type"]}]</option>";
								}
							?>
						</select>
					</p>
					<p class = "form-body">Who is the supplier?
						<select data-validation="required" name = "supp_Id" class = "input-form">
							<option>- - - - - - - - - - - -</option>
							<?php 
								while($var = mysqli_fetch_assoc($sres)){
									echo "<option value = '{$var["supp_Id"]}'>{$var["supp_name"]}</option>";
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