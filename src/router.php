<?php

use src\Controllers\HomeController;
use src\Controllers\PromoController;
use src\Controllers\UtilisateurController;
use src\Controllers\CoursController;

// use src\Services\Routing;

$HomeController = new HomeController;
$PromoController = new PromoController;
$UtilisateurController = new UtilisateurController;
$CoursController = new CoursController;


$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];

switch ($route) {
  case HOME_URL:

    if ($methode == 'POST') {
      // $HomeController->authAdmin();
      $UtilisateurController->treatmentConnection();
    } else {
      $HomeController->index();
    }
    break;

  case HOME_URL . 'dashboard': {
      $HomeController->displayDashboard();
    }

    break;


  case HOME_URL . 'promotions':
    $HomeController->displayAllPromotions();

    break;

  case HOME_URL . 'ajouterPromotion':

    if ($methode == 'POST') {
      $PromoController->createPromo();
    } elseif ($methode == 'GET') {
      $HomeController->displayFormAjouterPromotion();
    } else {
      $HomeController->displayFormAjouterPromotion();
    }
    break;

  case HOME_URL . 'deletePromotion':
    $PromoController->deleteThisPromo();

    break;

  case HOME_URL . 'deleteUser':
    $UtilisateurController->deleteThisUser();

    break;

  case HOME_URL . 'validationCompteGET':

    if ($methode == 'POST') {
      $UtilisateurController->createUserPassword();
    } else {
      $HomeController->validationCompte();
    }
    break;

  case HOME_URL . 'displayThisPromo':
    $HomeController->displayThisPromo();

    break;

  case HOME_URL . 'generateCodeMatin':
    $CoursController->generateCodeMatin();

    break;


  case HOME_URL . 'generateCodeApresMidi':
    $CoursController->generateCodeApresMidi();

    break;

  case HOME_URL . 'codeValidationMatin':
    $CoursController->codeValidationMatin();

    break;

    case HOME_URL . 'codeValidationApresMidi':
      $CoursController->codeValidationApresMidi();
  
      break;

  case HOME_URL . 'ajouterApprenant':

    if ($methode == 'POST') {
      $UtilisateurController->treatmentCreateNewUser();
    } elseif ($methode == 'GET') {
      $HomeController->displayFormAjouterApprenant();
    }
    break;


  case HOME_URL . 'deconnexion':
    $HomeController->quit();
    break;


  default:
    $HomeController->page404();
    break;
}
