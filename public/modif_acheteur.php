<?php
session_start(); // Démarre la session


// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    // Si l'utilisateur n'est pas connecté, redirige vers la page de connexion
    header('Location: connexion.php'); // Redirige vers la page de connexion
    exit;
}

// Récupère l'ID de l'utilisateur depuis la session
$userId = $_SESSION['user']['id'];

// Connexion à la base de données
require_once '../utils/connect-db.php';

// Prépare la requête pour récupérer les informations de l'utilisateur
$sql = "SELECT * FROM users WHERE id = :id";

try {
    // Exécute la requête avec l'ID de l'utilisateur
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $userId
    ]);

    // Récupère les informations de l'utilisateur
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si l'utilisateur est trouvé, stockez ses informations dans des variables
    if ($user) {
        $prenom = htmlspecialchars($user['prenom']);
    } else {
        // Si l'utilisateur n'est pas trouvé, redirige vers une page d'erreur ou autre action
        echo "Utilisateur non trouvé.";
        exit;
    }
} catch (PDOException $error) {
    echo "Erreur lors de la requête : " . $error->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../assets/css/output.css">
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
                                <img src="../assets/src/image/logo.png" alt="Logo">
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
    <div class="bg-neutral-black p-8 rounded-2xl shadow-md w-96   ">
        <h1 class="text-2xl font-bold mb-6 text-neutral-white text-center">Inscription - Acheteur</h1>
        <form action="../process/process_modif_acheteur.php" method="POST" class="space-y-4 ">
            <input type="text" name="nom" value="<?= $_SESSION['user']['nom'] ?>" class=" text-neutral-black w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-red" required>
            <input type="text" name="prenom" value="<?= $_SESSION['user']['prenom'] ?>" class=" text-neutral-black w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-red" required>
            <input type="text" name="adresse" value="<?= $_SESSION['user']['adresse'] ?>" class="  text-neutral-black w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-red" required>
            <input type="text" name="ville" value="<?= $_SESSION['user']['ville'] ?>" class=" text-neutral-black w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-red" required>
            <input
                type="tel"
                name="telephone"
               value="<?= $_SESSION['user']['telephone'] ?>"
                pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}"
                required
                class=" w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 text-neutral-black focus:ring-primary-red">
            <input type="email" name="email" value="<?= $_SESSION['user']['email'] ?>" class=" text-neutral-black w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-red" required>

            <input type="submit" value="Modifier" class="w-full bg-primary-red text-white py-2 rounded-lg hover:bg-primary-red transition duration-200 cursor-pointer">
        </form>
        <a href="../public/copie_homepage.php" class="block text-center mt-4 text-neutral-white hover:underline">Retour</a>
    </div>
</body>

</html>