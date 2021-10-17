<!--
!! LA BATAILLE 2 PERSONNES !!

but du jeu: gagner toutes les cartes de l'adversaire par comparaison de cartes
le jeu : jeu de carte de 52 cartes et un tapis de jeu et 2 joueurs

préparation du jeux:
1- on mélange le jeu
2- nbre de joueur 2
3- un tapis de jeu
3- on distribue face cachée 26 cartes chacun (52/2) pour en faire un tas de carte

tour de jeu
1- chaque joueur pioche une carte au dessus de son tas de cartes faces cachées
2- chaque joueur pose sa carte sur le tapis
3- les cartes sont comparées
4- resultat du tour

    4-1 la carte la plus forte remporte le tour
        4-1-1 le joueur place les 2 cartes en dessous de son tas de cartes dans
            n'importe quel ordre

    4-2 en cas d'égalité: il y a bataille
        4-2-1 chaque joueur repioche une carte du dessus de son tas (1-)
        4-2-2 les cartes invisibles tirées sont placées sur la première carte visible
        4-2-3 chaque joueur repioche une carte du dessus de son tas (1-)
        4-2-4 les cartes visibles sont placées sur les cartes invisibles
        4-2-5 les cartes sont comparées(3-)
        4-2-6 la plus forte remporte le tour(5-)
        4-2-7 le joueur place les 6 cartes en dessous son tas de cartes dans n'importe
                quel ordre
        4-2-8 si un des joueurs n'a plus de cartes, il perd la partie et l'autre
                joueur gagne la parie (8-)
        4-2-9 sinon faire un autre tour de jeu -1-
        4-2-10 en cas d'égalité: il y a bataille (4-1-)
            4-3-1 -> 4-2-1
            4-3-2 -> 4-2-2
            4-3-3 -> 4-2-3
            4-3-4 -> 4-2-4
            4-3-5 -> 4-2-5
            4-3-6 -> 4-2-6
            4-3-7 -> le joueur place les 10 cartes en dessous son tas de cartes dans n'importe quel ordre
            4-3-8 -> 4-2-8
            4-3-9 -> 4-2-9
            4-3-10 -> 4-2-10
            4-4-1 ect---

5- si un des joueurs n'a plus de cartes, il perd la partie et l'autre joueur gagne
    la partie
6- fin du tour de jeu
7- sinon faire un autre tour de jeu -1-
8- fin du jeu

----------
!!installation de composer dans un projet
!!dans le terminal
1- on va chercher un fichier que l'on renomme composer-setup.php à la racine du
projet
    ->php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
2- on vérifie si le fichier téléchargé est correct et vérifié
    ->php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
3- on lance le fichier setup
    ->php composer-setup.php
    un fichier composer.phar apparait
4- on détruit le fichier composer-setup.php
php -r "unlink('composer-setup.php');"
5- on lance composer
    ->php composer.phar
    on tombe sur l'explication de composer
6- on initialise composer dans notre projet
    ->php composer.phar init
    répondre aux différentes questions sinon laisser vide par contre au niveau des 4 dernières question, répondre no no et n to skip et yes à la fin
    ça va génerer un fichier composer.json avec les infos demandées

!! AUTOLOADER (qui va gérer les namaspaces des classes et utiliser use une classe)
1- configuration
    dans le fichier composer.json juste avant "require": {}
    rajouter:
        ->"autoload": {
            "psr-4":{
                "Controller\\": "controller/" (correspondance "namespace")
                "Model\\" : "model/"
            }
                    },
2- executer la commande composer
    ->php composer.phar dump-autoload
    cela créé le dossier vendor\composer(avec plusieurs fichiers)+ vendor\autoloader.php
-->
