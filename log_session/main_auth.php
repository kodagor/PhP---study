<?php

  session_start();

  if (isset($_POST['userID']) && isset($_POST['password'])) {
    // user is trying to log in
    $userID = $_POST['userID'];
    $password = $_POST['password'];

    $db_connect = new mysqli('localhost', 'uwierzytel', 'uwierzytel', 'auth');

    if (mysqli_connect_errno()) {
      echo 'Connection error: '.mysqli_connect_error();
      exit();
    }

    $query = "SELECT * FROM users WHERE userID='".$userID."' AND password=sha1('".$password."')";

    $result = $db_connect->query($query);
    if ($result->num_rows) {
      // if credentials in db -> register user sid
      $_SESSION['correct_user'] = $userID;
    }
    $db_connect->close();
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login page</title>
    <style type="text/css">
      fieldset {
        width: 50%;
        border: 2px solid #ff0000;
      }
      legend {
        font-weight: bold;
        font-size: 125%;
      }
      label {
        width: 125px;
        float: left;
        text-align: left;
        font-weight: bold;
      }
      input {
        border: 1px solid #000;
        padding: 3px;
      }
      button {
        margin-top: 12px;
      }
    </style>
  </head>
  <body>
    <h1>Main site</h1>
    <?php
      if (isset($_SESSION['correct_user'])) {
        echo '<p>Users logged as: '.$_SESSION['correct_user'].'<br>';
        echo '<a href="logout.php">Logout</a></p>';
      }
      else {
        if (isset($userID)) {
           // faulty login
           echo '<p>No option to log in ;/</p>';
        }
        else {
          // no login try
          echo '<p>User not logged in</p>';
        }

        // tworzenie formularza logowania
        echo '<form method="post" action="main_auth.php">';
        echo '<fieldset>';
        echo '<legend>Register!</legend>';
        echo '<p><label for="user_id">User ID:</label>';
        echo '<input type="text" name="userID" id="user_id" size="30"/></p>';
        echo '<p><label for="pass">Password:</label>';
        echo '<input type="password" name="password" id="pass" size="30"/></p>';
        echo '</fieldset>';
        echo '<button type="submit" name="login">Login</button>';
      }
    ?>
    <p>
      <a href="users_only.php">Only for logged users</a>
    </p>
  </body>
</html>
