<!DOCTYPE html>
<?php 
	session_start();
	require 'sql_connect.php';
    if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] != true){
        $_SESSION['isLogin'] = false;
        header("Location:index.php");
        exit();
    }
	/*show all records for select option*/
	$query = "SELECT o.*,c.c_FirstName,c.c_LastName,f.f_firstName,f.f_lastName
			FROM orders o 
			JOIN faculty f 
			ON f.f_id = o.f_Id
			JOIN client c 
			ON c.c_Id = o.c_Id
			ORDER BY o.o_orderDateTime DESC";
	
	$set = mysqli_query($conn,$query);
?>
<html>
	<head>
		<title>DFPPI Orders</title>
		<link rel = "icon" href = "images/logo.png">
		<link rel = "stylesheet" href = "css/bootstrap.min.css" crossorigin = "anonymous">
		<link rel = "stylesheet" href = "css/design.css">
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
				<form method = "post" autocomplete = "off" action = <?php echo $_SERVER["PHP_SELF"]?> onsubmit = "<?php $flg++ ?>" >
					<div class = "top-form">
					
						<!--Change title-->
						<p class = "form-header">Find order</p>
					</div>
					<div class = "mid-form">
					
						<!--Change names-->
						<p class = "form-body">Order Date / Client Name
							<select required name = "ia" class = "input-form" data-validation="required">
								<option value = -999></option>
								<?php 
								
									/*Change indexes*/
									while($var = mysqli_fetch_assoc($set)){
										echo "<option value = {$var["o_Id"]}>[{$var["o_orderDateTime"]}] {$var["c_FirstName"]} {$var["c_LastName"]}</option>";
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
				/*Change FROM .... */
				$find = "SELECT o.*,f.f_id,f.f_firstName,f.f_lastName,c.c_Id,c.c_FirstName,c.c_LastName
						FROM orders o
						JOIN client c 
						ON c.c_Id = o.c_Id
						JOIN faculty f 
						ON f.f_id = o.f_Id WHERE o_id = '{$_POST["ia"]}'";
						
				$client = "SELECT c_Id,c_FirstName,c_LastName FROM client ORDER BY c_LastName";
				
				$faculty = "SELECT f_Id,f_firstName,f_lastName 
				FROM faculty  
				WHERE f_department = 'Sales & Finances' AND f_status = 'Okay' 
				ORDER BY f_lastName";
				
				$r = mysqli_fetch_assoc(mysqli_query($conn,$find));
				$s = mysqli_query($conn,$client);
				$t = mysqli_query($conn,$faculty);
				
				
				
		?>
			<div class = "div-form">
				<!--action-->
				<form method = "post" autocomplete = "off" action = "remove-orders.php" onsubmit = "return check();" >
					<div class = "top-form">
						<?php	
							echo "<p class = 'form-header'>";
							
							/*Change form title*/
							echo "({$r["f_lastName"]},  {$r["f_firstName"]} / {$r["c_FirstName"]} {$r["c_LastName"]})";
							echo "</p>";
							
							/*Change to index current ide*/
							$_SESSION["edit-id"] = $r['o_Id'];
						?>
					</div>
					<div class = "mid-form">
						<!-- input names and indexes change-->
						<p class = "form-body">ID
						<input type = "text" name = "o_Id" class = "input-form" disabled value = <?php echo $r['o_Id']?> ></p>
						<p class = "form-body">Order Date
						<input type = "date"  name = "o_orderDateTime"class = "input-form" data-validation="date" value = <?php echo $r['o_orderDateTime']?> ></p>
						<p class = "form-body">Assign Employee
							<select name = "f_Id" class = "input-form" data-validation="required">
								<?php
									while($key = mysqli_fetch_assoc($t)){
								?>
										<option value = "<?php echo $key['f_Id']?>" <?php if($key['f_Id'] == $r['f_Id']) echo 'selected = "selected"'?>  >	
											<?php
												echo $key['f_lastName'];
												echo ", ";
												echo $key['f_firstName'];
											?>
										</option>
								<?php
									}
								?>
							</select>
						</p>
						<p class = "form-body">Who is the customer?
							<select name = "c_Id" class = "input-form" data-validation="required">
								<?php
									while($key = mysqli_fetch_assoc($s)){
								?>
										<option value = "<?php echo $key['c_Id']?>" <?php if($key['c_Id'] == $r['c_Id']) echo 'selected = "selected"'?>  >	
											<?php 
												echo $key['c_LastName'];
												echo ", ";
												echo $key['c_FirstName'];
											?>
										</option>
								<?php
									}
								?>
							</select>
						</p>
						<p class = "form-body">Address of Delivery
						<textarea name = "add" class = "input-form" data-validation="length required letternumeric" data-validation-allowing="#.()-" data-validation-length="min16 max128" ><?php echo $r['o_addressOfDelivery']?></textarea></p>
					</div>
							<div class = "line-sep">
							</div>
							<div class = "warn-form"><p>ORDER'S CURRENT STATUS</p>
								<div class = "warn-main">
									<select name = "status" class = "warn-input">
										<option id = 'y' value = "In production" <?php if($r['o_status'] == 'In production') echo "selected = 'selected'"?> >In production</option>
										<option id = 'y' value = "Done" <?php if($r['o_status'] == 'Done') echo "selected = 'selected'"?> >Done</option>
										<option id = 'y' value = "Not started" <?php if($r['o_status'] == 'Not started') echo "selected = 'selected'"?> >Not started</option>
									</select>
								</div>
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