<?php

// Message montrant le résultats des modifications
$msg ='';


/////////////////////////////////////////////////////////////////////////////////
/////////////////////////// Modifie l'adhérent
/////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['modifier_adherent'])){
    if($_POST['modif_mdp'] == $_POST['modif_mdp2']) { // Vérifie si les mots de passe sont identiques
        $newAdherent = new adherent($_POST['modif_mail']);
        $newAdherent->setNom($_POST['modif_nom']);
        $newAdherent->setPrenom($_POST['modif_prenom']);
        $res = adherentDAO::modifierAdherent($_SESSION['user']->getMail(), $newAdherent, $_POST['modif_mdp']);
    }else {
        $msg = "Les mots de passe sont différents";
    }
}

$formulaireModifierCompte = new Formulaire('post', 'index.php', 'modifierAdherent', 'modifierAdherent');

$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerLabel('Adresse mail :'));
$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerInputTexte('modif_mail', 'modif_mail', $_SESSION['user']->getMail(), 1, 'Nouvelle adresse Mail', ''));
$formulaireModifierCompte->ajouterComposantTab();

$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerLabel('Nom :'));
$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerInputTexte('modif_nom', 'modif_nom', $_SESSION['user']->getNom(), 1, 'Nouveau nom', ''));
$formulaireModifierCompte->ajouterComposantTab();

$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerLabel('Prénom :'));
$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerInputTexte('modif_prenom', 'modif_prenom', $_SESSION['user']->getPrenom(), 1, 'Nouveau prénom', ''));
$formulaireModifierCompte->ajouterComposantTab();

$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerLabel('Nouveau mot de passe :'));
$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerInputMdp('modif_mdp', 'modif_mdp', 1, '', ''));
$formulaireModifierCompte->ajouterComposantTab();

$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerLabel('Confirmez le mot de passe :'));
$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerInputMdp('modif_mdp2', 'modif_mdp2', 1, '', ''));
$formulaireModifierCompte->ajouterComposantTab();

$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerInputSubmit('modifier_adherent', 'modifier_adherent', 'Appliquer les modifications'));
$formulaireModifierCompte->ajouterComposantTab();

if(isset($_POST['modifier_adherent']) && ($_POST['modif_mdp'] == $_POST['modif_mdp2'])){
    if($res == 1){
        $msg = "Les modifications ont été enregistrées";
        $_SESSION['user']->setMail($_POST['modif_mail']);
        $_SESSION['user']->setNom($_POST['modif_nom']);
        $_SESSION['user']->setPrenom($_POST['modif_prenom']);
    } elseif ($res == 0){
        $msg = "Erreur lors de l'enregistrement des modifications";
    }
}

$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerLabel($msg));
$formulaireModifierCompte->ajouterComposantTab();

$formulaireModifierCompte->creerFormulaire();

include_once 'vues/modifierAdherent.php';