<?php

	function create_table($dane, $naglowek=NULL, $tytul=NULL){
		echo '<table>';
		if ($tytul) {
			echo "<caption>$tytul</caption>";
		}
		if ($naglowek) {
			echo "<tr><th>>$naglowek</th></tr>";
		}
		
		reset($dane);				// pointer to first elem
		$val = current($dane);
		while ($val) {
			echo "<tr><td>$val</td></tr>\n";
			$val = next($dane);
		}
		echo '</table>';
	}
	
	$my_tab = ['jeden', 'dwa', 'trzy'];
	$my_header = 'Dane';
	$my_title = 'Dane do czegos tam...';
	
	create_table($my_tab, $my_header, $my_title);
	
	echo "<hr> referencje :D<br>";
	
	function add(&$val, $additive=1) {
		$val = $val + $additive;
	}
	$a = 10;
	echo "$a<br>";
	add($a);
	echo "$a<br>";

	function silnia($n) {
		if ($n < 2) {
			return 1;
		} else {
			return silnia($n-1)*$n;
		}
	}
	
	function silnia2($n) {
		$res = 1;
		while ($n > 0) {
			$res *= $n;
			$n--;
		}
		return $res;
	}
	
	echo "<hr>silnia rekurencyjnie<br>";
	echo silnia(170);
	echo "<br>silnia iteracyjnie<br>";
	echo silnia2(170);
?>
