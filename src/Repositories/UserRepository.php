<?php
final class UserRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function verifMailExiste(string $email): bool
    {
        try {

            $checkQuery = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->pdo->prepare($checkQuery);
            $stmt->execute([':email' => $email]);

            $user = $stmt->fetch();

            if ($user) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion : " . $e->getMessage();
            exit;
        }
    }


    public function createUser(User $user): int
    {
        try {
            $insertQuery = "INSERT INTO users (id_role, nom, prenom, adresse, ville, email, password, telephone) 
                    VALUES (:id_role, :nom, :prenom, :adresse, :ville, :email, :password, :telephone)";
            $stmt = $this->pdo->prepare($insertQuery);
            $stmt->execute([
                ':id_role' => $user->getRole()->getId(),
                ':nom' => $user->getNom(),
                ':prenom' => $user->getPrenom(),
                ':adresse' => $user->getAdresse(),
                ':ville' => $user->getVille(),
                ':email' => $user->getEmail(),
                ':password' => $user->getPassword(),
                ':telephone' => $user->getTelephone(),
            ]);

           return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion : " . $e->getMessage();
            exit;
        }
    }
}
