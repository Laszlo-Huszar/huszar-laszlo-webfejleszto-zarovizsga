<?php

  include_once("./model/felhasznalo.php");

  session_start();
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="?page=fooldal">Bemutatkozó</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link<?php echo $page === "food-menu" ? " active" : "" ?>" aria-current="page" href="?page=publikus-profil">Publikus Profil</a>
          </li>
        </ul>

        
        <?php if (isset($_SESSION["felhasznaloEmail"])): ?>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $_SESSION["felhasznaloEmail"] ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="?page=profil">Felhasználói profil szerkesztése</a></li>
                <li><a class="dropdown-item" href="/huszar-laszlo-webfejleszto-zarovizsga/controller/kijelentkezes-controller.php">Kilépés</a></li>
              </ul>
            </li>      
          </ul>
        <?php else: ?>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link<?php echo $page === "bejelentkezes" ? " active" : "" ?>" href="?page=bejelentkezes">
                Bejelentkezés
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link<?php echo $page === "regisztracio" ? " active" : "" ?>" href="?page=regisztracio">
                Regisztráció
              </a>
            </li>
          </ul>
        <?php endif ?>

      </div>
    </div>
</nav>
