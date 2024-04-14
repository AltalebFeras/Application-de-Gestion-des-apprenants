<?php

namespace src\Models;

use src\Services\Hydratation;

class Utilisateur
{
    private $ID_Utilisateur	;
    private $Nom;
    private $Prenom;
    private $Email;
    private $Mot_De_Passe;
    private $Compte_Active;
    private $ID_Role;

    use Hydratation;



    /**
     * Get the value of ID_Utilisateur
     *
     * @return  mixed
     */
    public function getIDUtilisateur()
    {
        return $this->ID_Utilisateur;
    }

    /**
     * Set the value of ID_Utilisateur
     *
     * @param   mixed  $ID_Utilisateur  
     *
     */
    public function setIDUtilisateur($ID_Utilisateur)
    {
        $this->ID_Utilisateur = $ID_Utilisateur;

    }

    /**
     * Get the value of Nom
     *
     * @return  mixed
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * Set the value of Nom
     *
     * @param   mixed  $Nom  
     *
     */
    public function setNom($Nom)
    {
        $this->Nom = $Nom;

    }

    /**
     * Get the value of Prenom
     *
     * @return  mixed
     */
    public function getPrenom()
    {
        return $this->Prenom;
    }

    /**
     * Set the value of Prenom
     *
     * @param   mixed  $Prenom  
     *
     */
    public function setPrenom($Prenom)
    {
        $this->Prenom = $Prenom;

    }

    /**
     * Get the value of Email
     *
     * @return  mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Set the value of Email
     *
     * @param   mixed  $Email  
     *
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;

    }

    /**
     * Get the value of Mot_De_Passe
     *
     * @return  mixed
     */
    public function getMotDePasse()
    {
        return $this->Mot_De_Passe;
    }

    /**
     * Set the value of Mot_De_Passe
     *
     * @param   mixed  $Mot_De_Passe  
     *
     */
    public function setMotDePasse($Mot_De_Passe)
    {
        $this->Mot_De_Passe = $Mot_De_Passe;

    }

    /**
     * Get the value of Compte_Active
     *
     * @return  mixed
     */
    public function getCompteActive()
    {
        return $this->Compte_Active;
    }

    /**
     * Set the value of Compte_Active
     *
     * @param   mixed  $Compte_Active  
     *
     */
    public function setCompteActive($Compte_Active)
    {
        $this->Compte_Active = $Compte_Active;

    }

    /**
     * Get the value of ID_Role
     *
     * @return  mixed
     */
    public function getIDRole()
    {
        return $this->ID_Role;
    }

    /**
     * Set the value of ID_Role
     *
     * @param   mixed  $ID_Role  
     *
     */
    public function setIDRole($ID_Role)
    {
        $this->ID_Role = $ID_Role;

    }
}