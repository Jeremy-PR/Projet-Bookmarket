<?php
require_once("../utils/autoloader.php");

session_start(); // Démarre la session

// Vérifie que la requête est bien de type POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../public/inscription_acheteur.php?error=invalidRequest');
    exit;
}

// Vérifie que tous les champs requis sont fournis
if (
    !isset(
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['adresse'],
        $_POST['ville'],
        $_POST['phone'],
        $_POST['email'],
        $_POST['password']
    )
) {
    header('Location: ../public/inscription_acheteur.php?error=missingFields');
    exit;
}

// Récupère et nettoie les données du formulaire
$nom = htmlspecialchars(trim($_POST['nom']));
$prenom = htmlspecialchars(trim($_POST['prenom']));
$adresse = htmlspecialchars(trim($_POST['adresse']));
$ville = htmlspecialchars(trim($_POST['ville']));
$telephone = htmlspecialchars(trim($_POST['phone']));
$email = htmlspecialchars(trim($_POST['email']));
$password = $_POST['password'];

// Valide les formats des champs
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ../public/inscription_acheteur.php?error=invalidEmail');
    exit;
}

if (!preg_match('/^[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}$/', $telephone)) {
    header('Location: ../public/inscription_acheteur.php?error=invalidPhone');
    exit;
}


$hashedPassword = password_hash($password, PASSWORD_BCRYPT);



$userRepo = new UserRepository();

if ($userRepo->verifMailExiste($email)) {
    header('Location: ../public/inscription_acheteur.php?error=emailTaken');
    exit;
}


$roleRepo = new RoleRepository();

$roleAcheteur = $roleRepo->findByName("acheteur");

if ($roleAcheteur === null) {
    header('Location: ../public/inscription_acheteur.php?error=roleNotFound');
    exit;
}

$user = new User($roleAcheteur, $nom, $prenom, $adresse, $ville, $email, $hashedPassword, $telephone);

$idUserInserer = $userRepo->createUser($user);

$user->setId($idUserInserer);


$_SESSION['user'] = $user;


header('Location: ../public/copie_homepage.php?success=1');
exit;