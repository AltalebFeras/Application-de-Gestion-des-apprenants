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
    
        $Compte_Active = isset($data['Compte_Active']) ? $data['Compte_Active'] : 'NON';
        $ID_Role = isset($data['ID_Role']) ? $data['ID_Role'] : 1;
    
        $database = new Database();
    
        $query = $database->getDB()->prepare('
            INSERT INTO ' . PREFIXE . 'utilisateurs (Nom, Prenom, Email, Compte_Active, ID_Role) 
            VALUES (:Nom, :Prenom, :Email, :Compte_Active, :ID_Role)
        ');
    
        $query->execute([
            'Nom' => $Nom,
            'Prenom' => $Prenom,
            'Email' => $Email,
            'Compte_Active' => $Compte_Active,
            'ID_Role' => $ID_Role,
        ]);
    }
    

    public function getLastInsertedId()
    {
        return $this->DB->lastInsertId();
    }

    public function getAllUtilisateurs()
    {
        try {
            $query = $this->DB->query('SELECT * FROM ' . PREFIXE . 'utilisateurs');
            $utilisateurs = $query->fetchAll(PDO::FETCH_ASSOC);

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
            return [];
        }
    }
}

