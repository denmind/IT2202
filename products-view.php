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
	$col = isset($_GET['order']) ? $_GET['order'] : "p_Id";
	$dir = isset($_GET['direction']) ? $_GET['direction'] : "ASC";
	
	
	//Main query
	$query = "SELECT * FROM products WHERE {$choice} = '{$srch}' ORDER BY {$col} {$dir} LIMIT {$limit}, {$numberOfRows}";
	$result = mysqli_query($conn, $query);
	
	//Query Check
	if(!$result){
		echo "Wrong Query has accepted.<br>";
		echo mysqli_error($conn);
		exit();
	}
	
	//Get number of pages
	$query2 = "SELECT COUNT(*) as rowCount FROM products WHERE {$choice} = '{$srch}';";
	$result2 = mysqli_query($conn, $query2);
	$totalRows = mysqli_fetch_row($result2);
	$numberOfPages = ceil($totalRows[0] / $numberOfRows);
?>
<html>
	<head>
		<title>DFPPI Employees</title>
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
				<form action = "products-view.php" method = "get" onsubmit = "return check();" autocomplete="off">
					<p class = "form-body">Search by : 
					<select id = "choice" name = "choice">
                    <option value="p_Id">Product Id</option>
					<option value="p_name">Name</option>
					<option value="p_type">Type</option>
					</select>
					<input type = "text" id = "srch" name = "srch" class = "input-srch" maxlength = 128 autofocus placeholder = "Francis" required>
					</p>

					<input id = "submit" type = "submit" value = "Search">
				</form>
			</div>
			<div class = "bot-div">
            <?php

                //Create Table
                echo "<table class= 'table-set' border='1' cellspacing='1' cellpadding='3' style='width:100%;font-size:20;'>";
                
                //Table head & Toggle direction
                $ndir = ($col == "p_Id" && $dir == "ASC") ? "DESC" : "ASC";
                echo "<th><a href='products-view.php?choice={$choice}&srch={$srch}&direction={$ndir}&order=p_Id&page={$page}'>Product Id</a></th>"; 
                
                $ndir = ($col == "p_name" && $dir == "ASC") ? "DESC" : "ASC";
                echo "<th><a href='products-view.php?choice={$choice}&srch={$srch}&direction={$ndir}&order=p_name&page={$page}'>Product Name</a></th>"; 
                
                echo "<th>Description</th>";
                
                echo "<th>Type</th>";
                
                $ndir = ($col == "p_weight" && $dir == "ASC") ? "DESC" : "ASC";
                echo "<th><a href='products-view.php?choice={$choice}&srch={$srch}&direction={$ndir}&order=p_weight&page={$page}'>Weight</a></th>"; 
                
                $ndir = ($col == "p_price" && $dir == "ASC") ? "DESC" : "ASC";
                echo "<th><a href='products-view.php?choice={$choice}&srch={$srch}&direction={$ndir}&order=p_price&page={$page}'>Price</a></th>"; 
                
                //Create Table content
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>{$row["p_Id"]}</td>";
                    echo "<td>{$row["p_name"]}</td>";
                    echo "<td>{$row["p_descp"]}</td>";
                    echo "<td>{$row["p_type"]}</td>";
                    echo "<td>{$row["p_weight"]}</td>";
                    echo "<td>{$row["p_price"]}</td>";
                    echo "</tr>";
                }

                echo "</table>";
            ?>
            <div class = 'pagination'>
                <ul>
                <?php 
                    //Create Pagination
                    for($i = 1; $i <= $numberOfPages; $i++){
                        echo "<li><a href='products-view.php?choice={$choice}&srch={$srch}&direction={$dir}&order={$col}&page={$i}'>{$i}</a></li>"; 
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
    
    if(choice == "p_Id"){
        if(!$.isNumeric(srch)) {
            alert('Please input correctly.');
            return false;
        }
    }
    
    return true;
}
</script>
