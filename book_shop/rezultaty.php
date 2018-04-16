<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rezultaty wyszkiwania księgarni</title>
  </head>
  <body>
    <h1>Rezultaty wyszukiwania</h1>
    <?php
      // utworzenie krótkich nazw zmienncyh
      $metoda_szukania = $_POST['metoda_szukania'];
      $wyrazenie = trim($_POST['wyrazenie']);
      
      // upewnienie się, czy pola są wypełnione
      if (!$metoda_szukania || !$wyrazenie) {
        echo '<p>Brak parametrów do wyszukania<br>
              <a href="szukaj.html">Wróć</a> do poprzedniej strony i spróbuj ponownie</p>';
        exit;
      }
      
      // określenie typu wyszukiwania (pochodzącej z elementu <select> formularza
      switch($metoda_szukania) {
        case 'tytul':
        case 'autor':
        case 'isbn':
          break;
        default:
          echo '<p>Nieprawidłowy typ szukania<br>
                <a href="szukaj.html">Wróć</a> i spróbuj ponownie.</p>';
          exit;
      }
      
      // połączenie z bazą
      @$db = new mysqli('localhost', 'dagor666', 'zaq1@WSX', 'book_shop');
      if (mysqli_connect_errno()) {
        echo '<p>Błąd: połączenie z bazą nie powiodło się. Spróbuj później.</p>';
        exit;
      }
      
      // ustawienie zapytania
      $zapytanie = "SELECT ISBN, Autor, Tytul, Cena FROM Ksiazki WHERE $metoda_szukania = ?";
      
      // utworzemie szablonu zapytania
      $polecenie = $db->prepare($zapytanie);
      
      // wstawienie wartości 'string' w miejsce '?' 
      $polecenie->bind_param('s', $wyrazenie);
      
      // wykonanie zapytania
      $polecenie->execute();
      
      // przechowanie wyników w buforze
      $polecenie->store_result();
      
      // dowiązanie zmiennych do kolumn
      $polecenie->bind_result($isbn, $autor, $tytul, $cena);
      
      // prezentacja wyników
      echo "<p>Liczba znalezionych rekordów: ".$polecenie->num_rows()."</p>";
      
      // pobieranie kolejnego wiersza wyników i zapisanie jego wartości w powiązanych zmiennych
      while ($polecenie->fetch()) {
        echo "<p><strong>Tytuł: ".$tytul."</strong><br>";
        echo "Autor: ".$autor."<br>";
        echo "ISBN: ".$isbn."<br>";
        echo "Cena: ".number_format($cena, 2)."</p>";
      }
      
      // zwolnienie wyników i zakończenie połączenia z bazą
      $polecenie->free_result();
      $db->close();      
      
    ?>
  </body>
</html>
