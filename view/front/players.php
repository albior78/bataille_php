<?php
include 'assets/inc/front/head.inc.php';
?>
    <title>Création des joueurs</title>
<?php
    include 'assets/inc/front/header.inc.php';
?>
    <main class="container py-4">
        <div class="row">
            <div class="col-md-11 offset-md-1">
                <h1 class="pt-3">Création des joueurs</h1>
                <?php
                    if(isset($_SESSION['message'])):
                        echo '<div class="alert alert-success">'.$_SESSION['message'].'</div>';
                        unset($_SESSION['message']);
                    endif;
                ?>
                <form class="row" action="" method="post">
                    <div class="form-group col-md-5 offset-md-1">
                        <label class="fw-bold">Nom</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text pb-3 pt-3" id="nom-icone"><i class="fas fa-user-alt"></i>
                            </div>
                            <input type="text" name="name" class="form-control" placeholder="Votre nom"  aria-label="nom" aria-describedby="nom-icone" required>
                        </div>
                    </div>
                    <div class="form-group col-md-5 offset-md-1">
                        <label class="fw-bold">Prénom</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text pb-3 pt-3" id="prenom-icone"><i class="fas fa-pencil-alt"></i></span>
                            </div>
                            <input type="text" name="firstName" class="form-control" placeholder="Votre prénom" aria-label="prenom" aria-describedby="prenom-icone" required>
                        </div>
                    </div>
                    <div class="form-group col-md-2 offset-md-9">
                        <button type="submit" name="submit" class="btn btn-primary mt-4">Enregistrer</button>
                    </div>
                </form>
            </div>
            <h4>Liste des joueurs</h4>
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>n° du joueur</th>
                        <th>Nom</th>
                        <th>prénom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($players as $key => $player): ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $player->name ?></td>
                        <td><?= $player->first_name ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php if($nplayers>=2): ?>
            <div class="col-12 col-lg-2 offset-lg-2">
                <a type="button" class="btn bg-primary text-light" href="http://localhost/bataille_php/Battre_les_cartes">Continuer vers la partie</a>
            </div>
            <?php endif; ?>
        </div>
    </main>
<?php
    include 'assets/inc/front/footer.inc.php';
?>