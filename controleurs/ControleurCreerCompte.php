<?php

////////////////////////////////////////////////////////////////////////////////
//////////////// Création du compte
////////////////////////////////////////////////////////////////////////////////

if(isset($_POST['creerCompte'])){
    $resultatCreate = 2;
    if($_POST['new_mdp'] == $_POST['new_confirm']){
        $resultatCreate =  adherentDAO::insertAdherent( $_POST['new_mail'], $_POST['new_mdp'], $_POST['new_nom'], $_POST['new_prenom']);
    } else{
        $mdpDifferents = "Les mots de passes ne sont pas identiques";
    }

}

////////////////////////////////////////////////////////////////////////////////
//////////////// Formulaire de création d'un compte
////////////////////////////////////////////////////////////////////////////////

$formulaireCompte = new Formulaire('post', 'index.php', 'formCompte', 'creerCompte');

$formulaireCompte->ajouterComposantLigne($formulaireCompte->creerLabelFor('new_mail','Adresse mail :'));
$formulaireCompte->ajouterComposantLigne($formulaireCompte->creerInputTexte('new_mail', 'new_mail', '', 1,'mail@exemple.fr', " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ "));
$formulaireCompte->ajouterComposantTab();

$formulaireCompte->ajouterComposantLigne($formulaireCompte->creerLabelFor('nom','Nom :'));
$formulaireCompte->ajouterComposantLigne($formulaireCompte->creerInputTexte('new_nom', 'new_nom', '', 1, '', ''));
$formulaireCompte->ajouterComposantTab();

$formulaireCompte->ajouterComposantLigne($formulaireCompte->creerLabelFor('prenom', 'Prenom : '));
$formulaireCompte->ajouterComposantLigne($formulaireCompte->creerInputTexte('new_prenom', 'new_prenom', '',1, '', ''));
$formulaireCompte->ajouterComposantTab();

$formulaireCompte->ajouterComposantLigne($formulaireCompte->creerLabelFor('mdp', 'Mot de passe : '));
$formulaireCompte->ajouterComposantLigne($formulaireCompte->creerInputMdp('new_mdp', 'new_mdp', 1 , '', ''));
$formulaireCompte->ajouterComposantTab();

$formulaireCompte->ajouterComposantLigne($formulaireCompte->creerLabelFor('mdp', 'Confirmez votre mot de passe : '));
$formulaireCompte->ajouterComposantLigne($formulaireCompte->creerInputMdp('new_confirm', 'new_confirm', 1 , '', ''));
$formulaireCompte->ajouterComposantTab();

if(isset($mdpDifferents)){
    $formulaireCompte->ajouterComposantLigne($formulaireCompte->creerLabel($mdpDifferents));
    $formulaireCompte->ajouterComposantTab();
}

$formulaireCompte->ajouterComposantLigne($formulaireCompte->creerInputSubmit('creerCompte', 'creerCompte', 'Creez votre Compte'));
$formulaireCompte->ajouterComposantTab();

if(isset($_POST['creerCompte'])){
    if($resultatCreate == 1){
        $formulaireCompte->ajouterComposantLigne($formulaireCompte->creerLabelFor('resultat_true', 'Votre compte a été créé ' . $_POST['new_prenom'] . ' !'));
        $formulaireCompte->ajouterComposantTab();
    } elseif ($resultatCreate == 0){
        $formulaireCompte->ajouterComposantLigne($formulaireCompte->creerLabelFor('resultat_false', 'Erreur lors de la création du compte'));
        $formulaireCompte->ajouterComposantTab();
    }
}

$formulaireCompte->creerFormulaire();



include_once "vues/CreerCompte.php";