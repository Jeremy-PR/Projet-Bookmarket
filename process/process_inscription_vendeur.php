<?php
require_once("../utils/autoloader.php");

session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../public/inscription_vendeur.php?error=invalidRequest');
    exit;
}


if (
    !isset(
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['adresse'],
        $_POST['ville'],
        $_POST['entreprise'],
        $_POST['adresse_entreprise'],
        $_POST['phone'],
        $_POST['email'],
        $_POST['password']
    )
) {
    header('Location: ../public/inscription_vendeur.php?error=missingFields');
    exit;
}


$nom = htmlspecialchars(trim($_POST['nom']));
$prenom = htmlspecialchars(trim($_POST['prenom']));
$adresse = htmlspecialchars(trim($_POST['adresse']));
$ville = htmlspecialchars(trim($_POST['ville']));
$entreprise = htmlspecialchars(trim($_POST['entreprise']));
$adresse_entreprise = htmlspecialchars(trim($_POST['adresse_entreprise']));
$telephone = htmlspecialchars(trim($_POST['phone']));
$email = htmlspecialchars(trim($_POST['email']));
$password = $_POST['password'];


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ../public/inscription_vendeur.php?error=invalidEmail');
    exit;
}

if (!preg_match('/^[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}$/', $telephone)) {
    header('Location: ../public/inscription_vendeur.php?error=invalidPhone');
    exit;
}


$hashedPassword = password_hash($password, PASSWORD_BCRYPT);


// Vérification si l'email existe déjà
$userRepo = new UserRepository();
if ($userRepo->verifMailExiste($email)) {
    header('Location: ../public/inscription_vendeur.php?error=emailTaken');
    exit;
}


$roleRepo = new RoleRepository();
$roleVendeur = $roleRepo->findByName("vendeur");

if ($roleVendeur === null) {
    header('Location: ../public/inscription_vendeur.php?error=roleNotFound');
    exit;
}


$user = new User(
    $roleVendeur,
    $nom,
    $prenom,
    $adresse,
    $ville,
    $email,
    $hashedPassword,
    $telephone,
    null,
    $nom_entreprise,
    $adresse_entreprise
);


$idUserInserer = $userRepo->createUser($user);
$user->setId($idUserInserer);


$_SESSION['user'] = $user;

header('Location: ../public/copie_homepage.php?success=1');
exit;






