CREATE DATABASE polling;

USE polling;

CREATE TABLE polling_results (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  candidate VARCHAR(30),
  num_votes INT
);

INSERT INTO polling_results VALUES
  (NULL, 'Jan Kowalski', 0),
  (NULL, 'Maria Nowak', 0),
  (NULL, 'Piotr Zielek', 0);

GRANT ALL PRIVILEGES
ON polling.*
TO 'ankieter'@'localhost'
IDENTIFIED BY 'ankieta';
