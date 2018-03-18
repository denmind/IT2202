<!DOCTYPE html>
<?php
	/*connect to main_database*/
	require  '../sql_connect.php';
	
	if($link){
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
					<div class="page-header" id="myHead">
					  <h1>Add account [Manual]</h1>
					</div>
					<!--right content-->
					<div class="main-content">
						<form class="form-horizontal" action = "<?php echo $_SERVER['PHP_SELF'] ?>" autocomplete = "off" method = "post">
							<div class="form-group">
								<label class="control-label col-sm-2" for="fn">Firstname: </label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" name="fn" data-validation="required alphanumeric" maxlength="10" placeholder="Enter First Name">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="ln">Lastname: </label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" name="ln" data-validation="required alphanumeric" maxlength="10" placeholder="Enter Last Name">
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
		<script src="../js/jquery.js"></script>
		<script src="../js/jquery.form-validator.js"></script>
		<script src="../js/validate.js"></script>
<?php
		}else{
			/*get firstname and lastname*/
			$fn = $_POST["fn"];
			$ln = $_POST["ln"];
			
		
				/*Query to check if names are in "faculty" table in main_database*/
				$ifExists = "SELECT * FROM faculty WHERE f_firstName = '{$fn}' AND f_lastName = '{$ln}'";
				
				/*use '==1' if only onr record or '>0' if dupes exist*/
				if($x = mysqli_fetch_assoc(mysqli_query($conn,$ifExists))){
					/*takes the base name and password from the proposed user's name*/
					$b_fn = md5($fn);
					$b_ln = md5($ln);
					
					/*used in loggin-in*/
					/*Converts to caps to make sure user input is easier during logins*/
					$usr_name = strtoupper(substr($b_fn,1,4));
					$conn_pass = strtoupper(substr($b_ln,6,4));
					
					$base = $usr_name . $conn_pass;
					
					/*Checks if the user to be created does not exist yet*/
					$ifExists = "SELECT id FROM users WHERE id_num = '{$base}'";
					
					
					if(mysqli_num_rows(mysqli_query($link,$ifExists)) == 0){
						
						
						$pass = md5($base);
					
						$q_ins = "INSERT INTO `users` 
								 (`id`, `stat` ,`id_num`, `pw`, `fn`, `ln`, `dor`)
								 VALUES (NULL, 'Enabled' ,'{$base}', '{$pass}', '{$fn}', '{$ln}', CURRENT_TIMESTAMP)";
						
						
						
						/*Displays the data to be used by the user for login*/
						if(mysqli_query($link,$q_ins)){
							echo "<meta http-equiv='refresh' content='0; url=index.php' />";
						}else{
							echo "(NOT) User not created!";
							echo "<span class='glyphicon glyphicon-triangle-left'></span><a href='index.php'>Return</a>";
							echo "<meta http-equiv='refresh' content='5; url=index.php' />";
						}
					}else{
						echo "(NOT) User already exists.";
							echo "<span class='glyphicon glyphicon-triangle-left'></span><a href='index.php'>Return</a>";
							echo "<meta http-equiv='refresh' content='5; url=index.php' />";
					}
				}else{
					echo "(NOT) Invalid access.";
					echo "<span class='glyphicon glyphicon-triangle-left'></span><a href='index.php'>Return</a>";
					echo "<meta http-equiv='refresh' content='5; url=index.php' />";
				}
		}
	}else{
		echo "Connection to database lost.";
		echo "<span class='glyphicon glyphicon-triangle-left'></span><a href='index.php'>Return</a>";
		echo "<meta http-equiv='refresh' content='5; url=index.php' />";
	}
?>