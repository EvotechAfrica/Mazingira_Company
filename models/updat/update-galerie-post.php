<?php
# Appel de la connexion
include_once '../../connexion/connexion.php';

# Fonction pour uploader les images
require_once('../../fonctions/fonctions.php');

# Vérifier si le formulaire de modification a été soumis
if (isset($_POST['valider']) && isset($_GET['idGallery'])) {
    $id = intval($_GET['idGallery']);
    $description = htmlspecialchars($_POST['description']);
    $newimage = null;

    # Récupérer l'ancienne photo pour la suppression
    $getOldPhoto = $connexion->prepare("SELECT photo FROM galerie WHERE id = ?");
    $getOldPhoto->execute([$id]);
    $oldPhoto = $getOldPhoto->fetchColumn();

    # Gérer le téléchargement de la nouvelle photo
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
        $fichier_tmp = $_FILES['picture']['tmp_name'];
        $nom_original = $_FILES['picture']['name'];
        $destination = "../../img/galerie/";
        
        # Supprimer l'ancienne photo si elle existe
        if ($oldPhoto && file_exists($destination . $oldPhoto)) {
            unlink($destination . $oldPhoto);
        }
        
        # Enregistrer la nouvelle photo
        $newimage = RecuperPhoto($fichier_tmp, $nom_original, $destination);
        
        # Mettre à jour la base de données avec la nouvelle photo
        $req = $connexion->prepare("UPDATE galerie SET photo = ?, description = ? WHERE id = ?");
        $req->execute(array($newimage, $description, $id));

    } else {
        # Mettre à jour la base de données SANS changer la photo
        $req = $connexion->prepare("UPDATE galerie SET description = ? WHERE id = ?");
        $req->execute(array($description, $id));
    }

    if ($req) {
        $_SESSION['msg'] = "La photo a été modifiée avec succès !";
        header("location:../../views/galerie.php");
        exit();
    } else {
        $_SESSION['msg'] = "Échec de la modification de la photo.";
        header("location:../../views/galerie.php");
        exit();
    }

} else {
    # Rediriger si la page est accédée sans soumission de formulaire
    header("location:../../views/galerie.php");
    exit();
}
