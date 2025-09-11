<?php
# Connexion à la BD
include 'connexion/connexion.php';
# Appel de la page qui fait les affichages
require_once('models/select/select-membre.php');
require_once('models/select/select-galerie.php'); // Ligne ajoutée
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MazingiraCompany</title>
    <link rel="icon" href="img/mazLogo.jpg" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQHj6gWwJ4b92b6lF2fN4Wq9g2h7y5O2wT3HjG6Z5W5v5q5r5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        yellow: {
                            '700': '#d97706',
                            '800': '#b45309',
                            '500': '#eab308',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .act {
            border: 1px solid #d97706;
            border-radius: 6px;
        }

        @media screen and (max-width: 768px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .text-historique {
                margin-top: 3rem;
                text-align: center;
                margin-bottom: 1rem;
            }

            #gallery>div {
                width: auto;
            }

            #membres {
                padding: 0;
                margin-top: 2rem;
                margin-right: 0;
                margin-left: 0;
            }
        }
    </style>
</head>

<body class="bg-gray-50 font-sans">
    <?php require 'navbar.php'; ?>

    <section class="container mx-auto px-4 md:px-6 py-16 mt-[60px] flex flex-col lg:flex-row lg:gap-12 items-center justify-center">
        <div class="w-full lg:w-2/3 text-justify bg-white p-8 rounded-lg shadow-xl mb-8 lg:mb-0">
            <h2 class="text-4xl font-extrabold text-yellow-700 mb-6 text-center lg:text-left">Notre Histoire</h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                MazingiraCompany a été fondée en 2019 par un groupe de passionnés de l’environnement,
                désireux de contribuer activement à la préservation de la nature et au développement
                durable. Depuis sa création, l’entreprise s’est engagée à sensibiliser les communautés
                locales à l’importance de la protection de l’écosystème, tout en proposant des solutions
                innovantes pour une gestion responsable des ressources naturelles. Grâce à une équipe
                dynamique et engagée, MazingiraCompany a su mettre en place divers projets éducatifs,
                environnementaux et sociaux, visant à promouvoir un avenir plus vert et plus sain pour
                tous.
            </p>
            <p class="text-gray-700 leading-relaxed">
                Depuis sa création, MazingiraCompany s’est illustrée par son engagement en faveur de
                l’environnement et du développement durable. Notre équipe œuvre chaque jour pour sensibiliser
                le public à la préservation de la biodiversité, à la gestion responsable des ressources naturelles
                et à l’adoption de pratiques écologiques. Nous collaborons avec des partenaires locaux et internationaux
                afin de mettre en place des projets innovants, éducatifs et sociaux, qui visent à améliorer la qualité
                de vie des communautés tout en protégeant notre planète. Notre vision
                est de bâtir un avenir où l’harmonie entre l’homme et la nature sera une réalité partagée par tous.
            </p>
        </div>
        <div class="w-full lg:w-1/3 flex justify-center items-center p-4">
            <img src="img/mazLogo.jpg" class="rounded-full shadow-2xl w-64 h-64 object-cover border-4 border-yellow-700 transform hover:scale-105 transition-transform duration-300" alt="Notre logo MazingiraCompany">
        </div>
    </section>

    <h2 class="text-4xl font-extrabold text-yellow-700 text-center mt-16 mb-12">Notre Galerie</h2>
    <section id="gallery" class="container mx-auto px-4 md:px-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
        <?php
        # Ajout de la boucle PHP pour afficher les images de la galerie
        while ($galerie = $getGalerie->fetch()) {
        ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform duration-300">
                <img src="img/galerie/<?= $galerie["photo"] ?>" alt="<?= $galerie["description"] ?>" class="w-full h-64 object-cover">
                <div class="p-4">
                    <p class="text-gray-700 text-sm"><?= $galerie["description"] ?></p>
                </div>
            </div>
        <?php } ?>
    </section>

    <h2 class="text-4xl font-extrabold text-yellow-700 text-center mt-16 mb-12">Rencontrez Notre Équipe</h2>
    <section id="membres" class="container mx-auto px-4 md:px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mb-16">
        <?php
        $i = 1;
        while ($tab = $getMember->fetch()) {
            $i++;
        ?>
            <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center text-center transform hover:scale-105 transition-transform duration-300">
                <img src="img/profiles/<?= $tab["photo"] ?>" alt="Membre de l'équipe" class="rounded-full w-32 h-32 object-cover mb-4 border-2 border-yellow-500">
                <h3 class="font-bold text-xl text-gray-800 mb-1"><?= $tab['nom']." ".$tab['postnom']." ".$tab['prenom'] ?></h3>
                <p class="text-gray-600"><?= $tab['fonction'] . " : " . $tab['poste'] ?></p>
            </div>
        <?php }
        ?>
    </section>

    <?php require 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>