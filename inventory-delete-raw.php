<!DOCTYPE html>
<?php 
	session_start();
    if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] != true){
        $_SESSION['isLogin'] = false;
        header("Location:index.php");
        exit();
    }
	require 'sql_connect.php';
	
	$query = "SELECT * FROM `raw_materials` WHERE status = 'In-use' ORDER BY rm_name";
	
	$type = "SELECT rm_type
				FROM raw_materials
				GROUP BY rm_type
				ORDER BY rm_type";
		
		
	$result = mysqli_query($conn,$type);
	$set = mysqli_query($conn,$query);
	
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
						<p class = "form-header">Find material</p>
					</div>
					<div class = "mid-form">
					
						<!--Change names-->
						<p class = "form-body">Material Name/Type
							<select name = "ia" class = "input-form" >
								<option value = -999></option>
								<?php 
								
									/*Change indexes*/
									while($var = mysqli_fetch_assoc($set)){
										echo "<option value = {$var["rm_Id"]}>{$var["rm_name"]} / [{$var["rm_type"]}]</option>";
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
				$find = "SELECT * FROM raw_materials WHERE rm_Id = '{$_POST["ia"]}'";
				$store = "SELECT *
						FROM storage
						ORDER BY s_isleLoc";
					
				$product = "SELECT p_Id,p_name,p_type
							FROM products
							ORDER BY p_name";
							
				$s = mysqli_query($conn,$store);
				$p = mysqli_query($conn,$product);
				$r = mysqli_fetch_assoc(mysqli_query($conn,$find));
		?>
			<div class = "div-form">
				<!--action-->
				<form method = "post" autocomplete = "off" action = "remove-raw.php" >
					<div class = "top-form">
						<?php	
							echo "<p class = 'form-header'>";
							
							/*Change form title*/
							echo "{$r["rm_name"]} [{$r["rm_type"]}]";
							echo "</p>";
							
							/*Change to index current ide*/
							$_SESSION["edit-id"] = $r['s_Id'];
						?>
					</div>
					<div class = "mid-form">
						<!-- input names and indexes change-->
						<p class = "form-body">ID
					<input type = "text" name = "rm_Id" data-validation="required" class = "input-form" maxlength = 32 autofocus value = <?php echo $r['rm_Id']?> ></p>
						<p class = "form-body">Name
					<input type = "text" name = "rm_name" data-validation="required" class = "input-form" maxlength = 32 autofocus value = <?php echo $r['rm_name']?> ></p>
					<p class = "form-body">Quantity
					<input type = "text" name = "rm_quantity" data-validation="required number" data-validation-allowing="positive" class = "input-form" maxlength = 8 value = <?php echo $r['rm_quantity']?>></p>
					<p class = "form-body">Price per unit
					<input type = "text" name = "rm_pricePerUnit" data-validation="required number" data-validation-allowing="positive float" class = "input-form" maxlength = 8 value = <?php echo $r['rm_pricePerUnit']?>></p>
					<p class = "form-body">Type
							<select name = "rm_type" class = "input-form" data-validation="required">
								<?php
									while($key = mysqli_fetch_assoc($result)){
								?>
										<option value = "<?php echo $key['rm_type']?>" <?php if($key['rm_type'] == $r['rm_type']) echo 'selected = "selected"'?>  >	
											<?php 
												echo $key['rm_type'];
											?>
										</option>
								<?php
									}
								?>
							</select>
						</p>
					<p class = "form-body">Where to be stored?
							<select name = "s_Id" class = "input-form" data-validation="required">
								<?php
									while($key = mysqli_fetch_assoc($s)){
								?>
										<option value = "<?php echo $key['s_Id']?>" <?php if($key['s_Id'] == $r['s_Id']) echo 'selected = "selected"'?>  >	
											<?php 
												echo $key['s_isleLoc'];
												echo " / ";
												echo $key['s_rowLoc'];
												echo "-";
												echo $key['s_colLoc'];
											?>
										</option>
								<?php
									}
								?>
							</select>
						</p>
					<p class = "form-body">Where to be stored?
							<select name = "p_Id" class = "input-form" data-validation="required">
								<?php
									while($key = mysqli_fetch_assoc($p)){
								?>
										<option value = "<?php echo $key['p_Id']?>" <?php if($key['p_Id'] == $r['p_Id']) echo 'selected = "selected"'?>  >	
											<?php 
												echo $key['p_name'];
												echo " [";
												echo $key['p_type'];
												echo "]";
											?>
										</option>
								<?php
									}
								?>
							</select>
						</p>
					<p class = "form-body">Description (<span id="maxlength">128</span> characters left)
					<textarea name = "rm_descp" id="area" data-validation = "required alphanumeric"  data-validation-allowing=" "
					class = "input-form" maxlength = 128><?php echo $r['rm_descp']?></textarea></p>
					</div>
						<div class = "line-sep">
						</div>
						<div class = "warn-form"><p>Raw Material'S CURRENT STATUS</p>
							<div class = "warn-main">
								<select name = "state" class = "warn-input">
									<option id = 'y' value = "In-use" <?php if($r['status'] == 'In-use') echo "selected = 'selected'"?> >In-use</option>
									<option id = 'n' value = "Outdated" <?php if($r['status'] == 'Outdated') echo "selected = 'selected'"?> >Outdated</option>
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