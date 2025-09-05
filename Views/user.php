<?php
# Connexion à la BD
include '../connexion/connexion.php';
# Appel de la page qui fait les affichages
require_once('../models/select/select-utilisateurs.php');

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateurs - MazingiraCompany Admin</title>
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
                    <span class="text-gray-700 font-semibold">Administrateur / Utilisateurs</span>
                </div>
            </header>

            <div class="p-4 md:p-6">
                <?php
                if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) { ?>
                    <div class="w-full mt-3">
                        <div class="bg-blue-100 text-blue-800 p-3 rounded-md text-center">
                            <?= $_SESSION['msg'] ?>
                        </div>
                    </div>
                <?php }
                unset($_SESSION['msg']);

                if (isset($_GET['NewUser']) || isset($_GET['idUser'])) {
                ?>
                    <h3 class="text-2xl font-bold text-center text-gray-700 mb-6"><?= $title ?></h3>
                    <div class="flex flex-col md:flex-row items-center md:items-start justify-center md:justify-start gap-6">
                        <form action="<?= $Action ?>" method="post" class="w-2/3 bg-white p-6 rounded shadow-md flex flex-wrap ml-6">
                            <div class="w-full px-3 mb-6">
                                <label class="block text-gray-700 font-bold mb-2 flex items-center" for="username">
                                    <i class="fas fa-user mr-2"></i> Nom d'utilisateur
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="username" required>
                            </div>
                            <div class="w-full px-3 mb-6">
                                <label class="block text-gray-700 font-bold mb-2 flex items-center" for="email">
                                    <i class="fas fa-envelope mr-2"></i> Email
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" required>
                            </div>
                            <div class="w-full px-3 mb-6 flex justify-end">
                                <button class="bg-gray-600 text-white font-semibold py-2 px-4 rounded shadow hover:bg-gray-400" name="valider">
                                    <?= $btn ?>
                                </button>
                            </div>
                        </form>
                    </div>
                <?php
                } else {
                ?>
                    <div class="mt-2">
                        <h3 class="text-2xl font-bold text-gray-700 mb-3 text-center">Liste des utilisateurs</h3>

                        <div class="bg-white p-6 rounded shadow-md overflow-x-auto">
                            <div class="flex flex-col sm:flex-row items-center justify-between mb-4">
                                <div class="w-full sm:w-2/3 mb-4 sm:mb-0">
                                    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Rechercher un utilisateur..." class="w-full p-2 border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                                </div>
                                <a href="utilisateurs.php?NewUser" class="bg-gray-600 text-white px-4 py-2 rounded-full shadow-lg transition-colors duration-200 flex items-center sm:ml-4">
                                    <i class="fas fa-plus-circle mr-2"></i>
                                    Ajouter
                                </a>
                            </div>

                            <table id="userTable" class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom d'utilisateur</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php
                                    $i = 1;
                                    while ($utilisateur = $getUtilisateurs->fetch()) {
                                    ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= $i++ ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $utilisateur['username'] ?></td>
                                            <td class="px-6 py-4 text-sm font-medium text-gray-900"><?= $utilisateur['email'] ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <a href="utilisateurs.php?idUser=<?= $utilisateur['id'] ?>" class="text-blue-600 hover:text-blue-800" title="Modifier">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <button onclick="openDeleteModal('<?= $utilisateur['id'] ?>')" title="Supprimer" class="text-red-600 hover:text-red-800">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <div id="modalDelete" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-[100] hidden">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-xl max-w-sm w-full text-center">
            <h3 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Confirmer la suppression</h3>
            <p class="mb-6 text-gray-700 dark:text-gray-300">Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.</p>
            <input type="hidden" id="hiddenDeleteId" value="">
            <div class="flex justify-center gap-4">
                <button onclick="closeModal('modalDelete')" class="px-5 py-2 bg-gray-300 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-400 dark:hover:bg-gray-600 transition duration-150">Annuler</button>
                <a id="confirmDeleteButton" href="#" class="px-5 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-150">Supprimer</a>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(id) {
            const modal = document.getElementById('modalDelete');
            const confirmButton = document.getElementById('confirmDeleteButton');
            const hiddenDeleteId = document.getElementById('hiddenDeleteId');
            hiddenDeleteId.value = id;
            confirmButton.href = `../models/delete/delete_utilisateur.php?id=${id}`;
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        }

        function searchTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('userTable');
            const tr = table.getElementsByTagName('tr');

            for (let i = 0; i < tr.length; i++) {
                const td = tr[i].getElementsByTagName('td')[1]; // Index 1 pour la colonne Nom d'utilisateur
                if (td) {
                    const txtValue = td.textContent || td.innerText;
                    tr[i].style.display = txtValue.toLowerCase().indexOf(filter) > -1 ? "" : "none";
                }
            }
        }
    </script>
    <?php require_once 'script.php' ?>
</body>

</html>