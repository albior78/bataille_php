<?php

namespace Model;

use PDO;
use Controller\ConnexionController;

class Card{

    private $id_card;
    private $name;
    private $color;
    private $type;
    private $value;

    private $connexBdd;

    public function __construct()
    {
        $this->connexBdd = new ConnexionController;
    }

    public function readAllCard(): mixed
    {
        $sql = 'SELECT *
                FROM card
                ';
        $query = $this->connexBdd->connexion->prepare($sql);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        return $return;
    }

    public function blendAllCards() {
        $sql = 'SELECT *
                FROM card
                ORDER BY RAND()
                ';
        $query = $this->connexBdd->connexion->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
