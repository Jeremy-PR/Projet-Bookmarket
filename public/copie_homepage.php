<?php
require_once '../utils/autoloader.php';

session_start(); // Démarre la session

// Vérifie si l'utilisateur est connecté via la session
if (isset($_SESSION['user'])) {
    // Récupère le prénom de l'utilisateur depuis la session
    /**
     * @var User $user
     */
    $user = $_SESSION['user'];
} else {

    header("Location: ../public/inscription_acheteur.php");
    exit;
}

$bookRepository = new BookRepository();
$books = $bookRepository->getAllBooks(); // On récupère tous les livre
$imageRepository = new ImageRepository();



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="./assets/css/output.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body class="bg-neutral-black text-neutral-white">
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



    <main class="bg-neutral-black">
    <h1 class="text-4xl font-bold text-center text-primary-red py-8">
            Bienvenue <?= htmlspecialchars($user->getPrenom()) ?>
        </h1>
        <div class="flex justify-between space-x-1 text-neutral-white mx-auto px-8 text-xl pt-2">
            <p>Roman</p>
            <p>Thriller</p>
            <p>Histoire</p>
            <p>Fantastique</p>
            <p>Enfants</p>
        </div>


        <h2 class="text-primary-red text-center pt-8 pb-8 text-3xl underline font-bold">
            Top 3 à la vente
        </h2>

        <section class="mx-auto px-4">
    <div class="flex flex-col sm:flex-row sm:space-x-6 sm:space-y-0 space-y-6">
        <!-- Article 1 -->
        <article class="flex flex-col bg-primary-blue_bayoux p-4 rounded-lg">
        <img src="./assets/src/image/couv_1984.png" alt="photo de couverture de 1984" class="w-full sm:w-1/3 lg:w-1/4 mb-4 sm:mb-0">
            <div class="sm:ml-4">
                <h3 class="text-neutral-white pb-2 text-lg">1984 : Proposé par "La Lecture"</h3>
                <p class="text-neutral-white text-sm">
                    1984 d'Orwell raconte l'histoire de Winston Smith, un homme vivant sous un régime totalitaire où la liberté de pensée est réprimée par un gouvernement omniprésent dirigé par Big Brother.
                </p>
            </div>
            <div class="flex flex-col items-center pt-2">
                <a class="bg-green-600 text-neutral-white rounded-2xl py-2 px-4 mb-2" href="#">Ajouter au panier</a>
                <p class="text-primary-red text-lg">14,99€</p>
            </div>
        </article>

        <!-- Article 2 -->
        <article class="flex flex-col bg-primary-violet p-4 rounded-lg">
        <img src="./assets/src/image/couv_martineden.png" alt="photo de couverture de Martin Eden" class="w-full sm:w-1/3 lg:w-1/4 mb-4 sm:mb-0">
            <div class="sm:ml-4">
                <h3 class="text-neutral-white pb-2 text-lg">Martin Eden : Proposé par "Ernesto G"</h3>
                <p class="text-neutral-white text-sm">
                    Martin Eden de Jack London suit l'ascension d'un jeune marin autodidacte qui cherche à devenir écrivain et à s'intégrer dans la société bourgeoise, tout en luttant avec ses idéaux et les désillusions qu'il rencontre.
                </p>
            </div>
            <div class="flex flex-col items-center pt-2">
                <a class="bg-green-600 text-neutral-white rounded-2xl py-2 px-4 mb-2" href="#">Ajouter au panier</a>
                <p class="text-primary-red text-lg">16,99€</p>
            </div>
        </article>

        <!-- Article 3 -->
        <article class="flex flex-col bg-primary-eggplant p-4 rounded-lg">
        <img src="./assets/src/image/couv_laferme.png" alt="photo de couverture de la ferme des animaux" class="w-full sm:w-1/3 lg:w-1/4 mb-4 sm:mb-0">
            <div class="sm:ml-4">
                <h3 class="text-neutral-white pb-2 text-lg">La ferme des animaux : Proposé par "Maria D"</h3>
                <p class="text-neutral-white text-sm">
                    La Ferme des animaux de George Orwell raconte l'histoire d'animaux révoltés contre leurs maîtres humains pour instaurer une société égalitaire, mais ils finissent par être opprimés sous un nouveau régime aussi tyrannique que l'ancien.
                </p>
            </div>
            <div class="flex flex-col items-center pt-2">
                <a class="bg-green-600 text-neutral-white rounded-2xl py-2 px-4 mb-2" href="#">Ajouter au panier</a>
                <p class="text-primary-red text-lg">17,99€</p>
            </div>
        </article>
    </div>
</section>

<h2 class="text-neutral-white text-center pt-8 pb-8 text-3xl underline font-bold">Notre Sélection</h2>

<section class="mx-auto px-4 mt-16 max-w-screen-xl">
    <h2 class="text-3xl font-bold mb-8 text-neutral-white text-center">Sélection de Livres</h2>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <?php if (!empty($books)): ?>
            <?php foreach ($books as $book):
               

                $imagePath = $imageRepository->getImageById($book->getIdImage()); ?>
                <div class="bg-neutral-dark rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
                <img src="<?= htmlspecialchars($imagePath->getImagePath()) ?>" alt="Image du livre" class="rounded-lg max-w-full">
                       
                    <div class="p-4">
                        <p class="text-xl font-semibold text-neutral-white"><?= htmlspecialchars($book->getTitre()) ?></p>
                        <p class="text-lg text-neutral-light"><?= htmlspecialchars($book->getAuteur()) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-neutral-white text-center col-span-full">Aucun livre disponible.</p>
        <?php endif; ?>
    </div>
</section>

<section class ="flex justify-center">
<a id="deconnexion" href="../process/process-clean.php" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-300">
    Déconnexion
</a>

<a href="../public/form-addbook.php" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300 ml-4">
    Ajouter un livre
</a>
</section>
    </main>
    
    <footer class="bg-primary-grey"></footer>
</body>

</html>