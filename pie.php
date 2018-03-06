<?php
	$link = mysqli_connect("localhost","root","","classicmodels");
	$query = "
			SELECT  offices.city AS city,COUNT(*) pop 
			FROM employees
			JOIN offices
			ON offices.officeCode = employees.officeCode
			GROUP BY offices.city
			ORDER BY pop DESC";
	
	$res = mysqli_query($link,$query);
?>
<html>
<head>
</head>
<body>
	<div id = "example">
	</div>
</body>
</html>

<script src = "js/jquery.min.js"></script>
<script src = "js/highcharts.js"></script>
<script>
	/*id of div,*values to process*/
	Highcharts.chart("example",
			{
			chart: {
				type: 'pie',
				options3d: {
					enabled: true,
					alpha: 45
				}
			},
			title: {
				text: 'Percentage of Employees per Office'
			},
			subtitle: {
				text: 'Employees per Office/City'
			},
			plotOptions: {
				pie: {
					innerSize: 100,
					depth: 45
				}
			},
			series: [{
				name: 'Delivered amount',
				data: [
					<?php
						while($out = mysqli_fetch_assoc($res)){
							echo "['".$out['city']."',".$out['pop']."],";
						}
					?>
					
				]
			}]
		}
	);
	
</script>