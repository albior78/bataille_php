<?php
namespace Controller;


use Model\Card;
use ArrayObject;
use Model\Player;
use Model\Player_card;

class JeuController {

    private $player;
    private $player_card;
    private $card;

    public function __construct()
    {
        $this->player = new Player;
        $this->player_card = new Player_card;
        $this->card = new Card;
    }

    public function deroulementJeuBataille()
    {
        // on mélange les cartes
        $newDeck = $this->card->blendAllCards();
    
        // distribution des cartes 1 par 1 dans l'ordre du paquet
        $firstPlayerCards = [];
        for ($i=0; $i<53; $i+=2):
            array_push($firstPlayerCards, $newDeck[$i]);
        endfor;
        // echo '<pre>';
        //     var_dump($firstPlayerCards);
        // echo '</pre>';
        $secondPlayerCards =[];
        for ($j=1; $j<54; $j+=2):
            array_push($secondPlayerCards, $newDeck[$j]);
        endfor;
        // echo '<pre>';
        //     var_dump($secondPlayerCards);
        // echo '</pre>';
        //tour de jeu

        require_once 'view/front/home.php';

    }
}