<?php
include '../../connexion/connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    # Récupérer les données du formulaire
    $username = $_POST['username'];
    $email = $_POST['email'];
    $function = $_POST['function'];
    $password = $_POST['password'];
    $profileImage = $_FILES['profile'];
    $statut = 0;
    # Validation des données
    $errors = [];
    if (empty($username) || empty($email) || empty($function) || empty($password) || empty($profileImage['name'])) {
        $errors[] = "Tous les champs sont obligatoires.";
    }

    # Vérification du format de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Adresse email invalide.";
    }

    # Vérification du type de fichier
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    $fileExtension = pathinfo($profileImage['name'], PATHINFO_EXTENSION);
    if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
        $errors[] = "Le fichier doit être une image au format JPG, JPEG ou PNG.";
    }

    # Vérification de la taille de l'image (max 2 Mo)
    if ($profileImage['size'] > 2 * 1024 * 1024) {
        $errors[] = "L'image ne doit pas dépasser 2 Mo.";
    }

    if (empty($errors)) {
        # Hachage du mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        # Déplacement du fichier téléchargé
        $uploadDir = '../../img/profiles/';
        $uploadFile = $uploadDir . basename($profileImage['name']);
        if (move_uploaded_file($profileImage['tmp_name'], $uploadFile)) {
            # Insertion de l'utilisateur dans la base de données
            $query = "INSERT INTO `users`(`nom`, `fonction`, `mail`, `pwd`, `photo`, `statut`) VALUES (:username, :function,:email,  :password, :profile, :statut)";
            $stmt = $connexion->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':function', $function);
            $stmt->bindParam(':email', $email);            
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':profile', $profileImage['name']);
            $stmt->bindParam(':statut', $statut);

            if ($stmt->execute()) {
                $_SESSION['msg'] = "Utilisateur enregistré avec succès.";
                header("Location: ../../views/user.php"); 
                exit();
            } else {
                $_SESSION['msg'] = "Erreur lors de l'enregistrement de l'utilisateur.";
            }
        } else {
            $_SESSION['msg'] = "Erreur lors du téléchargement de l'image.";
        }
    } else {
        $_SESSION['msg'] = implode("<br>", $errors);
    }

    # Rediriger vers la page du formulaire
    header("Location: ../../views/user.php?NewUser");
    exit();
}
