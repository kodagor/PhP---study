<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>FIle properties</title>
  </head>
  <body>

    <?php

      if (!isset($_GET['file'])) {
        echo "No filename attached";
      } else {
        $present_dir = 'uploads/';
        $file = basename($_GET['file']);    // remove info about directory for safety
        $safe_file = $present_dir.$file;

        echo "<h1>Properties of: ".$file." </h1>";

        echo "<h2>Properties: </h2>";
        echo "<p>Last time opened: ".date('j F Y H:i', fileatime($safe_file))."<br>";
        echo "Last time modified: ".date('j F Y H:i', filemtime($safe_file))."<br>";

        $user = posix_getpwuid(fileowner($safe_file));
        echo "File owner: ".$user['name']."<br>";

        $group = posix_getgrgid(filegroup($safe_file));
        echo "File group: ".$group['name']."<br>";

        echo "File privileges: ".decoct(fileperms($safe_file))."<br>";
        echo "File type: ".filetype($safe_file)."<br>";
        echo "File size: ".filesize($safe_file)."<br>";

        echo "<h2>File tests</h2>";
        echo "is_dir: ".(is_dir($safe_file)? "yes" : "no")."<br>";
        echo "is_executable: ".(is_executable($safe_file) ? "yes" : "no")."<br>";
        echo "is_file: ".(is_file($safe_file) ? "yes" : "no")."<br>";
        echo "is_link: ".(is_link($safe_file) ? "yes" : "no")."<br>";
        echo "is_readable: ".(is_readable($safe_file) ? "yes" : "no")."<br>";
        echo "is_writable: ".(is_writable($safe_file) ? "yes" : "no")."<br>";

      }

    ?>

  </body>
</html>
