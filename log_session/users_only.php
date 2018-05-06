<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>For users only</title>
  </head>
  <body>
    <h1>For users only</h1>

    <?php

      // checking session variable
      if (isset($_SESSION['correct_user'])) {
        echo '<p>User logged as: '.$_SESSION['correct_user'].'.</p>';
        echo '<p>This site is visible only for logged users.</p>';
      } else {
        echo '<p>User not logged.</p>';
        echo '<p>Only logged users can see this page</p>';
      }

    ?>

    <p><a href="main_auth.php">Return to main site</a></p>

  </body>
</html>
