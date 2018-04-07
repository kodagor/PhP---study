<?php

	function fizzbuzz($first, $last) {
		$current = $first;
		while ($current <= $last) {
			if ($current % 3 == 0 && $current % 5 == 0) {
				yield "fizzbuzz";
			}
			elseif ($current % 3 == 0) {
				yield "fizz";
			}
			elseif ($current % 5 == 0) {
				yield "buzz";
			}
			else {
				yield "$current";
			}
			$current++;
		}
	}
	
	foreach(fizzbuzz(1, 20) as $number) {
		echo $number."<br>";
	}

?>
