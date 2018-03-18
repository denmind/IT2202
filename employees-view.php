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
    FROM faculty f
    WHERE f.f_status = 'Okay'
    ORDER BY f.f_id";

    $result = mysqli_query($conn, $view);
?>
<html>
	<head>
		<title>DFPPI View Employees</title>
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
		<div id="viewTableOnly">
			<table id="table" class="display">
				<thead>
					<tr>
						<th>#</th>
						<th>First Name</th>
                        <th>Middle Initial</th>
						<th>Last Name</th>
						<th>Date Hired</th>
                        <th>Gender</th>
                        <th>Religion</th>
                        <th>Address</th>
                        <th>Contact No.</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Place Born</th>
                        <th>Civil Status</th>
                        <th>Language</th>
                        <th>Position</th>
                        <th>Salary</th>
                        <th>Department</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($key = mysqli_fetch_assoc($result)){
							echo "<tr>";
							echo "<td>{$key['f_id']}</td>";
							echo "<td>{$key['f_firstName']}</td>";
                            echo "<td>{$key['f_midInitial']}</td>";
							echo "<td>{$key['f_lastName']}</td>";
							echo "<td>{$key['f_dateHired']}</td>";
                            echo "<td>{$key['f_sex']}</td>";
                            echo "<td>{$key['f_religion']}</td>";
                            echo "<td>{$key['f_address']}</td>";
                            echo "<td>{$key['f_mobileNo']}</td>";
                            echo "<td>{$key['f_email']}</td>";
                            echo "<td>{$key['f_dateOfBirth']}</td>";
                            echo "<td>{$key['f_placeOfBirth']}</td>";
                            echo "<td>{$key['f_civilStatus']}</td>";
                            echo "<td>{$key['f_langSpoken']}</td>";
                            echo "<td>{$key['f_position']}</td>";
                            echo "<td>{$key['f_salary']}</td>";
                            echo "<td>{$key['f_department']}</td>";
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