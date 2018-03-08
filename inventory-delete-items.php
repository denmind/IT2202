<!DOCTYPE html>
<?php 
	session_start();
	require 'sql_connect.php';
	
	/*show all records for select option*/
	$query = "SELECT sp_Id,sp_dateTimeStored,str.*,p.p_name
			FROM storage_products strp
			JOIN storage str 
			ON strp.s_Id = str.s_Id
			JOIN products p 
			ON p.p_Id = strp.p_Id
			ORDER BY sp_dateTimeStored DESC";
	
	$set = mysqli_query($conn,$query);
?>
<html>
	<head>
		<title>DFPPI Inventory</title>
		<link rel = "icon" href = "images/logo.png">
		<link rel = "stylesheet" href = "css/bootstrap.min.css" crossorigin = "anonymous">
		<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
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
						<p class = "form-header">Find stored item</p>
					</div>
					<div class = "mid-form">
					
						<!--Change names-->
						<p class = "form-body">Storage Schedule/Location/Product Name
							<select required name = "ia" class = "input-form" >
								<option value = 999></option>
								<?php 
									/*Change indexes*/
									while($var = mysqli_fetch_assoc($set)){
										echo "<option value = {$var["sp_Id"]}>{$var["sp_dateTimeStored"]} / {$var["s_isleLoc"]} {$var["s_rowLoc"]} {$var["s_colLoc"]} / {$var["p_name"]}</option>";
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
			}else if(!empty($_POST)){
				/*Change FROM .... */
				$find = "SELECT *
						FROM storage_products strp
						JOIN storage str 
						ON strp.s_Id = str.s_Id
						JOIN products p 
						ON p.p_Id = strp.p_Id
						WHERE sp_Id = '{$_POST["ia"]}'";
						
				$storage = "SELECT * FROM `storage` ORDER BY s_isleLoc";
				
				$products = "SELECT * FROM `products` WHERE status = 'In-use' ORDER BY `p_name`";
				
				$r = mysqli_fetch_assoc(mysqli_query($conn,$find));
				$storage = mysqli_query($conn,$storage);
				$products = mysqli_query($conn,$products);
				
				
				
		?>
			<div class = "div-form">
				<!--action-->
				<form method = "post" autocomplete = "off" action = "remove-items.php" >
					<div class = "top-form">
						<?php	
							echo "<p class = 'form-header'>";
							
							/*Change form title*/
							echo "{$r["sp_dateTimeStored"]} / [{$r["s_isleLoc"]}][{$r["s_rowLoc"]}][{$r["s_colLoc"]}] / {$r["p_name"]}";
							echo "</p>";
							
							/*Change to index current ide*/
							$_SESSION["edit-id"] = $r['sp_Id'];
						?>
					</div>
					<div class = "mid-form">
						<!-- input names and indexes change-->
						<p class = "form-body">ID
						<input type = "text" name = "sp_Id" disabled autofocus class = "input-form" maxlength = 11  value = <?php echo $r['sp_Id']?> ></p>
						<p class = "form-body">Quantity Stored
						<input type = "number" name = "sp_quantity" required="required" autofocus class = "input-form" maxlength = 11  value = <?php echo $r['sp_quantity']?> ></p>
						<p class = "form-body">Storage Schedule
						<input type = "text" name = "sp_dateTimeStored" id="form_datetime"  required = "required" class = "input-form" maxlength = 32  value = "<?php echo $r['sp_dateTimeStored']?>" data-date-format="yyyy-mm-dd hh:ii:ss" ></p>
						<p class = "form-body">Designated Storage
							<select name = "s_Id" class = "input-form">
								<?php
									while($key = mysqli_fetch_assoc($storage)){
								?>
										<option value = "<?php echo $key['s_Id']?>" <?php if($key['s_Id'] == $r['s_Id']) echo 'selected = "selected"'?>  >	
											<?php
												echo $key['s_isleLoc'];
												echo " / ";
												echo $key['s_rowLoc'];
												echo " / ";
												echo $key['s_colLoc'];
											?>
										</option>
								<?php
									}
								?>
							</select>
						</p>
						<p class = "form-body">Product Stored
							<select name = "p_Id" class = "input-form">
								<?php
									while($key = mysqli_fetch_assoc($products)){
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
					</div>
					<div class = "bot-form">
						<input type = "submit" value = "Submit Form" class = "input-submit">
					</div>
				</form>
			</div>
			<?php
				}
			?>
	</body>
</html>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<script src = "js/confirm-form.js"></script>
<script>
  $('#form_datetime').datetimepicker({
        weekStart: 1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
</script>