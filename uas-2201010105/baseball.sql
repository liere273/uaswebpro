CREATE DATABASE baseball;
USE baseball;

CREATE TABLE players (
    id INT AUTO_INCREMENT PRIMARY KEY,
    NAME VARCHAR(255) NOT NULL,
    team VARCHAR(255) NOT NULL,
    POSITION VARCHAR(255) NOT NULL
);

CREATE TABLE teams (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nama_team VARCHAR(100) NOT NULL
);

INSERT INTO teams (nama_team) VALUES
('Sanur Rizer'),
('Redsox Denpasar'),
('Softball Denpasar'),
('pra-PON'),
('SouthWest Riverside');


);


CREATE TABLE jadwal (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  tanggal DATE NOT NULL,
  waktu TIME NOT NULL,
  tempat VARCHAR(255) NOT NULL,
  team_home VARCHAR(255) NOT NULL,
  team_away VARCHAR(255) NOT NULL
);


