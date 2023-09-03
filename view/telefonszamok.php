<!DOCTYPE html>
<html lang="hu" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <title>Telefonszámok</title>
</head>
<body>

  <?php include_once("menu.php"); ?>

  <?php
    include_once("./model/telefonszam.php");

    $telefonszamok = Telefonszam::getTelefonszamokFelhasznaloAzonositoSzerint($_SESSION['felhasznaloId']);
    // print_r($telefonszamok);
  
  ?>

  <div class="container">
    <h1 class="text-center mb-5">Telefonszámok</h1>

    <div class="row">
      <div class="col-12 col-md-6">
        <?php foreach ($telefonszamok as $value): ?>
          <p><?= $value->getTelefonszam() ?></p>
        <?php endforeach ?>
      </div>
      <div class="col-12 col-md-6">
        <form class="mx-auto" action="controller/telefonszam-mentes-controller.php" method="POST" style="max-width: 500px" >
          <div class="mb-3">
            <label class="form-label" for="telefonszam">Telefonszám</label>
            <input class="form-control" type="text" name="telefonszam" id="telefonszam">
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