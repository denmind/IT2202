<!DOCTYPE html>
<?php
	session_start();
	require 'sql_connect.php';
	
	if($conn && $_SESSION["FLAG_VALUE"] == 1){
		$find = "SELECT *,(YEAR(NOW())-YEAR(f_dateOfBirth)) AS Age FROM faculty WHERE f_id = '{$_SESSION['MAIN-USER-ID']}'";
		
		$res = mysqli_fetch_assoc(mysqli_query($conn,$find));
	}
?>
<html>
	<head>
		<title>DFPPI Profile</title>
		<link rel = "icon" href = "images/logo.png">
		<link rel = "stylesheet" href = "css/bootstrap.min.css" crossorigin = "anonymous">
		<link rel = "stylesheet" href = "css/design.css">
		<script src = "js/jquery.min.js"></script>
		<script src = "js/bootstrap.min.js"></script>
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
					<li><a id = "li-a" href = "docs/manual.html"><i>Help?</i></a></li>
				</ul>
			</div>
		</nav>
		<?php
			
			$x = $_SESSION["FLAG_VALUE"];
			
			if($x != 0){
		?>
				
		<div  id="myTable">
		<div class="page-header">
		 <?php
			  $curr = $res["f_status"];
			  
			  /*Show name*/
				  
			  /*Display employee status and account id*/
			  echo "</h1>";
			  echo "<h1>";
				  echo "ID: {$_SESSION['sess']}";
				  echo "<h3>{$res['f_department']}</h3>";
				  echo ($curr == 'Okay') ? "<h3 id='green'>{$res['f_status']}</h3>" : "<h3 id='red'>{$res['f_status']}</h3>" ;
			  echo "</h1>";
			  
			  /*IN CASE //
			  echo "<pre>";
			  var_dump($res);
			  echo "</pre>";
			  */
		  ?>
		</div>
		  <!--display table for profile-->
		  <table class="table" id="ourTable">
			<thead>
			  <tr>
				<th>Firstname</th>
				<th>Middle Initial</th>
				<th>Last Name</th>
				<th>Age</th>
				<th>Gender</th>
			  </tr>
			</thead>
			<tbody>
			  <tr class="warning">
			  <?php
				echo "<td>{$res['f_firstName']}</td>";
				echo "<td>{$res['f_midInitial']}</td>";
				echo "<td>{$res['f_lastName']}</td>";
				echo "<td>{$res['Age']}</td>";
				echo "<td>{$res['f_sex']}</td>";
			  ?>
			  </tr>
			</tbody>
		  </table>
		  
		   <table class="table" id="ourTable">
			<thead>
			  <tr>
				<th>Religion</th>
				<th>Mobile Number</th>
				<th>Email</th>
				<th>Civil Status</th> 
			  </tr>
			</thead>
			<tbody>
			  <tr class="info">
			  <?php
				echo "<td>{$res['f_religion']}</td>";
				echo "<td>{$res['f_mobileNo']}</td>";
				echo "<td>{$res['f_email']}</td>";
				echo "<td>{$res['f_civilStatus']}</td>";
			  ?>
			  </tr>
			</tbody>
		  </table>
		  
		  <table class="table" id="ourTable">
			<thead>
			  <tr>
				<th>Place of Birth</th>
				<th>Date of Birth</th>
				<th>Languages Spoken</th> 
			  </tr>
			</thead>
			<tbody>
			  <tr class="warning">
			  <?php
				echo "<td>{$res['f_placeOfBirth']}</td>";
				echo "<td>{$res['f_dateOfBirth']}</td>";
				echo "<td>{$res['f_langSpoken']}</td>";
			  ?>
			  </tr>
			</tbody>
		  </table>
		  
		  <table class="table" id="ourTable">
			<thead>
			  <tr>
				<th>Position</th>
				<th>Salary</th>
				<th>Date Hired</th>
			  </tr>
			</thead>
			<tbody>
			  <tr class="warning">
			  <?php
				echo "<td>{$res['f_position']}</td>";
				echo "<td>{$res['f_salary']}</td>";
				
				echo "<td>{$res['f_dateHired']}</td>";
			  ?>
			  </tr>
			</tbody>
		  </table>
		</div>
		<?php
			}else{
				echo "<img src='images/NOT.gif' style='width:50%'>";
			}
		?>
	</body>
</html>