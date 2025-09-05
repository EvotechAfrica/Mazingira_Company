<?php
# Connexion à la BD
include 'connexion/connexion.php';
# Appel de la page qui fait les affichages
require_once('models/select/select-article-view.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Bienvenue chez MazingiraCompany, votre partenaire pour un avenir durable et respectueux de l'environnement. Nous proposons des solutions innovantes pour la préservation de la nature, la promotion de produits écologiques et le développement d'une agriculture responsable. Rejoignez-nous pour contribuer à un monde plus vert et sain pour les générations futures.">
    <title>MazingiraCompany</title>
    <link rel="icon" href="img/mazLogo.jpg" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQHj6gWwJ4b92b6lF2fN4Wq9g2h7y5O2wT3HjG6Z5W5v5q5r5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.3.0/dist/flowbite.min.css" rel="stylesheet" />
    <style>
        /* Effets généraux */
        * {
            scroll-behavior: smooth;
        }

        /* Zoom fluide sur images */
        .div1 img {
            transition: transform 1s ease-in-out;
        }

        .div1 img:hover {
            transform: scale(1.12) rotate(1deg);
        }

        /* Texte landing animé */
        .landingText,
        .landingSubtitle,
        .landingButton {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInSlideUp 1.5s ease forwards;
        }

        .landingSubtitle {
            animation-delay: 0.5s;
        }

        .landingButton {
            animation-delay: 1s;
        }

        @keyframes fadeInSlideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animation fade-in sections */
        .fade-in-section {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 1.2s ease, transform 1.2s ease;
        }

        .fade-in-section.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Partenaires compteur animé */
        #partners {
            background: linear-gradient(to right, #fff, #fefae0);
            position: relative;
            overflow: hidden;
        }

        #partners::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(217, 119, 6, 0.1);
            animation: slideBg 5s infinite linear;
        }

        @keyframes slideBg {
            from {
                left: -100%;
            }

            to {
                left: 100%;
            }
        }
    </style>
</head>

