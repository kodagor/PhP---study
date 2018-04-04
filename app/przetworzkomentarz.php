<?php

	// utworzenie krótkich nazw zmiennych
	// trim() - usunięcie białych znaków z początku i końca
	$nazwa = trim($_POST['nazwa']);
	$email = trim($_POST['email']);
	$komentarz = trim($_POST['komentarz']);
	
	// zdefiniowanie danych statycznych
	$adres_do = "dagor666@yahoo.com";
	$temat = "Komentarze ze strony WWW";
	$zawartosc = "Nazwa klienta: ".filter_var($nazwa)."\n"
				."Adres pocztowy: ".str_replace("\r\n", "", $email)."\n"
				."Komentarz klienta: ".tr_replace("\r\n", "", $komentarz)."\n";
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
	</body>
</html>
