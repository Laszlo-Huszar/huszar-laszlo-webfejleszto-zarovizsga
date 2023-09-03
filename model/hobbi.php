<?php

class Hobbi
{
    private $id;
    private $hobbi;
    private $felhasznaloId;

    public function __construct($id = -1, $hobbi = '', $felhasznaloId = -1)
    {
        $this->id = $id;
        $this->hobbi = $hobbi;
        $this->felhasznaloId = $felhasznaloId;
    }

    public function getHobbi()
    {
        return $this->hobbi;
    }

    public function getFelhasznaloId()
    {
        return $this->felhasznaloId;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public static function mentHobbi($hobbi, $felhasznaloId)
    {
        $ujHobbi = new Hobbi(-1, $hobbi, $felhasznaloId);

        $conn = new mysqli("localhost", "root", "", "huszar_laszlo_20230824");
        $conn->query("INSERT INTO hobbik (hobbi, felhasznalo_id) VALUES ('{$ujHobbi->getHobbi()}', '{$ujHobbi->getFelhasznaloId()}')");
        $lastId = $conn->insert_id;
        $ujHobbi->setId($lastId);
        $conn->close();

        return $ujHobbi;
    }

    public static function getHobbikFelhasznaloAzonositoSzerint($felhasznaloId)
    {
        $conn = new mysqli("localhost", "root", "", "huszar_laszlo_20230824");
        $res = $conn->query("SELECT * FROM hobbik WHERE felhasznalo_id = '{$felhasznaloId}'");
        $conn->close();
    
        $data = [];
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) 
        {
          $hobbi = new Hobbi($row["id"], $row["hobbi"], $row["felhasznalo_id"]);
          array_push($data, $hobbi);
        }
        
        return $data;
    }
}