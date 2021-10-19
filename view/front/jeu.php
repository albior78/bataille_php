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
        <div id="blendCards">
            <form class="row" action="" method="post">
                <div class="col-3 fw-bold">
                    <p>Mélanger les cartes ?<br> Cliquer sur l'image !</p>
                    <button id="blend" type="submit" name="blend"><img class="img-fluid" src="assets/images/dos-carte.jpg" alt="nothing"></button>
                </div>
            </form>
        </div>
        <div id="distributionCards" class="d-none">
            <p class="fw-bold pt-3">Le paquet de carte est mélangé</p>
            <button id="distribution" class="btn bg-primary text-white fw-bold">Cliquer ici pour distribuer</button>
        </div>
        <div id="gameStart" class="row d-none px-0 mx-0">
            <div class="col-12 text-center px-0 mx-0">
                <h4 class="fw-bold pt-3">La partie</h4>
                <div class="row">
                    <div class="col-2 px-0 mx-0">
                        <form class="row" action="" method="post">
                            <div class="col-12 fw-bold px-0 mx-0">
                                <p>Joueur 1<br> Cliquer sur l'image !</p>
                                <button id="cardPlaying1" type="submit" name="cardPlaying1"><img class="img-fluid" src="assets/images/dos-carte.jpg" alt="nothing"></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-8 px-0 mx-0">

                    </div>
                    <div class="col-2 px-0 mx-0">
                        <form class="row" action="" method="post">
                            <div class="col-12 fw-bold px-0 mx-0">
                                <p>Joueur 2<br> Cliquer sur l'image !</p>
                                <button id="cardPlaying2" type="submit" name="cardPlaying2"><img class="img-fluid" src="assets/images/dos-carte.jpg" alt="nothing"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr class="w-100 mt-3">
                <div class="col-12 px-0 px-0">
                    <div class="row">
                        <div class="col-2 px-0 mx-0">
                            <h6>Nombre de cartes restant <?= count($firstPlayerCards); ?></h6>
                        </div>
                        <div class="col-8  text-center px-0 mx-0">
                            <h5>Tour n°?</h5>
                            <p>Nombre de carte sur le tapis ?</p>

                        </div>
                        <div class="col-2 text-center  px-0 mx-0">
                            <h6>Nombre de cartes restant <?= count($secondPlayerCards); ?></h6>

                        </div>
                    </div>
                </div>
            <hr class="w-100">
        </div>
        
    </main>
<?php
    include 'assets/inc/front/footer.inc.php';
?>