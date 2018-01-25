<?php
	
    require_once('session.php');


    include('header.php');

    $query = $pdo->query('SELECT * FROM `category`');

    echo '<p><a href="add_cat.php">Dodaj kategorię</a></p>';

    echo '<table border="1">';
    echo '<tr>';

        echo '<th width="100">Nazwa</th>';
        echo '<th width="100">Opcje</th>';

    echo '</tr>';

    foreach($query->fetchAll() as $value) {

        echo '<tr>';

            echo '<td>'.$value['name'].'</td>';
            echo '<td><a href="usun_cat.php?id='.$value['id'].'">Usuń</a> | <a href="add_cat.php?id='.$value['id'].'">Edytuj</a></td>';

        echo '</tr>';

    }
    // $query->closeCursor();

    echo '</table>';
    echo '</body></html>';
?>