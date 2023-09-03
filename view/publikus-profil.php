<!DOCTYPE html>
<html lang="hu" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <title>Publikus Profil</title>
</head>
<body>

  <?php
    include_once("menu.php"); 
    include_once("./model/felhasznalo.php");
    include_once("./model/telefonszam.php");
    include_once("./model/hobbi.php");
    include_once("./model/intezmeny.php");
    include_once("./model/kep.php");

    $felhasznalo = Felhasznalo::getFelhasznalo($_GET['felhasznalo-id']);
    $telefonszamok = Telefonszam::getTelefonszamokFelhasznaloAzonositoSzerint($_GET['felhasznalo-id']);
    $hobbik = Hobbi::getHobbikFelhasznaloAzonositoSzerint($_GET['felhasznalo-id']);
    $intezmenyek = Intezmeny::getIntezmenyekFelhasznaloAzonositoSzerint($_GET['felhasznalo-id']);
    $kepek = Kep::getKepekFelhasznaloAzonositoSzerint($_GET['felhasznalo-id']);
  ?>

  
  <div class="container">
    <h1 class="text-center mb-5">Publikus Profil</h1>

    <div class="row">
        <?php if (isset($kepek[0])) :?>
            <div class="col-md-2">
                <img data-bs-toggle="modal" data-bs-target="#exampleModal" src=<?= $kepek[0]->getEleresiUt()?> alt=<?= $kepek[0]->getCim()?> width="100px" style="cursor: pointer" >
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Képek</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">


                            <div id="carouselExample" class="carousel slide">
                                <div class="carousel-inner">
                                    <?php for ($i = 0; $i < count($kepek); $i++): ?>
                                        <?php if ($i == 0): ?>
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src=<?= $kepek[$i]->getEleresiUt()?> alt=<?= $kepek[$i]->getCim()?>>
                                            </div>
                                        <?php else: ?>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src=<?= $kepek[$i]->getEleresiUt()?> alt=<?= $kepek[$i]->getCim()?>>
                                            </div>
                                        <?php endif ?>
                                    <?php endfor ?>
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>    


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezár</button>
                        </div>
                        </div>
                    </div>
                    </div>
            </div>
        <?php endif ?>
        <div class="col-md-10">
            <h2 class="mb-3"><?=$felhasznalo->getVezetekNev()?> <?=$felhasznalo->getKeresztNev()?></h2>
            <p>
                <span>
                    Született: <?=$felhasznalo->getSzuletesiHely()?>, <?=$felhasznalo->getSzuletesiIdo()?>
                </span>
                <br>
                <span>
                    Állampolgársága: <?=$felhasznalo->getAllampolgarsag()?>
                </span>
                <br>
                <span>
                    Telefonszám:
                </span>
                <ul>
                    <?php foreach ($telefonszamok as $value): ?>
                        <li><?= $value->getTelefonszam() ?></li>
                        <?php endforeach ?>
                </ul>
                <br>
            </p>
        </div>
    </div>

    <h5>Bemutatkozás</h5>
    <p class="mb-5"><?=$felhasznalo->getBemutatkozas()?></p>

    <h5>Hobbik</h5>
    <ul class="mb-5">
        <?php foreach ($hobbik as $value): ?>
            <li><?= $value->getHobbi() ?></li>
        <?php endforeach ?>
    </ul>

    <h5 class="mb-3">Munkahelyi tapasztalatok, iskolai tanulmányok</h5>
    <ul class="list-group" >
        <?php foreach ($intezmenyek as $value): ?>
            <li class="list-group-item">
                <h5><?= $value->getNev() ?></h5>
                <p>
                    <span>
                        Kezdés dátuma: <?= $value->getKezdetiDatum() ?>
                    </span>
                    <br>
                    <span>
                        Befejezés dátuma: <?= $value->getVegDatum() ?>
                    </span>
                </p>
                <p>Munkakör, tanulmányok: <?= $value->getFoglalkozas() ?></p>
            </li>
        <?php endforeach ?>
            </ul>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>