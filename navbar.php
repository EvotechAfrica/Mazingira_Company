<style>
    /* Style et animation pour les liens de navigation */
    .navLiens {
        position: relative;
        color: #374151;
        /* Couleur du texte par défaut */
        font-weight: 500;
        transition: color 0.3s ease-in-out;
    }

    .navLiens::after {
        content: '';
        position: absolute;
        bottom: -2px;
        /* Position de la ligne sous le texte */
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #d97706;
        /* Couleur de la ligne jaune-orange */
        transform: scaleX(0);
        /* Cache la ligne au début */
        transform-origin: bottom right;
        transition: transform 0.3s ease-in-out;
    }

    .navLiens:hover {
        color: #d97706;
        /* Couleur du texte au survol */
    }

    .navLiens:hover::after,
    .navLiens.active::after {
        transform: scaleX(1);
        /* Fait apparaître la ligne au survol ou si le lien est actif */
        transform-origin: bottom left;
    }

    /* Styles pour la barre de navigation */
    .navbar-sticky {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        transition: all 0.5s ease-in-out;
    }

    .navbar-scrolled {
        background-color: rgba(255, 255, 255, 0.95);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(8px);
    }
</style>

<nav id="main-navbar" class="bg-white border-gray-200 shadow-md navbar-sticky">
    <div class="container mx-auto px-4 flex flex-wrap items-center justify-between py-4">

        <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse transition-transform duration-300 hover:scale-105">
            <img src="img/mazLogo.jpg" class="h-10" alt="MazingiraCompany Logo" />
            <span class="self-center text-2xl font-bold whitespace-nowrap text-gray-900">MAZINGIRA COMPANY</span>
        </a>

        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Ouvrir le menu principal</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-4 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="index.php" class="navLiens block py-2 px-3">Accueil</a>
                </li>
                <li>
                    <a href="apropos.php" class="navLiens block py-2 px-3">A propos</a>
                </li>
                <li>
                    <a href="index.php#Actualites" class="navLiens block py-2 px-3">Actualités</a>
                </li>
                <li>
                    <a href="index.php#contacts" class="navLiens block py-2 px-3">Contacts</a>
                </li>
                <li>
                    <a href="admin.php" class="navLiens block py-2 px-3">Se connecter</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    // Ajoute une classe "active" au lien de la page actuelle
    document.addEventListener('DOMContentLoaded', () => {
        const currentPath = window.location.pathname.split('/').pop();
        const navLinks = document.querySelectorAll('.navLiens');

        navLinks.forEach(link => {
            const linkPath = link.getAttribute('href').split('/').pop();
            if (currentPath === linkPath || (currentPath === '' && linkPath === 'index.php')) {
                link.classList.add('active');
            }
        });
    });

    // Effet de barre de navigation collante et d'ombre au défilement
    window.addEventListener('scroll', () => {
        const navbar = document.getElementById('main-navbar');
        if (window.scrollY > 50) { // Ajoute l'ombre après 50px de défilement
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    });
</script>