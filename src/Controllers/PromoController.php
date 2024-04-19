<?php

namespace src\Controllers;

use src\Repositories\PromoRepository;

class PromoController
{

  // use Reponse;


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

        $promotions = $promoRepository->getAllPromotions();

        include_once __DIR__ . '/../Views/components/tablePromo.php';
      }
    }
  }
  public function deleteThisPromo()
  {
    $request = file_get_contents('php://input');

    if ($request) {
      $decodedRequest = json_decode($request);

      if ($decodedRequest) {
        $idThisPromo = htmlspecialchars($decodedRequest->idThisPromo);

        $promoRepository = new PromoRepository();
        $promoRepository->deletePromo($idThisPromo);
        $promotions = $promoRepository->getAllPromotions();
        include_once __DIR__ . '/../Views/components/tablePromo.php';


      }
    } else {
      echo "Invalid request";
    }
  }
}
