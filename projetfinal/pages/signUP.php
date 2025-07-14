<?php 
    include ('../inc/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/Style.css">
    <title>Sign UP</title>
</head>

<body class="background-page">
    <div class="container2 py-5 ">
        <div class="heading">Sing In</div>
        <?php if (isset($_GET['erreur'])) { ?>
        <h4> ERROR on Password or Email </h4>
        <h4>Please try again or Create a compt </h4>
        <?php } ?>
        <form action="../traitement/tratSingup.php" method="post" class="form">
            <input required="" class="input" type="text" name="nom" id="nom" placeholder="Nom">
            <input required="" class="input" type="date" name="dtn" id="dtn" placeholder="Date de Naissance">
            <div class=" d-flex input my-3 justify-content-between">
                <p class="pl-4">Genre :</p>
                <div class="">
                    <input type="radio" class="radio" name="gender" value="F">  F <br>
                    <input type="radio" class="radio" name="gender" value="M">  M <br>
                </div>
            </div>
            <input required="" class="input" type="text" name="ville" id="ville" placeholder="Ville">
            <input required="" class="input" type="password" name="password" id="password" placeholder="Password">
            <input required="" class="input" type="password" name="password" id="password" placeholder="RePassword">
            <input class="login-button" type="submit" value="Sign In">

        </form>
        <div class="signUP">
            <p>Already a member? <a class="text-primary" href="login.php">Login</a></p>
        </div>
    </div>
</body>

</html>