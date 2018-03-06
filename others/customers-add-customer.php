<!DOCTYPE html><?php session_start(); ?><html>
	<head>
		<title>DFPPI Add Customer</title>
		<link rel = "icon" href = "images/logo.png">
		<link rel = "stylesheet" href = "css/bootstrap.min.css" crossorigin = "anonymous">
		<link rel = "stylesheet" href = "css/design.css">
		<script src = "js/bootstrap.min.js"></script>
		<script src = "js/jquery.min.js"></script>
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
		<div class = "num-input">
			<p class = "ask-num">Number of records?</p>
			<form method = 'post' action = <?php echo $_SERVER['PHP_SELF'] ?> >
				<input type = "number" name = "rec-count" class = "num-input-form">
				<input type = "submit" value = "Go" class = "num-submit">
			</form>
		</div>
		<?php
			if(!empty($_POST)){
				$_SESSION['$re-count'] = $_POST['rec-count'];
				if ($_SESSION['$re-count'] > 0){
		?>
			<div class = "div-form">
				<form method = "post" autocomplete = "off" action = "add-customer.php" onsubmit = "return check();">
				<div class = "top-form">
						<p class = "form-header">Customer Information</p>
						<p class = "form-sub">First Name, Last Name, Contact Info</p>
				</div>
		<?php
				for($indx = 0 ; $indx != $_SESSION['$re-count'] ; $indx++){
					echo "<div class = 'mid-form'>";
					echo "<div class = 'ind'>";
					echo "{$indx}";
					echo "</div>";
		?>	
			
						<input type = "text" name = "fn[]" required = "required" class = "input-form" maxlength = 32 autofocus placeholder = "First Name">
						<input type = "text" name = "ln[]" required = "required" class = "input-form" maxlength = 32 placeholder = "Last Name">
						<input type = "text" name = "c_info[]" required = "required" class = "input-form" maxlength = 64 placeholder = "Contact Information">
				</div>
				
		<?php
				}
		?>
				<div class = "bot-form">
					<input type = "submit" value = "Submit Form" class = "input-submit">
				</div>
				</form>
			</div>
		<?php
				}
			}
		?>
			
	</body>
	<script src = "js/confirm-form.js"></script>
</html>

