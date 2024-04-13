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
}
