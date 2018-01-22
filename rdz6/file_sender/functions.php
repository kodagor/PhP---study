<?php

	function log_in($login, $password) {
		// checks the correctness of login info
		if($login == 'admin' && $password == 'abc123') {
			// init $_SESSION var
			$_SESSION['logged_in'] = strip_tags($login);
			echo 'Logged properly. Go to upload site:<br>';
			echo '<a href="sender.php">Upload site!</a>';
		}
		else {
			// Incorrect login data
			throw new Exception("Incorrect login data!");
		}
	}
	
	function check_file($file) {
		// checks errors with file, it's size and type (only *.txt)
		if ($_FILES[$file]['error'] > 0) {
			switch ($_FILES[$file]['error']) {
				case 1: {
					// bigger than default max size in config file
					Throw new Exception('File is too big!');
				}
				case 2: {
					// bigger than MAX_FILE_SIZE field value from form
					Throw new Exception('File is too big');
				}
				case 3: {
					// file has not been fully sent
					Throw new Exception('File has been sent only parted!');
				}
				case 4: {
					// file has not been sent
					Throw new Exception('File has not been sent!');
				}
				default: {
					// other errors
					Throw new Exception('There were problems while sending file');
				}
			}
			if ($_FILES['file']['type'] != 'text/plain')
				Throw new Exception('Wrong file type!');
		}
		return true;
	}
	
	function save_file($login) {
		// saves file on the server
		$destination = './pws/pws_'.$login.'.txt';
		
		if (is_uploaded_file($_FILES['file']['tmp_name'])) {
			if (!move_uploaded_file($_FILES['file']['tmp_name'], $destination))
				Throw new Exception('Wrong file type!');
		}
		else
			Throw new Exception('Could not save the file!');
		
		return true;
	}
	
	function check_cookie() {
		// checks for cookie's existence
		if (isset($_COOKIE['pw_sent'])) 
			Throw new Exception('Cannot send the password more than once!');
		return true;
	}
	
	function save_cookie() {
		// saves cookie
		if (!setcookie('pw_sent'))
			Throw new Exception('Cannot save the cookie!');
	}
	
?>