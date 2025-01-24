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

    public function connectUser(string $email, string $password): ?User
    {
        try {
            $sql = "
                SELECT 
                    users.id AS user_id, 
                    users.nom, 
                    users.prenom, 
                    users.adresse, 
                    users.ville, 
                    users.email, 
                    users.password, 
                    users.telephone, 
                    users.nom_entreprise, 
                    users.adresse_entreprise,
                    role.id AS role_id, 
                    role.role AS role_name
                FROM users
                INNER JOIN role ON users.id_role = role.id
                WHERE users.email = :email
            ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                // Crée un objet Role à partir des données récupérées
                $role = new Role($user['role_id'], $user['role_name']);

                // Crée et retourne un objet User
                return new User(
                    $role,
                    $user['nom'],
                    $user['prenom'],
                    $user['adresse'],
                    $user['ville'],
                    $user['email'],
                    $user['password'],
                    $user['telephone'],
                    $user['user_id'] ?? null,
                    $user['nom_entreprise'] ?? null,
                    $user['adresse_entreprise'] ?? null
                );
            }

            return null; // Retourne null si l'authentification échoue
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de l'authentification : " . $e->getMessage());
        }
    }
}
