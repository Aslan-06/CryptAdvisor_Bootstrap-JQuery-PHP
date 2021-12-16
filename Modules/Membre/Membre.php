
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
            $_GET['action'] = "inscription";
        }
        return $_GET["action"];
    }

    public function render($toDO){
        switch ($toDO){

            case "profil":
                $this->controleur->profil();
                break;
            case"devenirpremium":
                $this->controleur->devenirpremium();
            case"annulerAbonnement":
                $this->controleur->annulerAbonnement();
            case"mesfavoris":
                $this->controleur->mesfavoris();
            default:
                echo"accès interdit";
                break;
        }
    }
}