<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">



<?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'formateur')) : ?>

    <div class="card-body">
      <h5 class="card-title d-flex justify-content-start">Cours du jour</h5>

      <?php foreach ($promotions as $promo) : ?>
        <div class="card-text mb-3 bg-light">
          <h3 class="card-text d-flex justify-content-start"><?php echo $promo->getNom(); ?>- matin</h3>
          <p class="card-text d-flex justify-content-start"><?php echo $promo->getPlaceDispo(); ?> participants</p>
          <p class="card-text d-flex justify-content-end"><?php echo date('d-m-Y'); ?></p>
          <div class="d-flex justify-content-end">
            <!-- <span class="badge text-bg-success ">ajouter les cas</span> -->
            <button id="" class="btn btn-info">Valider présence</button>
          </div>
        </div>
        <div class="card-text mb-3 bg-light">
        <h3 class="card-text d-flex justify-content-start"><?php echo $promo->getNom(); ?> - après midi</h3>
        <p class="card-text d-flex justify-content-start"><?php echo $promo->getPlaceDispo(); ?> participants</p>
        <p class="card-text d-flex justify-content-end"><?php echo date('d-m-Y'); ?></p>
        <div class="d-flex justify-content-end">
            <!-- <span class="badge text-bg-warning ">ajouter les cas</span> -->
            <button id="" class="btn btn-success">Signatures recueillies</button>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'formateur') : ?>

    <div class="card-body">
      <h5 class="card-title d-flex justify-content-start">Cours du jour</h5>

      <div class="card-text mb-3 bg-light">

        <h3 class="card-text d-flex justify-content-start"><?php echo $promo->getNom(); ?>- matin</h3>
        <p class="card-text d-flex justify-content-start"><?php echo $promo->getPlaceDispo(); ?> participants</p>
        <p class="card-text d-flex justify-content-end"><?php echo date('d-m-Y'); ?></p>
        <div class="d-flex justify-content-end">
          <!-- <span class="badge text-bg-success ">ajouter les cas</span> -->
          <button id="" class="btn btn-info">Valider présence</button>
        </div>
      </div>
      <div class="card-text mb-3 bg-light">
        <h3 class="card-text d-flex justify-content-start"><?php echo $promo->getNom(); ?> - après midi</h3>
        <p class="card-text d-flex justify-content-start"><?php echo $promo->getPlaceDispo(); ?> participants</p>
        <p class="card-text d-flex justify-content-end"><?php echo date('d-m-Y'); ?></p>
        <div class="d-flex justify-content-end">
          <!-- <span class="badge text-bg-warning ">ajouter les cas</span> -->
          <button id="" class="btn btn-success">Signatures recueillies</button>
        </div>
      </div>

    </div>
  <?php endif; ?>

  <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'apprenant') : ?>

    <div class="card-body">
      <h5 class="card-title d-flex justify-content-start">Cours du jour</h5>
       <!-- a modifier display none  d-none -->

      <div class="card-text mb-3 bg-light ">

        <h3 class="card-text d-flex justify-content-start"><?php echo $promo->getNom(); ?>- matin</h3>
        <p class="card-text d-flex justify-content-start"><?php echo $promo->getPlaceDispo(); ?> participants</p>
        <p class="card-text d-flex justify-content-end"><?php echo date('d-m-Y'); ?></p>
        <div class="d-flex justify-content-end">
          <!-- <span class="badge text-bg-success ">ajouter les cas</span> -->
          <button id="" class="btn btn-info">Valider présence</button>
        </div>
      </div>

       <!-- a modifier display none  d-none -->
      <div class="card-text mb-3 bg-light ">
        <h3 class="card-text d-flex justify-content-start"><?php echo $promo->getNom(); ?> - après midi</h3>
        <p class="card-text d-flex justify-content-start"><?php echo $promo->getPlaceDispo(); ?> participants</p>
        <p class="card-text d-flex justify-content-end"><?php echo date('d-m-Y'); ?></p>
        <div class="d-flex justify-content-end">
          <!-- <span class="badge text-bg-warning ">ajouter les cas</span> -->
          <button id="" class="btn btn-success">Signatures recueillies</button>
        </div>
      </div>

    </div>
  <?php endif; ?>

</div>