<div id="main-page">
<?php
include_once __DIR__ . '/Includes/header.php';
include_once __DIR__ . '/Includes/colonne.php';
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
      <input type="password" name="Mot_De_Passe" class="form-control" id="Mot_De_Passe" placeholder="*****"required>
    </div>
    <div id="alertMessage" class="bg-danger text-white mb-3"></div>

    <button type="submit" id="btn_Connexion" class="btn btn-primary">Connexion</button>
  </form>
</div>


</div>


 



