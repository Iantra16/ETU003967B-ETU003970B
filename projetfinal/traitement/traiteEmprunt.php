<?php
include('../inc/function.php');
$nbre = $_POST['nbre'];
$id_membre = $_POST['id_membre'];
$id_obj = $_POST['id_obj'];
echo "ok";

$emprunt = Emprunt($id_obj);

if ($emprunt) { 
    header('Location: ../pages/model.php?model=accueil&&nbre_emprunt='.$nbre . '&&id_membre='.$id_membre . '&&id_obj='.$id_obj);
} else {
    header('Location: ../pages/model.php?model=emprunt&&error=1');
}
?>