<?php
// On défini des constantes de configuration
// en POO les bons usages veulent que les constantes soient nommée en majuscule
// besion de faire cette modification car j'ai mis config.php dans le dossier
// config comme dirname(__FILE__) nous retourne un chemin avec \config à la fin
// on fait disparaitre \config du dirname(__file__)
$modifFILE = str_replace('\config', '',dirname(__FILE__));
define('SITE_ROOT', $modifFILE);
// echo '<pre>';
// var_dump(dirname(__FILE__));
// var_dump(SITE_ROOT);
// echo '</pre>';
// renvoi quelque chose comme E:\LARAGON\www\bataille_php
// echo SITE_ROOT;
define('BASE_FOLDER', '/bataille_php');
// on déclare l'url d'accès à la racine du site
define('SCRIPT_ROOT', 'http://localhost/bataille_php');
// Défini si le ConnexionController fonctionne avec le jeu de données de connexion 
// locale ou le jeu distant
define('IS_ONLINE', false);