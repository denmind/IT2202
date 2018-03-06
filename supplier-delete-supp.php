<!DOCTYPE html>
<?php 
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "2101_final_project";

	$link = mysqli_connect($servername,$username,$password,$database);
	
	$query = "SELECT supp_Id,supp_name FROM supplier ORDER BY supp_name";
	
	$set = mysqli_query($link,$query);
?>
<html>
	<head>
		<!--Change title-->
		<title>DFPPI Supplier</title>
		
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
				<form method = "post" autocomplete = "off" action = <?php echo $_SERVER["PHP_SELF"]?> >
					<div class = "top-form">
						<!--Change title-->
						<p class = "form-header">Supplier Information</p>
					</div>
					<div class = "mid-form">
						<!--Change names-->
						<p class = "form-body">Supplier Name
							<select required name = "ia" class = "input-form">
								<option value = 999></option>
								<?php 
									/*Change indexes*/
									while($var = mysqli_fetch_assoc($set)){
										echo "<option value = {$var["supp_Id"]}>{$var["supp_name"]}</option>";
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
				$find = "SELECT * FROM supplier
			WHERE supp_Id = '{$_POST["ia"]}'";
				$r = mysqli_fetch_assoc(mysqli_query($link,$find));
		?>
			<div class = "div-form">
				<!--action-->
				<form method = "post" autocomplete = "off" action = "remove-supplier.php" >
					<div class = "top-form">
						<?php	
							echo "<p class = 'form-header'>";
							
							/*Change form title*/
							echo "{$r["supp_name"]} [{$r["supp_contact"]}] ";
							echo "</p>";
							
							/*Change to index current ide*/
							$_SESSION["edit-id"] = $r['supp_Id'];
						?>
					</div>
					<div class = "mid-form">
						<!-- input names and indexes change-->
						<p class = "form-body">ID
						<input type = "text" name = "supp_Id" disabled class = "input-form" maxlength = 11  value = <?php echo $r['supp_Id']?> ></p>
						<p class = "form-body">Supplier Name
						<input  type="text" name="supp_name" class = "input-form" id="form_datetime" value = "<?php echo $r['supp_name']?>"></p>
						<p class = "form-body">Contact Info
						<input type = "text" name = "supp_contact" class = "input-form" maxlength = 64 value = "<?php echo $r['supp_contact']?>" ></p>
						<p class = "form-body">Supplier's Address
						<textarea name = "supp_address" required = "required" class = "input-form" maxlength = 128 ><?php echo $r['supp_address']?></textarea></p>
						
					</div>
					<div class = "bot-form">
						<input type = "submit" value = "Submit Form" class = "input-submit">
					</div>
					<div class = "line-sep">
						</div>
						<div class = "warn-form"><p>SUPPLIER'S CONTRACT STATUS</p>
							<div class = "warn-main">
								<select name = "supp_stat" class = "warn-input">
									<option id = 'y' value = "On-contract" <?php if($r['supp_stat'] == 'On-contract') echo "selected = 'selected'"?> >On-contract</option>
									<option id = 'n' value = "Expired" <?php if($r['supp_stat'] == 'Expired') echo "selected = 'selected'"?> >Expired</option>
								</select>
							</div>
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
