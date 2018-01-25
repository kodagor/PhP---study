<?php
	
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=ksiazki;encoding=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        // echo "Nawiązano połączenie z bazą!";
    }
    catch (PDOException $e) {
        echo "Wystąpił błąd: ".$e->getMessage();
    }
    include('header.php');
?>