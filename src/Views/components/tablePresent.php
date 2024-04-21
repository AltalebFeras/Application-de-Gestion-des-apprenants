 

<table class="table my-3 mx-2">
    <thead>
        <tr>
            <th class="d-non" scope="col">ID Utilisateur</th>
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
                <td class="d-non"><?php echo $utilisateur['ID_Utilisateur']; ?></td>
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
