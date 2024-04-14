<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SWS Simplon</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="<?= HOME_URL ?>assets/scripts/script.js" type="module"></script>
  <script src="<?= HOME_URL ?>assets/scripts/dashboard.js" type="module"></script>
  <script src="<?= HOME_URL ?>assets/scripts/utilisateur.js" type="module"></script>



</head>

<body>

    <?php if (isset($_SESSION['connecté'])) { ?>
      <nav class="navbar navbar-expand-lg bg-body-tertiary bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">SIMPLON</a>
    </div>
    <!-- <a href="deconnexion"  class="btn btn-light"  >Déconnexion</a> -->
    <button type="button" id="deconnexionBtn" class="btn btn-light">Déconnexion</button>

  </div>
</nav>
    <?php } else { ?>
 
  <nav class="navbar navbar-expand-lg bg-body-tertiary bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">SIMPLON</a>
    </div>
  </div>
</nav>
<?php } ?>