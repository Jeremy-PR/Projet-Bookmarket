<?php
// évite qu'on change la requete en GET
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /connexion.php');
    exit;
}

// Evite la suppression d'un input
if (
    !isset($_POST['email'], $_POST['password'])
) {
    header('Location: /connexion.php?error=1');
    exit;
}

// Evite de donner les trucs vides
if (
    empty($_POST['email']) ||
    empty($_POST['password'])
) {
    header('Location: /connexion.php?error=2');
    exit;
}

// Sanitization de seulement

$email = htmlspecialchars(trim($_POST['email']));
$mdp = $_POST['password'];

// connecter à la base de données
require_once("../utils/connect-db.php");

try {
    // Requête pour vérifier si l'email existe dans la base de données
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // On récupère les données de l'utilisateur
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Regarde si l'utilisateur existe déjà, si non, retourne erreur 10
    if (!$user) {
        header('Location: /connexion.php?error=10');
        exit;
    }

    // vérifie si le mot de passe est le même que le mot de passe hashé
    if (!password_verify($mdp, $user["password"])) {
        header('Location: /connexion.php?error=9');
        exit;
    }

    // Garde les informations dans une session
    session_start();

    $_SESSION["user"]["id"] = $user["id"];
    $_SESSION["user"]["email"] = $user["email"];
    $_SESSION["user"]["nom"] = $user["nom"];
    $_SESSION["user"]["prenom"] = $user["prenom"];
    $_SESSION["user"]["role"] = $user["id_role"];

    // Redirection vers la page d'accueil après la connexion réussie
    header('Location: ./homepage.php');  // Redirection vers la racine
    exit;
} catch (PDOException $error) {
    echo "Erreur lors de la requête : " . $error->getMessage();
    exit;
}
?>
