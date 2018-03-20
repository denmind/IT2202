<!DOCTYPE html>
<?php 
	session_start();
	require 'sql_connect.php';
    if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] != true){
        $_SESSION['isLogin'] = false;
        header("Location:index.php");
        exit();
    }
	$query = "SELECT sdp.*,p.p_name
			FROM storage_delivery_products sdp
			JOIN storage_products sp
			ON sdp.s_Id = sp.s_Id
			JOIN products p
			ON p.p_Id = sp.p_Id
			ORDER BY sdp_dateTime DESC";
	
	$set = mysqli_query($conn,$query);
?>
<html>
	<head>
		<title>DFPPI | Delivery Orders</title>
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
		<?php 
			if(empty($_POST)){
		?>
			<div class = "div-form">
				<form method = "post" autocomplete = "off" action = <?php echo $_SERVER["PHP_SELF"]?> >
					<div class = "top-form">
						<p class = "form-header">Find delivery order products</p>
					</div>
					<div class = "mid-form">
						<p class = "form-body">Delivery order products
							<select name = "ia" class = "input-form" data-validation="required">
								<option value = -999></option>
								<?php 
									while($var = mysqli_fetch_assoc($set)){
										echo "<option value = {$var["sdp_Id"]}>[{$var["sdp_dateTime"]}] {$var["sdp_quantity"]}pcs  of {$var["p_name"]}
                                        </option>";
									}
								?>
							</select>
						</p>
					</div>
					<div class = "bot-form">
						<input type = "submit" value = "Edit information" class = "input-submit">
					</div>
				</form>
			</div>
		<?php
			}else if(($_POST["ia"]) != -999){
				
				$xid =  $_POST["ia"];
						
				$find = "SELECT sdp.*,p.p_name
						FROM storage_delivery_products sdp
						JOIN storage_products sp
						ON sdp.s_Id = sp.s_Id
						JOIN products p
						ON p.p_Id = sp.p_Id
						WHERE sdp_Id = {$xid}";
						
				$dlist = "SELECT d.*,f.f_firstName,f.f_lastName
						  FROM delivery d
						  JOIN faculty f
						  ON f.f_id = d.f_id
						  ORDER BY d_deliverySchedule DESC";
				
				$slist = "SELECT *
						FROM storage
						ORDER BY s_isleLoc";
				
				$r = mysqli_fetch_assoc(mysqli_query($conn,$find));
				$d = mysqli_query($conn,$dlist);
				$s = mysqli_query($conn,$slist);
		?>
			<div class = "div-form">
				<form method = "post" autocomplete = "off" action = "remove-stp.php" >
					<div class = "top-form">
						<?php	
							echo "<p class = 'form-header'>";
							echo "[{$r["sdp_dateTime"]}] {$r["sdp_quantity"]}pcs  of {$r["p_name"]}";
							echo "</p>";
							$_SESSION["edit-id"] = $xid;
						?>
					</div>
					<div class = "mid-form">
						<p class = "form-body">ID
						<input type = "text" name = "sdp_Id" disabled class = "input-form" maxlength = 11  value = <?php echo $xid?> ></p>
						<p class = "form-body">Quantity
						<input type = "text" name = "sdp_quantity" data-validation="required number" data-validation-allowing="positve" class = "input-form" maxlength = 11  value = <?php echo $r['sdp_quantity']?> ></p>
						<p class = "form-body">Gross Weight
						<input type = "text" name = "sdp_weight" data-validation="required number" data-validation-allowing="positve float" class = "input-form" maxlength = 11  value = <?php echo $r['sdp_weight']?> ></p>
						<p class = "form-body">When was it placed to delivery?
						<input  type="text" name="sdp_date" class = "input-form" id="form_datetime" value = "<?php echo $r['sdp_dateTime']?>" data-date-format="yyyy-mm-dd"></p>
						<!--Delivery's select status-->
						<p class = "form-body">Delivery Schedule /Faculty Assigned
						<select name = "d_Id" class = "input-form" data-validation="required">
							<option></option>
							<?php 
								while($var = mysqli_fetch_assoc($d)){
							?>
								echo "<option value = "<?php echo $var['d_Id']?>" <?php if($var['d_Id'] == $r['d_Id']) echo 'selected = "selected"'?> ><?php echo "[{$var["d_deliverySchedule"]}] {$var["f_lastName"]}, {$var["f_firstName"]}"; ?></option>";
							<?php
								}
							?>
						</select>
					</p>
					<p class = "form-body">Storage ID
						<select name = "s_Id" class = "input-form" data-validation="required">
							<option></option>
							<?php 
								while($var = mysqli_fetch_assoc($s)){
							?>
									<option value = "<?php echo $var['s_Id']?>" <?php if($var['s_Id'] == $r['s_Id']) echo 'selected = "selected"'?> ><?php echo "{$var["s_isleLoc"]} {$var["s_rowLoc"]}-{$var["s_colLoc"]}";  ?></option>;
							<?php
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
			<?php
				}else{
			?>
					<meta http-equiv='refresh' content='0; url=<?php echo $_SERVER["PHP_SELF"]; ?>' />
			<?php
				}
			?>
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