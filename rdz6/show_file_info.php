<?php

	$file = $_FILES['file_name'];

	// show file type
	echo $file['type'];
	echo '<br>';
	// show size
	echo $file['size'];
	echo '<br>';
	// show file name
	echo $file['name'];
	echo '<br>';
	// show temporary name
	echo $file['tmp_name'];
	echo '<br>';
	// show error (if they exist)
	echo $file['error'];
	
?>