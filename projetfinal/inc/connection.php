<?php
function dbconnect()
{
    static $bdd = null;

    if ($bdd === null) {
        // $bdd = mysqli_connect('localhost', 'root', '', 'db_s2_ETU003970');
        $bdd = mysqli_connect('localhost', 'ETU003970', '2qVrbh7m', 'db_s2_ETU003970');

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

$sql = "CREATE or replace view final_project_v_objet_emprunter as
SELECT
    o.id_objet,
    o.nom_objet,
    c.nom_categorie AS categorie,
    m_proprietaire.nom AS proprietaire,
    e.date_emprunt,
    e.date_retour,
    m_emprunteur.nom AS emprunteur_actuel,
    (SELECT nom_image FROM final_project_images_objet
         WHERE id_objet = o.id_objet ORDER BY id_image LIMIT 1) AS image_principale_nom
FROM
    final_project_objet o
JOIN
    final_project_categorie c ON o.id_categorie = c.id_categorie
JOIN
    final_project_membre m_proprietaire ON o.id_membre = m_proprietaire.id_membre
LEFT JOIN
    final_project_emprunt e ON o.id_objet = e.id_objet AND e.date_retour IS NULL
LEFT JOIN
    final_project_membre m_emprunteur ON e.id_membre = m_emprunteur.id_membre
ORDER BY
    o.nom_objet";
mysqli_query(dbconnect(),$sql);

