<?php
$listeObj = listeObj_Empunt();

?>

<main>
    <h1 class="title">Liste Des Objets </h1>
    <table class="tab">
        <tr>
            <th>nom_objet</th>
            <th>categorie</th>
            <th>proprietaire</th>
            <th>date_retour</th>
            <th>Details</th>
        </tr>

        <?php foreach ($listeObj as $val) { ?>
            <tr>
                <td><?= $val['nom_objet'] ?></td>
                <td><?= $val['categorie'] ?></td>
                <td><?= $val['proprietaire'] ?></td>
                <?php
                if ($val['date_emprunt'] == NULL) { ?>
                    <td>Non Emprunter</td>
                <?php } else if ($val['date_emprunt'] != NULL && $val['date_retour'] == NULL) { ?>
                    <td>Non Retourner</td>
                <?php } else { ?>
                    <td><?= $val['date_retour'] ?></td>
                <?php } ?>
                <td>
                    <a href="model.php?model=fiche&&id_objet=<?= $val['id_objet']?>">Voir les details</a>
                </td>
            </tr>
        <?php } ?>

    </table>

</main>