<?php

use src\Controllers\HomeController;
use src\Services\Routing;

$HomeController = new HomeController;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];
$routeComposee = Routing::routeComposee($route);


switch ($route) {
  case HOME_URL:

    if ($methode == 'POST') {
      $HomeController->authAdmin();
    } else {
      $HomeController->index();
    }
    break;

    case HOME_URL . 'dashboard':

      $HomeController->displayDashboard();
      break;

  case HOME_URL . 'ajouterPromotion':

    $HomeController->displayFormAjouterPromotion();
    break;



  case HOME_URL . 'deconnexion':
    $HomeController->quit();
    break;


  default:
    $HomeController->page404();
    break;
}
