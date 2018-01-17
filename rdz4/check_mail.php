<?php

	// assign email address to variable
	$email = $_POST['email'];
	
	// reg expr for correct email
	$check = '/^[a-zA-Z0-9.\-_]+[a-zA-Z0-9]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,}$/';
	
	if (preg_match($check, $email))
		echo "E-mail address is correct.";
	else
		echo "E-mail address is not correct.";

?>