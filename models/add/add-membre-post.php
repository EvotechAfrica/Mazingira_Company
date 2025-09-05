<?php
# Appel de la connexion
include_once '../../connexion/connexion.php';
# Fonction pour upload les images
require_once('../../fonctions/fonctions.php');
# Enregistrement d'un jeune 
if (isset($_POST['valider'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $postnom = htmlspecialchars($_POST['postnom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $poste = htmlspecialchars($_POST['poste']);
    $fonction = htmlspecialchars($_POST['type_membre']);

    if (is_numeric($telephone)) {
        $statut = 0;
        $getDeplicantMember = $connexion->prepare("SELECT * FROM membre where telephone=? and statut=? ");
        $getDeplicantMember->execute(array($telephone, $statut));
        $existant = $getDeplicantMember->fetch();
        if ($existant['id'] >= 1) {
            $_SESSION['msg'] = "Le membre avec les memes identifiants existe déjà dans la base de données";
            header("location:../../views/membre.php");
        } else {
            $fichier_tmp = $_FILES['picture']['tmp_name'];
            $nom_original = $_FILES['picture']['name'];
            $destination = "../../img/profiles/";
            # fonction permettant de recuperer la photo
            $newimage = RecuperPhoto($fichier_tmp, $nom_original, $destination);
            $statut = 0;
            $req = $connexion->prepare("INSERT INTO `membre`(`nom`, `postnom`, `prenom`, `telephone`, `fonction`, `poste`, `photo`, `statut`) VALUES (?,?,?,?,?,?,?,?)");
            $req->execute(array($nom, $postnom, $prenom, $telephone, $fonction, $poste, $newimage, $statut));
            if ($req) {
                $_SESSION['msg'] = "Enregistrement reussi !";
                header("location:../../views/membre.php");
            } else {
                $_SESSION['msg'] = "Echec d'enregistrement";
                header("location:../../views/membre.php");
            }
        }
    } else {
        $_SESSION['msg'] = "Le numero de téléphone ne doit pas contenir des caracteres Alphanumerique";
        header("location:../../views/membre.php");
    }
} else {
    header("location:../../views/membre.php");
}
