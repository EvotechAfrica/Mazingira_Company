<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="img/mazLogo.jpg" type="image/png">
    <style>
        #photo-preview {
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
            width: 200px;
            border: 2px dashed #cbd5e0;
        }

        #photo-preview img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            display: none;
        }

        #photo-preview .icon-user {
            font-size: 4rem;
            color: #a0aec0;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="flex">
        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>MazingiraCompany | Ajouter un membre</title>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.2/cdn.min.js" defer></script>
        </head>

        <body class="bg-gray-100 min-h-screen">
            <div class="flex">
                <aside class="w-64 bg-gray-800 text-white h-screen flex flex-col justify-between" style="min-height:100%;">
                    <div>
                        <div class="flex items-center justify-center h-16 bg-gray-900">
                            <span class="text-xl font-semibold">DASHBOARD</span>
                        </div>
                        <nav class="mt-4">
                            <ul>
                                <li x-data="{ open: false }">
                                    <button @click="open = !open" class="w-full px-6 py-2 flex items-center justify-between hover:bg-gray-700">
                                        <span><i class="fas fa-newspaper mr-3"></i> Articles</span>
                                        <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                                    </button>
                                    <div x-show="open" x-cloak class="bg-gray-700 ml-8 space-y-2">
                                        <a href="dashboard.php" class="block px-4 py-2 text-sm hover:bg-gray-600"><i class="fas fa-plus-circle mr-2"></i> Ajouter Article</a>
                                        <a href="liste_articles.php" class="block px-4 py-2 text-sm hover:bg-gray-600"><i class="fas fa-list mr-2"></i> Liste des Articles</a>
                                    </div>
                                </li>

                                <li x-data="{ open: false }">
                                    <button @click="open = !open" class="w-full px-6 py-2 flex items-center justify-between hover:bg-gray-700">
                                        <span><i class="fas fa-users mr-3"></i> Équipe</span>
                                        <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                                    </button>
                                    <div x-show="open" x-cloak class="bg-gray-700 ml-8 space-y-2">
                                        <a href="ajouter_membre.php" class="block px-4 py-2 text-sm hover:bg-gray-600"><i class="fas fa-plus-circle mr-2"></i> Ajouter un membre</a>
                                        <a href="liste_equipe.php" class="block px-4 py-2 text-sm hover:bg-gray-600"><i class="fas fa-list mr-2"></i> Liste des membres</a>
                                    </div>
                                </li>

                                <li class="px-6 py-2 hover:bg-gray-700">
                                    <a href="deconnexion.php" class="flex items-center">
                                        <i class="fas fa-sign-in-alt mr-2"></i> Se deconnecter
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </aside>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
        </body>

        </html>

        <div class="flex-grow">
            <!DOCTYPE html>
            <html lang="fr">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="Bienvenue chez APPESSA, votre partenaire de confiance pour un avenir durable. Notre mission est de promouvoir la pisciculture en tant que solution innovante pour nourrir nos communautés tout en protégeant notre planète. Nous croyons fermement que l'agriculture aquatique est une réponse clé aux défis alimentaires mondiaux. Parallèlement, nous nous engageons dans l'assainissement de l'environnement, en veillant à ce que chaque projet que nous entreprenons contribue à un écosystème plus sain. Rejoignez-nous dans cette aventure où l'innovation rencontre la durabilité pour un impact positif sur les générations futures.">
                <title>Tableau de bord Admin - APPESSA</title>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
                <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
            </head>

            <body class="bg-gray-100 min-h-screen">

                <div class="flex-grow ">
                    <header class="flex justify-between items-center bg-white p-4 shadow-md  mb-6">
                        <div class="flex items-center">
                            <div class=" p-2 rounded-full mr-3">
                                <i class="fas fa-user-circle text-2xl text-[#16C8FF]"></i>
                            </div>
                            <span class="text-gray-700 font-semibold">Administrateur</span>
                        </div>


                </div>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
            </body>

            </html>

            <h1 class="text-2xl font-bold text-center text-gray-700 mb-6">Ajouter un membre</h1>

            <div class="flex">
                <form action="insert_membre.php" method="post" enctype="multipart/form-data" class="w-2/3 bg-white p-6 rounded shadow-md flex flex-wrap ml-6">
                    <div class="w-1/2 px-3 mb-6">
                        <label class="block text-gray-700 font-bold mb-2 flex items-center" for="nom">
                            <i class="fas fa-user mr-2"></i> Nom
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nom" type="text" placeholder="Nom" name="nom">
                    </div>
                    <div class="w-1/2 px-3 mb-6">
                        <label class="block text-gray-700 font-bold mb-2 flex items-center" for="postnom">
                            <i class="fas fa-user mr-2"></i> Post-nom
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="postnom" type="text" placeholder="Post-nom" name="postnom">
                    </div>
                    <div class="w-1/2 px-3 mb-6">
                        <label class="block text-gray-700 font-bold mb-2 flex items-center" for="poste">
                            <i class="fas fa-briefcase mr-2"></i> Poste
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="poste" type="text" placeholder="Poste" name="poste">
                    </div>

                    <!-- Nouveau champ de sélection -->
                    <div class="w-1/2 px-3 mb-6">
                        <label class="block text-gray-700 font-bold mb-2 flex items-center" for="type_membre">
                            <i class="fas fa-users mr-2"></i> Type de membre
                        </label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="type_membre" name="type_membre">
                            <option value="administratif">Administratif</option>
                            <option value="operationnel">Opérationnel</option>
                        </select>
                    </div>

                    <div class="w-1/2 px-3 mb-6">
                        <label class="block text-gray-700 font-bold mb-2 flex items-center" for="photo">
                            <i class="fas fa-camera mr-2"></i> Photo
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="photo" type="file" accept="image/*" onchange="previewPhoto(event)" name="photo">
                    </div>
                    <div class="w-full px-3 mb-6 flex justify-end">
                        <button class="bg-gray-600 text-white font-semibold py-2 px-4 rounded shadow hover:bg-gray-400">
                            Enregistrer
                        </button>
                    </div>
                </form>


                <div id="photo-preview" class="ml-6">
                    <i class="fas fa-user icon-user"></i>
                    <img id="photo-output" alt="Prévisualisation de la photo">
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewPhoto(event) {
            const preview = document.getElementById('photo-output');
            const iconUser = document.querySelector('#photo-preview .icon-user');

            const reader = new FileReader();
            reader.onload = function() {
                preview.src = reader.result;
                preview.style.display = 'block';
                iconUser.style.display = 'none';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>