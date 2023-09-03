<!DOCTYPE html>
<html lang="hu" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <title>Regisztráció</title>
</head>
<body>

  <?php include_once("menu.php"); ?>

  
  <div class="container">
    <h1 class="text-center mb-5">Regisztráció</h1>
    <form class="mx-auto" action="controller/regisztracio-controller.php" method="POST" style="max-width: 500px" >
      <h5 class="mb-3">Alap adatok</h5>
      <div class="ps-3 mb-5">
        <div class="mb-3">
          <label class="form-label" for="vezetek-nev">Vezetéknév</label>
          <input class="form-control" type="text" name="vezetek-nev" id="vezetek-nev" required>
        </div>
        <div class="mb-3">
          <label class="form-label" for="kereszt-nev">Keresztnév</label>
          <input class="form-control" type="text" name="kereszt-nev" id="kereszt-nev" required>
        </div>
        <div class="mb-3">
          <label class="form-label" for="szuletesi-hely">Születési hely</label>
          <input class="form-control" type="text" name="szuletesi-hely" id="szuletesi-hely" required>
        </div>
        <div class="mb-3">
          <label class="form-label" for="szuletesi-ido">Születési idő</label>
          <input class="form-control" type="date" name="szuletesi-ido" id="szuletesi-ido" required>
        </div>
      </div>

      <h5 class="mb-3">Regisztrációs adatok</h5>
      <div class="ps-3 mb-5">
        <div class="mb-3">
          <label class="form-label" for="email">Email</label>
          <input class="form-control" type="email" name="email" id="email" required>
        </div>
        <div class="mb-3">
          <label class="form-label" for="jelszo">Jelszó</label>
          <input class="form-control"  type="password" name="jelszo" id="jelszo" required>
        </div>
      </div>

      <button class="btn btn-primary" type="submit">Regisztrál</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>