<?php

  function def_strings() {
    switch ($_SESSION['language']) {
      case "en":
        define("WELCOME_TXT", "Welcome!");
        define("CHOOSE_TXT", "Choose Language");
        break;

      case "ja":
        define("WELCOME_TXT", "ようこそ!");
        define("CHOOSE_TXT", "言語を選択");
        break;

      case "pl":
        define("WELCOME_TXT", "Witamy!");
        define("CHOOSE_TXT", "Wybierz język");
        break;

      default:
        define("WELCOME_TXT", "Witamy!");
        define("CHOOSE_TXT", "Wybierz język");
        break;      
    }
  }

?>
