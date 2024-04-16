

<h3 class="m-3">Création d’un apprenant</h3>



<form class="p-3 m-5 bg-light text-dark" method="post">

    <input type="hidden" name="form_id" value="2">

    <div class="mb-3">
        <label for="Nom" class="form-label">Nom</label>
        <input type="text" name="Nom" class="form-control" id="Nom"  >
    </div>
    <div class="mb-3">
        <label for="Prenom" class="form-label">Prénom</label>
        <input type="text" name="Prenom" class="form-control" id="Prenom" >
    </div> 
    <div class="mb-3">
        <label for="Email" class="form-label">Adresse email</label>
        <input type="email" name="Email" class="form-control" id="Email" >
    </div> 

    <div class="  d-flex justify-content-between mb-3">
        <input id="btnRetourVersTousLesPromoDeApprenant" class=" mb-3 btn btn-primary" value="Retour">

        <input id="createNewUtilisateurBtn" type="submit" class=" mb-3  btn btn-primary" value="Sauvegarder">

    </div>

    
</form>