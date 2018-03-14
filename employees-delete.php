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
	
	$query = "SELECT * FROM faculty ORDER BY f_lastName";
	
	$set = mysqli_query($link,$query);
	$flg = 0;
?>
<html>
	<head>
		<title>DFPPI Update</title>
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
						<p class = "form-header">Find faculty member</p>
					</div>
					<div class = "mid-form">
						<p class = "form-body">Faculty Names
							<select name = "ia" class = "input-form" data-validation = "required">
								<option value = -999></option>
								<?php 
									while($var = mysqli_fetch_assoc($set)){
										echo "<option value = {$var["f_id"]}>{$var["f_lastName"]}, {$var["f_firstName"]}</option>";
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
				$xid =  $_POST["ia"];
				$find = "SELECT * FROM faculty WHERE f_Id = '{$_POST["ia"]}'";
				$r = mysqli_fetch_assoc(mysqli_query($link,$find));
		?>
			<div class = "div-form">
				<form method = "post" autocomplete = "off" action = "remove-employees.php" >
					<div class = "top-form">
						<?php	
							echo "<p class = 'form-header'>";
							echo "{$r['f_firstName'][0]}. {$r['f_lastName']}'s Profile";
							echo "</p>";
							$_SESSION["edit-id"] = $r['f_id'];
						?>
					</div>
					<div class = "mid-form">
						<p class = "form-body">ID
						<input type = "text" name = "pid" disabled class = "input-form" maxlength = 11  value = <?php echo $r['f_id']?> ></p>
						<p class = "form-body">First Name 
						<input type = "text" name = "fn" data-validation = "required alphanumeric" data-validation-allowing=" " class = "input-form" maxlength = 32  value = <?php echo $r['f_firstName']?> ></p>
						<p class = "form-body">Middle Initial
						<input type = "text" name = "mi" data-validation = "required alphanumeric" class = "input-form" maxlength = 8 value = <?php echo $r['f_midInitial']?> ></p>
						<p class = "form-body">Last Name
						<input type = "text" name = "ln" data-validation = "required alphanumeric" class = "input-form" maxlength = 32 value = <?php echo $r['f_lastName']?> ></p>
						<p class = "form-body" data-validation = "required">Gender
							<select name = "sx" class = "input-form">
								<option value = "Female" <?php if($r['f_sex'] == 'Female') echo "selected = 'selected'"?> >Female</option>
								<option value = "Male" <?php if($r['f_sex'] == 'Male') echo "selected = 'selected'"?> >Male</option>
							</select>
						</p>
						<p class = "form-body">Religion
						<input type = "text" name = "re" data-validation = "required alphanumeric" data-validation-allowing=" " class = "input-form" maxlength = 32 value = "<?php echo $r['f_religion']?>" ></p>
						<p class = "form-body">Mobile Number
						<input type = "text" name = "mn" data-validation = "required alphanumeric" data-validation-allowing="+()-" class = "input-form" maxlength = 32 value = <?php echo $r['f_mobileNo']?> ></p>
						<p class = "form-body">Email
						<input type = "text" name = "em" data-validation = "required email" class = "input-form" maxlength = 32 value = <?php echo $r['f_email']?> ></p>
						<p class = "form-body">Date of Birth
						<input type = "date" name = "dob" data-validation = "required date" class = "input-form" value = <?php echo $r['f_dateOfBirth']?> ></p>
						<p class = "form-body">Place of Birth
						<input type = "text" name = "pob" data-validation = "required alphanumeric" data-validation-allowing=" #@()-." class = "input-form" maxlength = 64 value = <?php echo $r['f_placeOfBirth']?> ></p>
						<p class = "form-body">Civil Status
							<select name = "cs" class = "input-form" data-validation = "required">
								<option value = "Single" <?php if($r['f_civilStatus'] == 'Single') echo "selected = 'selected'"?> >Single</option>
								<option value = "Married" <?php if($r['f_civilStatus'] == 'Married') echo "selected = 'selected'"?> >Married</option>
								<option value = "Divorced" <?php if($r['f_civilStatus'] == 'Divorced') echo "selected = 'selected'"?> >Divorced</option>
								<option value = "Widowed"<?php if($r['f_civilStatus'] == 'Widowed') echo "selected = 'selected'"?> >Widowed</option>
							</select>
						</p>
						<p class = "form-body">Languages Spoken
						<input type = "text" name = "ls" data-validation = "required alphanumeric" data-validation-allowing=", " class = "input-form" maxlength = 32 value = "<?php echo $r['f_langSpoken']?>" ></p>
						<p class = "form-body">Date Hired
						<input type = "date" name = "doh" data-validation="required date" class = "input-form" value = <?php echo $r['f_dateHired']?> ></p>
						<p class = "form-body">Position
						<input type = "text" name = "pos" data-validation = "required alphanumeric" data-validation-allowing=". " class = "input-form" maxlength = 16 value = <?php echo $r['f_position']?> ></p>
						<p class = "form-body">Salary
						<input type = "text" name = "sal" data-validation = "required numbers" data-validation-allowing="float" class = "input-form" maxlength = 16 value = <?php echo $r['f_salary']?> ></p>
						
						<p class = "form-body">Department
							<select name = "dept" class = "input-form" data-validation = "required">
								<option value = "Production" <?php if($r['f_department'] == 'Production') echo "selected = 'selected'"?> >Production</option>
								<option value = "Sales & Finances" <?php if($r['f_department'] == 'Sales & Finances') echo "selected = 'selected'"?> >Sales & Finances</option>
								<option value = "Human Resources" <?php if($r['f_department'] == 'Human Resources') echo "selected = 'selected'"?> >Human Resources</option>
								<option value = "Delivery & Transportation" <?php if($r['f_department'] == 'Delivery & Transportation') echo "selected = 'selected'"?> >Delivery & Transportation</option>
								<option value = "Inventory" <?php if($r['f_department'] == 'Inventory') echo "selected = 'selected'"?> >Inventory</option>
							</select>
						</p>
						
						<p class = "form-body">Complete Address
						<textarea name = "add" data-validation = "required alphanumeric" data-validation-allowing="#@()-. " class = "input-form" maxlength = 128 ><?php echo $r['f_address']?></textarea></p>
						
					</div>
						<div class = "line-sep">
						</div>
						<div class = "warn-form"><p>EMPLOYEE'S CURRENT STATUS</p>
							<div class = "warn-main">
								<select name = "state" class = "warn-input">
									<option id = 'y' value = "Okay" <?php if($r['f_status'] == 'Okay') echo "selected = 'selected'"?> >Okay</option>
									<option id = 'n' value = "Terminated" <?php if($r['f_status'] == 'Terminated') echo "selected = 'selected'"?> >Terminated</option>
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