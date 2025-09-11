<?php
if (isset($_GET['idUser'])) {
    $userId = $_GET['idUser'];
    // Récupérer les informations de l'utilisateur
    $query = "SELECT * FROM users WHERE id = :id";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(':id', $userId);
    $stmt->execute();
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
    $title = "Modifier l'utilisateur";
    $action="../models/updat/up-user-post.php"; // Lien vers le script de modification
    $btn = "Modifier";
}else{
    $title="Enregister un nouvel Administrateur";
    $btn="Enregistrer";
    $action="../models/add/add-user-post.php";
}
$statut = 0;
$getUser = $connexion->prepare("SELECT * FROM `users` WHERE users.statut=? ORDER BY id DESC;");
$getUser->execute([$statut]);

// Vérification de l'ID de l'utilisateur à modifier
 