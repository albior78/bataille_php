<?php

namespace Model;

use PDO;
use Controller\ConnexionController;

Class Player_card{

    private $id_player_card;
    private $id_player;
    private $id_card;

    private $connexBdd;

    public function __construct(){
        $this->connexBdd = new ConnexionController;
    }

}