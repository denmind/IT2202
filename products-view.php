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
    FROM products p
    WHERE p.status = 'In-use'
    ORDER BY p.p_Id";

    $result = mysqli_query($conn, $view);
?>
<html>
	<head>
		<title>DFPPI Employees</title>
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
						<th>Product Name</th>
						<th>Description</th>
						<th>Type</th>
                        <th>Weight</th>
                        <th>Price</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($key = mysqli_fetch_assoc($result)){
							echo "<tr>";
							echo "<td>{$key['p_Id']}</td>";
							echo "<td>{$key['p_name']}</td>";
							echo "<td>{$key['p_descp']}</td>";
							echo "<td>{$key['p_type']}</td>";
                            echo "<td>{$key['p_weight']}</td>";
                            echo "<td>{$key['p_price']}</td>";
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
