<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">



        <div class="card-body">
            <h5 class="card-title d-flex justify-content-start">Cours du jour</h5>
            <div class="card-text mb-3 bg-light">
                <p class="card-text d-flex justify-content-start"> <?php

                                                                    echo $promoDetails['Nom'];
                                                                    var_dump($promoDetails);
                                                                    // var_dump($_SESSION['ID_Promo']);

                                                                    ?> - matin</p>
                <p class="card-text d-flex justify-content-end"><?php echo date('d-m-Y'); ?></p>

                <div class="d-flex justify-content-end">
                    <!-- <span class="badge text-bg-success ">ajouter les cas</span> -->
                    <button id="" class="btn btn-info">Valider présence</button>
                </div>
            </div>
            <div class="card-text mb-3 bg-light">
                <p class="card-text d-flex justify-content-start"><?php

                                                                    echo $promoDetails['Nom'];

                                                                    ?> - après midi</p>
                <p class="card-text d-flex justify-content-end"><?php echo date('d-m-Y'); ?></p>
                <div class="d-flex justify-content-end">
                    <!-- <span class="badge text-bg-warning ">ajouter les cas</span> -->
                    <button id="" class="btn btn-success">Signatures recueillies</button>
                </div>
            </div>
        </div>

    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

        <div id="contentPromotion">


            <div class="d-flex justify-content-between my-3 mx-2">
                <div>
                    <h3 class="m-3">Promotion <?php

                                                echo $promoDetails['Nom'];

                                                ?></h3>
                    <p class="m-3">informations générales de la <?php

                                                                echo $promoDetails['Nom'];

                                                                ?></p>

                </div>




            </div>


            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home1-tab" data-bs-toggle="tab" data-bs-target="#home1" type="button" role="tab" aria-controls="home1" aria-selected="true">Tableau apprenants</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile1-tab" data-bs-toggle="tab" data-bs-target="#profile1" type="button" role="tab" aria-controls="profile1" aria-selected="false">Retards</button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home1-tab">




                    <div id="tableUserDiv">


                        <?php
                        include_once __DIR__ . '/tableUser.php';
                        ?>


                    </div>


                </div>
                <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile1-tab">




                    <div id="tableUserRetardDiv">


                        <?php
                        include_once __DIR__ . '/tableRetad.php';
                        ?>


                    </div>

                  

                </div>
            </div>

        </div>

        <div id="mainUtilisateurScripts">

            <script src="assets/scripts/utilisateur.js" type="module"></script>
            <script src="assets/scripts/promo.js" type="module"></script>
            <script src="assets/scripts/generateCode.js" type="module"></script>
            <script src="assets/scripts/retard.js" type="module"></script>
            <script src="assets/scripts/editUsers.js" type="module"></script>
            <script src="assets/scripts/createUtilisateur.js" type="module"></script>



        </div>

        <div id="ajouterApprenantDiv" class="d-none">
            <?php
            include_once __DIR__ . '/../ajouterApprenant.php';
            ?>
        </div>


    </div>
</div>


</div>