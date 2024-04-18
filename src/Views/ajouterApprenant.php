<h3 class="m-3">Création d’un apprenant</h3>


<style>
.error {
    color: red;
}
</style>


<form  id="userForm" class="p-3 m-5 bg-light text-dark" method="post"  >

    <input type="hidden" name="form_id" value="2">

    <div class="mb-3">
        <label for="Nom" class="form-label">Nom</label>
        <input type="text" name="Nom" class="form-control" id="Nom" required >
        <span id="nomError" class="error"></span>
    </div>
    <div class="mb-3">
        <label for="Prenom" class="form-label">Prénom</label>
        <input type="text" name="Prenom" class="form-control" id="Prenom" required >
        <span id="prenomError" class="error"></span>
    </div>
    <div class="mb-3">
        <label for="Email" class="form-label">Adresse email</label>
        <input type="email" name="Email" class="form-control" id="Email" required >
        <span id="emailError" class="error"></span>
    </div>
   
        <div class="mb-3">
            <label for="ID_Role" class="form-label">Role</label>
            <select name="ID_Role" class="form-select" aria-label="Default select example" id="ID_Role">
                <option value="1">Apprenant</option>

                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin' &&  $_SESSION['role'] !== 'formateur') : ?>
                <option value="2">Formateur</option>
                <option value="3">Admin</option>
                <?php endif; ?>


            </select>
        </div>


    <div class="  d-flex justify-content-between mb-3">
        <input id="btnRetourVersTousLesPromoDeApprenant" class=" mb-3 btn btn-primary" value="Retour">

        <input id="createNewUtilisateurBtn" type="submit" class=" mb-3  btn btn-primary" value="Sauvegarder">

    </div>


</form>