

<h3 class="m-3">Création d’un apprenant</h3>


<button id="btnRetourVersTousLesPromoDeApprenant" class=" mb-3 btn btn-primary">Retour</button>

<form class="p-3 m-5 bg-light text-dark" method="post">

    <input type="hidden" name="form_id" value="2">

    <div class="mb-3">
        <label for="Nom" class="form-label">Nom de la promotion</label>
        <input type="text" name="Nom" class="form-control" id="Nom" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="Prenom" class="form-label">Date de début</label>
        <input type="text" name="Prenom" class="form-control" id="Prenom" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="Email" class="form-label">Date de fin</label>
        <input type="email" name="Email" class="form-control" id="Email" aria-describedby="emailHelp">
    </div>
   
    <div class="  d-flex justify-content-between mb-3">
        <button id="createNewUtilisateurBtn" type="submit" class="btn btn-primary">Sauvegarder</button>
    </div>
</form>