<?php

	session_start();
	require_once('functions.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title>Login form</title>
  </head>
  <body>
  
	<?php
	
		$login = htmlspecialchars($_POST['login']);
		$password = htmlspecialchars($_POST['password']);
		
		if (isset($_SESSION['logged_in'])) {
			echo 'You are logged in. Go to upload site!<br>';
			echo '<a href="send_file.php">Upload site!</a>';
		}
		
		if (!empty($login) && !empty($password)) {
			try {
				log_in($_POST['login'], $_POST['password']);
			}
			catch (Exception $e) {
				echo "Issue: ".$e->getMessage();
				echo '<br><a href="login_form.php">Back</a>';
			}
		}
		else {
			echo 'Login data not complete!';
			echo '<a href="login_form.php">Back</a>';
		}
	
	?>
  
  </body>
</html>