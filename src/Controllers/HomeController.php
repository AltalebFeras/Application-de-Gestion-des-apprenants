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
 


  
public function authAdmin()
{
    $request = file_get_contents('php://input');

    if ($request) {
        $decodedRequest = json_decode($request);

        if ($decodedRequest) {
            $email = htmlspecialchars($decodedRequest->email);
            $password = htmlspecialchars($decodedRequest->password); 
            if ($email === 'admin@simplon.co' && $password === 'admin') { 
                $_SESSION['connecté'] = true;
                $_SESSION['role'] = 'admin';
             
                var_dump($_SESSION['role']);
  
                // $userId = 188;

                include_once __DIR__ . '/../Views/dashboard.php';
            } else {
                exit(); // Removed unnecessary exit() statement
            }
        } else {
            header('Location: ' . HOME_URL . '?erreur=connexion');
            exit();
        }
    } else {
        header('Location: ' . HOME_URL . '?erreur=connexion');
        exit();
    }
}


 
  public function quit()
  {
    session_destroy();
    echo json_encode(["success" => true]);
    exit;
  }

  public function page404(): void
  {
    header("HTTP/1.1 404 Not Found");
    $this->render('404');
  }





public function showDashboard()
{
    if (isset($_SESSION["connecté"])) {
      $this->render("dashboard", ["erreur" => ""]);
    } else {
        $this->page404();
    }
}

}