<?php
$id = $_SESSION['Connecter']['id_membre'];
$id_objet = $_GET['id_objet'];
$obj = getObj($id_objet);

?>

<div>
    <?php foreach ($obj as $val) { ?>
        <h1>Fiche objet: <?= $val['nom_objet'] ?></h1>
        <p>Catégorie: <?= $val['categorie'] ?></p>
        <p>Propriétaire: <?= $val['proprietaire'] ?></p>
        <?php if ($val['date_emprunt'] == NULL) { ?>
            <p>Statut: Non Emprunté</p>
        <?php } else if ($val['date_emprunt'] != NULL && $val['date_retour'] == NULL) { ?>
            <p>Statut: Emprunté, non retourné</p>
        <?php } else { ?>
            <p>Date de retour: <?= $val['date_retour'] ?></p>
        <?php } ?>
        <p>Emprunteur actuel: <?= $val['emprunteur_actuel'] ? getMembre($val['emprunteur_actuel']) : 'Aucun emprunteur' ?></p>

        <?php if ($val['image_principale_nom']) { ?>
            <p>Image principale:</p>
            <img src="..assets//images/objets/<?= $val['image_principale_nom'] ?>" alt="Image de l'objet">
        <?php } else { ?>
            <img src="../assets/images/images.jpeg">
        <?php } ?>

    <?php } ?>

    <p><a href="model.php?model=accueil">Back</a></p>
</div>