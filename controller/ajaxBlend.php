<?php

// connection bdd
$user = 'root';
$pass = 'tiger78';
try
{
    $dbh = new PDO('mysql:host=localhost;dbname=bataille_php', $user, $pass);
    // requete sql
    $sql = 'SELECT *
            FROM card
            ORDER BY RAND()
            ';
        $query = $dbh->prepare($sql);
        $query->execute();
        $blendCards = $query->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['blendCards'] = $blendCards;
        echo '<pre>';
        echo '<strong style="font-size: 2rem">$_SESSION:</strong>';
        var_dump($_SESSION);
        echo '</pre>';
?>  
    <!-- ajax blend -->
    <form class="row" action="http://localhost/bataille_php/jeu" method="post">
        <div class="col-3 fw-bold">
            <p>Melanger les cartes ?<br> Cliquer sur l'image !</p>
            <button id="blend" type="submit" name="blend">
                <img class="img-fluid" src="http://localhost/bataille_php/assets/images/dos-carte.jpg" alt="nothing">
            </button>
        </div>
    </form>
    <div> <?php var_dump($_SESSION);?></div>

<?php
}
catch(PDOException $e)
{
   print "Erreur !: " . $e->getMessage() . "<br/>";
   die();
}