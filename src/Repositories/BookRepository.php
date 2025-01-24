<?php

final class BookRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addBook(Book $book): int
    {
        try {
            // Préparation de la requête d'insertion
            $sql = "INSERT INTO books (titre, auteur, description, id_genre, prix, id_image, id_vendeur, id_etat, id_annonce) 
                    VALUES (:titre, :auteur, :description, :id_genre, :prix, :id_image, :id_vendeur, :id_etat, :id_annonce)";

            $stmt = $this->pdo->prepare($sql);

            // Exécution de la requête avec les paramètres
            $stmt->execute([
                ':titre'       => $book->getTitre(),
                ':auteur'      => $book->getAuteur(),
                ':description' => $book->getDescription(),
                ':id_genre'    => $book->getIdGenre(),
                ':prix'        => $book->getPrix(),
                ':id_image'    => $book->getIdImage(),
                ':id_vendeur'  => $book->getIdVendeur(),
                ':id_etat'     => $book->getIdEtat(),
                ':id_annonce'  => $book->getIdAnnonce(),
            ]);

            // Retour de l'ID du dernier élément inséré
            return $this->pdo->lastInsertId();
        } catch (\PDOException $e) {
            // Gestion des erreurs avec un message clair
            echo "Erreur lors de l'ajout du livre : " . $e->getMessage();
            exit;
        }
    }
}






