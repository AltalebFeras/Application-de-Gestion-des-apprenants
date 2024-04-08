<?php
include_once __DIR__ . '/Includes/header.php';
?>

<a href="/" class="btn btn-info" onclick="route()">Home</a>

<div class="main">
    <form action="/dashboard" method="post" onsubmit="route()">

        <fieldset>
            <h1>Administration</h1>

            <label for="motDePasseAdmin">Code d'accès :</label>
            <input type="password" id="motDePasseAdmin" name="motDePasseAdmin" required>
            <?php if ($erreur == "connexion") { ?>
                <div class="error">
                    Erreur de connexion.
                </div>
            <?php } ?>
            <input  type="submit" class="btn btn-info" value="Se connecter">
        </fieldset>
    </form>
</div>



<?php
include_once __DIR__ . '/Includes/footer.php';
?>