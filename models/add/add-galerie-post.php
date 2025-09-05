<?php
# Appel de la connexion
include_once '../../connexion/connexion.php';

# Fonction pour uploader les images
require_once('../../fonctions/fonctions.php');

# Enregistrement d'une photo dans la galerie
if (isset($_POST['valider'])) {
    $description = htmlspecialchars($_POST['description']);

    # Vérifier si une image a été envoyée
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {

        $fichier_tmp = $_FILES['picture']['tmp_name'];
        $nom_original = $_FILES['picture']['name'];
        $destination = "../../img/galerie/";

        # Fonction permettant de récupérer la photo
        $newimage = RecuperPhoto($fichier_tmp, $nom_original, $destination);

        # Insertion dans la table 'galerie'
        $statut = 0; 
        $req = $connexion->prepare("INSERT INTO `galerie`(`photo`, `description`, `statut`) VALUES (?, ?, ?)");
        $req->execute(array($newimage, $description, $statut));

        if ($req) {
            $_SESSION['msg'] = "Photo enregistrée avec succès !";
            header("location:../../views/galerie.php");
            exit();
        } else {
            $_SESSION['msg'] = "Echec de l'enregistrement de la photo.";
            header("location:../../views/galerie.php");
            exit();
        }
    } else {
        $_SESSION['msg'] = "Veuillez sélectionner une photo à télécharger.";
        header("location:../../views/galerie.php");
        exit();
    }
} else {
    # Rediriger si la page est accédée directement
    header("location:../../views/galerie.php");
    exit();
}