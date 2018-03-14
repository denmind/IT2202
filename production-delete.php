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
	
	$query = "SELECT pr.*,f.f_lastName,f.f_firstName,p.p_name
				FROM production pr
				JOIN faculty f 
				ON f.f_id = pr.f_Id
				JOIN products p 
				ON p.p_Id = pr.p_Id
				ORDER BY prdn_date DESC";
	
	$set = mysqli_query($link,$query);
?>
<html>
	<head>
		<title>DFPPI Production</title>
		<link rel = "icon" href = "images/logo.png">
		<link rel = "stylesheet" href = "css/bootstrap.min.css" crossorigin = "anonymous">
		<link rel = "stylesheet" href = "css/design.css">
		<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
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
				<form method = "post" autocomplete = "off" action = <?php echo $_SERVER["PHP_SELF"]?> onsubmit = "<?php $flg++ ?>" >
					<div class = "top-form">
					
						<!--Change title-->
						<p class = "form-header">Production List</p>
					</div>
					<div class = "mid-form">
					
						<!--Change names-->
						<p class = "form-body">Date-Faculty Name-Product Name
							<select name = "ia" class = "input-form" required = "required">
								<option value = 999></option>
								<?php 
								
									/*Change indexes*/
									while($var = mysqli_fetch_assoc($set)){
										echo "<option value = {$var['prdn_Id']}>{$var['prdn_date']} - {$var['f_lastName']},{$var['f_firstName']} [{$var['p_name']}]</option>";
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
				$find = "SELECT pr.*,f.f_lastName,f.f_firstName,p.p_name
						FROM production pr
						JOIN faculty f 
						ON f.f_id = pr.f_Id
						JOIN products p 
						ON p.p_Id = pr.p_Id
						WHERE prdn_Id = '{$_POST["ia"]}'
						ORDER BY prdn_date DESC";
						
				$r = mysqli_fetch_assoc(mysqli_query($link,$find));
		?>
			<div class = "div-form">
				<form method = "post" autocomplete = "off" action = "remove-production.php" >
					<div class = "top-form">
						<?php	
							echo "<p class = 'form-header'>";
							echo "{$r['prdn_date']} - {$r['f_lastName']},{$r['f_firstName']} [{$r['p_name']}]";
							echo "</p>";
							$_SESSION["edit-id"] = $r['prdn_Id'];
						?>
					</div>
					<div class = "mid-form">
						<p class = "form-body">ID
						<input type = "text" name = "prdn_Id" disabled class = "input-form" maxlength = 11  value = <?php echo $r['prdn_Id']?> ></p>
						<p class = "form-body">Production Date
						<input type = "text" id="form_date" name = "prdn_date" required = "required" class = "input-form" maxlength = 32  value = <?php echo $r['prdn_date']?> data-date-format="yyyy-mm-dd" ></p>
						<p class = "form-body">Amount to produce
						<input type = "number" name = "prdn_quantity" required = "required" class = "input-form" maxlength = 11 value = <?php echo $r['prdn_quantity']?> ></p>	
						<p class = "form-body">Faculty Assignment
							<select name = "f_id" class = "input-form">
								<?php
									$fq = "SELECT * FROM faculty WHERE f_department = 'Production' ORDER BY f_lastName";
									
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
						<p class = "form-body">Product to produce
							<select name = "p_Id" class = "input-form">
								<?php
									$fq = "SELECT * FROM products WHERE status = 'In-use'";
									
									$fr = mysqli_query($link,$fq);
									
									while($key = mysqli_fetch_assoc($fr)){
								?>
										<option value = "<?php echo $key['p_Id']?>" <?php if($key['p_Id'] == $r['p_Id']) echo 'selected = "selected"'?>  >	
											<!--Display  names-->
											<?php echo $key['p_name'];?>
										</option>
								<?php
									}
								?>
							</select>
						</p>
					</div>
							<div class = "line-sep">
							</div>
							<div class = "warn-form"><p>PRODUCTION'S CURRENT STATUS</p>
								<div class = "warn-main">
									<select name = "status" class = "warn-input">
										<option id = 'y' value = "Not started" <?php if($r['status'] == 'Okay') echo "selected = 'selected'"?> >Not started</option>
										<option id = 'y' value = "Started" <?php if($r['status'] == 'Started') echo "selected = 'selected'"?> >Started</option>
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
				}
			?>
	</body>
</html>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<script src = "js/confirm-form.js"></script>
<script>
$('#form_date').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
</script>