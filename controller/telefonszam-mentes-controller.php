<?php
include_once('../model/telefonszam.php');
session_start();

Telefonszam::mentTelefonszam($_POST['telefonszam'], $_SESSION['felhasznaloId']);

header("Location: /huszar-laszlo-webfejleszto-zarovizsga?page=telefonszamok");
die();


