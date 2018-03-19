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
    FROM storage s
    ORDER BY s.s_Id DESC";

    $result = mysqli_query($conn, $view);
?>
<html>
	<head>
		<title>DFPPI Inventory</title>
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
						<th>Isle Location</th>
						<th>Row Location</th>
						<th>Col Location</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($key = mysqli_fetch_assoc($result)){
							echo "<tr>";
							echo "<td>{$key['s_Id']}</td>";
							echo "<td>{$key['s_isleLoc']}</td>";
							echo "<td>{$key['s_rowLoc']}</td>";
							echo "<td>{$key['s_colLoc']}</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
        </div>
	</body>
</html>
<script src="js/jquery.js"></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src="js/jquery.dataTables.js"></script>
<script src="js/ourTable.js"></script>
<script>
//javascript here
    //for faculty
$('.btn-primary').on('click', function(){
	var fn = $(this).data('faculty');
	$.ajax({
		url : 'ViewProcess/getFaculty.php',
		method : 'POST',
		data : {faculty : fn},
		dataType : 'json',
		success: function(result){
			var row = "";
			var title = "Faculty Info";
			var head = "<th>#</th><th>Full Name</th><th>Gender</th><th>Contact No.</th><th>Email</th><th>Language</th><th>Position</th>";

			$('#modalBody').empty();
			$('#modalHead').empty();
			$('#message').empty();
            $('#title').empty();

			if(result.length == 0){
				var message = "This faculty doesn't exist!";
				$('#message').append(message);
			}else{
				$("#modalHead").append(head);
                for(var x=0; x < result.length; x++){
                    
                    var full = result[x].f_firstName;
                    var name = full.concat(" ", result[x].f_midInitial, ". ", result[x].f_lastName);
                    
                    row = "<tr>";
                    row += "<td>"+result[x].f_id+"</td>";
                    row += "<td>"+name+"</td>";
                    row += "<td>"+result[x].f_sex+"</td>";
                    row += "<td>"+result[x].f_mobileNo+"</td>";
                    row += "<td>"+result[x].f_email+"</td>";
                    row += "<td>"+result[x].f_langSpoken+"</td>";
                    row += "<td>"+result[x].f_position+"</td>";
                    row += "</tr>";
                    $('#modalBody').append(row);
                }
			}
            $('#title').append(title);
			$('#modal').modal('show');
		}
	});
});
    
    //for client
$('.btn-danger').on('click', function(){
	var cn = $(this).data('client');
	$.ajax({
		url : 'ViewProcess/getClient.php',
		method : 'POST',
		data : {client : cn},
		dataType : 'json',
		success: function(result){
			var row = "";
			var title = "Client Info";
			var head = "<th>#</th><th>First Name</th><th>Last Name</th><th>Contact  No.</th>";

			$('#modalBody').empty();
			$('#modalHead').empty();
			$('#message').empty();
            $('#title').empty();

			if(result.length == 0){
				var message = "This client doesn't exist!";
				$('#message').append(message);
			}else{
				$("#modalHead").append(head);
				for(var x=0; x < result.length; x++){
					row = "<tr>";
					row += "<td>"+result[x].c_Id+"</td>";
                    row += "<td>"+result[x].c_FirstName+"</td>";
                    row += "<td>"+result[x].c_LastName+"</td>";
                    row += "<td>"+result[x].c_contactInfo+"</td>";
					row += "</tr>";
					$('#modalBody').append(row);
				}
			}
            $('#title').append(title);
			$('#modal').modal('show');
		}
	});
});
</script>