







<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">



  <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'formateur' )) : ?>

    <h5 class="card-title d-flex justify-content-start">Cours du jour</h5>
    
    <div class="card-body">

      <?php foreach ($promotions as $promo) : ?>
        <div class="card-text mb-3 bg-light">
          <h3 class="card-text d-flex justify-content-start"><?php echo $promo->getNom(); ?>- matin</h3>
          <p class="card-text d-flex justify-content-start"><?php echo $promo->getPlaceDispo(); ?> participants</p>
          <p class="card-text d-flex justify-content-end"><?php echo date('d-m-Y'); ?></p>
          
        </div>
        <div class="card-text mb-3 bg-light">
          <h3 class="card-text d-flex justify-content-start"><?php echo $promo->getNom(); ?> - après midi</h3>
          <p class="card-text d-flex justify-content-start"><?php echo $promo->getPlaceDispo(); ?> participants</p>
          <p class="card-text d-flex justify-content-end"><?php echo date('d-m-Y'); ?></p>
          
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  













  <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'apprenant') : ?>

    <h5 class="card-title d-flex justify-content-start mx-2 my-3">Cours du jour</h5>
    <div class="card-body m-3 mx-2">
      <!-- a modifier display none  d-none -->

      <div class="card-text mb-4 mx-2 bg-light ">
        <div class=" mx-2 card-text d-flex justify-content-between">
          <div>
            <h3 class=" mx-2 my-1 card-text d-flex justify-content-start"><?php echo $promo->getNom(); ?>- matin</h3>
            <p class="card-text d-flex justify-content-start mx-2"><?php echo $promo->getPlaceDispo(); ?> participants</p>

          </div>
          <div class="mx-2" >
            <p class="card-text d-flex justify-content-end my-2 mx-2 font-weight-bold"><?php echo date('d-m-Y'); 
      var_dump($_SESSION['ID_Promo']);
      var_dump($_SESSION['ID_Utilisateur']);

      ?></p>

          </div>
        </div>

        <div id="singatureStatusDiv"  class="mx-2 ">

          <form class="d-flex flex-column my-3 mx-2">
            <input type="number" class="my-3 mx-2" id="Code_Aleatoire" name="Code_Aleatoire" type="number" placeholder="....."  />
            <div class="d-flex flex-row-reverse" >
              <button id="matinValiderLeCodeApprenant" type="submit" class="my-3 mx-2 d-flex justify-content-end btn btn-primary">Valider présence</button>
            </div>
          </form>

        </div>
      </div>

      <div class="card-text mb-3 mx-2 bg-light ">
        <div class=" mx-2 card-text d-flex justify-content-between">
          <div>
            <h3 class=" mx-2 my-1 card-text d-flex justify-content-start"><?php echo $promo->getNom(); ?>- après midi</h3>
            <p class="card-text d-flex justify-content-start mx-2"><?php echo $promo->getPlaceDispo(); ?> participants</p>

          </div>
          <div class="mx-2" >
            <p class="card-text d-flex justify-content-end my-2 mx-2 font-weight-bold"><?php echo date('d-m-Y'); ?></p>

          </div>
        </div>

        <div class="mx-2 ">

          <form class="d-flex flex-column my-3 mx-2">
            <input type="Code_Aleatoire" class="my-3 mx-2" name="Code_Aleatoire" type="number" placeholder="....." />
            <div class="d-flex flex-row-reverse" >
              <button id="apresMidiValiderLeCodeApprenant" type="submit" class="my-3 mx-2 d-flex justify-content-end btn btn-primary">Valider présence</button>
            </div>
          </form>

        </div>
      </div>




    </div>
  <?php endif; ?>

</div>