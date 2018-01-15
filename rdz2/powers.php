<?php

	/** show power xD **/
	
	$my_var = 3;
	
	switch ($my_var) {
		case 2:
			for ($i = $my_var; $i <= $my_var + 10; $i++) {
					echo $i*$i." ";
			}
			break;
			
		case 3:
			for ($i = $my_var; $i <= $my_var + 10; $i++) {
				echo $i*$i*$i." ";
			}
			break;
			
		case 4:
			for ($i = $my_var; $i <= $my_var + 10; $i++) {
				echo $i*$i*$i*$i." ";
			}
			break;
			
		default: 
			echo "Not defined";
			break;
	}

?>