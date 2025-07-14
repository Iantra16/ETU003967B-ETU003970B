<?php 
    include ('../inc/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Sign UP</title>
</head>
<body class="background-page">
    <div class="content">
        <h1>Sign Up</h1>
        <form action="traitement.php" method="post">

            <div class="input-box">
                <input type="text" name="nom" placeholder="Name" required >
            </div>
            
            <div class="input-box">
                <input type="date" name="dtn" placeholder="Birth's date" required>
            </div>

            <div class="input-box">
                <input type="radio" name="gender" value="F">F<br>
                <input type="radio" name="gender" value="M">M<br>
            </div>

            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-box">
                <input type="password" name="mdp" placeholder="Password" required>
            </div>


            <button type="submit" class="button">Sign UP</button>

            <div class="signUP">
                <p>Already a member? <a href="index.php">Login</a></p>
                <p><a href="data.php">Listes</a></p>
            </div>

        </form>


        

    </div>
</body>
</html>