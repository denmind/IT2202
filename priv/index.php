<?php
	require '../sql_connect.php';

	session_start();

    if(!isset($_SESSION['isPriv']) || $_SESSION['isPriv'] != true){
        $_SESSION['isPriv'] = false;
        header("Location:../index.php");
        exit();
    }
	
	$sql = "SELECT * FROM users";
	
	$result = mysqli_query($link,$sql);
?>
<html>
	<head>
		<title>Account | Main</title>
		<link rel="stylesheet" href="../css/jquery.dataTables.css">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/min.css">
	</head>
	<body>
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
			  <li><a href="../index.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
			</ul>
		  </div>
		</nav> 
		<table id="table" class="display">
			<thead>
				<tr>
					<th>#</th>
					<th>Status</th>
					<th>User ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>D.O.R</th>
				</tr>
			</thead>
			<tbody>
				<?php
					while($x = mysqli_fetch_array($result)){
						echo "<tr>";
						echo "<td>{$x[0]}</td>";
						echo "<td>{$x[1]}</td>";
						echo "<td>{$x[2]}</td>";
						echo "<td>{$x[4]}</td>";
						echo "<td>{$x[5]}</td>";
						echo "<td>{$x[6]}</td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</body>
</html>
<script src="../js/jquery.js"></script>
<script src="../js/jquery.dataTables.js"></script>
<script src="../js/ourTable.js"></script>