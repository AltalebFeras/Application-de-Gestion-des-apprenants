<?php

namespace src\Repositories;

include_once __DIR__ . '/Includes/header.php';


$promoRepository = new PromoRepository();
$promotions = $promoRepository->getAllPromotions();

?>

<?php
include_once __DIR__ . '/../Views/components/navbar.php';

?>

<?php
if (isset($_SESSION['role'])) {
  if ($_SESSION['role'] == 'admin') {
    echo "<h2 class= m-2 >Bonjour Admin!</h2>";
    var_dump($_SESSION['role'])


?>


    <div class="m-2" id="bodyDashboard">

      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Accueil</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Promotions</button>
        </li>

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
        <script src="assets/scripts/utilisateur.js" type="module"></script>
        <script src="assets/scripts/createPromo.js" type="module"></script>
      </div>
    </div>









<?php
  } elseif ($_SESSION['role'] == 'user') {
    echo "<h2>Bonjour " . $_SESSION['prenom'] . "!</h2>";
  }
}
?>




<?php
include_once __DIR__ . '/Includes/footer.php';

?>