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
function SessionConnecter($mail)
{
    $sql = "select * from final_project_membre where email = '%s'";
    $sql = sprintf($sql, $mail);
    $requete = mysqli_query(dbconnect(), $sql);
    $membre = mysqli_fetch_assoc($requete);
    $_SESSION['Connecter'] = $membre;
}

function VerifMembre($mail, $mdp)
{
    $sql = "select * from final_project_membre where email = '%s' and mdp = '%s'";
    $sql = sprintf($sql, $mail, $mdp);

    $requete = mysqli_query(dbconnect(), $sql);
    if ($requete) {
        return TRUE;
    }
    return false;
}
function InsertMembre($nom, $dnt, $genre, $email, $ville, $mdp)
{
    $sql = " INSERT INTO final_project_membre (nom, date_naissance, gender, email, ville, mdp) VALUES
('%s', '%s', '%s', '%s', '%s', '%s')";
    $sql = sprintf($sql, $nom, $dnt, $genre, $email, $ville, $mdp);
    $requete = mysqli_query(dbconnect(), $sql);
    if ($requete) {
        return TRUE;
    }
    return false;
}

function listeObj()
{
    $sql = "SELECT * from final_project_v_objet";
    $sql = mysqli_query(dbconnect(), $sql);
    $liste = [];
    while ($objet = mysqli_fetch_assoc($sql)) {
        $liste[] = $objet;
    }
    return $liste;
}
function listeObj_Empunt()
{
    $sql = "SELECT * FROM final_project_v_objet_emprunter";
    $sql = mysqli_query(dbconnect(), $sql);
    $liste = [];
    while ($objet = mysqli_fetch_assoc($sql)) {
        $liste[] = $objet;
    }
    return $liste;
}

function getListe_categorie()
{
    $sql = "SELECT * FROM final_project_categorie";
    $sql = mysqli_query(dbconnect(), $sql);
    $liste = [];
    while ($categorie = mysqli_fetch_assoc($sql)) {
        $liste[] = $categorie;
    }
    return $liste;
}

function insertObj($nom_objet, $id_categorie, $id_membre)
{
    $sql = "INSERT INTO final_project_objet (nom_objet, id_categorie, id_membre) VALUES
('%s', '%s', '%s')";
    $sql = sprintf($sql, $nom_objet, $id_categorie, $id_membre);
    $requete = mysqli_query(dbconnect(), $sql);
    if ($requete) {
        return TRUE;
    }
    return false;
}

function getObj($id_obj)
{
    $sql = "SELECT * FROM final_project_v_objet_emprunter WHERE id_objet = '%s'";
    $sql = sprintf($sql, $id_obj);
    $requete = mysqli_query(dbconnect(), $sql);
    $rep = array();
    if ($requete) {
        while ($objet = mysqli_fetch_assoc($requete)) {
            $rep[] = $objet;
        }
        return $rep;
    }
    return null;
}

function getMembre($id_membre)
{
    $sql = "SELECT * FROM final_project_membre WHERE id_membre = '%s'";
    $sql = sprintf($sql, $id_membre);
    $requete = mysqli_query(dbconnect(), $sql);
    if ($requete) {
        $val = mysqli_fetch_assoc($requete);
        return $val['nom'];
    }
    return false;
}

function getImage_obj($id_obj)
{
    $sql = "SELECT * FROM final_project_images_objet WHERE id_objet = '%s'";
    $sql = sprintf($sql, $id_obj);
    $requete = mysqli_query(dbconnect(), $sql);
    $rep = array();
    if ($requete) {
        while ($image = mysqli_fetch_assoc($requete)) {
            $rep[] = $image;
        }
        return $rep;
    }
    return null;
}

function getHistoricEmprunt($id_obj)
{
    $sql = "SELECT * FROM final_project_emprunt WHERE id_objet = '%s'";
    $sql = sprintf($sql, $id_obj);
    $requete = mysqli_query(dbconnect(), $sql);
    $rep = array();
    if ($requete) {
        while ($emprunt = mysqli_fetch_assoc($requete)) {
            $rep[] = $emprunt;
        }
        return $rep;
    }
    return null;
}


function Emprunt($id_obj) {
    $id_membre = $_SESSION['Connecter']['id_membre'];
    $sql = "INSERT INTO final_project_emprunt (id_objet, id_membre, date_emprunt) VALUES ('%s', '%s', NOW())";
    $sql = sprintf($sql, $id_obj, $id_membre);
    $requete = mysqli_query(dbconnect(), $sql);
    if ($requete) {
        return TRUE;
    }
    return false;
}


