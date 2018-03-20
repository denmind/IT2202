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
    FROM raw_materials rm
    JOIN storage s
    ON rm.s_Id = s.s_Id
    ORDER BY rm.rm_Id DESC";

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
						<th>Name</th>
						<th>Quantity</th>
						<th>Description</th>
                        <th>Price/Unit</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Storage</th>
                        <th>Product</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($key = mysqli_fetch_assoc($result)){
                            $s = $key['s_isleLoc']." - ".$key['s_rowLoc']." - ".$key['s_colLoc'];
							echo "<tr>";
                            echo "<td>{$key['rm_Id']}</td>";
                            echo "<td>{$key['rm_name']}</td>";
                            echo "<td>{$key['rm_quantity']}</td>";
                            echo "<td>{$key['rm_descp']}</td>";
                            echo "<td>{$key['rm_pricePerUnit']}</td>";
                            echo "<td>{$key['rm_type']}</td>";
                            echo "<td>{$key['status']}</td>";
                            echo "<td>{$s}</td>";
                            echo "<td><button class='btn btn-success btn-small' data-product='{$key['p_Id']}'>
						<span class='glyphicon glyphicon-eye-open'></span>
						</button></td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
        </div>
        <!-- START OF MODAL SECTION -->
        <div class="modal fade" tabindex="-1" role="dialog" id = "modal">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id = "title"></h4>
              </div>
              <div class="modal-body">
                <h4 id = 'message'></h4>
                <table class='table table-condensed table-bordered'>
                    <thead id = "modalHead">
                    </thead>
                    <tbody id = "modalBody">
                        <!--Data Displayed-->
                    </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- END OF MODAL SECTION -->
	</body>
</html>
<script src="js/jquery.js"></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src="js/jquery.dataTables.js"></script>
<script src="js/ourTable.js"></script>
<script>
//javascript here
    //for Product
$('.btn-success').on('click', function(){
	var pn = $(this).data('product');
	$.ajax({
		url : 'ViewProcess/getProduct.php',
		method : 'POST',
		data : {product : pn},
		dataType : 'json',
		success: function(result){
			var row = "";
			var title = "Product Info";
			var head = "<th>#</th><th>Name</th><th>Description</th><th>Type</th>";

			$('#modalBody').empty();
			$('#modalHead').empty();
			$('#message').empty();
            $('#title').empty();

			if(result.length == 0){
				var message = "This product doesn't exist!";
				$('#message').append(message);
			}else{
				$("#modalHead").append(head);
				for(var x=0; x < result.length; x++){
					row = "<tr>";
					row += "<td>"+result[x].p_Id+"</td>";
                    row += "<td>"+result[x].p_name+"</td>";
                    row += "<td>"+result[x].p_descp+"</td>";
                    row += "<td>"+result[x].p_type+"</td>";
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