<?php

function afficherInformationsAdherent(adherent $unAdherent){
    $res = "<table class='tab_infos'>";
    $res .= "<tr><td><p class='infos'>Adresse mail :</p></td><td><p>". $unAdherent->getMail() ."</p></td></tr>";
    $res .= "<tr><td><p class='infos'>Nom :</p></td><td><p>". $unAdherent->getNom() ."</p></td></tr>";
    $res .= "<tr><td><p class='infos'>Prénom :</p></td><td><p>". $unAdherent->getPrenom() ."</p></td></tr>";
    $res .= "</table>";
    return $res;
}

if(isset($_POST['supprimerAdherent'])){
    adherentDAO::supprimerAdherent($_SESSION['user']);
    header('Location: index.php?bioRelaisMP=deconnexion');
}

include_once 'vues/monCompte.php';
