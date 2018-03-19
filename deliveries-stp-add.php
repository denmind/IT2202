<!DOCTYPE html>
<?php
	session_start();
	
	require 'sql_connect.php';
    if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] != true){
        $_SESSION['isLogin'] = false;
        header("Location:index.php");
        exit();
    }
	$sq = "SELECT * FROM storage ORDER BY s_isleLoc";
	
	$dq = "SELECT * FROM delivery ORDER BY d_deliverySchedule DESC"; 
	
	$sres = mysqli_query($conn,$sq);
	$dres = mysqli_query($conn,$dq);
	
?>
<html>
	<head>
		<title>DFPPI | Delivery Order Products</title>
		<link rel = "icon" href = "images/logo.png">
		<link rel = "stylesheet" href = "css/bootstrap.min.css" crossorigin = "anonymous">
		<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
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
			<form method = "post" autocomplete = "off" action = "add-stp.php" onsubmit = "return check();">
				<div class = "top-form">
					<p class = "form-header">Delivery Order Products</p>
				</div>
				<div class = "mid-form">
					<p class = "form-body">Quantity
					<input type = "text" name = "sdp_quantity" data-validation="required number" data-validation-allowing="positive" class = "input-form" maxlength = 32 autofocus></p>
					<p class = "form-body">Gross Weight
					<input type = "text" name = "sdp_weight" data-validation="required number" data-validation-allowing="positive float" class = "input-form" maxlength = 32></p>
					<p class = "form-body">When was it placed to delivery?
					<input  type="text" name="sdp_date" class = "input-form" id="form_datetime" data-date-format="yyyy-mm-dd"></p>
					<p class = "form-body">Supplier ID
						<select name = "s_Id" class = "input-form" data-validation="required">
							<option></option>
							<?php 
								while($var = mysqli_fetch_assoc($sres)){
									echo "<option value = '{$var["s_Id"]}'>{$var["s_isleLoc"]} / {$var["s_rowLoc"]}-{$var["s_colLoc"]}</option>";
								}
							?>
						</select>
					</p>
					<p class = "form-body">Delivery ID
						<select name = "d_Id" class = "input-form" data-validation="required">
							<option></option>
							<?php 
								while($var = mysqli_fetch_assoc($dres)){
									echo "<option value = '{$var["d_Id"]}'>{$var["d_deliverySchedule"]} [{$var["d_status"]}]</option>";
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
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<script>
$('#form_datetime').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
</script>