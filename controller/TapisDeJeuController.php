<?php
namespace Controller;


use Model\Card;


class TapisDeJeuController{
    // paquet de 54 cartes
    private $card;
    // jeu de carte mélangé
    private $newDeck;
    // paquet du joueur 1
    private $firstPlayerCards = [];
    // paquet du joueur 2
    private $secondPlayerCards =[];

    public function __construct()
    {
        $this->card = new Card;
    }

    public function deroulementDuJeu()
    {
        // logique dans ajax
        
        // retour vue
        require_once 'view/front/deroulementDuJeu.php';
    }

    

    // public function mainGagnanteJoueurSansBataille($joueur)
    // {
    //     // remplissage du tableau $mainGagnante du joueur
    //     $_SESSION['mainGagnanteJ'.$joueur] = array_fill_keys([0] , $_SESSION['piocherJ1']) + array_fill_keys([1] , $_SESSION['piocherJ2']);
    //     // mélange du tableau main gagnante du joueur
    //     shuffle($_SESSION['mainGagnanteJ'.$joueur]);
    //     // on rajoute à la fin du paquet de carte du joueur gagnant chaque
    //     // carte du tableau main gagnante du joueur
    //     foreach ($_SESSION['mainGagnanteJ'.$joueur] as $key => $value):
    //         array_push($_SESSION['paquetJ'.$joueur], $value);
    //     endforeach;
    //     // on renvoie le nouveau paquet
    //     return $_SESSION['paquetJ'.$joueur];
    // }
}
