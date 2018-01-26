<?php

    include('baza.php');

    session_start();

    if (isSet($_POST['login'])) {

        $login = $_POST['login'];
        $pass = $_POST['pass'];

        $sth = $pdo->prepare('SELECT * FROM `users` WHERE `login` = :login AND `pass` = :pass');
        $sth->bindParam(':login', $login, PDO::PARAM_STR);
        $sth->bindParam(':pass', $pass, PDO::PARAM_STR);

        $sth->execute();

        $result = $sth->fetch();

        if ($result && isSet($result['id'])) {
            $_SESSION['logged'] = true;
            $_SESSION['userLogin'] = $result['login'];
            header('location: loop.php?page=1');
        }
    }

    if (!isSet($_SESSION['logged']) || $_SESSION['logged'] == false) {
		
?>

<form action="session.php" method="post">
    Login: <br>
    <input type="text" name="login"><br><br>
    Password: <br>
    <input type="password" name="pass"><br><br>
    <input type="submit" value="Log in">
</form>

<?php
        die;
    }

    include('footer.php');
?>