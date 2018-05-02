<?php

  // working on UJNIX/Linux

  chdir('uploads/');

  // exec
  echo '<h1>exec() function </h1>';
  echo '<pre>';

  exec('ls -la', $result);

  foreach ($result as $row) {
    echo $row.PHP_EOL;
  }

  echo '</pre>';
  echo '<hr>';

  // passthru version:
  echo '<h1>Using passthru() function: </h1>';
  echo '<pre>';

  passthru('ls -la');

  echo '</pre>';
  echo '<hr>';

  // system version:
  echo '<h1>Using system() function: </h1>';
  echo '<pre>';

  $result = system('ls -la');

  echo '</pre>';
  echo '<hr>';

  // back quotes:
  echo '<h1>Using back quotes: </h1>';
  echo '<pre>';

  $result = `ls -la`;

  echo $result;
  echo'<pre>';

?>
