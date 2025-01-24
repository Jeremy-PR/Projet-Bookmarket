<?php
require_once("../utils/autoloader.php");
session_start();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        
        $titre = htmlspecialchars($_POST['titre']);
        $auteur = htmlspecialchars($_POST['auteur']);
        $description = htmlspecialchars($_POST['description']);
        $idGenre = intval($_POST['genre']);
        $prix = intval($_POST['prix']);
        
       
        $idImage = null; 
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageTmpName = $_FILES['image']['tmp_name'];
            $imageName = basename($_FILES['image']['name']);
            $uploadDir = __DIR__ . '/../uploads/';
            $uploadPath = $uploadDir . $imageName;

         
            if (move_uploaded_file($imageTmpName, $uploadPath)) {
              
                
                $idImage = hash('sha256', $imageName);
            }
        }

     
        $book = new Book(
            id: null,
            titre: $titre,
            auteur: $auteur,
            description: $description,
            idGenre: $idGenre,
            prix: $prix,
            idImage: $idImage,
            idVendeur: $_SESSION['user']->getId(), // ID du vendeur connecté (exemple avec une session utilisateur)
            idEtat: 1, 
            idAnnonce: null 
        );

        // Utilisation du BookRepository pour ajouter le livre à la base
        $bookRepository = new BookRepository();
        $bookId = $bookRepository->addBook($book);

     
        header('Location: ../public/book-details.php?bookId=' . $bookId);
        exit;
    } catch (Exception $e) {

        echo "Erreur lors de l'ajout du livre : " . $e->getMessage();
        exit;
    }
} else {

    echo "Accès non autorisé.";
    exit;
}
