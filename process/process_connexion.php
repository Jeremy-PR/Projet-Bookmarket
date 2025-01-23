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
    // Crée une instance de UserRepository pour accéder à la méthode connectUser
    $userRepository = new UserRepository($pdo);

    // Appel de la méthode connectUser pour obtenir un objet User
    $user = $userRepository->connectUser($email, $mdp);

    // Si l'utilisateur est null, cela signifie que la connexion a échoué
    if ($user === null) {
        header('Location: ../public/connexion.php?error=invalidCredentials');
        exit;
    }

 

    // Stocke l'objet User dans la session
    $_SESSION['user'] = $user;

    // Redirection vers la page d'accueil après la connexion réussie
    header('Location: ../public/copie_homepage.php');
    exit;

} catch (PDOException $error) {
    echo "Erreur lors de la requête : " . $error->getMessage();
    exit;
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
    exit;
}
