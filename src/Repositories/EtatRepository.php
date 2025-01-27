<?php

final class EtatRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getEtatById(int $id): ?Etat {
        $stmt = $this->pdo->prepare("SELECT * FROM etat WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return EtatMapper::mapToObject($data); // On mappe les données en objet Genre
        }

        return null; // Si aucun genre n'est trouvé
    }
}