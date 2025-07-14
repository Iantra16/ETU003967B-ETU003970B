<?php
include('../inc/header.php');

$page = "ficheMembre"; // Default page
if (isset($_GET['model'])) {
    $page = $_GET['model'];
}

?>

<main class="pt-6" style="padding-top: 55px;">

        <?php include($page.'.php');?>

</main>

<?php 
 include('../inc/footer.php'); 
?>
