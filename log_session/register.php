<?php

  if (isset($_POST['userID']) && isset($_POST['password'])) {
      $userID = $_POST['userID'];
      $password = $_POST['password'];
      $password = sha1($password);

      if (empty($userID) || empty($password)) {
        echo '<p>Empty credentials</p>';
        exit();
      }

      // db connect
      $db_connect = new mysqli('localhost', 'uwierzytel', 'uwierzytel', 'auth');

      if (mysqli_connect_errno()) {
        echo 'Connection error: '.mysqli_connect_error();
        exit();
      }

      $query = "INSERT INTO users VALUES(?, ?)";
      $stmt = $db_connect->prepare($query);
      $stmt->bind_param('ss', $userID, $password);
      $stmt->execute();
      if ($stmt->affected_rows > 0) {
        echo '<p>Welcome in my community!</p>';
      } else {
        echo '<p>There were some errors :(.</p>';
      }

      $db_connect->close();

  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Register page</title>
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
    <h1>Register form</h1>

    <?php

      // tworzenie formularza logowania
      echo '<form method="post" action="register.php">';
      echo '<fieldset>';
      echo '<legend>Register!</legend>';
      echo '<p><label for="user_id">User ID:</label>';
      echo '<input type="text" name="userID" id="user_id" size="30"/></p>';
      echo '<p><label for="pass">Password:</label>';
      echo '<input type="password" name="password" id="pass" size="30"/></p>';
      echo '</fieldset>';
      echo '<button type="submit" name="register">register</button>';

    ?>
  </body>
</html>
