<!DOCTYPE html>
<?php 
	session_start();
	require 'sql_connect.php';
	
	/*show all records for select option*/
	$query = "SELECT * FROM client ORDER BY c_LastName";
	
	$set = mysqli_query($conn,$query);
?>
<html>
	<head>
		<title>DFPPI Customers</title>
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
					
						<!--Change title-->
						<p class = "form-header">Find customer</p>
					</div>
					<div class = "mid-form">
					
						<!--Change names-->
						<p class = "form-body">Customer Names
							<select name = "ia" class = "input-form" data-validation="required">
								<option value = -999></option>
								<?php 
								
									/*Change indexes*/
									while($var = mysqli_fetch_assoc($set)){
										echo "<option value = {$var["c_Id"]}>{$var["c_LastName"]}, {$var["c_FirstName"]}</option>";
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
				/*Change FROM .... and WHERE ... */
				$find = "SELECT * FROM client WHERE c_Id = '{$_POST["ia"]}'";
				$r = mysqli_fetch_assoc(mysqli_query($conn,$find));
		?>
			<div class = "div-form">
				<!--action-->
				<form method = "post" autocomplete = "off" action = "remove-customers.php" >
					<div class = "top-form">
						<?php	
							echo "<p class = 'form-header'>";
							
							/*Change form title*/
							echo "{$r['c_FirstName'][0]}. {$r['c_LastName']}'s Information";
							echo "</p>";
							
							/*Change to index current ide*/
							$_SESSION["edit-id"] = $r['c_Id'];
						?>
					</div>
					<div class = "mid-form">
						<!-- input names and indexes change-->
						<p class = "form-body">ID
						<input type = "text" name = "c_Id" disabled class = "input-form" value = <?php echo $r['c_Id']?> ></p>
						<p class = "form-body">First Name 
						<input type = "text" name = "c_FirstName" class = "input-form" data-validation="length required alphanumeric" data-validation-length="max32" autofocus  value = <?php echo $r['c_FirstName']?> ></p>
						<p class = "form-body">Last Name
						<input type = "text" name = "c_LastName" class = "input-form" data-validation="length required alphanumeric" data-validation-length="max16" value = <?php echo $r['c_LastName']?> ></p>
						<p class = "form-body">Contact Information
						<input type = "text" name = "c_contactInfo" class = "input-form" data-validation="length required alphanumeric" data-validation-length="max64" data-validation-allowing="(-@.)" value = <?php echo $r['c_contactInfo']?> ></p>
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