<?php

namespace src\Repositories;

use PDO;
use PDOException;
use src\Models\Utilisateur;
use src\Models\Database;

class UtilisateurRepository
{


    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();

        require_once __DIR__ . '/../../config.php';
    }


    public function createUser($data)
    {
        $Nom = isset($data['Nom']) ? htmlspecialchars($data['Nom']) : null;
        $Prenom = isset($data['Prenom']) ? htmlspecialchars($data['Prenom']) : null;
        $Email = isset($data['Email']) ? htmlspecialchars($data['Email']) : null;

        $Compte_Active = isset($data['Compte_Active']) ? $data['Compte_Active'] : 'Non';
        $ID_Role = isset($data['ID_Role']) ? $data['ID_Role'] : null;
        $ID_Promo = isset($data['ID_Promo']) ? $data['ID_Promo'] : null;

        $database = new Database();

        $query1 = $database->getDB()->prepare('
        INSERT INTO ' . PREFIXE . 'utilisateurs (Nom, Prenom, Email, Compte_Active, ID_Role) 
        VALUES (:Nom, :Prenom, :Email, :Compte_Active, :ID_Role)
    ');

        $query1->execute([
            'Nom' => $Nom,
            'Prenom' => $Prenom,
            'Email' => $Email,
            'Compte_Active' => $Compte_Active,
            'ID_Role' => $ID_Role,
        ]);

        $ID_Utilisateur = $database->getDB()->lastInsertId();
        $query2 = $database->getDB()->prepare('
        INSERT INTO ' . PREFIXE . 'utilisateurs_promos (ID_Utilisateur, ID_Promo) 
        VALUES (:ID_Utilisateur, :ID_Promo)
    ');

        $query2->execute([
            'ID_Utilisateur' => $ID_Utilisateur,
            'ID_Promo' => $ID_Promo,
        ]);
    }


    public function getLastInsertedId()
    {
        return $this->DB->lastInsertId();
    }
    public function getID_Promo($data)
    {
        $ID_Promo = isset($data['ID_Promo']) ? $data['ID_Promo'] : null;
    }

    public function getAllUtilisateurs()
{
    try {
        $requestPayload = json_decode(file_get_contents('php://input'));

        // Validate and sanitize input
        $idThisPromo = null;
        if ($requestPayload && isset($requestPayload->idThisPromo)) {
            $idThisPromo = htmlspecialchars($requestPayload->idThisPromo);
        }

        $query = "SELECT * 
            FROM " . PREFIXE . "utilisateurs
            JOIN " . PREFIXE . "utilisateurs_promos
            ON " . PREFIXE . "utilisateurs.ID_Utilisateur = " . PREFIXE . "utilisateurs_promos.ID_Utilisateur";

        if ($idThisPromo !== null) {
            $query .= " WHERE " . PREFIXE . "utilisateurs_promos.ID_Promo = :promo_id";
        } else {
            $query .= " WHERE " . PREFIXE . "utilisateurs_promos.ID_Promo = :promo_id";
        }

        $stmt = $this->DB->prepare($query);

        if ($idThisPromo !== null) {
            $stmt->bindParam(':promo_id', $idThisPromo);
        } else {
            $stmt->bindParam(':promo_id', $_SESSION['ID_Promo']);
        }

        $stmt->execute();

        $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $utilisateurObjects = [];
        foreach ($utilisateurs as $utilisateur) {
            $user = new Utilisateur();
            $user->ID_Utilisateur = $utilisateur['ID_Utilisateur'];
            $user->Nom = $utilisateur['Nom'];
            $user->Prenom = $utilisateur['Prenom'];
            $user->Email = $utilisateur['Email'];
            $user->Compte_Active = $utilisateur['Compte_Active'];
            $user->ID_Role = $utilisateur['ID_Role'];
            $utilisateurObjects[] = $user;
        }

        return $utilisateurObjects;
    } catch (PDOException $e) {
        // Log or handle the exception appropriately
        error_log("Error fetching utilisateurs: " . $e->getMessage());
        return [];
    }
}




    public function deleteUser($idThisUser)
    {
        $database = new Database();

        $query = $database->getDB()->prepare('
            DELETE FROM ' . PREFIXE . 'utilisateurs WHERE ID_Utilisateur = :ID_Utilisateur
        ');

        $query->execute(['ID_Utilisateur' => $idThisUser]);
    }

    public function getUserByHashedEmail($Email)
    {
        try {
            $query = $this->DB->prepare('SELECT * FROM ' . PREFIXE . 'utilisateurs WHERE Email = :Email');
            $query->execute(['Email' => $Email]);
            $user = $query->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                return $user; // Return the user data directly
            }

            return null;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function updateUserPassword($Email, $hashedPassword)
    {
        try {
            $user = $this->getUserByHashedEmail($Email);

            if ($user) {
                $userID = $user['ID_Utilisateur'];

                $query = $this->DB->prepare('UPDATE ' . PREFIXE . 'utilisateurs SET Mot_De_Passe = :Mot_De_Passe, Compte_Active = :Compte_Active WHERE ID_Utilisateur = :ID_Utilisateur');
                $query->execute([
                    'ID_Utilisateur' => $userID,
                    'Mot_De_Passe' => $hashedPassword,
                    'Compte_Active' => 'Oui'
                ]);


                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
}
