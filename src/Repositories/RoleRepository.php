<?php

final class RoleRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findByName(string $nameRole): ?Role
    {
        try {

            $roleQuery = "SELECT * FROM role WHERE role = :nameRole";
            $stmt = $this->pdo->prepare($roleQuery);
            $stmt->execute([
                ':nameRole' => $nameRole
            ]);
            $roleData = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$roleData) {
                return null;
            }

            return RoleMapper::mapToObject($roleData);

        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion : " . $e->getMessage();
            exit;
        }
    }
}
