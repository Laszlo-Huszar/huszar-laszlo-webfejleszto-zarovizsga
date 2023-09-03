<?php

include_once("../model/felhasznalo.php");
session_start();

print_r($_POST);

echo '<br>';

Felhasznalo::felulir($_SESSION['felhasznaloId'], $_POST['vezetek-nev'], $_POST['kereszt-nev'], $_POST['szuletesi-hely'], $_POST['szuletesi-ido'], $_POST['email'], $_POST['jelszo'], $_POST['allampolgarsag'], $_POST['bemutatkozas']);

$_SESSION['felhasznaloEmail'] = $_POST['email'];

header("Location: /huszar-laszlo-webfejleszto-zarovizsga?page=publikus-profil&felhasznalo-id=" . $_SESSION['felhasznaloId']);
die();


