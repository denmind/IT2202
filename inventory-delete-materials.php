<!DOCTYPE html>
<?php 
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "2101_final_project";

	$link = mysqli_connect($servername,$username,$password,$database);
	
	$query = "SELECT * FROM storage ORDER BY s_isleLoc";
	
	$set = mysqli_query($link,$query);
?>
<html>
	<head>
		<title>DFPPI Inventory</title>
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
						<p class = "form-header">Find storage area</p>
					</div>
					<div class = "mid-form">
					
						<!--Change names-->
						<p class = "form-body">Isle / [Row][Column]
							<select required name = "ia" class = "input-form" >
								<option value = 999></option>
								<?php 
								
									/*Change indexes*/
									while($var = mysqli_fetch_assoc($set)){
										echo "<option value = {$var["s_Id"]}>{$var["s_isleLoc"]} / [{$var["s_rowLoc"]}][{$var["s_colLoc"]}]</option>";
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
				/*Change FROM .... */
				$find = "SELECT * FROM storage WHERE s_Id = '{$_POST["ia"]}'";
				$r = mysqli_fetch_assoc(mysqli_query($link,$find));
		?>
			<div class = "div-form">
				<!--action-->
				<form method = "post" autocomplete = "off" action = "remove-storage.php" >
					<div class = "top-form">
						<?php	
							echo "<p class = 'form-header'>";
							
							/*Change form title*/
							echo "Isle {$r["s_isleLoc"]} [Row {$r["s_rowLoc"]}][Column {$r["s_colLoc"]}]";
							echo "</p>";
							
							/*Change to index current ide*/
							$_SESSION["edit-id"] = $r['s_Id'];
						?>
					</div>
					<div class = "mid-form">
						<!-- input names and indexes change-->
						<p class = "form-body">ID
						<input type = "text" name = "s_Id" disabled class = "input-form" maxlength = 11  value = <?php echo $r['s_Id']?> ></p>
						<p class = "form-body">Isle Location
						<input type = "text" name = "s_isleLoc" required = "required" class = "input-form" maxlength = 3  value = <?php echo $r['s_isleLoc']?> ></p>
						<p class = "form-body">Row Number
						<input type = "number" name = "s_rowLoc" required = "required" class = "input-form" maxlength = 8 value = <?php echo $r['s_rowLoc']?> ></p>
						<p class = "form-body">Column Number
						<input type = "number" name = "s_colLoc" required = "required" class = "input-form" maxlength = 8 value = <?php echo $r['s_colLoc']?> ></p>
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