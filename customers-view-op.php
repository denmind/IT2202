<!DOCTYPE html>
<?php 
	session_start(); 
	
	require 'sql_connect.php';
	
	$cq = "SELECT op_Id,op_quantity,o.o_orderDateTime,c.c_FirstName,c.c_LastName,p.p_name,ROUND((p.p_price * op_quantity),2) AS SubCost
			FROM order_products op 
			JOIN orders o
			ON o.o_Id = op.o_Id
			JOIN client c 
			ON o.c_Id = c.c_Id
			JOIN products p 
			ON p.p_Id = op.p_Id
			ORDER BY o.o_orderDateTime DESC";
		
	$cr = mysqli_query($conn,$cq);
?>
<html>
	<head>
		<title>DFPPI Add Order Products</title>
		<link rel = "icon" href = "images/logo.png">
		<link rel="stylesheet" href="css/jquery.dataTables.css">
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
		<div class = "div-form" id="viewTableOnly">
			<table id="table" class="display">
				<thead>
					<tr>
						<th>#</th>
						<th>Date Ordered</th>
						<th>Customer First Name</th>
						<th>Customer Last Name</th>
						<th>Product</th>
						<th>Quantity Ordered</th>
						<th>SubCost</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($key = mysqli_fetch_assoc($cr)){
							echo "<tr>";
							echo "<td>{$key['op_Id']}</td>";
							echo "<td>{$key['o_orderDateTime']}</td>";
							echo "<td>{$key['c_FirstName']}</td>";
							echo "<td>{$key['c_LastName']}</td>";
							echo "<td>{$key['p_name']}</td>";
							echo "<td>{$key['op_quantity']}</td>";
							echo "<td>{$key['SubCost']}</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
	</body>
</html>
<script src="js/jquery.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script src="js/ourTable.js"></script>
