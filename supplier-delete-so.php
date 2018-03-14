<!DOCTYPE html>
<?php 
	session_start();
    if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] != true){
        $_SESSION['isLogin'] = false;
        header("Location:index.php");
        exit();
    }
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "2101_final_project";

	$link = mysqli_connect($servername,$username,$password,$database);
	
	$query = "SELECT so.*,f.f_lastName,f.f_firstName
			FROM supply_orders so
			JOIN faculty f 
			ON f.f_id = so.f_Id
			ORDER BY so_DateTime DESC";
	
	$set = mysqli_query($link,$query);
?>
<html>
	<head>
		<!--Change title-->
		<title>DFPPI Supplier</title>
		
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
				<form method = "post" autocomplete = "off" action = <?php echo $_SERVER["PHP_SELF"]?> >
					<div class = "top-form">
						<!--Change title-->
						<p class = "form-header">Supply Orders</p>
					</div>
					<div class = "mid-form">
						<!--Change names-->
						<p class = "form-body">Date -- Faculty Assigned
							<select required name = "ia" class = "input-form">
								<option value = 999></option>
								<?php 
									/*Change indexes*/
									while($var = mysqli_fetch_assoc($set)){
										echo "<option value = {$var["so_Id"]}>{$var["so_DateTime"]} -- {$var["f_lastName"]}, {$var["f_firstName"]}</option>";
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
				$find = "SELECT so.*,f.f_lastName,f.f_firstName
				FROM supply_orders so
				JOIN faculty f 
				ON f.f_id = so.f_Id
				WHERE so_Id = '{$_POST["ia"]}'
				ORDER BY so_DateTime DESC ";
				
				$r = mysqli_fetch_assoc(mysqli_query($link,$find));
		?>
			<div class = "div-form">
				<!--action-->
				<form method = "post" autocomplete = "off" action = "remove-supply-order.php" >
					<div class = "top-form">
						<?php	
							echo "<p class = 'form-header'>";
							
							/*Change form title*/
							echo "{$r["f_lastName"]}, {$r["f_firstName"]} [{$r["so_DateTime"]}] ";
							echo "</p>";
							
							/*Change to index current ide*/
							$_SESSION["edit-id"] = $r['so_Id'];
						?>
					</div>
					<div class = "mid-form">
						<!-- input names and indexes change-->
						<p class = "form-body">ID
						<input type = "text" name = "so_Id" disabled class = "input-form" maxlength = 11  value = <?php echo $r['so_Id']?> ></p>
						<p class = "form-body">Date/Time Ordered
						<input  type="text" name="so_DateTime" class = "input-form" id="form_datetime" value = "<?php echo $r['so_DateTime']?>" data-date-format="yyyy-mm-dd hh:ii:ss"></p>
						<p class = "form-body">Quantity Ordered
						<input type = "number" name = "so_quantityOrdered" data-validation="required number" data-validation-allowing"positive" class = "input-form" maxlength = 8 value = <?php echo $r['so_quantityOrdered']?> ></p>
						<p class = "form-body">Faculty Assignment
							<select data-validation="required" name = "f_id" class = "input-form">
								<?php
									$fq = "SELECT * FROM faculty WHERE f_department = 'Production'";
									
									$fr = mysqli_query($link,$fq);
									
									while($key = mysqli_fetch_assoc($fr)){
								?>
										<option value = "<?php echo $key['f_id']?>" <?php if($key['f_id'] == $r['f_Id']) echo 'selected = "selected"'?>  >	
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
					<div class = "line-sep">
						</div>
						<div class = "warn-form"><p>SUPPLY ORDER'S STATUS</p>
							<div class = "warn-main">
								<select name = "status" class = "warn-input">
									<option id = 'y' value = "Not Started" <?php if($r['status'] == 'Okay') echo "selected = 'selected'"?> >Not Started</option>
									<option id = 'n' value = "Finished" <?php if($r['status'] == 'Terminated') echo "selected = 'selected'"?> >Finished</option>
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