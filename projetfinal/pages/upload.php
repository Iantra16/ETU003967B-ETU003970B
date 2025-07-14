<?php
include('../inc/header.php');
$id = $_SESSION['Connecter']['id_membre'];
$liste_categorie = getListe_categorie();
?>
<div class="form-container mx-auto " style="margin-top: 80px;">
    <h2>Ajouter un nouvel objet</h2>
    <form action="../traitement/traiteupload.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="nom_objet">Nom de l'objet</label>
            <input type="text" id="nom_objet" name="nom_objet" required>

        </div>

        <div class="form-group">
            <label for="categorie">Catégorie</label>
            <select id="categorie" name="categorie" required>
                <?php foreach ($liste_categorie as $categorie) { ?>
                <option value="<?= $categorie['id_categorie'] ?>"><?= $categorie['nom_categorie'] ?></option>
                <?php } ?>
            </select>
        </div>


        <div class="form-group">
            <label for="media">Images de l'objet (plusieurs sélections possibles) </label>
            <input type="file" id="images" name="images[]" accept="image/*" required multiple>
            <small class="form-text text-muted">La première image téléchargée sera l'image principale.</small>

        </div>

        <input type="hidden" name="id_membre" value="<?= $id ?>">

        <button type="submit" class="btn-upload">Add</button>
    </form>

</div>