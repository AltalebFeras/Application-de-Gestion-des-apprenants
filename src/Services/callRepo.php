<?php

namespace src\Repositories;


$promoRepository = new PromoRepository();
$promotions = $promoRepository->getAllPromotions();
$promoDetails = $promoRepository->getThisPromo();
$ID_Utilisateur = $_SESSION['ID_Utilisateur'];

$getUserPromoIDs =$promoRepository->getUserPromoIDs($ID_Utilisateur);
$_SESSION['userPromoID'] = $getUserPromoIDs[0];
$userPromoID= $_SESSION['userPromoID'];


$promoDetail = $promoRepository->getPromoDetails();

    
foreach ($promoDetail as $promo) {
   
}





$utilisateurRepository = new UtilisateurRepository();
$utilisateurs= $utilisateurRepository->getAllUtilisateurs();
$utilisateurObjects = $utilisateurRepository->getUserDetails();
$utilisateur = $utilisateurObjects[0];
$_SESSION['ID_Utilisateur'] = $utilisateur->getIDUtilisateur();
 

