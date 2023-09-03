<!DOCTYPE html>
<html lang="hu" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <title>Munka tapasztalatok, iskolai tanulmányok</title>
</head>
<body>

  <?php include_once("menu.php"); ?>

  <?php
    include_once("./model/intezmeny.php");
    $intezmenyek = Intezmeny::getIntezmenyekFelhasznaloAzonositoSzerint($_SESSION['felhasznaloId']);

  
  ?>

  <div class="container">
    <h1 class="text-center mb-5">Munka tapasztalatok, iskolai tanulmányok</h1>

    <div class="row">
        <div class="col-12 col-md-6 list-group">
            <h4 class="mb-5">Felvett munkahelyek, tanulmányok</h4>
            <ul class="list-group" >
                <?php foreach ($intezmenyek as $value): ?>
                    <li class="list-group-item">
                        <h5><?= $value->getNev() ?></h5>
                        <p>Kezdés dátuma: <?= $value->getKezdetiDatum() ?></p>
                        <p>Befejezés dátuma: <?= $value->getVegDatum() ?></p>
                        <p>Munkakör, tanulmányok: <?= $value->getFoglalkozas() ?></p>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>

      <div class="col-12 col-md-6">
        <h4 class="mb-5">Új munkahelyi tapasztalat vagy tanulmány felvétele</h4>
        <form class="mx-auto" action="controller/intezmeny-mentes-controller.php" method="POST" style="max-width: 500px" >
          <div class="mb-3">
            <label class="form-label" for="nev">Munkahely vagy iskola neve</label>
            <input class="form-control" type="text" name="nev" id="nev">
          </div>
          <div class="mb-3">
            <label class="form-label" for="kezdeti-datum">Kezdés dátuma</label>
            <input class="form-control" type="date" name="kezdeti-datum" id="kezdeti-datum">
          </div>
          <div class="mb-3">
            <label class="form-label" for="veg-datum">Befejezés dátuma</label>
            <input class="form-control" type="date" name="veg-datum" id="veg-datum">
          </div>
          <div class="mb-3">
            <label class="form-label" for="foglalkozas">Munkakör vagy tanulmányok megnevezése</label>
            <textarea class="form-control" name="foglalkozas" id="foglalkozas" rows="3"></textarea>
          </div>
          <button class="btn btn-primary" type="submit">Hozzáad</button>
        </form>
      </div>
    </div>
    <a href="/huszar-laszlo-webfejleszto-zarovizsga?page=profil">Vissza</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>