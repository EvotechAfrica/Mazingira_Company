<?php
#inclusion de la page de connexion
include('../../connexion/connexion.php');
# Suppression de données d'un article 
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $statut = 1;
    $req = $connexion->prepare("UPDATE `article` SET statut=? WHERE id=?");
    $resultat = $req->execute([$statut, $id]);
    if ($resultat == true) {
        $_SESSION['msg'] = 'Suppression réussie';
        header('location:../../views/article.php');
    }
} else {
    header('location:../../views/article.php');
}