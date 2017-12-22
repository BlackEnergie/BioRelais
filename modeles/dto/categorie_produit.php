<?php
 class categorie_produit{
     use hydrate;

     private $codecateg;
     private $libellecateg;

     /**
      * categorie_produit constructor.
      * @param $codecateg
      * @param $libellecateg
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
     public function getCodecateg()
     {
         return $this->codecateg;
     }

     /**
      * @param mixed $codecateg
      */
     public function setCodecateg($codecateg)
     {
         $this->codecateg = $codecateg;
     }

     /**
      * @return mixed
      */
     public function getLibellecateg()
     {
         return $this->libellecateg;
     }

     /**
      * @param mixed $libellecateg
      */
     public function setLibellecateg($libellecateg)
     {
         $this->libellecateg = $libellecateg;
     }

 }