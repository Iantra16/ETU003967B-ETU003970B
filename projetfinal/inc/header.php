<?php
include('function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/Style.css" rel="stylesheet">
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>


<body>
<header class="menu-fixe ">
    <nav class="navbar navbar-expand-lg " style="background-color: #B9D6F2;">
        <div class="container-fluid">
            <a class="navbar-brand nav-link" href="../pages/model.php?model=ficheMembre">Projet</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../pages/model.php?model=accueil">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/upload.php">Ajouter des objets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../traitement/logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
    </nav>
</header>