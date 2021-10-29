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
                <div class="row">
                    <div class="col-2 px-0 mx-0">
                        <div class="row">
                            <div class="col-12 fw-bold px-0 mx-0">
                                <p>Joueur 1<br> Cliquer sur l'image !</p>
                                <button id="cardPlaying1" type="submit" name="cardPlaying1"><img class="img-fluid" src="assets/images/dos-carte.jpg" alt="nothing"></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 px-0 mx-0">
                        <div class="row">
                            <div id="carteJ1" class="col-12 col-lg-5 offset-lg-1 fw-bold">
                                <div class="card <?php switch ($carteJouee1["color"]): case "noir": ?>bg-dark text-light <?php break; case "rouge":?>bg-danger text-dark<?php break; default: ?>bg-success text-dark <?php endswitch; ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $carteJouee1["name"]?></h5>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Couleur :&ensp;<?= $carteJouee1["color"]?></li>
                                            <li class="list-group-item">Type :&ensp;<?= $carteJouee1["type"]?></li>
                                            <li class="list-group-item">Valeur :&ensp;<?= $carteJouee1["value"]?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div id="carteJ2" class="col-12 col-lg-5 fw-bold">
                                <div class="card <?php switch ($carteJouee2["color"]): case "noir": ?>bg-dark text-light <?php break; case "rouge":?>bg-danger text-dark<?php break; default: ?>bg-success text-dark <?php endswitch; ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $carteJouee2["name"]?></h5>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Couleur :&ensp;<?= $carteJouee2["color"]?></li>
                                            <li class="list-group-item">Type :&ensp;<?= $carteJouee2["type"]?></li>
                                            <li class="list-group-item">Valeur :&ensp;<?= $carteJouee2["valuecolor"]?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 px-0 mx-0">
                        <div class="row">
                            <div class="col-12 fw-bold px-0 mx-0">
                                <p>Joueur 2<br> Cliquer sur l'image !</p>
                                <button id="cardPlaying2" type="submit" name="cardPlaying2"><img class="img-fluid" src="assets/images/dos-carte.jpg" alt="nothing"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="w-100 mt-3">
            <div class="col-12 px-0 px-0">
                <div class="row">
                    <div class="col-2 px-0 mx-0">
                        <h6>Nombre de cartes restant ?</h6>
                    </div>
                    <div class="col-8  text-center px-0 mx-0">
                        <h5>Tour n°?</h5>
                        <p>Nombre de carte sur le tapis ?</p>
                    </div>
                    <div class="col-2 text-center  px-0 mx-0">
                        <h6>Nombre de cartes restant  ?</h6>
                    </div>
                </div>
            </div>
            <hr class="w-100">
        </div>
    </main>
<?php
    include 'assets/inc/front/footer.inc.php';
?>