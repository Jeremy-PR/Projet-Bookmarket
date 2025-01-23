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



// Fichier : Database.php
// Ce qui est fait ici :
// Ce fichier définit une classe Database qui gère la connexion à la base de données via PDO (PHP Data Objects). Cette classe utilise le concept de Singleton pour garantir qu'une seule connexion à la base de données soit utilisée tout au long de l'application.

// Classe Database :

// final class Database : Le mot-clé final empêche la classe d'être étendue par d'autres classes. Cela signifie que cette classe est une classe "terminée" et qu'aucune autre classe ne pourra l'hériter.
// Propriété statique $pdo :

// private static ?PDO $pdo = null; : Cette propriété est une variable statique de type PDO, utilisée pour stocker la connexion à la base de données. Elle est initialisée à null, ce qui signifie qu'il n'y a pas de connexion tant que la méthode getConnection() n'est pas appelée.
// Le fait que la propriété soit statique permet de partager la même connexion à la base de données dans toute l'application sans créer de nouvelles instances de la classe à chaque fois.
// Méthode statique getConnection() :

// public static function getConnection(): PDO : La méthode getConnection() permet de récupérer une instance de connexion à la base de données. Si la connexion n'existe pas encore (self::$pdo === null), elle crée une nouvelle connexion.
// Cette méthode utilise PDO pour se connecter à la base de données MySQL. Elle prend en compte l'hôte, le nom de la base de données, le nom d'utilisateur et le mot de passe pour établir la connexion.
// Gestion des erreurs avec try-catch :

// La connexion à la base de données est entourée d'un bloc try-catch pour attraper d'éventuelles erreurs. Si une erreur survient lors de la connexion, un message d'erreur est affiché.
// setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) : Cette ligne définit l'attribut de gestion des erreurs de PDO pour qu'elles soient lancées sous forme d'exceptions, permettant de capturer les erreurs plus facilement.
// Notions de PHP utilisées :
// PDO (PHP Data Objects) : Utilisé pour se connecter à une base de données de manière sécurisée et portable. Cela permet de se connecter à plusieurs types de bases de données (MySQL, PostgreSQL, etc.) de manière uniforme.
// Gestion des erreurs en PHP : Utilisation de try-catch pour capturer et gérer les erreurs, comme les problèmes de connexion à la base de données.
// Attributs de PDO : PDO::ATTR_ERRMODE permet de spécifier le mode de gestion des erreurs. Ici, PDO::ERRMODE_EXCEPTION signifie que les erreurs seront lancées sous forme d'exceptions, ce qui facilite leur gestion.
// Notions de POO utilisées :
// Classe Database : Cette classe est une classe utilitaire qui a pour but de gérer une tâche spécifique (la connexion à la base de données). Elle ne représente pas un objet métier mais un service partagé dans l'application.
// Singleton : Le design pattern Singleton est utilisé ici pour s'assurer qu'il n'y ait qu'une seule instance de la connexion à la base de données. Cela évite de multiplier les connexions inutiles et de consommer des ressources.
// Le pattern Singleton est appliqué via la propriété statique $pdo et la méthode statique getConnection(), qui renvoie toujours la même instance de connexion si elle a déjà été créée.
// Méthode statique : La méthode getConnection() est statique, ce qui signifie qu'elle peut être appelée sans instancier l'objet Database. Cela est logique pour une ressource partagée comme la connexion à la base de données.
// En résumé :
// Ce fichier implémente une classe Singleton pour gérer la connexion à la base de données, assurant que l'application utilise une seule instance de la connexion tout au long de son cycle de vie.
// L'utilisation de PDO permet une gestion flexible et sécurisée des connexions à la base de données.
// Ce fichier est essentiel car il garantit une gestion cohérente et optimisée de la base de données dans ton projet, tout en respectant les principes de la POO avec un design pattern classique.

