<?php

final class ImageRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create(Image $Image): Image
    {
        $sql = "INSERT INTO image (image_path, alt) VALUES (:image_path, :alt)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(ImageMapper::mapToArray($Image));
        $id = $this->pdo->lastInsertId();
        $Image->setId($id);
        return $Image;

    }








    public function getImageById(int $id): ?Image {
        $stmt = $this->pdo->prepare("SELECT * FROM image WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return ImageMapper::mapToObject($data); // On mappe les données en objet Image
        }

        return null; // Si aucune image n'est trouvé
    }
}