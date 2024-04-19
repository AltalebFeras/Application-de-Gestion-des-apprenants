<?php

include_once __DIR__ . '/../Services/callRepo.php';

include_once __DIR__ . '/Includes/header.php';



?>

<?php
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'formateur') {
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

            <?php
            include_once __DIR__. "/components/contentUtilisateur.php"
            ?>




            <div id="mainUtilisateurScripts1">

                <!-- <script src="assets/scripts/utilisateur.js" type="module"></script>
                <script src="assets/scripts/promo.js" type="module"></script>
                <script src="assets/scripts/generateCode.js" type="module"></script>
                <script src="assets/scripts/retard.js" type="module"></script>
                <script src="assets/scripts/editUsers.js" type="module"></script> -->
                <script src="assets/scripts/createUtilisateur.js" type="module"></script>



            </div>
        </div>

<?php
    } elseif ($_SESSION['role'] == 'user') {
        echo "<h2>Bonjour " . $_SESSION['prenom'] . "!</h2>";
    }
}
?>