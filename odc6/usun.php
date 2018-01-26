<?php

    include('session.php');

    // if $_GET['id'] exist: parse to int; else $id = 0;
    $id = isSet($_GET['id']) ? intval($_GET['id']) : 0;

    if ($id > 0) {
        // create a phantom query
        $sthCov = $pdo->prepare('SELECT `cover` FROM `regal` WHERE `id` = :id');
        // data binding
        $sthCov->bindParam(':id', $id);
        // execute the query
        $sthCov->execute();

        $cover = $sthCov->fetch()['cover'];

        if ($cover) {
            unlink(__DIR__.'/img/'.$cover);
            unlink(__DIR__.'/img/'.str_replace('cover_', 'org_', $cover));
        }
        
        
        // create a phantom query
        $sth = $pdo->prepare('DELETE FROM `regal` WHERE `id` = :id');
        // data binding
        $sth->bindParam(':id', $id);
        // execute the query
        $sth->execute();

        // back to file with table
        header('location: loop.php?page=1');
    } else {
        header('location: loop.php?page=1');
    }

?>