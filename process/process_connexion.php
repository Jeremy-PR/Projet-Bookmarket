<?php
require_once("../utils/autoloader.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../public/connexion.php?error=invalidRequest');
    exit;
}

if (!isset($_POST['email'], $_POST['password'])) {
    header('Location: ../public/connexion.php?error=missingFields');
    exit;
}

if (empty($_POST['email']) || empty($_POST['password'])) {
    header('Location: ../public/connexion.php?error=emptyFields');
    exit;
}

$email = htmlspecialchars(trim($_POST['email']));
$mdp = $_POST['password']; 



try {

    $userRepository = new UserRepository($pdo);

  
    $user = $userRepository->connectUser($email, $mdp);


    if ($user === null) {
        header('Location: ../public/connexion.php?error=invalidCredentials');
        exit;
    }

 

 
    $_SESSION['user'] = $user;


    header('Location: ../public/copie_homepage.php');
    exit;

} catch (PDOException $error) {
    echo "Erreur lors de la requête : " . $error->getMessage();
    exit;
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
    exit;
}
