<?php

final class ImageRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getImageById(int $id): ?Image {
        $stmt = $this->pdo->prepare("SELECT * FROM etat WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return ImageMapper::mapToObject($data); // On mappe les données en objet Image
        }

        return null; // Si aucune image n'est trouvé
    }
}