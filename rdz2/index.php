<?php

	$how_many = -5;
	
	// check if var is 0
	$next = ($how_many == 0) ? 0 : 1;
	
	// if var != 0 ->
	if ($next == 1) {
	// check if higher or lower than 0
		if ($how_many > 0) {
			//set up a loop for $how_many rows
			while($how_many > 0) {
				// show nums from 0 to 20
				for ($i = 0; $i <= 20; $i++){
					echo $i." ";
				}
				echo "<br>";
				$how_many--;
			}
		} elseif ($how_many < 0) {
			//set up a loop for $how_many rows
			while($how_many < 0) {
				// show nums from 20 to 0
				for ($i = 20; $i >= 0; $i--){
					echo $i." ";
				}
				echo "<br>";
				$how_many++;
			}
		}
	}
	

?>