<?php

namespace src\Repositories;


$promoRepository = new PromoRepository();
$promotions = $promoRepository->getAllPromotions();
$promoDetails = $promoRepository->getThisPromo();


$utilisateurRepository = new UtilisateurRepository();
$utilisateurs= $utilisateurRepository->getAllUtilisateurs();


// // Accessing promo details
// $promoID = $promoDetails['ID_Promo'];
// $promoName = $promoDetails['Nom'];
// $promoStartDate = $promoDetails['Date_Debut'];
// $promoEndDate = $promoDetails['Date_Fin'];
// $promoAvailablePlaces = $promoDetails['Place_Dispo'];

// // Use the promo details as needed
