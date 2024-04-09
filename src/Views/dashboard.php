<?php

include_once __DIR__ . '/Includes/header.php';
include_once __DIR__ . '/Includes/colonne.php';


?>
<div id="">


<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="#">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Promotions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" aria-disabled="true">Utilisateurs</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title d-flex justify-content-start">Cours du jour</h5>
    <div class="card-text mb-3 bg-light">
      <p class="card-text d-flex justify-content-start">DWWM3 - matin</p>
      <p class="card-text d-flex justify-content-end">12-O1-2024</p>
      <div class="d-flex justify-content-end">
        <span class="badge text-bg-success ">Signatures recueillies</span>
      </div>
    </div>
    <div class="card-text mb-3 bg-light">
      <p class="card-text d-flex justify-content-start">DWWM3 - après midi</p>
      <p class="card-text d-flex justify-content-end">12-O1-2024</p>
      <div class="d-flex justify-content-end">
        <span class="badge text-bg-warning ">Signatures en cours</span>
      </div>
    </div>
  </div>
</div>
  
  <?php
  echo 'hello from dashboard';
  // if (isset($_SESSION['role'])) {
  //   if ($_SESSION['role'] == 'admin') {
  //     echo "<h2>Bonjour Admin!</h2>";





  //   }
  // } 
  // elseif ($_SESSION['role'] == 'user') {

  //     echo "<h2>Bonjour '$'prenom!</h2>";


  //   }

  //   else{
  ?>

  <?php
  //  } 
  ?>

</div>

 