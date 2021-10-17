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
        // echo '<pre>';
        // var_dump($return);
        // echo '</pre>';
        return $return;
    }
}
