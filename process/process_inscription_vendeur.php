<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../public/inscription_vendeur.php?error=invalidRequest');
    exit;
}

if (
    !isset($_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['ville'],
           $_POST['entreprise'], $_POST['adresse_entreprise'], $_POST['email'], $_POST['phone'], $_POST['password'])
) {
    header('Location: ../public/inscription_vendeur.php?error=removedInput');
    exit;
}

if (
    empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['adresse']) ||
    empty($_POST['ville']) || empty($_POST['entreprise']) || empty($_POST['adresse_entreprise']) ||
    empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['password'])
) {
    header('Location: ../public/inscription_vendeur.php?error=emptyInputs');
    exit;
}

// Sanitize inputs
$nom = htmlspecialchars(trim($_POST['nom']));
$prenom = htmlspecialchars(trim($_POST['prenom']));
$adresse = htmlspecialchars(trim($_POST['adresse']));
$ville = htmlspecialchars(trim($_POST['ville']));
$entreprise = htmlspecialchars(trim($_POST['entreprise']));
$adresse_entreprise = htmlspecialchars(trim($_POST['adresse_entreprise']));
$email = htmlspecialchars(trim($_POST['email']));
$phone = htmlspecialchars(trim($_POST['phone']));
$password = $_POST['password'];

// Valider l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ../public/inscription_vendeur.php?error=incorrectMail');
    exit;
}

// Connexion à la base de données
require_once("../utils/connect-db.php");

try {
    // Vérifier si l'email existe déjà
    $checkSql = "SELECT email FROM `users` WHERE `email` = :email";
    $stmt = $pdo->prepare($checkSql);
    $stmt->execute([':email' => $email]);

    if ($stmt->rowCount() > 0) {
        header('Location: ../public/inscription_vendeur.php?error=takenEmail');
        exit;
    }

    // Insertion des données dans la table `users`
    $sql = "INSERT INTO `users` (`email`, `password`, `nom`, `prenom`, `adresse`, `ville`, `entreprise`, `adresse_entreprise`, `telephone`, `role`) 
            VALUES (:email, :password, :nom, :prenom, :adresse, :ville, :entreprise, :adresse_entreprise, :telephone, 'vendeur')";
    
    // Hasher le mot de passe
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':email' => $email,
        ':password' => $hashedPassword,
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':adresse' => $adresse,
        ':ville' => $ville,
        ':entreprise' => $entreprise,
        ':adresse_entreprise' => $adresse_entreprise,
        ':telephone' => $phone
    ]);

    // Rediriger vers la page d'accueil ou afficher un message de succès
    header('Location: ../homepage.php');
    exit;

} catch (PDOException $error) {
    // Gestion des erreurs SQL
    error_log("Erreur SQL : " . $error->getMessage());
    header('Location: ../public/inscription_vendeur.php?error=sqlError');
    exit;
}
?>
