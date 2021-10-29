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
        
        // retour vue
        require_once 'view/front/deroulementDuJeu.php';
    }
}