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

        $photo = $_FILES['image'];

        $idImage = null;
        if (isset($_FILES['image']) && $photo['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '../public/assets/src/image/';
            $fileName = uniqid() . basename($photo['name']);
            $uploadPath = $uploadDir . $fileName;
        


            if (move_uploaded_file($photo['tmp_name'], $uploadPath)) {


                $idImage = './assets/src/image/' . $fileName;
            }
        }
$Image = new Image(0, $idImage, '');

$imageRepo = new ImageRepository();
$photo = $imageRepo->create($Image);


        $book = new Book(
            id: null,
            titre: $titre,
            auteur: $auteur,
            description: $description,
            idGenre: $idGenre,
            prix: $prix,
            idImage:$photo->getId(),
            idVendeur: $_SESSION['user']->getId(),
            idEtat: 1,
            idAnnonce: null
        );


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
