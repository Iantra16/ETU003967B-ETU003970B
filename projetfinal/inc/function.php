<?php
session_start();
ini_set("display_errors", "1");
require('connection.php');

function formater_montant($nombre)
{
    $ret = "$ " . number_format($nombre, 2, ',', ' ');
    return $ret;
}

function formater_nombre($nombre)
{
    $ret = number_format($nombre, 0, ',', ' ');
    return $ret;
}
function SessionConnecter($mail){
    $sql = "select * from final_project_membre where email = '%s'";
    $sql = sprintf($sql, $mail);
    $requete = mysqli_query(dbconnect(), $sql);
    $membre = mysqli_fetch_assoc($requete);
    $_SESSION['Connecter'] = $membre;
}

function VerifMembre($mail,$mdp){
    $sql = "select * from final_project_membre where email = '%s' and mdp = '%s'";
    $sql = sprintf($sql, $mail,$mdp);

    $requete = mysqli_query(dbconnect(), $sql);
    if ($requete) {
        return TRUE;
    }
    return false;
}
function InsertMembre($nom , $dnt, $genre, $email, $ville, $mdp){
    $sql = " INSERT INTO final_project_membre (nom, date_naissance, gender, email, ville, mdp) VALUES
('%s', '%s', '%s', '%s', '%s', '%s')";
    $sql = sprintf($sql, $nom, $dnt, $genre, $email, $ville, $mdp);
    $requete = mysqli_query(dbconnect(), $sql);
    if ($requete) {
        return TRUE;
    }
    return false;
}

function listeObj() {
    $sql = "SELECT * from final_project_v_objet";
    $sql = mysqli_query(dbconnect(), $sql);
    $liste = [];
    while ($objet = mysqli_fetch_assoc($sql)) {
        $liste[] = $objet;
    }
    return $liste;
}
function listeObj_Empunt(){
    $sql = "SELECT * FROM final_project_v_objet_emprunter";    
    $sql = mysqli_query(dbconnect(), $sql);
    $liste = [];
    while ($objet = mysqli_fetch_assoc($sql)) {
        $liste[] = $objet;
    }
    return $liste;
}
?>
