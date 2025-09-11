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

        /* Styles pour le diaporama corrigé */
        .slider-container {
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        .slides-wrapper {
            display: flex;
            height: 100%;
            transition: transform 0.7s ease-in-out;
            width: 300%;
        }

        .slide {
            flex-shrink: 0;
            width: 33.3333%;
            height: 100%;
            background-size: cover;
            background-position: center;
        }

        .slide-content {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            text-align: center;
            color: white;
            padding: 0 1rem;
        }

        .slider-nav {
            position: absolute;
            bottom: 2rem;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            gap: 0.75rem;
            z-index: 10;
        }

        .slider-dot {
            width: 0.75rem;
            height: 0.75rem;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .slider-dot.active {
            background-color: white;
        }

        .slider-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 0.75rem;
            border-radius: 50%;
            cursor: pointer;
            z-index: 10;
            transition: background-color 0.3s ease;
        }

        .slider-arrow:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .slider-arrow.prev {
            left: 1rem;
        }

        .slider-arrow.next {
            right: 1rem;
        }

        * {
            scroll-behavior: smooth;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .activity-card {
            transition: all 0.4s ease;
            transform: translateY(50px);
            opacity: 0;
            border-left: 4px solid #d97706;
        }

        .activity-card.visible {
            transform: translateY(0);
            opacity: 1;
        }

        .activity-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .fade-in-section {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 1.2s ease, transform 1.2s ease;
        }

        .fade-in-section.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .icon-wrapper {
            transition: all 0.3s ease;
        }

        .activity-card:hover .icon-wrapper {
            transform: scale(1.1) rotate(5deg);
            color: #d97706;
        }

        .staggered-animation>div:nth-child(1) {
            transition-delay: 0.1s;
        }

        .staggered-animation>div:nth-child(2) {
            transition-delay: 0.2s;
        }

        .staggered-animation>div:nth-child(3) {
            transition-delay: 0.3s;
        }

        .staggered-animation>div:nth-child(4) {
            transition-delay: 0.4s;
        }

        .staggered-animation>div:nth-child(5) {
            transition-delay: 0.5s;
        }

        .staggered-animation>div:nth-child(6) {
            transition-delay: 0.6s;
        }

        .staggered-animation>div:nth-child(7) {
            transition-delay: 0.7s;
        }

        .staggered-animation>div:nth-child(8) {
            transition-delay: 0.8s;
        }

        .staggered-animation>div:nth-child(9) {
            transition-delay: 0.9s;
        }
    </style>
</head>

<body class="font-sans bg-white">
    <?php require 'navbar.php'; ?>

    <header class="relative">
        <div class="slider-container">
            <div class="slides-wrapper">
                <!-- Slide 1 -->
                <div class="slide" style="background-image: url('img/cacao.jpg');">
                    <div class="slide-content">
                        <div>
                            <h1 class="text-4xl md:text-5xl font-bold mb-6 landingText">MAZINGIRA COMPANY SARL</h1>
                            <p class="text-lg md:text-xl mb-8 landingSubtitle">Votre partenaire spécialisé dans le café et le cacao.</p>
                            <a href="#company-description" class="inline-flex items-center px-8 py-4 text-md font-medium bg-yellow-700 rounded-lg hover:bg-yellow-800 transition-all duration-500 landingButton">
                                En savoir plus
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="slide" style="background-image: url('img/chargement.jpg');">
                    <div class="slide-content">
                        <div>
                            <h1 class="text-4xl md:text-5xl font-bold mb-6">MAZINGIRA COMPANY SARL</h1>
                            <p class="text-lg md:text-xl mb-8">Votre partenaire pour un avenir durable.</p>
                            <a href="#company-description" class="inline-flex items-center px-8 py-4 text-md font-medium bg-yellow-700 rounded-lg hover:bg-yellow-800 transition-all duration-500">
                                En savoir plus
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="slide" style="background-image: url('img/etalage.jpg');">
                    <div class="slide-content">
                        <div>
                            <h1 class="text-4xl md:text-5xl font-bold mb-6">MAZINGIRA COMPANY SARL</h1>
                            <p class="text-lg md:text-xl mb-8">Inspiration et innovation pour demain.</p>
                            <a href="#company-description" class="inline-flex items-center px-8 py-4 text-md font-medium bg-yellow-700 rounded-lg hover:bg-yellow-800 transition-all duration-500">
                                En savoir plus
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation par points -->
            <div class="slider-nav">
                <div class="slider-dot active" data-slide="0"></div>
                <div class="slider-dot" data-slide="1"></div>
                <div class="slider-dot" data-slide="2"></div>
            </div>

            <!-- Flèches de navigation -->
            <div class="slider-arrow prev">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </div>
            <div class="slider-arrow next">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </div>
    </header>

    <!-- Le reste de votre contenu reste inchangé -->
    <section id="company-description" class="py-20 bg-gray-100 fade-in-section">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl font-extrabold text-yellow-700 mb-6">MAZINGIRA COMPANY : Un avenir durable, aujourd'hui
            </h2>
            <p class="text-base text-gray-700 mb-8 leading-relaxed">
                De par sa structure organisationnelle et ses activités, MAZINGIRA Cie est une société
                commerciale faisant le café robusta et cacao. Mazingira company en sigle MAZ Cie
                est une société à responsabilité limitée créée en Mars 2019 par 4 associés qui ont mis
                ensemble leurs parts sociales pour son démarrage. Son siège social est à Butembo.
            </p>
            <div class="flex justify-center flex-wrap gap-8">
                <div
                    class="bg-white rounded-lg shadow-md p-6 flex-1 min-w-[250px] flex flex-col items-center transition-transform duration-300 hover:scale-105">

                    <h3 class="font-medium text-gray-900">Mission</h3>
                    <p class="text-gray-500">
                        Encadrement et promotion du producteur paysan pour rendre
                        financièrement fort à travers l’activité agricole en vue de l’auto-prise en
                        charge économique et financière.
                    </p>
                </div>
                <div
                    class="bg-white rounded-lg shadow-md p-6 flex-1 min-w-[250px] flex flex-col items-center transition-transform duration-300 hover:scale-105">
                    <h3 class="font-medium text-gray-900">Objectif principal</h3>
                    <p class="text-gray-500">
                        La société MAZINGIRA s’engagent à produire et collecter
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

    <!-- <section id="about" class="py-20 fade-in-section">
        <div class="container mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
            <div class="text-center md:text-left">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-6">Notre mission</h2>
                <p class="text-base text-gray-600 mb-6">
                    Chez <b>MazingiraCompany</b>, nous croyons qu'un développement
                    économique peut et doit se faire en harmonie avec la nature.
                </p>
                <p class="text-base text-gray-600">
                    Nous travaillons avec les agriculteurs locaux pour promouvoir des
                    pratiques durables et offrir des produits sains.
                </p>
            </div>
            <div class="rounded-lg shadow-2xl transform transition-all duration-700 hover:scale-105">
                <img src="img/mazLogo.jpg" alt="Photo de MazingiraCompany" class="rounded-lg w-full h-80">
            </div>
        </div>
    </section> -->
    <section id="about" class="py-20 fade-in-section bg-gradient-to-b from-white to-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Nos Activités</h2>
                <div class="w-24 h-1 bg-yellow-600 mx-auto mb-6"></div>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Découvrez les différentes actions que nous menons pour soutenir les caféiculteurs et cacaoculteurs
                    et promouvoir une agriculture durable et rentable.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 staggered-animation">
                <!-- Activité 1 -->
                <div class="activity-card bg-white rounded-lg p-6 shadow-md">
                    <div class="icon-wrapper w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center mb-4 text-yellow-700">
                        <i class="fas fa-seedling text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-3">Accès aux semences et intrants</h3>
                    <p class="text-gray-600">
                        Faciliter l'accès des caféiculteurs aux semences de variétés performantes, aux intrants,
                        équipements agricoles de qualité et aux nouvelles connaissances liées au secteur du café.
                    </p>
                </div>

                <!-- Activité 2 -->
                <div class="activity-card bg-white rounded-lg p-6 shadow-md">
                    <div class="icon-wrapper w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center mb-4 text-yellow-700">
                        <i class="fas fa-tree text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-3">Installation de pépinières</h3>
                    <p class="text-gray-600">
                        Installer des pépinières pour permettre aux producteurs l'accès facile aux semences
                        de qualité à un prix profitable.
                    </p>
                </div>

                <!-- Activité 3 -->
                <div class="activity-card bg-white rounded-lg p-6 shadow-md">
                    <div class="icon-wrapper w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center mb-4 text-yellow-700">
                        <i class="fas fa-truck-loading text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-3">Collecte des produits</h3>
                    <p class="text-gray-600">
                        Collecter le café, cacao et autres produits agricoles directement auprès des producteurs.
                    </p>
                </div>

                <!-- Activité 4 -->
                <div class="activity-card bg-white rounded-lg p-6 shadow-md">
                    <div class="icon-wrapper w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center mb-4 text-yellow-700">
                        <i class="fas fa-cogs text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-3">Traitement des produits</h3>
                    <p class="text-gray-600">
                        Réaliser un traitement des produits collectés en vue de l'exportation et de la valorisation.
                    </p>
                </div>

                <!-- Activité 5 -->
                <div class="activity-card bg-white rounded-lg p-6 shadow-md">
                    <div class="icon-wrapper w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center mb-4 text-yellow-700">
                        <i class="fas fa-boxes text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-3">Conditionnement</h3>
                    <p class="text-gray-600">
                        Conditionner du café et cacao prêts à être mis sur le marché selon les standards internationaux.
                    </p>
                </div>

                <!-- Activité 6 -->
                <div class="activity-card bg-white rounded-lg p-6 shadow-md">
                    <div class="icon-wrapper w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center mb-4 text-yellow-700">
                        <i class="fas fa-handshake text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-3">Commercialisation</h3>
                    <p class="text-gray-600">
                        Commercialiser le cacao et café collecté auprès de clients qui offrent des meilleurs prix
                        pour récompenser le travail des producteurs.
                    </p>
                </div>

                <!-- Activité 7 -->
                <div class="activity-card bg-white rounded-lg p-6 shadow-md">
                    <div class="icon-wrapper w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center mb-4 text-yellow-700">
                        <i class="fas fa-chart-line text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-3">Amélioration de la gouvernance</h3>
                    <p class="text-gray-600">
                        Participer aux diverses actions visant à améliorer la gouvernance de la filière café,
                        cacao et autres filières agricoles.
                    </p>
                </div>

                <!-- Activité 8 -->
                <div class="activity-card bg-white rounded-lg p-6 shadow-md">
                    <div class="icon-wrapper w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center mb-4 text-yellow-700">
                        <i class="fas fa-award text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-3">Certifications</h3>
                    <p class="text-gray-600">
                        Encadrer les producteurs et les conduire vers l'acquisition de différentes certifications
                        (Biologique, commerce équitable, Rainforest, etc.).
                    </p>
                </div>

                <!-- Activité 9 -->
                <div class="activity-card bg-white rounded-lg p-6 shadow-md">
                    <div class="icon-wrapper w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center mb-4 text-yellow-700">
                        <i class="fas fa-globe-africa text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-3">Marketing international</h3>
                    <p class="text-gray-600">
                        Faire le marketing du café, cacao et autres récoltes produits dans les zones,
                        au niveau local et à l'étranger.
                    </p>
                </div>
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
                        <img src="img/chargement.jpg" class="absolute block w-full h-full object-cover top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" alt="Produit 2">
                        <h1 class="absolute text-white text-3xl md:text-5xl font-extrabold top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 drop-shadow-lg text-center px-4">Produit 2</h1>
                    </div>
                    <div class="duration-700 ease-in-out absolute inset-0 transition-opacity" data-carousel-item>
                        <img src="img/etalage.jpg" class="absolute block w-full h-full object-cover top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" alt="Produit 3">
                        <h1 class="absolute text-white text-3xl md:text-5xl font-extrabold top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 drop-shadow-lg text-center px-4">Produit 3</h1>
                    </div>
                    <div class="duration-700 ease-in-out absolute inset-0 transition-opacity" data-carousel-item>
                        <img src="img/depot.jpg" class="absolute block w-full h-full object-cover top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" alt="Produit 4">
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
                        <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                        <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
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
                            <p class="font-semibold text-gray-900">Jean Kasereka</p>
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
                            <p class="font-semibold text-gray-900">Ir Marie</p>
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
                            <p class="font-semibold text-gray-900">Luvuno katembo</p>
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
        document.addEventListener('DOMContentLoaded', function() {
            // Animation des sections au scroll
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

            // Animation des cartes d'activités
            const activityCards = document.querySelectorAll('.activity-card');
            const activityObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.15
            });

            activityCards.forEach(card => activityObserver.observe(card));
        });
        // Script corrigé pour le diaporama
        document.addEventListener('DOMContentLoaded', function() {
            // Configuration du slider
            let currentSlide = 0;
            const slidesWrapper = document.querySelector('.slides-wrapper');
            const slides = document.querySelectorAll('.slide');
            const dots = document.querySelectorAll('.slider-dot');
            const prevArrow = document.querySelector('.slider-arrow.prev');
            const nextArrow = document.querySelector('.slider-arrow.next');
            let slideInterval;
            const totalSlides = slides.length;

            // Fonction pour afficher un slide spécifique
            function showSlide(index) {
                // S'assurer que l'index est dans les limites
                if (index < 0) {
                    currentSlide = totalSlides - 1;
                } else if (index >= totalSlides) {
                    currentSlide = 0;
                } else {
                    currentSlide = index;
                }

                // Calculer la transformation
                const translateValue = -currentSlide * (100 / totalSlides);
                slidesWrapper.style.transform = `translateX(${translateValue}%)`;

                // Mettre à jour les points de navigation
                dots.forEach((dot, i) => {
                    dot.classList.toggle('active', i === currentSlide);
                });
            }

            // Fonction pour passer au slide suivant
            function nextSlide() {
                showSlide(currentSlide + 1);
            }

            // Fonction pour passer au slide précédent
            function prevSlide() {
                showSlide(currentSlide - 1);
            }

            // Configuration des événements
            nextArrow.addEventListener('click', function() {
                nextSlide();
                resetInterval();
            });

            prevArrow.addEventListener('click', function() {
                prevSlide();
                resetInterval();
            });

            // Ajouter des écouteurs d'événements pour les points de navigation
            dots.forEach((dot, index) => {
                dot.addEventListener('click', function() {
                    showSlide(index);
                    resetInterval();
                });
            });

            // Fonction pour démarrer l'intervalle de défilement automatique
            function startInterval() {
                slideInterval = setInterval(nextSlide, 5000);
            }

            // Fonction pour réinitialiser l'intervalle
            function resetInterval() {
                clearInterval(slideInterval);
                startInterval();
            }

            // Démarrer le défilement automatique
            startInterval();

            // Arrêter le défilement automatique lorsque la souris survole le slider
            const sliderContainer = document.querySelector('.slider-container');
            sliderContainer.addEventListener('mouseenter', function() {
                clearInterval(slideInterval);
            });

            // Reprendre le défilement automatique lorsque la souris quitte le slider
            sliderContainer.addEventListener('mouseleave', function() {
                startInterval();
            });

            // Compteur partenaires avec délai de 3 secondes
            const farmerCountElement = document.getElementById('farmer-count');
            if (farmerCountElement) {
                const target = 628;
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
                if (partnersSection) {
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
                }
            }

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
        });
    </script>

</body>

</html>