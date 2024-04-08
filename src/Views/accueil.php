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
  <form action="" id="inscriptionForm" method="post">

    <fieldset class=" d-flex flex-column ">

      <legend>Connexion</legend>

      <label for="Email">Email :</label>
      <input type="Email" name="Email" id="Email" required>
      <label for="Mot_De_Passe">Mot de passe :</label>
      <input type="password" name="Mot_De_Passe" id="Mot_De_Passe" min="8" required>

      <div id="alertMessage" class="bg-danger text-white mb-3"></div>
      <div class="d-flex justify-content-between">
        <input type="submit" name="soumission" class="btn btn-success" id="btn_SeConnecter" value="Se connecter">
      </div>
    </fieldset>
  </form>
  


<?php
include_once __DIR__ . '/Includes/footer.php';
?>
</div>


 



