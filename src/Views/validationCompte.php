<?php
include_once __DIR__ . '/Includes/header.php';

?>

<div class="container bg-light p-4  col-md-5 mt-5 shadow-lg p-3 mb-5">
  <form id="form" class="d-flex flex-column mb-3" method="post">
    <div class="text-center">
      <h2>Bienvenue</h2>
      <p>Pour clôturer votre inscription et créer votre compte, veuillez choisir un mot de passe</p>
    </div>

    <div class="mb-3">
    <label for="Mot_De_Passe_Choisi" class="form-label">Mot de passe*</label>
      <input type="password" name="Mot_De_Passe_Choisi" class="form-control" id="Mot_De_Passe_Choisi" placeholder="*****"required>
    </div>
    <div class="mb-3">
      <label for="Mot_De_Passe_Choisi_Confirme" class="form-label">Confirmez mot de passe*</label>
      <input type="password" name="Mot_De_Passe_Choisi_Confirme" class="form-control" id="Mot_De_Passe_Choisi_Confirme" placeholder="*****"required>
    </div>
    <button type="submit" class="btn btn-primary">Connexion</button>
  </form>
</div>