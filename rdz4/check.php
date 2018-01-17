<?php

	function check_email($email) {
		// check the email correctness
		$check = '/^[a-zA-Z0-9.\-_]+[a-zA-Z0-9]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/';
		
		if (preg_match($check, $email))
			return true;
		else
			return false;
	}
	
	function check_name($name) {
		// check the name correctness
		$check = '/^[a-zA-ZŁŚĆŹŻĄĘÓŃąęółźżćń]+$/';
		
		if (preg_match($check, $name)) {
			$name = ucwords(strtolower($name));
			return $name;
		}
		else
			return false;
	}
	
	function check_phone_number($phone) {
		// check phone number correctness
		$check = '/^[0-9]{9}$/';
		
		if (preg_match($check, $phone))
			return true;
		else
			return false;
	}
	
	function check_content($msg) {
		$msg = trim($msg);
		if(strlen($msg) < 30)
			return false;
		else
			return $msg;
	}
	
	/** MAIN **/
	
	$email = $_POST['email'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$msg = $_POST['msg'];
	$fault = false;
	
	//check email
	if (!check_email($email)) {
		echo "Incorrect e-mail address<br>";
		$fault = true;
	}
	
	// check name
	$name = check_name($name);
	if (!$name) {
		echo "Incorrect name!<br>";
		$fault = true;
	}
	
	// check phone number
	if (!check_phone_number($phone)) {
		echo "Incorrect phone number!<br>";
		$fault = true;
	}
	
	// check message
	$msg = check_content($msg);
	if (!$msg) {
		echo "Incorrect text message!<br>";
		$fault = true;
	}
	
	// check for errors
	if ($fault) {
		echo "<hr>There was one or more error while processing data!";
	} else {
		echo "Customer name: $name;<br>";
		echo "E-mail address: $email;<br>";
		echo "Phone number: $phone;<br>";
		echo "Message: $msg;<br>";
	}

?>