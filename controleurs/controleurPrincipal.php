<?php

////////////////////////////////////////////////////////////////////////////////
//////////////// Import
////////////////////////////////////////////////////////////////////////////////

require_once 'fonctions/formulaire.php';
require_once 'fonctions/dispatcher.php';
require_once 'modeles/dao/dao.php';
require_once 'fonctions/fonctions.php';
require_once 'fonctions/menu.php';

////////////////////////////////////////////////////////////////////////////////
//////////////// Connexion
////////////////////////////////////////////////////////////////////////////////

$messageErreurConnexion= '';
if (isset($_POST['login'],$_POST['mdp'])){
    if ($_POST['typeUser'] == "adherent"){

        $unAdherent = new adherent($_POST['login']);
        $_SESSION['connecte']= adherentDAO::connection($unAdherent);
        $_SESSION['typeUser'] = $_POST['typeUser'];
        $_SESSION['user'] = $unAdherent;

    } elseif ($_POST['typeUser'] == "producteur") {

        $unProducteur = new producteur($_POST['login']);
        $_SESSION['connecte']= producteurDAO::connection($unProducteur);
        $_SESSION['typeUser'] = $_POST['typeUser'];
        $_SESSION['user'] = $unProducteur;

    }

    if($_SESSION['connecte']){
        $_SESSION['bioRelaisMP']='accueil';

    } else{
        $messageErreurConnexion='Login ou mot de passe incorrect';
    }
}

////////////////////////////////////////////////////////////////////////////////
////////////////  Menu
////////////////////////////////////////////////////////////////////////////////

if (isset($_GET['bioRelaisMP'])){
    $_SESSION['bioRelaisMP']= $_GET['bioRelaisMP'];
}else{
    if(!isset($_SESSION['bioRelaisMP'])){
        $_SESSION['bioRelaisMP']="accueil";
    }
}

$bioRelaisMP = new Menu("menuPrincipal");

$bioRelaisMP->ajouterComposant($bioRelaisMP->creerItemLien("accueil", "Accueil"));

if(isset($_SESSION['connecte'])){

    if($_SESSION['typeUser'] == 'adherent'){
        $bioRelaisMP->ajouterComposant($bioRelaisMP->creerItemLien("panier", "Mon panier"));
    }elseif ($_SESSION['typeUser'] == 'producteur'){

    }
    $bioRelaisMP->ajouterComposant($bioRelaisMP->creerItemLien("monCompte", "Mon Compte"));
    //$bioRelaisMP->ajouterComposant($bioRelaisMP->creerItemLien("deconnexion", "Déconnexion"));
} else {
    $bioRelaisMP->ajouterComposant($bioRelaisMP->creerItemLien("connexion", "Se connecter"));
}


$menuPrincipal = $bioRelaisMP->creerMenu($_SESSION['bioRelaisMP'],'bioRelaisMP');

include_once dispatcher::dispatch($_SESSION['bioRelaisMP']);