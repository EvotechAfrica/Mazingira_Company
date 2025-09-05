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
  <script src="https://cdn.tailwindcss.com"></script>
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

  <!-- HERO -->
  <header class="relative">
    <div class="flex items-center justify-center h-screen bg-cover bg-center"
      style="background-image: linear-gradient(rgba(0,0,0,.6),rgba(0,0,0,.6)), url('img/cacao.jpg');">
      <div class="text-center text-white px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 landingText">Bienvenue chez MazingiraCompany</h1>
        <p class="text-lg md:text-xl mb-8 landingSubtitle">Votre partenaire pour un avenir durable et respectueux de
          l'environnement.</p>
        <a href="#about"
          class="inline-flex items-center px-8 py-4 text-lg font-medium bg-yellow-700 rounded-xl hover:bg-yellow-800 transition-all duration-500 landingButton">
          En savoir plus
          <svg class="w-5 h-5 ms-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5 10h10m0 0l-4 4m4-4-4-4" />
          </svg>
        </a>
      </div>
    </div>
  </header>

  <!-- ABOUT -->
  <section id="about" class="py-20 fade-in-section">
    <div class="container mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
      <div class="text-center md:text-left">
        <h2 class="text-4xl font-extrabold text-gray-900 mb-6">Notre mission</h2>
        <p class="text-lg text-gray-600 mb-6">Chez <b>MazingiraCompany</b>, nous croyons qu'un développement économique
          peut et doit se faire en harmonie avec la nature.</p>
        <p class="text-lg text-gray-600">Nous travaillons avec les agriculteurs locaux pour promouvoir des pratiques
          durables et offrir des produits sains.</p>
      </div>
      <div class="rounded-lg shadow-2xl transform transition-all duration-700 hover:scale-105">
        <img src="img/about_us.jpg" alt="Photo de MazingiraCompany" class="rounded-lg object-cover w-full h-80">
      </div>
    </div>
  </section>

  <!-- PARTNERS -->
  <section id="partners" class="py-20 fade-in-section relative">
    <div class="container mx-auto px-4 text-center relative z-10">
      <h2 class="font-bold text-3xl text-yellow-700 mb-6">Nos partenaires agriculteurs</h2>
      <p class="text-lg text-gray-600 mb-6">
        Nous collaborons avec <span id="farmer-count"
          class="font-extrabold text-yellow-700 text-5xl drop-shadow-md">0</span> agriculteurs passionnés.
      </p>
      <p class="text-gray-600">Leur expertise et leur passion sont essentielles à notre mission 🌱</p>
    </div>
  </section>

  <!-- autres sections... -->

  <?php require 'footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
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
          setTimeout(startCounter, 3000); // délai avant démarrage
          observer.unobserve(partnersSection);
        }
      });
    }, { threshold: 0.5 });

    observerPartners.observe(partnersSection);

    // Animation sections au scroll
    const sections = document.querySelectorAll('.fade-in-section');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
        }
      });
    }, { threshold: 0.2 });

    sections.forEach(section => observer.observe(section));
  </script>
</body>
</html>
