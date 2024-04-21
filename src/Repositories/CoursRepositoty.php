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


    public function insertNewCodeApresMidi()
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



    public function displayCodeApresMidi()
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

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return strval($result['Code_Aleatoire']);
        } else {
            return '';
        }
    }




    public function getUserPromoID($ID_Utilisateur)
    {
        try {
            $db = new Database();
            $conn = $db->getDB();
            $ID_Utilisateur = $_SESSION['ID_Utilisateur'];
            $request = 'SELECT ID_Promo FROM ' . PREFIXE . 'utilisateurs_promos WHERE ID_Utilisateur = ?';

            $stmt = $conn->prepare($request);
            $stmt->bindValue(1, $ID_Utilisateur);
            $stmt->execute();

            $ID_Promo = $stmt->fetchColumn();

            if ($ID_Promo !== false) {
                return strval($ID_Promo);
            } else {
                return '';
            }
        } catch (PDOException $e) {

            error_log('PDOException: ' . $e->getMessage());
            return '';
        }
    }
    public function getUserCoursID($ID_Promo)
    {
        try {
            $db = new Database();
            $conn = $db->getDB();

            $ID_Utilisateur = $_SESSION['ID_Utilisateur'];

            $ID_Promo = $this->getUserPromoID($ID_Utilisateur);

            $request = 'SELECT ID_Cours FROM ' . PREFIXE . 'cours WHERE ID_Promo = ?';

            $stmt = $conn->prepare($request);
            $stmt->bindParam(1, $ID_Promo, PDO::PARAM_INT);
            $stmt->execute();

            $ID_Cours = $stmt->fetchColumn();

            if ($ID_Cours !== false) {
                return strval($ID_Cours);
            } else {
                return '';
            }
        } catch (PDOException $e) {

            error_log('PDOException: ' . $e->getMessage());
            return '';
        }
    }



    public function getStoredCode()
    {
        try {

            $ID_Utilisateur = $_SESSION['ID_Utilisateur'];
            $ID_Promo = $this->getUserPromoID($ID_Utilisateur);
            $Date_Cours = date("Y-m-d");
            $Heure_Debut = date("H:i:s", strtotime('9:00:00'));

            $db = new Database();
            $conn = $db->getDB();



            $request = 'SELECT Code_Aleatoire FROM ' . PREFIXE . 'cours WHERE ID_Promo = ? AND Date_Cours = ? AND Heure_Debut = ?';

            $stmt = $conn->prepare($request);

            $stmt->bindParam(1, $ID_Promo, PDO::PARAM_INT);
            $stmt->bindParam(2, $Date_Cours, PDO::PARAM_STR);
            $stmt->bindParam(3, $Heure_Debut, PDO::PARAM_STR);
            $stmt->execute();

            $ID_Cours = $stmt->fetchColumn();

            if ($ID_Cours !== false) {
                return strval($ID_Cours);
            } else {
                return '';
            }
        } catch (PDOException $e) {
            error_log('PDOException: ' . $e->getMessage());
            return '';
        }
    }


    public function singer($data)
    {

        $Code_Aleatoire = isset($data['Code_Aleatoire']) ? $data['Code_Aleatoire'] : null;
        $Code_AleatoireStored = $this->getStoredCode();

        if ($Code_Aleatoire ===  $Code_AleatoireStored) {

            $ID_Utilisateur = $_SESSION['ID_Utilisateur'];
            $ID_Promo = $this->getUserPromoID($ID_Utilisateur);
            $ID_Cours = $this->getUserCoursID($ID_Promo);
            $Status = "présent";


            $database = new Database();

            $query = $database->getDB()->prepare('
INSERT INTO ' . PREFIXE . 'participation_statuts (ID_Cours, ID_Utilisateur, Status) 
VALUES (:ID_Cours, :ID_Utilisateur, :Status)
');

            $query->execute([
                'ID_Cours' => $ID_Cours,
                'ID_Utilisateur' => $ID_Utilisateur,
                'Status' => $Status

            ]);
        }
        else {
            
            echo json_encode(['error' => 'Invalid code. Please try again.']);
        }
    
    }
    
}
