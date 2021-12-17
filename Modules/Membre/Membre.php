
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
            case "profil":
                $this->controleur->profil();
                break;
            case "devenirpremium":
                $this->controleur->devenirpremium();
                break;
            case "annulerAbonnement":
                $this->controleur->annulerAbonnement();
                break;
            case "mesfavoris":
                $this->controleur->mesfavoris();
                break;
            default:
                echo("accès interdit");
                break;
        }
    }
}

?>