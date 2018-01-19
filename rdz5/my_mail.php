<?php

	$from = "From: kodagor.js@gmail.com \r\n";
	$from .= "MIME-Version: 1.0"."\r\n";
	$from .= "Content-type: text/html; charset=iso-8859-2"."\r\n";
	$address = "dagor666@gmail.com";
	$subject = "Email subject";
	$message = "<html><head></head><body>";
	$message .= "<b>Hello!</b><br>";
	$message .= "<p>This is my email message!</p></body></html>";
	
	//use mail
	mail($address, $subject, $message, $from);

?>