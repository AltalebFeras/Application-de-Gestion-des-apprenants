 

<table class="table my-3 mx-2">
    <thead>
        <tr>
            <th scope="col">Nom de famille</th>
            <th scope="col">Prénom</th>
            <th scope="col">Email</th>
            <th scope="col">Rôle</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($utilisateursDetails as $utilisateur) : ?>
            <tr>
                <td><?php echo $utilisateur['Nom']; ?></td>
                <td><?php echo $utilisateur['Prenom']; ?></td>
                <td><?php echo $utilisateur['Email']; ?></td>
                <td><?php echo ($utilisateur['ID_Role'] == 1) ? "apprenant" : ""; ?></td>
                <td>
                    <button type="button" class="btn btn-link">Editer</button>
                    <button type="button" class="btn btn-link">Supprimer</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>






<!-- <div id="mainUtilisateurScripts1">

<script src="assets/scripts/utilisateur.js" type="module"></script>
<script src="assets/scripts/promo.js" type="module"></script>
<script src="assets/scripts/generateCode.js" type="module"></script>
<script src="assets/scripts/retard.js" type="module"></script>
<script src="assets/scripts/editUsers.js" type="module"></script>
<script src="assets/scripts/deleteUser.js" type="module"></script>

<!-- <script src="assets/scripts/createUtilisateur.js" type="module"></script> -->



</div> -->