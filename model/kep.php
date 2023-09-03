<?php

class Kep
{
    private $id;
    private $eleresiUt;
    private $cim;
    private $foProfilKep;
    private $felhasznaloId;

    public function __construct($id = -1, $eleresiUt = '', $cim = '', $foProfilKep = false, $felhasznaloId = -1)
    {
        $this->id = $id;
        $this->eleresiUt = $eleresiUt;
        $this->cim = $cim;
        $this->foProfilKep = $foProfilKep;
        $this->felhasznaloId = $felhasznaloId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEleresiUt()
    {
        return $this->eleresiUt;
    }

    public function getCim()
    {
        return $this->cim;
    }

    public function getFoProfilKep()
    {
        return $this->foProfilKep;
    }

    public function getFelhasznaloId()
    {
        return $this->felhasznaloId;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public static function mentKep($eleresiUt, $cim, $felhasznaloId)
    {
        $ujKep = new Kep(-1, $eleresiUt, $cim, false, $felhasznaloId);

        $conn = new mysqli("localhost", "root", "", "huszar_laszlo_20230824");
        $conn->query("INSERT INTO kepek (eleresi_ut, cim, fo_profil_kep, felhasznalo_id) VALUES ('{$ujKep->getEleresiUt()}', '{$ujKep->getCim()}', '{$ujKep->getFoProfilKep()}', '{$ujKep->getFelhasznaloId()}' )");
        $lastId = $conn->insert_id;
        $ujKep->setId($lastId);
        $conn->close();

        return $ujKep;
    }

    public static function getKepekFelhasznaloAzonositoSzerint($felhasznaloId)
    {
        $conn = new mysqli("localhost", "root", "", "huszar_laszlo_20230824");
        $res = $conn->query("SELECT * FROM kepek WHERE felhasznalo_id = '{$felhasznaloId}'");
        $conn->close();
    
        $data = [];
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) 
        {
          $kep = new Kep($row["id"], $row["eleresi_ut"], $row["cim"], $row["fo_profil_kep"], $row["felhasznalo_id"]);
          array_push($data, $kep);
        }
        
        return $data;
    }




}