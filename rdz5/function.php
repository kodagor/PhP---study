<?php

	function get_email($site) {
		// reg ex for correct email address
		$check  = '/^[a-zA-Z0-9.\-_]+[a-zA-Z0-9]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/';
		// open the site file
		$file = fopen($site, 'r');
		
		// create new file
		$my_file = fopen('temporary_index.txt', 'a');
		flock($my_file, 2); // lock my_file
		
		// searching the file until end of it
		while(!feof($file)) {
			// get the line
			$line = fgets($file);
			
			// check for email and if it is, save to my_file
			if (preg_match($check, $line, $matches))
				fputs($my_file, $matches);
		}
		
		// close site file
		fclose($file);
		
		// after saving data, pointer is in the end of the file
		// we need to rewind pointer in file to begining 
		rewind($my_file);
		
		// read entire file into an array
		$addresses = file('temporary_index.txt');
		
		// sending email
		$address = "dagor666@gmail.com";
		$subject = "E-mail addresses";
		$msg = "Found e-mail addresses: $addresses";
		mail($address, $subject, $msg);
		
		// unlock file
		flock($my_file, 3);
		
		// close
		fclose($my_file);
		
		// remove after sending the e-mail
		//unlink($my_file);
	}

?>