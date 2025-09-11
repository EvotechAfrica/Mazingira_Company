<?php
# Connexion à la BD
include 'connexion/connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="img/mazLogo.jpg" type="image/png">
    <style>
        /* Animation pour le formulaire */
        .card-animation {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInSlideUp 0.8s ease-out forwards;
        }

        @keyframes fadeInSlideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-sm p-8 bg-white shadow-xl rounded-lg card-animation relative">
        <button onclick="window.location.href='index.php'" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <div class="flex flex-col items-center mb-6">
            <img src="img/mazLogo.jpg" alt="Logo Mazingira" class="w-16 h-16 rounded-full mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Se connecter</h2>
        </div>

        <?php
        if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) { ?>
            <div class="bg-red-100 text-red-800 p-3 rounded-md text-center mb-4">
                <?= $_SESSION['msg'] ?>
            </div>
        <?php
            unset($_SESSION['msg']);
        }
        ?>

        <form action="models/login.php" method="post">
            <div class="mb-4">
                <label for="admin" class="sr-only">Identifiant</label>
                <input 
                    type="mail" 
                    name="admin" 
                    id="admin" 
                    placeholder="Identifiant@mazingira.com" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 transition-colors" 
                    required>
            </div>

            <div class="mb-6">
                <label for="mdp" class="sr-only">Mot de passe</label>
                <input 
                    type="password" 
                    name="mdp" 
                    id="mdp" 
                    placeholder="Mot de passe" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 transition-colors" 
                    required>
            </div>

            <button type="submit" class="w-full py-2 bg-yellow-700 text-white font-semibold rounded-md hover:bg-yellow-800 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50">
                Se connecter
            </button>
        </form>
    </div>
</body>
</html>