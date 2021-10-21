<?php
namespace Controller;


use Model\Card;
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
            $tours = 0;
            while($tours<1500):
                $tours+=1;
                echo '<br>' .'TOUR N°' . $tours;
                echo '<br>';
                //tour de jeu
                // ?1- chaque joueur pioche une carte au dessus de son tas de cartes faces
                // ?    cachées
                // ----------déclaration des variables--------------
                // tirage carte joueur 1
                $take1cardp1 = [];
                // tirage carte joueur2
                $take1cardp2 = [];
                // retire index 0 du paquet du joueur 1
                $firstPayerCardsWithout0index = [];
                // retire index 0 du paquet du joueur 2
                $secondPayerCardsWithout0index = [];
                // main gagnante joueur 1
                $mainGagnante1 = [];
                // main gagnante joueur 2
                $mainGagnante2 = [];
                // tapis joueur 1
                $tapis1 =[];
                // tapis joueur 2
                $tapis2 =[];
                //--------------------------------
                // lecture de la carte index 0 du paquet du joueur 1
                $take1cardp1 = $firstPlayerCards[0];
                // lecture de la carte index 0 du paquet du joueur 2
                $take1cardp2 = $secondPlayerCards[0];
                // égalisation de $firstPlayerCards et de $firstPayerCardsWithout0index pour ne pas perdre l'origine
                // de $firstPlayerCards
                $firstPayerCardsWithout0index = $firstPlayerCards;
                // effacement de l'index dont le résultat de recherche est l'index 0, joueur 1
                unset($firstPayerCardsWithout0index[array_search([0], $firstPayerCardsWithout0index)]);
                // décalage des indexs à partir de 0 que l'on affecte au nouveau paquet du joueur 1 qui se retrouve
                // avec 26 cartes
                $firstPlayerCards = array_slice($firstPayerCardsWithout0index, 0);
                // égalisation de $firstPlayerCards et de $secondPayerCardsWithout0index pour ne pas perdre l'origine
                // de $secondPlayerCards
                $secondPayerCardsWithout0index = $secondPlayerCards;
                // effacement de l'index dont le résultat de recherche est l'index 0, jour 2
                unset($secondPayerCardsWithout0index[array_search([0], $secondPayerCardsWithout0index)]);
                // décalage des indexs à partir de 0 que l'on affecte au nouveau paquet du joueur 2 qui se retrouve
                // avec 26 cartes
                $secondPlayerCards = array_slice($secondPayerCardsWithout0index, 0);
                // valeur du champs "value" en entier de la carte joueur 1
                $c1 = (int)($take1cardp1['value']);
                // valeur du champs "value" en entier de la carte joueur 1
                $c2 = (int)($take1cardp2['value']);
                // si la valeur de la carte du joueur 2 est > à celle du joueur 1
                if ($c1<$c2):
                    // remplissage du tableau $mainGagnante2
                    $mainGagnante2 = array_fill_keys([0], $take1cardp1) + array_fill_keys([1], $take1cardp2);
                    // mélange du tableau main gagnante du joueur 2
                    shuffle($mainGagnante2);
                    // pour chaque clé,valeur présentent dans le tableau main gagnante du
                    // joueur 2
                    foreach ($mainGagnante2 as $key => $value):
                        // on rajoute à la fin du paquet de carte du joueur 2 chaque
                        // carte du tableau tableau main gagnante du joueur 2
                        array_push($secondPlayerCards, $value);
                    endforeach;
                    echo '<pre>';
                    echo 'PLAYER 2 GAGNE :';
                    //var_dump($secondPlayerCards);
                    echo 'PLAYER 1 PERD :';
                    //var_dump($firstPlayerCards);
                    echo '</pre>';
                endif;
                // si la valeur de la carte du joueur 1 est > à celle du joueur 2
                if ($c1>$c2):
                    $mainGagnante1 = array_fill_keys([0], $take1cardp1) + array_fill_keys([1], $take1cardp2);
                    shuffle($mainGagnante1);
                    foreach ($mainGagnante1 as $key => $value):
                        array_push($firstPlayerCards, $value);
                    endforeach;
                    echo '<pre>';
                    echo 'PLAYER 2 PERD :';
                    //var_dump($secondPlayerCards);
                    echo 'PLAYER 1 GAGNE :';
                    //var_dump($firstPlayerCards);
                    echo '</pre>';
                endif;
                // les cartes des 2 joueurs sont égale alors bataille
                $p=0;
                $t=1;
                while($c1==$c2):
                    if ($p!=0):
                        echo '<pre>';
                        echo 'REBATAILLE :';
                        echo '</pre>';
                        $take1cardp1 = $firstPlayerCards[0];
                        $take1cardp2 = $secondPlayerCards[0];
                        $firstPayerCardsWithout0index = $firstPlayerCards;
                        unset($firstPayerCardsWithout0index[array_search([0], $firstPayerCardsWithout0index)]);
                        $firstPlayerCards = array_slice($firstPayerCardsWithout0index, 0);
                        $secondPayerCardsWithout0index = $secondPlayerCards;
                        unset($secondPayerCardsWithout0index[array_search([0], $secondPayerCardsWithout0index)]);
                        $secondPlayerCards = array_slice($secondPayerCardsWithout0index, 0);
                        $tapis1 = $tapis1 + array_fill_keys([($p+$t)], $take1cardp1);
                        $tapis2 = $tapis2 + array_fill_keys([($p+$t)], $take1cardp2);
                        if (count($firstPlayerCards)==0 || count($firstPlayerCards)==0):
                            break;
                        endif;
                        $c1 = (int)($take1cardp1['value']);
                        $c2 = (int)($take1cardp2['value']);
                        if ($c1>$c2):
                            $mainGagnante1 = [];
                            foreach ($tapis1 as $key => $value):
                                array_push($mainGagnante1, $value);
                            endforeach;
                            foreach ($tapis2 as $key => $value):
                                array_push($mainGagnante1, $value);
                            endforeach;
                            shuffle($mainGagnante1);
                            foreach ($mainGagnante1 as $key => $value):
                                array_push($firstPlayerCards, $value);
                            endforeach;
                        endif;
                        if ($c1<$c2):
                            $mainGagnante2 = [];
                            foreach ($tapis1 as $key => $value):
                                array_push($mainGagnante2, $value);
                            endforeach;
                            foreach ($tapis2 as $key => $value):
                                array_push($mainGagnante2, $value);
                            endforeach;
                            shuffle($mainGagnante2);
                            foreach ($mainGagnante2 as $key => $value):
                                array_push($secondPlayerCards, $value);
                            endforeach;
                            echo '<pre>';
                            echo 'LE JOUEUR 1 GAGNE LA BATAILLE :';
                            echo '</pre>';
                        endif;
                        if (count($firstPlayerCards)==0 || count($firstPlayerCards)==0):
                            break;
                        endif;
                        if ($c1==$c2):
                            $p+=1;
                        endif;
                    else:
                        echo '<pre>';
                        echo 'BATAILLE :';
                        echo '</pre>';
                        $tapis1 = array_fill_keys([$p], $take1cardp1);
                        $tapis2 = array_fill_keys([$p], $take1cardp2);
                        if (count($firstPlayerCards)==0 || count($firstPlayerCards)==0):
                            break;
                        endif;
                        $take1cardp1 = $firstPlayerCards[0];
                        $take1cardp2 = $secondPlayerCards[0];
                        $firstPayerCardsWithout0index = $firstPlayerCards;
                        unset($firstPayerCardsWithout0index[array_search([0], $firstPayerCardsWithout0index)]);
                        $firstPlayerCards = array_slice($firstPayerCardsWithout0index, 0);
                        $secondPayerCardsWithout0index = $secondPlayerCards;
                        unset($secondPayerCardsWithout0index[array_search([0], $secondPayerCardsWithout0index)]);
                        $secondPlayerCards = array_slice($secondPayerCardsWithout0index, 0);
                        $t+=1;
                        $tapis1 = $tapis1 + array_fill_keys([($p+$t)], $take1cardp1);
                        $tapis2 = $tapis2 + array_fill_keys([($p+$t)], $take1cardp2);
                        if (count($firstPlayerCards)==0 || count($firstPlayerCards)==0):
                            break;
                        endif;
                        // echo '<pre>';
                        // echo 'BATAILLE :';
                        // echo 'TAPIS 1 :';
                        // var_dump($tapis1);
                        // echo 'TAPIS 2 :';
                        // var_dump($tapis2);
                        echo '</pre>';
                        if (count($firstPlayerCards)==0 || count($firstPlayerCards)==0):
                            break;
                        endif;
                        $take1cardp1 = $firstPlayerCards[0];
                        $take1cardp2 = $secondPlayerCards[0];
                        $firstPayerCardsWithout0index = $firstPlayerCards;
                        unset($firstPayerCardsWithout0index[array_search([0], $firstPayerCardsWithout0index)]);
                        $firstPlayerCards = array_slice($firstPayerCardsWithout0index, 0);
                        $secondPayerCardsWithout0index = $secondPlayerCards;
                        unset($secondPayerCardsWithout0index[array_search([0], $secondPayerCardsWithout0index)]);
                        $secondPlayerCards = array_slice($secondPayerCardsWithout0index, 0);
                        $t+=1;
                        $tapis1 = $tapis1 + array_fill_keys([($p+$t)], $take1cardp1);
                        $tapis2 = $tapis2 + array_fill_keys([($p+$t)], $take1cardp2);
                        $c1 = (int)($take1cardp1['value']);
                        $c2 = (int)($take1cardp2['value']);
                        if ($c1>$c2):
                            $mainGagnante1 = [];
                            foreach ($tapis1 as $key => $value):
                                array_push($mainGagnante1, $value);
                            endforeach;
                            foreach ($tapis2 as $key => $value):
                                array_push($mainGagnante1, $value);
                            endforeach;
                            shuffle($mainGagnante1);
                            foreach ($mainGagnante1 as $key => $value):
                                array_push($firstPlayerCards, $value);
                            endforeach;
                            echo '<pre>';
                            echo 'LE JOUEUR 1 GAGNE LA BATAILLE :';
                            echo '</pre>';
                        endif;
                        if ($c1<$c2):
                            $mainGagnante2 = [];
                            foreach ($tapis1 as $key => $value):
                                array_push($mainGagnante2, $value);
                            endforeach;
                            foreach ($tapis2 as $key => $value):
                                array_push($mainGagnante2, $value);
                            endforeach;
                            shuffle($mainGagnante2);
                            foreach ($mainGagnante2 as $key => $value):
                                array_push($secondPlayerCards, $value);
                            endforeach;
                            echo '<pre>';
                            echo 'LE JOUEUR 1 GAGNE LA BATAILLE :';
                            echo '</pre>';
                        endif;
                        if (count($firstPlayerCards)==0 || count($firstPlayerCards)==0):
                            break;
                        endif;
                        if ($c1==$c2):
                            $p+=1;
                        endif;
                    endif;
                endwhile;
                if(count($firstPlayerCards)==54):
                    echo '<br>' . 'LE JOUEUR 1 A GAGNE LA GUERRE !!!!!! en ' . $tours . ' tours de jeu.';
                    break;
                endif;
                if(count($secondPlayerCards)==54):
                    echo '<br>' . 'LE JOUEUR 2 A GAGNE LA GUERRE !!!!!! en ' . $tours . ' tours de jeu.';
                    break;
                endif;
                echo 'Nombre de cartes restantes au joueur 1 : ' . count($firstPlayerCards) . '<br>';
                echo 'Nombre de cartes restantes au joueur 2 : ' . count($secondPlayerCards) . '<br>';
                if($tours==1500):
                    echo '<br>' . 'après ' . $tours . ' tours de jeu.';
                    if(count($firstPlayerCards) > count($secondPlayerCards)):
                        echo '<br>' . 'LE JOUEUR 1 A GAGNE !!!!!! avec ' . count($firstPlayerCards) . 'cartes.';
                        echo '<br>' . 'LE JOUEUR 2 A PERDU !!!!!! avec ' . count($secondPlayerCards) . 'cartes.';
                    else:
                        echo '<br>' . 'LE JOUEUR 2 A GAGNE !!!!!! avec ' . count($secondPlayerCards) . 'cartes.';
                        echo '<br>' . 'LE JOUEUR 1 A PERDU !!!!!! avec ' . count($firstPlayerCards) . 'cartes.';
                    endif;
                endif;
            endwhile;
            
         
            
            echo '<pre>';
            print_r(array_unique($firstPlayerCards));
            print_r(array_unique($secondPlayerCards));
            echo '</pre>';
            function array_doublon($array){
                if (!is_array($array)):
                    return false;
                endif;
                $r_valeur = [];
                $array_unique = array_unique($array);
                if (count($array) - count($array_unique)):
                    for ($i=0; $i<count($array); $i++):
                        if (!array_key_exists($i, $array_unique)):
                            $r_valeur[] = $array[$i];
                        endif;
                    endfor;
                endif;
                return $r_valeur;
            }
        endif;
        require_once 'view/front/jeu.php';

    }
}