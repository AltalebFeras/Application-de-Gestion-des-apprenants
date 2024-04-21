<?php

namespace src\Models;

use src\Services\Hydratation;

class  Cours
{

    private $ID_Cours;
    private $Date_Cours;
    private $Heure_Debut;
    private $Heure_Fin;
    private $Code_Aleatoire;

    use Hydratation;


    /**
     * Get the value of ID_Cours
     *
     * @return  mixed
     */
    public function getIDCours()
    {
        return $this->ID_Cours;
    }

    /**
     * Set the value of ID_Cours
     *
     * @param   mixed  $ID_Cours  
     *
     */
    public function setIDCours($ID_Cours)
    {
        $this->ID_Cours = $ID_Cours;

    }

    /**
     * Get the value of Date_Cours
     *
     * @return  mixed
     */
    public function getDateCours()
    {
        return $this->Date_Cours;
    }

    /**
     * Set the value of Date_Cours
     *
     * @param   mixed  $Date_Cours  
     *
     */
    public function setDateCours($Date_Cours)
    {
        $this->Date_Cours = $Date_Cours;

    }

    /**
     * Get the value of Heure_Debut
     *
     * @return  mixed
     */
    public function getHeureDebut()
    {
        return $this->Heure_Debut;
    }

    /**
     * Set the value of Heure_Debut
     *
     * @param   mixed  $Heure_Debut  
     *
     */
    public function setHeureDebut($Heure_Debut)
    {
        $this->Heure_Debut = $Heure_Debut;

    }

    /**
     * Get the value of Heure_Fin
     *
     * @return  mixed
     */
    public function getHeureFin()
    {
        return $this->Heure_Fin;
    }

    /**
     * Set the value of Heure_Fin
     *
     * @param   mixed  $Heure_Fin  
     *
     */
    public function setHeureFin($Heure_Fin)
    {
        $this->Heure_Fin = $Heure_Fin;

    }

    /**
     * Get the value of Code_Aleatoire
     *
     * @return  mixed
     */
    public function getCodeAleatoire()
    {
        return $this->Code_Aleatoire;
    }

    /**
     * Set the value of Code_Aleatoire
     *
     * @param   mixed  $Code_Aleatoire  
     *
     */
    public function setCodeAleatoire($Code_Aleatoire)
    {
        $this->Code_Aleatoire = $Code_Aleatoire;

    }
}