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
        //retirer la carte $take1cardp1 de $firstPlayerCards et recale les indexs
        array_splice($firstPlayerCards, 0);
        //retirer la carte $take1cardp2 de $secondPlayerCards et recale les index
        array_splice($firstPlayerCards, 0);
        $c1 = (int)($take1cardp1['value']);
        $c2 = (int)($take1cardp2['value']);
        echo '<pre>';
        var_dump($c1);
        var_dump($c2);
        echo '</pre>';
        switch (true):
            case $c1<$c2:
                // mélange tableau main gagnante
                $mainGagnante2 = [];
                $mainGagnante2 = [0=>$take1cardp1, 1=>$take1cardp2];
                $mainGagnante2 = shuffle($mainGagnante2);
                for ($i=0; $i<2; $i++):
                    $secondPlayerCards = array_push($secondPlayerCards, $mainGagnante2[$i]);
                endfor;
                break;
            case $c1>$c2:
                $mainGagnante1 = [];
                $mainGagnante1 = [0=>$take1cardp1, 1=>$take1cardp2];
                $mainGagnante1 = shuffle($mainGagnante1);
                for ($i=0; $i<2; $i++):
                    $firstPlayerCards = array_push($firstPlayerCards, $mainGagnante1[$i]);
                endfor;
            case $c1==$c2:
                
            endswitch;

        require_once 'view/front/jeu.php';

    }

   
    
}