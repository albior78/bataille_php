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
        $cards = $this->card->readAllCard();
        if(isset($_POST['blend'])):
            // on mélange les cartes
            $newDeck = $this->card->blendAllCards();
            // echo '<pre>';
            // var_dump($newDeck);
            // echo '</pre>';
            $firstPlayerCards = [];
            for ($i=0; $i<53; $i+=2):
                array_push($firstPlayerCards, $newDeck[$i]);
            endfor;
            $secondPlayerCards =[];
            for ($j=1; $j<54; $j+=2):
                array_push($secondPlayerCards, $newDeck[$j]);
            endfor;
        endif;
        //tour de jeu
        // ?1- chaque joueur pioche une carte au dessus de son tas de cartes faces
        // ?    cachées
        $take1cardp1 = [];
        $take1cardp2 = [];
        $take1cardp1 = $firstPlayerCards[0];
        $take1cardp2 = $secondPlayerCards[0];
        $c1 = (int)($take1cardp1['value']);
        $c2 = (int)($take1cardp2['value']);
        echo '<pre>';
        var_dump($c1);
        var_dump($c2);
        echo '</pre>';
        switch (true):
            case $c1<$c2:
        endswitch;
        

        require_once 'view/front/jeu.php';

    }

   
    
}