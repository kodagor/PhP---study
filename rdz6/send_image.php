<?php

	function check_errors() {
		// check for errors with image
		
		if ($_FILES['file_name']['error'] > 0) {
			echo 'issue: ';
			switch ($_FILES['file_name']['error']) {
				// bigger than default max size in config file
				case 1: {
					echo "Too big size!";
					break;
				}
				// bigger than MAX_FILE_SIZE field value from form
				case 2: {
					echo "Too big size!";
					break;
				}
				// file has not been fully sent
				case 3: {
					echo "File has been sent only parted!";
					break;
				}
				// file has not been sent
				case 4: {
					echo "File has not been sent!";
					break;
				}
				// other errors
				default: {
					echo "There were errors while sending file!";
					break;
				}
			}
			return false;
		}
		return true;
	}
	
	function check_type() {
		// check file type
		if ($_FILES['file_name']['type'] != 'image/jpeg')
			return false;
		return true;
	}
	
	function save_file() {
		// save file on server
		$destination = './temp/image_file.jpg';
		
		if (is_uploaded_file($_FILES['file_name']['tmp_name'])) {
			if (!move_uploaded_file($_FILES['file_name']['tmp_name'], $destination)) {
				echo "Issue: cannot move file to directory!";
				return false;
			} 
		}
		else {
			echo "Issue: Possible attack while file sending";
			echo "File has not been saved";
			return false;
		}
		return true;
	}
	
?>