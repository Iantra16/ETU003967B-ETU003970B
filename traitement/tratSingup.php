<?php
 include ('../inc/function.php');
    $name = $_POST['nom'];
    $birth = $_POST['dtn'];
    $mail = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['mdp'];
    $ville = $_POST['ville']; 

    $isert = InsertMembre($name,$birth,$gender,$mail,$ville,$password);
    if ($isert) {
        SessionConnecter($mail);
        header('location:../pages/accueil.php');
    } else {
        header('location:../pages/signUP.php?erreur=1');    
    }    
?>