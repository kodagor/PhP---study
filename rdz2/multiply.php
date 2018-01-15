<?php

	/* script is printing multiply array */
	for($j = 1; $j <= 10; $j++) {
		for($i = 1; $i <= 10; $i++) {
			$result = $i*$j;
			if ($result % 2 == 0) {
				echo "<span style='color:blue;'>".$result."&nbsp;&nbsp;&nbsp;</span>";
			} elseif ($result % 2 != 0) {
				echo "<span style='color:red;'>".$result."&nbsp;&nbsp;&nbsp;</span>";
			}
		}
		echo "<br>";
	}

?>