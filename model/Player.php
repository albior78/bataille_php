<?php

namespace Model;

use Controller\ConnexionController;

class Player{
    private $id_player;
    private $id_card;
    private $name;
    private $firstName;
    private $age;

    private $connexBdd;

    public function __construct()
    {
        $this->connexBdd = new ConnexionController;
    }
    
}