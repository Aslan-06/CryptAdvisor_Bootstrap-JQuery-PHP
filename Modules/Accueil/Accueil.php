<?php
require_once './Modules/Accueil/cont_Accueil.php';
class Accueil {

    private $controleur;

    public function __construct(){
        $this->controleur = new ContAccueil();
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

            case "search":
                $this->controleur->search();
                break;
            default:
                $this->controleur->accueil();
                break;
        }
    }
    
}
?>