<?php
// Evite qu'on change la requête en GET
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../public/homepage.php');
    exit;
}

// Evite la suppression d'un input
if (!isset($_POST['email'], $_POST['password'])) {
    header('Location: ../public/homepage.php?error=1');
    exit;
}

// Evite de donner des trucs vides
if (empty($_POST['email']) || empty($_POST['password'])) {
    header('Location: ../public/homepage.php?error=2');
    exit;
}

// Sanitization de l'email et du mot de passe
$email = htmlspecialchars(trim($_POST['email']));
$mdp = $_POST['password'];

// Validation de l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ../public/connexion.php?error=invalidEmail');
    exit;
}

// Connexion à la base de données
require_once("../utils/connect-db.php");

try {
    // Recherche l'utilisateur dans la base de données par email
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // On récupère les données de l'utilisateur
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Si l'utilisateur n'existe pas
    if (!$user) {
        header('Location: ../public/connexion.php?error=10');
        exit;
    }

    // Vérifie si le mot de passe correspond
    if (!password_verify($mdp, $user["password"])) {
        header('Location: ../public/connexion.php?error=9');
        exit;
    }

    // Démarre la session et stocke les informations de l'utilisateur
    session_start();
    $_SESSION["user"]["email"] = $user["email"];
    $_SESSION["user"]["id"] = $user["id"];
    $_SESSION["user"]["role"] = $user["role"];

    // Redirection vers la page d'accueil après la connexion réussie
    header('Location: ../public/homepage.php');
    exit;

} catch (PDOException $error) {
    // Gestion des erreurs SQL
    echo "Erreur lors de la requête : " . $error->getMessage();
    exit;
}
?>
