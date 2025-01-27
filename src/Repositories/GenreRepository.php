<?php

final class GenreRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getGenreById(int $id): ?Genre {
        $stmt = $this->pdo->prepare("SELECT * FROM genre WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return GenreMapper::mapToObject($data); // On mappe les données en objet Genre
        }

        return null; // Si aucun genre n'est trouvé
    }
}