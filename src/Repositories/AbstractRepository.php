<?php


abstract class AbstractRepository 
{
    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }
}

// Fichier : AbstractRepository.php
// Ce qui est fait ici :
// Ce fichier contient une classe abstraite appelée AbstractRepository. Cette classe est utilisée comme base pour d'autres classes de repository (par exemple, HeroRepository) qui interagiront avec la base de données.

// Classe abstraite AbstractRepository :
// La classe AbstractRepository est déclarée abstraite avec le mot-clé abstract. Cela signifie qu'elle ne peut pas être instanciée directement, mais elle peut être étendue par d'autres classes qui devront implémenter ou utiliser ses fonctionnalités.
// Propriété protégée $pdo :
// La classe contient une propriété protected PDO $pdo. Cela signifie qu'elle est accessible dans cette classe ainsi que dans les classes qui l'héritent (comme HeroRepository).
// PDO (PHP Data Objects) est utilisé pour la gestion des connexions à une base de données en PHP. Ici, cette propriété stocke la connexion à la base de données.
// Méthode __construct :
// Le constructeur __construct() initialise la connexion à la base de données en appelant la méthode getConnection() de la classe Database. Cela permet à toutes les classes qui héritent de AbstractRepository d'avoir accès à la connexion à la base de données sans avoir besoin de la créer à chaque fois.
// Notions de PHP utilisées :
// Classe abstraite : En déclarant AbstractRepository comme une classe abstraite, tu fais en sorte qu'elle ne puisse pas être utilisée seule. C'est un bon moyen de factoriser des fonctionnalités communes (comme la connexion à la base de données) pour plusieurs classes.
// PDO (PHP Data Objects) : PDO est utilisé ici pour gérer la connexion à la base de données. C'est un moyen sûr et flexible de se connecter à différentes bases de données. La méthode Database::getConnection() retourne un objet PDO qui est utilisé pour exécuter des requêtes SQL.
// Notions de POO utilisées :
// Héritage : Cette classe est destinée à être étendue par d'autres classes de repository (par exemple, HeroRepository). L'héritage permet de réutiliser la logique de connexion à la base de données dans ces classes sans répéter le même code.
// Encapsulation : La propriété $pdo est protégée (avec le mot-clé protected), ce qui signifie qu'elle est accessible uniquement dans cette classe et dans les classes qui en héritent. Cela empêche son accès direct de l'extérieur de la classe, ce qui favorise l'encapsulation.
// En résumé :
// AbstractRepository est une classe abstraite qui gère la connexion à la base de données via PDO.
// Elle contient une propriété protégée $pdo pour stocker la connexion et un constructeur pour l'initialiser.
// D'autres classes de repository (comme HeroRepository) hériteront de cette classe pour réutiliser la logique de connexion à la base de données.
