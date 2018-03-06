<!DOCTYPE html>
<?php
	session_start();
	include("sql_connect.php");

	//DB connect
	if($conn == false){
		echo "Fail to connet Database";
		exit();
	}

	//Initialize query elements
    $choice = isset($_GET['choice'])? $_GET['choice'] : 1;
    $srch = isset($_GET['srch'])? $_GET['srch'] : 1;

	//Initialize Page elements
	$numberOfRows = 10;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$limit = ($page - 1) * $numberOfRows;
	
	//Initialize Order
	$col = isset($_GET['order']) ? $_GET['order'] : "f_id";
	$dir = isset($_GET['direction']) ? $_GET['direction'] : "ASC";
	
	
	//Main query
	$query = "SELECT * FROM faculty WHERE {$choice} = '{$srch}' ORDER BY {$col} {$dir} LIMIT {$limit}, {$numberOfRows}";
	$result = mysqli_query($conn, $query);
	
	//Query Check
	if(!$result){
		echo "Wrong Query has accepted.<br>";
		echo mysqli_error($conn);
		exit();
	}
	
	//Get number of pages
	$query2 = "SELECT COUNT(*) as rowCount FROM faculty WHERE {$choice} = '{$srch}';";
	$result2 = mysqli_query($conn, $query2);
	$totalRows = mysqli_fetch_row($result2);
	$numberOfPages = ceil($totalRows[0] / $numberOfRows);
?>
<html>
	<head>
		<title>DFPPI View Employees</title>
		<link rel = "icon" href = "images/logo.png">
		<link rel = "stylesheet" href = "css/bootstrap.min.css" crossorigin = "anonymous">
		<link rel = "stylesheet" href = "css/design.css">
		<script src = "js/bootstrap.min.js"></script>
		<script src = "js/jquery.min.js"></script>
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
		<div class = "main-view">
			<div class = "top-div">
				<form action = "employees-view.php" method = "get" onsubmit = "return check();" autocomplete="off">
					<p class = "form-body">Search by : 
					<select id = "choice" name = "choice">
                    <option value="f_id">Employee Id</option>
					<option value="f_firstName">First name</option>
					<option value="f_lastName">Last name</option>
					<option value="f_dateHired">Status</option>
                    <option value="YEAR(f_dateOfBirth)">Year Born</option>
                    <option value="f_position">Position</option>
                    <option value="f_salary">Salary</option>
                    <option value="f_department">Department</option>
					</select>
					<input type = "text" id = "srch" name = "srch" class = "input-srch" maxlength = 128 autofocus placeholder = "Francis" required>
					</p>

					<input id = "submit" type = "submit" value = "Search">
				</form>
			</div>
			<div class = "bot-div">
				<?php
					//Create Table
					echo "<table class= 'table-set'  >";
					
					//Table head & Toggle direction
					$ndir = ($col == "f_id" && $dir == "ASC") ? "DESC" : "ASC";
					echo "<th><a href='employees-view.php?choice={$choice}&srch={$srch}&direction={$ndir}&order=f_id&page={$page}'>Employee Id</a></th>"; 
					
					$ndir = ($col == "f_firstName" && $dir == "ASC") ? "DESC" : "ASC";
					echo "<th><a href='employees-view.php?choice={$choice}&srch={$srch}&direction={$ndir}&order=f_firstName&page={$page}'>First Name</a></th>"; 
					
					echo "<th>Middle Initial</th>";
					
					$ndir = ($col == "f_lastName" && $dir == "ASC") ? "DESC" : "ASC";
					echo "<th><a href='employees-view.php?choice={$choice}&srch={$srch}&direction={$ndir}&order=f_lastName&page={$page}'>Last Name</a></th>"; 
					
					$ndir = ($col == "f_dateHired" && $dir == "ASC") ? "DESC" : "ASC";
					echo "<th><a href='employees-view.php?choice={$choice}&srch={$srch}&direction={$ndir}&order=f_dateHired&page={$page}'>Date Hired</a></th>";

					echo "<th>Gender</th>";
					
					echo "<th>Religion</th>";
					
					echo "<th>Address</th>";
					
					echo "<th>Mobile No.</th>";
					
					echo "<th>E-mail</th>";
					
					$ndir = ($col == "f_dateOfBirth" && $dir == "ASC") ? "DESC" : "ASC";
					echo "<th><a href='employees-view.php?choice={$choice}&srch={$srch}&direction={$ndir}&order=f_dateOfBirth&page={$page}'>Date of Birth</a></th>";
					
					echo "<th>Place Born</th>";
					
					echo "<th>Civil Status</th>";
					
					echo "<th>Language Spoken</th>";
					
					echo "<th>Position</th>";
					
					$ndir = ($col == "f_salary" && $dir == "ASC") ? "DESC" : "ASC";
					echo "<th><a href='employees-view.php?choice={$choice}&srch={$srch}&direction={$ndir}&order=f_salary&page={$page}'>Salary</a></th>";
					
					echo "<th>Department</th>";

					//Create Table content
					while($row = mysqli_fetch_assoc($result)){
						echo "<tr>";
						echo "<td>{$row["f_id"]}</td>";
						echo "<td>{$row["f_firstName"]}</td>";
						echo "<td>{$row["f_midInitial"]}</td>";
						echo "<td>{$row["f_lastName"]}</td>";
						echo "<td>{$row["f_dateHired"]}</td>";
						echo "<td>{$row["f_sex"]}</td>";
						echo "<td>{$row["f_religion"]}</td>";
						echo "<td>{$row["f_address"]}</td>";
						echo "<td>{$row["f_mobileNo"]}</td>";
						echo "<td>{$row["f_email"]}</td>";
						echo "<td>{$row["f_dateOfBirth"]}</td>";
						echo "<td>{$row["f_placeOfBirth"]}</td>";
						echo "<td>{$row["f_civilStatus"]}</td>";
						echo "<td>{$row["f_langSpoken"]}</td>";
						echo "<td>{$row["f_position"]}</td>";
						echo "<td>{$row["f_salary"]}</td>";
						echo "<td>{$row["f_department"]}</td>";
						echo "</tr>";
					}

					echo "</table>";
				?>
				<div class = 'pagination'>
					<ul>
					<?php 
						//Create Pagination
						for($i = 1; $i <= $numberOfPages; $i++){
							echo "<li><a href='employees-view.php?choice={$choice}&srch={$srch}&direction={$dir}&order={$col}&page={$i}'>{$i}</a></li>"; 
						}
					?>
					</ul>
				</div>
			</div>
		</div>
	</body>
</html>
<script>
function check(){
    var choice = $('#choice').val();    
    var srch = $('#srch').val();
    
    if(choice == "f_salary" || choice == "YEAR(f_dateOfBirth)" || choice == "f_id"){
        if(!$.isNumeric(srch)) {
            alert('Please input correctly.');
            return false;
        }
    }
    
    return true;
}
</script>
