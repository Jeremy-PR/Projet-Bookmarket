<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription - Acheteur</title>
      <link rel="stylesheet" href="../assets/css/output.css">
  
  <script src="../assets/JS/choix.js"></script>
</head>


<body class="min-h-screen flex items-center justify-center bg-neutral-black">
  <form action="../process/process_inscription_acheteur.php" method="POST" class="bg-neutral-black p-6 rounded-lg shadow-md space-y-4">
    <h1 class="text-2xl text-neutral-white font-bold text-center">Inscription - Acheteur</h1>
    <input type="text" name="nom" placeholder="Nom" class="border border-gray-300 rounded w-full p-2">
    <input type="text" name="prenom" placeholder="Prénom" class="border border-gray-300 rounded w-full p-2">
    <input type="text" name="Adresse" placeholder="adresse" class="border border-gray-300 rounded w-full p-2">
    <input type="text" name="Ville" placeholder="ville" class="border border-gray-300 rounded w-full p-2">
    <input 
        type="tel" 
        name="phone" 
        placeholder="(ex : 01-23-45-67-89)" 
        pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" 
        required 
        class="border border-gray-300 rounded w-full p-2"
    >
    <input type="email" name="email" placeholder="Email" class="border border-gray-300 rounded w-full p-2">
    <input type="password" name="password" placeholder="Mot de passe" class="border border-gray-300 rounded w-full p-2">
    <input  type="submit" value="S'inscrire" class="bg-black text-white p-4 cursor-pointer rounded-xl"/>
     
 </form>

 <a href="./inscription.php" class ="text-white bg-primary-grey rounded-2xl p-2 px-6 flex justify-center">Retour</a>
</body>
</html>