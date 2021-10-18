<?php

namespace Controller;


use Model\Card;
use Model\Player;

class PlayerController {

    private $player;

    public function __construct()
    {
        $this->player = new Player;
    }

    public function creerDeuxJoueurs()
    {
        if(isset($_POST['submit'])):
            switch ($this->player->numbersPlayersVerification()):
                case (0):
                    $this->player->createOnePlayer($_POST);
                    $_SESSION['message'] = "le 1er joueur est bien enregistrer";
                    header('Location:http://localhost/bataille_php/joueurs');
                    exit();
                    break;
                case (1):
                    $this->player->createOnePlayer($_POST);
                    $_SESSION['message'] = "le 2eme joueur est bien enregistrer";
                    header('Location:http://localhost/bataille_php/joueurs');
                    exit();
                    break;
                case ($this->player->numbersPlayersVerification() >= 2):
                    $_SESSION['message'] = "Juste 2 joueurs pour l'instant, désolé";
                    header('Location:http://localhost/bataille_php/joueurs');
                    exit();
                    break;
                endswitch;
        endif;
        $nplayers = $this->player->numbersPlayersVerification();
        $players = $this->player->listAllPlayers();

        require_once 'view/front/players.php';
    }
}