<?php
include('../inc/function.php');
$nom_obj = $_POST['nom_objet'];
$categorie = $_POST['categorie'];
$id_membre = $_POST['id_membre'];
$images = $_FILES['images'];

$upload_dir = __DIR__ . '../uploads/';
$max_size = 5 * 1024 * 1024; // 5MB
$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
$uploaded_images_count = 0;

if (isset($_FILES['images']) && is_array($_FILES['images']['name'])) {
    $file = $_FILES['image[]'];

    // Vérifie la taille
    if ($file['size'] > $maxSize) {
        die('Le fichier est trop volumineux.');
    }

    // Vérifie le type MIME avec `finfo`
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!in_array($mime, $allowedMimeTypes)) {
        die('Type de fichier non autorisé : ' . $mime);
    }

    //renommer le fichier
    $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $newName = 'objet_' . uniqid('', true) . '.' . $extension;
    $upload_path = $upload_dir . $newName;
    $tmp_name = $file['tmp_name'];


    foreach ($_FILES['images']['name'] as $key => $name) {
        if (move_uploaded_file($tmp_name, $upload_path)) {
            echo "Fichier uploadé avec succès : " . $newName;
            $insert = insertObj($nom_obj, $categorie, $id_membre);
            if ($insert) {
                header('Location: ../pages/accueil.php');
            } else {
                echo "___problème sur l'insertion";
            }
            $uploaded_images_count++;
        }
        else {
            echo "Échec du déplacement du fichier : " . $name;
        }
    }
} else {
    echo "Aucun fichier reçu.";
}
