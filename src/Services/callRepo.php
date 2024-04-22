<?php

namespace src\Repositories;


$promoRepository = new PromoRepository();
$promotions = $promoRepository->getAllPromotions();
$promoDetails = $promoRepository->getThisPromo();
$ID_Utilisateur = $_SESSION['ID_Utilisateur'];

$getUserPromoIDs = $promoRepository->getUserPromoIDs($ID_Utilisateur);
$_SESSION['userPromoID'] = $getUserPromoIDs[0];
$userPromoID = $_SESSION['userPromoID'];

$promoDetail = $promoRepository->getPromoDetails();

foreach ($promoDetail as $promo) {
}

$utilisateurRepository = new UtilisateurRepository();
$utilisateurs = $utilisateurRepository->getAllUtilisateurs();
$utilisateurObjects = $utilisateurRepository->getUserDetails();
$utilisateur = $utilisateurObjects[0];
$_SESSION['ID_Utilisateur'] = $utilisateur->getIDUtilisateur();
$utilisateursDetails =$utilisateurRepository->utilisateurParticipes();
$coursObjects = $utilisateurRepository->getAllCours();
$utilisateursDetails =$utilisateurRepository->utilisateurAbsent();



$coursRepositoty = new CoursRepositoty;
$coursCodeMatin = $coursRepositoty->displayCodeMatin();
$coursCodeApresMidi = $coursRepositoty->displayCodeApresMidi();

$ID_Utilisateur = $_SESSION['ID_Utilisateur'];
$ID_Promo = $coursRepositoty->getUserPromoID($ID_Utilisateur);
$ID_Cours = $coursRepositoty->getUserCoursMatinID($ID_Promo);
$ID_CoursApresMidi = $coursRepositoty->getUserCoursApresMidiID($ID_Promo);

$getCode = $coursRepositoty->getStoredCode();
$getCodeApresMidi = $coursRepositoty->getStoredCodeApresMidi();

 