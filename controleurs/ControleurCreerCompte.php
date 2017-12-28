<?php

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

$formulaireCompte->ajouterComposantLigne($formulaireCompte->creerInputSubmit('creerCompte', 'creerCompte', 'Creez votre Compte'));
$formulaireCompte->ajouterComposantTab();

$formulaireCompte->creerFormulaire();



include_once "vues/CreerCompte.php";