<?php
session_start();


if (!isset($_SESSION['user'])) {
    header('Location: ../inscription_acheteur.php'); // Redirige vers la page de connexion si non connecté
    exit;
}

// Récupérer l'ID utilisateur depuis la session
$id = $_SESSION['user']['id'];

// Vérification des champs requis
if (
    !isset($_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['ville'], $_POST['telephone'], $_POST['email']) ||
    empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['adresse']) ||
    empty($_POST['ville']) || empty($_POST['telephone']) || empty($_POST['email'])

) {
    header('Location: ../homepage.php?error=missingFields');
    exit;
}

// Nettoyage des données utilisateur
$nom = htmlspecialchars(trim($_POST['nom']));
$prenom = htmlspecialchars(trim($_POST['prenom']));
$adresse = htmlspecialchars(trim($_POST['adresse']));
$ville = htmlspecialchars(trim($_POST['ville']));
$telephone = htmlspecialchars(trim($_POST['telephone']));
$email = htmlspecialchars(trim($_POST['email']));

// Connexion à la base de données
require_once '../utils/connect-db.php';

// Mise à jour des informations utilisateur
$sql = "UPDATE users 
        SET nom = :nom, prenom = :prenom, adresse = :adresse, ville = :ville, telephone = :telephone, email = :email 
        WHERE id = :id";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $id, // ID récupéré depuis la session
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':adresse' => $adresse,
        ':ville' => $ville,
        ':telephone' => $telephone,
        ':email' => $email,
    ]);
} catch (PDOException $error) {
    echo "Erreur lors de la requête : " . $error->getMessage();
    exit;
}

// Redirection après modification
header('Location: ../public/compte_acheteur.php?success=update');
exit;
