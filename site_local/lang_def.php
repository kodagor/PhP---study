<?php

  if ((!isset($_SESSION['language'])) || (!isset($_GET['language']))) {
    $_SESSION['language'] = "pl";
    $current_lang = "pl";
  } else {
    $current_lang = $_GET['language'];
    $_SESSION['language'] = $current_lang;
  }

  switch ($current_lang) {
    case "en":
      define("CHARACTERS_SET", "ISO-8859-1");
      define("LANG_CODE", "en");
      break;

    case "ja":
      define("CHARACTERS_SET", "UTF-8");
      define("LANG_CODE", "ja");
      break;

    case "pl":
      define("CHARACTERS_SET", "UTF-8");
      define("LANG_CODE", "pl");
      break;

    default:
      define("CHARACTERS_SET", "UTF-8");
      define("LANG_CODE", "pl");
      break;
  }

  header("Content-Type: text/html;charset=".CHARACTERS_SET);
  header("Content-Language: ".LANG_CODE);
?>
