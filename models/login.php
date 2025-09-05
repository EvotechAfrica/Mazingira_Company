<?php
include '../connexion/connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validation des entrées
    if (empty($email) || empty($password)) {
        $_SESSION['msg'] = "L'email et le mot de passe sont obligatoires.";
        header("Location: ../login.php");
        exit();
    } 

    // Préparation de la requête pour récupérer l'utilisateur
    $query = "SELECT * FROM users WHERE mail = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $pwd = $user['pwd'];

    // Vérification de l'utilisateur et du mot de passe
    # if ($user && password_verify($password, $user['pwd']))
    if ($password == $pwd) {
        // Informations de l'utilisateur stockées dans la session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_nom'] = $user['nom'];
        $_SESSION['user_fonction'] = $user['fonction'];

        // Redirection vers la page d'accueil ou tableau de bord
        header("Location: ../views/home.php");
        exit();
    } else {
        $_SESSION['msg'] = "Identifiants invalides.";
        header("Location: ../login.php");
        exit();
    }
} else {
    $_SESSION['msg'] = "Méthode de requête invalide.";
    header("Location: ../login.php");
    exit();
}
