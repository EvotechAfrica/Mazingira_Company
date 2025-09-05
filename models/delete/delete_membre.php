<?php
include("../../connexion/connexion.php");
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id=$_GET["id"];
    $statut=1;
    $req = $connexion->prepare("UPDATE `membre` SET `statut`=? WHERE id=?");
    $test = $req->execute(array($statut, $id));
    if ($test == true) {
        $_SESSION['msg'] = "Suppression reussi !";
        header("location:../../views/membre.php");
    } else {
        $_SESSION['msg'] = "Echec de modification !";
        header("location:../../views/membre.php");
    }
} else {
    header("location:../../views/membre.php");
}
