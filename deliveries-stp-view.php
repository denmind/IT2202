<!DOCTYPE html>
<?php 
	session_start(); 
	
	require 'sql_connect.php';
    if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] != true){
        $_SESSION['isLogin'] = false;
        header("Location:index.php");
        exit();
    }
	$view = "SELECT *
    FROM storage_delivery_products sdp
    JOIN delivery d 
    ON d.d_Id = sdp.d_Id
    JOIN storage s
    ON s.s_Id = sdp.s_Id
    ORDER BY d.d_Id DESC";
		
	$result= mysqli_query($conn,$view);
?>
<html>
	<head>
		<title>DFPPI | Delivery Orders Products</title>
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
						<th>Quantity</th>
						<th>Moved date</th>
						<th>Status</th>
						<th>Storage</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($key = mysqli_fetch_assoc($result)){
                            $s = $key['s_isleLoc']." - ".$key['s_rowLoc']." - ".$key['s_colLoc'];
							echo "<tr>";
							echo "<td>{$key['sdp_Id']}</td>";
							echo "<td>{$key['sdp_quantity']}</td>";
							echo "<td>{$key['sdp_dateTime']}</td>";
                            echo "<td>{$key['d_status']}</td>";
                            echo "<td>{$s}</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
        </div>
	</body>
</html>
<script src="js/jquery.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script src="js/ourTable.js"></script>
