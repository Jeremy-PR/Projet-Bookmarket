<?php
require_once '../utils/autoloader.php';
session_start();


if (!isset($_SESSION['user'])) {
    
    header('Location: connexion.php');
    exit;
}


$user = $_SESSION['user'];


if ($user->getRole()->getRole() !== 'vendeur') {

    header('Location: connexion.php');
    exit;
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter un Livre</title>
  <link rel="stylesheet" href="./assets/css/output.css">
</head>
<body class="bg-neutral-black flex items-center justify-center h-screen">
  <div class="bg-primary-grey p-8 rounded-2xl shadow-md w-96">
    <h1 class="text-2xl font-bold mb-6 text-neutral-white text-center">Ajouter un Livre</h1>

    <form action="../process/process_addbook.php" method="POST" enctype="multipart/form-data" class="space-y-4">
      
      <!-- Titre -->
      <input type="text" name="titre" placeholder="Titre du Livre" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-red" required>

      <!-- Auteur -->
      <input type="text" name="auteur" placeholder="Auteur" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-red" required>

      <!-- Description -->
      <textarea name="description" placeholder="Description du livre" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-red" required></textarea>

      <!-- Prix -->
      <input type="number" name="prix" placeholder="Prix (€)" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-red" required>

      <!-- Genre -->
      <select name="genre" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-red" required>
        <option value="">Sélectionner un Genre</option>
        <option value="1">Roman</option>
        <option value="2">Science-fiction</option>
        <option value="3">Historique</option>
      </select>

      <!-- Image -->
      <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-red">

      <!-- Bouton Soumettre -->
      <input type="submit" value="Ajouter le Livre" class="w-full bg-primary-red text-white py-2 rounded-lg hover:bg-primary-red transition duration-200 cursor-pointer">

    </form>

    <a href="book-details.php" class="block text-center mt-4 text-neutral-white hover:underline">Retour à la page d'accueil</a>
  </div>
</body>
</html>
