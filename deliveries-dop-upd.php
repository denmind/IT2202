<!DOCTYPE html>
<?php 
	session_start();
	require 'sql_connect.php';
    if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] != true){
        $_SESSION['isLogin'] = false;
        header("Location:index.php");
        exit();
    }
	$query = "SELECT deo.*,d.d_deliverySchedule,c.c_FirstName,c.c_LastName
			  FROM delivery_orders deo 
		   	  JOIN delivery d
			  ON deo.d_Id = d.d_Id
			  JOIN client c 
			  ON c.c_Id = deo.c_Id
			  ORDER BY do_Id DESC";
	
	$set = mysqli_query($conn,$query);
?>
<html>
	<head>
		<title>DFPPI | Delivery Orders</title>
		<link rel = "icon" href = "images/logo.png">
		<link rel = "stylesheet" href = "css/bootstrap.min.css" crossorigin = "anonymous">
		<link rel = "stylesheet" href = "css/design.css">
		<script src = "js/bootstrap.min.js"></script>
		<script src = "js/jquery.min.js"></script>	
		<script src = "js/confirm-form.js"></script>
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
						<p class = "form-header">Find delivery order</p>
					</div>
					<div class = "mid-form">
						<p class = "form-body">Delivery orders
							<select name = "ia" class = "input-form" data-validation="required">
								<option value = -999></option>
								<?php 
									while($var = mysqli_fetch_assoc($set)){
										echo "<option value = {$var["do_Id"]}>[{$var["d_deliverySchedule"]}] {$var["c_LastName"]}, {$var["c_FirstName"]}</option>";
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
						
				$find = "SELECT * FROM delivery_orders WHERE do_Id = {$xid}";
						
				$dlist = "SELECT d.*,f.f_firstName,f.f_lastName
						  FROM delivery d
						  JOIN faculty f
						  ON f.f_id = d.f_id
						  ORDER BY d_deliverySchedule DESC";
				
				$clist = "SELECT * FROM client";
				
				$r = mysqli_fetch_assoc(mysqli_query($conn,$find));
				$d = mysqli_query($conn,$dlist);
				$c = mysqli_query($conn,$clist);
		?>
			<div class = "div-form">
				<form method = "post" autocomplete = "off" action = "remove-dop.php" >
					<div class = "top-form">
						<?php	
							echo "<p class = 'form-header'>";
							echo "Delivery Order #{$xid}";
							echo "</p>";
							$_SESSION["edit-id"] = $xid;
						?>
					</div>
					<div class = "mid-form">
						<p class = "form-body">ID
						<input type = "text" name = "do_Id" disabled class = "input-form" maxlength = 11  value = <?php echo $xid?> ></p>
						<!--Delivery's select status-->
						<p class = "form-body">Delivery Schedule
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
					<p class = "form-body">Who is the client?
						<select name = "c_Id" class = "input-form" data-validation="required">
							<option></option>
							<?php 
								while($var = mysqli_fetch_assoc($c)){
							?>
									<option value = "<?php echo $var['c_Id']?>" <?php if($var['c_Id'] == $r['c_Id']) echo 'selected = "selected"'?> ><?php echo "{$var["c_LastName"]}, {$var["c_FirstName"]}";  ?></option>;
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