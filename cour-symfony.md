// COUR SYMFONY //

// 1 //
# symfony new --webapp projetTuto
Créer un nouveau projet symfony qui s'appelle "projetTuto".

// 2 // 
# symfony console doctrine:database:create
Créer la base de donnée à partir de ce que tu renseigne sur .env.local. 

// 3 //
# symfony console make:entity
Crée ou modifie les colonnes d'une class (une table) dans entity.

// 4 //
# symfony console make:migration
Crée un fichier qui compare le code et la base de donnée et *génére un fichier de migration*.

// 5 //
# symfony console doctrine:migration:migrate
On exécute le fichier de migration.

// 6 //
# composer require --dev zenstruck/foundry
installer une librairie zenstruck.

// 7 //
# composer require --dev doctrine/doctrine-fixtures-bundle
installer une librairie "".

// 8 //
# symfony console make:factory
Créer une usine à fabriquer une entité.
(https://fakerphp.org/formatters/numbers-and-strings/).

// 9 //
# symfony console doctrine:fixtures:load
Lancer une fixture une fois qu'elle est configurée.

// 10 //
# symfony serve
lancer le serveur symfony

// 11 //
# symfony console make:controller ()
Créer un controller (on peut rajouter le nom aprés la commande pour le nomer directement).

// 12 //
# npm run watch
Build les Assets ( Javascript et Scss).

// les 4 méthode de base d'un repository // 
// 1 > findAll()  pour tout récupérer
// 2 => find('id') récupére par son id
// 3 => findBy(['name' => 'toto']) il récupére TOUTE les entités dont le name  a une valeur toto.
// 4 => findOneBy(['name' => 'toto']) il ne récupère que UNE seul entité dont le nom a la valeur toto.


// 13 //
# symfony console make:twig-extension
Créé une extension qui permet de créer des filters et des function qu'on peut rappeler au besoin ( | **** )

// 2 //
# symfony console

// 2 //
# symfony console
