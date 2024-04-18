<?php

namespace src\Repositories;


$promoRepository = new PromoRepository();
$promotions = $promoRepository->getAllPromotions();
$promoDetails = $promoRepository->getThisPromo();


$utilisateurRepository = new UtilisateurRepository();
$utilisateurs= $utilisateurRepository->getAllUtilisateurs();


