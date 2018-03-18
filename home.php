<!DOCTYPE html>
<?php
	session_start();
	$fl = $_SESSION["first_name"][0];
	$ln = $_SESSION["last_name"];
	
	require 'sql_connect.php';
	require 'php/queries.php';
	
    if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] != true){
        $_SESSION['isLogin'] = false;
        header("Location:index.php");
        exit();
    }
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
					<li><a id = "li-a" href = "home-profile.php">Profile</a></li>
					<li><a id = "li-a" href = "index.php?logout=true"><b>Sign Out</b></a></li>
				</ul>
			</div>
		</nav>
		<p class="main-text">Reports and Information<p>
		<div id="all-time">
			<div class="main-content" id="one"></div>
			<div class="main-content" id="two"></div>
			<div class="main-content" id="thr"></div>
			<div class="main-content" id="fou"></div>
		</div>
	</body>
</html>
<script>
	//$home_t1
	 Highcharts.setOptions({
		 colors: ['#e0c288',
				  '#bca271',
				  '#aa9261',
				  '#87744d',
				  '#6d5e3f',
				  '#4f442d',
				  '#6b5831',
				  '#755f31']
	});
		
	var chart;
	
	$(function () {
		chart = Highcharts.chart('one', {
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
				subtitle: {
					text: 'Percentages shown only'
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
		
	//$emp_num
	$(function () {
		Highcharts.chart('two', {
			chart: {
				type: 'column'
			},
			title: {
				text: 'Number of Employees per Department'
			},
			subtitle: {
				text: 'All-time record of all personnel hired and assigned'
			},
			xAxis: {
				categories: [
					<?php
						$result = mysqli_query($conn,$emp_num);
						
						while($key = mysqli_fetch_assoc($result)){
							echo "'{$key["f_department"]}',";
						}
					?>
				],
				crosshair: true
			},
			yAxis: {
				min: 0,
				title: {
					text: 'n'
				}
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
			series: [
				{
					name: 'Population',
					color: '#a08d65',
					data: [
						<?php
							$result = mysqli_query($conn,$emp_num);
							
							while($key = mysqli_fetch_assoc($result)){
								echo "{$key["x"]},";
							}
						?>
						]
				}
			]
		});
	});
	
	//$emp_num
	$(function () {
		Highcharts.chart('thr', {
			chart: {
				type: 'column'
			},
			title: {
				text: 'Top 7 Most Ordered Products'
			},
			subtitle: {
				text: 'Total amount ordered overall'
			},
			xAxis: {
				categories: [
					<?php
						$result = mysqli_query($conn,$op_six);
					
						while($key = mysqli_fetch_assoc($result)){
							echo "'{$key["p_name"]}',";
						}
						
						$result = mysqli_query($conn,$op_six);
					?>
				],
				crosshair: true
			},
			yAxis: {
				min: 0,
				title: {
					text: 'n'
				}
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
			series: [
				{
					name: 'Times Ordered',
					color: '#a08d65',
					data: [
							<?php
								while($key = mysqli_fetch_assoc($result)){
									echo "{$key["x"]},";
								}
							?>
						]
				}
			]
		});
	});
	
	//$emp_num
	$(function () {
		Highcharts.chart('fou', {
			chart: {
				type: 'column'
			},
			title: {
				text: 'Top 7 Most Productive Employees'
			},
			subtitle: {
				text: 'In the "Sales & Finances" Department'
			},
			xAxis: {
				categories: [
					<?php
						$result = mysqli_query($conn,$emp_ord);
					
						while($key = mysqli_fetch_assoc($result)){
							echo "'{$key["f_firstName"]} {$key["f_lastName"]}',";
						}
						
						$result = mysqli_query($conn,$emp_ord);
					?>
				],
				crosshair: true
			},
			yAxis: {
				min: 0,
				title: {
					text: 'n'
				}
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
			series: [
				{
					name: 'Sales Count',
					color: '#a08d65',
					data: [
							<?php
								while($key = mysqli_fetch_assoc($result)){
									echo "{$key["x"]},";
								}
							?>
						]
				}
			]
		});
	});
</script>
