<?php

  session_start();
  include 'lang_def.php';
  include 'lang_strings.php';
  def_strings();

?>

<!DOCTYPE html>
<html lang="<?php echo LANG_CODE; ?>">
  <head>
    <meta charset="<?php echo CHARACTERS_SET; ?>">
    <title><?php echo WELCOME_TXT; ?></title>
  </head>
  <body>
    <h1><?php echo WELCOME_TXT; ?></h1>
    <h2><?php echo CHOOSE_TXT; ?></h2>
    <ul>
      <li><a href="<?php echo $_SERVER['PHP_SELF']."?language=pl"; ?>">pl</a></li>
      <li><a href="<?php echo $_SERVER['PHP_SELF']."?language=en"; ?>">en</a></li>
      <li><a href="<?php echo $_SERVER['PHP_SELF']."?language=ja"; ?>">ja</a></li>
    </ul>
  </body>
</html>
