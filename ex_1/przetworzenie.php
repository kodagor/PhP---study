<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Skup u Janka - wyniki zamówienia</title>
	</head>
	<body>
		<h1>Części samochodwe Janka</h1>
		<h2>Wyniki zamówienia:</h2>
		<?php
			// stałe
			define('CENAOPON', 100);
			define('CENAOLEJU', 10);
			define('CENASWIEC', 4);
			define('VAT', 1.23);
		
			// zmienne 
			$wartoscnetto = 0;
			$wartoscbrutto = 0;
			$suma = 0;
			$cenaopon = 0;
			$cenaoleju = 0;
			$cenaswiec = 0;
			$dane = '';
			$data = date('H:i, d-m-Y');
					
			$iloscopon = (int)$_POST['iloscopon'];
			$iloscoleju = (int)$_POST['iloscoleju'];
			$iloscswiec = (int)$_POST['iloscswiec'];
			$jak = $_POST['jak'];
			$adres = $_POST['adres'];
			$document_root = $_SERVER['DOCUMENT_ROOT'];
			
			// obliczenia
			$cenaopon = $iloscopon * CENAOPON;
			$cenaoleju = $iloscoleju * CENAOLEJU;
			$cenaswiec = $iloscswiec * CENASWIEC;
			
			$oponybrutto = VAT * $cenaopon;
			$olejbrutto = VAT * $cenaoleju;
			$swiecebrutto = VAT * $cenaswiec;
			
			$wartoscnetto = $cenaopon + $cenaoleju + $cenaswiec;
			$suma = $iloscopon + $iloscoleju + $iloscswiec;
			$wartoscbrutto = $wartoscnetto * VAT;
						
			// wypisanie podsumowania
			echo '<p>Zamówienie przyjęte o: '.date('H:i, jS F Y').'</p>';
			if($suma == 0) {
				echo '<p style="color:red">';
				echo 'Na poprzedniej stronie nie zostało złożone żadne zamówienie!<br />';
				echo '</p>';
			} else {
				if ($iloscopon > 0) {
					echo '<p>Ilość opon: '.htmlspecialchars($iloscopon).' x '.CENAOPON.' zł = '.$cenaopon.' zł ( + 23% vat = '.number_format($oponybrutto, 2).' zł)<br>';
				}
				if ($iloscoleju > 0) {
					echo 'Ilość oleju: '.htmlspecialchars($iloscoleju).' x '.CENAOLEJU.' zł = '.$cenaoleju.' zł ( + 23% vat = '.number_format($olejbrutto, 2).' zł)<br>';
				}
				if ($iloscswiec > 0) {
					echo 'Ilość świec: '.htmlspecialchars($iloscswiec).' x '.CENASWIEC.' zł = '.$cenaswiec.' zł ( + 23% vat = '.number_format($swiecebrutto, 2).' zł)</p>';
				}
			}
			
			switch($jak) {
				case "a" :
					echo "<p>Stały klient.</p>";
					break;
				case "b" :
					echo "<p>Reklama telewizyjna.</p>";
					break;
				case "c" :
					echo "<p>Książka telefoniczna.</p>";
					break;
				case "d" :
					echo "<p>Znajomy.</p>";
					break;
				default :
					echo "<p>Źródło nieznane.</p>";
					break;
			}
						
			echo '<p>Ilość część: '.$suma.',<br>Wartość zamówienia netto: '. number_format($wartoscnetto, 2).' zł<br>';
			echo 'Wartość zamówienia brutto: '.number_format($wartoscbrutto, 2).' zł</p>';
			echo '<p>Adres wysyłki: '.htmlspecialchars($adres).'</p>';
			echo '<p><a href="formularz.html">Powrót do składania zamówienia</a></p>';
			echo '<p>Transport: <a href="transport.php" target="_blank">KLIK</a></p>';
					
			
			// zapisanie do pliku
			$dane = $data.",\t".$iloscopon. " opon,\t".$iloscoleju." butelek oleju,\t".$iloscswiec." swiec zaplonowych,\t"
				.$wartoscbrutto." PLN (brutto),\t".$adres."\n";
			
			if (($iloscoleju != 0 || $iloscopon != 0 || $iloscswiec != 0) && $adres != '') {	
				@$wp = fopen("./zamowienia/zamowienie.txt", "ab");
				flock($wp, LOCK_EX);
				
				if (!$wp) {
					echo '<p>W tej chwili nie można zrealizować zamówienia.
						proszę spróbować później.</p>';
					exit;
				}
				
				fwrite($wp, $dane);
				
				flock($wp, LOCK_UN);
				fclose($wp);
			}
			
			echo '<p>Zamówienie zapisane!<a href="zamowienia_v2.php"> Zobacz zamówienia </a></p>';
		?>
	</body>
</html>
