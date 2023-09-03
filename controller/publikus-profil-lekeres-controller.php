<?php

print_r($_POST);

header("Location: /huszar-laszlo-webfejleszto-zarovizsga?page=publikus-profil&felhasznalo-id=" . $_POST['felhasznalo-id']);
die();


