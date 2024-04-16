<?php
include_once __DIR__ . '/Includes/header.php';

?>

<div id="body">


<?php
include_once __DIR__ . '/../Views/components/navbar.php';

?>
  <div id="error_message">
    <?php
    if (isset($_SESSION['error_message'])) {
      echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_message'] . '</div>';
      unset($_SESSION['error_message']);
    } ?>
  </div>

  <div class="container bg-light p-4  col-md-5 mt-5 shadow-lg p-3 mb-5">
    <form id="formConnexion" method="post" action="/dashboard" class="d-flex flex-column mb-3">
      <div class="text-center">
        <h2>Bienvenue</h2>
      </div>

      <div class="mb-3">
        <label for="Email" class="form-label">Email*</label>
        <input type="Email" name="Email" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Enter your email" required>
      </div>
      <div class="mb-3">
        <label for="Mot_De_Passe" class="form-label">Mot de passe*</label>
        <input type="password" name="Mot_De_Passe" class="form-control" id="Mot_De_Passe" placeholder="*****" required>
      </div>
      <div id="alertMessage" class="bg-danger text-white mb-3"></div>

      <button type="submit" id="submissionButton" class="btn btn-primary">Connexion</button>
    </form>
  </div>


</div>

<?php
include_once __DIR__ . '/Includes/footer.php';

?>

<!-- temporary -->



<!-- 
<div class="container bg-light p-4  col-md-5 mt-5 shadow-lg p-3 mb-5">
  <form id="form" class="d-flex flex-column mb-3" method="post">
    <div class="text-center">
      <h2>Bienvenue</h2>
      <p>Pour clôturer votre inscription et créer votre compte, veuillez choisir un mot de passe</p>
    </div>

    <div class="mb-3">
    <label for="Mot_De_Passe" class="form-label">Mot de passe*</label>
      <input type="password" name="Mot_De_Passe" class="form-control" id="Mot_De_Passe" placeholder="*****"required>
    </div>
    <div class="mb-3">
      <label for="Mot_De_Passe_Confirme" class="form-label">Confirmez mot de passe*</label>
      <input type="password" name="Mot_De_Passe_Confirme" class="form-control" id="Mot_De_Passe_Confirme" placeholder="*****"required>
    </div>
    <button type="submit" id="btnConfirmerMDP" class="btn btn-primary">Connexion</button>
  </form>
</div> -->