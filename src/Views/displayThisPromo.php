<?php

namespace src\Repositories;


$promoRepository = new PromoRepository();
$promotions = $promoRepository->getAllPromotions();

?>

<?php
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
?>

<button id="btnRetourVersTousLesPromo1" class=" mb-3 btn btn-primary">Retour</button>

        <div class="m-2" id="bodyDashboard"></div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Accueil</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Promotions</button>
            </li>

        </ul>
        <div id="contentUtilisateurDiv">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">



                <div class="card-body">
                    <h5 class="card-title d-flex justify-content-start">Cours du jour</h5>
                    <div class="card-text mb-3 bg-light">
                        <p class="card-text d-flex justify-content-start">DWWM3 - matin</p>
                        <p class="card-text d-flex justify-content-end"><?php echo date('d-m-Y'); ?></p>

                        <div class="d-flex justify-content-end">
                            <!-- <span class="badge text-bg-success ">ajouter les cas</span> -->
                            <button id="" class="btn btn-info">Valider présence</button>
                        </div>
                    </div>
                    <div class="card-text mb-3 bg-light">
                        <p class="card-text d-flex justify-content-start">DWWM3 - après midi</p>
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
                        // echo $promo->getNom(); 
                        ?></h3>
                        <p class="m-3">informations générales de la <?php 
                        // echo $promo->getNom(); 
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



                            <div class="card-body">
                            <div class="d-flex justify-content-between my-3 mx-2">
                                    <div></div>
                                    <button id="ajouterApprenantBtn" class="btn btn-success">Ajouter apprenant</button>
                                </div>
                            <table class="table  my-3 mx-2">
                                    <thead>
                                        <tr>
                                            <th class="d-none" scope="col">IDPromo</th>
                                            <th scope="col">Nom de famille</th>
                                            <th scope="col">Prénom</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Compte activé</th>
                                            <th scope="col">Rôle</th>
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
                                                    <button type="button" class="btn btn-link">Editer</button>
                                                    <button type="button" class="btn btn-link">Supprimer</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile1-tab">

                           


                                <div class="d-flex justify-content-between my-3 mx-2">
                                    <div></div>
                                    <button id="ajouterRetardBtn" class="btn btn-success">Ajouter un retard</button>
                                </div>
                               

                                <table class="table  my-3 mx-2">
                                    <thead>
                                        <tr>
                                            <th class="d-none" scope="col">ID Utilisateur</th>
                                            <th scope="col">Nom de famille</th>
                                            <th scope="col">Prénom</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Compte activé</th>
                                            <th scope="col">Rôle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($promotions as $promo) : ?>
                                            <tr>
                                                <td class="d-none"><?php echo $promo->getIDUtilisateur(); ?></td>
                                                <td><?php echo $promo->getNom(); ?></td>
                                                <td><?php echo $promo->getDateDebut(); ?></td>
                                                <td><?php echo $promo->getDateFin(); ?></td>
                                                <td><?php echo $promo->getPlaceDispo(); ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-link">Editer</button>
                                                    <button type="button" class="btn btn-link">Supprimer</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>


                            </div>
                        </div>

                    </div>



                </div>
            </div>

        </div>









<?php
    } elseif ($_SESSION['role'] == 'user') {
        echo "<h2>Bonjour " . $_SESSION['prenom'] . "!</h2>";
    }
}
?>