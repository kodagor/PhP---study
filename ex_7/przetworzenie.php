<?php

	require_once('file_exceptions.php');
	
	// krotkie nazwy zmiennych
	$iloscopon = (int)$_POST['iloscopon'];
	$iloscoleju = (int)$_POST['iloscoleju'];
	$iloscswiec = (int)$_POST['iloscswiec'];
	$adres = preg_replace('/\t|\R/',' ',$_POST['adres']);
	$date = date('H:i, jS F Y');

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Części samochodwe - wyniki zamówienia</title>
	</head>
	<body>
		<h1>Części samochodwe</h1>
		<h2>Wyniki zamówienia</h2>
		<?php
		
			echo "<p>Zamówienie przyjęte o ".$date."</p>";
			echo "<p>Państwa zamówienie wygląda następująco: </p>";
			
			$ilosc = 0;
			$wartosc = 0;
			
			define('CENAOPON', 100);
			define('CENAOLEJU', 10);
			define('CENASWIEC', 4);
			
			$ilosc = $iloscopon + $iloscoleju + $iloscswiec;
			echo "<p>Ilosc zamówionych produktów: ".$ilosc."<br>";
			
			if ($ilosc == 0) {
				echo "Na poprzedniej stronie nie zostało złożonoe żadne zamówienie!<br>";
			} else {
				if ($iloscopon > 0) {
					echo htmlspecialchars($iloscopon)." opon<br>";
				}
				if ($iloscoleju > 0) {
					echo htmlspecialchars($iloscoleju)." butelek oleju<<br>";
				}
				if ($iloscswiec > 0) {
					echo htmlspecialchars($iloscswiec)." świec zapłonowych<br>";
				}
			}
			
			$wartosc = $iloscopon * CENAOPON
					 + $iloscoleju * CENAOLEJU
					 + $iloscswiec * CENASWIEC;
			
			echo "Wartość zamówienia wynosi: ".number_format($wartosc, 2, '.', ' ')."<br>";
			
			$podatek = 1.23;		// wartosc podatku: 23%
			$wartosc *= $podatek;
			echo "Wartość zamówienia z podatkiem wynosi: ".number_format($wartosc, 2, '.', ' ')." PLN</p>";
			
			echo "<p>Adres wysyłki to: ".$adres."</p>";
			
			$ciagwyjsciowy = $date."\t".$iloscopon." opon\n".$iloscoleju." butelek oleju\t"
							.$iloscswiec." swiec zapłonowych\t".$wartosc." PLN\t".$adres."\n";
			
			// otwarcie pliku w celu dopisywania
			try {
				if (!($wp = @fopen("zamowienia.txt", 'ab'))) {
					throw new OpenFileException();
				}
				if (!flock($wp, LOCK_EX)) {
					throw new BlockadeFileException();
				}
				if (!fwrite($wp, $ciagwyjsciowy)) {
					throw new SaveFileException();
				}
				
				flock($wp, LOCK_UN);
				fclose($wp);
				echo "<p>Zamówienie zapisane.</p>";
			}
			catch (OpenFileException $ope) {
				echo "<p><strong>Nie można otworzyć pliku zamówień.</strong></p>";
			}
			catch (Exception $e) {
				echo "<p><strong>Państwa zamówienie nie moze zostać przyjęte w tej chwili.</strong></p>";
			}			
		?>
	</body>
</html>
