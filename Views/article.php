<?php
# Connexion à la BD
include '../connexion/connexion.php'; //
# Appel de la page qui fait les affichages
require_once('../models/select/select-article.php');
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
                    <span class="text-gray-700 font-semibold">Administrateur</span>
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
                # Cette ligne permet de vider la valeur qui se trouve dans la session message
                unset($_SESSION['msg']);
                if (isset($_GET['NewArt'])) {
                ?>
                    <h3 class="text-2xl font-bold text-center text-gray-700 mb-6"><?= $title ?></h3>
                    <div class="flex flex-col md:flex-row items-center md:items-start justify-center md:justify-start gap-6">
                        <form action="<?= $Action ?>" method="post" enctype="multipart/form-data" class="w-full md:w-2/3 bg-white p-6 rounded shadow-md">
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-gray-700 font-bold mb-2 flex items-center" for="titre">
                                        <i class="fas fa-book mr-2"></i> Titre
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="titre" type="text" placeholder="Titre de l'article" name="titre">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-bold mb-2 flex items-center" for="auteur">
                                        <i class="fas fa-user-edit mr-2"></i> Auteur
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="auteur" type="text" placeholder="Auteur de l'article" name="auteur">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-bold mb-2 flex items-center" for="description">
                                        <i class="fas fa-align-left mr-2"></i> Description
                                    </label>
                                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" rows="4" placeholder="Description de l'article" name="description"></textarea>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-bold mb-2 flex items-center" for="photo">
                                        <i class="fas fa-camera mr-2"></i> Photo
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="photo" type="file" accept="image/*" onchange="previewPhoto(event)" name="picture">
                                </div>
                            </div>
                            <div class="mt-6 flex justify-end">
                                <input type="submit" name="valider" class="bg-gray-600 text-white font-semibold py-2 px-4 rounded shadow hover:bg-gray-400 cursor-pointer" value="<?= $btn ?>">
                            </div>
                        </form>
                        <div id="photo-preview" class="w-full mt-6 md:mt-0 md:w-auto flex-shrink-0">
                            <i class="fa-regular fa-image"></i>
                            <img id="photo-output" alt="Prévisualisation de la photo">
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="mt-2">
                        <h3 class="text-2xl font-bold text-gray-700 mb-3 text-center">Liste des Articles</h3>

                        <div class="bg-white p-6 rounded shadow-md overflow-x-auto">
                            <div class="flex flex-col sm:flex-row items-center justify-between mb-4">
                                <div class="w-full sm:w-2/3 mb-4 sm:mb-0">
                                    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Rechercher un article..." class="w-full p-2 border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                                </div>
                                <a href="article.php?NewArt" class="bg-gray-600 text-white px-4 py-2 rounded-full shadow-lg transition-colors duration-200 flex items-center sm:ml-4">
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
                                            Date
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Titre & Auteur
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Contenus
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Couverture
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php
                                    $i = 1;
                                    while ($tab = $getArticle->fetch()) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <?= $i ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <?= $tab['date'] ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <?= htmlspecialchars(mb_strlen($tab['titre']) > 20 ? mb_substr($tab['titre'], 0, 20) . '...' : $tab['titre']. " " . $tab['auteur']) ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <p>
                                                    <?= htmlspecialchars(mb_strlen($tab['description']) > 50 ? mb_substr($tab['description'], 0, 50) . '...' : $tab['description']) ?>
                                                </p>
                                                <p class="text-xs text-gray-400 mt-1">
                                                    Nombre de caractères : **<?= mb_strlen($tab['description']) ?>**
                                                </p>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <img src="../img/mis_enavant/<?= $tab["photo"] ?>" alt="" class="w-11 h-11 rounded-full cursor-pointer">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <a href="article.php?NewArt&idArticle=<?= $tab['id'] ?>" class="text-blue-600 hover:text-blue-800" title="Modifier">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <button onclick="openDeleteModal('<?= $tab['id'] ?>')" title="Supprimer" class="text-red-600 hover:text-red-800">
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
    <!-- Modal Suppression -->
    <div id="modalDelete" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-[100] hidden">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-xl max-w-sm w-full text-center">
            <h3 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Confirmer la suppression</h3>
            <p class="mb-6 text-gray-700 dark:text-gray-300">Êtes-vous sûr de vouloir supprimer cet élément ? Cette action est irréversible.</p>

            <p class="hidden">ID à supprimer : <span id="deleteIdDisplay" class="font-bold"></span></p>
            <input type="hidden" id="hiddenDeleteId" value="">

            <div class="flex justify-center gap-4">
                <button onclick="closeModal('modalDelete')" class="px-5 py-2 bg-gray-300 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-400 dark:hover:bg-gray-600 transition duration-150">Annuler</button>
                <a id="confirmDeleteButton" href="#" class="px-5 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-150">Supprimer</a>
            </div>
        </div>
    </div>
    <script>
        // Fonction pour ouvrir un modal et passer un ID
        function openDeleteModal(id) {
            const modal = document.getElementById('modalDelete');
            const confirmButton = document.getElementById('confirmDeleteButton');
            const deleteIdDisplay = document.getElementById('deleteIdDisplay');
            const hiddenDeleteId = document.getElementById('hiddenDeleteId');

            // Mettre à jour l'ID affiché et l'ID dans le champ caché
            deleteIdDisplay.textContent = id;
            hiddenDeleteId.value = id;

            // Définir le lien de suppression. Adaptez l'URL selon votre backend (ex: delete_membre.php?id=...)
            confirmButton.href = `../models/delete/delete_article.php?id=${id}`; // Assurez-vous que votre script de suppression gère cet ID

            modal.classList.remove('hidden'); // Afficher le modal
            document.body.classList.add('overflow-hidden'); // Empêcher le défilement du corps
        }

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