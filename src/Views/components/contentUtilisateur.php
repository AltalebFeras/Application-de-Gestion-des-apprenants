

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">



        <h5 class="card-title d-flex justify-content-start">Cours du jour</h5>
        <div class="card-body m-3 mx-2">
            <!-- a modifier display none  d-none -->

            <div class="card-text mb-4 mx-2 bg-light ">
                <div class=" mx-2 card-text d-flex justify-content-between">
                    <div>
                        <h3 class=" mx-2 my-1 card-text d-flex justify-content-start"><?php
                                                                                        var_dump($promoDetails);
                                                                                        echo $promo->getNom(); ?>- matin</h3>
                        <p class="card-text d-flex justify-content-start mx-2"><?php echo $promo->getPlaceDispo(); ?> participants</p>

                    </div>
                    <div class="mx-2">
                        <p class="card-text d-flex justify-content-end my-2 mx-2 font-weight-bold"><?php echo date('d-m-Y'); ?></p>

                    </div>
                </div>

                <div class="mx-2 ">


                    <div class="d-flex flex-row-reverse">
                        <button id="matinValiderLeCodeFormateur" type="button" class="my-3 mx-2 d-flex justify-content-end btn btn-primary">Valider présence</button>
                    </div>


                </div>
            </div>

            <div class="card-text mb-3 mx-2 bg-light ">
                <div class=" mx-2 card-text d-flex justify-content-between">
                    <div>
                        <h3 class=" mx-2 my-1 card-text d-flex justify-content-start"><?php echo $promo->getNom(); ?>- après midi</h3>
                        <p class="card-text d-flex justify-content-start mx-2"><?php echo $promo->getPlaceDispo(); ?> participants</p>

                    </div>
                    <div class="mx-2">
                        <p class="card-text d-flex justify-content-end my-2 mx-2 font-weight-bold"><?php echo date('d-m-Y'); ?></p>

                    </div>
                </div>

                <div class="mx-2 ">



                    <div class="d-flex flex-row-reverse">
                        <button id="apresMidiValiderLeCodeFormateur" type="submit" class="my-3 mx-2 d-flex justify-content-end btn btn-primary">Valider présence</button>
                    </div>


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