<?php

namespace src\Models;

use src\Services\Hydratation;

class Promo
{

    private $ID_Promo;
    private $Nom;
    private $Date_Debut;
    private $Date_Fin;
    private $Place_Dispo;

    use Hydratation;



    /**
     * Get the value of ID_Promo
     *
     * @return  mixed
     */
    public function getIDPromo()
    {
        return $this->ID_Promo;
    }

    /**
     * Set the value of ID_Promo
     *
     * @param   mixed  $ID_Promo  
     *
     */
    public function setIDPromo($ID_Promo)
    {
        $this->ID_Promo = $ID_Promo;
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
     * Get the value of Date_Debut
     *
     * @return  mixed
     */
    public function getDateDebut()
    {
        return $this->Date_Debut;
    }

    /**
     * Set the value of Date_Debut
     *
     * @param   mixed  $Date_Debut  
     *
     */
    public function setDateDebut($Date_Debut)
    {
        $this->Date_Debut = $Date_Debut;
    }

    /**
     * Get the value of Date_Fin
     *
     * @return  mixed
     */
    public function getDateFin()
    {
        return $this->Date_Fin;
    }

    /**
     * Set the value of Date_Fin
     *
     * @param   mixed  $Date_Fin  
     *
     */
    public function setDateFin($Date_Fin)
    {
        $this->Date_Fin = $Date_Fin;
    }

    /**
     * Get the value of Place_Dispo
     *
     * @return  mixed
     */
    public function getPlaceDispo()
    {
        return $this->Place_Dispo;
    }

    /**
     * Set the value of Place_Dispo
     *
     * @param   mixed  $Place_Dispo  
     *
     */
    public function setPlaceDispo($Place_Dispo)
    {
        $this->Place_Dispo = $Place_Dispo;
    }
}
