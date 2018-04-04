<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Janek - podgląd zamówień v2</title>
		<style type="text/css">
			table, th, td {
				border-collapse: collapse;
				border: 1px solid black;
				padding: 6px;
			}
			th {
				background-color: #ccf;
			}
		</style>
	</head>
	<body>
		<h1>Części samochodwe u Janka</h1>
		<h2>Zamówienia klientów</h2>
		<?php
		
			// odczytanie danych z całego pliku (każdy wiersz staje się elementem tablicy)
			$zamowienia = file("./zamowienia/zamowienie.txt");
			
			// odczytanie liczby zamówień
			$liczba_zamowien = count($zamowienia);
			
			if ($liczba_zamowien == 0) {
				echo "<p><strong>Brak zamówień.<br>Proszę spróbować później</strong></p>";
			}
			
			echo "<table>\n";
			echo "<tr>
					<th>Data zamówienia</th>
					<th>Opony</th>
					<th>Olej</th>
					<th>Świece zapłonowe</th>
					<th>Suma</th>
					<th>Adres</th>
				</tr>";
			
			for ($i=0; $i<$liczba_zamowien; $i++) {
				// rozdzielenie każdego wiersza na elementy
				$linia = explode("\t", $zamowienia[$i]);
				/*				
				 * Tablica $linia[] przechowuje elementy znajdujące się pomiędzy \t,
				 * czyli data, $iloscopon, $iloscoleju, $iloscswiec, $wartoscbrutto, $adres
				*/
				// zapamiętanie liczby zamówionych produktów
				$linia[1] = intval($linia[1]);
				$linia[2] = intval($linia[2]);
				$linia[3] = intval($linia[3]);
				
				// wyświetlanie każdego zamówienia
				echo "<tr>
						<td>".$linia[0]."</td>
						<td style=\"text-align: right;\">".$linia[1]."</td>
						<td style=\"text-align: right;\">".$linia[2]."</td>
						<td style=\"text-align: right;\">".$linia[3]."</td>
						<td style=\"text-align: right;\">".$linia[4]."</td>
						<td>".$linia[5]."</td>
					</tr>";
			}
			echo "</table>";
		?>
	</body>
</html>
