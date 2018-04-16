<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rezultat wstawienia nowej książki</title>
  </head>
  <body>
    <h1>Rezultat wstawienia nowej książki</h1>
    
    <?php
    
      // 1. Sprawdzenie, czy wszystkie pola są wypełnione
      if (!isset($_POST['isbn']) || !isset($_POST['autor']) || !isset($_POST['tytul']) || !isset($_POST['cena'])) {
        echo '<p>Nie wypełniono wszystkich pól!<br>
              <a href="nowa_ksiazka.html">Wróć</a> na poprzędnia stronę i spróbuj jeszcze raz.</p>';
        exit;
      }
      
      // utworzenie krótkich nazw zmiennych
      $isbn = $_POST['isbn'];
      $autor = $_POST['autor'];
      $tytul = $_POST['tytul'];
      $cena = $_POST['cena'];
      $cena = doubleval($cena);     // czy wartość ceny jest zmiennoprzecinkowa
      
      // 2. Ustawienie połączenia z bazą
      @$db = new mysqli('localhost', 'dagor666', 'zaq1@WSX', 'book_shop');
      
      if (mysqli_connect_errno()) {
        echo '<p>Błąd: Połączenie z bazą danych nie powiodło się.<br>Spróbuj później.</p>';
        exit;
      }
      
      // ustawienie zapytania
      $query = "INSERT INTO Ksiazki VALUES (?, ?, ?, ?)";
      
      // utworzenie szablonu
      $polecenie = $db->prepare($query);
      
      // dowiązanie zmiennych do zapytania
      $polecenie->bind_param('sssd', $isbn, $autor, $tytul, $cena);
      
      // wykonanie polecenia
      $polecenie->execute();
      
      if ($polecenie->affected_rows > 0) {
        echo '<p>Książka została zapisana w bazie danych.</p>';
      } else {
        echo '<p>Wystąpił błąd.<br>Książka nie została dodana do bazy.</p>';
      }
      
      // zakończenie połączenia
      $db->close();
      
    ?>
    
  </body>
</html>
