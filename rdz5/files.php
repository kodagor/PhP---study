<?php

	// creating anchor to file
	$file = fopen('Lorem Ipsum.txt','r');
	
	$content = "";
	
	// assign content to var_dump
	while (!feof($file)) {
		$line = fgets($file);
		$content .= $line."<br>";
	}
	
	echo $content;

?>