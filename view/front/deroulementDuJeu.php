<?php

    include 'assets/inc/front/head.inc.php';
?>
    <title>Déroulement du jeu</title>
<?php
    include 'assets/inc/front/header.inc.php';
?>
    <main class="container py-4">
        <div class="row">
            <hr class="w-100">
            <div class="col-12 text-center">
                <h4>Déroulement du jeu</h4>
            </div>
            <hr class="w-100 mt-3">
        </div>
        <div id="gameStart" class="row px-0 mx-0">
            <div class="col-12 text-center px-0 mx-0">
                <h4 class="fw-bold pt-3">La partie</h4>
                <h5>Tour n°?</h5>
            </div>
        </div>
            <div class="row">
                <?php //--------colonne de gauche----------?>
                <div class="col-2 px-0 mx-0">
                    <div class="row">
                        <div class="col-12 fw-bold px-0 mx-0">
                            <p>Joueur 1<br> Cliquer sur l'image !</p>
                            <button id="carteJ1"><img class="img-fluid" src="assets/images/dos-carte.jpg" alt="nothing"></button>
                        </div>
                    </div>
                </div>
                <?php //-------TAPIS DE JEU DYNAMIQUE------?>
                <div class="col-8 px-0 mx-0">
                    <?php //-------header tapis + CARTE PIOCHEE JOUEUR 1 + footer tapis------?>
                    <?php //-------header tapis + CARTE PIOCHEE JOUEUR 2 + footer tapis------?>
                    <div id="cardPlayJ1J2"></div>
                </div>
                <?php //--------colonne de droite----------?>
                <div class="col-2 px-0 mx-0">
                    <div class="row">
                        <div class="col-12 fw-bold px-0 mx-0">
                            <p>Joueur 2<br> Cliquer sur l'image !</p>
                            <button id="carteJ2"><img class="img-fluid" src="assets/images/dos-carte.jpg" alt="nothing"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <button id="bataille" class="btn bg-danger text-dark fw-bold d-none">cliquer pour gérer cette bataille</button>
                <button id="rebataille" class="btn bg-danger text-dark fw-bold d-none" >cliquer pour gérer cette rebataille</button>
            </div>
            <div class="row pt-5">
                <button id="tourSuivant" class="btn bg-success text-dark fw-bold d-none">Tour suivant</button>
            </div>
            <?php //'<pre>';
            //var_dump(session_name());
            //echo '</pre>';
            ?>
        </div>
    </main>
<?php
    include 'assets/inc/front/footer.inc.php';
?>