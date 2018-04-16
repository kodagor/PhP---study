<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rezultaty wyszkiwania księgarni</title>
  </head>
  <body>
    <h1>Rezultaty wyszukiwania</h1>
    <?php
    
      // utworzenie krótkich nazw zmiennych
      $metoda_szukania = $_POST['metoda_szukania'];
      $wyrazenie = trim($_POST['wyrazenie']);
      $wyrazenie = "%{$wyrazenie}%";
      
      echo "$wyrazenie";
      
      if (!$metoda_szukania || !$wyrazenie) {
        echo '<p>Brak parametrów do wyszukania<br>
              <a href="szukaj.html">Wróć</a> do poprzedniej strony i spróbuj ponownie</p>';
        exit;
      }
      
      // określenie typu wyszukiwania (pochodzącej z elementu <select> formularza
      switch($metoda_szukania) {
        case 'Tytul':
        case 'Autor':
        case 'ISBN':
          break;
        default:
          echo '<p>Nieprawidłowy typ szukania<br>
                <a href="szukaj.html">Wróć</a> i spróbuj ponownie.</p>';
          exit;
      }
      
      // konfiguracja połączenia z bazą danych przy użyciu PDO
      $user = 'dagor666';
      $pass = 'zaq1@WSX';
      $host = 'localhost';
      $baza = 'book_shop';
      
      // konfiguracja DSN
      $dsn = "mysql:host=$host;dbname=$baza";
      
      // nzawiązanie połączenia z bazą danych
      try {
        $db = new PDO($dsn, $user, $pass);
        
        // wykonanie zapytania
        $zapytanie = "SELECT ISBN, Autor, Tytul, Cena FROM Ksiazki WHERE $metoda_szukania LIKE :szukanewyrazenie";
        
        $polecenie = $db->prepare($zapytanie);
        $polecenie->bindParam(':szukanewyrazenie', $wyrazenie);
        $polecenie->execute();
        
        // pobranie liczby zwróconych rekordów
        echo '<p>Liczba znalezionych rekorów: '.$polecenie->rowCount().'</p>';
        
        // wyświetlenie każdego pobranego rekordu
        while ($wynik = $polecenie->fetch(PDO::FETCH_OBJ)) {
          echo "<p><strong>Tytuł: ".$wynik->Tytul."</strong><br>";
          echo "Autor: ".$wynik->Autor."<br>";
          echo "ISBN: ".$wynik->ISBN."<br>";
          echo "Cena: ".number_format($wynik->Cena, 2)."</p>";
        }
        
        // zakończenie połączenia z bazą danych
        $db = NULL;
      
      } catch (PDOException $e) {
        echo "Błąd: ".$e->getMessage();
        exit;
      }

    ?>
  </body>
</html>
