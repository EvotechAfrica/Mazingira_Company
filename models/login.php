<?php
include '../connexion/connexion.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    # Récupérer les identifiants
    $username = $_POST['admin'];
    $password = $_POST['mdp'];
     echo $username;
     echo $password;

    # Préparer et exécuter la requête pour vérifier l'utilisateur
    $query = "SELECT * FROM users WHERE mail = :username";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    # Vérifier si l'utilisateur existe et si le mot de passe est correct
    if ($user && password_verify($password, $user['pwd'])) {
        # Stocker les informations de l'utilisateur dans la session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['mail'];
        $_SESSION['msg'] = "Connexion réussie !";

        # Rediriger vers le tableau de bord
        header("Location: ../Views/home.php");
        exit();
    } else {
        # Message d'erreur en cas d'identifiants incorrects
        $_SESSION['msg'] = "Identifiant ou mot de passe incorrect.";
        header("Location: ../admin.php");
        exit();
    }
}else{
    header("Location: ../admin.php");
    exit();
}
