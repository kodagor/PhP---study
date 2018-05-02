<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Review directories</title>
  </head>
  <body>
    <h1>Review directories</h1>

    <?php
      $present_dir = 'uploads';
      $dir = opendir($present_dir);   // create anchor

      echo "<p>Contents of uploads dir ".$present_dir.": </p>";
      echo "<ul>";

      while (false != ($file = readdir($dir))) {
        // remove "." and ".."
        if ($file != '.' && $file != '..') {
          echo "<li>$file</li>";
        }
      }
      echo "</li>";
      closedir($dir);
    ?>

  </body>
</html>
