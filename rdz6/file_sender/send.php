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
		elseif (isset($_POST['usr_file'])) {
			echo "You've not chosen the file!";
			echo '<a href="sender.php">Try again</a>';
		}
		else {
			try {
				check_cookie();
				check_file($_POST['usr_file']);
				save_file($_SESSION['logged_in']);
				save_cookie();
			}
			catch (Exception $e) {
				echo "There was error while uploading the file!<br>";
				echo $e->getMessage();
			}
		}
	
	?>
  
  </body>
</html>