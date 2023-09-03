<!DOCTYPE html>
<html lang="hu" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <title>Képek</title>
</head>
<body>

  <?php include_once("menu.php"); ?>

  <?php
    include_once("./model/kep.php");

    $kepek = Kep::getKepekFelhasznaloAzonositoSzerint($_SESSION['felhasznaloId']);
  
  ?>

  <div class="container">
    <h1 class="text-center mb-5">Képek</h1>

    <div class="row">
      <div class="col-12 col-md-6">
        <?php foreach ($kepek as $value): ?>
            <img src=<?= $value->getEleresiUt()?> alt=<?= $value->getCim()?> width="100px" >
        <?php endforeach ?>
      </div>

      <div class="col-12 col-md-6">
        <form class="mx-auto" action="controller/kep-feltoltes-controller.php" method="POST" enctype="multipart/form-data" style="max-width: 500px" >
          <div class="mb-3">
            <label class="form-label" for="cim">Cím</label>
            <input type="text" name="cim" id="cim" required>
          </div>

          <div class="mb-3">
            <label class="form-label" for="kep">Kép</label>
            <input type="file" name="kep" id="kep" accept="image/png, image/jpeg">
          </div>
          <button class="btn btn-primary" type="submit">Feltőlt</button>
          
        </form>
      </div>
    </div>
    <a href="/huszar-laszlo-webfejleszto-zarovizsga?page=profil">Vissza</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>