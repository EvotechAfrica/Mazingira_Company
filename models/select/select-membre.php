<?php
if (isset($_GET['idMembre']) && !empty($_GET['idMembre'])) {
    $id = $_GET['idMembre'];
    $getMemberMod = $connexion->prepare("SELECT * FROM membre where id=?");
    $getMemberMod->execute([$id]);
    $element = $getMemberMod->fetch();
    $title = "Modification d'un Membre";
    $Action = "../models/updat/up-member-post.php?idMembre=" . $id;
    $btn = "Modifier";
} else {
    $title = "Enregistrer un nouveau membre";
    $Action = "../models/add/add-membre-post.php";
    $btn = "Enregistrer";
}
$statut = 0; // Statut actif
# Selection donnée des membres
$getMember = $connexion->prepare("SELECT `membre`.* FROM `membre` WHERE  membre.statut=? ;");
$getMember->execute([$statut]);
