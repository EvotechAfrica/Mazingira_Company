<?php
# Appel de la connexion
include_once '../../connexion/connexion.php';
# Fonction pour upload les images
require_once('../../fonctions/fonctions.php');
if (isset($_POST['valider'])) {
    $titre = htmlspecialchars($_POST['titre']);
    $auteur = htmlspecialchars($_POST['auteur']);
    $description = htmlspecialchars($_POST['description']);
    $fichier_tmp = $_FILES['picture']['tmp_name'];
    $nom_original = $_FILES['picture']['name'];
    $destination = "../../img/mis_enavant/";
    # fonction permettant de recuperer la photo
    $newimage = RecuperPhoto($fichier_tmp, $nom_original, $destination);
    $statut = 0;
    # Insertion data into DB
    $req = $connexion->prepare("INSERT INTO `article`(`date`, `titre`, `auteur`, `description`, `photo`, `statut`) VALUES (now(),?,?,?,?,?)");
    $resultat = $req->execute([$titre, $auteur, $description, $newimage, $statut]);
    if ($resultat == true) {
        $_SESSION['msg'] = "Enregistrement de l'article effectuée !";
        header("location:../../views/article.php");
    } else {
        $_SESSION['msg'] = "Echec d'enregistrement !";
        header("location:../../views/article.php");
    }
} else {
    header("location:../../views/article.php");
}

