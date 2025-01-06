<?php
// évite qu'on change la requete en GET
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

// Evite la suppression d'un input
if (
    !isset($_POST['email'], $_POST['password'])
) {
    header('Location: ../index.php?error=1');
    exit;
}

// Evite de donner les trucs vides
if (
    empty($_POST['email']) ||
    empty($_POST['password'])
) {
    header('Location: ../index.php?error=2');
    exit;
}

// Sanitization de seulement

$username = htmlspecialchars(trim($_POST['email']));
$mdp = $_POST['password'];