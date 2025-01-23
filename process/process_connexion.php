<?php

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


require_once("../utils/connect-db.php");

try {

    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

 
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
   
        header('Location: ../public/connexion.php?error=invalidEmail');
        exit;
    }

  
    if (!password_verify($mdp, $user["password"])) {
 
        header('Location: ../public/connexion.php?error=invalidPassword');
        exit;
    }

    session_start();

    $_SESSION["user"]["id"] = $user["id"];
    $_SESSION["user"]["email"] = $user["email"];
    $_SESSION["user"]["nom"] = $user["nom"];
    $_SESSION["user"]["prenom"] = $user["prenom"];
    $_SESSION["user"]["role"] = $user["id_role"];

    header('Location: ../public/copie_homepage.php');  
    exit;

} catch (PDOException $error) {

    echo "Erreur lors de la requête : " . $error->getMessage();
    exit;
}
?>
