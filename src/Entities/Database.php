<?php

final class Database
{
    private static ?PDO $pdo = null;

    public static function getConnection(): PDO
    {
        if (self::$pdo === null) {
            try {
                $host = "localhost";
                $dbname = "book market bdd";
                $login = "root";
                $password = "";

                // Tentative de connexion à la base de données
                self::$pdo = new PDO("mysql:host={$host};dbname={$dbname}" , $login, $password);

            

                // Si la connexion réussit, tu peux aussi définir l'option pour gérer les erreurs de manière détaillée
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch (PDOException $error) {
                // Si une erreur de connexion se produit, afficher le message d'erreur
                echo "Erreur de connexion : " . $error->getMessage();
            }
        }

        return self::$pdo;
    }
}


