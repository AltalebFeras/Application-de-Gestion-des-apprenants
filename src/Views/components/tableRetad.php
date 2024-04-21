<div class="d-flex justify-content-between my-3 mx-2">
    <div></div>
    <button id="ajouterRetardBtn" class="btn btn-success">Ajouter un retard</button>
</div>






<label for="">aprrenants</label>

<select class="form-select my-3 mx-2" id="utilisateurSelect">
    <option selected disabled>Select an utilisateur</option>
    <?php foreach ($utilisateurs as $utilisateur) : ?>
        <option value="<?php echo $utilisateur->getIDUtilisateur(); ?>">
            <?php echo $utilisateur->getNom() . ' ' . $utilisateur->getPrenom(); ?>

        </option>
    <?php endforeach; ?>
</select>

<label for="">cours</label>
<select class="form-select my-3 mx-2" id="coursSelect">
    <option selected disabled>Select a cours</option>
    <?php foreach ($coursObjects as $cours) : ?>
        <option value="<?php echo $cours->getIDCours(); ?>">
            <?php echo  ' Le cours de ' . $cours->getDateCours() . ' du ' . $cours->getHeureDebut()  . ' au ' .  $cours->getHeureFin()   ;  ?>
        </option>
    <?php endforeach; ?>
</select>