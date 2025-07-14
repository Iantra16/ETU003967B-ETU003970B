<?php
    include('../inc/function.php');
    $listeObj = listeObj();

?>

<main>
    <table>
        <tr>
            <th>nom_objet</th>
            <th>nom_categorie</th>
            <th>nom</th>
            <th>id_objet</th>
        </tr>

   <?php foreach ($listeObj as $val) {?>
        <tr>
            <td><?= $val['nom_objet']?></td>
            <td><?= $val['nom_categorie']?></td>
            <td><?= $val['nom']?></td>
            <td><?= $val['id_objet']?></td>
        </tr>
    <?php } ?>

    </table>
 
</main>

