<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription - Acheteur</title>
  <link rel="stylesheet" href="../assets/css/output.css">
  <script src="../assets/JS/choix.js"></script>
</head>
<body class="bg-neutral-black flex items-center justify-center h-screen">
  <div class="bg-primary-grey p-8 rounded-2xl shadow-md w-96">
    <h1 class="text-2xl font-bold mb-6 text-neutral-white text-center">Inscription - Acheteur</h1>
    <form action="../process/process_inscription_acheteur.php" method="POST" class="space-y-4">
      <input type="text" name="nom" placeholder="Nom" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-red">
      <input type="text" name="prenom" placeholder="Prénom" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-red">
      <input type="text" name="adresse" placeholder="Adresse" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-red">
      <input type="text" name="ville" placeholder="Ville" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-red">
      <input 
        type="tel" 
        name="phone" 
        placeholder="(ex : 01-23-45-67-89)" 
        pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" 
        required 
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-red"
      >
      <input type="email" name="email" placeholder="Email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-red">
      <input type="password" name="password" placeholder="Mot de passe" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-red">
      <input type="submit" value="S'inscrire" class="w-full bg-primary-red text-white py-2 rounded-lg hover:bg-primary-red transition duration-200 cursor-pointer">
    </form>
    <a href="../homepage.php" class="block text-center mt-4 text-neutral-white hover:underline">Retour</a>
  </div>
</body>
</html>