<?php
    session_start();
    function mainGagnanteJoueur($j1, $j2)
    {
        $_SESSION['mainGagnanteJ'.$j1] =[];
        $_SESSION['mainGagnanteJ'.$j2] = [];
        // récupération des données du tapis $j1 pour les placer dans maingagnante $j2
        foreach ($_SESSION['tapisJ'.$j1] as $key => $value):
            array_push($_SESSION['mainGagnanteJ'.$j2], $value);
        endforeach;
        // récupération des données du tapis $j2 pour les placer dans maingagnante $j2
        foreach ($_SESSION['tapisJ'.$j2] as $key => $value):
            array_push($_SESSION['mainGagnanteJ'.$j2], $value);
        endforeach;
        // on mélange maingagante $j2
        shuffle($_SESSION['mainGagnanteJ'.$j2]);
        // récupération des données de la main gagnante mélangée $j2 pour les placer à
        // la fin du paquet de $j2
        foreach ($_SESSION['mainGagnanteJ'.$j2] as $key => $value):
            array_push($_SESSION['paquetJ'.$j2], $value);
        endforeach;
        return $_SESSION['paquetJ'.$j2];
    }

    function piocherUneCarte ($j, $index)
    {
        // lecture de la carte index 0 du paquet du joueur 1
        $_SESSION['piocherJ'.$j] = $_SESSION['paquetJ'.$j][0];
        //
        switch(true):
            case $index == 0:
                $_SESSION['tapisJ'.$j] = array_fill_keys([0], $_SESSION['piocherJ'.$j]);
            break;
            case $index >= 1:
                $_SESSION['tapisJ'.$j] = $_SESSION['tapisJ'.$j] + array_fill_keys([$index], $_SESSION['piocherJ'.$j]);
            break;
        endswitch;
        // égalisation de paquetJ1SansIndex0 par rapport à paquetJ1 pour ne pas
        // perdre l'origine de $paquetJ1
        $_SESSION['paquetJ'.$j.'SansIndex0'] = $_SESSION['paquetJ'.$j];
        // effacement de l'index dont le résultat de recherche est l'index 0
        // dans le tableau paquetJ1SansIndex0
        unset($_SESSION['paquetJ'.$j.'SansIndex0'][array_search([0], $_SESSION['paquetJ'.$j.'SansIndex0'])]);
        // décalage des indexs à partir de 0 que l'on affecte au nouveau paquet du joueur 1
        // qui se retrouve avec 26 cartes
        $_SESSION['paquetJ'.$j] = array_slice($_SESSION['paquetJ'.$j.'SansIndex0'], 0);
        // valeur du champs "value" en entier de la carte joueur 1

        // mise en session de la valeur de la carte piochée par le joureur 1
        $_SESSION['valeurCarteJ'.$j] = (int)($_SESSION['piocherJ'.$j]['value']);
        return $_SESSION['valeurCarteJ'.$j];
    }
    function headerTapis()
    {
        //-------HEADER TAPIS------
        echo '<p class="text-center">';
            switch(true):
                case $_SESSION['valeurCarteJ1'] == NULL && $_SESSION['valeurCarteJ2'] == NULL:
                    echo 'La partie n\'a pas commencée';
                    break;
                case ($_SESSION['valeurCarteJ1'] != NULL && $_SESSION['valeurCarteJ2'] == NULL) || ($_SESSION['valeurCarteJ1'] == NULL && $_SESSION['valeurCarteJ2'] != NULL):
                    echo 'Il y a un problème, désolé !!';
                    break;
                case $_SESSION['valeurCarteJ1'] > $_SESSION['valeurCarteJ2']:
                    echo 'Le joueur 1 gagne ce tour';
                    break;
                case $_SESSION['valeurCarteJ1'] < $_SESSION['valeurCarteJ2']:
                    echo 'Le joueur 2 gagne ce tour';
                    break;
                default: NULL;
            endswitch;
        echo '</p>';
    }
    function footerTapis()
    {
        //-------FOOTER TAPIS------
        ?>
        <div class="row justify-content-center px-5">
            <hr class="w-100 mt-5 mb-3">
        </div>
        <div class="row ">
            <div class="col-6 text-center px-0 mx-0">
                <h6>Nombre de cartes restantes <?= count($_SESSION['paquetJ1']) ?></h6>
            </div>
            <div class="col-6 text-center px-0 mx-0">
                <h6>Nombre de cartes restantes  <?= count($_SESSION['paquetJ2']) ?></h6>
            </div>
        </div>
        <div class="row justify-content-center px-5">
            <hr class="w-100 mt-3">
        </div>
        <?php
    }
    function carteVisible($j, $index)
    {
        ?>
        <div class="card <?php switch ($_SESSION['tapisJ'.$j][$index]["color"]): case "noir": ?>bg-dark text-light <?php break; case "rouge":?>bg-danger text-dark<?php break; default: ?>bg-success text-dark <?php endswitch; ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $_SESSION['tapisJ'.$j][$index]["name"] ?></h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Couleur :&ensp;<?= $_SESSION['tapisJ'.$j][$index]["color"] ?></li>
                    <li class="list-group-item">Type :&ensp;<?= $_SESSION['tapisJ'.$j][$index]["type"] ?></li>
                    <li class="list-group-item">Valeur :&ensp;<?= $_SESSION['tapisJ'.$j][$index]["value"] ?></li>
                </ul>
            </div>
        </div>
        <?php
    }
    function carteRetournee()
    {
        ?>
            <div>
                <img class="img-fluid" src="http://localhost/bataille_php/assets/images/dos-carte.jpg" alt="nothing">
            </div>
        <?php
    }
    function ensembleCarteVisibleSansBataille()
    {
        headerTapis();
        ?>
            <div class="row mt-5">
                <div class="col-12 col-lg-5 offset-lg-1 fw-bold">
                    <?php carteVisible(1,0); ?>
                </div>
                <div class="col-12 col-lg-5 fw-bold">
                    <?php carteVisible(2,0); ?>
                </div>
            </div>
        <?php
        footerTapis();
    }
    //------------------------------------------------------------------------
    // ---------------pioche joueur 1----------------------
    $_SESSION['valeurCarteJ1'] = piocherUneCarte (1, 0);
    // ---------------pioche joueur 2----------------------
    $_SESSION['valeurCarteJ2'] = piocherUneCarte (2, 0);
    switch (true):
        case $_SESSION['paquetJ1']==NULL:
            echo 'Le Joueur 2 à gagné !!!';
    break;
        case $_SESSION['paquetJ2']==NULL:
            echo 'Le Joueur 1 à gagné !!!';
    break;
        case ($_SESSION['valeurCarteJ1'] < $_SESSION['valeurCarteJ2']):
            $_SESSION['paquetJ2'] = mainGagnanteJoueur(1, 2);
            ensembleCarteVisibleSansBataille();
    break;
        case ($_SESSION['valeurCarteJ1'] > $_SESSION['valeurCarteJ2']):
            $_SESSION['paquetJ1'] = mainGagnanteJoueur(2, 1);
            ensembleCarteVisibleSansBataille();
        break;
        case ($_SESSION['valeurCarteJ1'] = $_SESSION['valeurCarteJ2']):
            // les cartes des 2 joueurs sont égaux alors bataille
            // ---------------1ère pioche carte retournée joueur 1----------------
            piocherUneCarte (1, 1);
            if($_SESSION['paquetJ1']==NULL):
                echo 'Le Joueur 2 à gagné !!!';
            else:
                // ---------------2ème pioche carte visible joueur 1----------------
                $_SESSION['valeurCarteJ1'] = piocherUneCarte (1, 2);
                //--------------------------------------------------------------------
                if($_SESSION['paquetJ2']==NULL):
                    echo 'Le Joueur 1 à gagné !!!';
                else:
                    // ---------------1ère pioche carte retournée joueur 2----------------
                    piocherUneCarte (2, 1);
                    if($_SESSION['paquetJ2']==NULL):
                        echo 'Le Joueur 1 à gagné !!!';
                    else:
                        // ---------------2ème pioche carte visible joueur 2----------------
                        piocherUneCarte (2, 2);
                        // --------------------visu bataille--------------------
                        headerTapis();
                        ?>
                        <div class="row mt-5">
                            <div class="col-12 col-lg-5 offset-lg-1 fw-bold">
                                <?php carteVisible(1,0); ?>
                                <?php carteRetournee(); ?>
                                <?php carteVisible(1,2); ?>
                            </div>
                            <div class="col-12 col-lg-5 fw-bold">
                                <?php carteVisible(2,0); ?>
                                <?php carteRetournee(); ?>
                                <?php carteVisible(2,2); ?>
                            </div>
                        </div>
                        <?php footerTapis();
                        switch (true):
                            case ($_SESSION['valeurCarteJ1'] < $_SESSION['valeurCarteJ2']):
                                $_SESSION['paquetJ2'] = mainGagnanteJoueur(1, 2);
                            break;
                            case ($_SESSION['valeurCarteJ1'] > $_SESSION['valeurCarteJ2']):
                                $_SESSION['paquetJ1'] = mainGagnanteJoueur(2, 1);
                            break;
                            case ($_SESSION['valeurCarteJ1'] = $_SESSION['valeurCarteJ2']):
                                // les cartes des 2 joueurs sont égale alors rebataille
                                // ---------------2ème pioche carte retournée joueur 1-----index 3-----------
                                piocherUneCarte(1,3);
                                if($_SESSION['paquetJ1']==NULL):
                                    echo 'Le Joueur 2 à gagné !!!';
                                else:
                                    // ---------------3ème pioche carte visible joueur 1-----index 4-----------
                                    $_SESSION['valeurCarteJ1'] = piocherUneCarte(1,4);
                                    if($_SESSION['paquetJ2']==NULL):
                                        echo 'Le Joueur 1 à gagné !!!';
                                    else:
                                        // ---------------2ème pioche carte retournée joueur 2----index 3------------
                                        piocherUneCarte(2,3);
                                        if($_SESSION['paquetJ2']==NULL):
                                            echo 'Le Joueur 1 à gagné !!!';
                                        else:
                                            // ---------------3ème pioche carte visible joueur 2------index 4----------
                                            $_SESSION['valeurCarteJ2'] = piocherUneCarte(2,4);
                                            // vue rebataille
                                            headerTapis();
                                            ?>
                                            <div class="row mt-5">
                                                <div class="col-12 col-lg-5 offset-lg-1 fw-bold">
                                                    <?php carteVisible(1, 0); ?>
                                                    <?php carteRetournee(); ?>
                                                    <?php carteVisible(1, 2); ?>
                                                    <?php carteRetournee(); ?>
                                                    <?php carteVisible(1, 4); ?>
                                                </div>
                                                <div class="col-12 col-lg-5 fw-bold">
                                                    <?php carteVisible(2, 0); ?>
                                                    <?php carteRetournee(); ?>
                                                    <?php carteVisible(2, 2); ?>
                                                    <?php carteRetournee(); ?>
                                                    <?php carteVisible(2, 4); ?>
                                                </div>
                                            </div>
                                            <?php footerTapis() ?>
<?php
                                        endif;
                                    endif;
                                endif;
                            break;
                        endswitch;
                    endif;
                endif;
            endif;
        break;
    endswitch;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" >
    $( document ).ready(function(){
        $.ajax({
            url: "http://localhost/bataille_php/controller/ajax$_SESSION.php",
            cache: false
        })
        .done(function(result){
            var $_SESSION = $.parseJSON(result);
            console.log($_SESSION);
        })
    })
</script>

