<?php

include_once("../model/felhasznalo.php");

$felhasznalo = Felhasznalo::regisztracio($_POST['vezetek-nev'], $_POST['kereszt-nev'], $_POST['szuletesi-hely'], $_POST['szuletesi-ido'], $_POST['email'], $_POST['jelszo']);
// print_r($felhasznalo);

session_start();
$_SESSION["felhasznaloEmail"] = $felhasznalo->getEmail();
$_SESSION["felhasznaloId"] = $felhasznalo->getId();

header("Location: /huszar-laszlo-webfejleszto-zarovizsga?page=profil");
die();