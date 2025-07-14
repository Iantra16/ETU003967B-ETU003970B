<?php
$id = $_SESSION['Connecter']['id_membre'];
// $liste_categorie = getListe_categorie();
$connecter = $_SESSION['Connecter']; 
$emprunt = getEmpruntofme();
?>
<div class="form-container mx-auto " style="margin-top: 80px;">
   <h1 class="title">Bomjour <?= $connecter['nom']?></h1>
   <table class="tab">
      <tr>
            <th>Objet</th>
            <th>Date d</th>
            <th>Email</th>
            <th>Adresse</th>
      </tr>
   
   </table>
</div>