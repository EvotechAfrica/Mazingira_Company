<?php
# Connexion à la base de données
include '../../connexion/connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  # Récupérer les données du formulaire
  $userId = $_POST['user_id'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $function = $_POST['function'];
  $password = $_POST['password'];
  $profileImage = $_FILES['profile'];

  # Validation des données
  $errors = [];
  if (empty($username) || empty($email) || empty($function)) {
    $errors[] = "Tous les champs sont obligatoires.";
  }

  # Vérification du format de l'email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Adresse email invalide.";
  }

  # Vérification du mot de passe si fourni
  if (!empty($password)) {
    # Vérification de la force du mot de passe (ajoutez des règles si nécessaire)
    if (strlen($password) < 4) {
      $errors[] = "Le mot de passe doit contenir au moins 4 caractères.";
    }
  }

  # Vérification du type de fichier si un nouveau fichier est téléchargé
  if (!empty($profileImage['name'])) {
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    $fileExtension = pathinfo($profileImage['name'], PATHINFO_EXTENSION);
    if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
      $errors[] = "Le fichier doit être une image au format JPG, JPEG ou PNG.";
    }

    # Vérification de la taille de l'image (max 2 Mo)
    if ($profileImage['size'] > 2 * 1024 * 1024) {
      $errors[] = "L'image ne doit pas dépasser 2 Mo.";
    }
  }

  if (empty($errors)) {
    # Préparer la mise à jour des données
    $query = "UPDATE users SET nom = :username, fonction = :function, mail = :email" .
      (!empty($password) ? ", password = :password" : "") .
      (!empty($profileImage['name']) ? ", profile = :profile" : "") .
      " WHERE id = :user_id";
    $stmt = $connexion->prepare($query);

    # Lier les paramètres
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':function', $function);
    if (!empty($password)) {
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $stmt->bindParam(':password', $hashedPassword);
    }
    $stmt->bindParam(':user_id', $userId);

    # Déplacement du fichier téléchargé si un nouveau fichier est fourni
    if (!empty($profileImage['name'])) {
      $uploadDir = '../../img/profiles/';
      $uploadFile = $uploadDir . basename($profileImage['name']);
      if (move_uploaded_file($profileImage['tmp_name'], $uploadFile)) {
        $stmt->bindParam(':profile', $profileImage['name']);
      } else {
        $_SESSION['msg'] = "Erreur lors du téléchargement de l'image.";
        header("Location: ../../Views/user.php?idUser=$userId");
        exit();
      }
    }

    # Exécuter la requête
    if ($stmt->execute()) {
      $_SESSION['msg'] = "Utilisateur modifié avec succès.";
      header("Location: ../../Views/user.php");
      exit();
    } else {
      $_SESSION['msg'] = "Erreur lors de la modification de l'utilisateur.";
    }
  } else {
    $_SESSION['msg'] = implode("<br>", $errors);
  }

  # Rediriger vers la page de modification
  header("Location: ../../Views/user.php?idUser=$userId");
  exit();
}
