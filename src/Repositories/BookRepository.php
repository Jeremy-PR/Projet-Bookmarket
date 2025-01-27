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

            $sql = "INSERT INTO books (titre, auteur, description, id_genre, prix, id_image, id_vendeur, id_etat, id_annonce) 
                    VALUES (:titre, :auteur, :description, :id_genre, :prix, :id_image, :id_vendeur, :id_etat, :id_annonce)";

            $stmt = $this->pdo->prepare($sql);

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


            return $this->pdo->lastInsertId();
        } catch (\PDOException $e) {

            echo "Erreur lors de l'ajout du livre : " . $e->getMessage();
            exit;
        }
    }

    public function getBookById(int $id): ?Book
    {
        $sql = "SELECT * FROM books WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $bookData = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$bookData) {
            return null;
        }

        return BookMapper::mapToObject($bookData);
    }


    public function getAllBooks()
    {
        $sql = "SELECT * FROM books"; 
        $stmt = $this->pdo->query($sql);
        $booksData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $books = [];
        foreach ($booksData as $data) {
            $books[] = new Book(
                $data['titre'],
                $data['auteur'],
                $data['description'],
                $data['id_genre'],
                $data['prix'],
                $data['id_image'],
                $data['id_vendeur'],
                $data['id_etat'],
                $data['id_annonce'],
                $data['id']
            );
        }

        return $books;
    }

}






