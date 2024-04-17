<p class="my-3 mx-2">tableau des promotions de Simplon</p>
<table class="table  my-3 mx-2" id="tableContainer">
  <thead>
    <tr>
      <th class="d-noe" scope="col">IDPromo</th>
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
        <td class="d-noe promotion-id"><?php echo $promo->getIDPromo(); ?></td>
        <td><?php echo $promo->getNom(); ?></td>
        <td><?php echo $promo->getDateDebut(); ?></td>
        <td><?php echo $promo->getDateFin(); ?></td>
        <td><?php echo $promo->getPlaceDispo(); ?></td>
        <td>
          <button type="button" id="displayThisPromoBtn" data-promo-id="<?php echo $promo->getIDPromo(); ?>" class="voir-btn  btn btn-link">Voir</button>

          <button type="button" id="editPromoBtn" data-promo-id="<?php echo $promo->getIDPromo(); ?>" class="edit-btn btn btn-link ">Editer</button>

          <button type="button" id="deletePromoBtn" data-promo-id="<?php echo $promo->getIDPromo(); ?>" class="delete-btn btn btn-link ">Supprimer</button>

        </td>

      </tr>
    <?php endforeach; ?>

  </tbody>
</table>

<div id="mainTableScripts">

  <script src="assets/scripts/displayThisForm.js" type="module"></script>


</div>