<?php
# Vérifier si c'est une modification
if (isset($_GET['idGallery'])) {
    # On modifie les informations du membre
    $title = "Modifier la photo";
    $btn = "Mettre à jour";
    $Action = "../models/updat/update-galerie-post.php?idGallery=" . $_GET['idGallery'];

    # Récupérer les informations de la photo à modifier
    $getGallery = $connexion->prepare("SELECT * FROM galerie WHERE id = ?");
    $getGallery->execute([$_GET['idGallery']]);
    $gallery = $getGallery->fetch();
} else {
    $title = "Enregistrer un nouveau membre";
    $Action = "../models/add/add-galerie-post.php";
    $btn = "Enregistrer";
}

# Selection donnée des photos de la galerie 
try {
    # Requête de sélection de toutes les images de la galerie
    $statut = 0; // Statut actif
    $getGalerie = $connexion->prepare("SELECT * FROM galerie WHERE statut=? ORDER BY id DESC");
    $getGalerie->execute([$statut]);
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des images de la galerie : " . $e->getMessage();
}
