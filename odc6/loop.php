<?php

    require_once('session.php');
    
    function tl($val, $min, $max) {
        //sprawdza czy liczba jest w przedziale
        return ($val >= $min && $val <= $max);
    }
    
    $count = $pdo->query('SELECT COUNT(`id`) as cnt FROM `regal`')->fetch()['cnt'];
    
    $page = isSet($_GET['page']) ? intval($_GET['page'] - 1) : 1;
    
    $limit = 10;
    
    $from = $page * $limit;
    
    $allPage = ceil($count / $limit);

    // echo '<!DOCTYPE html><html><head><meta charset="utf-8"><title>Bazka</title></head><body>';

    $sql = 'SELECT r.*, c.name FROM `regal` r LEFT JOIN `category` c ON r.cat_id = c.id ORDER BY r.id DESC LIMIT '.$from.', '.$limit;
    
    echo 'PAGE: '.$page.'<br>';
    echo 'COUNT: '.$count.'<br>';
    echo 'LIMIT: '.$limit.'<br>';
    echo 'FROM: '.$from.'<br>';
    echo 'ALLPAGE: '.$allPage.'<br>';
    echo 'SQL: '.$sql.'<br>';
    
    $query = $pdo->query($sql);
    
    echo '<p><a href="add.php">Dodaj książkę</a></p>';

    echo '<table border="1">';
    echo '<tr>';

        echo '<th width="100">ID</th>';
        echo '<th width="100">Tytuł książki</th>';
        echo '<th width="100">Autor</th>';
        echo '<th width="100">Kategoria</th>';
        echo '<th width="200">Recenzja</th>';
        echo '<th width="100">Opcje</th>';

    echo '</tr>';

    foreach($query->fetchAll() as $value) {

        echo '<tr>';

            echo '<td>'.$value['id'].'</td>';
            echo '<td>'.$value['tytul'].'</td>';
            echo '<td>'.$value['autor'].'</td>';
            echo '<td>'.$value['name'].'</td>';
            echo '<td>'.$value['recenzja'].'</td>';
            echo '<td><a href="usun.php?id='.$value['id'].'">Usuń</a> | <a href="add.php?id='.$value['id'].'">Edytuj</a></td>';

        echo '</tr>';

    }
    // $query->closeCursor();

    echo '</table>';
    
    if ($page > 5) {
        echo '<a href="loop.php?page=1">Pierwsza</a> | ';
    }
    
    for($i = 1; $i <= $allPage; $i++) {
        
        $bold = ($i == ($page+1)) ? 'style="font-weight:bold"' : '';
        
        if (tl($i, $page-4, $page+5)){
            echo '<a href="loop.php?page='.$i.'"'.$bold.'>'.$i.'</a> | ';
        }
    }
    
     if ($page < $allPage - 1) {
        echo '<a href="loop.php?page='.$allPage.'">Ostatnia</a> |';
    }
    
    echo '</body></html>';
?>