<?php

include_once("../model/felhasznalo.php");

$felhasznalo = Felhasznalo::getFelhasznaloEmailJelszo($_POST["email"], $_POST["jelszo"]);
print_r($felhasznalo);

if (!isset($felhasznalo))
{
  echo "Hibas email vagy jelszo!";
  echo "<br>";
  echo "<a href='/huszar-laszlo-webfejleszto-zarovizsga?page=bejelentkezes'>Vissza</a>";
  return;
}

session_start();
$_SESSION["felhasznaloEmail"] = $felhasznalo->getEmail();
$_SESSION["felhasznaloId"] = $felhasznalo->getId();

header("Location: /huszar-laszlo-webfejleszto-zarovizsga?page=profil");
die();


