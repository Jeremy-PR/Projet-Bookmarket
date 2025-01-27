<?php
require_once("./utils/connect-db.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="./public/assets/css/output.css">
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
                                <img src="./public/assets/src/image/logo.png" alt="Logo">
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
                                <a href="./public/panier.php" class="hover:text-gray-300 "><i class='bx bx-cart' ></i></a>
                            </li>
                            <li class="relative group">
                                <a href="./public/connexion.php" class="hover:text-gray-300"><i class='bx bx-user-circle' ></i></a>
                            </li>
                            <li class="relative group">
                                <a href="./public/inscription.php" class="hover:text-gray-300"><i class='bx bxs-registered' ></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="bg-neutral-black">
        <div class="flex justify-between text-neutral-white mx-auto px-8">
            <p>Roman</p>
            <p>Thriller</p>
            <p>Histoire</p>
            <p>Fantastique</p>
            <p>Enfants</p>
        </div>

        <h2 class="text-primary-red text-center pt-8 pb-8 text-3xl underline">
            Top 3 à la vente
        </h2>

        <section class="mx-auto px-4">
            <article class="mb-6">
                <div class="bg-primary-blue_bayoux flex flex-col sm:flex-row justify-between p-4 rounded-lg">
                    <img src="./public/assets/src/image/couv_1984.png" alt="photo de couverture de 1984" class="w-full sm:w-1/3 lg:w-1/4 mb-4 sm:mb-0">
                    <div class="sm:ml-4">
                        <h3 class="text-neutral-white pb-2 text-lg">1984 : Proposé par "La Lecture"</h3>
                        <p class="text-neutral-white text-sm">
                            1984 d'Orwell raconte l'histoire de Winston Smith, un homme vivant sous un régime totalitaire où la liberté de pensée est réprimée par un gouvernement omniprésent dirigé par Big Brother.
                        </p>
                    </div>
                </div>
                <div class="flex flex-col items-center pt-2">
                    <a class="bg-green-600 text-neutral-white rounded-2xl py-2 px-4 mb-2" href="#">Ajouter au panier</a>
                    <p class="text-primary-red text-lg">14,99€</p>
                </div>
            </article>

            <article class="mb-6">
                <div class="bg-primary-violet flex flex-col sm:flex-row justify-between p-4 rounded-lg">
                    <img src="./public/assets/src/image/couv_martineden.png" alt="photo de couverture de Martin Eden" class="w-full sm:w-1/3 lg:w-1/4 mb-4 sm:mb-0">
                    <div class="sm:ml-4">
                        <h3 class="text-neutral-white pb-2 text-lg">Martin Eden : Proposé par "Ernesto G"</h3>
                        <p class="text-neutral-white text-sm">
                            Martin Eden de Jack London suit l'ascension d'un jeune marin autodidacte qui cherche à devenir écrivain et à s'intégrer dans la société bourgeoise, tout en luttant avec ses idéaux et les désillusions qu'il rencontre.
                        </p>
                    </div>
                </div>
                <div class="flex flex-col items-center pt-2">
                    <a class="bg-green-600 text-neutral-white rounded-2xl py-2 px-4 mb-2" href="#">Ajouter au panier</a>
                    <p class="text-primary-red text-lg">16,99€</p>
                </div>
            </article>

            <article class="mb-6">
                <div class="bg-primary-eggplant flex flex-col sm:flex-row justify-between p-4 rounded-lg">
                    <img src="./public/assets/src/image/couv_laferme.png" alt="photo de couverture dela ferme des animaux" class="w-full sm:w-1/3 lg:w-1/4 mb-4 sm:mb-0">
                    <div class="sm:ml-4">
                        <h3 class="text-neutral-white pb-2 text-lg">La ferme des animaux : Proposé par "Maria D"</h3>
                        <p class="text-neutral-white text-sm">
                        La Ferme des animaux de George Orwell raconte l'histoire d'animaux révoltés contre leurs maîtres humains pour instaurer une société égalitaire, mais ils finissent par être opprimés sous un nouveau régime aussi tyrannique que l'ancien.                        </p>
                    </div>
                </div>
                <div class="flex flex-col items-center pt-2">
                    <a class="bg-green-600 text-neutral-white rounded-2xl py-2 px-4 mb-2" href="#">Ajouter au panier</a>
                    <p class="text-primary-red text-lg">17,99€</p>
                </div>
            </article>
        </section>
    </main>

    <footer class="bg-primary-grey"></footer>
</body>

</html>