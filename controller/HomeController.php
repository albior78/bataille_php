<?php

namespace Controller;


use Model\Card;
use Model\Player;

class HomeController {

    private $card;
    private $player;

    public function __construct()
    {
        $this->card = new Card;
        $this->player = new Player;
    }

    public function lireToutesLesCartes()
    {
        $cartes = $this->card->readAllCard();

        require_once 'view/front/home.php';

    }
}