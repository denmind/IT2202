<!---Icons made by Google Material Design, Elegant Font, FreePik, Chanut Industries from flaticon.com--->
<!DOCTYPE html>
<?php
	
	/*Change to desired administrator username and password used for log-in*/
	$admin = "exec";
	
	/*Change to desired non-faculty regular username and password used for log-in*/
	$reg_user = "user";
	
	if(empty($_POST)){
		if(!empty($_SESSION))
			session_destroy();
?>
	<html>
		<head>
			<title>DFPPI Data Bank</title>
			<link rel = "icon" href = "images/logo.png">
			<link rel = "stylesheet" href = "css/bootstrap.min.css" crossorigin = "anonymous">
			<link rel = "stylesheet" href = "css/design.css">
			<style>
				html,body{
					background: url("tile.png");
					background-size: cover;
					background-position: center;
				}
				#e_Id{
					text-transform: uppercase;
				}
			</style>
		</head>
		
		<body>
			<div class = "main-div">
				<div class = "main-form">
					<div class ="head-title">
						<img id = "home-banner" src = "images/ultra-banner.png" alt = "DFPPI Data Bank">
					</div>
					<form  method = "post" action = "index.php" autocomplete = "off">
						Employee ID <br><input type="text" class = "login-form" id="e_Id" name = "user"  autofocus data-validation="required alphanumeric" maxlength="8" ><br><br>
						Password <br><input type = "password"  class = "login-form" name = "pass" title = "Please enter your password" data-validation="required alphanumeric" maxlength="8"><br><br>
						<input id = "go-form" title = "Login Account" type = "submit" value = "Login" >
					</form>
					
				</div>
			</div>
		</body>
	</html>
<?php
	/*Log-in check*/
	}else{
		session_start();
		
		/**Default flag values for regular non-employee user**/
		$_SESSION["first_name"] =  $_SESSION["last_name"] = "User";
		$_SESSION["FLAG_VALUE"] = 0;
		
		$link = mysqli_connect("localhost","root","","dfppi");
		
		if($link){
			$_SESSION["sess"] = $usr = $_POST["user"]; //user id
			$pass = $_POST["pass"];
			
			/*Redirect to  priv/reg mode*/
			if($usr == $admin && $pass == $usr){
				echo "<meta http-equiv='refresh' content='0; url=priv/'/>";
			}else if ($usr == $reg_user && $pass == $usr){
				echo "<meta http-equiv='refresh' content='0; url=home.php'/>";
				$_SESSION["privilege"] = "All";
			}else{		
				$pass = md5($pass);
				
				$find_q = "SELECT fn,ln FROM users WHERE id_num = '{$usr}' AND pw = '{$pass}' AND stat = 'Enabled'";
				
				/*successful login*/
				$set = mysqli_query($link,$find_q);
				
				if(mysqli_num_rows($set) == 1){
					$var = mysqli_fetch_assoc($set);
				    $_SESSION["first_name"] = $var["fn"];
					$_SESSION["last_name"] = $var["ln"];
					
					$find_f = "SELECT f_id,f_department FROM faculty WHERE 
							f_firstName = '{$_SESSION['first_name']}' 
							AND f_lastName = '{$_SESSION['last_name']}' 
							AND f_status = 'Okay'";
					
					$gd = mysqli_fetch_array(mysqli_query(mysqli_connect("localhost","root","","2101_final_project"),$find_f));
					
					/*privilege will get user's department class*/
					$_SESSION["MAIN-USER-ID"] = $gd[0];
					$_SESSION["privilege"] = $gd[1];
					$_SESSION["FLAG_VALUE"]++;
					
					/*
					echo $_SESSION["sex"];
					echo "<div class = 'head-direct'><p>Hello {$_SESSION["first_name"]} {$_SESSION["last_name"]}</p></div>";
					*/
					echo "<meta http-equiv='refresh' content='0; url=home.php'/>";
				
	}else{
					echo "(NOT)Invalid Access";
				}
			}
		}else{
			echo "(NOT)Database error connection";
		}
	}
?>
<script src="js/jquery.js"></script>
<script src="js/jquery.form-validator.js"></script>
<script src="js/validate.js"></script>
