<?php

namespace src\Repositories;

$promoRepository = new PromoRepository();
$promotions = $promoRepository->getAllPromotions();

?>
<div class="d-flex justify-content-between my-3 mx-2">
  <div>
    <h3>Toutes les promotions</h3>
  </div>
  <button id="ajouterPromotionBtn" class="btn btn-success" onclick="displayFormPromo()">Ajouter promotion</button>


</div>

<div id="tablePromoDiv" >

  <?php
include_once __DIR__ . '/tablePromo.php';


?>
</div>