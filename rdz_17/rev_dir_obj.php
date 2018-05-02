<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Review directories object oriented</title>
  </head>
  <body>
    <h1>Review directories as objects</h1>

    <?php
      $dir = dir('uploads');
      echo "<p>Anchor for directory: ".$dir->handle."</p>";
      echo "<p>Uploads directory: ".$dir->path."</p>";
      echo "<p>Contents of this directory: </p><ul>";

      while (false !== ($file = $dir->read())) {
        // remove . and ..
        if ($file != '.' && $file != '..') {
          echo "<li><a href=\"props_file.php?file=".$file."\">".$file."</a></li>";
        }
      }
      echo "</ul>";
      $dir->close();
    ?>

  </body>
</html>
