<?php
include_once __DIR__ . '/Includes/header.php';
include_once __DIR__ . '/../Services/callRepo.php';


?>
<?php


include_once __DIR__ . '/../Views/components/navbar.php';

?>
<div class="m-2" id="bodyDashboard">

  <?php
  if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'formateur'|| $_SESSION['role'] == 'apprenant') {
      echo "<h2 class='m-2'>Bonjour " . $utilisateur->getPrenom() . "!</h2>"; 
      var_dump($_SESSION['role']);
      var_dump($_SESSION['Email']);
      var_dump($_SESSION['ID_Utilisateur']);
      var_dump($_SESSION['ID_Promo']);
      var_dump($getUserPromoIDs[0]);
      var_dump($getUserPromoIDs);
      var_dump($_SESSION['userPromoID']);
      var_dump($userPromoID);
      
      var_dump($promoDetail);
      foreach ($promoDetail as $promo) {
        
    }



  ?>





      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Accueil</button>
        </li>

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] !== 'apprenant') : ?>


          <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Promotions</button>
          </li>
        <?php endif; ?>

      </ul>
      <div class="tab-content" id="myTabContent">

        <?php
        include_once __DIR__ . '/components/accueil.php';


        ?>

        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

          <div id="contentPromotion">

            <div id="promotionsDiv">
              <?php
              include_once __DIR__ . '/components/promotions.php';
              ?>
            </div>

            <div id="ajouterPromoDiv" class="d-none">
              <?php
              include_once __DIR__ . '/ajouterPromotion.php';
              ?>
            </div>


          </div>
        </div>

      </div>

      <div id="main">
        <script src="assets/scripts/dashboard.js" type="module"></script>
        <script src="assets/scripts/createPromo.js" type="module"></script>
        <script src="assets/scripts/deletePromo.js" type="module"></script>
        <script src="assets/scripts/displayThisForm.js" type="module"></script>


      </div>
</div>









<?php
    } 
  }
?>




<?php
include_once __DIR__ . '/Includes/footer.php';
?>