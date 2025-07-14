<?php 
function dbconnect()
{
    static $bdd = null;

    if ($bdd === null) {
        $bdd = mysqli_connect('localhost', 'root', '', 'db_s2_ETU003970');
        // $bdd = mysqli_connect('localhost', 'ETU003970', '2qVrbh7m', 'db_s2_ETU003970');

        if (!$bdd) {
            die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
        }
        mysqli_set_charset($bdd, 'utf8mb4');
    }

    return $bdd;
}
?>