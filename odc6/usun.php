<?php

	require_once('baza.php');
	
	// if $_GET['id'] exist: parse to int; else $id = 0;
	$id = isSet($_GET['id']) ? intval($_GET['id']) : 0;
	
	if ($id > 0) {
		// create a phantom query
		$sth = $pdo->prepare('DELETE FROM `regal` WHERE `id` = :id');
		// data binding
		$sth->bindParam(':id', $id);
		// execute the query
		$sth->execute();
		
		// back to file with table
		header('location: loop.php');
	} else {
		header('location: loop.php');
	}

?>