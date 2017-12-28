<?php
require_once 'configs/param.php';

////////////////////////////////////////////////////////////////////////////////
//////////////// DBConnex
////////////////////////////////////////////////////////////////////////////////

class DBConnex extends PDO
{

    private static $instance;

    function __construct(){
        try {
            parent::__construct(Param::$dsn ,Param::$user, Param::$pass);
        } catch (Exception $e) {
            echo $e->getMessage();
            die("Impossible de se connecter." );
        }
    }

    public static function getInstance(){
        if ( !self::$instance ){
            self::$instance = new DBConnex();
        }
        return self::$instance;
    }

    public function __destruct(){
        if(!is_null(self::$instance)){
            self::$instance = null;
        }
    }


    public function queryFetchAll($sql){
        $sth  =$this->query($sql);

        if ( $sth ){
            return $sth -> fetchAll(PDO::FETCH_ASSOC);
        }

        return false;
    }


    public function queryFetchFirstRow($sql){
        $sth    = $this->query($sql);
        $result    = array();

        if ( $sth ){
            $result  = $sth -> fetch();
        }

        return $result;
    }


    public function insert($sql){
        if ( $this -> exec($sql) > 0 ){
            return 1;
            //$this->lastInsertId();
        }
        return false;
    }

    public function update($sql){
        return $this->exec($sql) ;
    }

    public function delete($sql){
        return $this->exec($sql) ;
    }
}

////////////////////////////////////////////////////////////////////////////////
//////////////// Adherent DAO
////////////////////////////////////////////////////////////////////////////////

class adherentDAO
{

    public static function connection(adherent $unAdherent)
    {
        $sql = "select mail, nom, prenom from adherent where  mail= '" . $unAdherent->getMail() . "' and   mdp=  '" . $_POST['mdp'] . "'";
        $login = DBConnex::getInstance()->queryFetchFirstRow($sql);
        if (empty($login)) {
            return null;
        }
        $unAdherent->hydrate($login);
        return true;
    }

    public static function insertAdherent($mail, $mdp, $nom, $prenom){
        $sql =  "INSERT INTO adherent VALUES ( '" . $mail ."' , '". $mdp ."' , '" . $nom . "' , '" . $prenom . "');";
        $res = DBConnex::getInstance()->insert($sql);
        if ($res == 1){
            return 1;
        }
        return 0;
    }
}

////////////////////////////////////////////////////////////////////////////////
//////////////// Producteur DAO
////////////////////////////////////////////////////////////////////////////////

class producteurDAO
{

    public static function connection(producteur $unProducteur)
    {
        $sql = "select mail, adresse, ville, description, nom , prenom  from producteur where  mail= '" . $unProducteur->getMail() . "' and   mdp=  '" . $_POST['mdp'] . "'";
        $login = DBConnex::getInstance()->queryFetchFirstRow($sql);
        if (empty($login)) {
            return null;
        }
        $unProducteur->hydrate($login);
        return true;
    }
}