<?php
  $page = isset($_GET["page"]) ? $_GET["page"] : "fooldal";

  switch ($page)
  {
    case "fooldal":
    {
      include_once("./view/fooldal.php");
      break;
    }

    case "publikus-profil":
    {
      if (isset($_GET['felhasznalo-id']))
      {
        include_once("./view/publikus-profil.php");
      }
      else
      {
        include_once("./view/publikus-profil-lekeres.php");
      }
      
      break;
    }

    case "publikus-profil-lekeres":
    {
      include_once("./view/publikus-profil.php");
      break;
    }
 
    case "regisztracio":
    {
      include_once("./view/regisztracio.php");
      break;
    }

    case "bejelentkezes":
    {
      include_once("./view/bejelentkezes.php");
      break;
    }

    case "profil":
    {
      include_once("./view/profil.php");
      break;
    }

    case "telefonszamok":
    {
      include_once("./view/telefonszamok.php");
      break;
    }

    case "hobbik":
    {
      include_once("./view/hobbik.php");
      break;
    }

    case "intezmenyek":
    {
      include_once("./view/intezmenyek.php");
      break;
    }

    case "kepek":
    {
      include_once("./view/kepek.php");
      break;
    }
  
  
      
    default:
    {
      include_once("./view/not-found.php");
    }
  }

?>