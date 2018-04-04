<?php
	
	// num array

	$produkty = ['olej', 'opony', 'świece'];
	
	echo $produkty[1];
	echo "<br>";
	echo $produkty{1};
	echo "<br>";
	
	$produkty[3] = 'bezpieczniki';
	
	for ($i = 0; $i < sizeof($produkty); $i++) {
		echo $produkty[$i].", ";
	}
	
	echo "<br>";
	
	foreach ($produkty as $produkt) {
		echo $produkt.", ";
	}
	echo "<hr>ASSOC";echo "<br>";
	// assoc array
	
	$ceny = ['Opony'=>100, 'Olej'=>10, 'Świece zapłonowe'=>4];
	echo $ceny['Olej'];
	
	echo "<br>";
	
	foreach($ceny as $key=>$value){
		echo $key.' - '.$value.', ';
	}
	
	echo "<br>";
	
	while ($elem = each($ceny)){
		echo $elem['key'].' - '.$elem['value'].', ';
	}

	echo "<br>";
	
	reset($ceny);
	while (list($produkt, $cena) = each($ceny)) {
		echo $produkt.' - '.$cena.', ';
	}
	
	echo "<hr>MATRIX<br>";
	
	$produkty = [
					['OPO', 'Opony', '100'],
					['OLE', 'Oleje', '10'],
					['SWI', 'Świece zapłonowe', '4']
				];
	
	for ($i = 0; $i < 3; $i++) {
		for ($j = 0; $j < 3; $j++) {
			echo '| '.$produkty[$i][$j].' ';
		}
		echo "|<br>";
	}
	echo "<br>";echo "<br>";
	
	$produkty = [
					['Kod' => 'OPO',
					 'Opis' => 'Opony',
					 'Cena' => '100'
					],
					['Kod' => 'OLE',
					 'Opis' => 'Olej',
					 'Cena' => '10'
					],
					['Kod' => 'SWI',
					 'Opis' => 'Świece zapłonowe',
					 'Cena' => '4'
					]					
				];
	echo "Assoc Matrix<br><br>";
	for ($i = 0; $i < sizeof($produkty); $i++) {
		while (list($klucz, $wartosc) = each($produkty[$i])) {
			echo '| '.$wartosc.' ';
		}
		echo '|<br>';
	}
	echo "<br>";
	echo "Assoc 3 wymiary<br>";
	echo "<br>";
	
	$kategorie = [
					[
						['SAM_OPO', 'Opony', '100'],
						['SAM_OLE', 'Oleje', '10'],
						['SAM_SWI', 'Świece zapłonowe', '4']
					],
					[
						['VAN_OPO', 'Opony', '120'],
						['VAN_OLE', 'Oleje', '12'],
						['VAN_SWI', 'Świece zapłonowe', '5']
					],
					[
						['CIE_OPO', 'Opony', '150'],
						['CIE_OLE', 'Oleje', '15'],
						['CIE_SWI', 'Świece zapłonowe', '6']
					],
				];
	
	for ($i = 0; $i < sizeof($kategorie); $i++) {
		echo "Warstwa: ".($i+1)."<br>";
		for ($j = 0; $j < sizeof($kategorie[$i]); $j++) {
			for ($k = 0; $k < sizeof($kategorie[$i][$j]); $k++) {
				echo '| '.$kategorie[$i][$j][$k].' ';
			}
			echo "|<br>";
		}
		echo "<br>";
	}
	
	echo "<br>tablice (tablica odwrotnie)<br>";
	
	$tab = [1,2,3,4,5,6];
	
	$wartosc = end ($tab);
	while ($wartosc) {
		echo "$wartosc<br>";
		$wartosc = prev ($tab);
	}
	
	// własna funkcja do wyświetlenia elementu tablicy
	function my_print($wartosc) {
		echo ">>>$wartosc<<<";
	}
	
	echo "<br>";
	array_walk($tab, 'my_print');
	echo "<br>";echo "<br>";
	
	
	//$tab = [1,2,3,4,5,6];
	function my_multiply(&$wartosc, $klucz, $wspol) {
		$wartosc *= $wspol;
	}
	
	array_walk($tab, 'my_multiply', 3);
	array_walk($tab, 'my_print');
	
	echo "<br><hr>";
	echo "array_count_values() - zliczanie wystąpień elementu w tablicy<br>";
	$tablice = [4,5,1,2,3,1,2,1,];
	print_r($tablice);
	$lt = array_count_values($tablice);
	echo "<br>";
	print_r($lt);
	echo "<hr>extract() - zmienia klucz=>wartosc na zmienna i wartosc:<br>";
	$tab = ['a'=>1,'b'=>2,'c'=>3];
	print_r($tab);
	echo "<br>";
	extract($tab);
	echo "a: $a, b: $b, c: $c<br>";
	echo "<br>";echo "<br>";
	
?>
