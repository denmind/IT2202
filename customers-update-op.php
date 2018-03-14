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
	$query = "SELECT op.*,o.o_orderDateTime,p.p_name,c.c_FirstName,c.c_LastName
						FROM order_products op
						JOIN products p
						ON p.p_Id = op.p_Id
						JOIN orders o 
						ON o.o_Id = op.o_Id
						JOIN client c 
						ON o.c_Id = c.c_Id
                        ORDER BY o.o_orderDateTime DESC";
	
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
				<form method = "post" autocomplete = "off" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
					<div class = "top-form">
					
						<!--Change title-->
						<p class = "form-header">Find order</p>
					</div>
					<div class = "mid-form">
					
						<!--Change names-->
						<p class = "form-body">Order Date/Customer Name
							<select data-validation="required" name = "ia" class = "input-form" >
								<option value = -999></option>
								<?php 
								
									/*Change indexes*/
									while($var = mysqli_fetch_assoc($set)){
										echo "<option value = {$var["op_Id"]}>[{$var["o_orderDateTime"]}] {$var["c_FirstName"]} {$var["c_LastName"]}</option>";
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
				$x = "SELECT op.*,o.o_Id,o.o_orderDateTime,p.p_Id,p.p_name,c.c_FirstName,c.c_LastName
						FROM order_products op
						JOIN products p
						ON p.p_Id = op.p_Id
						JOIN orders o 
						ON o.o_Id = op.o_Id
						JOIN client c 
						ON o.c_Id = c.c_Id
						WHERE op.op_Id = '{$_POST["ia"]}'";
						
				$y = "SELECT o_Id,o_orderDateTime,c.c_Id,c.c_FirstName,c.c_LastName
						FROM orders o
						JOIN client c 
						ON c.c_Id = o.c_Id
						ORDER BY o_orderDateTime DESC";
						
				$z = "SELECT p_Id,p_name,p_type
						FROM products p
						ORDER BY p_name";
						
				$r = mysqli_fetch_assoc(mysqli_query($conn,$x));
				$s = mysqli_query($conn,$y);
				$t = mysqli_query($conn,$z);
		?>
			<div class = "div-form">
				<!--action-->
				<form method = "post" autocomplete = "off" action = "remove-op.php" onsubmit = "return check();">
					<div class = "top-form">
						<?php	
							echo "<p class = 'form-header'>";
							
							/*Change form title*/
							echo "{$r["c_FirstName"]} {$r["c_LastName"]} [{$r["o_orderDateTime"]}] Info";
							echo "</p>";
							
							/*Change to index current ide*/
							$_SESSION["edit-id"] = $r['o_Id'];
						?>
					</div>
					<div class = "mid-form">
						<!-- input names and indexes change-->
						<p class = "form-body">ID
						<input type = "text" name = "o_Id" disabled class = "input-form" value = <?php echo $r['o_Id']?> ></p>
						<p class = "form-body">Product Quantity
						<input type = "text" name = "op_quantity" class = "input-form" autofocus data-validation="number required" data-validation-allowing="positive range[1;10000]" value = <?php echo $r['op_quantity']?>></p>
						<p class = "form-body">Order ID
							<select name = "o_Id" class = "input-form" data-validation="required">
								<?php
									while($key = mysqli_fetch_assoc($s)){
								?>
										<option value = "<?php echo $key['o_Id']?>" <?php if($key['o_Id'] == $r['o_Id']) echo 'selected = "selected"'?>  >	
											<?php 
												echo "[";
												echo $key['o_orderDateTime'];
												echo "] ";
												echo $key['c_FirstName'];
												echo " ";
												echo $key['c_LastName'];
											?>
										</option>
								<?php
									}
								?>
							</select>
						</p>
						<p class = "form-body">Product ID
							<select name = "p_Id" class = "input-form" data-validation="required">
								<?php
									while($key = mysqli_fetch_assoc($t)){
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