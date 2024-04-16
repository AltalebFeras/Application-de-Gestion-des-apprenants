
<body>

  <?php if(isset($_SESSION['connected']) && $_SESSION['connected'] === true) { ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-light">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="#">SIMPLON</a>
        </div>
        <button type="button" id="deconnexionBtn" class="btn btn-light" >Déconnexion</button>

      </div>
    </nav>
  <?php } else { ?>

    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-light">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="#">SIMPLON</a>
        </div>
        <button type="button" id="connexionBtn" class="btn btn-light" >Connexion</button>

      </div>
    </nav>
  <?php    } ?>

  
 