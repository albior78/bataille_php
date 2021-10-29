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
        <form class="row" action="http://localhost/bataille_php/Battre_les_cartes" method="post">
        <div class="col-3 fw-bold">
            <p>Melanger les cartes ?<br> Cliquer sur l'image !</p>
            <button type="submit" name="blend">
                <img class="img-fluid" src="http://localhost/bataille_php/assets/images/dos-carte.jpg" alt="nothing">
            </button>
        </div>
        <?php
        $distribution = '
                        <div>
                            <p class="fw-bold pt-3">Le paquet de carte est mélangé</p>
                            <button type="submit" name="distribution" class="btn bg-primary text-white fw-bold">Cliquer ici pour distribuer</button>
                        </div>
                        ';
        $ditributionEffectue =  '
        <p class="fw-bold pt-3">La distribution des cartes a été faite.</p>
        <a type="button" class="btn bg-primary text-light fw-bold" href="http://localhost/bataille_php/Le_tapis_de_jeu">Cliquer pour installer le tapis de jeu</a>
                                ';
        ?>
        
        <?php
    if(isset($_POST['blend'])):
        echo $distribution;
        // echo '<strong>$_SESSION:blendAllCard</strong>';
        // var_dump($_SESSION['blendAllCard']);
    endif;
    if(isset($_POST['distribution'])):
        echo $ditributionEffectue;
        // echo '<strong>$_SESSION:blendAllCard</strong>';
        // var_dump($_SESSION['blendAllCard']);
        // echo '<strong>$_SESSION:paquetJ1</strong>';
        // var_dump($_SESSION['paquetJ1']);
        // echo '<strong>$_SESSION:paquetJ2</strong>';
        // var_dump($_SESSION['paquetJ2']);
    endif;
    ?>
    </form>
   
    </main>
<?php
    include 'assets/inc/front/footer.inc.php';
?>