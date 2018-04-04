<?php

	// utworzenie krótkich nazw zmiennych
	// trim() - usunięcie białych znaków z początku i końca
	$nazwa = trim($_POST['nazwa']);
	$email = trim($_POST['email']);
	$komentarz = trim($_POST['komentarz']);
	
	// sprawdzanie poprawności
	if (!preg_match('/^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $email)) {
		echo "<p>Adres email niepoprawny<br>"
			."Powróć do popszedniej strony <a href=\"komentarz.html\">powrót</a></p>";
		exit;
	}
	
	// zdefiniowanie danych statycznych
	$adres_do = "dagor666@yahoo.com";
	
	// wybór tematów
	$temat = "Komentarze ze strony WWW";	// domyślna wartość
	if (preg_match("/sklep|obsługa klienta|sprzedaż/i", $komentarz)) {
		$temat = "Do obsługi klienta";
	} elseif (preg_match("/dostarczy|dostaw/i", $komentarz)) {
		$temat = "Do działu dostawy";
	} elseif (preg_match("/rachunek|księgowość/i", $komentarz)) {
		$temat = "Dla księgowości";
	}
	if (preg_match("/wielkiklient\.com/i", $email)) {
		$temat = "od ważnego klienta";
	}
	
	$zawartosc = "Nazwa klienta: ".str_replace("\r\n", "", $nazwa)."\n"
				."Adres pocztowy: ".str_replace("\r\n", "", $email)."\n"
				."Komentarz klienta: \n".str_replace("\r\n", "", $komentarz)."\n";
	$adres_od = "serwerwww@mrnew.com";
	
	// wywołanie funkcji mail() wysyłającej wiadomość
	mail($adres_do, $temat, $zawartosc, $adres_od);

?>

<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="utf-8">
		<title>Części samochodowe Janka - komentarz pokaż</title>
	</head>
	<body>
		<h1>Komentarz przyjęty!</h1>
		<p>Państwa komentarz został wysłany.</p>
		<p>Bez nl2br:<br><?php echo htmlspecialchars($zawartosc);?></p>
		<p>Z nl2br:<br><?php echo nl2br(htmlspecialchars($zawartosc));?></p>
	</body>
</html>
