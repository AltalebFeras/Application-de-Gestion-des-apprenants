<p class="my-3 mx-2">tableau des promotions de Simplon</p>
<table class="table  my-3 mx-2" id="tableContainer">
  <thead>
    <tr>
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
        <td><?php echo $promo->getNom(); ?></td>
        <td><?php echo $promo->getDateDebut(); ?></td>
        <td><?php echo $promo->getDateFin(); ?></td>
        <td><?php echo $promo->getPlaceDispo(); ?></td>
        <td>
          <button type="button" id="displayThisPromoBtn" data-promo-id="<?php echo $promo->getIDPromo(); ?>" class="table-promo-btn-voir  btn btn-link">Voir</button>

          <button type="button" id="editPromoBtn" data-promo-id="<?php echo $promo->getIDPromo(); ?>" class="table-promo-btn-edit  btn btn-link ">Editer</button>

          <button type="button" id="deletePromoBtn" data-promo-id="<?php echo $promo->getIDPromo(); ?>" class="table-promo-btn-delete  btn btn-link ">Supprimer</button>

        </td>

      </tr>
    <?php endforeach; ?>

  </tbody>
</table>

<div id="mainTableScripts">

  <script src="assets/scripts/displayThisForm.js" type="module"></script>
  <script src="assets/scripts/deletePromo.js" type="module"></script>



</div>