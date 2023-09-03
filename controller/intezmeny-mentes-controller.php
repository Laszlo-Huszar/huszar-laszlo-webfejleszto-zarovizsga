<?php
include_once('../model/intezmeny.php');
session_start();

print_r($_POST);

Intezmeny::mentIntezmeny($_POST['nev'], $_POST['kezdeti-datum'], $_POST['veg-datum'], $_POST['foglalkozas'], $_SESSION['felhasznaloId']);

header("Location: /huszar-laszlo-webfejleszto-zarovizsga?page=intezmenyek");
die();


