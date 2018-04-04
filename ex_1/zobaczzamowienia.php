<?php
	// utworzenie krótkich nazw zmiennych
	$document_root = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Skup u janka - przegląd zamówień</title>
	</head>
	<body>
		<h1>Części samochodwe Janka</h1>
		<h2>Zamówienia klientów</h2>
		<?php
		
			$wp = fopen("$document_root/rdz_1/ex_1/zamowienia/zamowienie.txt", 'rb');
			flock($wp, LOCK_SH);	// zablokowanie pliku do odczytu
			
			if (!$wp) {
				echo "<p><strong>Brak zamówień<br>
					Proszę spróbować później.</strong></p>";
				exit;
			}
			
			while (!feof($wp)) {
				$zamowienie = fgets($wp);
				echo htmlspecialchars($zamowienie)."<br>";
			}
			
			flock($wp, LOCK_UN);	// zwolnienie blokady pliku
			
			echo 'Końcowa pozycja wskaźnika pliku wynosi '.(ftell($wp)).'<br>';
			rewind($wp);
			echo 'Pozycja wskaźnika po przewinięciu '.(ftell($wp)).'<br>';
			
			fclose($wp);
		?>
	</body>
</html>
