<?php

use src\Controllers\HomeController;
use src\Services\Routing;

$HomeController = new HomeController;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];
$routeComposee = Routing::routeComposee($route);


switch ($route) {
  case HOME_URL:
    if (isset($_SESSION['connecté'])) {
      header('location: ' . HOME_URL . 'dashboard');
      die;
    }
    if ( !isset($_SESSION['connecté']) && $methode === 'POST') {
      $HomeController->authAdmin($_POST['Email'] ,$_POST['Mot_De_Passe']);
   
    } else {
      $HomeController->index();
    }
    break;

    case HOME_URL . 'dashboard':
      if (isset($_SESSION['connecté'])) {
    $HomeController->showDashboard(); 
    die;
  } else {
    $HomeController->page404();
  }

    break;

  case HOME_URL . 'deconnexion':
    $HomeController->quit();
    break;

  case $routeComposee[0] == "dashboard":
    if (isset($_SESSION["connecté"])) {

      switch ($route) {
        case $routeComposee[1] == "compte":
          if ($methode === "POST") {
           
          }
          if (isset($_SESSION["connecté"])) {
          }
          break;
        case $routeComposee[1] == "reservation":
          break;
        
        case $routeComposee[1] == 'deconnexion':
          $HomeController->quit();

          break;
        default:
          if (isset($_SESSION["connecté"])) {

            $HomeController->showDashboard();
          }
          break;
      }
    } else {
      header("location: " . HOME_URL);
      die;
    }
    break;

  default:
    $HomeController->page404();
    break;
}
