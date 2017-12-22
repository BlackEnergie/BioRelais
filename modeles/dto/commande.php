<?php
class commande
{
    use hydrate;

    private $numCommande;

    private $Adherent;
    private $Annee;
    private $Semaine;

    /**
     * commande constructor.
     * @param $numCommande
     * @param $Adherent
     * @param $Annee
     * @param $Semaine
     */
    public function __construct()
    {

    }

////////////////////////////////////////////////////////////////////////////////
//////////////// GET/SET
////////////////////////////////////////////////////////////////////////////////

    /**
     * @return mixed
     */
    public function getNumCommande()
    {
        return $this->numCommande;
    }

    /**
     * @param mixed $numCommande
     */
    public function setNumCommande($numCommande)
    {
        $this->numCommande = $numCommande;
    }

    /**
     * @return mixed
     */
    public function getAdherent()
    {
        return $this->Adherent;
    }

    /**
     * @param mixed $Adherent
     */
    public function setAdherent($Adherent)
    {
        $this->Adherent = $Adherent;
    }

    /**
     * @return mixed
     */
    public function getAnnee()
    {
        return $this->Annee;
    }

    /**
     * @param mixed $Annee
     */
    public function setAnnee($Annee)
    {
        $this->Annee = $Annee;
    }

    /**
     * @return mixed
     */
    public function getSemaine()
    {
        return $this->Semaine;
    }

    /**
     * @param mixed $Semaine
     */
    public function setSemaine($Semaine)
    {
        $this->Semaine = $Semaine;
    }



    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }


}