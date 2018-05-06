<?php

  session_start();

  // check if user "was" logged
  $old_user = $_SESSION['correct_user'];
  unset($_SESSION['correct_user']);
  session_destroy();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="=utf-8">
    <title>Logout</title>
  </head>
  <body>
    <h1>Logout</h1>
    <?php

      if (!empty($old_user)) {
        echo '<p>Logout successful</p>';
      } else {
        // if not logged, but gained access to site somehow
        echo '<p>User not logged, no logout</p>';
      }

    ?>
    <p><a href="main_auth.php">Return to main site</a></p>
  </body>
</html>
