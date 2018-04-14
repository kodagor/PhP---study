INSERT INTO Klienci VALUES
(1, 'Julia Kowalska', 'Wierzbowa 25', 'Warszawa'),
(2, 'Adam Pawlak', 'Szeroka 1/47', 'Szczecin'),
(3, 'Michalina Nowak', 'Zachodnia 357', 'Gliwice');

INSERT INTO Zamowienia VALUES
(NULL, 3, 69.98, '2007-04-02'),
(NULL, 1, 12.99, '2007-04-15'),
(NULL, 2, 74.00, '2007-04-19'),
(NULL, 3, 6.99, '2007-05-01');

INSERT INTO Ksiazki VALUES
('0-672-31697-8', 'Michael Morgan', 'Java 2 dla profesjonalistow', 34.99),
('0-672-31745-1', 'Thomas Down', 'Instalacja Debian GNU/Linux', 24.99),
('0-672-31509-2', 'Lucas Pruitt', 'Poznaj GIMP w 24 godziny', 24.99),
('0-672-31769-9', 'Thomas Schenk', 'Caldera OpenLinux ujarzmiony', 49.99);

INSERT INTO Pozycje_zamowione VALUES
(1, '0-672-31697-8', 2),
(2, '0-672-31769-9', 1),
(3, '0-672-31769-9', 1),
(3, '0-672-31509-2', 1),
(4, '0-672-31745-1', 3);

INSERT INTO Recenzje_ksiazek VALUES
('0-672-31697-8', 'Pozycja ta znacznie szerzej i bradziej zrozumiale niz inne przedstawia tajniki jezyka Java');
