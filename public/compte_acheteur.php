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
    // Si l'utilisateur n'est pas connecté, redirige vers la page d'inscription
    header("Location: ../public/inscription_acheteur.php");
    exit;
}
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
<main class="bg-neutral-black text-neutral-white min-h-screen py-8">
    <h1 class="text-4xl font-bold text-center text-primary-red py-8">
        Bienvenue <?= htmlspecialchars(($user->getPrenom())) ?>
    </h1>
    <h2 class="text-primary-red text-center pt-8 pb-8 text-3xl underline">
        Gérer mon compte
    </h2>
    <section class="flex flex-col items-center space-y-8">
        <h3 class="text-neutral-white pb-2 text-lg font-semibold">
            Informations personnelles
        </h3>
        <div class="overflow-x-auto w-full max-w-4xl">
            <table class="table-auto w-full bg-gray-800 text-neutral-white rounded-lg shadow-lg">
                <thead class="bg-primary-red text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Prénom</th>
                        <th class="px-4 py-2 text-left">Nom</th>
                        <th class="px-4 py-2 text-left">Adresse</th>
                        <th class="px-4 py-2 text-left">Ville</th>
                        <th class="px-4 py-2 text-left">Téléphone</th>
                        <th class="px-4 py-2 text-left">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-gray-700 border-b border-gray-600 hover:bg-gray-600">
                        <td class="px-4 py-2"><?= htmlspecialchars(($user->getPrenom())) ?></td>
                        <td class="px-4 py-2"><?= htmlspecialchars(($user->getNom())) ?></td>
                        <td class="px-4 py-2"><?= htmlspecialchars(($user->getAdresse())) ?></td>
                        <td class="px-4 py-2"><?= htmlspecialchars(($user->getVille())) ?></td>
                        <td class="px-4 py-2"><?= htmlspecialchars(($user->getTelephone())) ?></td>
                        <td class="px-4 py-2"><?= htmlspecialchars(($user->getEmail())) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="./modif_acheteur.php?user=<?=(($user->getId())) ?>" 
           class="px-6 py-2 bg-primary-red text-white font-semibold rounded-md shadow-md hover:bg-red-600 transition">
           Modifier
        </a>
    </section>
    <a href="../homepage.php" class="block text-center mt-4 text-neutral-white hover:underline">Retour</a>
</main>
</body>
</html>
