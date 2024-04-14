<?php

use src\Controllers\HomeController;
use src\Controllers\PromoController;
use src\Controllers\UtilisateurController;
use src\Services\Routing;

$HomeController = new HomeController;
$PromoController = new PromoController;
$UtilisateurController = new UtilisateurController;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];
$routeComposee = Routing::routeComposee($route);


// if ($methode === 'POST') {
//   if (isset($_POST['form_id'])) {
//     $formId = $_POST['form_id'];
//     switch ($formId) {
//       case '2':
//         $PromoController->createPromo();

//         break;

//       default:
//         break;
//     }
//   }
// } 
switch ($route) {
  case HOME_URL:

    if ($methode == 'POST') {
      $HomeController->authAdmin();
    } else {
      $HomeController->index();
    }
    break;

  case HOME_URL . 'dashboard':
    if ($methode == 'POST') {
      $PromoController->createPromo();
    } else {
      $HomeController->displayDashboard();
    }

    break;

  case HOME_URL . 'ajouterPromotion':

    if ($methode == 'POST') {
      $PromoController->createPromo();
    } elseif ($methode == 'GET') {
      $HomeController->displayFormAjouterPromotion();
    }
    break;

  case HOME_URL . 'displayThisPromo':
    $HomeController->displayThisPromo();

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
