<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8">
		<title>Części samochodowe Janka - zestawienie kosztów przesyłek</title>
	</head>
	<body>
		<table style="border: 0px; padding: 3px">
			<tr>
				<td style="background: #cccccc; text-align: center;">Odległość</td>
				<td style="background: #cccccc; text-align: center;">Koszt</td>
			</tr>
			<?php
				
				$odleglosc = 50;
				while ($odleglosc <= 250) {
					echo "<tr>";
					echo "<td style=\"text-align-center\">".$odleglosc."</td>";
					echo "<td style=\"text-align-center\">".($odleglosc / 10)."</td>";
					echo "</tr>\n";
					$odleglosc += 50;
				}
			?>
		</table>
	</body>
</html>
