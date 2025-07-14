<?php
include('../inc/header.php');

$page = "accueil";
if (isset($_GET['model'])) {
    $page = $_GET['model'];
}

?>

<main>

        <?php include($page.'.php');?>

</main>

<?php 
 include('../inc/footer.php'); 
 ?>
