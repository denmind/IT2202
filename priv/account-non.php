<?php

	/*connect to main_database*/
	$dfp = mysqli_connect("localhost","root","","dfppi");
	$main = mysqli_connect("localhost","root","","2101_final_project");
	
	if($dfp && $main){
		$f_q = "SELECT f_firstName,f_lastName,f_department FROM faculty ORDER BY f_lastName";
		$u_q = "SELECT fn,ln FROM users ORDER BY ln";
		
		$f_res = mysqli_query($main,$f_q);
		$u_res = mysqli_query($dfp,$u_q);
	
?>
	<!--Checks first if the name "Firstname" and "Lastname" already exists in "users.sql"-->
			<html>
				<head>
					<title>Account | Sans</title>
					<link rel="stylesheet" href="../css/jquery.dataTables.css">
					<link rel="stylesheet" href="../css/bootstrap.min.css">
					<link rel="stylesheet" href="../css/min.css">
				</head>
				<body>
					<!--Sidebar nav-->
					<nav class="navbar navbar-inverse">
					  <div class="container-fluid">
						<div class="navbar-header">
							<div class="navbar-brand"><a href="index.php">Accounts</a></div>
						</div>
						<ul class="nav navbar-nav">
						  <li><a href="account-add.php">Add</a></li>
						  <li><a href="account-en.php">Enable/Disable</a></li>
						  <li><a href="account-non.php">No accounts</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
						  <li><a href="../"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
						</ul>
					  </div>
					</nav> 
				</body>
				<body>
<?php		/*DIsplay results*/
				echo "<table id='table' class='regular' style='width:50%'>";
					echo "<thead>";
						echo "<tr>";
							echo "<th>First Name</th>";
							echo "<th>Last Name</th>";
							echo "<th>Department</th>";
						echo "</tr>";
					echo "</thead>";
					echo "<tbody>";
				
				/*init right side results ($users table)*/
				$u_var = mysqli_fetch_assoc($u_res);
				
				
				/*Traverse all faculty names from faculty table*/
				while($f_var = mysqli_fetch_assoc($f_res)){
					/*if it matches move to next index*/
					if($f_var["f_firstName"] == $u_var["fn"] && $f_var["f_lastName"] == $u_var["ln"]){
						$u_var = mysqli_fetch_assoc($u_res);
					/*else display result and +1 to results or adds to users*/
					}else{
						echo "<tr>";
						echo "<td>{$f_var["f_firstName"]}</td>"; 
						echo "<td>{$f_var["f_lastName"]}</td>";
						echo "<td>{$f_var["f_department"]}</td>";
						echo "</tr>";
					}
				}
					echo "</tbody>";
				echo "</table>";
			echo "</body>";
		echo"</html>";
	}else{
		echo "<p>(NOT)Database connection lost.";
	}
?>
<script src="../js/jquery.js"></script>
<script src="../js/jquery.dataTables.js"></script>
<script src="../js/ourTable.js"></script>