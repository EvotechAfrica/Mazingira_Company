<?php
// Inclure les fichiers de connexion et de requête à la base de données
include 'connexion/connexion.php';
require_once('models/select/select-article-view.php');

// Vérifier si un ID d'article est présent dans l'URL
if (!isset($_GET['ArtId']) || empty($_GET['ArtId'])) {
    header('Location: index.php'); // Rediriger vers l'accueil si l'ID est manquant
    exit;
}

$articleId = $_GET['ArtId'];

// Préparer et exécuter la requête pour l'article principal
$stmt = $connexion->prepare("SELECT id, titre, description, photo, auteur, date, description FROM article WHERE id = :id");
$stmt->execute(['id' => $articleId]);
$article = $stmt->fetch();

// Vérifier si l'article existe
if (!$article) {
    header('Location: index.php'); // Rediriger si l'article n'est pas trouvé
    exit;
}

// Préparer la requête pour les articles connexes (exclure l'article actuel)
$stmtConnexes = $connexion->prepare("SELECT id, titre, description, photo FROM article WHERE id != :id ORDER BY date DESC LIMIT 4");
$stmtConnexes->execute(['id' => $articleId]);
$articlesConnexes = $stmtConnexes->fetchAll();
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
                        sans: ['Inter', 'sans-serif'], // Ajout d'une police plus moderne
                    }
                }
            }
        }
    </script>
    <style>
        /* Des styles plus minimalistes pour une meilleure lisibilité */
        body {
            font-family: 'Inter', sans-serif;
        }

        p,
        li {
            line-height: 1.75;
        }

        img {
            transition: transform 0.3s ease;
        }

        img:hover {
            transform: scale(1.02);
        }

        .article-content a {
            color: #d97706;
            text-decoration: underline;
        }

        /* Effet de survol subtil pour les articles connexes */
        .connex-card:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            transform: translateY(-5px);
        }

        .connex-card {
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="bg-gray-100">
    <?php require 'navbar.php'; ?>

    <main class="container mx-auto px-4 md:px-6 py-12 pt-[80px]">
        <div class="flex flex-col lg:flex-row lg:gap-10">

            <article class="w-full lg:w-2/3 bg-white p-6 rounded-xl shadow-md mb-8 lg:mb-0">

                <div class="overflow-hidden rounded-lg mb-6">
                    <img src="img/mis_enavant/<?= htmlspecialchars($article['photo']); ?>" alt="<?= htmlspecialchars($article['titre']); ?>" class="w-full h-96 object-cover transform hover:scale-105 transition-transform duration-300">
                </div>

                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4 leading-tight"><?= htmlspecialchars($article['titre']); ?></h1>
                <p class="text-sm text-gray-500 mb-6">
                    Par <span class="font-semibold text-yellow-700"><?= htmlspecialchars($article['auteur']); ?></span> | Le <?= htmlspecialchars($article['date']); ?>
                </p>
                <hr class="mb-6 border-gray-200">

                <div class="prose max-w-none text-gray-700 article-content">
                    <?= $article['description']; ?>
                </div>

            </article>

            <aside class="w-full lg:w-1/3">
                <div class="bg-white p-6 rounded-xl shadow-md sticky top-24">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Autres articles</h2>
                    <div class="space-y-6">
                        <?php foreach ($articlesConnexes as $articleConnexe) : ?>
                            <a href="article.php?ArtId=<?= $articleConnexe['id']; ?>" class="connex-card block bg-gray-50 rounded-lg overflow-hidden flex items-start gap-4 p-4 hover:bg-gray-100">
                                <img src="img/mis_enavant/<?= htmlspecialchars($articleConnexe['photo']); ?>" alt="<?= htmlspecialchars($articleConnexe['titre']); ?>" class="w-24 h-24 object-cover rounded-lg flex-shrink-0">
                                <div class="flex-grow">
                                    <h3 class="text-lg font-bold text-gray-900 leading-snug mb-1">
                                        <?= htmlspecialchars(mb_strlen($articleConnexe['titre']) > 50 ? mb_substr($articleConnexe['titre'], 0, 50) . '...' : $articleConnexe['titre']) ?>
                                    </h3>
                                    <p class="text-sm text-gray-600 line-clamp-3">
                                        <?= htmlspecialchars(mb_strlen($articleConnexe['description']) > 80 ? mb_substr($articleConnexe['description'], 0, 80) . '...' : $articleConnexe['description']) ?>
                                    </p>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </aside>
        </div>
    </main>

    <?php require 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>