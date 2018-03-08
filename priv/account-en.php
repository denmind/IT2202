<!DOCTYPE html>
<html>
	<head>
		<title>Account | Enable/Disable</title>
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
		<?php
			require '../sql_connect.php';
			
			$OK = "Enabled";
			$BAD = "Disabled";
			
			$PROCESS = $_SERVER["PHP_SELF"];
			
			if($link && empty($_POST)){
		?>
					<div class="main-content">
						<form class="form-horizontal" action = "<?php echo $PROCESS ?>" autocomplete = "off" method = "post">
							<div class="form-group">
								<label class="control-label col-sm-2" for="fn">Search</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="id_num" id="fn" data-validation="required alphanumeric" maxlength="8" placeholder="User ID">
								</div>
							</div>
						</form> 
		<?php
			}else{
				$findQ = "SELECT * FROM users WHERE id_num = '{$_POST["id_num"]}'";
				
				if($key = mysqli_fetch_assoc(mysqli_query($link,$findQ))){
					
					$curr_state = ($key['stat'] == $OK) ? $BAD : $OK;
					
					$changeQ = "UPDATE `users` SET `stat` = '{$curr_state}' WHERE `users`.`id` = {$key['id']}";
					
					
					if(mysqli_query($link,$changeQ)){
						echo "<h4 id='center'>{$key['id_num']} is now '{$curr_state}'</h4>";
						echo "<meta http-equiv='refresh' content='6; url=index.php' />";
					}else{
						echo "<h4 id='center'>Error in changing status</h4>";
					}
		
				}else{
					echo "<h3 id='center'>Error in users database</h3>";
					echo "<meta http-equiv='refresh' content='6; url=index.php' />";
				}
			}
		?>
	</body>
</html>
<script src="../js/jquery.js"></script>
<script src="../js/jquery.form-validator.js"></script>
<script src="../js/validate.js"></script>