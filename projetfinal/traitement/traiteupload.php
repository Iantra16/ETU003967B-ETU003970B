<?php
include('../inc/function.php');
$nom_obj = $_POST['nom_objet'];
$categorie = $_POST['categorie'];
$id_membre = $_POST['id_membre'];
$images = $_FILES['images'];

$base_dir = dirname(__DIR__); 
$upload_dir = $base_dir . '/uploads/'; 

$maxSize = 200 * 1024 * 1024;
$allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
$uploaded_images_count = 0;


// Vérifiez si le dossier d'upload existe, sinon créez-le
if (!is_dir($upload_dir)) {
    // Tente de créer le répertoire avec les permissions 0755
    // true permet la création récursive (s'il manque des dossiers parents)
    if (!mkdir($upload_dir, 0755, true)) {
        die("Erreur : Impossible de créer le dossier d'upload à " . $upload_dir);
    }
}

if (isset($_FILES['images']) && is_array($_FILES['images']['name'])) {
    foreach ($_FILES['images']['name'] as $key => $name) {
        $tmp_name = $_FILES['images']['tmp_name'][$key];
        $originalName = pathinfo($name, PATHINFO_FILENAME);
        $extension = pathinfo($name, PATHINFO_EXTENSION);

        // Vérifie le type MIME avec `finfo`
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $tmp_name);
        finfo_close($finfo);

        if (!in_array($mime, $allowedMimeTypes)) {
            echo 'Type de fichier non autorisé : ' . $mime;
            continue;
        }

        // Renommer le fichier
        $newName = 'objet_' . uniqid('', true) . '.' . $extension;
        $upload_path = $upload_dir . $newName;

        if (move_uploaded_file($tmp_name, $upload_path)) {
            echo "Fichier uploadé avec succès : " . $newName;
            $insert = insertObj($nom_obj, $categorie, $id_membre);
            if ($insert) {
                header('Location: ../pages/model.php?model=accueil');
                exit;
            } else {
                echo "___problème sur l'insertion";
            }
            $uploaded_images_count++;
        } else {
            echo "Échec du déplacement du fichier : " . $name;
        }
    }
} else {
    echo "Aucun fichier reçu.";
}
