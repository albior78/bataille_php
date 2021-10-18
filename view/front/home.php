<?php
include 'assets/inc/front/head.inc.php';
?>
    <title>Liste des cartes</title>
<?php
    include 'assets/inc/front/header.inc.php';
?>
    <main class="container py-4">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">La Bataille</h1>
                <p class="col-md-8 fs-4">Un jeu de carte très ancien et toujours à la mode pour passer un bon moment en s'amusant à deux.</p>
                <a href="http://localhost/bataille_php/joueurs" type="button" class="btn btn-primary btn-lg">c'est partie</a>
            </div>
        </div>
        <div class="row">
            <?php
                foreach ($cartes as $carte):
            ?>
            <div class="col-12 col-lg-3 fw-bold pb-3">
                <div class="card <?php switch ($carte->color): case 'noir': ?>bg-dark text-light <?php break; case 'rouge':?>bg-danger text-dark<?php break; default: ?>bg-success text-dark <?php endswitch; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $carte->name?></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Couleur :&ensp;<?= $carte->color?></li>
                            <li class="list-group-item">Type :&ensp;<?= $carte->type?></li>
                            <li class="list-group-item">Valeur :&ensp;<?= $carte->value?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
                endforeach
            ?>
        </div>
    </main>
<?php
    include 'assets/inc/front/footer.inc.php';
?>