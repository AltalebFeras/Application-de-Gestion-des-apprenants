<?php

namespace src\Repositories;

use PDO;
use PDOException;
use src\Models\Promo;
use src\Models\Database;

class PromoRepository
{


    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();

        require_once __DIR__ . '/../../config.php';
    }


    public function insertPromo($promoNom, $dateDebut, $dateFin, $placeDispo)
    {

        $database = new Database();

        $query = $database->getDB()->prepare('
            INSERT INTO ' . PREFIXE . 'Promos (Nom, Date_Debut, Date_Fin, Place_Dispo) 
            VALUES (:promoNom, :dateDebut, :dateFin, :placeDispo )
        ');

        $query->execute([
            'promoNom' => $promoNom,
            'dateDebut' => $dateDebut,
            'dateFin' => $dateFin,
            'placeDispo' => $placeDispo,
        ]);
    }


    public function getAllPromotions()
    {
        try {
            $query = $this->DB->query('SELECT * FROM ' . PREFIXE . 'Promos');
            $promotions = $query->fetchAll(PDO::FETCH_ASSOC);

            $promoObjects = [];
            foreach ($promotions as $promotion) {
                $promo = new Promo();
                $promo->ID_Promo = $promotion['ID_Promo'];
                $promo->Nom = $promotion['Nom'];
                $promo->dateDebut = $promotion['Date_Debut'];
                $promo->dateFin = $promotion['Date_Fin'];
                $promo->placeDispo = $promotion['Place_Dispo'];
                $promoObjects[] = $promo;
            }

            return $promoObjects;
        } catch (PDOException $e) {
            return [];
        }
    }


    public function getThisPromo(): array
    {
        $promoData = array();
    
        $requestPayload = json_decode(file_get_contents('php://input'));
    
        if ($requestPayload && isset($requestPayload->idThisPromo)) {
            $idThisPromo = htmlspecialchars($requestPayload->idThisPromo);
    
            $query = $this->DB->prepare('SELECT * FROM '. PREFIXE .'Promos WHERE ID_Promo = :idThisPromo');
    
            $query->bindParam(':idThisPromo', $idThisPromo, PDO::PARAM_INT);
    
            $query->execute();
    
            $promo = $query->fetch(PDO::FETCH_ASSOC);
            
            if ($promo) {
                $promoData['ID_Promo'] = $promo['ID_Promo'];
                $promoData['Nom'] = $promo['Nom'];
                $promoData['Date_Debut'] = $promo['Date_Debut'];
                $promoData['Date_Fin'] = $promo['Date_Fin'];
                $promoData['Place_Dispo'] = $promo['Place_Dispo'];
            }
        }
    
        return $promoData;
    }
  

public function deletePromo($idThisPromo)
{
    $database = new Database();

    $query = $database->getDB()->prepare('
        DELETE FROM ' . PREFIXE . 'Promos WHERE ID_Promo = :ID_Promo
    ');

    $query->execute(['ID_Promo' => $idThisPromo]);
}





}
