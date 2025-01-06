<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../assets/css/output.css">
</head>

<body class="bg-neutral-black">


    <section class="flex justify-center mt-10">
        <img src="../assets/src/image/logo.png" alt="photo du logo" class="mb-4">
    </section>



    <h2 class="text-2xl font-bold text-center my-16  text-neutral-white">Connexion Book Market</h2>

    <div class="text-neutral-white p-16 rounded-sm ">
        <form action="../process/process_connexion.php" method="post" class="flex flex-col gap-4">

            <div>
                <label for="email">E-mail : </label>
                <input  class='rounded-xl' type="email" id="email" name="email" required />
            </div>


            <div>
                <label for="password">Password (8 caractères minimum) :</label>
                <input class='rounded-xl' type="password" id="password" name="password" minlength="8" required />
            </div>


            <input type="submit" value="Se connecter" class="text-white bg-red-500 rounded-2xl p-2 px-6 cursor-pointer" />

        </form>
    </div>
    <a href="../index.php"   class="text-white bg-primary-grey rounded-2xl p-2 px-6 flex justify-center mt-4">Retour</a>



</body>

</html>