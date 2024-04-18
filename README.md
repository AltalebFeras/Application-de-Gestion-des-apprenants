# Application-de-Gestion-des-apprenants

code table users 

<?php if ($_SESSION['role'] == 'formateur' && $utilisateur->getIDRole() == 1) : ?>
    <?php foreach ($utilisateurs as $utilisateur) : ?>
        <tr>
            <td class="d-non"><?php echo $utilisateur->getIDUtilisateur(); ?></td>
            <td><?php echo $utilisateur->getNom(); ?></td>
            <td><?php echo $utilisateur->getPrenom() ?></td>
            <td><?php echo $utilisateur->getEmail(); ?></td>
            <td><?php echo $utilisateur->getCompteActive(); ?></td>
            <td><?php if ($utilisateur->getIDRole() == 1) {echo "apprenant";}?></td>

            <td>
                <button type="button" class="btn btn-link">Editer</button>
                <button type="button" class="btn btn-link">Supprimer</button>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else : ?>
    <?php foreach ($utilisateurs as $utilisateur) : ?>
        <tr>
            <td class="d-non"><?php echo $utilisateur->getIDUtilisateur(); ?></td>
            <td><?php echo $utilisateur->getNom(); ?></td>
            <td><?php echo $utilisateur->getPrenom() ?></td>
            <td><?php echo $utilisateur->getEmail(); ?></td>
            <td><?php echo $utilisateur->getCompteActive(); ?></td>
            <td><?php if ($utilisateur->getIDRole() == 1) {echo "apprenant";} elseif ($utilisateur->getIDRole() == 2) {echo "Formateur";} elseif($utilisateur->getIDRole() == 3) {echo "Admin";}?></td>

            <td>
                <button type="button" class="btn btn-link">Editer</button>
                <button type="button" class="btn btn-link">Supprimer</button>
            </td>
        </tr>
    <?php endforeach; ?>
<?php endif; ?>
