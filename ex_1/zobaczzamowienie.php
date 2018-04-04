<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Podgląd zamówień</title>
	</head>
	<body>
		<h1>Części samochodowe Janka</h1>
		<h2>Podgląd zamówień</h2>
		<?php
			$orders = file("./zamowienia/zamowienie.txt");
			$number_of_orders = count($orders);
			
			if ($number_of_orders == 0) {
				echo "<p><strong>Brak zamówień<br>Proszę spróbować później.</strong></p>";
			}
			
			for ($i = 0; $i < $number_of_orders; $i++) {
				echo $orders[$i]."<br>";
			}
		?>
	</body>
</html>
