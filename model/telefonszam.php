<?php

class Telefonszam
{
    private $id;
    private $telefonszam;
    private $felhasznaloId;

    public function __construct($id = -1, $telefonszam = '', $felhasznaloId = -1)
    {
        $this->id = $id;
        $this->telefonszam = $telefonszam;
        $this->felhasznaloId = $felhasznaloId;
    }

    public function getTelefonszam()
    {
        return $this->telefonszam;
    }

    public function getFelhasznaloId()
    {
        return $this->felhasznaloId;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public static function mentTelefonszam($telefonszam, $felhasznaloId)
    {
        $ujTelefonszam = new Telefonszam(-1, $telefonszam, $felhasznaloId);

        $conn = new mysqli("localhost", "root", "", "huszar_laszlo_20230824");
        $conn->query("INSERT INTO telefonszamok (telefonszam, felhasznalo_id) VALUES ('{$ujTelefonszam->getTelefonszam()}', '{$ujTelefonszam->getFelhasznaloId()}')");
        $lastId = $conn->insert_id;
        $ujTelefonszam->setId($lastId);
        $conn->close();

        return $ujTelefonszam;
    }

    public static function getTelefonszamokFelhasznaloAzonositoSzerint($felhasznaloId)
    {
        $conn = new mysqli("localhost", "root", "", "huszar_laszlo_20230824");
        $res = $conn->query("SELECT * FROM telefonszamok WHERE felhasznalo_id = '{$felhasznaloId}'");
        $conn->close();
    
        $data = [];
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) 
        {
          $telefonszam = new Telefonszam($row["id"], $row["telefonszam"], $row["felhasznalo_id"]);
          array_push($data, $telefonszam);
        }
        
        return $data;
    }
}