<?php

// Inclure le fichier de connexion à la base de données
include_once '../../connexion/connexion.php';
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Vérifier si l'adresse e-mail existe dans la requête POST
    if (isset($_POST['email']) && !empty($_POST['email'])) {

        // Nettoyer l'adresse e-mail pour prévenir les failles de sécurité
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        // Valider l'adresse e-mail
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            try {
                // Préparer la requête d'insertion (requête préparée pour éviter les injections SQL)
                $stmt = $connexion->prepare("INSERT INTO newsletter (email) VALUES (:email)");

                // Exécuter la requête en liant le paramètre
                $stmt->execute(['email' => $email]);

                // Envoyer un message de succès (tu peux le gérer côté front-end)
                // Par exemple, rediriger l'utilisateur vers une page de succès
                $_SESSION['msg'] = "Vous etes Abonnées !";
                header('Location: ../../index.php#cta');
                exit;

            } catch (PDOException $e) {
                // Gérer les erreurs (par exemple, si l'e-mail est déjà dans la BD)
                // Pour l'instant, on redirige vers une page d'erreur
                $_SESSION['msg'] = "Erreur lors de l'abonnement : " . $e->getMessage();
                header('Location: ../../index.php#cta');
                exit;
            }

        } else {
            // Gérer le cas où l'e-mail n'est pas valide
            $_SESSION['msg'] = "Adresse e-mail invalide.";
            header('Location: ../../index.php#cta');
            exit;
        }
    }
} else {
    // Si la page est accédée directement sans soumettre le formulaire
    header('Location: ../../index.php');
    exit;
}
?>