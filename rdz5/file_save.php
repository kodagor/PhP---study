<?php

	// anchor for file
	$file = fopen('file.txt', 'w');
	
	// create content
	$content = <<<_END
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br> 
Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.<br> 
Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br>
_END;

	echo "<p>From 'echo': <br>".$content."</p>";
	
	// write in file
	fwrite($file, $content);
	
	// close the file
	fclose($file);
	
	echo "<br><hr><br>";
	
	// show file content
	$my_file = fopen('file.txt', 'r');
	$contents = "";
	while (!feof($my_file)) {
		$line = fgets($my_file);
		$contents .= $line;
	}
	
	echo "<p>From file: <br>".$contents."</p>";

?>