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

    public function getLastInsertedId()
    {
        return $this->DB->lastInsertId();
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
}
