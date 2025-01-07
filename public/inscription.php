<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription - Choix</title>
  <link rel="stylesheet" href="../assets/css/output.css">
 <script src="../assets/JS/choix.js"></script>



 </head>
<body class="min-h-screen flex flex-col items-center justify-center bg-neutral-black">
  <div class="p-6 rounded-lg shadow-md space-y-4">
    <h1 class="text-2xl text-neutral-white font-bold text-center">Choisissez votre rôle</h1>
    <div class="flex justify-around space-x-4">
      <a 
        href="./inscription_acheteur.php" 
        class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 text-center">
        Devenir Acheteur
      </a>
      <a 
        href="./inscription_vendeur.php" 
        class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-green-600 text-center">
        Devenir Vendeur
      </a>
    </div>
  </div>
  <a 
    href="../homepage.php" 
    class="text-white bg-primary-grey rounded-2xl p-2 px-6 flex justify-center mt-4">
    Retour
  </a>
</body>
</html>
