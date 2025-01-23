<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="./assets/css/output.css">

    </head>
<body class="bg-neutral-black flex items-center justify-center h-screen">
    <div class="bg-primary-grey p-8 rounded-2xl shadow-md w-96">
        <h2 class="text-2xl font-bold mb-6 text-neutral-white">Connexion</h2>
        <form action="../process/process_connexion.php" method="POST">
            <div class="mb-4">
                <label for="email" class="block text-neutral-white">Email</label>
                <input type="email" id="email" name="email" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-red">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-neutral-white">Mot de passe</label>
                <input type="password" id="password" name="password" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-red">
            </div>
            <!-- Remplacer le <a> par un <button> de type submit -->
            <button type="submit" class="block w-full text-center bg-primary-red text-white py-2 rounded-lg hover:bg-primary-red transition duration-200">Se connecter</button>
        </form>
        <a href="../homepage.php" class="block text-center mt-4 text-neutral-white hover:underline">Retour à l'accueil</a>
    </div>
</body>
</html>
