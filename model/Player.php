<?php

namespace Model;

use PDO;
use Controller\ConnexionController;

class Player{
    private $id_player;
    private $name;
    private $first_name;


    private $connexBdd;

    public function __construct()
    {
        $this->connexBdd = new ConnexionController;
    }

    public function createOnePlayer($post)
    {
        $this->name = $post['name'];
        $this->first_name = $post['firstName'];

        $sql = 'INSERT INTO player(name, first_name)
                VALUE (:name, :firstName)
                ';
        $query = $this->connexBdd->connexion->prepare($sql);
        $datas = [
            ':name'         => $this->name,
            ':firstName'    => $this->first_name
        ];
        $query->execute($datas);
    }

    public function listAllPlayers()
    {
        $sql = 'SELECT *
                FROM player';
        $query = $this->connexBdd->connexion->prepare($sql);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        return $return;
    }
    public function numbersPlayersVerification()
    {
        $sql = 'SELECT COUNT(*)
                FROM player
                ';
        $query = $this->connexBdd->connexion->prepare($sql);
        $query->execute();
        $nplayer = $query->fetch(PDO::FETCH_COLUMN);
        return $nplayer;

    }

}