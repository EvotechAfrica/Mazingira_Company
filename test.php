<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MazingiraCompany - Nos Activités</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
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
        
        .staggered-animation > div:nth-child(1) { transition-delay: 0.1s; }
        .staggered-animation > div:nth-child(2) { transition-delay: 0.2s; }
        .staggered-animation > div:nth-child(3) { transition-delay: 0.3s; }
        .staggered-animation > div:nth-child(4) { transition-delay: 0.4s; }
        .staggered-animation > div:nth-child(5) { transition-delay: 0.5s; }
        .staggered-animation > div:nth-child(6) { transition-delay: 0.6s; }
        .staggered-animation > div:nth-child(7) { transition-delay: 0.7s; }
        .staggered-animation > div:nth-child(8) { transition-delay: 0.8s; }
        .staggered-animation > div:nth-child(9) { transition-delay: 0.9s; }
    </style>
</head>
<body>
    <section id="activities" class="py-20 fade-in-section bg-gradient-to-b from-white to-gray-100">
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
            
            <div class="text-center mt-16">
                <a href="#contact" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-yellow-700 hover:bg-yellow-800 transition-all duration-300">
                    Nous contacter
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

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
            }, { threshold: 0.2 });
            
            sections.forEach(section => observer.observe(section));
            
            // Animation des cartes d'activités
            const activityCards = document.querySelectorAll('.activity-card');
            const activityObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.15 });
            
            activityCards.forEach(card => activityObserver.observe(card));
        });
    </script>
</body>
</html>