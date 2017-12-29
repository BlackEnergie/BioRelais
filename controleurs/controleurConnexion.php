<?php

////////////////////////////////////////////////////////////////////////////////
//////////////// Formulaire de connexion
////////////////////////////////////////////////////////////////////////////////

$formulaireConnexion = new Formulaire('post', 'index.php', 'fConnexion', 'connexion');

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputRadio('typeUser', 'adherent', 'Adherent', 1));
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputRadio('typeUser', 'producteur', 'Producteur', 0));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('mail', 'Adresse mail :'));
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputTexte('login', 'login', '', 1, 'Adresse mail', 0));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('mdp', 'Mot de passe :'));
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputMdp('mdp', 'mdp', '', 'Mot de passe', 0));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLien('?bioRelaisMP=creercompte', 'Pas encore client ?  Créez un compte !'));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputSubmit('submitConnex', 'submitConnex', 'Valider'));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel($messageErreurConnexion));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->creerFormulaire();

include_once 'vues/connexion.php';