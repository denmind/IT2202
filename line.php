<?php
	$link = mysqli_connect("localhost","root","","classicmodels");
	
	$query = "SELECT COUNT(*) Quantity, MONTH(orderDate) Month
FROM orders
WHERE YEAR(orderDate) = 2003
GROUP BY Month
ORDER BY Quantity";
	$three = "SELECT COUNT(*) Quantity, MONTH(orderDate) Month
FROM orders
WHERE YEAR(orderDate) = 2004
GROUP BY Month
ORDER BY Quantity DESC";
	
	$result = mysqli_query($link,$query);
	$tresult = mysqli_query($link,$three);
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
			title: {
				text: 'Order Dates for Years 2003 and 2004',
			},
			subtitle:
			{
				text: 'Year-Month-Date'
			},
			xAxis: {
					categories: 
					[
						'January','February','March',
						'April','May','June','July',
						'August','September','October',
						'November','December'
					]
			},
			yAxis: 
			{
				title: {
					text: 'Year-Month-Date'
				},
				plotLines: [{
					value: 0,
					width: 1,
					color: '#808080'
				}]
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'middle',
				borderWidth: 0
			},
			series: 
			[	
				{
					name: 'Orders from year 2003',
					data: 
					[
						<?php
							while($out = mysqli_fetch_assoc($result)){
								echo $out['Quantity'].",";
							}
						?>
					]
				},
				{
					name: 'Orders from year 2004',
					data: 
					[
						<?php
							while($x = mysqli_fetch_assoc($tresult)){
								echo $x['Quantity'].",";
							}
						?>
					]
				}
			]
		}
	);
	
</script>