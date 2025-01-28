<?php
require_once '../utils/autoloader.php';

session_start();

if (!isset($_GET['bookId']) || !is_numeric($_GET['bookId'])) {
    echo "Aucun ID de livre spécifié.";
    exit;
}

$bookId = intval($_GET['bookId']);
$bookRepository = new BookRepository();
$genreRepository = new GenreRepository(); 
$etatRepository = new EtatRepository(); 
$imageRepository = new ImageRepository();

// Charger le livre depuis la base de données
$book = $bookRepository->getBookById($bookId);

if (!$book) {
    echo "Livre introuvable.";
    exit;
}

// Récupérer le genre du livre
$genre = $genreRepository->getGenreById($book->getIdGenre());
$genreName = $genre ? $genre->getNom() : 'Inconnu';

// Récupérer l'état du livre
$etat = $etatRepository->getEtatById($book->getIdEtat());
$etatName = $etat ? $etat->getIntitulé() : 'Inconnu'; 


$prix = $book->getPrix();
$imagePath = $imageRepository->getImageById($book->getIdImage());
$vendeur = $book->getIdVendeur();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Livre</title>
    <link rel="stylesheet" href="./assets/css/output.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body class="bg-neutral-black flex items-center justify-center min-h-screen">
    <header>
        <nav class="bg-primary-grey text-white p-4">
            <div class="container mx-auto">
                <div class="flex justify-between items-center">
                    <!-- Left Navbar -->
                    <div class="flex space-x-6">
                        <ul class="flex space-x-6">
                            <li class="relative group">
                                <img src="./assets/src/image/logo.png" alt="Logo">
                            </li>
                        </ul>
                    </div>
                    <!-- Search Form Centered -->
                    <div class="flex-grow max-w-sm mx-6">
                        <form class="relative">
                            <input class="bg-gray-700 text-white px-4 py-2 rounded-full w-full focus:outline-none focus:ring-2 focus:ring-primary-red"
                                type="search" placeholder="Search" aria-label="Search">
                        </form>
                    </div>
                    <!-- Right Navbar -->
                    <div class="flex space-x-6">
                        <ul class="flex space-x-6">
                            <li class="relative group">
                                <a href="../public/panier.php" class="hover:text-gray-300 "><i class='bx bx-cart'></i></a>
                            </li>
                            <li class="relative group">
                                <a href="../public/compte_acheteur.php" class="hover:text-gray-300"><i class='bx bxs-user-account'></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="bg-primary-grey p-8 rounded-2xl shadow-lg w-full max-w-3xl">
        <h1 class="text-3xl font-bold mb-6 text-neutral-white text-center">Détails du Livre</h1>

        <div class="space-y-4 text-neutral-white">
            <!-- Titre -->
            <div>
                <h2 class="text-xl font-semibold">Titre :</h2>
                <p class="text-lg bg-neutral-dark p-3 rounded-lg shadow-inner"><?= htmlspecialchars($book->getTitre()) ?></p>
            </div>

            <!-- Auteur -->
            <div>
                <h2 class="text-xl font-semibold">Auteur :</h2>
                <p class="text-lg bg-neutral-dark p-3 rounded-lg shadow-inner"><?= htmlspecialchars($book->getAuteur()) ?></p>
            </div>

            <!-- Description -->
            <div>
                <h2 class="text-xl font-semibold">Description :</h2>
                <p class="text-lg bg-neutral-dark p-3 rounded-lg shadow-inner"><?= htmlspecialchars($book->getDescription()) ?></p>
            </div>

            <!-- Genre -->
            <div>
                <h2 class="text-xl font-semibold">Genre :</h2>
                <p class="text-lg bg-neutral-dark p-3 rounded-lg shadow-inner"><?= htmlspecialchars($genreName) ?></p>
            </div>

            <!-- Prix -->
            <div>
                <h2 class="text-xl font-semibold">Prix :</h2>
                <p class="text-lg bg-neutral-dark p-3 rounded-lg shadow-inner"><?= htmlspecialchars($prix) ?> €</p>
            </div>

            <!-- Image -->
            <div>
                <h2 class="text-xl font-semibold">Image :</h2>
                <div class="bg-neutral-dark p-3 rounded-lg shadow-inner">
                    <?php if ($imagePath): ?>
                        <img src="<?= htmlspecialchars($imagePath->getImagePath()) ?>" alt="Image du livre" class="rounded-lg max-w-full">
                    <?php else: ?>
                        <p class="italic text-neutral-light">Aucune image fournie.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Vendeur -->
            <div>
                <h2 class="text-xl font-semibold">Vendeur :</h2>
                <p class="text-lg bg-neutral-dark p-3 rounded-lg shadow-inner"><?= htmlspecialchars($vendeur) ?></p>
            </div>
        </div>

        <!-- Bouton retour -->
        <div class="text-center mt-6">
            <a href="./form-addbook.php" class="text-neutral-white underline hover:text-primary-red transition">
                Retour au formulaire
            </a>
            <a href="./copie_homepage.php" class="text-neutral-white underline hover:text-primary-red transition">Retour à l'accueil</a>
        </div>
    </div>
</body>

</html>
