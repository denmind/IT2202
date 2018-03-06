<!DOCTYPE html>
<?php 
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "2101_final_project";

	$link = mysqli_connect($servername,$username,$password,$database);
	
	$query = "SELECT * FROM products ORDER BY p_name";
	
	$set = mysqli_query($link,$query);
?>
<html>
	<head>
		<title>DFPPI Products</title>
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
						<p class = "form-header">Find product</p>
					</div>
					<div class = "mid-form">
					
						<!--Change names-->
						<p class = "form-body">Product Names
							<select required name = "ia" class = "input-form" >
								<option value = 999></option>
								<?php 
								
									/*Change indexes*/
									while($var = mysqli_fetch_assoc($set)){
										echo "<option value = {$var["p_Id"]}>{$var["p_name"]} [{$var["p_type"]}]</option>";
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
				$find = "SELECT * FROM products WHERE p_Id = '{$_POST["ia"]}'";
				$r = mysqli_fetch_assoc(mysqli_query($link,$find));
		?>
			<div class = "div-form">
				<!--action-->
				<form method = "post" autocomplete = "off" action = "remove-products.php" >
					<div class = "top-form">
						<?php	
							echo "<p class = 'form-header'>";
							
							/*Change form title*/
							echo "{$r['p_name']}'s Information";
							echo "</p>";
							
							/*Change to index current ide*/
							$_SESSION["edit-id"] = $r['p_Id'];
						?>
					</div>
					<div class = "mid-form">
						<!-- input names and indexes change-->
						<p class = "form-body">ID
						<input type = "text" name = "p_Id" readonly = "readonly" class = "input-form" maxlength = 11  value = <?php echo $r['p_Id']?> ></p>
						<p class = "form-body">Product Name 
						<input type = "text" name = "p_name" required = "required" class = "input-form" maxlength = 32  value = <?php echo $r['p_name']?> ></p>
						<p class = "form-body">Product Weight (kgs)
						<input type = "number" name = "p_weight" required = "required" class = "input-form" maxlength = 8 value = <?php echo $r['p_weight']?> ></p>
						<p class = "form-body">Product Pricing (Php)
						<input type = "number" name = "p_price" required = "required" class = "input-form" maxlength = 32 value = <?php echo $r['p_price']?> ></p>
						<p class = "form-body">Product Type
							<select required name = "p_type" class = "input-form">
								<option value = "Container" <?php if($r['p_type'] == 'Container') echo "selected = 'selected'"?> >Container</option>
								<option value = "Vacuum Pack" <?php if($r['p_type'] == 'Vacuum Pack') echo "selected = 'selected'"?> >Vacuum Pack</option>
								<option value = "Strap" <?php if($r['p_type'] == 'Strap') echo "selected = 'selected'"?> >Strap</option>
								<option value = "Sticker" <?php if($r['p_type'] == 'Sticker') echo "selected = 'selected'"?> >Sticker</option>
								<option value = "Post" <?php if($r['p_type'] == 'Post') echo "selected = 'selected'"?> >Post</option>
								<option value = "General" <?php if($r['p_type'] == 'General') echo "selected = 'selected'"?> >General Merchandise</option>
							</select>
						</p>
						<p class = "form-body">Product Description
						<textarea name = "p_descp" required = "required" class = "input-form" maxlength = 128 ><?php echo $r['p_descp']?></textarea></p>
					</div>
						<div class = "line-sep">
						</div>
						<div class = "warn-form"><p>PRODUCT'S CURRENT STATUS</p>
							<div class = "warn-main">
								<select name = "status" class = "warn-input">
									<option id = 'y' value = "Outdated" <?php if($r['status'] == 'Outdated') echo "selected = 'selected'"?> >Outdated</option>
									<option id = 'n' value = "In-use" <?php if($r['status'] == 'In-use') echo "selected = 'selected'"?> >In-use</option>
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