<?php
session_start();
session_unset();
session_destroy();

header("Location: /huszar-laszlo-webfejleszto-zarovizsga?page=fooldal");
die();
