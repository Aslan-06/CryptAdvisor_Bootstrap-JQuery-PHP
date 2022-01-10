<?php
require_once './Modules/Membre/cont_membre.php';
class Membre {
    private $action;
    private $controleur;

    public function __construct(){
        $this->controleur = new ContMembre();
        $this->action = $this->setAction();
        $this->render($this->action);
    }

    public function setAction(){
        if(!isset($_GET['action'])){
            $_GET['action'] = "devenirpremium";
        }
        return $_GET["action"];
    }

    public function render($toDO){
        switch ($toDO){

            case "premiumform":
                $this->controleur->premiumform();
                break;
            case "promotionform":
                $this->controleur->promotionform();
                break;
            case "annulerAbonnement":
                $this->controleur->annulerAbonnement();
                break;
            case "articlefav":
                $this->controleur->mesarticlesfavoris();
                break;
            case "coursfav":
                $this->controleur->mescoursfavoris();
                break;
            case "forumfav":
                $this->controleur->mesforumsfavoris();
                break;
            case "promotion":
                $this->controleur->demanderole();
            // case "demandeform":
            //     $this->controleur->promotionform();
            default:
                echo("accès interdit");
                break;
        }
    }
}

?>