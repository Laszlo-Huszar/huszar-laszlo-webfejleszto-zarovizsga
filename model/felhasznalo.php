<?php

class Felhasznalo 
{
    private $id;
    private $vezetekNev;
    private $keresztNev;
    private $szuletesiHely;
    private $szuletesiIdo;
    private $email;
    private $jelszo;
    private $allampolgarsag;
    // private $bemutatkozas;
    // private $hobbik;
    // private $telefonszamok;
    // private $intezmenyek;
    // private $kepek;

    function __construct($id = -1, $vezetekNev = '', $keresztNev = '', $szuletesiHely = '', $szuletesiIdo = '', $email = '', $jelszo = '', $allampolgarsag = '', $bemutatkozas = '')
    // function __construct($id = -1, $vezetekNev = '', $keresztNev = '', $szuletesiHely = '', $szuletesiIdo = '', $email = '', $jelszo = '', $allampolgarsag = '', $bemutatkozas = '', $hobbik = NULL, $telefonszamok = NULL, $intezmenyek = NULL, $kepek = NULL)
    {
      $this->id = $id;
      $this->vezetekNev = $vezetekNev;
      $this->keresztNev = $keresztNev;
      $this->szuletesiHely = $szuletesiHely;
      $this->szuletesiIdo = $szuletesiIdo;
      $this->email = $email;
      $this->jelszo = $jelszo;

      $this->allampolgarsag = $allampolgarsag;
      $this->bemutatkozas = $bemutatkozas;
      // $this->hobbik = $hobbik;
      // $this->telefonszamok = $telefonszamok;
      // $this->intezmenyek = $intezmenyek;
      // $this->kepek = $kepek;

    }

    function getId()
    {
      return $this->id;
    }

    function getVezetekNev()
    {
      return $this->vezetekNev;
    }

    function getKeresztNev()
    {
      return $this->keresztNev;
    }

    function getSzuletesiHely()
    {
      return $this->szuletesiHely;
    }

    function getSzuletesiIdo()
    {
      return $this->szuletesiIdo;
    }

    function getEmail()
    {
      return $this->email;
    }

    function getJelszo()
    {
      return $this->jelszo;
    }

    function getAllampolgarsag()
    {
      return $this->allampolgarsag;
    }

    function getBemutatkozas()
    {
      return $this->bemutatkozas;
    }


    function setId($id)
    {
      $this->id = $id;
    }


    public static function regisztracio($vezetekNev, $keresztNev, $szuletesiHely, $szuletesiIdo, $email, $jelszo)
    {
      
      $felhasznalo = new Felhasznalo(-1, $vezetekNev, $keresztNev, $szuletesiHely, $szuletesiIdo, $email, $jelszo);
      
      $conn = new mysqli("localhost", "root", "", "huszar_laszlo_20230824");
      $conn->query("INSERT INTO felhasznalok (vezetek_nev, kereszt_nev, szuletesi_hely, szuletesi_ido, email, jelszo) VALUES
      ('{$felhasznalo->getVezetekNev()}', '{$felhasznalo->getKeresztNev()}', '{$felhasznalo->getSzuletesiHely()}', '{$felhasznalo->getSzuletesiIdo()}', '{$felhasznalo->getEmail()}', '{$felhasznalo->getJelszo()}' )");
      $lastId = $conn->insert_id;
      $conn->close();

      $felhasznalo->setId($lastId);
      return $felhasznalo;
    }

    public static function getFelhasznaloEmailJelszo($email, $jelszo)
    {
      $conn = new mysqli("localhost", "root", "", "huszar_laszlo_20230824");
      $res = $conn->query("SELECT * FROM felhasznalok WHERE email = '{$email}' AND jelszo = '{$jelszo}' ");
      $conn->close();
  
      $row = $res->fetch_array(MYSQLI_ASSOC);
      if (!isset($row))
      {
        return NULL;
      }
  
      $felhasznalo = new Felhasznalo($row['id'], '', '', '', '', $row['email']);
      return $felhasznalo;
    }

    public static function getFelhasznalo($id)
    {
      $conn = new mysqli("localhost", "root", "", "huszar_laszlo_20230824");
      $res = $conn->query("SELECT * FROM felhasznalok WHERE id = '{$id}' ");
      $conn->close();
  
      $row = $res->fetch_array(MYSQLI_ASSOC);
      if (!isset($row))
      {
        return NULL;
      }
  
      $felhasznalo = new Felhasznalo($row['id'], $row['vezetek_nev'], $row['kereszt_nev'], $row['szuletesi_hely'], $row['szuletesi_ido'], $row['email'], $row['jelszo'], $row['allampolgarsag'], $row['bemutatkozas']);
      // $felhasznalo = new Felhasznalo($row['id'], $row['vezetek_nev'], $row['kereszt_nev'], $row['szuletesi_hely'], $row['szuletesi_ido'], $row['email'], $row['jelszo'], $row['allampolgarsag'], $row['bemutatkozas'], $row['hobbik'], $row['telefonszamok'], $row['intezmenyek'], $row['kepek']);
      return $felhasznalo;
    }

    public static function felulir($id, $vezetekNev, $keresztNev, $szuletesiHely, $szuletesiIdo, $email, $jelszo, $allampolgarsag, $bemutatkozas)
    {
      
      $felhasznalo = new Felhasznalo($id, $vezetekNev, $keresztNev, $szuletesiHely, $szuletesiIdo, $email, $jelszo, $allampolgarsag, $bemutatkozas);
      
      $conn = new mysqli("localhost", "root", "", "huszar_laszlo_20230824");
      $conn->query("UPDATE felhasznalok SET 
        vezetek_nev = '{$felhasznalo->getVezetekNev()}',
        kereszt_nev = '{$felhasznalo->getKeresztNev()}',
        szuletesi_hely = '{$felhasznalo->getSzuletesiHely()}',
        szuletesi_ido = '{$felhasznalo->getSzuletesiIdo()}',
        email = '{$felhasznalo->getEmail()}',
        jelszo = '{$felhasznalo->getJelszo()}',
        allampolgarsag = '{$felhasznalo->getAllampolgarsag()}',
        bemutatkozas = '{$felhasznalo->getBemutatkozas()}'
        WHERE id = '{$felhasznalo->getId()}'");
      $lastId = $conn->insert_id;
      $conn->close();

      $felhasznalo->setId($lastId);
      return $felhasznalo;
    }

  }