<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../public/inscription.php?error=invalidRequest');
    exit;
}

if (
    !isset($_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['ville'], 
          $_POST['phone'], $_POST['email'], $_POST['password'])
) {
    header('Location: ../public/inscription.php?error=removedInput');
    exit;
}

if (
    empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['adresse']) ||
    empty($_POST['ville']) || empty($_POST['phone']) || empty($_POST['email']) || 
    empty($_POST['password'])
) {
    header('Location: ../public/inscription.php?error=emptyInputs');
    exit;
}

$email = htmlspecialchars(trim($_POST['email']));
$password = $_POST['password'];
$nom = htmlspecialchars(trim($_POST['nom']));
$prenom = htmlspecialchars(trim($_POST['prenom']));
$adresse = htmlspecialchars(trim($_POST['adresse']));
$ville = htmlspecialchars(trim($_POST['ville']));
$telephone = htmlspecialchars(trim($_POST['phone']));

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ../public/inscription.php?error=incorrectMail');
    exit;
}

require_once("../utils/connect-db.php");

try {
    $checkSql = "SELECT email FROM `users` WHERE `email` = :email";
    $stmt = $pdo->prepare($checkSql);
    $stmt->execute([':email' => $email]);
    if ($stmt->rowCount() > 0) {
        header('Location: ../public/inscription.php?error=takenEmail');
        exit;
    }

    $sql = "INSERT INTO `users` (`email`, `password`, `nom`, `prenom`, `adresse`, `ville`, `telephone`) 
            VALUES (:email, :password, :nom, :prenom, :adresse, :ville, :telephone)";
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':email' => $email,
        ':password' => $hashedPassword,
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':adresse' => $adresse,
        ':ville' => $ville,
        ':telephone' => $telephone
    ]);

    header('Location: ../public/homepage.php');
    exit;
} catch (PDOException $error) {
    error_log("Erreur SQL : " . $error->getMessage());
    header('Location: ../public/inscription.php?error=sqlError');
    exit;
}
?>