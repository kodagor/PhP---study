<?php

	require_once('baza.php');
	
	echo '<!DOCTYPE html><html><head><meta charset="utf-8"><title>Bazka</title></head><body>';
	
	$query = $pdo->query('SELECT * FROM `regal`');
	
	echo '<table border="1">';
	echo '<tr>';
	
		echo '<th>Tytuł książki</th>';
		echo '<th>Autor</th>';
		echo '<th>Recenzja</th>';
		echo '<th>Opcje</th>';
	
	echo '</tr>';
	
	foreach($query->fetchAll() as $value) {
		
		echo '<tr>';
		
			echo '<td>'.$value['tytul'].'</td>';
			echo '<td>'.$value['autor'].'</td>';
			echo '<td>'.$value['recenzja'].'</td>';
			echo '<td><a href="usun.php?id='.$value['id'].'">Usuń</a></td>';
		
		echo '</tr>';
		
	}
	$query->closeCursor();

	echo '</table>';
	echo '</body></html>';
?>