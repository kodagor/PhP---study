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
		
		if (isset($_SESSION['logged_in'])) {
			echo 'You are logged in. Go to upload site!<br>';
			echo '<a href="sender.php">Upload site!</a>';
		}
		else {
			
	?>
	
	<form action="log_in.php"method="post">
	  <input type="text" name="login">
	  <input type="password" name="password">
	  <input type="submit" value="Log in">
	</form>
	
	<?php
	
		}
	
	?>
	
  </body>
</html>