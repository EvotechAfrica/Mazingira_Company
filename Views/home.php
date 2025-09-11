<?php
# Connexion à la BD
include '../connexion/connexion.php';

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MazingiraCompany</title>
    <?php require_once 'style.php'; ?>
</head>

<body class="bg-gray-100 min-h-screen">
    <div x-data="{ open: false }" class="flex flex-col md:flex-row min-h-screen">
        <?php require_once 'aside.php'; ?>
        <div class="flex-grow">
            <header class="flex justify-between items-center bg-white p-4 shadow-md mb-6">
                <div class="flex items-center">
                    <button @click="open = !open" class="md:hidden text-gray-500 mr-4">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <div class="p-2 rounded-full mr-3">
                        <i class="fas fa-user-circle text-2xl text-[#16C8FF]"></i>
                    </div>
                    <span class="text-gray-700 font-semibold">Tableau de bord</span>
                </div>
            </header>

            <div class="p-4 md:p-6">
                <h3 class="text-2xl font-bold text-center text-gray-700 mb-6">Bienvenue sur MazingiraCompany</h3>
                <?php
                # Affichage des messages de session (Notifications)
                if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) { ?>
                    <div class="bg-blue-100 text-blue-800 p-3 rounded-md text-center mb-4">
                        <?= $_SESSION['msg'] ?>
                    </div>
                <?php
                    unset($_SESSION['msg']);
                }
                ?>
                <p class="text-center text-gray-600">Nous sommes ravis de vous accueillir ! Utilisez le menu à gauche pour naviguer.</p>
            </div>
        </div>
    </div>

    
    <?php require_once 'script.php' ?>
</body>

</html>