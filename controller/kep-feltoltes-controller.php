<?php
include_once('../model/kep.php');
session_start();

print_r($_FILES);

$file = 'public/images/' . basename($_FILES['kep']['name']);
move_uploaded_file($_FILES['kep']['tmp_name'], '../' . $file);


Kep::mentKep($file, $_POST['cim'], $_SESSION['felhasznaloId']);





header("Location: /huszar-laszlo-webfejleszto-zarovizsga?page=kepek");
die();
