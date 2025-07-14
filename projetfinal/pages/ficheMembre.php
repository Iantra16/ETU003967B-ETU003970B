<?php
$id = $_SESSION['Connecter']['id_membre'];
// $liste_categorie = getListe_categorie();
$connecter = $_SESSION['Connecter'];
$emprunt = getEmpruntofme();
?>
<div class="form-container mx-auto " style="margin-top: 80px;">
   <h1 class="title">Bomjour <?= $connecter['nom'] ?></h1>
   <table class="tab">
      <tr>
         <th>Objet</th>
         <th>Date de retour</th>
         <th> </th>
      </tr>
      <?php
      foreach ($emprunt as $em) { ?>
         <tr>
            <td><?= $em['nom_objet'] ?></td>
            <td><?= $em['date_retour'] ?></td>
               <td><a href="model.php?model=form">Retourner</a></td>
         </tr>
      <?php }
      ?>
   </table>
</div>