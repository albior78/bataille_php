<?php


use Controller\HomeController;
use Controller\PlayerController;
use Controller\TapisDeJeuController;
use Controller\MelangeDistributionController;

if (!isset($_SESSION)) session_start();

require_once("./config/config.php");

class Router
{
    private $routes;
    private $currentController;

    public function __construct()
    {
        $this->add_route("/", function ($params) {
            $this->currentController = new HomeController();
            $this->currentController->lireToutesLesCartes();
        });

        $this->add_route("/joueurs", function ($params) {
            $this->currentController = new PlayerController();
            $this->currentController->creerDeuxJoueurs();
        });

        $this->add_route("/Battre_les_cartes", function ($params) {
            $this->currentController = new MelangeDistributionController();
            $this->currentController->melangeDistributionDuJeu();
        });

        $this->add_route("/Le_tapis_de_jeu", function ($params) {
            $this->currentController = new TapisDeJeuController();
            $this->currentController->deroulementDuJeu();
        });
    }

    private function add_route(string $route, callable $closure):void
    {
        $this->routes[$route] =  $closure;
    }

    public function execute():void
    {
        $path = $_SERVER['REQUEST_URI'];
        $finalPath = str_replace(BASE_FOLDER, "", $path);
        $lastIndex = strrpos($finalPath, '/');
        $arg = [];
        if ($lastIndex > 0):
            $array = explode("/", $finalPath);
        $finalPath = "/" . $array[1];
        for ($i = 2; $i < count($array); $i++):
                array_push($arg, $array[$i]);
        endfor;
        endif;
        if (array_key_exists($finalPath, $this->routes)):
            $this->routes[$finalPath]($arg); else:;
        require_once('view/adminView/404.php');
        endif;
    }
}
        // $this->add_route("/produit", function ($params){
        //     switch ($params[0]):
        //         case 'detail':
        //             $this->currentController = new DetailController;
        //             $this->currentController->detailProduit($params[1]);
        //             break;
        //     endswitch;
        // });
        // // attention c'est le lien qui va afficher le nom correcte dans l'url
        // // ici on traite la route du lien
        // $this->add_route("/inscription", function ($params) {
        //     $this->currentController = new MembreController();
        //     $this->currentController->inscription();
        // });
        // $this->add_route("/seConnecter", function ($params) {
        //     $this->currentController = new MembreController();
        //     $this->currentController->seConnecter();
        //  });
        // $this->add_route("/seDeconnecter", function ($params) {
        //     $this->currentController = new MembreController();
        //     $this->currentController->seDeconnecter();
        // });
        // $this->add_route("/admin", function ($params) {
        //     // on analyse le 1er paramêtre ($params[0]) de la route placée dans le href=""
        //     // exemple: dans le fichier inc/admin/header.inc.php au niveau de
        //     // LES MEMBRES: on a <!a href="gestionDesMembres/listeDesMembres/"...>
        //     // ici on analyse le 1ere paramètre gestionDesMembres à travers un
        //     // switch.
        //     // si le cas où $param[0] = 'gestionDesMembres' alors on crée l'objet
        //     // controleur actuel ($this->currentController) = à une nouvelle classe
        //     // MembreController, pour rappel on instancie MembreController
        //     switch ($params[0]):
        //         case 'bienvenueAdmin':
        //             $this->currentController = new DashboardController;
        //             break;
        //         // si le cas où $param[0] = 'gestionDesMembres' alors on crée l'objet
        //         // controleur actuel ($this->currentController) = à une nouvelle classe
        //         // MembreController, pour rappel on instancie MembreController
        //         case 'gestionDesMembres':
        //             $this->currentController = new MembreController;
        //              break;
        //         case 'gestionDesSalles':
        //             $this->currentController = new SalleController;
        //             break;
        //         case 'gestionDesProduits':
        //             $this->currentController = new ProduitController;
        //             break;
        //         case 'gestionDesCommandes':
        //             $this->currentController = new CommandeController;
        //             break;
        //         case 'gestionDesAvis':
        //             $this->currentController = new AvisController;
        //             break;
        //     endswitch;
        //     // on analyse le 2eme paramêtre ($params[1]) de la route placée dans le
        //     // href="".
        //     // avant tout, on vérifie si param[1] n'existe pas, auquel cas on le renseigne
        //     // à la valeur 'pageAccueilAdmin' par defaut
        //     if(!isset($params[1])):
        //         // par defaut
        //         $params[1] = 'pageAccueilAdmin';
        //     endif;
        //     // dans notre exemple du dessus,
        //     // on a href="gestionDesMembres/listeDesMembres/"
        //     // ici on analyse donc listeDesMembres.
        //     // cela s'effectue également à travers un switch
        //     switch ($params[1]):
        //         case 'pageAccueilAdmin':
        //             // Comme l'action demendée est dashboard on déclenche la méthode
        //             // dashboard du currentController
        //             $this->currentController->dashboard();
        //             // pas de header('Location:')
        //             break;
        //         // on a bien listeDesMembres de déclaré
        //         case 'listeDesMembres':
        //             // le contrôleur actuel va donc aller chercher la méthode à
        //             // réaliser (l'action démandé), ici listeMembreAdmin dans la classe
        //             //MembreController
        //             $this->currentController->listeMembreAdmin();
        //             // pas de header('Location:')
        //             break;
        //         case 'supprimerUnMembre':
        //             $this->currentController->supprimerUnMembre($params[2]);
        //             break;
        //         case 'voirUnMembre':
        //             // pour modifier, il nous faut une selection, la selection se fait
        //             // par id_member.
        //             $this->currentController->voirUnMembre($params[2]);
        //             //header('Location:../'); pas de header('Location:') c'est le lien
        //             // gestionDes Membres qui le fait
        //             break;
        //         case 'modifierUnMembre':
        //             // pour modifier, il nous faut une selection et une modification
        //             // la selection se fait par id_membre et la modification par
        //             // $_POST
        //             $this->currentController->modifierUnMembre($params[2]);
        //             //header('Location:' . BASE_FOLDER . '/admin');
        //             break;
        //         case 'listeDesSalles':
        //             $this->currentController->listeSallesAdmin();
        //             break;
        //         case 'voirUneSalle':
        //             $this->currentController->voirUneSalle($params[2]);
        //             break;
        //         case 'modifierUneSalle':
        //             $this->currentController->modifierUneSalle($params[2]);
        //             break;
        //         case 'supprimerUneSalle':
        //             $this->currentController->supprimerUneSalle($params[2]);
        //             break;
        //         case 'listeDesProduits':
        //             $this->currentController->listeProduitsAdmin();
        //             break;
        //         case 'voirUnProduit':
        //             $this->currentController->voirUnProduit($params[2]);
        //             break;
        //         case 'modifierUnProduit':
        //             $this->currentController->modifierUnProduit($params[2]);
        //             break;
        //         case 'supprimerUnProduit':
        //             $this->currentController->supprimerUnProduit($params[2]);
        //             break;
        //         case 'listeDesCommandes':
        //             $this->currentController->listeCommandesAdmin();
        //             break;
        //         case 'voirUneCommande':
        //             $this->currentController->voirUneCommande($params[2]);
        //             break;
        //         case 'supprimerUneCommande':
        //             $this->currentController->supprimerUneCommande($params[2]);
        //             break;
        //         case 'listeDesAvis':
        //             $this->currentController->listeAvisAdmin();
        //             break;
        //         case 'voirUnAvis':
        //             $this->currentController->voirUnAvis($params[2]);
        //             break;
        //         case 'modifierUnAvis':
        //             $this->currentController->modifierUnAvis($params[2]);
        //             break;
        //         case 'supprimerUnAvis':
        //             $this->currentController->supprimerUnAvis($params[2]);
        //             break;
        //         default:
        //             // si aucune action n'est identifiée, on redirige vers la liste des planètes
        //             header('Location:' . BASE_FOLDER . '/admin/bienvenueAdmin');
        //     endswitch;
        // });
   

    // Getters / Setters

