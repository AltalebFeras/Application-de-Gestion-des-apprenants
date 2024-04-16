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










    <div id="mainUtilisateurScripts">

        <script src="assets/scripts/utilisateur.js" type="module"></script>
        <script src="assets/scripts/promo.js" type="module"></script>
        <script src="assets/scripts/generateCode.js" type="module"></script>
        <script src="assets/scripts/retard.js" type="module"></script>
        <script src="assets/scripts/editUsers.js" type="module"></script>
        <script src="assets/scripts/createUtilisateur.js" type="module"></script>



    </div>
</div>