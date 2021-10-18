<?php

namespace Controller;


use Model\Card;


class HomeController {

    private $card;


    public function __construct()
    {
        $this->card = new Card;
        
    }

    public function lireToutesLesCartes()
    {
        $cartes = $this->card->readAllCard();

        require_once 'view/front/home.php';

    }
}