<aside class="w-64 bg-gray-800 text-white flex-shrink-0 absolute md:relative inset-y-0 left-0 transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out" :class="{'-translate-x-full': !open, 'translate-x-0': open}">
    <div class="flex items-center justify-end h-16 bg-gray-900 md:hidden">
        <button @click="open = false" class="text-white p-4">
            <i class="fas fa-times text-xl"></i>
        </button>
    </div>
    <div>
        <div class="flex items-center justify-center text-center h-16 bg-gray-900 md:block hidden">
            <span class="text-xl font-semibold pt-5">Menus</span>
        </div>
        <nav class="mt-4">
            <ul>
                <li class="px-6 py-2 hover:bg-gray-700">
                    <a href="home.php" class="flex items-center">
                        <i class="fas fa-home mr-2"></i> Accueil
                    </a>
                </li>
                <li x-data="{ subOpen: false }">
                    <button @click="subOpen = !subOpen" class="w-full px-6 py-2 flex items-center justify-between hover:bg-gray-700">
                        <span><i class="fas fa-newspaper mr-3"></i> Articles</span>
                        <i :class="subOpen ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                    </button>
                    <div x-show="subOpen" x-cloak class="bg-gray-700 ml-8 space-y-2">
                        <a href="article.php" class="block px-4 py-2 text-sm hover:bg-gray-600">
                            <i class="fas fa-plus-circle mr-2"></i> Ajouter Article
                        </a>
                    </div>
                </li>
                <li x-data="{ subOpen: false }">
                    <button @click="subOpen = !subOpen" class="w-full px-6 py-2 flex items-center justify-between hover:bg-gray-700">
                        <span><i class="fas fa-users mr-3"></i> Équipe</span>
                        <i :class="subOpen ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                    </button>
                    <div x-show="subOpen" x-cloak class="bg-gray-700 ml-8 space-y-2">
                        <a href="membre.php" class="block px-4 py-2 text-sm hover:bg-gray-600">
                            <i class="fas fa-plus-circle mr-2"></i> Ajouter un membre
                        </a>
                        <a href="list-membre.php" class="block px-4 py-2 text-sm hover:bg-gray-600">
                            <i class="fas fa-list mr-2"></i> Liste des membres
                        </a>
                    </div>
                </li>
                <li class="px-6 py-2 hover:bg-gray-700">
                    <a href="galerie.php" class="flex items-center">
                        <i class="fas fa-images mr-2"></i> Galerie
                    </a>
                </li>
                <li x-data="{ userOpen: false }">
                    <button @click="userOpen = !userOpen" class="w-full px-6 py-2 flex items-center justify-between hover:bg-gray-700">
                        <span><i class="fas fa-user mr-3"></i> Utilisateurs</span>
                        <i :class="userOpen ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                    </button>
                    <div x-show="userOpen" x-cloak class="bg-gray-700 ml-8 space-y-2">
                        <a href="user.php?NewUser" class="block px-4 py-2 text-sm hover:bg-gray-600">
                            <i class="fas fa-plus-circle mr-2"></i> Nouvel Utilisateur
                        </a>
                        <a href="user.php" class="block px-4 py-2 text-sm hover:bg-gray-600">
                            <i class="fas fa-list mr-2"></i> Liste Utilisateurs
                        </a>
                    </div>
                </li>
                <li class="px-6 py-2 hover:bg-gray-700">
                    <a href="../models/log-out.php" class="flex items-center">
                        <i class="fas fa-sign-out-alt mr-2"></i> Se déconnecter
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>