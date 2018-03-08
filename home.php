<!DOCTYPE html>
<?php
	session_start();
	$fl = $_SESSION["first_name"][0];
	$ln = $_SESSION["last_name"];
	
	require 'sql_connect.php';
	require 'php/queries.php';
?>
<html>
	<head>
		<title>DFPPI Home</title>
		
		<link rel = "icon" href = "images/logo.png">
		<link rel = "stylesheet" href = "css/bootstrap.min.css" crossorigin = "anonymous">
		<link rel = "stylesheet" href = "css/design.css">
		
		<script src="js/jquery.js"></script>
		<script src="js/highcharts.js"></script>
		<script src="js/highcharts-3d.js"></script>
		<script src="js/exporting.js"></script>
		
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
					<li><a id = "li-a" href = "home-profile.php"><?php echo $fl,$ln ?></a></li>;
					<li><a id = "li-a" href = "index.php"><b>Sign Out</b></a></li>
				</ul>
			</div>
		</nav>
		<p class="main-text">Reports and Information<p>
		<div class="main-content" id="today"></div>
		<div class="main-content" id="today"></div>
	</body>
</html>
<script>
	//$home_t1
	$(function () {
		Highcharts.chart('today', {
			chart: {
				type: 'pie',
				options3d: {
					enabled: true,
					alpha: 45,
					beta: 0
				}
			},
			title: {
				text: 'Amount invested per product type'
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					depth: 35,
					dataLabels: {
						enabled: true,
						format: '{point.name}'
					}
				}
			},
			series: [{
				type: 'pie',
				name: 'Percentage: ',
				data: [
					<?php
						$result = mysqli_query($conn,$home_t1);
						
						while($key = mysqli_fetch_assoc($result)){
							echo "['{$key['p_type']}',{$key['x']}],";
						}
					?>
				]
			}]
		});
	});
</script>
