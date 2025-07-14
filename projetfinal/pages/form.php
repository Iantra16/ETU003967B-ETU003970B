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

<body class="body">
    <div class="container1 py-5 ">
        <div class="heading">Rendre </div>
        <form action="../traitement/traiteLogin.php" method="post" class="form">
            <input required="" class="input" type="email" name="mail" id="mail" placeholder="E-mail">
            <input required="" class="input" type="password" name="mdp" id="mdp" placeholder="Password">
            <!-- <span class="forgot-password"><a href="#">Forgot Password ?</a></span> -->
            <input class="login-button" type="submit" value="Sign In">

            <div class="">
                <input type="radio" class="radio" name="etat" value="user"> Simbe <br>
                <input type="radio" class="radio" name="etat" value="ok"> ok <br>
                <input type="hidden" name="id_objet" value="<?php echo $_GET['id_objet']; ?>">
            </div>

        </form>
        <div class="signUP">
            <p>Not a member? <a href="signUP.php">Register</a></p>
        </div>
    </div>
</body>



</html>