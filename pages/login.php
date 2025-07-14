<?php
    include ('../inc/connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/Style.css">
    <title>Login</title>
</head>

<body class="background-page">

    <div class="content">
        <h1>LOGIN</h1>
        <?php if (isset($_GET['erreur'])) {?>
            <h4> ERROR on Password or Email </h4>
            <h4>Please try again</h4>
        <?php }?>
        <form action="traiteLogin.php" method="post">

            <div class="input-box">
                <input type="email" name="mail" placeholder="Email" required>
            </div>
            
            <div class="input-box">
                <input type="password" name="mdp" placeholder="Password" required>
            </div>

            <button type="submit" class="button">Login</button>

            <div class="signUP">
                <p>Not a member? <a href="signUP.php">Register</a></p>
            </div>
        </form>
    </div>
    
</body>

</html>