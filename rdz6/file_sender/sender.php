<?php

	session_start();
	require_once('functions.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title>Sending txt</title>
  </head>
  <body>
  
	<?php
	
		if (!isset($_SESSION['logged_in'])) {
			echo 'You are not logged in. Go to login page: ';
			echo '<a href="login_form.php">Login page</a>';
		}
		else {
			
	?>
	
	<form enctype="multipart/form-data" action="send.php" method="post">
	  <input type="hidden" name="MAX_FILE_SIZE" value="1024">
	  <input type="file" name="usr_file">
	  <input type="submit" value="Upload">
	</form>
	
	<?php
	
		}
	
	?>
	
  </body>
</html>
