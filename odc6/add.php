<?php
	
    require_once('baza.php');


    if (isSet($_POST['autor'])) {
        $id = isSet($_POST['id']) ? intval($_POST['id']) : 0;
        if ($id > 0) {
            // update row
            $sth = $pdo->prepare('UPDATE `regal` SET `autor`=:autor, `tytul`=:tytul, `cat_id`=:cat_id, `recenzja`=:recenzja WHERE id = :id');
            $sth->bindParam(':id', $_POST['id']);
        } else {
            // create a phantom query
            $sth = $pdo->prepare('INSERT INTO `regal`(`autor`, `tytul`, `cat_id`, `recenzja`) VALUES (:autor, :tytul, :cat_id, :recenzja)');
        }
        // data binding
        $sth->bindParam(':autor', $_POST['autor']);
        $sth->bindParam(':tytul', $_POST['tytul']);
        $sth->bindParam(':cat_id', $_POST['cat_id']);
        $sth->bindParam(':recenzja', $_POST['recenzja']);
        // execute the query
        $sth->execute();

        header('location: loop.php');
    }

    // if $_GET['id'] exist: parse to int; else $id = 0;
    $idGet = isSet($_GET['id']) ? intval($_GET['id']) : 0;

    if ($idGet > 0) {
        // create a phantom query
        $sth = $pdo->prepare('SELECT * FROM `regal` WHERE `id` = :id');
        // data binding
        $sth->bindParam(':id', $idGet);
        // execute the query
        $sth->execute();

        $result = $sth->fetch();
    }

    // create a phantom query
    $sth2 = $pdo->prepare('SELECT * FROM `category` ORDER BY name ASC');
    // data binding
    $sth2->bindParam(':id', $idGet);
    // execute the query
    $sth2->execute();

    $category = $sth2->fetchAll();

?>

<form method="post" action="add.php">

    <?php

        if ($idGet > 0) {
            echo '<input type="hidden" name="id" value="'.$idGet.'">';
        }

    ?>

    Autor: <input type="text" name="autor" <?php if (isSet($result['autor'])) {echo 'value="'.$result['autor'].'"';} ?> ><br><br>
    Tytuł: <input type="text" name="tytul" <?php if (isSet($result['tytul'])) {echo 'value="'.$result['tytul'].'"';} ?> ><br><br>
    Kategoria: <select name="cat_id">
    <?php

        foreach($category as $value) {

            $selected = ($value['id'] == $result['cat_id']) ? 'selected="selected"' : '';
            echo '<option '.$selected.' value="'.$value['id'].'">'.$value['name'].'</option>';
        }

    ?>
    </select><br><br>
    Recenzja: <textarea name="recenzja"><?php if (isSet($result['recenzja'])) {echo $result['recenzja'];} ?></textarea><br><br>
    <input type="submit" value="Zapisz">
</form>

<?php include('footer.php') ?>
