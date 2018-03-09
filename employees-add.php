<!DOCTYPE html><?php session_start(); ?><html>
	<head>
		<title>DFPPI Add Employees</title>
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
		<div class = "div-form">
			
			<form method = "post" autocomplete = "off" action = "add-employee.php" onsubmit = "return check();">
				<div class = "top-form">
					<p class = "form-header">Employee's Information</p>
				</div>
				<div class = "mid-form">
					<p class = "form-body">First Name 
					<input type = "text" name = "fn" data-validation = "required alphanumeric" data-validation-allowing=" " class = "input-form" maxlength = 32 autofocus placeholder = "Francis"></p>
					<p class = "form-body">Middle Initial
					<input type = "text" name = "mi" data-validation = "required alphanumeric" class = "input-form" maxlength = 8 placeholder = "J"></p>
					<p class = "form-body">Last Name
					<input type = "text" name = "ln" data-validation = "required alphanumeric" class = "input-form" maxlength = 32 placeholder = "Caboyo"></p>
					<p class = "form-body">Gender
						<select name = "sx" class = "input-form">
							<option></option>
							<option value = "Female">Female</option>
							<option value = "Male">Male</option>
						</select>
					</p>
					<p class = "form-body">Religion
					<input type = "text" name = "re" data-validation = "required alphanumeric" data-validation-allowing=" " class = "input-form" maxlength = 16 placeholder = "Roman Catholic"></p>
					<p class = "form-body">Mobile Number
					<input type = "text" name = "mn" data-validation = "required alphanumeric" data-validation-allowing="+()-" class = "input-form" maxlength = 32 placeholder = "+6394216709"></p>
					<p class = "form-body">Email
					<input type = "text" name = "em" data-validation = "required email" class = "input-form" maxlength = 32 placeholder = "fcaboyo@gmail.com"></p>
					<p class = "form-body">Date of Birth
					<input type = "date" name = "dob" data-validation = "required date" class = "input-form"></p>
					<p class = "form-body">Place of Birth
					<input type = "text" name = "pob" data-validation = "required alphanumeric" data-validation-allowing=" #@()-." class = "input-form" maxlength = 32 placeholder = "General Santos City"></p>
					<p class = "form-body">Civil Status
						<select name = "cs" class = "input-form" data-validation = "required">
							<option></option>
							<option value = "Single">Single</option>
							<option value = "Married">Married</option>
							<option value = "Divorced">Divorced</option>
							<option value = "Widowed">Widowed</option>
						</select>
					</p>
					<p class = "form-body">Languages Spoken
					<input type = "text" name = "ls" data-validation = "required alphanumeric" data-validation-allowing=", " class = "input-form" maxlength = 32 placeholder = "Filipino, English"></p>
					<p class = "form-body">Position
					<input type = "text" name = "pos" data-validation = "required alphanumeric" data-validation-allowing=". " class = "input-form" maxlength = 32 placeholder = "Intern"></p>
					<p class = "form-body">Salary
					<input type = "text" name = "sal" data-validation = "required numbers" data-validation-allowing="float" class = "input-form" maxlength = 16 placeholder = "5000"></p>
					<p class = "form-body">Department
						<select name = "dept" class = "input-form" data-validation = "required">
							<option></option>
							<option value = "Production">Production</option>
							<option value = "Sales & Finances">Sales & Finances</option>
							<option value = "Human Resources">Human Resources</option>
							<option value = "Delivery & Transportation">Delivery & Transportation</option>
							<option value = "Inventory">Inventory</option>
						</select>
					</p>
					<p class = "form-body">Complete Address(<span id="maxlength">128</span> characters left)
					<textarea name = "add" id="area" data-validation = "required alphanumeric" data-validation-allowing="#@()-. " class = "input-form" maxlength = 128 placeholder = "Hidden Valley,Barangay Talamban, Cebu City, Cebu 6000"></textarea></p>
				</div>
				<div class = "bot-form">
					<input type = "submit" value = "Submit Form" class = "input-submit">
				</div>
			</form>
		</div>
	</body>
</html>
<script src = "js/confirm-form.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery.form-validator.js"></script>
<script src="js/validate.js"></script>