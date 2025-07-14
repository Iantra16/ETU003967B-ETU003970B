<?php
include('../inc/connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/Style.css">
    <title>Login</title>
</head>

<body class=" ">
    <div class="col-lg-6 m-auto py-5 search p">
        <h1 class="text-center label">Log in</h1>
        <?php if (isset($_GET['erreur'])) { ?>
            <h4> ERROR on Password or Email </h4>
            <h4>Please try again or Create a compt </h4>
        <?php } ?>
        <form class="form m-auto " action="../traitement/traiteLogin.php" method="post">
            <span class="input-span">
                <label class="label" for="mail">Email :</label>
                <input type="email" name="mail" id="mail" required /></span>
            <span class="input-span">
                <label for="mdp" class="label">Mot de passe :</label>
                <input type="password" name="mdp" required /></span>

            <input class="submit" type="submit" value="LOG IN" />
            <div class="signUP">
                <p>Not a member? <a href="signUP.php" class="text-dark">Register</a></p>
            </div>
        </form>
    </div>
</body>



</html>