<body class="font-sans bg-white">
    <?php require 'navbar.php'; ?>

    <header class="relative">
        <div class="flex items-center justify-center h-screen bg-cover bg-center"
            style="background-image: linear-gradient(rgba(0,0,0,.6),rgba(0,0,0,.6)), url('img/cacao.jpg');">
            <div class="text-center text-white px-4">
                <h1 class="text-3xl md:text-4xl font-bold mb-6 landingText">MAZINGIRA COMPANY SARL</h1>
                <p class="text-md md:text-lg mb-8 landingSubtitle">
                    Votre partenaire spécialisé dans le café et le cacao.
                </p>
                <a href="#company-description"
                    class="inline-flex items-center px-8 py-4 text-md font-medium bg-yellow-700 rounded-xl hover:bg-yellow-800 transition-all duration-500 landingButton">
                    En savoir plus
                    <svg class="w-5 h-5 ms-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 10h10m0 0l-4 4m4-4-4-4" />
                    </svg>
                </a>
            </div>
        </div>
    </header>

    <section id="company-description" class="py-20 bg-gray-100 fade-in-section">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl font-extrabold text-yellow-700 mb-6">MAZINGIRA Company : Un avenir durable, aujourd'hui
            </h2>
            <p class="text-base text-gray-700 mb-8 leading-relaxed">
                De par sa structure organisationnelle et ses activités, MAZINGIRA Cie est une société
                commerciale faisant le café robusta et cacao. Mazingira company en sigle MAZ Cie
                est une société à responsabilité limitée créée en Mars 2019 par 4 associés qui ont mis
                ensemble leurs parts sociales pour son démarrage. Son siège social à Butembo.
            </p>
            <div class="flex justify-center flex-wrap gap-8">
                <div
                    class="bg-white rounded-lg shadow-md p-6 flex-1 min-w-[250px] flex flex-col items-center transition-transform duration-300 hover:scale-105">

                    <h3 class="font-medium text-gray-900">Mission</h3>
                    <p class="text-gray-500">
                        Encadrement et promotion du producteur paysan pour, rendre
                        financièrement fort à travers l’activité agricole en vue de l’auto-prise en
                        charge économique et financière.
                    </p>
                </div>
                <div
                    class="bg-white rounded-lg shadow-md p-6 flex-1 min-w-[250px] flex flex-col items-center transition-transform duration-300 hover:scale-105">
                    <h3 class="font-medium text-gray-900">Objectif principal</h3>
                    <p class="text-gray-500">
                        Les producteurs de la société MAZINGIRA s’engagent à produire et collecter
                        le café et cacao de qualité supérieure et autres produits pour obtenir un meilleur prix
                    </p>
                </div>
                <div
                    class="bg-white rounded-lg shadow-md p-6 flex-1 min-w-[250px] flex flex-col items-center transition-transform duration-300 hover:scale-105">

                    <h3 class="font-medium text-gray-900">Vision</h3>
                    <p class="text-gray-500">
                        Voir un monde paysan économiquement solide et financièrement autonome grâce à la culture et la commercialisation du café et du cacao.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="py-20 fade-in-section">
        <div class="container mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
            <div class="text-center md:text-left">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-6">Notre mission</h2>
                <p class="text-base text-gray-600 mb-6">Chez <b>MazingiraCompany</b>, nous croyons qu'un développement
                    économique peut et doit se faire en harmonie avec la nature.</p>
                <p class="text-base text-gray-600">Nous travaillons avec les agriculteurs locaux pour promouvoir des
                    pratiques durables et offrir des produits sains.</p>
            </div>
            <div class="rounded-lg shadow-2xl transform transition-all duration-700 hover:scale-105">
                <img src="img/mazLogo.jpg" alt="Photo de MazingiraCompany" class="rounded-lg w-full h-80">
            </div>
        </div>
    </section>
    
    <section id="products" class="py-16 bg-gray-50 fade-in-section">
        <div class="container mx-auto px-4">
            <h2 class="text-center font-bold text-2xl text-yellow-700 mb-8">Nos produits</h2>
            <p class="mb-12 text-center text-gray-500 max-w-2xl mx-auto">
                Découvrez notre gamme variée de produits durables et écologiques, conçus pour un impact positif sur
                l'environnement.
            </p>

            <div id="indicators-carousel" class="relative w-full" data-carousel="slide" data-carousel-interval="3000">
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    <div class="duration-700 ease-in-out absolute inset-0 transition-opacity" data-carousel-item>
                        <img src="img/cacao.jpg" class="absolute block w-full h-full object-cover top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" alt="Produit 1">
                        <h1 class="absolute text-white text-3xl md:text-5xl font-extrabold top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 drop-shadow-lg text-center px-4">Produit 1</h1>
                    </div>
                    <div class="duration-700 ease-in-out absolute inset-0 transition-opacity" data-carousel-item>
                        <img src="img/cacao.jpg" class="absolute block w-full h-full object-cover top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" alt="Produit 2">
                        <h1 class="absolute text-white text-3xl md:text-5xl font-extrabold top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 drop-shadow-lg text-center px-4">Produit 2</h1>
                    </div>
                    <div class="duration-700 ease-in-out absolute inset-0 transition-opacity" data-carousel-item>
                        <img src="img/cacao.jpg" class="absolute block w-full h-full object-cover top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" alt="Produit 3">
                        <h1 class="absolute text-white text-3xl md:text-5xl font-extrabold top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 drop-shadow-lg text-center px-4">Produit 3</h1>
                    </div>
                    <div class="duration-700 ease-in-out absolute inset-0 transition-opacity" data-carousel-item>
                        <img src="img/cacao.jpg" class="absolute block w-full h-full object-cover top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" alt="Produit 4">
                        <h1 class="absolute text-white text-3xl md:text-5xl font-extrabold top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 drop-shadow-lg text-center px-4">Produit 4</h1>
                    </div>
                    <div class="duration-700 ease-in-out absolute inset-0 transition-opacity" data-carousel-item>
                        <img src="img/cacao.jpg" class="absolute block w-full h-full object-cover top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" alt="Produit 5">
                        <h1 class="absolute text-white text-3xl md:text-5xl font-extrabold top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 drop-shadow-lg text-center px-4">Produit 5</h1>
                    </div>
                </div>
                <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                </div>
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                        <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" /></svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                        <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" /></svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
    </section>

    <section id="partners" class="py-20 fade-in-section relative">
        <div class="container mx-auto px-4 text-center relative z-10">
            <h2 class="font-bold text-2xl text-yellow-700 mb-6">Nos partenaires agriculteurs</h2>
            <p class="text-base text-gray-600 mb-6">
                Nous collaborons avec <span id="farmer-count"
                    class="font-extrabold text-yellow-700 text-5xl drop-shadow-md">0</span> agriculteurs passionnés.
            </p>
            <p class="text-gray-600">Leur expertise et leur passion sont essentielles à notre mission 🌱</p>
        </div>
    </section>

    <section id="testimonials" class="py-20 bg-white fade-in-section">
        <div class="container mx-auto px-4">
            <h2 class="text-center font-bold text-2xl text-yellow-700 mb-12">Ce que nos clients disent de nous</h2>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="p-6 bg-gray-100 rounded-lg shadow-md transition-transform duration-300 hover:scale-105">
                    <p class="italic text-gray-600 mb-4">"MazingiraCompany m'a aidé à trouver des produits locaux et
                        respectueux de l'environnement pour mon entreprise. Leur engagement est inspirant !"</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
                        <div>
                            <p class="font-semibold text-gray-900">Jean Dupont</p>
                            <p class="text-sm text-gray-600">Client fidèle</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-gray-100 rounded-lg shadow-md transition-transform duration-300 hover:scale-105">
                    <p class="italic text-gray-600 mb-4">"Grâce à MazingiraCompany, notre exploitation agricole a pu
                        adopter des méthodes plus durables, améliorant à la fois la qualité de nos produits et
                        l'environnement."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
                        <div>
                            <p class="font-semibold text-gray-900">Marie Leblanc</p>
                            <p class="text-sm text-gray-600">Partenaire agricole</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-gray-100 rounded-lg shadow-md transition-transform duration-300 hover:scale-105">
                    <p class="italic text-gray-600 mb-4">"Je suis impressionné par la qualité et l'authenticité de
                        leurs produits. On sent vraiment leur passion pour la nature."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
                        <div>
                            <p class="font-semibold text-gray-900">Pierre Martin</p>
                            <p class="text-sm text-gray-600">Consommateur</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="actualites" class="py-16 fade-in-section">
        <div class="container mx-auto px-4">
            <h2 class="text-center font-bold text-2xl text-yellow-700 mb-12" id="Actualites">Dernières nouvelles</h2>
            <div class="flex items-center justify-center flex-wrap gap-6">
                <?php
                while ($article = $getArticle->fetch()) {
                ?>
                    <div
                        class="w-full sm:w-[380px] bg-white border border-gray-200 rounded-lg shadow-md div1 overflow-hidden transition-transform duration-300 hover:scale-105">
                        <a href="article1.php">
                            <img class="rounded-t-lg w-full h-48 object-cover" src="img/mis_enavant/<?= $article["photo"] ?>"
                                alt="Article 1" />
                        </a>
                        <div class="p-5">
                            <a href="article1.php">
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">
                                    <?= htmlspecialchars(mb_strlen($article['titre']) > 20 ? mb_substr($article['titre'], 0, 20) . '...' : $article['titre']) ?>
                                </h5>
                            </a>
                            <p class="mb-4 text-gray-400 text-sm">
                                <?= $article["auteur"] ?> | Le <?= $article["date"] ?>
                            </p>
                            <p class="mb-3 font-normal text-gray-900 dark:text-gray-400">
                                <?= htmlspecialchars(mb_strlen($article['description']) > 100 ? mb_substr($article['description'], 0, 100) . '...' : $article['description']) ?>
                            </p>
                            <a href="article.php?ArtId=<?= $article["id"] ?>"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none transition-colors duration-200">
                                Lire la suite
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

    <section id="cta" class="py-20 bg-yellow-700 text-white fade-in-section">
        <?php
        if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) { ?>
            <div class="w-full mt-3">
                <div class="bg-blue-100 text-orange-800 p-3 rounded-md text-center">
                    <?= $_SESSION['msg'] ?>
                </div>
            </div>
        <?php }
        # Cette ligne permet de vider la valeur qui se trouve dans la session message
        unset($_SESSION['msg']);
        ?>
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl font-extrabold mb-4">Rejoignez notre communauté durable !</h2>
            <p class="text-lg mb-8">
                Inscrivez-vous à notre newsletter pour recevoir nos dernières actualités, des offres exclusives et des
                conseils écologiques.
            </p>
            <form action="models/add/subscribe.php" method="POST" class="max-w-md mx-auto">
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <input type="email" name="email" id="email-cta" placeholder="Entrez votre adresse email" required
                        class="w-full sm:flex-1 p-3 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    <button type="submit"
                        class="w-full sm:w-auto px-6 py-3 font-bold text-yellow-700 bg-white rounded-lg hover:bg-gray-200 transition-colors duration-200">
                        S'abonner
                    </button>
                </div>
            </form>
        </div>
    </section>

    <?php require 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.3.0/dist/flowbite.min.js"></script>
    <script>
        // Compteur partenaires avec délai de 3 secondes
        const farmerCountElement = document.getElementById('farmer-count');
        const target = 320;
        let count = 0;

        function startCounter() {
            const duration = 3000; // 3s
            const increment = target / (duration / 20);
            const counter = setInterval(() => {
                count += increment;
                if (count >= target) {
                    count = target;
                    clearInterval(counter);
                }
                farmerCountElement.textContent = Math.round(count);
            }, 20);
        }

        const partnersSection = document.getElementById('partners');
        const observerPartners = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    startCounter(); // Lance le compteur dès que la section est visible
                    observer.unobserve(partnersSection);
                }
            });
        }, {
            threshold: 0.5
        });

        observerPartners.observe(partnersSection);

        // Animation sections au scroll
        const sections = document.querySelectorAll('.fade-in-section');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                }
            });
        }, {
            threshold: 0.2
        });

        sections.forEach(section => observer.observe(section));
    </script>
</body>

</html>