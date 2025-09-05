<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MazingiraCompany | Contacts</title>
    <link rel="icon" href="img/mazLogo.jpg" type="image/png">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        yellow: {
                            '700': '#d97706',
                            '800': '#b45309',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
<?php require 'navbar.php'; ?>
<section>
    <div class="container mx-auto p-6 mt-[100px]">
        <h1 class="text-3xl font-bold mb-4 text-center text-yellow-700">Nos informations</h1>
        
        <div class="bg-white rounded-md p-4 md:w-[75%] sm:w-[70%] lg:w-[48%] m-auto mb-6 shadow-md">
            <p class="mb-4 text-center text-[18px] font-bold text-gray-800">Coordonnées</p>

            <div class="space-y-2">
                <span class="p-4 block text-gray-700">
                    <i class="fas fa-map-marker-alt mr-2 text-yellow-700"></i> Localisation : Butembo, DRC
                </span>
                <span class="p-4 block text-gray-700">
                    <i class="fas fa-phone mr-2 text-yellow-700"></i> Téléphone : 0975770421
                </span>
                <span class="p-4 block text-gray-700">
                    <i class="fas fa-envelope mr-2 text-yellow-700"></i> Email : MazingiraCompany@gmail.com
                </span>
            </div>
        </div>
        
        <h1 class="text-[18px] font-bold mb-4 text-center text-yellow-700">Nous Contacter</h1>
        <form action="#" method="post" class="space-y-4 bg-white p-6 rounded-lg shadow-lg m-auto md:w-[75%] sm:w-[70%] lg:w-[48%]">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" id="name" name="nom" required class="border mt-1 block w-full border-gray-300 rounded-md shadow-sm p-2 focus:border-yellow-700 focus:ring-yellow-700">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required class="border mt-1 block w-full border-gray-300 rounded-md shadow-sm p-2 focus:border-yellow-700 focus:ring-yellow-700">
            </div>
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea id="message" name="message" rows="4" required class="border mt-1 block w-full border-gray-300 rounded-md shadow-sm p-2 focus:border-yellow-700 focus:ring-yellow-700"></textarea>
            </div>
            <button type="submit" class="px-4 py-2 bg-yellow-700 text-white rounded-md hover:bg-yellow-800">Envoyer</button>
        </form>
    </div>
</section>
<?php require 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>