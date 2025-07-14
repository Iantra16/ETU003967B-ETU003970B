<?php

$id = $_SESSION['Connecter']['id_membre'];
$id_obj = $_GET['id_obj'];

?>

<div class="container border border-dark mb-5 mt-5 p-5">
    <h1 class="title">Emprunter un objet</h1>
    <?php if (isset($_GET['error'])) {
        echo "Erreur sur la fonction Emprunter";
    }
    ?>
    <form action="../traitement/traiteEmprunt.php" method="post">
        <label for="nbre">Nbre de jour d'emprunt</label>
        <input type="number" name="nbre" id="nbre" required>
        <input type="hidden" name="id_membre" value="<?= $id ?>">
        <input type="hidden" name="id_obj" value="<?= $id_obj ?>">
        <input type="submit" value="Emprunter">
    </form>
    <a href="model.php?model=accueil"><button>Retour</button></a>
    <?= var_dump($_SESSION['Connection'])?>
</div>