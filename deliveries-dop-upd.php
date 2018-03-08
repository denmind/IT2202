<!DOCTYPE html>
<?php 
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "2101_final_project";

	$link = mysqli_connect($servername,$username,$password,$database);
	
	$query = "SELECT d_Id,d_deliverySchedule,f.f_firstName,f.f_lastName
			FROM delivery d
			JOIN faculty f
			ON d.f_id = f.f_id
			ORDER BY d_deliverySchedule DESC";
	
	$set = mysqli_query($link,$query);
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
						<p class = "form-header">Find delivery schedule</p>
					</div>
					<div class = "mid-form">
						<p class = "form-body">Delivery Schedules
							<select name = "ia" class = "input-form" required = "required">
								<option value = 999></option>
								<?php 
									while($var = mysqli_fetch_assoc($set)){
										echo "<option value = {$var["d_Id"]}>{$var["d_deliverySchedule"]} {$var["f_lastName"]}, {$var["f_firstName"]}</option>";
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
			}else if(($_POST["ia"]) != 999){
				$xid =  $_POST["ia"];
				
				$find = "SELECT d.*,f.f_firstName,f.f_lastName
						FROM delivery d
						JOIN faculty f
						ON f.f_id = d.f_id
						WHERE d_Id = {$xid}";
				
				$output = mysqli_query($link,$find);
				
				$r = mysqli_fetch_assoc($output);
		?>
			<div class = "div-form">
				<form method = "post" autocomplete = "off" action = "remove-deliveries.php" >
					<div class = "top-form">
						<?php	
							echo "<p class = 'form-header'>";
							echo "({$r['d_deliverySchedule']}) {$r['f_firstName'][0]}. {$r['f_lastName']} ";
							echo "</p>";
							$_SESSION["edit-id"] = $r['d_Id'];
						?>
					</div>
					<div class = "mid-form">
						<p class = "form-body">ID
						<input type = "text" name = "pid" readonly = "readonly" class = "input-form" maxlength = 11  value = <?php echo $r['d_Id']?> ></p>
						<!--Delivery's select status-->
						<p class = "form-body">Current Status
						<select name = "d_status" class = "input-form">
								<option value = "Not started" <?php if($r['d_status'] == 'Not started') echo "selected = 'selected'"?> >Not started</option>
								<option value = "Finished" <?php if($r['d_status'] == 'Finished') echo "selected = 'selected'"?> >Finished</option>
							</select>
						</p>
						
						<!--Delivery date-->
						<p class = "form-body">Date of Delivery
						<input type = "date" name = "d_deliverySchedule" class = "input-form"  value = <?php echo $r['d_deliverySchedule']?> ></p>
						
						<!--Faculty assignment-->
						<p class = "form-body">Faculty Assigned
						<select name = "f_Id" class = "input-form">
								<?php
									$f_d = "SELECT f_id,f_firstName,f_lastName
											FROM `faculty` WHERE 
											f_department LIKE 'Delivery%'
											ORDER BY f_lastName";
											
									$f_r = mysqli_query($link,$f_d);
									
									while($key = mysqli_fetch_assoc($f_r)){
								?>
										<option value = "<?php echo $key['f_id']?>" <?php if($key['f_id'] == $r['f_id']) echo 'selected = "selected"'?>  >	
											<!--Display faculty names-->
											<?php echo $key['f_firstName'];?>
											<?php echo $key['f_lastName'];?>
										</option>
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
				}else if($_POST["ia"] == 999){
			?>
				<div class = "warn">
					<p>Properly select a record</p>
					<a href = "<?php echo $_SERVER['PHP_SELF']?>">Try Again</a>
				</div>
			<?php
				}
			?>
	</body>
</html>