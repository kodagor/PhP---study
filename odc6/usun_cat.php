<?php

    include('session.php');

    // if $_GET['id'] exist: parse to int; else $id = 0;
    $id = isSet($_GET['id']) ? intval($_GET['id']) : 0;

    if ($id > 0) {
        // create a phantom query
        $sth = $pdo->prepare('DELETE FROM `category` WHERE `id` = :id');
        // data binding
        $sth->bindParam(':id', $id);
        // execute the query
        $sth->execute();

        // back to file with table
        header('location: category.php');
    } else {
        header('location: category.php');
    }

?>