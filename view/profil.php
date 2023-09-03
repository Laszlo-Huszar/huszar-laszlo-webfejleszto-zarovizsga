<!DOCTYPE html>
<html lang="hu" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <title>Felhasználói Profil</title>
</head>
<body>

  <?php
    include_once("menu.php"); 
    include_once("./model/felhasznalo.php");
    include_once("./model/telefonszam.php");
    include_once("./model/hobbi.php");
    include_once("./model/intezmeny.php");
    include_once("./model/kep.php");

    $felhasznalo = Felhasznalo::getFelhasznalo($_SESSION['felhasznaloId']);
  ?>

<div class="container">
    <h1 class="text-center mb-5">Felhasználói Profil</h1>
    <form class="mx-auto" action="controller/profil-mentes-controller.php" method="POST" style="max-width: 500px" >
      <h5>Felhasználói profil azonoító</h5>
      <p class="mb-5"><?=$felhasznalo->getId()?></p>
      <h5 class="mb-3">Alap adatok</h5>
      <div class="ps-3 mb-5">
        <div class="mb-3">
          <label class="form-label" for="vezetek-nev">Vezetéknév</label>
          <input class="form-control" type="text" name="vezetek-nev" id="vezetek-nev" value=<?= $felhasznalo->getVezetekNev() ?>  required>
        </div>
        <div class="mb-3">
          <label class="form-label" for="kereszt-nev">Keresztnév</label>
          <input class="form-control" type="text" name="kereszt-nev" id="kereszt-nev"  value=<?= $felhasznalo->getKeresztNev() ?> required>
        </div>
        <div class="mb-3">
          <label class="form-label" for="szuletesi-hely">Születési hely</label>
          <input class="form-control" type="text" name="szuletesi-hely" id="szuletesi-hely"  value=<?= $felhasznalo->getSzuletesiHely() ?> required>
        </div>
        <div class="mb-3">
          <label class="form-label" for="szuletesi-ido">Születési idő</label>
          <input class="form-control" type="date" name="szuletesi-ido" id="szuletesi-ido"  value=<?= $felhasznalo->getSzuletesiIdo() ?> required>
        </div>
      </div>

      <h5 class="mb-3">Egyéb adatok</h5>
      <div class="ps-3 mb-5">
        <div class="mb-3">
          <label class="form-label" for="allampolgarsag">Állampolgárság</label>
          <input class="form-control" type="text" name="allampolgarsag" id="allampolgarsag" value=<?= $felhasznalo->getAllampolgarsag() ?>>
        </div>
        <div class="mb-3">
          <label class="form-label" for="bemutatkozas">Bemutatkozás</label>
          <textarea class="form-control" name="bemutatkozas" id="bemutatkozas" rows="3"><?= $felhasznalo->getBemutatkozas() ?></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label" for="telefonszamok">Telefonszámok</label>
          <a href="/huszar-laszlo-webfejleszto-zarovizsga?page=telefonszamok">Szerkesztés</a>
          <div class="ms-3">
            <?php foreach (Telefonszam::getTelefonszamokFelhasznaloAzonositoSzerint($_SESSION['felhasznaloId']) as $value): ?>
            <p><?= $value->getTelefonszam() ?></p>
            <?php endforeach ?>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label" for="hobbik">Hobbik</label>
          <a href="/huszar-laszlo-webfejleszto-zarovizsga?page=hobbik">Szerkesztés</a>
          <div class="ms-3">
            <?php foreach (Hobbi::getHobbikFelhasznaloAzonositoSzerint($_SESSION['felhasznaloId']) as $value): ?>
            <p><?= $value->getHobbi() ?></p>
            <?php endforeach ?>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Munkahelyi tapasztalatok, iskolai tanulmányok</label>
          <a href="/huszar-laszlo-webfejleszto-zarovizsga?page=intezmenyek">Szerkesztés</a>
            <?php foreach (Intezmeny::getIntezmenyekFelhasznaloAzonositoSzerint($_SESSION['felhasznaloId']) as $value): ?>
              <ul class="list-group">
                <li class="list-group-item">
                  <h5><?= $value->getNev() ?></h5>
                  <p>Kezdés dátuma: <?= $value->getKezdetiDatum() ?></p>
                  <p>Befejezés dátuma: <?= $value->getVegDatum() ?></p>
                  <p>Munkakör, tanulmányok: <?= $value->getFoglalkozas() ?></p>
                </li>
            </ul>
            <?php endforeach ?>
        </div>

        <div class="mb-3">
          <label class="form-label">Képek</label>
          <?php foreach (Kep::getKepekFelhasznaloAzonositoSzerint($_SESSION['felhasznaloId']) as $value): ?>
            <img src=<?= $value->getEleresiUt()?> alt=<?= $value->getCim()?> width="100px" >
          <?php endforeach ?>

          <a href="/huszar-laszlo-webfejleszto-zarovizsga?page=kepek">Szerkesztés</a>
          <div class="ms-3">
          </div>
        </div>

      </div>

      <h5 class="mb-3">Regisztrációs adatok</h5>
      <div class="ps-3 mb-5">
        <div class="mb-3">
          <label class="form-label" for="email">Email</label>
          <input class="form-control" type="email" name="email" id="email"  value=<?=$felhasznalo->getEmail()?> required>
        </div>
        <div class="mb-3">
          <label class="form-label" for="jelszo">Jelszó</label>
          <input class="form-control"  type="password" name="jelszo" id="jelszo" value=<?=$felhasznalo->getJelszo()?> required>
        </div>
      </div>

      <button class="btn btn-primary" type="submit">Ment</button>
    </form>
  </div>

  <script src="public/profile.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>
