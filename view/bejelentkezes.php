<!DOCTYPE html>
<html lang="hu" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <title>Bejelentkezés</title>
</head>
<body>

  <?php include_once("menu.php"); ?>

  <div class="container">
    <h1 class="text-center mb-5">Bejelentkezés</h1>

    <form class="mx-auto" action="controller/bejelentkezes-controller.php" method="POST" style="max-width: 500px" >
      <div class="mb-3">
        <label class="form-label" for="email">Email</label>
        <input class="form-control" type="email" name="email" id="email">
      </div>
      <div class="mb-3">
        <label class="form-label" for="jelszo">Jelszó</label>
        <input class="form-control"  type="password" name="jelszo" id="jelszo">
      </div>
      <button class="btn btn-primary" type="submit">Bejelentkezés</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>