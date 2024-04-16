<?php

namespace src\Repositories;

$promoRepository = new PromoRepository();
$promotions = $promoRepository->getAllPromotions();

?>

<p class="my-3 mx-2">tableau des promotions de Simplon</p>
<table class="table  my-3 mx-2">
  <thead>
    <tr>
      <th class="d-none" scope="col">IDPromo</th>
      <th scope="col">Promotions</th>
      <th scope="col">Début</th>
      <th scope="col">Fin</th>
      <th scope="col">Place</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($promotions as $promo) : ?>
      <tr>
        <td class="d-none"><?php echo $promo->getIDPromo(); ?></td>
        <td><?php echo $promo->getNom(); ?></td>
        <td><?php echo $promo->getDateDebut(); ?></td>
        <td><?php echo $promo->getDateFin(); ?></td>
        <td><?php echo $promo->getPlaceDispo(); ?></td>
        <td>
          <button type="button" id="displayThisPromoBtn" class="btn btn-link">Voir</button>
          <button type="button" class="btn btn-link">Editer</button>
          <button type="button" class="btn btn-link">Supprimer</button>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div id="mainTableScripts">

  <script src="assets/scripts/displayThisForm.js" type="module"></script>


</div>