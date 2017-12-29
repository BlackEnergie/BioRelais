<?php


function tableauHtml($tab,$entete , $classEntete, $classTab, $classLigne){
    $res = "<table class='" . $classTab ."'>";
    if(count($entete)>0){
        $res .= "<tr>";
        foreach ($entete as $cellule){
            $res .= "<th class='" . $classEntete . "'>" . $cellule . "</th>";
        }
        $res .= "</tr>";
    }
    if(count($tab)>0){
        foreach ($tab as  $ligne) {
            $res .= "<tr class='" . $classLigne . "'>";
            foreach ($ligne as $cellule) {
                $res .= "<td>" . $cellule . "</td>";
            }
            $res .= "</tr>";
        }
    }
    $res .= "</table>";
    return $res;
}