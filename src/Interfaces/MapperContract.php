<?php

interface MapperContract {
    public static function mapToObject(array $datas): object;
}

// Fichier : MapperContract.php
// Ce qui est fait ici :
// Ce fichier définit une interface en PHP appelée MapperContract. Les interfaces en PHP sont des contrats qui définissent un ensemble de méthodes qu'une classe doit implémenter. Ici, l'interface est utilisée pour assurer qu'une classe aura une méthode mapToObject pour transformer un tableau de données en un objet.

// Interface MapperContract :

// Une interface en PHP est une sorte de modèle ou de contrat que les classes peuvent suivre. Elle définit des méthodes, mais ne fournit pas d'implémentation pour ces méthodes.
// Ici, l'interface MapperContract définit une méthode unique mapToObject. Cela signifie que toute classe qui implémente cette interface devra obligatoirement définir cette méthode.
// Méthode mapToObject :

// public static function mapToObject(array $datas): object; : Cette méthode prend un tableau de données en entrée (array $datas) et retourne un objet (object).
// Cette méthode n'a pas d'implémentation ici, car l'interface ne définit que la signature de la méthode, mais chaque classe qui implémente l'interface devra fournir la logique spécifique pour cette méthode.
// Notions de PHP utilisées :
// Interface : En PHP, une interface est utilisée pour définir un ensemble de méthodes qu'une classe doit obligatoirement implémenter. Cela garantit que certaines classes auront des comportements communs, même si la manière dont elles accomplissent ces comportements peut varier.
// Méthode statique : La méthode mapToObject est définie comme static, ce qui signifie qu'elle peut être appelée sans avoir besoin d'instancier l'objet. Cela peut être utile lorsque l'on souhaite transformer des données en objets sans avoir à créer une instance de la classe.
// Type hinting : On utilise le type array pour le paramètre d'entrée et le type object pour la valeur de retour. Cela permet de s'assurer que la méthode travaille avec les bons types de données, ce qui est important pour éviter des erreurs lors de l'exécution.
// Notions de POO utilisées :
// Abstraction : Cette interface est un exemple d'abstraction en POO. Elle permet de définir un comportement commun (la méthode mapToObject) que toutes les classes qui l'implémenteront devront suivre, mais elle ne détaille pas comment ce comportement sera réalisé. Chaque classe implémentant cette interface pourra définir ses propres détails.
// Contrat : L'interface définit un contrat que les classes doivent respecter. Dans ce cas, toute classe qui implémente MapperContract devra fournir une méthode mapToObject qui prend un tableau et retourne un objet. Cela assure une certaine uniformité dans le comportement des classes, ce qui est important pour la maintenabilité du code.
// Polymorphisme : L'interface permet le polymorphisme, car plusieurs classes peuvent implémenter cette interface et définir leur propre version de la méthode mapToObject. Cela permet de traiter les objets de manière uniforme tout en permettant à chaque classe d'avoir son propre comportement.
// En résumé :
// Ce fichier définit une interface appelée MapperContract, qui impose à toute classe qui l'implémente d'avoir une méthode mapToObject pour transformer un tableau de données en un objet.
// Cette approche utilise les principes de POO comme abstraction, contrat, et polymorphisme.
// L'interface garantit que les classes qui l'implémentent respectent un même modèle, mais la logique exacte de la méthode mapToObject est laissée aux classes concrètes.
