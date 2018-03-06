<?php
	/*connect to main_database*/
	$dfp = mysqli_connect("localhost","root","","dfppi");
	if($dfp){
		if(empty($_POST)){
?>
	<!--Checks first if the name "Firstname" and "Lastname" already exists in "users.sql"-->
			<html>
				<form action = "add-user.php" method = "post">
					Firstname <input type = "text" name = "fn" required>
					Lastname <input type = "text" name = "ln" required>
					<input type = "submit">
				</form>
			</html>
<?php
		}else{
			$main = mysqli_connect("localhost","root","","2101_final_project");
			$fn = $_POST["fn"];
			$ln = $_POST["ln"];
			
			/*Query to check if names are in "faculty" table in main_database*/
			$ifExists = "SELECT f_id FROM faculty WHERE f_firstName = '{$fn}' AND f_lastName = '{$ln}'";
			if(mysqli_num_rows(mysqli_query($main,$ifExists)) == 1){
				/*takes the base name and password from the proposed user's name*/
				$b_fn = md5($fn);
				$b_ln = md5($ln);
				
				/*Uppercase charachters in logins only*/
				$usr_name = strtoupper(substr($b_fn,0,2));
				$main_pass = strtoupper(substr($b_ln,4,6));
				
				/***/
				$base = $usr_name.$main_pass;
				
				/*masks the password using md5() function*/
				$usr_pass = md5($base);
				
				/*Checks if the user to be created does not exist yet*/
				$ifExists = "SELECT id FROM users WHERE id_num = '{$usr_name}' AND pw = '{$usr_pass}'";
				
				if(mysqli_num_rows(mysqli_query($dfp,$ifExists)) == 0){
					$q_ins = "INSERT INTO `users` 
					(`id`, `id_num`, `pw`, `type`, `fn`, `ln`, `dor`)
					VALUES (NULL, '{$base}', '{$usr_pass}', 'Reg', '{$fn}', '{$ln}', CURRENT_TIMESTAMP)";
					
					$res = mysqli_query($dfp,$q_ins);
					
					/*Displays the data to be used by the user for login*/
					if($res){
						echo "Name: {$fn}, {$ln}";
						echo "<br>";
						echo "ID: {$base}";
						echo "<br>";
						echo "Password: {$base}";
						echo "<br>";
					}else{
						echo "(NOT) User not created!";
					}
				}else{
					echo "(NOT) User already exists.";
				}
			}else{
				echo "(NOT) Invalid access.";
			}
		}
	}else{
		echo "Connection lost.";
	}

?>