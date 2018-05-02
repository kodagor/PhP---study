CREATE TABLE Klienci
( 	KlientID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	Nazwisko CHAR(50) NOT NULL,
	Adres CHAR(100) NOT NULL,
	Miejscowosc CHAR(30) NOT NULL
);

CREATE TABLE Zamowienia
(	ZamowienieID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	KlientID INT UNSIGNED NOT NULL,
	Wartosc FLOAT(6, 2),
	Data DATE NOT NULL,
	
	FOREIGN KEY (KlientID) REFERENCES Klienci(KlientID)
);

CREATE TABLE Ksiazki
(	ISBN CHAR(13) NOT NULL PRIMARY KEY,
	Autor CHAR(50),
	Tytul CHAR(100),
	Cena FLOAT(4, 3)
);

CREATE TABLE Pozycje_zamowione
(	ZamowienieID INT UNSIGNED NOT NULL,
	ISBN CHAR(13) NOT NULL,
	Ilosc TINYINT UNSIGNED,
	
	PRIMARY KEY(ZamowienieID, ISBN),
	FOREIGN KEY(ZamowienieID) REFERENCES Zamowienia(ZamowienieID),
	FOREIGN KEY(ISBN) REFERENCES Ksiazki(ISBN)
);

CREATE TABLE Recenzje_ksiazek
(	ISBN CHAR(13) NOT NULL PRIMARY KEY,
	Recenzja TEXT,
	
	FOREIGN KEY(ISBN) REFERENCES Ksiazki(ISBN)
);