DROP DATABASE IF EXISTS huszar_laszlo_20230824;

CREATE DATABASE huszar_laszlo_20230824;

USE huszar_laszlo_20230824;

CREATE TABLE felhasznalok (
  id INT PRIMARY KEY AUTO_INCREMENT,
  email VARCHAR(50) NOT NULL,
  jelszo VARCHAR(50) NOT NULL,
  vezetek_nev VARCHAR(50) NOT NULL,
  kereszt_nev VARCHAR(50) NOT NULL,
  szuletesi_hely VARCHAR(50) NOT NULL,
  szuletesi_ido DATE NOT NULL,
  allampolgarsag VARCHAR(50),
  bemutatkozas TEXT
);

CREATE TABLE hobbik (
    id INT PRIMARY KEY AUTO_INCREMENT,
    hobbi VARCHAR(100) NOT NULL,
    felhasznalo_id INT NOT NULL
);

CREATE TABLE telefonszamok (
    id INT PRIMARY KEY AUTO_INCREMENT,
    telefonszam VARCHAR(50) NOT NULL,
    felhasznalo_id INT NOT NULL
);

CREATE TABLE intezmenyek (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nev VARCHAR(100) NOT NULL,
    kezdeti_datum DATE NOT NULL,
    veg_datum DATE NOT NULL,
    foglalkozas VARCHAR(100) NOT NULL,
    felhasznalo_id INT NOT NULL
);

CREATE TABLE kepek (
    id INT PRIMARY KEY AUTO_INCREMENT,
    eleresi_ut VARCHAR(300) NOT NULL,
    cim VARCHAR(100) NOT NULL,
    fo_profil_kep BOOLEAN,
    felhasznalo_id INT NOT NULL
);


INSERT INTO hobbik (hobbi, felhasznalo_id) VALUES
  ('Kerékpározás', 1),
  ('Foci', 1),
  ('Kertészkedés', 1);

INSERT INTO telefonszamok (telefonszam, felhasznalo_id) VALUES
  ('+3630303030', 1),
  ('+3670707070', 1);

INSERT INTO intezmenyek (nev, kezdeti_datum, veg_datum, foglalkozas, felhasznalo_id) VALUES
  ('Iskola 1', '1999-09-01', '2003-06-24', 'Szakközép iskola', 1),
  ('Iroda kft.', '2010-04-20', '2005-01-11', 'Programozó', 1);

INSERT INTO felhasznalok (email, jelszo, vezetek_nev, kereszt_nev, szuletesi_hely, szuletesi_ido, allampolgarsag, bemutatkozas) VALUES
  ('kiss.erika@example.com', '123', 'Kiss', 'Erika', 'Budapest', '1985-05-05', 'Magyar', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.');

INSERT INTO kepek (eleresi_ut, cim, fo_profil_kep, felhasznalo_id) VALUES
  ('public/images/christina-01.jpg', 'Profil 1', true, 1),
  ('public/images/christina-02.jpg', 'Profil 1', true, 1);
