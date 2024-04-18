<?php

namespace src\Controllers;

use src\Repositories\PromoRepository;

class HomeController
{

  // use Reponse;

  public function index(): void
  {
    // $this->render("connexion", ["erreur" => ""]);
    include_once __DIR__ . '/../Views/connexion.php';
  }




  public function authAdmin()
  {
    $request = file_get_contents('php://input');

    if ($request) {
      $decodedRequest = json_decode($request);

      if ($decodedRequest) {
        $email = htmlspecialchars($decodedRequest->email);
        $password = htmlspecialchars($decodedRequest->password);
        if ($email === 'admin@simplon.co' && $password === '$') {
          $_SESSION['connected'] = true;
          $_SESSION['role'] = 'admin';

          include_once __DIR__ . '/../Views/dashboard.php';
          // echo json_encode(array("success" => true));
          exit();
        } else {
          echo json_encode(array("success" => false, "error" => "Incorrect email or password."));
          exit();
        }
      } else {
        echo json_encode(array("success" => false, "error" => "Invalid request data."));
        exit();
      }
    } else {
      echo json_encode(array("success" => false, "error" => "Empty request data."));
      exit();
    }
  }

  public function displayFormAjouterPromotion()
  {
    include_once __DIR__ . '/../Views/ajouterPromotion.php';
  }

  public function displayDashboard()
  {
    include_once __DIR__ . '/../Services/callRepo.php';

    include_once __DIR__ . '/../Views/dashboard.php';
  }

  public function displayThisPromo()
  {

    $promoRepository = new PromoRepository();
    $promoDetails = $promoRepository->getThisPromo();

    include_once __DIR__ . '/../Views/displayThisPromo.php';
  }

  public function displayFormAjouterApprenant()
  {
    include_once __DIR__ . '/../Views/ajouterApprenant.php';
  }

  public function displayAllPromotions()
  {

    include_once __DIR__ . '/../Views/components/promotions.php';
  }
  public function quit()
  {
    session_destroy();
    $_SESSION['connected'] = false;
    include_once __DIR__ . '/../Views/connexion.php';
  }

  public function page404(): void
  {
    header("HTTP/1.1 404 Not Found");
    include_once __DIR__ . '/../Views/404.php';
  }
}
