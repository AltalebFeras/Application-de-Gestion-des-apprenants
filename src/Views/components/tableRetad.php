



<div class="d-flex justify-content-between my-3 mx-2">
                        <div></div>
                        <button id="ajouterRetardBtn" class="btn btn-success">Ajouter un retard</button>
                    </div>







                    <table class="table  my-3 mx-2">
                        <thead>
                            <tr>
                                <th class="d-non" scope="col">ID Utilisateur</th>
                                <th scope="col">Nom de famille</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Compte activé</th>
                                <th scope="col">Rôle</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($utilisateurs as $utilisateur) : ?>
                                <tr>
                                    <td class="d-non"><?php echo $utilisateur->getIDUtilisateur(); ?></td>
                                    <td><?php echo $utilisateur->getNom(); ?></td>
                                    <td><?php echo $utilisateur->getPrenom() ?></td>
                                    <td><?php echo $utilisateur->getEmail(); ?></td>
                                    <td><?php echo $utilisateur->getCompteActive(); ?></td>
                                    <td><?php if ($utilisateur->getIDRole() == 1) {
                                            echo "apprenant";
                                        } ?></td>

                                    <td>
                                        <button type="button" class="btn btn-link">Editer</button>
                                        <button type="button" class="btn btn-link">Supprimer</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>