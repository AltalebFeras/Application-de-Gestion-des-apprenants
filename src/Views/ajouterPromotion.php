<h3 class="m-3">Création d’une promotion</h3>

<p class="m-3">tableau des promotions de Simplon</p>


<form class="p-3 m-5 bg-light text-dark" method="post">

    <input type="hidden" name="form_id" value="1">

    <div class="mb-3">
        <label for="promoNom" class="form-label">Nom de la promotion</label>
        <input type="text" name="promoNom" class="form-control" id="promoNom" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="dateDebut" class="form-label">Date de début</label>
        <input type="date" name="dateDebut" class="form-control" id="dateDebut" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="dateFin" class="form-label">Date de fin</label>
        <input type="date" name="dateFin" class="form-control" id="dateFin" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="placeDispo" class="form-label">Place(s) disponible(s)</label>
        <input type="number" name="placeDispo" class="form-control" id="placeDispo" aria-describedby="emailHelp">
    </div>

    <div class="  d-flex justify-content-between mb-3">
        <input id="btnRetourVersTousLesPromo" class=" mb-3 btn btn-primary" value="Retour" > 

        <input id="createNewPromoBtn" type="submit" class="mb-3 btn btn-primary" value="Sauvegarder"> 

    </div>
</form>