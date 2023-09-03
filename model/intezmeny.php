<?php

class Intezmeny
{
    private $id;
    private $nev;
    private $kezdetiDatum;
    private $vegDatum;
    private $foglalkozas;
    private $felhasznaloId;
    
    public function __construct($id = -1, $nev = '', $kezdetiDatum = '', $vegDatum = '', $foglalkozas = '', $felhasznaloId = -1)
    {
        $this->id = $id;
        $this->nev = $nev;
        $this->kezdetiDatum = $kezdetiDatum;
        $this->vegDatum = $vegDatum;
        $this->foglalkozas = $foglalkozas;
        $this->felhasznaloId = $felhasznaloId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNev()
    {
        return $this->nev;
    }

    public function getKezdetiDatum()
    {
        return $this->kezdetiDatum;
    }

    public function getVegDatum()
    {
        return $this->vegDatum;
    }

    public function getFoglalkozas()
    {
        return $this->foglalkozas;
    }

    public function getFelhasznaloId()
    {
        return $this->felhasznaloId;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public static function mentIntezmeny($nev, $kezdetiDatum, $vegDatum, $foglalkozas, $felhasznaloId)
    {
        $ujIntezmeny = new Intezmeny(-1, $nev, $kezdetiDatum, $vegDatum, $foglalkozas, $felhasznaloId);

        $conn = new mysqli("localhost", "root", "", "huszar_laszlo_20230824");
        $conn->query("INSERT INTO intezmenyek (nev, kezdeti_datum, veg_datum, foglalkozas, felhasznalo_id) VALUES 
            ('{$ujIntezmeny->getNev()}', '{$ujIntezmeny->getKezdetiDatum()}', '{$ujIntezmeny->getVegDatum()}', '{$ujIntezmeny->getFoglalkozas()}', '{$ujIntezmeny->getFelhasznaloId()}' )");
        $lastId = $conn->insert_id;
        $ujIntezmeny->setId($lastId);
        $conn->close();

        return $ujIntezmeny;
    }

    public static function getIntezmenyekFelhasznaloAzonositoSzerint($felhasznaloId)
    {
        $conn = new mysqli("localhost", "root", "", "huszar_laszlo_20230824");
        $res = $conn->query("SELECT * FROM intezmenyek WHERE felhasznalo_id = '{$felhasznaloId}'");
        $conn->close();
    
        $data = [];
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) 
        {
          $intezmeny = new Intezmeny($row["id"], $row["nev"], $row["kezdeti_datum"], $row["veg_datum"], $row["foglalkozas"], $row["felhasznalo_id"]);
          array_push($data, $intezmeny);
        }
        
        return $data;
    }


}