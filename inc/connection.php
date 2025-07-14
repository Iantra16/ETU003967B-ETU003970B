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

$sql = "CREATE or replace view final_project_v_objet as
    SELECT obj.nom_objet,cat.nom_categorie,meb.nom,obj.id_objet 
    FROM final_project_objet obj 
    join final_project_categorie cat on obj.id_categorie = cat.id_categorie
    join final_project_membre meb on obj.id_membre = meb.id_membre";

mysqli_query(dbconnect(),$sql);
