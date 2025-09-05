<?php
# Appel de la connexion
include_once '../../connexion/connexion.php';
if (isset($_POST['valider'])) {
    $theme = htmlspecialchars($_POST['theme']);
    $lieu = htmlspecialchars($_POST['lieu']);
    $date = date('Y-m-d');
    $statut = 0;
    # Insertion data into DB
    $req = $connexion->prepare("INSERT INTO `activite`(`date`, `Theme`, `lieu`, `statut`) VALUES (?,?,?,?)");
    $resultat = $req->execute([$date, $theme,$lieu, $statut]);
    if ($resultat == true) {
        $_SESSION['msg'] = "Enregistrement de l'activité effectuée !";
        header("location:../../views/activite.php");
    } else {
        $_SESSION['msg'] = "Echec d'enregistrement !";
        header("location:../../views/activite.php");
    }
} else {
    header("location:../../views/activite.php");
}
