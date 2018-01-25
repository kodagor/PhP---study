<?php

require_once('baza.php');

$autor = 'burnej';
$tytul = 'siła';
$cat_id = random_int(2,9);
$rec = 'nie ma lipy';

$in = $pdo->prepare('INSERT INTO `regal`(`autor`, `tytul`, `cat_id`, `recenzja`) VALUES (:autor, :tytul, :cat_id, :recenzja)');
$in->bindParam(':autor', $autor);
$in->bindParam(':tytul', $tytul);
$in->bindParam(':cat_id', $cat_id, PDO::PARAM_STR);
$in->bindParam(':recenzja', $rec);

for($i = 0; $i < 15; $i++) {
    $in->execute();
}

