<?php
	/*connect to main_database*/
	$dfp = mysqli_connect("localhost","root","","dfppi");
	if($dfp){
		if(empty($_POST)){
?>
	<!--Checks first if the name "Firstname" and "Lastname" already exists in "users.sql"-->
			<html>
				<head>
					<title>Account | Add</title>
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
						  <li><a href="../"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
						</ul>
					  </div>
					</nav> 
				</body>
					<div class="page-header" id="myHead">
					  <h1>Add account [Manual]</h1>
					</div>
					<!--right content-->
					<div class="main-content">
						<form class="form-horizontal" action = "add-user.php" autocomplete = "off" method = "post">
							<div class="form-group">
								<label class="control-label col-sm-2" for="fn">Firstname: </label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" name="fn" id="fn" required = "required" placeholder="Enter First Name">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="ln">Lastname: </label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" id="ln" name="ln" required = "required" placeholder="Enter Last Name">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <button type="submit" class="btn btn-inverse">Submit</button>
								</div>
							</div>
						</form> 
					</div>
				</body>
			</html>
<?php
		}else{
			/*get firstname and lastname*/
			$main = mysqli_connect("localhost","root","","2101_final_project");
			$fn = $_POST["fn"];
			$ln = $_POST["ln"];
			
			function add_user($fn,$ln){
				/*Query to check if names are in "faculty" table in main_database*/
				$ifExists = "SELECT f_id FROM faculty WHERE f_firstName = '{$fn}' AND f_lastName = '{$ln}'";
				
				/*use '==1' if only onr record or '>0' if dupes exist*/
				if(mysqli_num_rows(mysqli_query($main,$ifExists)) == 1){
					/*takes the base name and password from the proposed user's name*/
					$b_fn = md5($fn);
					$b_ln = md5($ln);
					
					/*used in loggin-in*/
					/*Converts to caps to make sure user input is easier during logins*/
					$usr_name = strtoupper(substr($b_fn,1,4));
					$main_pass = strtoupper(substr($b_ln,6,4));
					
					$base = $usr_name . $main_pass;
					
					/*Checks if the user to be created does not exist yet*/
					$ifExists = "SELECT id FROM users WHERE id_num = '{$base}' AND pw = '{$base}'";
					
					$pass = md5($base);
					
					if(mysqli_num_rows(mysqli_query($dfp,$ifExists)) == 0){
						$q_ins = "INSERT INTO `users` 
						(`id`, `stat` ,`id_num`, `pw`, `type`, `fn`, `ln`, `dor`)
					VALUES (NULL, 'Enabled' ,'{$base}', '{$pass}', 'Reg', '{$fn}', '{$ln}', CURRENT_TIMESTAMP)";
						
						$res = mysqli_query($dfp,$q_ins);
						
						/*Displays the data to be used by the user for login*/
						if($res){
							return TRUE;
							echo "<div class='main-content'>";
							echo "Name: {$fn}, {$ln}";
							echo "<br>";
							echo "ID: {$base}";
							echo "<br>";
							echo "Password: {$base}";
							echo "<br>";
							echo "</div>";
							
						}else{
							echo "(NOT) User not created!";
							return FALSE;
						}
					}else{
						echo "(NOT) User already exists.";
					}
				}else{
					echo "(NOT) Invalid access.";
				}
			}
		}
	}else{
		echo "Connection lost.";
	}

?>