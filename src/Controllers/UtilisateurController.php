<?php

namespace src\Controllers;

use src\Repositories\UtilisateurRepository;
use src\Services\Reponse;

class UtilisateurController
{

  use Reponse;

  
  public function treatmentCreateNewUser()
  {
      $request = file_get_contents('php://input');
  
      if ($request) {
          $decodedRequest = json_decode($request);
  
          if ($decodedRequest) {
              $data = [
                  'Nom' => htmlspecialchars($decodedRequest->Nom),
                  'Prenom' => htmlspecialchars($decodedRequest->Prenom),
                  'Email' => htmlspecialchars($decodedRequest->Email)
              ];
  
              $UtilisateurRepository = new UtilisateurRepository();
              $UtilisateurRepository->createUser($data);
  
              //   $ID_Promo = $promoRepository->getLastInsertedId();
  
              include_once __DIR__ . '/../Views/dashboard.php';
          }
      }
  }
  

  }


