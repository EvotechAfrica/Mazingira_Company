<?php
# Connexion à la BD
include '../connexion/connexion.php'; //
# Appel de la page qui fait les affichages
require_once('../models/select/select-membre.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <span class="text-gray-700 font-semibold">Administrateur/Liste/Equipe</span>
                </div>
            </header>

            <div class="p-4 md:p-6">
                <div class="mt-2">
                    <h3 class="text-2xl font-bold text-gray-700 mb-3 text-center">Liste des employers</h3>

                    <div class="bg-white p-6 rounded shadow-md overflow-x-auto">
                        <div class="flex flex-col sm:flex-row items-center justify-between mb-4">
                            <div class="w-full sm:w-2/3 mb-4 sm:mb-0">
                                <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Rechercher un article..." class="w-full p-2 border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                            </div>
                            <a href="membre.php?NewMember" class="bg-gray-600 text-white px-4 py-2 rounded-full shadow-lg transition-colors duration-200 flex items-center sm:ml-4">
                                <i class="fas fa-plus-circle mr-2"></i>
                                Ajouter
                            </a>
                        </div>

                        <table id="articleTable" class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Noms
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Telephone
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fonction & Poste
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Profil
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php
                                $i = 1;
                                while ($tab = $getMember->fetch()) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <?= $i ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <?= $tab['nom'] . " " . $tab['postnom'] . " " . $tab['prenom'] ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <?= $tab['telephone'] ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <?= $tab['fonction'] . " : " . $tab['poste'] ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <img src="../img/profiles/<?= $tab["photo"] ?>" alt="" class="w-11 h-11 rounded-full cursor-pointer">
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Fonction générique pour fermer un modal
        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden'); // Cacher le modal
                document.body.classList.remove('overflow-hidden'); // Réactiver le défilement du corps
            }
        }
    </script>
    <?php require_once 'script.php' ?>
</body>

</html>