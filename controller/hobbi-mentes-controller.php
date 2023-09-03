<?php
include_once('../model/hobbi.php');
session_start();

print_r($_POST);

Hobbi::mentHobbi($_POST['hobbi'], $_SESSION['felhasznaloId']);

header("Location: /huszar-laszlo-webfejleszto-zarovizsga?page=hobbik");
die();


