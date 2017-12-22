<?php
class adherent{
    use hydrate;

	private $mail;
	private $nom;
	private $prenom;

	public function __construct($mail){
		$this->mail = $mail;
    }

////////////////////////////////////////////////////////////////////////////////
//////////////// GET/SET
////////////////////////////////////////////////////////////////////////////////

    public function getMail(){
        return $this->mail;
    }
    public function setMail($mail){
        $this->mail = $mail;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom= $nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

}
