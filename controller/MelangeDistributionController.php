<?php
namespace Controller;


use Model\Card;


class MelangeDistributionController {
    // paquet de 54 cartes
    private $card;
    // jeu de carte mélangé
    private $newDeck;
    // paquet du joueur 1
    private $firstPlayerCards = [];
    // paquet du joueur 2
    private $secondPlayerCards =[];

    public function __construct()
    {
       $this->card = new Card;
    }

    public function melangeDistributionDuJeu()
    {
        if(isset($_POST['blend'])):
            // echo 'COUCOU MANU';
            // on mélange les cartes
            $blendAllcard = $this->card->blendAllCards();
            $_SESSION['blendAllCard']=$blendAllcard;
        endif;
        if(isset($_POST['distribution'])):
            // distriburion des cartes à chaques joueurs
            // Deck du player1 / remonté à la vue avec $paquetJ1 pour le compteur
            $paquetJ1 = $this->firstPlayerCards = $this->distributionCarte($this->card->blendAllCards() ,0);
            // Deck du player2 / remonté à la vue avec $paquetJ2 pour le compteur
            $paquetJ2 = $this->secondPlayerCards = $this->distributionCarte($this->card->blendAllCards(), 1);
            // echo '<pre>';
            // echo '<strong style="font-size: 2rem">$paquetJ2:</strong>';
            // var_dump($paquetJ2);
            // echo '</pre>';
            $_SESSION['paquetJ1']=$paquetJ1;
            $_SESSION['paquetJ2']=$paquetJ2;
        endif;
        // retour vue
        require_once 'view/front/melangeDistribution.php';
    }

    
    //! en 1er Argument de la méthode placer une variable $jeuCarteMelange qui va
    //! recevoir l'objet avec sa fonction, voir plus haut $this->card->blendAllCards
    // distribution des cartes:  $decalageDistribution=0 pour player1
    //                           $decalageDistribution=1 pour player2
    public function  distributionCarte($jeuCarteMelange, $decalageDistridution=0):array
    {
        $playerCards=[];
        for ($i=$decalageDistridution; $i<(53+$decalageDistridution); $i+=2):
            array_push($playerCards, $jeuCarteMelange[$i]);
        endfor;
        return $playerCards;
    }
       //     // echo '<pre>';
    //     // echo '<strong style="font-size: 2rem">$_SESSION:</strong>';
    //     // var_dump($_SESSION);
    //     // echo '</pre>';
    //     //? TOUR DE JEU
    //     // le joueur1 pose une carte ou le joueur2 pose une carte
    //     if(isset($_POST['cardPlaying1'])):
    //         // lecture de la carte index 0 du Deck du player1 / remonté à la vue avec
    //         // $cartejouee1
            
    //         $carteJouee1 = $this->take1cardp1 = $this->prendre1carte($this->firstPlayerCards);
    //     //     // echo '<pre>';
    //     //     // var_dump($carteJouee1);
    //     //     // echo '</pre>';
    //         $this->firstPlayerCards = $this->reindexationDeckJoueur($this->firstPlayerCards);
    //     endif;
    //     if(isset($_POST['cardPlaying2'])):
    //         // lecture de la carte index 0 du Deck du player2 / remonté à la vue avec
    //         // $cartejouee2
    //         $carteJouee2 = $this->take1cardp2 = $this->prendre1carte($this->secondPlayerCards);
    //         $this->secondPlayerCards = $this->reindexationDeckJoueur($this->secondPlayerCards);
    //     endif;
   
        //retour vue
    
   

    // // prendre la première carte du dessus du paquet d'un joueur
    // function prendre1carte($deckJoueur=[])
    // {
    //     $prendreUneCarte = $deckJoueur[0];
       
    //     return $prendreUneCarte;
    // }

    // public function reindexationDeckJoueur($deckJoueur=[])
    // {
    //     // égalisation de $deckJoueur et de $deckJoueurSansIndex0 pour ne pas perdre
    //     // l'origine du $deckJoueur
    //     $deckJoueurSansIndex0 = $deckJoueur;
    //     // effacement de l'index dont le résultat de recherche est l'index 0
    //     unset($deckJoueurSansIndex0[array_search([0], $deckJoueurSansIndex0)]);
    //     // décalage des indexs à partir de 0 que l'on affecte au nouveau paquet du
    //     // joueur qui se retrouve avec une carte en moins
    //     $deckJoueur = array_slice($deckJoueurSansIndex0, 0);
    //     return $deckJoueur;





    //     // echo '<pre>';
    //     //     var_dump($this->firstPlayerCards);
    //     // echo '</pre>';

       
     
}