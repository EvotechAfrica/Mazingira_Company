<?php
# Connexion à la BD
include '../connexion/connexion.php';
# Appel de la page qui fait les affichages
require_once('../models/select/select-galerie.php');


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie - MazingiraCompany Admin</title>
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
                    <span class="text-gray-700 font-semibold">Administrateur / Galerie</span>
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

                if (isset($_GET['NewGallery']) || isset($_GET['idGallery'])) {
                ?>
                    <h3 class="text-2xl font-bold text-center text-gray-700 mb-6"><?= $title ?></h3>
                    <div class="flex flex-col md:flex-row items-center md:items-start justify-center md:justify-start gap-6">
                        <form action="<?= $Action ?>" method="post" enctype="multipart/form-data" class="w-2/3 bg-white p-6 rounded shadow-md flex flex-wrap ml-6">
                            <div class="w-full px-3 mb-6">
                                <label class="block text-gray-700 font-bold mb-2 flex items-center" for="description">
                                    <i class="fas fa-edit mr-2"></i> Description
                                </label>
                                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" placeholder="Description de l'image" name="description"><?= isset($gallery) ? $gallery['description'] : '' ?></textarea>
                            </div>
                            <div class="w-full px-3 mb-6">
                                <label class="block text-gray-700 font-bold mb-2 flex items-center" for="photo">
                                    <i class="fas fa-camera mr-2"></i> Photo
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="photo" type="file" accept="image/*" onchange="previewPhoto(event)" name="picture">
                            </div>
                            <div class="w-full px-3 mb-6 flex justify-end">
                                <button class="bg-gray-600 text-white font-semibold py-2 px-4 rounded shadow hover:bg-gray-400" name="valider">
                                    <?= $btn ?>
                                </button>
                            </div>
                        </form>
                        <div id="photo-preview" class="w-full mt-6 md:mt-0 md:w-auto flex-shrink-0">
                            <?php if (isset($gallery) && !empty($gallery['photo'])) { ?>
                                <img src="../img/galerie/<?= $gallery['photo'] ?>" alt="Prévisualisation" id="photo-output" class="w-48 h-48 object-cover rounded shadow-lg">
                            <?php } else { ?>
                                <i class="fa-regular fa-image text-gray-400 text-6xl"></i>
                                <img id="photo-output" alt="Prévisualisation de la photo" class="w-48 h-48 object-cover rounded shadow-lg mt-2 hidden">
                            <?php } ?>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="mt-2">
                        <h3 class="text-2xl font-bold text-gray-700 mb-3 text-center">Liste des photos de la galerie</h3>

                        <div class="bg-white p-6 rounded shadow-md overflow-x-auto">
                            <div class="flex flex-col sm:flex-row items-center justify-between mb-4">
                                <div class="w-full sm:w-2/3 mb-4 sm:mb-0">
                                    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Rechercher une photo..." class="w-full p-2 border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                                </div>
                                <a href="galerie.php?NewGallery" class="bg-gray-600 text-white px-4 py-2 rounded-full shadow-lg transition-colors duration-200 flex items-center sm:ml-4">
                                    <i class="fas fa-plus-circle mr-2"></i>
                                    Ajouter
                                </a>
                            </div>

                            <table id="articleTable" class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php
                                    $i = 1;
                                    while ($galerie = $getGalerie->fetch()) {
                                    ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= $i++ ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <img src="../img/galerie/<?= $galerie["photo"] ?>" alt="<?= $galerie["description"] ?>" class="w-16 h-16 object-cover rounded-md cursor-pointer">
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium text-gray-900 max-w-xs overflow-hidden text-ellipsis"><?= $galerie['description'] ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <a href="galerie.php?idGallery=<?= $galerie['id'] ?>" class="text-blue-600 hover:text-blue-800" title="Modifier">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <button onclick="openDeleteModal('<?= $galerie['id'] ?>')" title="Supprimer" class="text-red-600 hover:text-red-800">
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
            <p class="mb-6 text-gray-700 dark:text-gray-300">Êtes-vous sûr de vouloir supprimer cette photo ? Cette action est irréversible.</p>
            <p class="hidden">ID à supprimer : <span id="deleteIdDisplay" class="font-bold"></span></p>
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
            confirmButton.href = `../models/delete/delete_galerie.php?id=${id}`;
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
            const table = document.getElementById('articleTable');
            const tr = table.getElementsByTagName('tr');

            for (let i = 0; i < tr.length; i++) {
                const td = tr[i].getElementsByTagName('td')[2]; // Index 2 pour la colonne Description
                if (td) {
                    const txtValue = td.textContent || td.innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function previewPhoto(event) {
            const output = document.getElementById('photo-output');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    output.src = e.target.result;
                    output.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
    <?php require_once 'script.php' ?>
</body>

</html>