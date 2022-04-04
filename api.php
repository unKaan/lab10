<?php
header("Content-Type: application/json");

$all = getallheaders();
$nom = $all["Dentist"];

switch($nom){
    case "A":
        $office = "123 Street";
        break;
    case "B":
        $office = "321 Streeet";
        break;
    default:
        $office = "Inconnu";
        break;
}

$reponse = ["Nom" => $nom, "Office" => $office];
echo json_encode($reponse);
