<?php

// Vérifie que la requête est bien de type POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../public/inscription_vendeur.php?error=invalidRequest');
    exit;
}

// Vérifie que tous les champs requis sont fournis
if (
    !isset($_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['ville'], 
          $_POST['entreprise'], $_POST['adresse_entreprise'], 
          $_POST['phone'], $_POST['email'], $_POST['password'])
) {
    header('Location: ../public/inscription_vendeur.php?error=missingFields');
    exit;
}

// Récupère et nettoie les données du formulaire
$nom = htmlspecialchars(trim($_POST['nom']));
$prenom = htmlspecialchars(trim($_POST['prenom']));
$adresse = htmlspecialchars(trim($_POST['adresse']));
$ville = htmlspecialchars(trim($_POST['ville']));
$entreprise = htmlspecialchars(trim($_POST['entreprise']));
$adresse_entreprise = htmlspecialchars(trim($_POST['adresse_entreprise']));
$telephone = htmlspecialchars(trim($_POST['phone']));
$email = htmlspecialchars(trim($_POST['email']));
$password = $_POST['password'];

// Valide les formats des champs
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ../public/inscription_vendeur.php?error=invalidEmail');
    exit;
}

if (!preg_match('/^[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}$/', $telephone)) {
    header('Location: ../public/inscription_vendeur.php?error=invalidPhone');
    exit;
}

// Hash le mot de passe pour la sécurité
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Inclut la connexion à la base de données
require_once("../utils/connect-db.php");

try {
    // Vérifie si l'email existe déjà
    $checkQuery = "SELECT id FROM users WHERE email = :email";
    $stmt = $pdo->prepare($checkQuery);
    $stmt->execute([':email' => $email]);
    if ($stmt->fetch()) {
        header('Location: ../public/inscription_vendeur.php?error=emailTaken');
        exit;
    }

    // Récupère l'ID du rôle "vendeur"
    $roleQuery = "SELECT id FROM role WHERE role = 'vendeur'";
    $stmt = $pdo->prepare($roleQuery);
    $stmt->execute();
    $role = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$role) {
        header('Location: ../public/inscription_vendeur.php?error=roleNotFound');
        exit;
    }

    $id_role = $role['id'];

    // Insère le vendeur dans la table `users`
    $insertQuery = "INSERT INTO users (id_role, nom, prenom, adresse, ville, email, password, nom_entreprise, adresse_entreprise, telephone) 
                    VALUES (:id_role, :nom, :prenom, :adresse, :ville, :email, :password, :nom_entreprise, :adresse_entreprise, :telephone)";
    $stmt = $pdo->prepare($insertQuery);
    $stmt->execute([
        ':id_role' => $id_role,
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':adresse' => $adresse,
        ':ville' => $ville,
        ':email' => $email,
        ':password' => $hashedPassword,
        ':nom_entreprise' => $entreprise,
        ':adresse_entreprise' => $adresse_entreprise,
        ':telephone' => $telephone,
    ]);

    // Gère la session de l'utilisateur (le vendeur)
    $stmt = $pdo->prepare('SELECT * FROM users WHERE prenom = :prenom');
    $stmt->execute([':prenom' => $prenom]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        $sql = "INSERT INTO users (prenom) VALUES (:prenom)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['prenom' => $prenom]);
        $_SESSION['user']['id'] = $pdo->lastInsertId();
        $_SESSION['user']['prenom'] = $prenom;
    } else {
        $_SESSION['user'] = $user;
    }

    // Redirige vers la page d'accueil avec un message de succès
    header('Location: ../public/copie_homepage.php?success=1');
    exit;

} catch (PDOException $e) {
    echo "Erreur lors de l'insertion : " . $e->getMessage();
    exit;
}
?>
