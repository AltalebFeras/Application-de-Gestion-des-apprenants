<?php

namespace src\Repositories;

use PDO;
use PDOException;
use src\Models\Cours;
use src\Models\Database;

class CoursRepositoty
{
    public function insertNewCodeMatin()
    {


        $Date_Cours = date("Y-m-d");

        $Heure_Debut = date("H:i:s", strtotime('9:00:00'));


        $Heure_Fin = date("H:i:s", strtotime('12:00:00'));

        $Code_Aleatoire = "";
        for ($i = 0; $i < 5; $i++) {
            $Code_Aleatoire .= rand(0, 9);
        }

        $ID_Promo = $_SESSION['ID_Promo'];

        $database = new Database();

        $query = $database->getDB()->prepare('
INSERT INTO ' . PREFIXE . 'cours (Date_Cours, Heure_Debut, Heure_Fin, Code_Aleatoire, ID_Promo) 
VALUES (:Date_Cours, :Heure_Debut, :Heure_Fin, :Code_Aleatoire, :ID_Promo)
');

        $query->execute([
            'Date_Cours' => $Date_Cours,
            'Heure_Debut' => $Heure_Debut,
            'Heure_Fin' => $Heure_Fin,
            'Code_Aleatoire' => $Code_Aleatoire,
            'ID_Promo' => $ID_Promo,
        ]);
    }


    public function insertNewCodeApreMidi()
    {


        $Date_Cours = date("Y-m-d");

        $Heure_Debut = date("H:i:s", strtotime('13:00:00'));


        $Heure_Fin = date("H:i:s", strtotime('17:00:00'));

        $Code_Aleatoire = "";
        for ($i = 0; $i < 5; $i++) {
            $Code_Aleatoire .= rand(0, 9);
        }

        $ID_Promo = $_SESSION['ID_Promo'];

        $database = new Database();

        $query = $database->getDB()->prepare('
    INSERT INTO ' . PREFIXE . 'cours (Date_Cours, Heure_Debut, Heure_Fin, Code_Aleatoire, ID_Promo) 
    VALUES (:Date_Cours, :Heure_Debut, :Heure_Fin, :Code_Aleatoire, :ID_Promo)
    ');

        $query->execute([
            'Date_Cours' => $Date_Cours,
            'Heure_Debut' => $Heure_Debut,
            'Heure_Fin' => $Heure_Fin,
            'Code_Aleatoire' => $Code_Aleatoire,
            'ID_Promo' => $ID_Promo,
        ]);
    }

    public function displayCodeMatin()
    {
        $Heure_Debut = date("H:i:s", strtotime('9:00:00'));
        $ID_Promo = $_SESSION['ID_Promo'];
    
        $db = new Database();
        $conn = $db->getDB();
    
        $request = 'SELECT Code_Aleatoire FROM ' . PREFIXE . 'cours WHERE ID_Promo = ? AND Heure_Debut = ?';
        $stmt = $conn->prepare($request);
        $stmt->bindValue(1, $ID_Promo);
        $stmt->bindValue(2, $Heure_Debut);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($result) {
            return strval($result['Code_Aleatoire']);
        } else {
            return '';  
        }
    }
    


    public function displayCodeApreMidi()
    {
        $Heure_Debut = date("H:i:s", strtotime('13:00:00'));
        $ID_Promo = $_SESSION['ID_Promo'];

        $db = new Database();
        $conn = $db->getDB();

        $request = 'SELECT Code_Aleatoire FROM ' . PREFIXE . 'cours WHERE ID_Promo = ? AND Heure_Debut = ?';
        $stmt = $conn->prepare($request);
        $stmt->bindValue(1, $ID_Promo);
        $stmt->bindValue(2, $Heure_Debut);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
