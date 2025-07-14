<?php
include('../inc/function.php');

$mail = $_POST['mail'];
echo $mail;
$_SESSION['mail'] = $mail;
$mdp = $_POST['mdp'];
if (VerifMembre($mail,$mdp)) {
    SessionConnecter($mail);
    echo "cshdvcutyfodtv";
    header('location:../pages/model.php');
}
else {
    header('location:../pages/index.php?erreur=1');
}
?>