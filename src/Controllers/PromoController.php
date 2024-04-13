<?php

namespace src\Controllers;

use src\Repositories\PromoRepository;
use src\Services\Reponse;

class PromoController
{

  use Reponse;

  
  public function createPromo()
  {
      $request = file_get_contents('php://input');

      if ($request) {
          $decodedRequest = json_decode($request);

          if ($decodedRequest) {
              $promoNom = htmlspecialchars($decodedRequest->promoNom);
              $dateDebut = htmlspecialchars($decodedRequest->dateDebut);
              $dateFin = htmlspecialchars($decodedRequest->dateFin);
              $placeDispo = htmlspecialchars($decodedRequest->placeDispo);

              $promoRepository = new PromoRepository();
              $promoRepository->insertPromo($promoNom, $dateDebut, $dateFin, $placeDispo);

            //   $ID_Promo = $promoRepository->getLastInsertedId();

              include_once __DIR__ . '/../Views/dashboard.php';
          }
      }
  }

  }


