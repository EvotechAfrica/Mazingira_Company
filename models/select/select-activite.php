<?php
if (isset($_GET['idVille'])) {
    # Lors de la modification
    $id = $_GET['idVille'];
    $getVileMod = $connexion->prepare("SELECT * FROM ville where id='$id'");
    $getVileMod->execute();
    $element = $getVileMod->fetch();
    $title = "Modification d'une activité";
    $Action = "../models/updat/up-ville-post.php?idVille=" . $id;
    $btn = "Modifier";
} else {
    # Lors de l'enregistrement
    $title = "Enregistrer une nouvelle activité";
    $Action = "../models/add/add-activite-post.php";
    $btn = "Enregistrer";
}
# Selection des tout les activitées
$statut = 0;
$getArticle = $connexion->prepare("SELECT * FROM `activite` WHERE activite.statut=?;");
$getArticle->execute([$statut]);