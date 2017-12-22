<?php
class produit
{
    use hydrate;

    private $codeProduit;
    private $nomProduit;
    private $descriptif;
    private $unite;

    private $Categorie;
    private $Producteur;


    public function __construct()
    {

    }

////////////////////////////////////////////////////////////////////////////////
//////////////// GET/SET
////////////////////////////////////////////////////////////////////////////////

    /**
     * @return mixed
     */
    public function getCodeProduit()
    {
        return $this->codeProduit;
    }

    /**
     * @param mixed $codeProduit
     */
    public function setCodeProduit($codeProduit)
    {
        $this->codeProduit = $codeProduit;
    }

    /**
     * @return mixed
     */
    public function getNomProduit()
    {
        return $this->nomProduit;
    }

    /**
     * @param mixed $nomProduit
     */
    public function setNomProduit($nomProduit)
    {
        $this->nomProduit = $nomProduit;
    }

    /**
     * @return mixed
     */
    public function getDescriptif()
    {
        return $this->descriptif;
    }

    /**
     * @param mixed $descriptif
     */
    public function setDescriptif($descriptif)
    {
        $this->descriptif = $descriptif;
    }

    /**
     * @return mixed
     */
    public function getUnite()
    {
        return $this->unite;
    }

    /**
     * @param mixed $unite
     */
    public function setUnite($unite)
    {
        $this->unite = $unite;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->Categorie;
    }

    /**
     * @param mixed $Categorie
     */
    public function setCategorie($Categorie)
    {
        $this->Categorie = $Categorie;
    }

    /**
     * @return mixed
     */
    public function getProducteur()
    {
        return $this->Producteur;
    }

    /**
     * @param mixed $Producteur
     */
    public function setProducteur($Producteur)
    {
        $this->Producteur = $Producteur;
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