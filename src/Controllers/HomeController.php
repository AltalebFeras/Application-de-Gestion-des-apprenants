<?php

namespace src\Controllers;

use src\Services\Reponse;

class HomeController
{

  use Reponse;

  public function index(): void
  {
    if (isset($_GET['erreur'])) {
      $erreur = htmlspecialchars($_GET['erreur']);
    } else {
      $erreur = '';
    }

    $this->render("accueil", ["erreur" => $erreur]);
  }
 


  public function indexAdmin(): void
  {
    $erreur = isset($_GET['erreur']) ? htmlspecialchars($_GET['erreur']) : 'error';

    $_SESSION['role']= 'admin';

    $this->render("admin", ["erreur" => $erreur]);
  }
  
  public function auth(){
    // Check if it's an AJAX request
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
        // Get the data from the request body
        $data = file_get_contents('php://input');

        // Decode the JSON data
        $data = json_decode($data);

        // Process the data (in this case, just echoing it back)
        echo json_encode("Server response: I received ".$data);
        exit(); // Make sure to exit to prevent further execution
    }
}

  public function authAdmin(string $Email, string $Mot_De_Passe): void 
{
    if ($Email === 'admin@simplon.co' && $Mot_De_Passe === 'admin') {
        $_SESSION['connecté'] = true;
        $_SESSION['role'] = 'admin';
        header('Location: ' . HOME_URL . 'dashboard');
        exit();
    } else {
        header('Location: ' . HOME_URL . 'admin' . '?erreur=connexion');
        exit();
    }
}
// For example, in your HomeController:
public function showDashboard()
{
    if (isset($_SESSION["connecté"])) {
      $this->render("dashboard", ["erreur" => ""]);
    } else {
        $this->page404();
    }
}

 
  public function quit()
  {
    session_destroy();
    header('location: ' . HOME_URL);
    die();
  }

  public function page404(): void
  {
    header("HTTP/1.1 404 Not Found");
    $this->render('404');
  }
}
