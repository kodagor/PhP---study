<?php

	
	require_once('session.php');
	
	echo '<!DOCTYPE html><html><head><meta charset="utf-8"><title>Bazka</title></head><body>';
	
	$query = $pdo->query('SELECT * FROM `regal`');
	
	echo '<p><a href="add.php">Dodaj książkę</a></p>';
	
	echo '<table border="1">';
	echo '<tr>';
	
		echo '<th width="100">Tytuł książki</th>';
		echo '<th width="100">Autor</th>';
		echo '<th width="200">Recenzja</th>';
		echo '<th width="100">Opcje</th>';
	
	echo '</tr>';
	
	foreach($query->fetchAll() as $value) {
		
		echo '<tr>';
		
			echo '<td>'.$value['tytul'].'</td>';
			echo '<td>'.$value['autor'].'</td>';
			echo '<td>'.$value['recenzja'].'</td>';
			echo '<td><a href="usun.php?id='.$value['id'].'">Usuń</a> | <a href="add.php?id='.$value['id'].'">Edytuj</a></td>';
		
		echo '</tr>';
		
	}
	// $query->closeCursor();

	echo '</table>';
	echo '</body></html>';
?>