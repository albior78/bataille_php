<?php

use Controller\HomeController;

include 'assets/inc/front/head.inc.php';
?>
    <title>Liste des cartes</title>
<?php
    include 'assets/inc/front/header.inc.php';
?>
    <main>
    <div class="container py-4">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">La Bataille</h1>
                <p class="col-md-8 fs-4">Un jeu de carte très ancien et toujours à la mode pour passer un bon moment en s'amusant à deux.</p>
                <a href="" type="button" class="btn btn-primary btn-lg">c'est partie</a>
            </div>
        </div>
        <?php
        require_once 'controller/HomeController.php';
            var_dump($cartes);
            foreach ($cartes as $carte):
        ?>
            <p><?= $carte->value?></p>
        <?php
            endforeach
        ?>
    </div>

    </main>
<?php
    include 'assets/inc/front/footer.inc.php';
?>