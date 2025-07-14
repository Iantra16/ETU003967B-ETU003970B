<?php
$id = $_SESSION['Connecter']['id_membre'];
$id_objet = $_GET['id_objet'];
$obj = getObj($id_objet);
$images = getImage_obj($id_objet);
$historic = getHistoricEmprunt($id_objet);
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

        <!-- img principale -->
        <p>Image principale:</p>
        <?php if ($val['image_principale_nom']) { ?>
            <img src="..assets/images/objets/<?= $val['image_principale_nom'] ?>" alt="Image de l'objet">
        <?php } else { ?>
            <img src="../assets/images/images.jpeg">
        <?php } ?>

        <!-- autre img -->
        <p>Autres images:</p>
        <?php if ($images) { ?>
            <?php foreach ($images as $image) { ?>
                <img src="../assets/images/objets/<?= $image['nom_image'] ?>" alt="Image de l'objet">
            <?php } ?>
        <?php } else { ?>
            <p>Aucune autre image disponible.</p>
        <?php } ?>

        <!-- history -->
        <h2>Historique des emprunts:</h2>
        <?php if ($historic) { ?>
            <table>
                <tr>
                    <th>Date d'emprunt</th>
                    <th>Date de retour</th>
                    <th>Emprunteur</th>
                </tr>
                <?php foreach ($historic as $emprunt) { ?>
                    <tr>
                        <td><?= $emprunt['date_emprunt'] ?></td>
                        <td><?= $emprunt['date_retour'] ? $emprunt['date_retour'] : 'Non retourné' ?></td>
                        <td><?= getMembre($emprunt['id_membre']) ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p>Aucun historique d'emprunt disponible.</p>
        <?php } ?>

    <?php } ?>

    <p><a href="model.php?model=accueil">Back</a></p>
</div>