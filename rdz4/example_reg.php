<?php

	$name = $_POST['name'];
	$last_name = $_POST['l_name'];
	
	// cunstruction regular expression
	// check the corectness of name and last_name
	$check = '/[A-ZŁŚ]{1}+[a-ząęółśżźćń]+$/';
	
	if (preg_match($check, $name)) {
		if (preg_match($check, $last_name))
			echo "Correct";
		else
			echo "Incorrect last name";
	}
	else
		echo "Incorrect name";

?>
